<?php

namespace App\Http\Controllers;

use App\Models\categories;
use DB;
use Illuminate\Http\Request;


class CategoriesController extends Controller
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
            'category_name'=> 'required|string|max:30',
            
        ]);
        
        categories::create([
            'category_name'=>$request->category_name,
        ]);
        
        return  redirect()->route('admin.products');
           
    }

    /**
     * Display the specified resource.
     */
    public function show(categories $categories)
    {
        $categories = categories::all(); // Fetch all categories
            return view('admin.adm_products', compact('categories'));
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
    public function update(Request $request, categories $categories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(categories $categories)
    {
        //
    }
}
