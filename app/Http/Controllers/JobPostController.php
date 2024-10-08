<?php

namespace App\Http\Controllers;

use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\job_post;
use Illuminate\Support\Facades\DB;

class JobPostController extends Controller
{
    public function jobpost()
    {
        return view('super.jobpost');
    }

    public function store(Request $request)
    {
         // Validate the form data
         $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z0-9\s\-\(\)\[\]]+$/'],
            'years_of_experience' => ['required','string', 'max:255'],
            'salary' => ['nullable','string','max:255'],
            'qualification' => [ 'nullable','string', 'max:255'],
            'technology' => ['nullable','string', 'max:255'],
            'description' => ['required', 'string', 'max:1000'],
            'work_mode' => ['required', 'string', 'in:Remote,On-site,Hybrid'],
            'post_date' => ['required', 'date'],
            'status' => ['required', 'string', 'in:open,closed'],
            'company' => ['required','string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'email' => ['required','string',  'email'],
            'phone' => [ 'required','string', 'max:255'],
            'country_code' => ['required','string','max:255'],
        ]);

       // Create a new job post
       $jobPost = new job_post();

       $jobPost->title = $request->title;
       $jobPost->years_of_experience = $request->years_of_experience;
       $jobPost->salary = $request->salary;
       $jobPost->qualification = $request->qualification;
       $jobPost->skills = $request->skills;
       $jobPost->description = $request->description;
       $jobPost->work_mode = $request->work_mode;
       $jobPost->post_date = $request->post_date;
       $jobPost->status = $request->status;
       $jobPost->company = $request->company;
       $jobPost->location = $request->location;
       $jobPost->email = $request->email;
       $jobPost->phone = $request->phone;
       $jobPost->country_code = $request->country_code;
       $jobPost->save();

      // Redirect the user with a success message
      return redirect()->route('SuperAdmin.super')->with('success', 'Job post created successfully!');
    }

public function jobpostsearch()
       {
        return view('super.jobpostsearch');
         
       }

public function search(Request $request)
        {
         
         $search = $request->input('search'); // Get the search term from the form
         $datas= Job_post::orderBy('post_date', 'desc')->where('title', 'LIKE', "%$search%")
            ->get();

       return view('super.jobpostsearch',compact('datas'));
        
        }
public function jobpostshow()
        {
         return view('super.jobpostshow');
          
        }


public function show(Request $request)
       {
         
        $id = $request->input('id');  
        $datas = DB::table('Job_posts')
                ->where('id', 'LIKE', "%$id%")
                ->get();
       
        return view('super.jobpostshow',compact('datas'));
      }

}  