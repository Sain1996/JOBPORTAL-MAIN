@extends('super.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-4">
        <div class="login-container" style="background-color: white;">
            <h2>Super Admin Registration</h2>
            
            <!-- Display success message -->
            @if(session('success'))
            <div class="alert alert-success">
                <span>{{ session('success') }}</span>
            </div>
            @endif
            
            <!-- Display error message -->
            @if(session('error'))
            <div class="alert alert-danger">
                <span>{{ session('error') }}</span>
            </div>
            @endif
            <style>
                .required:after {
                 content:" *";
                 color: red;
                 }
            </style>
            
            <form id="registrationForm" action="{{route('SuperAdmin.getregister')}}" method="post">
                @csrf
                <div class="form-group">
                    <label  class="required" for="first_name">First Name</label>
                    <input pattern="[a-zA-Z'-.\s]{3,50}$" title=" Please Enter 3 to 50 Characters. Only alphabets, apostrophe('), hyphen(-) and period(.) are allowed" type="text" id="firstname" name="first_name" maxlength="50" class="form-control" placeholder="First name" required>
                </div>
                <div class="form-group">
                    <label class="required" for="last_name">Second Name</label>
                    <input pattern="[a-zA-Z'-.\s]{3,50}$" title="  Please Enter 3 to 50 Characters. Only alphabets, apostrophe('), hyphen(-) and period(.) are allowed" type="text" id="last_name" name="last_name" maxlength="50" class="form-control" placeholder="Enter your middle name (if applicable)" required>
                </div>
                <div class="form-group">
                    <label class="required" for="username">Preferred User Name</label>
                    <input pattern="[a-zA-Z]+" title="Please enter alphabets only"  type="text" id="username" name="username"  minlength="8" maxlength="15" class="form-control" placeholder="Username" required>
                    <small class="form-text text-muted">Choose a unique username (min:8,max:15,Purely Alphabets).</small>
                </div>
                   
                <div class="form-group">
                <label  class="required" for="password">Enter a Password</label>
                    <input pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&_#])[A-Za-z\d@$!%*?&_#]{8,15}$" title="Password must be 8 to 15 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character(Only @$!%*?&_# are allowed.) " type="password" id="password" name="password" minlength="8" maxlength="15" class="form-control" placeholder="Password" class="far fa-eye" id="togglePassword" required>
                    <small class="form-text text-muted">Password must be 8 to 15 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.</small>
                
                </div>
                <div class="form-group">
                    <label class="required" for="email">Email</label><br>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                 </div>
                <div style="display: flex; justify-content: space-between;">   
                <input type="submit" value="Submit" class="btn btn-primary btn-block mx-auto d-block" style="width: 100px;">
                <input type="reset" value="Reset" class="btn btn-primary btn-block mx-auto d-block" style="width: 100px;">
                </div>            </form>
        </div>
    </div>
</div>
<script>
    window.addEventListener("DOMContentLoaded", function () {
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function (e) {
            // Toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            // Toggle the eye / eye-slash icon
            this.classList.toggle("fa-eye-slash");
        });
    });
    document.getElementById('registrationForm').addEventListener('submit', function (event) {
    const emailInput = document.getElementById('email');
    const emailValue = emailInput.value.trim();

    // Regular expression for email validation
    const emailRegex = /^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;

    if (!emailRegex.test(emailValue)) {
        alert('Please enter a valid email address.');
        event.preventDefault(); // Prevent form submission
    }
});

   
</script>
@endsection
