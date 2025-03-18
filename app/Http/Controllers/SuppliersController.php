<?php

namespace App\Http\Controllers;

use App\Models\suppliers;
use App\Models\suppliers_address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $request->validate([
            'company_name'=> 'required|string|max:30',
            'branch_name'=> 'required|string|max:30',

        ]);
        
        
        $supplier = suppliers::create([
            'company_name'=>$request->company_name,
        ]);

        $supplierID = $supplier->SID;
        suppliers_address::create([
            'SID' => $supplierID, 
            'Branch' => $request->branch_name, 
        ]);
        

        return redirect()->route('admin.suppliers');
    }

    /**
     * Display the specified resource.
     */
    public function show(suppliers $suppliers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(suppliers $suppliers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, suppliers $suppliers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(suppliers $suppliers)
    {
        //
    }
}
