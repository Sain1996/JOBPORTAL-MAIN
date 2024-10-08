
@extends('super.layout')

@section('content')
<style>
  .required:after {
    content:"*";
    color: red;
  }
  .error {
    color: red;
  }

    /* Optional: Style for the toggle button */
    .toggle-password {
        cursor: pointer;
        user-select: none;
    }
</style>
<div class="row justify-content-center">
    <div class="col-lg-4">
        <div class="login-container" style="background-color: white;">
        <h2>Recruiter Admin Registration</h2>
         <!-- Display success message -->
         @if(session('success'))
            <div class="alert alert-success">
                <span>{{ session('success') }}</span>
            </div>
        
            @endif
            
            <!-- Display error message -->
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $errors }}</li>
                    @endforeach
               </ul>
            </div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger">
                <span>{{ session('error') }}</span>
            </div>
            @endif
         
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"></script>
            

            <form id="registrationForm" action="{{route('SuperAdmin.postrecruiteradmin')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="firstname"class="required">First Name</label>
                    <input type="text" id="firstname" name="firstname" class="form-control" placeholder="First name" value="{{ old('firstname') }}" pattern="[a-zA-Z'-.\s]{3,50}$" title=" Please Enter 3 to 50 Characters. Only alphabets, apostrophe('), hyphen(-) and period(.) are allowed"  required>
                    <span id="firstname_error" class="error"></span>
                    @error('firstname')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="secondname"class="required">Second Name</label>
                    <input type="text" id="secondname" name="secondname" class="form-control" placeholder="Second name"  value="{{ old('secondname') }}" pattern="[a-zA-Z'-.\s]{1,50}$" title=" Please Enter 1 to 50 Characters. Only alphabets, apostrophe('), hyphen(-) and period(.) are allowed"  required>
                    <span id="secondname_error" class="error"></span>
                    @error('secondname')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                <label for="username"class="required">Preferred Username</label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Preferred Username" value="{{ old('username') }}" required>
                    <span id="username_error" class="error"></span>
                    @error('username')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="companyname" class="required">Company Name</label>
                    <input type="text" id="companyname" name="companyname" class="form-control" placeholder="Company name" value="{{ old('companyname') }}" required>
                    <span id="companyname_error" class="error"></span>
                    @error('companyname')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email"class="required">Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                    <span id="email_error" class="error"></span>
                    @error('email')
                        <span class="error">{{ $message }}</span>
                    @enderror
                   
                </div>
                <div class="form-group">
                    <label for="password"class="required">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                    <span class="toggle-password">Show Password</span><br>
                    <span id="password_error" class="error"></span>
                    @error('password')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="password_confirmation" class="required">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                    <span id="password_confirmation_error" class="error"></span>
                    @error('password_confirmation')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subscription" class="required">Subscription Plan</label>
                    <select id="subscription" name="subscription">
                    @foreach($subscriptionPlans as $plan)
                        <option value="{{ $plan->plan }}">{{ $plan->plan }}</option>
                    @endforeach
                    </select>
                </div> 
                <div style="display: flex; justify-content: space-between;">   
                <input type="submit" value="Submit" class="btn btn-primary btn-block mx-auto d-block" style="width: 100px;">
                <input type="reset" value="Reset" class="btn btn-primary btn-block mx-auto d-block" style="width: 100px;">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    
       
    $(document).ready(function() {

        $(".toggle-password").click(function(){
        var passwordField = $("#password");
        var passwordFieldType = passwordField.attr('type');
        if(passwordFieldType === 'password') {
            passwordField.attr('type', 'text');
            $(".toggle-password").text('Hide');
        } else {
            passwordField.attr('type', 'password');
            $(".toggle-password").text('Show');
        }
     });

     document.getElementById('registrationForm').addEventListener('submit', function validatePasswordConfirmation(event) {
        var password = $('#password').val();
        var confirmPassword = $('#password_confirmation').val();
        var passwordConfirmationError = $('#password_confirmation_error');

        if (password !== confirmPassword) {
            passwordConfirmationError.text('Passwords do not match');
            event.preventDefault();
            return false;
        } else {
            passwordConfirmationError.text('');
            return true;
        }
      }

       $('#password_confirmation').on('input keyup', function() {
        validatePasswordConfirmation();
      });

       // Function to validate username
        
       function validateUsername(username) {
        var usernameError = $('#username_error');
        var minLength = 8;
        var maxLength = 15;
        var usernameRegex = /^[a-zA-Z]+$/; // Regular expression to allow only alphabetic characters

        if (username.length < minLength) {
            usernameError.text('Username must be at least ' + minLength + ' characters long');
            event.preventDefault();
        } else if (username.length > maxLength) {
            usernameError.text('Username cannot exceed ' + maxLength + ' characters');
            event.preventDefault();
        } else if (!username.match(usernameRegex)) {
            usernameError.text('Username must contain only alphabetic characters');
            event.preventDefault();
        } else {
            usernameError.text('');
        }
      }

       // Event listener for username input
       $('#username').on('input keyup blur', function() {
        validateUsername($(this).val());
       });

      // Initial validation for username on page load
      // validateUsername($('#username').val());

       // Event listener for form submission
      $('#registrationForm').on('submit', function(event) {
        // Validate form fields before submission
        var isValid = true;
        // Validate password
        validatePassword($('#password').val());

        // Validate password confirmation
        if (!validatePasswordConfirmation()) {
            isValid = false;
        }

        // Prevent form submission if any validation error
        if (!isValid) {
            event.preventDefault();
        }
     });

      // Function to validate password
     function validatePassword(password) {
        var passwordError = $('#password_error');
        var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@~^*_<>#$%&?])[A-Za-z\d@~^_<>$#!%*?&]{8,}$/;
        if (!passwordRegex.test(password)) {
            passwordError.text('Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character');
            event.preventDefault();
        } else {
            passwordError.text('');
        }
     }

      // Function to validate email
      
     function validateEmail(email) {
        var emailError = $('#email_error');
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            emailError.text('Invalid email address');
            event.preventDefault();
        } else {
            emailError.text('');
        }
     }

     // Live validation for email input
     $('#email').on('input', function() {
        validateEmail($(this).val());
      });

     // Live validation for password input
     $('#password').on('input', function() {
        validatePassword($(this).val());
     });
});





</script>

<script>
    // Detect back button click event
    window.onload = function () {
        if (window.history && window.history.pushState) {
            window.history.pushState('forward', null, window.location.href+'#');
            window.onpopstate = function () {
                // Perform an AJAX request to a Laravel route to end the session
                axios.post('/logout')
                    .then(response => {
                        // Session ended successfully
                        console.log('Session ended');
                    })
                    .catch(error => {
                        // Handle errors
                        console.error('Error ending session');
                    });
            };
        }
    };
</script>
@endsection