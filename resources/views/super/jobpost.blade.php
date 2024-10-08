@extends('super.layout')

@section('content')

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
                    <li>{{ $error }}</li>

                    @endforeach
                </ul>
            </div>
            @endif

<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="login-container" style="background-color: white; padding:5% 15% 5% 15%;">
            <h3> Job Post Registration Form</h3>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"></script>


<form method="POST" action="{{ route('JobPost.store') }}">
    @csrf

    <div class="form-group">
        <label for="title">Job Title*</label>
        <input type="text" name="title" id="title" class="form-control" required pattern="^[a-zA-Z0-9\s\-\(\)\[\]]+$">
        <span id="title_error" class="error"></span>
        
    </div>

    <div class="form-group">
        <label for="years_of_experience">Years of experience*</label>
        <input type="text" name="years_of_experience" id="years_of_experience" class="form-control" required>
        <span id="years_of_experience_error" class="error"></span>
    </div>

    <div class="form-group">
        <label for="salary">Salary (optional)</label>
        <input type="text" name="salary" id="salary" class="form-control">
        <span id="salary_error" class="error"></span>
    </div>

    <div class="form-group">
        <!-- change qualification as mandatory -->
        <label for="qualification">Qualification*</label>
        <input type="text" name="qualification" id="qualification" 
        class="form-control">
        <span id="qualification_error" class="error"></span>
    </div>

    <div class="form-group">
        <!-- change technology to skills and make it as mandatory -->
        <label for="technology">Skills*</label>
        <input type="text" name="technology" id="technology" class="form-control">
        <span id="technology_error" class="error"></span>
    </div>

    <div class="form-group">
        <label for="description">Job Description*</label>
        <textarea name="description" id="description" class="form-control" required maxlength="1000"></textarea>
        <span id="description_error" class="error"></span>
    </div>

    <div class="form-group">
        <label for="work_mode">Work Mode*</label>
        <select name="work_mode" id="work_mode" class="form-control" required style="padding: 3px;">
            <option value="Remote">Remote</option>
            <option value="On-site">On-site</option>
            <option value="Hybrid">Hybrid</option>
        </select>
        <span id="work_mode_error" class="error"></span>
        </div>

<div class="form-group">
    <label for="post_date">Date of job post*</label>
    <!--  need to change here date should be current date -->
    <input type="date" name="post_date" id="post_date" class="form-control" required>
    <span id="post_date_error" class="error"></span>
</div>

<div class="form-group">
    <label for="status">Status*</label>
    <select name="status" id="status" class="form-control" required style="padding: 3px;">
        <option value="open" selected>Open</option>
        <!-- need to change here ie. closed should present at the time of edit,status must be open -->
        <option value="closed">Closed</option>
    </select>
    <span id="status_error" class="error"></span>
</div>


<div class="form-group">
    <label for="company">Company</label>
    <input type="text" name="company" id="company" class="form-control" required>
    <span id="company_error" class="error"></span>
</div>

<div class="form-group">
    <label for="location">Location</label>
    <input type="text" name="location" id="location" class="form-control" required>
    <span id="location_error" class="error"></span>
</div>

<div class="form-group">
    <label>Email</label>
    <input type="email" name="email" id="email" class="form-control" required>
    <span id="email_error" class="error"></span>
</div>

<div class="form-group">
    <label for="phone" class="required">Phone</label>
    <input type="hidden" id="country_code" name="country_code" value="91">
    <!-- mobile numner should be valid -->
    <input type="tel" id="phone" name="phone" class="form-control" placeholder="Phone Number" required>    
    <br> 
    <span id="phone_error" class="error"></span>
</div>
<!-- should display success message after  job post creation -->
<button type="submit" class="btn btn-primary">Create Job Post</button>
</form>
      </div>
   </div>
</div>

<script>
    $(document).ready(function() {
    // Initialize the intlTelInput
        var input = document.querySelector("#phone");
        var countryInput = document.querySelector("#country_code");

    var iti = window.intlTelInput(input, {
        initialCountry: "IN",
        allowDropdown: true,
        separateDialCode: false,
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
    });

      // Update the hidden input with the selected country code
      input.addEventListener("countrychange", function(e) {
        var countryData = iti.getSelectedCountryData();
        countryInput.value = countryData.dialCode;
    });
     // Function to validate phone number
        function validatePhoneNumber() {
        var phoneError = $('#phone_error');
        var phoneNumber = $('#phone').val();

        // Regular expression to match only numeric characters
        var numericRegex = /^[0-9]+$/;

        if (!numericRegex.test(phoneNumber)) {
            phoneError.text('Phone number must contain only numeric characters');
            return false;
        } else {
            phoneError.text('');
            return true;
        }
    }

     // Event listener for phone number input
     $('#phone').on('blur', function() {
            validatePhoneNumber();
        });

    $('#registrationForm').on('submit', function(event) {
        // Validate form fields before submission
        var isValid = true;

         // Validate phone number
         if (!iti.isValidNumber()) {
            $('#phone_error').text('Invalid phone number');
            isValid = false;
        } else {
            $('#phone_error').text('');
        }
    });
});
</script>  

@endsection