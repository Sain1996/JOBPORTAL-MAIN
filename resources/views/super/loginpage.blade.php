@extends('super.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-4">
        <div class="login-container" style="background-color: white;">
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
            <h2>Login</h2>
            <form id="loginForm" action="{{ route('SuperAdmin.postlogin') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <p class="lock-icon">🔒<a href="{{ route('SuperAdmin.forgotpassword') }}">Forgot Password</a></p>
                <input type="submit" value="Login" class="btn btn-primary btn-block mx-auto d-block" style="width: 100px;">
            </form>
        </div>
    </div>
</div>

<script>
   $(document).ready(function() {
    $('#loginForm').submit(function(event) {
        // Prevent the form from submitting normally
        event.preventDefault();

        // Get the form data
        var formData = $(this).serialize();

        // Send an AJAX request to the server
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            dataType: 'json', // Expect JSON response
            success: function(response) {
                // Check if the response contains a redirect URL
                if (response.redirect) {
                    // Redirect to the specified URL
                    window.location.href = response.redirect;
                }
            },
            error: function(xhr, status, error) {
                // Display an error message
                alert('An error occurred. Please try again.');
            }
        });
    });
});
$('#password').bind('paste', function(e) {
    e.preventDefault();
    alert('Paste Function Disabled')
});
$('#username').bind('paste', function(e) {
    e.preventDefault();
    alert('Paste Function Disabled')
});
    function preventback(){window.history.forward()};
    setTimeout("preventback()",1000);
    window.onunload=function(){null};
</script>

@endsection
