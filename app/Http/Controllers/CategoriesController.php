<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('admin.adm_categories');
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
            'category_name'=> 'required|string|max:30',
            
        ]);
        
      try{
    
        DB::beginTransaction();
        // Check if the category name already exists
        $existingCategory = categories::where('category_name', $request->category_name)->first();
        if ($existingCategory) {
            DB::rollBack();
            return redirect()->back()
                ->withInput()
                ->with('error', 'Category name already exists');
        }
         categories::create([
            'category_name'=>$request->category_name,
        ]);
            
            DB::commit();
        return redirect()->route('show-categories')->with('success', 'Category successfully added');

      }
        catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error','Error adding categories');
            }
       
           
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        
    $filterDate = $request->input('filter_date');
    $search = $request->input('search');

    $categories = Categories::
        when($filterDate, function ($query) use ($filterDate) {

            return $query->whereRaw("DATE_FORMAT(created_at, '%M %e, %Y') = ?", [$filterDate]);
        })
        ->when($search, function ($query) use ($search) {
            $query->where('category_name', 'like', '%' . $search . '%');
        })
        ->paginate(7);

     $dates = Categories::selectRaw('DATE_FORMAT(created_at, "%M %e, %Y") as grouped_dates')
        ->groupBy('grouped_dates')
        ->pluck('grouped_dates'); 
    
    return view('admin.adm_categories', compact('categories', 'dates'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, categories $categories, $ptid)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        try {
            // Check if the category name already exists
            $existingCategory = categories::where('category_name', $request->category_name)->first();
           if ($existingCategory){
            DB::rollBack();
            return  redirect()->back()
                   ->with('error', 'Category already exists');
           }
            $category = categories::findOrFail($ptid);
            $category->update([
                'category_name' => $request->category_name,
            ]);
          
          


            DB::commit();
            return redirect()->route('show-categories')->with('success', 'Category updated successfully');
        } catch (\Exception) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error updating categories');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(categories $categories, $ptid)
    {
       
        DB::beginTransaction();
        try{
            Categories::where('PTID', $ptid)->delete();
            DB::commit();
            return redirect()->route('show-categories')->with('success','Deleted successfully');
            }catch(\Exception $e){
                DB::rollBack();
                return redirect()->back()->with('error','Failed to delete');
        }
    }
}