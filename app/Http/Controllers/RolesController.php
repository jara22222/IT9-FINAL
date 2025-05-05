<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.adm_roles');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
       DB::beginTransaction();
       try{
       
         $validated = $request->validated();
         $roles = Roles::create($validated);
         DB::commit();
         return redirect()->route('roles')->with('success','Role added successfuly');
       }catch(QueryException $e){
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
       }
    }

    /**
     * Display the specified resource.
     */
    public function show(Roles $roles, Request $request)
    {
    $roles = Roles::paginate(10);
        return view('admin.adm_roles',compact('roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Roles $roles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Roles $roles,$id)
    {

        $request->validate([
            'roles' => 'required|string',
           
        ]);

        $roles = Roles::findOrFail($id);
        $roles->roles = $request->input('roles');
        $roles->save();
        
        return redirect()->route('roles')->with('success','Role updated sucessfully');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Roles $roles, $rid)
    {
        // dd($rid);
        $roles = Roles::findOrFail($rid);
        $roles->delete();
        
        return redirect()->route('roles')->with('success','Role deleted sucessfully');
    }
}