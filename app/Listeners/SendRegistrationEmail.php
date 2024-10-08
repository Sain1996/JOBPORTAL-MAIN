<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;

class SendRegistrationEmail implements ShouldQueue
{ 
     use InteractsWithQueue;
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event): void
    {
       // Mail::to($event->register->email)->send(new WelcomeEmail($event->register));

    }



   
}

    

