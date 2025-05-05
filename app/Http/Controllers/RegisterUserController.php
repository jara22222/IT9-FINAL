<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employees;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisterUserController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function register(Request $request, $eid)
    {
        // Validate the employee exists
       $users = User::where('eid', $eid);
        if ($users->exists()) {
            return redirect()->back()
                ->withErrors(['error' => 'User account already exists for this employee.']);
        }

        $request->validate([
            'name' => 'required|string|max:255|unique:users,name',
            'rid' => 'required|exists:roles,rid',
            'password' => 'required|min:8',
            'confirm_password' => 'required|min:8',
        ]);
       
        if ($request->password !== $request->confirm_password) {
            return redirect()->back()
                ->withErrors(['error' => 'Passwords do not match.']);
        }
        // Create the user account
        $user = User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'rid' => $request->rid,
            'eid' => $eid,
        ]);

        $employee = Employees::where('eid', $eid)->update([
            'status' => 1,
        ]);

        return redirect()->route('employees')
            ->with('success', 'User account created successfully ');
    }
}