<?php

namespace App\Http\Controllers;

use App\Models\Suppliers;
use App\Models\SuppliersAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.adm_suppliers');
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
        try {
        $request->validate([
            'company_name' => 'required|string|max:30',
            'branch' => 'required|string|max:50', 
        ]);

        DB::beginTransaction(); 

        $supplier = Suppliers::create([
            'company_name' => $request->company_name,
        ]);

        SuppliersAddress::create([
            'sid' => $supplier->id,
            'branch' => $request->branch,
        ]);

        DB::commit(); 

        return redirect()->route('suppliers')->with('success', 'Supplier added successfully.');
    } catch (\Exception $e) {
        DB::rollBack(); 

        return redirect()->back()->withErrors(['error' => 'Error: ' . $e->getMessage()]);
    }
    }

    /**
     * Display the specified resource.
     */
public function show(Request $request)
{
    $suppliers = Suppliers::with('addresses')->paginate(10);
    

    return view('admin.adm_suppliers', compact('suppliers'));
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
 public function update(Request $request, $sid)
{
    $validated = $request->validate([
        'company_name' => 'required|string|max:30',
        'branch' => 'required|string|max:50',
    ]);

    DB::beginTransaction();

    try {
        DB::commit();
        $supplier = Suppliers::findOrFail($sid);

        if($supplier->company_name == $validated['company_name']){
            return redirect()->route('suppliers')
                   ->with('error', 'Company already exists');
        }
        $supplier->update([
            'company_name' => $validated['company_name'],
        ]);
        $supplierAddress = SuppliersAddress::where('sid', $sid)->first();
         if($supplierAddress->branch == $validated['branch']){
            return redirect()->route('suppliers')
                   ->with('error', 'Branch already exists');
        }
        $supplierAddress->
        update([
            'branch' => $validated['branch'],
        ]);
        DB::commit();
        
        return redirect()->route('suppliers')
               ->with('success', 'Supplier updated successfully');
               
    } catch (\Exception $e) {
        DB::rollBack();
        logger()->error('Supplier update failed: ' . $e->getMessage());
        return back()->with('error', 'Failed to update supplier');
    }
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(suppliers $suppliers, $SID)
    {
        DB::beginTransaction();
        try{
           Suppliers::where('SID', $SID)->delete();
            DB::commit();
            return redirect()->route('suppliers')->with('success','Deleted successfully');
            }catch(\Exception $e){
                DB::rollBack();
                return redirect()->back()->with('error','Failed to delete');
        }
                
    }
    
}