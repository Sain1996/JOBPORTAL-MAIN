

@extends('super.layout')

@section('content')
<style>
  /* Custom Styles */
.login-container {
    padding: 20px;
}

.form-group label {
    display: block;

    margin-bottom: 5px;
    margin-left: 10%;

}

.form-group input[type="text"],
.form-group input[type="email"],
.form-group input[type="password"],
.form-group input[type="file"],
.form-group input[type="hidden"],
.form-group select
 {
    width: 60%; /* Adjust the width as needed */
    margin-left: 10%; /* Center horizontally */
}
/* Ensure default value is fully visible in select box */
/* Adjust height of select box and ensure default value is fully visible */
.form-group select {
    height: auto; /* Allow the select box to expand vertically */
    padding: 3px; /* Adjust padding as needed */
    line-height: normal; /* Reset line-height to default */
    min-width: 150px; /* Set a minimum width for the select box */
    box-sizing: border-box; /* Reset line-height to default */
}
.error {
    color: red;
}
.form-group input[type="tel"]{
    width: 185%;
    margin-left: 10%;
}
.iti{
    margin-left: 10%;

}

.selectbox {
        width: 80%; /* Make the selection option fill the container width */
        padding: 10px;
        margin: 0 auto;
        display: block; /* Ensure it's block-level */
        margin-bottom: 5px;
    }

 .required:after {
    content:"*";
    color: red;
  } 
</style>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="login-container" style="background-color: white;">
            <h3> Job Seeker Registration Form</h3>
            
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

            <form id="registrationForm" action="{{ route('SuperAdmin.postregjobseeker') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="first_name" class="required">First Name</label>
                    <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First Name" value="{{ old('first_name') }}" required>
                    <span id="first_name_error" class="error"></span>
                    @error('first_name')
                        <span class="error">{{ $message }}</span>

                        @enderror
                </div>
                <div class="form-group">

                <label for="last_name" class="required">Second Name</label>
                    <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Second Name" value="{{ old('last_name') }}" required>
                    <span id="last_name_error" class="error"></span>
                    @error('last_name')
                        <span class="error">{{ $message }}</span>

                        @enderror
                </div>
                <div class="form-group">
                    <label for="username" class="required">Preferred Username</label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Preferred Username" value="{{ old('username') }}" required>
                    <span id="username_error" class="error"></span>
                    @error('username')
                        <span class="error">{{ $message }}</span>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="email" class="required">Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                    <span id="email_error" class="error"></span>
                    @error('email')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
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
                    <label for="phone" class="required">Phone Number</label>
                    <input type="hidden" id="country_code" name="country_code" value="91">
                    <input type="tel" id="phone" name="phone" class="form-control" placeholder="Phone Number" required>    
                    <br> 
                <span id="phone_error" class="error"></span>
                </div>
                <div class="form-group">
                    <label for="area_of_work" class="required">Area of Work</label>
                    <select id="area_of_work" name="area_of_work" class="form-control" required>
                        <option value="">Select Area of Work</option>
                        @foreach($job_types as $job_type)
                        <option value="{{ $job_type->id }}">{{ $job_type->domain }}</option>
                        @endforeach
                    </select>
                    <div id="technologies-field" style="display: none">
                           <label for="technologies">Technologies </label>
                           <select id="technologies" name="technologies[]" class="form-control" multiple min="3" max="5" required>
                                   @foreach($userArray as $technology)
                                           <option value="{{ $technology['id'] }}">{{ $technology['technology'] }}</option>
                                    @endforeach
                        </select>
                        <span id="technologies_error" class="error"></span>
                          @error('technologies')
                            <span class="error">{{ $message }}</span>
                          @enderror
                        </div>
                    <span id="area_of_work_error" class="error"></span>
                    @error('area_of_work')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="total_experience" class="required">Total Years of Experience</label>
                    <select id="total_experience" name="total_experience" class="form-control" required>
                        <option value=""> Select Total Years of Experience</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="30+">30+</option>
                        
                        <!-- Add more options as needed -->
                    </select>
                    <span id="total_experience_error" class="error"></span>
                    @error('total_experience')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="relevant_experience" class="required">Years of Relevant Experience</label>
                    <select id="relevant_experience" name="relevant_experience" class="form-control" required>
                        <option value="">Select Years of Relevant Experience</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="30+">30+</option>
                        <!-- Add more options as needed -->
                    </select>
                    <span id="relevant_experience_error" class="error"></span>
                    @error('relevant_experience')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="designation" class="required">Designation</label>
                    <select id="designation" name="designation" class="form-control" required>
                        <option value="">Select Designation</option>
                        <option value="Software Engineer">Software Engineer</option>
                        <option value="Senior Software Engineer">Senior Software Engineer</option>
                        <option value="Project Manager">Project Manager</option>   
                        <!-- Add more options as needed -->         
                    </select>
                    <span id="designation_error" class="error"></span>
                    @error('designation')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="current_company">Current Company</label>
                    <input type="text" id="current_company" name="current_company" class="form-control" placeholder="Current Company" value="{{ old('current_company') }}" required>
                    <span id="current_companyerror" class="error"></span>
                    @error('current_company')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="current_ctc" class="required">Current CTC</label>
                    <select id="current_ctc" name="current_ctc" class="form-control" required>
                        <option value="">Select Current ctc CTC</option>
                        <option value="0">Fresher</option>
                        <option value="0-100000">0-100000</option>
                        <option value="100000-300000">100000-300000</option>
                        <option value="300000-500000">300000-500000</option>
                        <option value="500000-900000">500000-900000</option>
                        <option value="900000-1200000">900000-1200000</option>
                        <option value="1200000-1500000">1200000-1500000</option>
                        <option value=">1500000"> >1500000 </option>
                        <!-- Add more options as needed -->
                    </select>
                   
                        <label for="texbox" id="label1" class="hidden" class="required">Please specify the figure: </label >
                        <input type="text" id="textboxcontainer1" class="form-control" name="textbox" style="display:none">
                     
                    <span id="current_ctc_error" class="error"></span>
                    @error('current_ctc')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group" >
                    <label for="expected_ctc" class="required">Expected CTC</label>
                    <select id="expected_ctc" name="expected_ctc" class="form-control" required>
                        <option value="">Select Expected CTC</option>
                        <option value="0">Fresher</option>
                        <option value="0-100000">0-100000</option>
                        <option value="100000-300000">100000-300000</option>
                        <option value="300000-500000">300000-500000</option>
                        <option value="500000-900000">500000-900000</option>
                        <option value="900000-1200000">900000-1200000</option>
                        <option value="1200000-1500000">1200000-1500000</option>
                        <option value=">1500000"> >1500000 </option>
                        <!-- Add more options as needed -->
                    </select>
                    
                        <label for="texbox" id="label2" class="hidden" >Please specify the figure:</label>
                        <input type="text" id="textboxcontainer2" class="form-control" name="textbox" style="display:none">
                    
                    <span id="expected_ctc_error" class="error"></span>
                    @error('expected_ctc')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                <label for="cv"class="required" class="required">Upload CV</label>
                    <input type="file" id="cv" name="cv" class="form-control-file" accept=".doc, .docx, .pdf" onchange="checkFile()" required>
                    <span id="cv_error" class="error"></span>
                    @error('cv')
                        <span class="error">{{ $message }}</span>
                    @enderror

                </div>
                <div style="display: flex; justify-content: space-between;">   
                <input type="submit" value="Submit" class="btn btn-primary btn-block mx-auto d-block" style="width: 100px;">
                <input type="reset" value="Reset" class="btn btn-primary btn-block mx-auto d-block" style="width: 100px;">
                </div>            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
    // Initialize the intlTelInput
    const input = document.querySelector("#phone");
    var countryInput = document.querySelector("#country_code");
    const iti  = window.intlTelInput(input, {
        initialCountry: "IN",
        allowDropdown: true,
        formatAsYouType: true,
        separateDialCode: true,
        strictMode: true,
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@23.3.2/build/js/utils.js",
        hiddenInput: () => "country_code"
    });
    window.iti = iti;
    input.addEventListener("countrychange", function(e) {
        var countryData = iti.getSelectedCountryData();
        countryInput.value = countryData.dialCode;
    });
        // Function to validate phone number
        function validatePhoneNumber() {
        var phoneError = $('#phone_error');
        var phoneNumber = $('#phone').val();
        // Regular expression to match only numeric characters
        var numericRegex = /[1-9]{1}[0-9]/;
        if (!numericRegex.test(phoneNumber)) {
            phoneError.text('Invalid Phone number. Must contain only numeric characters and must not begin with 0.');
            return false;
        } else {
            phoneError.text('');
            return true;
        }
    }

        //Event listener for phone number input
        $('#phone').on('blur', function() {
           validatePhoneNumber();
        });

        function validatePasswordConfirmation() {
        var password = $('#password').val();
        var confirmPassword = $('#password_confirmation').val();
        var passwordConfirmationError = $('#password_confirmation_error');

        if (password !== confirmPassword) {
            passwordConfirmationError.text('Passwords do not match');
            return false;
        } else {
            passwordConfirmationError.text('');
            return true;
        }
    }

    $('#password_confirmation').on('input', function() {
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
        } else if (username.length > maxLength) {
            usernameError.text('Username cannot exceed ' + maxLength + ' characters');
        } else if (!username.match(usernameRegex)) {
            usernameError.text('Username must contain only alphabetic characters');
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

        //Validate phone number
         if (!iti.isValidNumber()) {
            $('#phone_error').text('Invalid phone number');
            isValid = false;
        } else {
            $('#phone_error').text('');
        }
 
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
    // Function to validate first name and last name
// Function to validate first name
function validateFirstName(firstName) {
    var firstNameError = $('#first_name_error');
    var nameRegex = /^(?=.*[a-zA-Z])[a-zA-Z0-9 `]+$/; // Require at least one letter
    if (!nameRegex.test(firstName)) {
        firstNameError.text('First name must contain at least one letter and can only contain letters, numbers, spaces, and `');
        return false;
    } else if (firstName.length > 50) {
        firstNameError.text('First name cannot exceed 50 characters');
        return false;
    } else {
        firstNameError.text('');
        return true;
    }
}

// Function to validate last name
function validateLastName(lastName) {
    var lastNameError = $('#last_name_error');
    var nameRegex = /^(?=.*[a-zA-Z])[a-zA-Z0-9 `]+$/; // Require at least one letter
    if (!nameRegex.test(lastName)) {
        lastNameError.text('Second name must contain at least one letter and can only contain letters, numbers, spaces, and `');
        return false;
    } else if (lastName.length > 50) {
        lastNameError.text('Second name cannot exceed 50 characters');
        return false;
    } else {
        lastNameError.text('');
        return true;
    }
}
// Event listener for first name input
$('#first_name').on('input keyup blur', function() {
    validateFirstName($(this).val());
});

// Event listener for last name input
$('#lasft_name').on('input keyup blur', function() {
    validateLastName($(this).val());
});


    // Function to validate password
    function validatePassword(password) {
        var passwordError = $('#password_error');
        var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,15}$/;
        if (!passwordRegex.test(password)) {
            passwordError.text('Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character');
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
    $('#current_ctc').change(function() {
    if ($(this).val() ==">1500000") {
        $('#textboxcontainer1').show();
    } else {
        $('#textboxcontainer1').hide();
    }
});

    $('#expected_ctc').change(function() {
    if ($(this).val() ==">1500000") {
        $('#textboxcontainer2').show();
    } else {
        $('#textboxcontainer2').hide();
    }
});
$(document).ready(function() {
    $("#current_ctc").change(function() {
        var selectedOption = $(this).val();
        if (selectedOption === ">1500000") {
            $("#label1").removeClass("hidden");
                } else {
                    $("#label1").addClass("hidden");
                }
            });
        });
        $(document).ready(function() {
    $("#expected_ctc").change(function() {
        var selectedOption = $(this).val();
        if (selectedOption === ">1500000") {
            $("#label2").removeClass("hidden");
                } else {
                    $("#label2").addClass("hidden");
                }
            });
        });
});
function checkFile() {
          const fileInput = document.getElementById('cv');
          const fileError = document.getElementById('cv_error');
          const allowedTypes = ['application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/pdf'];
          const maxSize = 3 * 1024 * 1024; // 3MB

      if (fileInput.cv.length > 0) {
        const file = fileInput.cv[0];
        if (!allowedTypes.includes(cv.type)) {
          fileInput.value = ''; // Clear the file input
          fileError.textContent = 'Please upload a Word (doc, docx) or PDF file.';
          return false;
        }
        if (cv.size > maxSize) {
          fileInput.value = ''; // Clear the file input
          fileError.textContent = 'File size exceeds 3MB limit.';
          return false;
        }
        fileError.textContent = ''; // Clear any previous error message
      }
    }

     // Get the total years of experience and relevant years of experience fields.
     const totalExperienceField = document.getElementById('total_experience');
     const relevantExperienceField = document.getElementById('relevant_experience');

    // Add an event listener to the submit button.
    document.querySelector('input[type="submit"]').addEventListener('click', function(event) {
      // Check if the total years of experience is greater than the relevant years of experience.
      if (totalExperienceField.value < relevantExperienceField.value) {
        // Prevent the form from submitting.
        event.preventDefault();
        // Display an error message.
        alert('Total years of experience must be greater than relevant years of experience.');
      }
    });
    const areaOfWorkField = document.querySelector('#area_of_work');
    const technologiesField = document.querySelector('#technologies-field');
    const technologiesInput = document.querySelector('#technologies');

    areaOfWorkField.addEventListener('change', () => {
        if (areaOfWorkField.value === "4") { // IT job type id is 1
            technologiesField.style.display = 'block';
            technologiesInput.setAttribute('required');
        } else {
            technologiesField.style.display = 'none';
            technologiesInput.removeAttribute('required');
        }
    });

    technologiesInput.addEventListener('change', () => {
        const selectedOptions = Array.from(technologiesInput.selectedOptions).map(option => option.value);
        selectedTechnologiesInput.value = JSON.stringify(selectedOptions);
        
    });

     // Load the selected values if there are any
     const selectedTechnologies = JSON.parse(selectedTechnologiesInput.value);
    if (selectedTechnologies) {
        selectedTechnologies.forEach(technology => {
            const option = technologiesInput.querySelector(`[value="${technology}"]`);
            if (option) option.selected = true;
    });

        
 }
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