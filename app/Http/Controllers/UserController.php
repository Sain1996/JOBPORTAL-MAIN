<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\job_seeker;
use Illuminate\Http\Request;
use App\Models\Location; // Import the Location model
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function home()
    {
        $locations = Location::all();
        return view('welcome', compact('locations'));
    }

    public function loginSignup()
    { 
        return view('login-signup');
    }
    public function logout(Request $request){
        
        $request->session()->flush();
        return redirect()->route('welcome');
    }

public function login(Request $request){
      
       $username = $request->input('username');
       $password = $request->input('password');
       $user = job_seeker::where('username', $username)->first();

       // Debugging: Log the values for inspection
       Log::info("Username: $username, Password: $password, User: ".print_r($user, true));

       // Check if the user exists
       if (!$user) {
           return response()->json(['error' => 'invalid_username'], 422);
       }
       
      
       if ($user && $password === $user->password) { 
           // Store username in session
           $request->session()->put('username', $username);
           // Authentication successful, redirect to welcome page
           return redirect()->route('welcome');
          
           
       } else {
           return response()->json(['error' => 'wrong_password'], 422);
       }
}
   //by category
public function getPopularJobs(Request $request)
    {

        $showAll = $request->query('showAll', false);

        $showAll = filter_var($showAll, FILTER_VALIDATE_BOOLEAN);

        if ($showAll === false) {
            $jobs = category::take(5)->get();
        } else {

            $jobs = category::all();
        }
        return view('popularJobsDisplay', compact('jobs', 'showAll'))->render();
    }
    //by location
    public function getbyLocationJobs(Request $request){

        $showAll = $request->query('showAll', false);

        $showAll = filter_var($showAll, FILTER_VALIDATE_BOOLEAN);

        if ($showAll === false) {
            
            $locations = Location::take(5)->get();
        } 

        else {
       
          $locations = Location::all();
       }

        return view('byLocationJobsDisplay', compact('locations', 'showAll'))->render();
    } 
    public function redirectToLogin()
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            // Redirect to registration page if not logged in
            return redirect()->route('user.login');
        }
        return abort(404);
    }
}
