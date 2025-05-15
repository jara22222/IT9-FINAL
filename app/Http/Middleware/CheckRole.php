<?php


// app/Http/Middleware/CheckRole.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->back()->with('error', 'You must be logged in to access this page.');
        }

        // Check if user has any of the required roles
        foreach ($roles as $role) {
            if ($user->role && strtolower($user->role->roles) === strtolower($role)) {
                return $next($request);
            }
        }
        //Check owener of the user Employee
       

        

        

        return redirect()->back()->with('error', 'You do not have permission to access this page.');
        // abort(403, 'Unauthorized access.');
    }
}