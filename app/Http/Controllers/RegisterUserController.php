<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $gender = $request->input('gender');

        return response()->json(['message' => 'gender']);
    }
    public function submitForm(Request $request)
    {
        // Validate form data (add more rules as needed)
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'country' => 'required|string|max:255',
            'hobbies' => 'nullable|array',
            'about' => 'nullable|string',
            'email' => 'required|email|unique:users,email',
            'confirm_email' => 'required|email|same:email',
            'password' => 'required|string|min:6|confirmed',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


//         Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images');
        }

        dd($imagePath);

        // Create a new user
        $user = new User([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'gender' => $validatedData['gender'],
            'country' => $validatedData['country'],
            'hobbies' => $validatedData['hobbies'],
            'about' => $validatedData['about'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);
//
        User::create($user);

        return response()->json(['message' => 'Form submitted successfully']);
    }
}
