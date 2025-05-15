<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Employees;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'rid' => ['required', 'exists:'.Roles::class.',rid'],
            'eid' => ['required', 'exists:'.Employees::class.',eid'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'rid' => $request->rid,
            'eid' => $request->eid,
        ]);
        

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }

    public function index()
    {

        $users = User::with(['role'])->paginate(10);
       
        return view('admin.adm_accounts',compact('users'));
    }
    public function destroy($id)
    {

        $users = User::findOrFail($id)->delete();
       
        return redirect()->back()->with('success','Successfully deleted');
    }

    public function update(Request $request, $id){
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => 'required|min:8',
            'confirm_password' => 'required|min:8',
            
        ]);
        if($request->confirm_password != $request->password){
            return redirect()->back()->with('error','Password and Confirm password does not match!');
        }
       try{
       

            DB::beginTransaction();
          
           
            $user = User::findOrFail($id);
            
            $user->
                update(['name' => $request->name,
            'password' => Hash::make($request->password),]);
            
            DB::commit();
            return redirect()->
                back()->with('success','User updated successfully');
            

       }catch(QueryException $e){
        DB::rollBack();
        return redirect()->
        back()->
        with('error','Error updating user');

       }
        
    }

  
}