<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Validator;
use App\Http\Requests\RecruiterRequest;
use App\Events\UserRegistered;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\register;
use App\Models\SubscriptionPlan;
use Illuminate\Support\Facades\DB;
use App\Models\recruiter;
use App\Models\recruiteradmin;
use App\Rules\AlphaCharactersOnly;
use Carbon\Carbon;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\job_type;
use App\Models\job_seeker;
use App\Models\archieveduser;
use App\Models\showarchieveduser;
use App\Models\dd_technologies;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;

class SuperAdminController extends Controller
{
// Super admin functionality goes here
    public function  super() 
    {
        return view('super.superadmin');
    }
    public function getregister(Request $request)
    {
        // Check if the number of existing users is less than 3
        if (register::count() < 30) {
            // Create a new user
            $data = new register();
            $data->first_name = $request->first_name;
            $data->last_name = $request->last_name;
            $data->username = $request->username;
            $data->email = $request->email;
            $data->password = $request->password;
            $data->save();
            event(new UserRegistered($data));
            $request->validate([
                'email' => 'required|email',
                // Other validation rules for other fields
            ]);
            Config::set('uname', $data->username);
            Config::set('pw',  $data->password);
            redirect()->route('SuperAdmin.login')->with('success', 'Registration Successful. A welcome e-mail will be sent to the registered e-mail address.');

            return Mail::to($data->email)->send(new WelcomeEmail());
        } else {
            return redirect()->back()->with('error', 'Registration limit reached.');
        }
    }
    
    public function register(Request $request)
    {
        
        return view('super.register');


    }
   public function login()
   {
    return view('super.loginpage');
   }
   

   public function postLogin(Request $request)
   {
       $username = $request->input('username');
       $password = $request->input('password');
   
       // Retrieve the user by the provided username
       $user = Register::where('username', $username)->first();
       // Debugging: Log the values for inspection
       Log::info("Username: $username, Password: $password, User: ".print_r($user, true));
       // Check if the user exists
       if (!$user) {
           return response()->json(['error' => 'invalid_username'], 422);
       }
       // Verify the password
       if ($password === $user->password) { // Direct comparison for debugging, replace with proper hashing check
           // Store username in session
           $request->session()->put('username', $username);
           // Authentication successful, redirect to home page
           return response()->json(['redirect' => route('SuperAdmin.super')]);
       } else {
           return response()->json(['error' => 'wrong_password'], 422);
       }
   }

public function logout(Request $request)
{
     // Clear the user session data
     $request->session()->flush();


    return redirect()->route('SuperAdmin.login');
}

    
public function forgotpassword()
   {
    return view('super.forgotpassword');
   }


public function cvsearch()
{
   
    $designations = DB::table('dd_designation')->pluck('designation');
    $technologies = DB::table('dd_technologies')->pluck('technology');
 

 return view('super.cvsearch', compact('designations', 'technologies'));

}
public function postrecruiteradmin(Request $request)
{
    try{
        
// Create a new user
$recruiteradmin = new recruiteradmin();
$recruiteradmin->Firstname = $request->firstname;
$recruiteradmin->Secondname = $request->secondname;
$recruiteradmin->Username = $request->username;
$recruiteradmin->Companyname = $request->companyname;
$recruiteradmin->Emailaddress = $request->email;
$recruiteradmin->Password = $request->password;
$recruiteradmin->Subscription = $request->subscription;
// event(new UserRegistered($data));
$recruiteradmin->save();
// Validate form inputs

Config::set('uname', $recruiteradmin->Username);
Config::set('pw',  $recruiteradmin->Password);
redirect()->back()->with('success', 'Recruiter Admin Profile Created Successfully. A welcome e-mail will be sent to the registered e-mail address.');
return Mail::to($recruiteradmin->Emailaddress)->send(new WelcomeEmail());
 }catch (\Exception $e) {
    // If any exception occurs, handle it
    return redirect()->back()->with('error', 'Error creating Recruiter Admin:'.$e);
    } 
}
public function getrecruiteradmin(Request $request)
{
    $subscriptionPlans = SubscriptionPlan::where('status', 1)->get();
    return view('super.recruiteradmin', compact('subscriptionPlans'));
}

public function postrecruiter(Request $request)
{
       try{

          // Create a new user
        $recruiter = new recruiter();
          $recruiter->Firstname = $request->firstname;
          $recruiter->Secondname = $request->secondname;
          $recruiter->Username = $request->username;
          $recruiter->Companyname = $request->companyname;
          $recruiter->Emailaddress = $request->email;
          $recruiter->Password =  $request->password;
          $recruiter->Subscription = $request->subscription;
         
           // event(new UserRegistered($data));
          Config::set('uname', $recruiter->Username);
          Config::set('pw',  $recruiter->Password);
          $recruiter->save();
        redirect()->back()->with('success', 'Recruiter Profile Created Successfully. A welcome e-mail will be sent to the registered e-mail address.');
            
         return Mail::to($recruiter->Emailaddress)->send(new WelcomeEmail());
    }catch (\Exception $e) {
        // If any exception occurs, handle it
        return redirect()->back()->with('error', 'Error creating recruiter: '.$e);
    } 
}
public function getrecruiter(Request $request)
{
    $subscriptionPlans = SubscriptionPlan::where('status', 1)->get();
    return view('super.recruiter', compact('subscriptionPlans'));
}



public function archievedusers(Request $request)
{
    
    
    $data = Archieveduser::select('id','first_name', 'last_name', 'created_at')->get();
    $userArray = [];
    foreach ($data as $user) 
    {
    $userArray[] = [
        'id' => $user->id,
        'first_name' => $user->first_name,
        'last_name' => $user->last_name,
        'created_at' => $user->created_at,
    ];
    }
  return view('super.archievedusers', ['data' => $userArray]);

}


public function showarchieveduser(Request $request)
{
    $archieveduser = new showarchieveduser();
    $archieveduser = archieveduser::find($request->id); // Assuming you are using Soft Deletes
    // If you are not using Soft Deletes, you can use User::find($id);

    if (!$archieveduser) {
        abort(404, 'User not found');
    }

    return view('super.showarchieveduser', compact('archieveduser'));
}

public function validatePassword($password, $confirmPassword)
{
    if ($password !== $confirmPassword) {
        return "Password and Confirm Password do not match.";
    }   
    return ""; // Return an empty string if validation passes
}

public function reg_jobseeker() {
    $job_types = job_type::all();
    $technologies = dd_technologies::where('verified', 1)->select('id','technology')->get();
    $userArray = [];
    foreach ($technologies as $user) {
        $userArray[] = [
            'id' => $user->id,
            'technology' => $user->technology
        ];
    }
    return view('super.jobseeker', compact('job_types', 'userArray'));
}

public function postregjobseeker(Request $request)
{
    // Validate form inputs
    $validatedData = $request->validate([
        'first_name' => 'required|string|max:50|regex:/^[a-zA-Z\s`]+$/',
        'last_name' => 'required|string|max:50|regex:/^[a-zA-Z\s`]+$/',
        'username' => 'required|string|min:8|max:15|regex:/^[a-zA-Z]+$/|unique:job_seekers',
        'email' => 'required|string|email|max:255|unique:job_seekers',
        'password' => 'required|string|min:8|max:15', // Enforce minimum length of 8 characters
        'phone' => 'required|string|max:50|unique:job_seekers',
        'country_code' => 'required|string|max:255',
        'area_of_work' => 'required|string|max:255',
        'technologies' => 'array|min:3|max:5',
        'total_experience' => 'required|string|max:255',
        'relevant_experience' => 'required|string|max:255',
        'designation' => 'required|string|max:255',
        'current_ctc' => 'required|string|max:255',
        'expected_ctc' => 'required|string|max:255',
        'current_company' => 'required|string|max:255',
        'cv' => 'required|file|mimes:doc,docx,pdf|max:3000',
    ]);
    // Create job seeker instance
    $jobSeeker = new job_Seeker();
    //$jobSeeker->fill($validatedData);

    // Handle file upload for CV
    if ($request->hasFile('cv')) {
        $cvPath = $request->file('cv')->store('cv_files');
        $jobSeeker->cv = $cvPath;
    }
    
$jobSeeker->first_name = $request->first_name;
$jobSeeker->last_name = $request->last_name;
$jobSeeker->username = $request->username;
$jobSeeker->email = $request->email;
$jobSeeker->password = $request->password;
$jobSeeker->phone = $request->phone;
$jobSeeker->country_code = $request->country_code;
$jobSeeker->area_of_work = $request->area_of_work;
$jobSeeker->total_experience = $request->total_experience;
$jobSeeker->relevant_experience = $request->relevant_experience;
$jobSeeker->designation = $request->designation;
$jobSeeker->current_ctc = $request->current_ctc;
$jobSeeker->expected_ctc = $request->expected_ctc;
$jobSeeker->current_company = $request->current_company;
        // Handle file upload for CV
        // Ensure to store the file in the appropriate directory and save the file path in the database
if(isset($request['technologies']))
{
    $jobSeeker->technologies = json_encode($request['technologies']);
}   
else{
    $jobSeeker->technologies = "Not Applicable";
}     
    // Save the job seeker to the database
    $jobSeeker->save();
    Config::set('uname', $jobSeeker->username);
    Config::set('pw',  $jobSeeker->password);
    redirect()->back()->with('success', 'Job Seeker Profile Created Successfully. A welcome e-mail will be sent to the registered e-mail address.');
    return Mail::to($jobSeeker->email)->send(new WelcomeEmail());

    // Rest of the code remains the same...
}
public function jobpostsearch(): Factory|View
       {
           
        $data= Archieveduser::all();
           
        return view('super.jobpostsearch',compact('data'));
       }

        

         // Logic to fetch users or perform any other actions
    public function Manageuser()
    {
        // Logic to fetch users or perform any other actions
         // Example: Fetch all users
        
        // Return the view with the users data
        return view('super.Manageuser');
    }

      // SuperAdminController.php

      public function searchUsers(Request $request)
      {
          $keyword = $request->input('keyword');
      
          // Search for the keyword in job_seekers
          $job_seekers = job_seeker::where('first_name', 'like', "%$keyword%")
              ->orWhere('last_name', 'like', "%$keyword%")
              ->get()
              ->map(function ($user) {
                  $user->type = 'Job Seeker';
                  return $user;
              });

                  // Search for the keyword in recruiter_admins
          // Search for the keyword in recruiter_admins
             $recruiteradmins = recruiteradmin::select('firstname as first_name', 'Secondname as last_name')
                ->where('firstname', 'like', "%$keyword%")
               ->orWhere('Secondname', 'like', "%$keyword%")
                ->get()
                ->map(function ($user) {
                $user->type = 'Recruiter Admin';
                return $user;
                });


                // Search for the keyword in recruiters
                $recruiters = recruiter::select('firstname as first_name', 'Secondname as last_name')
                ->where('firstname', 'like', "%$keyword%")
                ->orWhere('Secondname', 'like', "%$keyword%")
                ->get()
                ->map(function ($user) {
                $user->type = 'Recruiter';
                return $user;
                });


           // Search for the keyword in registers
           $super_admins = Register::where('first_name', 'like', "%$keyword%")
               ->orWhere('last_name', 'like', "%$keyword%")
               ->orWhereRaw("CONCAT(first_name, ' ', last_name) LIKE '%$keyword%'")
               ->get()
               ->map(function ($user) {
                   $user->type = 'Super Admin';
                   return $user;
               });

                 // Merge all search results
           $users = $job_seekers->merge($recruiteradmins)->merge($recruiters)->merge($super_admins);
       
           // Return the HTML for the dynamic user list
           return view('super.user_list', ['users' => $users])->render();
       }
       

       public function updateUsers(Request $request): RedirectResponse
       {
           // Update each user
           foreach ($request->users as $userId => $userData) {
               $user = User::find($userId);
   
               if ($user) {
                   // Update user information
                   $user->update($userData);
                   // Save to the respective database
                   $user->save();
               }
           }
   
           return redirect()->back()->with('success', 'Users updated successfully.');
       }

       public function search(Request $request)
        {
            
          
         $search = $request->input('search'); // Get the search term from the form
         $data= Archieveduser::orderBy('created_at', 'desc')->where('first_name', 'LIKE', "%$search%")
            ->orWhere('last_name', 'LIKE', "%$search%")
            ->orWhereRaw("CONCAT(first_name, ' ', last_name) LIKE '%$search%'")
            ->get();

        return view('super.jobpostsearch',compact('data'));
}
public function manageTechnologies() {
    try {
        $technologies = dd_technologies::get();
        return view('super.technologies', compact('technologies'));
    } catch (\Exception $e) {
        // Handle the exception, for example:
        return view('super.technologies', compact('technologies'))->withErrors(['Error retrieving technologies: ' . $e->getMessage()]);
    }
}
public function storeTechnology(Request $request) {
    $validatedData = $request->validate([
        'name' => 'required|unique:dd_technologies,technology',
    ]);

    $newTechnology = new dd_technologies();
    $newTechnology->technology = $validatedData['name'];
    $newTechnology->verified = 0;
    $newTechnology->save();

    return back()->with('success', 'New technology added successfully!');
}
public function updateVerified(Request $request) {
    $technology = dd_technologies::find($request->technology_id);
    $technology->verified = $request->verified ? 1 : 0;
    $technology->save();
    return redirect()->back();
}
public function manageSubscriptionPlans()
{
    try {
        $subscriptionPlans = SubscriptionPlan::get();
        return view('super.subscriptionplans', compact('subscriptionPlans'));
    } catch (\Exception $e) {
        // Handle the exception, for example:
        return view('super.subscriptionplans', compact('subscriptionPlans'))->withErrors(['Error retrieving subscription plans: ' . $e->getMessage()]);
    }
}

public function storeSubscriptionPlan(Request $request)
{
    $validatedData = $request->validate([
        'plan' => 'required|unique:subscription_plans,plan',
        'amount' => 'required|numeric',
    ]);

    $newSubscriptionPlan = new SubscriptionPlan();
    $newSubscriptionPlan->plan = $validatedData['plan'];
    $newSubscriptionPlan->amount = $validatedData['amount'];
    $newSubscriptionPlan->status = 0; // Default status, can be changed later
    $newSubscriptionPlan->save();

    return back()->with('success', 'New subscription plan added successfully!');
}

public function updateSubscriptionPlanStatus(Request $request)
{
    SubscriptionPlan::where('plan', $request->plan)->update(['status' => $request->status ? 1 : 0]);
    return redirect()->back();


}

}    

