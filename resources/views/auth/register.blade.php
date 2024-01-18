@extends('auth-layout')

@section('content')
    <form class="bg-gray-600 flex flex-col items-center space-y-4 py-2 px-5 text-blue-500" action="{{route('register-user.store')}}" method="POST">
        @csrf

        @php($selectedHobbies = ['cricket','football'])

        @php($selectedHobbies = [3,4])
        <div>
            <label class="block">First Name 3</label>
            <input type="checkbox" name="first_name[]"  value="3" {{in_array(3, $selectedHobbies) ? 'checked' : ''}}>
        </div>
            <div>
                <label class="block">First Name 3</label>
                <input type="file" name="image" id="imageInput" accept="image/">

                <img src="#" id="imagePreview" alt="image preview" class="hidden">
            </div>

        <div class="w-full flex justify-end">
            <button>Submit</button>
        </div>
    </form>
@endsection

@section('js')
    <script>
            document.addEventListener('DOMContentLoaded', function () {
            var input = document.getElementById('imageInput');
            var preview = document.getElementById('imagePreview');

            input.addEventListener('change', function () {
            // Check if a file is selected
            if (input.files && input.files[0]) {
            var reader = new FileReader();

            // Set the callback function to update the image preview
            reader.onload = function (e) {
            preview.src = e.target.result;
        };

            // Read the selected file as a data URL
            reader.readAsDataURL(input.files[0]);

            // Show the image preview
            preview.classList.remove('hidden');
        }
        });
        });
    </script>
@endsection
