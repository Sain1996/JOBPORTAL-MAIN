<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/superadmin.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@23.3.2/build/css/intlTelInput.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<link rel="icon" href="image/ay2.png" type="image/icon type">
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style>
    body {
    font-family: 'Helvetica', sans-serif; /* Replace 'Arial' with your desired font */
}
.dropdown-submenu {
    position:relative;
}
.dropdown-submenu>.dropdown-menu {
    top:0;
    left:100%;
    margin-top:-6px;
    margin-left:-1px;
    -webkit-border-radius:0 6px 6px 6px;
    -moz-border-radius:0 6px 6px 6px;
    border-radius:0 6px 6px 6px;
}
.dropdown-submenu:hover>.dropdown-menu {
    display:block;
}
.dropdown-submenu>a:after {
    display:block;
    content:" ";
    float:right;
    width:0;
    height:0;
    border-color:transparent;
    border-style:solid;
    border-width:5px 0 5px 5px;
    border-left-color:#cccccc;
    margin-top:5px;
    margin-right:-10px;
}
.dropdown-submenu:hover>a:after {
    border-left-color:#ffffff;
}
.dropdown-submenu.pull-left {
    float:none;
}
.dropdown-submenu.pull-left>.dropdown-menu {
    left:-100%;
    margin-left:10px;
    -webkit-border-radius:6px 0 6px 6px;
    -moz-border-radius:6px 0 6px 6px;
    border-radius:6px 0 6px 6px;
}

        /* Custom Styles */
        body {
            background-color: #f0f8ff; /* Light blue background */
            margin-bottom: 200px; /* Adjust margin to push footer further down */
        }
        .header {
            background-color: #0077b6; /* Set header background color to blue */
            color: white; /* Set header text color to white */
        }
        .navbar {
            background-color: #0096c7 !important; /* Set navbar background color to blue */
            position:relative;
        }
        .navbar a {
  
           padding: 12px;
           color: white;
           text-decoration: none; 
           font-size: 20px;
  
        }
        li a {
        display: block;
        color: white;
        padding: 14px 16px;
        text-decoration: none;
        }

        .main-content {
            padding: 20px;
        }
        .main-content img {
            width: 100%;
            height: auto;
            display: block;
            margin: auto;
            max-height: calc(100vh - 200px); /* Adjust as needed */
        }
        .form-container {
            margin-top: 20px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        footer {
            background-color: #0077b6;
            color: white;
            text-align: center;
            padding: 20px 0;
            width: 100%;
            margin-top: 200px; /* Adjust margin to push footer further down */
        }
        

    </style>
</head>
<body>

<div class="super_container">
    <header class="header">
        <!-- Top Bar -->
        <div class="text-center p-3"></div>

        <!-- Header Main -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <!-- Logo -->
                    <div class="col-lg-1 col-sm-3 col-3">
                        <div class="logo_container">
                           <a href="{{ url()->current() }}"> <img src="image/ay.jpg" width="100px"></a>
                        </div>
                    </div>
                    @if(session('username'))
            <!-- Display username if session exists -->
            <!-- Display username if session exists -->
          @if(session('username'))
                     <div class="col-lg-2 col-sm-3 col-3">
                          <div class="username_text">
                           <span class="text-primary">Welcome, {{ session('username') }}</span>
                          </div>
                    </div>
           @endif
            @endif

                    <!-- Top Bar Content -->
                    <div class="col-lg-11 col-sm-9 col-9 text-right">
                        <div class="top_bar_user">
                            <div class="user_icon"><img src="image/images.png" height="20px" width="30px"></div>
                            <div class="auth_links">
                        @if(session('username'))
                <!-- If session exists, display Logout -->
                         <a href="{{ route('SuperAdmin.logout') }}">Log Out</a>
                        @else
                <!-- If session does not exist, display Login -->
                          <a href="{{ route('SuperAdmin.login') }}">Log In</a>
                        
                                <span class="divider">|</span>
                                <a href="{{ route('SuperAdmin.register') }}">Sign Up</a>
                        @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Navigation -->
        <nav class="main_nav navbar navbar-expand-lg">
            <div class="container">       
                <div class="row">
                    <div class="col">
                        <div class="main_nav_content d-flex flex-row">
                            <!-- Categories Menu -->
                            
 <div class="container" > @if(session('username'))
   <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"><img src="image/download.png" height="25px" width="25px">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <li class="dropdown">
          <a href="#" style="color:white;" onMouseOver="this.style.color='black'" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Manage</a>
          <ul class="dropdown-menu">
                        <li class="dropdown-submenu">
                          <a tabindex="-1" href="#" style="color:black;" onMouseOver="this.style.color='black'" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Job Post</a>
                          <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="{{route('JobPost.jobpost')}}">Create</a></li>
                            <li><a tabindex="-1" href="{{route('JobPost.jobpostsearch')}}">Edit/Remove</a></li>
                        </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#" style="color:black;" onMouseOver="this.style.color='black'" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="ture">Users</a>
                            <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                              <a href="#"style="color:black;" onMouseOver="this.style.color='black'"  role="button" aria-haspopup="true" aria-expanded="true">Create</a>
                              <ul class="dropdown-menu">
                                  <li>
                                  <a href="{{route('SuperAdmin.getrecruiteradmin') }}">Recruiter Admin</a>
                                  </li>
                                  <li>
                                    <a href="{{route('SuperAdmin.getrecruiter') }}">Recruiter</a>  
                                  </li>
                                  <li><a href="{{ route('SuperAdmin.reg_jobseeker') }}">Job Seeker</a></li>
                              </ul>
                                    </li>
                               <li><a tabindex="-1" href="#" style="color:black;" onMouseOver="this.style.color='black'"  role="button">Edit/Remove</a></li>
            
                          </ul>
                        </li>
                        <li class="dropdown">
                            <a tabindex="-1" href="errors.404" >FAQ</a>
                        </li>
                        <li class="dropdown">
                            <a tabindex="-1" href="errors.404" >Area of Work</a>
                        <li>
                        <a href="{{ route('locations.index') }}">Locations</a> <!-- Add this line -->
                         </li>
                        <li class="dropdown">
                        <a tabindex="-1" href="{{ route('subscription.plans') }}">Subscription Plans</a>
                        </li>
                        </ul>
                        </li>
        <a href="{{ route('SuperAdmin.archievedusers') }}" style="color:white;"  onMouseOver="this.style.color='black'">Archieved Users</a>
          
        <a href="{{ route('SuperAdmin.cvsearch') }}" style="color:white;" onMouseOver="this.style.color='black'">Search CVs</a>
        </li>
      </ul>  @endif  
    </div><!-- /.navbar-collapse -->
    
  </div><!-- /.container-fluid -->
</div>
</div>
<script type="text/javascript">
$(document).ready(function(){

});
</script>



            



                            <!-- Menu Trigger -->
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    @yield('content')
    </script>
    
    <!-- Other meta tags and stylesheets -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@23.3.2/build/js/intlTelInput.min.js"></script>



    <!-- Footer -->
    <footer>
        <!-- Grid container -->
        <div class="container">
            <!-- Section: Links -->
            <!-- Your footer content here -->
        </div>
        <!-- Grid container -->
    </footer>
    <!-- Footer -->
</div>

</body>
</html>
