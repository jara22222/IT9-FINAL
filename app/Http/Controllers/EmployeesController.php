<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use App\Models\Employee_addresses;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Models\Roles;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */ 
    public function index(Request $request)
{
    $query = Employees::with('addresses');


    if ($request->has('search') && $request->search !== null) {
        $query->where(DB::raw("CONCAT(first_name, ' ', middle_name, ' ', last_name)"), 'LIKE', '%' . $request->search . '%');
    }


  
    if ($request->has('sort') && $request->sort === 'old') {
        $query->orderBy('created_at', 'asc');
    } elseif ($request->has('sort') && $request->sort === 'new') {
        $query->orderBy('created_at', 'desc');
    }

   
    
    if ($request->filled('acc_search')) {
        $query->where('name', 'like', '%' . $request->acc_search . '%');
    }
    


   
    // Sort by creation date
    if ($request->filled('sort')) {
        if ($request->sort === 'old') {
            $query->orderBy('created_at', 'asc');
        } elseif ($request->sort === 'new') {
            $query->orderBy('created_at', 'desc');
        }
    }
    $roles = Roles::all();
    $employees = $query->paginate(10)->appends($request->all());
  

    return view('admin.adm_employees', compact('employees', 'roles'));
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
   public function store(EmployeeRequest $request)
{
    $validated = $request->validated();

           
  //check if phone number already exists
        $existingEmployee = Employees::where('phone', $validated['phone'])->first();
        if ($existingEmployee) {
            DB::rollback();
            return redirect()->back()
                   ->withInput()
                   ->with('error', 'Phone number already exists');
        }
        
    
    DB::beginTransaction();
    try {
       
        $address = Employee_addresses::create([
            'street' => $validated['street'],
            'city' => $validated['city'],
            'province' => $validated['province'],
            'zip' => $validated['zip']
        ]);
        
       
        $employee = Employees::create([
            'eadid' => $address->eadid, 
            'first_name' => $validated['first_name'],
            'middle_name' => $validated['middle_name'],
            'last_name' => $validated['last_name'],
            'age' => $validated['age'],
            'gender' => $validated['gender'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'birthday' => $validated['birthday']
        ]);


        DB::commit();
        
        return redirect()->route('employees')
               ->with('success', 'Employee added successfully');
               
    } catch (\Exception $e) {
        DB::rollback();
        return redirect()->back()
               ->withInput()
               ->with('error', 'Error creating employee: ' . $e->getMessage());
    }
}
    /**
     * Display the specified resource.
     */ public function show($eid)
    {
        // $employee = Employees::with('addresses')->findOrFail($eid);
        // return view('admin.adm_employees', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employees $employees)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $eid)
{
    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'middle_name' => 'nullable|string|max:255',
        'last_name' => 'required|string|max:255',
        'age' => 'required|integer|min:18|max:65',
        'gender' => 'required|string',
        'birthday' => 'required|date',
        'email' => 'required|email|unique:employees,email,'.$eid.',eid',
        'phone' => 'required|string|max:11|unique:employees,phone,'.$eid.',eid',
        'street' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'province' => 'required|string|max:255',
        'zip' => 'required|string|max:4|min:4',
    ]);

    DB::beginTransaction();
    try {
        $address = Employee_addresses::where('eadid', $eid)->firstOrFail();
        $employee = Employees::findOrFail($eid);
        
        $address->update([
            'street' => $validated['street'],
            'city' => $validated['city'],
            'province' => $validated['province'],
            'zip' => $validated['zip']
        ]);
        
        $employee->update([
            'first_name' => $validated['first_name'],
            'middle_name' => $validated['middle_name'],
            'last_name' => $validated['last_name'],
            'age' => $validated['age'],
            'gender' => $validated['gender'],
            'birthday' => $validated['birthday'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
        ]);
        
        DB::commit();
        
        return redirect()->route('employees')
               ->with('success', 'Employee updated successfully');
               
    } catch (\Exception $e) {
        DB::rollback();
        return redirect()->back()
               ->withInput()
               ->with('error', 'Error updating employee: ' . $e->getMessage());
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employees $employees,$eid)
    {
        DB::beginTransaction();
        try {
            $employee = Employees::findOrFail($eid);
            $address = Employee_addresses::where('eadid', $employee->eadid)->firstOrFail();
            
            $address->delete();
            $employee->delete();
            
            DB::commit();
            
            return redirect()->route('employees')
                   ->with('success', 'Employee deleted successfully');
                   
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                   ->with('error', 'Error deleting employee: ' . $e->getMessage());
        }
    }
}