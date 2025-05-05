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
      

        // Check if user exists and password is correct
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors([
                'password' => 'The provided password do not match our records.',
            ])->onlyInput('password');
        }

        // Log the user in
        Auth::login($user);
        $request->session()->regenerate();
        //get the user role
        $role = $user->role->roles;
        //return the role if it's correct
        //redirrect to the dashboard by roles with authentication
        if ($role === 'Admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($role === 'Employee') {
            $user = $role;
            return view('cashier.pos',compact('user'));
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