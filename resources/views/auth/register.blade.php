@extends('auth-layout')

@section('content')
    <form class="bg-gray-600 flex flex-col items-center space-y-4 py-2 px-5 text-blue-500" id="myForm">
        @csrf

        @php($selectedHobbies = ['cricket','football'])

        <div>
            <label class="block">First Name 3</label>
            <input type="checkbox" name="hobby[]"  value="cricket" {{in_array('cricket', $selectedHobbies) ? 'checked' : ''}}>
            <input type="checkbox" name="hobby[]"  value="soccer" {{in_array('soccer', $selectedHobbies) ? 'checked' : ''}}>
            <input type="checkbox" name="hobby[]"  value="other" {{in_array('orhers', $selectedHobbies) ? 'checked' : ''}}>
            <input type="checkbox" name="hobby[]"  value="football" {{in_array('football', $selectedHobbies) ? 'checked' : ''}}>
        </div>
        <label for="gender">
            male
            <input type="radio" name="gender" value="male">
        </label>
        <label for="femle">
            female
            <input type="radio" name="gender" value="female">
        </label>
        <label for="other">
            other
            <input type="radio" name="gender" value="other">
        </label>
            <div>
                <label class="block">First Name 3</label>
                <input type="file" name="image" id="imageInput" accept="image/">

                <img src="#" id="imagePreview" alt="image preview" class="hidden">
            </div>

        <div class="w-full flex justify-end">
            <button id="submitButton">Submit</button>
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
            $(document).ready(function (event){
                event.preventDefault();

                // Disable the submit button or show a loading indicator
                document.getElementById('submitButton').setAttribute('disabled', 'true');
                // Alternatively, show a loading indicator or perform other UI changes
                var formData = new FormData(document.getElementById('#myForm'));

                $.ajax({
                    url:'{{ route('register-user.store') }}',
                    type:'POST',
                    data:formData,
                    contentType:false,
                    processData:false,
                    success: function (response) {
                        alert(response.message);
                    },
                    error:function (e) {
                        console.error('Error:',e);
                    },
                });

            });
    </script>
@endsection
