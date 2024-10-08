<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
    <link rel="stylesheet" href="(link unavailable)">
    <style>
        body {
            background-image: none;
        }

        .banner-interior {
            background-image: none;
        }

        .main-content {
            background-image: url('/image/man-search-hiring-job-online-from-laptop_1150-52728.png');
            background-size: cover;
            background-position: center;
            height: 100vh;
            padding-top: 100px;
            background-color: #f0f0f0;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #ccc;
            width: 400px;
            margin: 40px auto;
            padding: 20px;
        }

        .login-form {
            background-color: #ffffff;
            border-radius: 20px;
            border: 2px solid #ADD8E6;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .login-form:hover {
            border-color: #00698f;
        }

        .form-item {
            display: flex;
            flex-direction: row;
            align-items: center;
            margin-bottom: 20px;
        }

        .form-item label {
            width: auto;
            margin-right: 10px;
            text-align: right;
        }

        .form-control {
            flex: 1;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            width: auto;
        }

        .form-control:focus {
            border-color: #00698f;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .btn-submit {
            width: auto;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 50px;
            transition: background-color 0.3s;
            background-color: #ADD8E6;
            border-color: #ADD8E6;
            display: inline-block;
            display: block;
            margin: 0 auto;
        }

        .btn-submit:hover {
            background-color: #00698f;
        }

        .banner-interior {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .banner-interior a {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            padding-bottom: 0;
        }

        .jobs_links {
            margin-top: 0;
            display: flex;
            align-items: center;
        }

        .employer_links {
            margin-top: 0;
            display: flex;
            align-items: center;
            position: relative;
            top: -5px;
        }

        .login-form h2 {
            text-align: center;
            color: #ADD8E6; /* light blue color */
            font-weight: bold;
            font-size: 24px;
            margin-bottom: 20px;
            transition: color 0.3s; /* add transition effect */
        }
        .login-form:hover h2 {
            color: #00698f; /* dark blue color on hover */
        }
        .links {
            text-align: center;
            margin-bottom: 10px;
        }

        .link {
            color: #00698f; /* dark blue color */
            text-decoration: none;
            transition: color 0.3s, opacity 0.3s;
        }

        .link:hover {
            color: #003366; /* darker blue color on hover */
            opacity: 0.8; /* reverse effect, becomes lighter on hover */
        }

        .link i {
            font-size: 16px; /* adjust icon size */
        }


    </style>
</head>
<body>
<header style="background-color: rgba(0, 119, 182, 0.7); padding: 20px; color: white; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
    <div class="logo_container" style="display: flex; align-items: center;">
        <div class="banner-interior" style="background-color: rgba(255, 255, 255, 0.2); padding: 10px; border-radius: 10px;">
            <a href="/">
                <img src="{{ asset('image/ay.jpg') }}" width="100px" style="max-width: 100%; height: auto; opacity: 1; transition: opacity 0.3s;" onmouseover="this.style.opacity='0.8'" onmouseout="this.style.opacity='1'">
            </a>
        </div>
        <div style="display: flex; gap: 20px; margin-left: 20px;">
            <div style="position: relative;" class="jobs_links">
            <div class="banner-interior" style="background-color: rgba(255, 255, 255, 0.2); padding: 10px; border-radius: 10px; cursor: pointer;">
            <a href="javascript:void(0)" style="color: white; text-decoration: none; opacity: 1; transition: opacity 0.3s;" onmouseover="this.style.opacity='0.5'" onmouseout="this.style.opacity='1'" onclick="toggleDropdown('Jobs')">Jobs ▾</a>
            <div class="dropdown" id="Jobs" style="display: none; flex-direction: column; position: absolute; top: 100%; right: 0; background-color: rgba(0, 0, 139, 0.7);">
                <a href="errors.404" style="color: white; text-decoration: none; opacity: 1; transition: opacity 0.3s; display: block; padding: 10px 0;" onmouseover="this.style.opacity='0.8'" onmouseout="this.style.opacity='1'">By Category</a>
                <div style="border-bottom: 1px solid white; margin: 10px 0;"></div>
                <a href="errors.404" style="color: white; text-decoration: none; opacity: 1; transition: opacity 0.3s; display: block; padding: 10px 0;" onmouseover="this.style.opacity='0.8'" onmouseout="this.style.opacity='1'">By Location</a>
            </div>
        </div>
    </div>
    <div style="margin-top: 10px; position: relative;" class="employer_links">
        <div class="banner-interior" style="background-color: rgba(255, 255, 255, 0.2); padding: 10px; border-radius: 10px; cursor: pointer;">
            <a href="javascript:void(0)" style="color: white; text-decoration: none; opacity: 1; transition: opacity 0.3s;" onmouseover="this.style.opacity='0.5'" onmouseout="this.style.opacity='1'" onclick="toggleDropdown('Employer')">Employer ▾</a>
            <div class="dropdown" id="Employer" style="display: none; flex-direction: column; position: absolute; top: 100%; right: 0; background-color: rgba(0, 0, 139, 0.7); padding: 20px; border-radius: 10px; color: white; min-width: 150px;">
                <a href="errors.404" style="color: white; text-decoration: none; opacity: 1; transition: opacity 0.3s; display: block; padding: 10px 0;" onmouseover="this.style.opacity='0.8'" onmouseout="this.style.opacity='1'">Employer Admin</a>
                <div style="border-bottom: 1px solid white; margin: 10px 0;"></div>
                <a href="errors.404" style="color: white; text-decoration: none; opacity: 1; transition: opacity 0.3s; display: block; padding: 10px 0;" onmouseover="this.style.opacity='0.8'" onmouseout="this.style.opacity='1'">Employer</a>
            </div>
        </div>
    </div>
    <div class="banner-interior" style="background-color: rgba(255, 255, 255, 0.2); padding: 10px; border-radius: 50px; cursor: pointer; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='rgba(0, 0, 139, 0.7)'" onmouseout="this.style.backgroundColor='rgba(255, 255, 255, 0.2)'">
        <a href="errors.404" style="color: white; text-decoration: none; opacity: 1; transition: opacity 0.3s;">Services</a>
    </div>
    <div class="banner-interior" style="background-color: rgba(255, 255, 255, 0.2); padding: 10px; border-radius: 50px; cursor: pointer; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='rgba(0, 0, 139, 0.7)'" onmouseout="this.style.backgroundColor='rgba(255,255,255,0.2)'">
    <a href="errors.404" style="color: white; text-decoration: none; opacity: 1; transition: opacity 0.3s;">FAQs</a>
</div>
</div>
</div>
</header>
<div class="main-content">
<div class="login-container">
<div class="login-form">
    @if(session('success'))
    <div class="alert alert-success">
        <span>{{ session('success') }}</span>
    </div>
    @endif
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <h2>Login</h2>
    <form id="loginForm" action="{{ route('login') }}" method="post">
        @csrf
        <div class="form-item">
            <label for="username">Username :</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="Enter your username here" required>
        </div>
        <div class="form-item">
        <label for="password">Password :</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password here" required>
        </div>
        <div class="links">
            <a href="{{ route('SuperAdmin.forgotpassword') }}" class="link">Forgot Password? <i class="fas fa-lock"></i></a>
        </div>
        <div class="links">
            <a href="{{ route('SuperAdmin.reg_jobseeker') }}" class="link">Are you new here? Click this link to Sign Up.</a>
        </div>
        <button type="submit" class="btn-submit">Submit</button>
    </form>
</div>
</div>
</div>
</body>
</html>

