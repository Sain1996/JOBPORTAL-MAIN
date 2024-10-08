<?php
// Middleware to prevent back button functionality for logged-out users


namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;

class PreventBackButton
{
    public function handle(Request $request, Closure $next)
    {
        if(auth()->guest()) {
            return redirect()->back()->with('error', 'Unauthorized. Please log in.');
        }

        return $next($request);
    }
}
