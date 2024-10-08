<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidationController extends Controller
{
    public function validateField(Request $request, $field)
{
    // Define validation rules for each field
    $rules = [
        'first_name' => 'required|string|max:50|regex:/^[a-zA-Z]+$/',
        'last_name' => 'required|string|max:255|',
        'username' => 'required|string|max:255|unique:job_seekers', // Example rule for username uniqueness
        'email' => 'required|string|email|max:255|unique:job_seekers', // Example rule for email uniqueness
        'password' => 'required|string|min:8', // Example rule for password length
        'phone' => 'required|string|max:50', // Example rule for phone number
        // 'country_code' => 'required|string|max:255',
        'area_of_work' => 'required|string|max:255',
        'total_experience' => 'required|string|max:255',
        'relevant_experience' => 'required|string|max:255',
        'designation' => 'required|string|max:255',
        'current_ctc' => 'required|string|max:255',
        'expected_ctc' => 'required|string|max:255',
        'current_company' => 'required|string|max:255',
        'cv' => 'required|file|max:10240', // Example rule for file upload
    ];

    // Validate the specified field
    $validator = validator($request->all(), [$field => $rules[$field]]);

    // Check if validation fails
    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'message' => $validator->errors()->first($field)
        ]);
    }

    // If validation passes
    return response()->json(['success' => true]);
}
}
