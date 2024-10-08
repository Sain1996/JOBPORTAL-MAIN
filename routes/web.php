<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\LocationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/super', [SuperAdminController::class,'super'])->name('SuperAdmin.super');
Route::get('/super/home',[SuperAdminController::class,'home'])->name('SuperAdmin.home');
Route::get('/super/register',[SuperAdminController::class,'register'])->name('SuperAdmin.register');
Route::get('/super/login',[SuperAdminController::class,'login'])->name('SuperAdmin.login');
Route::post('/super/getregister',[SuperAdminController::class,'getregister'])->name('SuperAdmin.getregister');
Route::post('/super/postlogin',[SuperAdminController::class,'postlogin'])->name('SuperAdmin.postlogin');
Route::get('/super/cvsearch',[SuperAdminController::class,'cvsearch'])->name('SuperAdmin.cvsearch');
Route::get('/super/recruiteradmin',[SuperAdminController::class,'recruiteradmin'])->name('SuperAdmin.recruiteradmin');
Route::get('/technologies', [SuperAdminController::class, 'manageTechnologies'])->name('technologies');
Route::post('/technologies', [SuperAdminController::class, 'storeTechnology'])->name('store.technology');
Route::patch('/technologies/{id}', [SuperAdminController::class, 'updateVerified'])->name('update.verified');
Route::get('/subscription-plans', [SuperAdminController::class, 'manageSubscriptionPlans'])->name('subscription.plans');
Route::post('/subscription-plans', [SuperAdminController::class, 'storeSubscriptionPlan'])->name('store.subscription.plan');
Route::patch('/subscription-plans/{plan}', [SuperAdminController::class, 'updateSubscriptionPlanStatus'])->name('update.subscription.plan.status');
Route::get('/super/recruiter',[SuperAdminController::class,'recruiter'])->name('SuperAdmin.recruiter');
Route::get('/super/getrecruiteradmin',[SuperAdminController::class,'getrecruiteradmin'])->name('SuperAdmin.getrecruiteradmin');
Route::post('/super/postrecruiteradmin',[SuperAdminController::class,'postrecruiteradmin'])->name('SuperAdmin.postrecruiteradmin');
Route::get('/super/getrecruiter',[SuperAdminController::class,'getrecruiter'])->name('SuperAdmin.getrecruiter');
Route::post('/super/postrecruiter',[SuperAdminController::class,'postrecruiter'])->name('SuperAdmin.postrecruiter');
Route::get('/super/jobseeker',[SuperAdminController::class,'reg_jobseeker'])->name('SuperAdmin.reg_jobseeker');
Route::post('/super/postregjobseeker',[SuperAdminController::class,'postregjobseeker'])->name('SuperAdmin.postregjobseeker');
//Route::post('/validate/{field}', 'ValidationController@validateField');
# Route::get('/super/faq',[SuperAdminController::class,'faq'])->name('SuperAdmin.faq');
# Route::get('/super/technologies_mgmt',[SuperAdminController::class,'technologies_mgmt'])->name('SuperAdmin.technologies_mgmt');
# Route::get('/super/subscription_mgmt',[SuperAdminController::class,'subscription_mgmt'])->name('SuperAdmin.subscription_mgmt');

#Route::get('/super/areaofwork',[SuperAdminController::class,'areaofwork'])->name('SuperAdmin.areaofwork');
Route::get('/super/archievedusers',[SuperAdminController::class,'archievedusers'])->name('SuperAdmin.archievedusers');
Route::get('/super/archieveduser/{id}', [SuperAdminController::class, 'showarchieveduser'])->name('SuperAdmin.showarchieveduser');
Route::get('/super/validatePassword',[SuperAdminController::class,'validatePassword'])->name('SuperAdmin.validatePassword');
Route::get('/logout', [SuperAdminController::class, 'logout'])->name('SuperAdmin.logout');
Route::get('/super/Manageuser', [SuperAdminController::class, 'Manageuser'])->name('SuperAdmin.Manageuser');
Route::get('/searchUsers', [SuperAdminController::class, 'SearchUsers'])->name('searchUsers');
Route::get('/super/jobpost', [JobPostController::class, 'jobpost'])->name('JobPost.jobpost');
Route::post('/super/jobpost', [JobPostController::class, 'store'])->name('JobPost.store');
Route::get('/super/jobpostsearch',[JobPostController::class,'jobpostsearch'])->name('JobPost.jobpostsearch');
Route::get('/super/search',[JobPostController::class,'search'])->name('JobPost.search');
Route::get('/super/jobpostshow',[JobPostController::class,'jobpostshow'])->name('JobPost.jobpostshow');
Route::get('/super/show',[JobPostController::class,'show'])->name('JobPost.show');
Route::get('/super/forgotpassword',[SuperAdminController::class,'forgotpassword'])->name('SuperAdmin.forgotpassword');
Route::group(['middleware' => 'preventBackButton'], function () {
    // Routes that should prevent back button functionality for logged-out users
});
Route::get('/', [UserController::class, 'home'])->name('welcome');
Route::get('/jobportal/loginsignup', [UserController::class, 'loginSignup'])->name('user.login');

Route::post('/jobportal/login', [UserController::class, 'login'])->name('login');
Route::get('errors.404', function () { return abort(404, 'Page under construction'); });
Route::fallback(function () {
    return view('errors.404');
});

Route::get('/jobsearch',function(){
    return view('jobSearch');
});

// Route::get('/popularJobsDisplay','UserController@popularJobsDisplay');

Route::get('/popular-jobs', [UserController::class, 'getPopularJobs'])->name('popularJobsDisplay');
Route::get('/fetch-suggestions', [UserController::class, 'fetchSuggestions']);
Route::get('/fetch-location-suggestions', [UserController::class, 'fetchLocationSuggestions']);
Route::get('/bylocation', [UserController::class, 'getbyLocationJobs'])->name('LocationJobsDisplay');
Route::get('jobportal/logout', [UserController::class, 'logout'])->name('user.logout');
Route::get('/locations', [LocationController::class, 'index'])->name('locations.index');
Route::post('/locations', [LocationController::class, 'store'])->name('locations.store');
Route::get('/locations/{id}/edit', [LocationController::class, 'edit'])->name('locations.edit');
Route::put('/locations/{id}', [LocationController::class, 'update'])->name('locations.update');
Route::delete('/locations/{id}', [LocationController::class, 'destroy'])->name('locations.destroy');
Route::resource('locations', LocationController::class);
