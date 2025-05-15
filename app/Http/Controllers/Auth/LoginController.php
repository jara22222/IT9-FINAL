<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        // Find user first
        $user = User::where('name', $credentials['name'])->first();
        // Check if name exists
        if (!$user) {
            return back()->withErrors([
                'name' => 'Name not found.',
            ])->onlyInput('name');
        }
      

       
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors([
                'password' => 'The provided password do not match our records.',
            ])->onlyInput('password');
        }

        
        Auth::login($user);
        $request->session()->regenerate();
       
        $role = $user->role->roles;
        
        if ($role === 'Admin') {
            return redirect()->route('dashboard.data');

        } elseif ($role === 'Employee' || $role === 'Manager' || $role != "Admin") {
            
             return redirect()->route('employee.dashboard');
        } else {
            return redirect()->route('login')->withErrors(['error' => 'Unauthorized access.']);
        }   

    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}