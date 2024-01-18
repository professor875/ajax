@extends('auth-layout')
@section('content')
    <form id="myForm">
        @csrf
        <!-- First Name -->
        <label>First Name:
            <input type="text" name="first_name" required>
        </label><br>

        <!-- Last Name -->
        <label>Last Name:
            <input type="text" name="last_name" required>
        </label><br>

        <!-- Gender -->
        <label>Gender:
            <label><input type="radio" name="gender" value="male" required> Male</label>
            <label><input type="radio" name="gender" value="female" required> Female</label>
        </label><br>

        <!-- Country -->
        <label>Country:
            <select name="country" required>
                <option value="usa">USA</option>
                <option value="canada">Canada</option>
                <!-- Add more options as needed -->
            </select>
        </label><br>

        <!-- Hobbies -->
        <label>Hobbies:
            <label><input type="checkbox" name="hobbies[]" value="reading"> Reading</label>
            <label><input type="checkbox" name="hobbies[]" value="coding"> Coding</label>
            <!-- Add more checkboxes as needed -->
        </label><br>

        <!-- About -->
        <label>About:
            <textarea name="about" rows="4"></textarea>
        </label><br>

        <!-- Email -->
        <label>Email:
            <input type="email" name="email" required>
        </label><br>

        <!-- Confirm Email -->
        <label>Confirm Email:
            <input type="email" name="confirm_email" required>
        </label><br>

        <!-- Password -->
        <label>Password:
            <input type="password" name="password" required>
        </label><br>

        <!-- Confirm Password -->
        <label>Confirm Password:
            <input type="password" name="password_confirmation" required>
        </label><br>

        <!-- Image -->
        <label>Image:
            <input type="file" name="image">
        </label><br>

        <button type="button" onclick="submitForm()">Submit</button>
    </form>

@endsection
@section('js')
    <script>
        function submitForm() {
            event.preventDefault();

            $.ajax({
                url: '/submit-form',
                type: 'POST',
                data: new FormData(document.getElementById('myForm')),
                contentType: false,
                processData: false,
                success: function (response) {
                    alert(response.message);
                    console.log(response.user);
                    // Optionally, perform additional actions on success
                },
                error: function (error) {
                    console.error('Error:', error);
                    // Handle errors if needed
                },
                complete: function () {
                    // Optionally, perform actions after the AJAX request is complete
                }
            });
        }
    </script>

@endsection
