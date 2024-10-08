<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@23.3.2/build/css/intlTelInput.css">
    <link rel="icon" href="image/ay2.png" type="image/icon type">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<style>
    .fas {
        font-family: 'Font Awesome 5 Free';
    }

    .dropdown {
        flex-direction: column;
        position: absolute;
        top: 100%;
        right: 0;
        background-color: rgba(0, 0, 139, 0.7);
        padding: 20px;
        border-radius: 10px;
        color: white;
        min-width: 150px;
    }

    .employer_links:hover .dropdown {
        display: flex;
    }

    .banner-interior:hover {
        background-color: rgba(0, 0, 139, 0.7);
    }

    .jobs_links .dropdown {
        right: auto;
        left: 0;
    }

    #popularJobsContainer {
        width: 250px;
        display: block;
        margin-left: 130px;
        background-color: rgba(0, 0, 139, 0.8);
        height: fit-content;
        margin-bottom: 20px;
        position: absolute;
        background-color: darkblue;
        right: auto;
        left: 0;
        border-radius: 10px;
        opacity: 1;
        transition: opacity 0.3s;
        z-index: 2;
        color: white;
        opacity: 0.8;
    }
    #byLocationJobsContainer{
        width: 250px;
        display: block;
        margin-left: 150px;
        /* margin-top:100px; */
        background-color: rgba(0, 0, 139, 0.8);
        height: fit-content;
        margin-bottom: 20px;
        /* position: absolute; */
        background-color: darkblue;
        right: auto;
        left: 0;
        border-radius: 10px;
        opacity: 1;
        transition: opacity 0.3s;
        position: absolute;
        z-index: 2;
        color: white;
        opacity: 0.8; 
    }
    #byLocationJobsContainer ul  li a {
        color: white;
        text-decoration: none;
        transition: opacity 0.3s, color 0.3s;
    }
    #byLocationJobsContainer ul  li a:hover{
        opacity: 0.8;
        color: #0000FF;  
    }
    #byLocationJobsContainer li{
        list-style-type: none;
        line-height: 50px;
        background-color: rgba(0, 0, 139, 0.7);
        color: white; 
    }
    #popularJobsContainer li {
        list-style-type: none;
        line-height: 50px;
        background-color: rgba(0, 0, 139, 0.7);
        color: white;

    }

    #popularJobsContainer ul li a {
        color: white;
        text-decoration: none;
        transition: opacity 0.3s, color 0.3s;
    }

    #popularJobsContainer ul li a:hover {
        opacity: 0.8;
        color: #0000FF;
        /* change the text color to blue on hover */
    }

    .search-bar {
        position: relative; /* Change to relative */
        margin: 50px auto; /* Center with margin */
        text-align: center;
        background-color: white;
        padding: 10px;
        border: 2px solid #87CEEB;
        border-radius: 30px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        width: 950px;
    }

    .search-bar:hover {
        border-color: #4682B4;
    }

    .search-input {
        background-color: white;
        outline: 1px solid #ccc;
        margin: 0 10px;
        width: 280px;
        display: inline-block;
        vertical-align: middle;
    }

    .search-input input,
    select {
        background-color: white;
        opacity: 1;
        border: 1px solid #ccc;
        border: none;
        border-radius: 20px;
        display: inline-block; /* Keep it inline */
    }

    #experience,
    #locations {
        width: 200px;
        margin-left: 20px;
    }

    .search-input input:focus,
    select:focus {
        border: 1px solid #aaa;
        outline: 1px solid #aaa;
    }

    #experience {
        border: none;
        outline: 1px solid #ccc;
    }
</style>
</head>
<header style="background-color: rgba(0, 119, 182, 0.7); padding: 20px; color: white; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
    <div class="logo_container" style="display: flex; align-items: center;">
        <div class="banner-interior" style="background-color: rgba(255, 255, 255, 0.2); padding: 10px; border-radius: 10px;">
            <a href="/">
                <img src="image/ay.jpg" width="100px" style="max-width: 100%; height: auto; opacity: 1; transition: opacity 0.3s;" onmouseover="this.style.opacity='0.8'" onmouseout="this.style.opacity='1'">
            </a>
        </div>
        <div style="display: flex; gap: 20px; margin-left: 20px;">

            <div style="position: relative;" class="jobs_links">

                <div class="banner-interior" style="background-color: rgba(255, 255, 255, 0.2); padding: 10px; border-radius: 10px; cursor: pointer;">
                    
                    <a href="{{session('username') ? 'javascript:void(0)' : route('user.login') }}" style="color: white; text-decoration: none; opacity: 1; transition: opacity 0.3s;" onmouseover="this.style.opacity='0.5'" onmouseout="this.style.opacity='1'"
                        onclick="toggleDropdown('Jobs')">Jobs ▾</a>

                    <div class="dropdown" id="Jobs" style="display: none; flex-direction: column; position: absolute; top: 100%; right: 0; background-color: rgba(0, 0, 139, 0.7);">
                       
                        <a href="{{  session('username') ? 'javascript:void(0)' : route('user.login') }}" style="color: white; text-decoration: none; opacity: 1; transition: opacity 0.3s; display: block; padding: 10px 0;" onmouseover="this.style.opacity='0.8'"
                            onmouseout="this.style.opacity='1'" onclick="loadPopularJobs()">By Category </a>

                        <div style="position: relative;" class="popularjobs_links" id="popularJobs">

                            <div id="popularJobsContainer" class="popularJobsContainer" id="popularJobsContainer" style="display: none;"></div>

                        </div>
                        <div style="position: relative;" class="byLocation_links"  id="byLocation"></div>
                        <div id="byLocationJobsContainer" class="byLocationsJobsContainer" id="byLocationJobsContainer" style="display: none;"></div>
                        
                        <div style="border-bottom: 1px solid white; margin: 10px 0;"></div>
                       
                        <a href="{{  session('username') ? 'javascript:void(0)' : route('user.login') }}" style="color: white; text-decoration: none; opacity: 1; transition: opacity 0.3s; display: block; padding: 10px 0;" onmouseover="this.style.opacity='0.8'"
                            onmouseout="this.style.opacity='1'" onclick="loadByLocationJobs()">By Location </a>

                            <div style="position: relative;" class="byLocation_links"  id="byLocation"></div>
                            <div id="byLocationJobsContainer" class="byLocationsJobsContainer" id="byLocationJobsContainer" style="display: none;"></div>
                        </div>
                </div>
            </div>
            <div class="banner-interior" style="background-color: rgba(255, 255, 255, 0.2); padding: 10px; border-radius: 50px; cursor: pointer; transition: background-color 0.3s;"
                onmouseover="this.style.backgroundColor='rgba(0, 0, 139, 0.7)'" onmouseout="this.style.backgroundColor='rgba(255, 255, 255, 0.2)'">
                
                <a href=" {{ session('username') ? 'errors.404' : route('user.login') }}" style="color: white; text-decoration: none; opacity: 1; transition: opacity 0.3s;">Services</a>
            </div>
            <div class="banner-interior" style="background-color: rgba(255, 255, 255, 0.2); padding: 10px; border-radius: 50px; cursor: pointer; transition: background-color 0.3s;"
                onmouseover="this.style.backgroundColor='rgba(0, 0, 139, 0.7)'" onmouseout="this.style.backgroundColor='rgba(255, 255, 255, 0.2)'">
                
                <a href="{{  session('username') ? 'errors.404' : route('user.login') }}" style="color: white; text-decoration: none; opacity: 1; transition: opacity 0.3s;">FAQs</a>
            </div>
        </div>
    </div>
    <div class="auth_links" style="margin-top: 10px; position:relative; ">

        <div class="banner-interior" style="background-color: rgba(255, 255, 255, 0.2); padding: 10px; border-radius: 10px; font-size: 16px;">
        @if(!session('username'))    
        <a href="{{ route('user.login') }}" style="color: white; text-decoration: none; opacity: 1; transition: opacity 0.3s;" onmouseover="this.style.opacity='0.5'" onmouseout="this.style.opacity='1'">Login/Signup</a>
       @else
        <a href="{{ route('user.logout') }}" style="color: white; text-decoration: none; opacity: 1; transition: opacity 0.3s;" onmouseover="this.style.opacity='0.5'" onmouseout="this.style.opacity='1'">Logout</a>
         @endif    
    </div>
    
        

        <div style="margin-top: 10px; position: relative;" class="employer_links">
            <div class="banner-interior" style="background-color: rgba(255, 255, 255, 0.2); padding: 10px; border-radius: 10px; cursor: pointer;">
              
                <a href="{{  session('username') ? 'javascript:void(0)' : route('user.login') }}" style="color: white; text-decoration: none; opacity: 1; transition: opacity 0.3s;" onmouseover="this.style.opacity='0.5'" onmouseout="this.style.opacity='1'" onclick="toggleDropdown('Employer')">Employer ▾</a>
                <div class="dropdown" id="Employer" style="display: none; flex-direction: column; position: absolute; top: 100%; right: 0; background-color: rgba(0, 0, 139, 0.7); padding: 20px; border-radius: 10px; color: white; min-width: 150px;">
                    <a href="{{  session('username') ? 'javascript:void(0)' : route('user.login') }}" style="color: white; text-decoration: none; opacity: 1; transition: opacity 0.3s; display: block; padding: 10px 0;" onmouseover="this.style.opacity='0.8'" onmouseout="this.style.opacity='1'">Employer Admin</a>
                    <div style="border-bottom: 1px solid white; margin: 10px 0;"></div>
                    
                    <a href="{{  session('username') ?'javascript:void(0)' : route('user.login') }}" style="color: white; text-decoration: none; opacity: 1; transition: opacity 0.3s; display: block; padding: 10px 0;" onmouseover="this.style.opacity='0.8'" onmouseout="this.style.opacity='1'">Employer</a>
                </div>
            </div>
        </div>

       

</header>
<div class="search-bar" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; z-index: 1;">
    <div class="search-input" style="display: inline-block; background-color: white; padding: 10px; border-radius: 10px; opacity: 0.8;">
        <input type="text" placeholder="Skills/designation/companies" style="width: 300px; padding: 10px; border: none; border-radius: 10px;">
        <select name="experience" id="experience" style="padding: 10px; border: none; border-radius: 10px;">
            <option value="" disabled selected>Experience</option>
            <option value="0-2">0-2 years</option>
            <option value="3-5">3-5 years</option>
            <option value="6-10">6-10 years</option>
            <option value="11-15">11-15 years</option>
            <option value="16-20">16-20 years</option>
            <option value="21-30">21-30 years</option>
        </select>
        <select name="locations">
            <option value="" disabled selected>Locations</option>
            @foreach($locations as $location)
            <option value="{{ $location->country }}, {{ $location->state }}, {{ $location->district_city }}{{ $location->concentrated_area ? ', ' . $location->concentrated_area : '' }}">{{ $location->country }}, {{ $location->state }}, {{ $location->district_city }}{{ $location->concentrated_area ? ', ' . $location->concentrated_area : '' }}</option>
            @endforeach
        </select>
    </div>
</div>
<script>
    //by location
    function loadByLocationJobs(showAll = false){
    $.ajax({
        url : "{{ route('LocationJobsDisplay')}}",
        type : "GET",
        data : {
            showAll : showAll
        },
        success : function(data){
            console.log('Response data:', data);
            document.getElementById('byLocationJobsContainer').innerHTML = data;
            console.log('Current container content:', document.getElementById('byLocationJobsContainer').innerHTML);

            if(document.getElementById('byLocationJobsContainer').style.display === 'none'){
                    document.getElementById('byLocationJobsContainer').style.display = 'block';
                    //changed
                    document.getElementById('popularJobsContainer').style.display = 'none';
            }
            
            if (showAll) {
                    var moreLink = document.querySelector('.more-link');
                    if (moreLink) {
                        moreLink.remove();
                    }
                }
        },
        error : function(){
            alert('Failed to load locations');
        }
    });
}
//by category
    var popularJobsUrl = "{{ route('popularJobsDisplay') }}";

    // Load Popular Jobs
    function loadPopularJobs(showAll = false) {
        $.ajax({
            url: popularJobsUrl,
            type: "GET",
            data: { showAll: showAll },
            success: function(data) {
                document.getElementById('popularJobsContainer').innerHTML = data;
                console.log('Current container content:', document.getElementById('popularJobsContainer').innerHTML);
                if (document.getElementById('popularJobsContainer').style.display === 'none') {
                    document.getElementById('popularJobsContainer').style.display = 'block';
                    document.getElementById('byLocationJobsContainer').style.display = 'none';
                }
                if (showAll) {
                    var moreLink = document.querySelector('.more-link');
                    if (moreLink) {
                        moreLink.remove();
                    }
                }

            },

            error: function() {
                console.log('showAll value is:',$showAll);
                alert('failed to load popular jobs')
            }
        });
    }

    // Toggle Dropdown Menus
    function toggleDropdown(id) {
        var userLogged = "{{session('username')}}";
        if (userLogged === "") {
            event.preventDefault(); // Cancel the native event
            event.stopPropagation(); // Don't bubble/capture the event any further
            window.location.href = "{{ route('user.login') }}"; 
            return;
        }
        var dropdown = document.getElementById(id);
        if (dropdown.style.display === 'none') {
            dropdown.style.display = 'block';


        } else {
            dropdown.style.display = 'none';

        }
    }



    document.addEventListener('click', function(event) {
        var userLogged = "{{session('username')}}"; // Check if user is logged in
       // var registrationRoute = "{{ route('user.login') }}"; // URL for the registration page
        var logo = document.getElementsByClassName("logo_container");
        // Check if the clicked element is a link (<a> tag)
        if (event.target.tagName === 'A' || event.target.closest('a')) {
            var targetLink = event.target.closest('a'); // Get the actual <a> element, in case a child element was clicked
            if (!userLogged && !logo) {
                event.preventDefault(); 
                window.location.href = "{{ route('user.login') }}"; 
                return; 
             }
    }
    else {

        var employerDropdown = document.getElementById('Employer');
        var jobsDropdown = document.getElementById('Jobs');
        var suggestions = document.getElementById('suggestions');
        var locationSuggestions = document.getElementById('location-suggestions');

        if (!event.target.closest('.jobs_links') && jobsDropdown) {
            jobsDropdown.style.display = 'none';
            document.getElementById('popularJobsContainer').style.display = 'none';
            document.getElementById('byLocationJobsContainer').style.display = 'none';
        } else if (event.target.closest('.jobs_links')) {
            document.getElementById('popularJobsContainer').style.display = 'none';
            document.getElementById('byLocationJobsContainer').style.display = 'none';
        }

        if (!event.target.closest('.employer_links') && employerDropdown) {
            employerDropdown.style.display = 'none';
        }
        }
});

</script>
<!-- Main content section with full-screen image -->
<!-- @yield('jobSearch') -->
<div class="main-content">

    <img src="/image/man-search-hiring-job-online-from-laptop_1150-52728.png" alt="Image" class="img-fluid" style="width: 100%; height: 100vh; object-fit: cover;">
</div>
</body>

</html>