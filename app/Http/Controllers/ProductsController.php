<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\products;
use App\Models\Suppliers;
use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Suppliers::all();
        $categories = Categories::all();
        $products = products::paginate(10);

        
    
        return view('cashier.pos_products',compact('suppliers','categories','products'));
    }

    public function posproducts(Request $request)
{
    $query = Products::with(['categories', 'suppliers']);

    if ($search = $request->input('search')) {
        $query->where('product_name', 'like', "%$search%");
    }

    if ($categoryId = $request->input('category')) {
        $query->where('ptid', $categoryId);
    }

    if ($priceSort = $request->input('price_sort')) {
        $query->orderBy('price', $priceSort);
    }

    $products = $query->paginate(20); 
    $categories = Categories::all();
    $suppliers = Suppliers::all();

    return view('cashier.pos', compact('products', 'categories', 'suppliers'));
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
    public function store(ProductRequest $req)
    {

        $req->validated();
        
        try{
            DB::beginTransaction();

            $imagePath = null;
            if ($req->hasFile('image')) {
                $imagePath = $req->file('image')->store('products', 'public');
            }

            $products = products::create([
                'product_name' => $req['product'],
                'price' => $req['price'],
                'sid' =>$req['supplier'],
                'ptid' => $req['category'],
                'stock' =>$req['stock'],
                'product_desc' => $req['description'],
                'image' =>  $imagePath,
            ]);
        
           
       
        DB::commit();
        return redirect()->route('pos.showproducts')->with('success', 'Product added successfully');

        }catch(\illuminate\Database\QueryException $e){
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }

       
    }

    /**
     * Display the specified resource.
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $pid)
    {
        $validated = $request->validate([
            'stock' => 'required|integer|min:0',
        ]);
    
        $product = products::findOrFail($pid);
        
        $product->update([
            'stock' => $validated['stock'],
        ]);
    
        return redirect()
            ->route('pos.showproducts')
            ->with('success', 'Product updated successfully');
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, $PID)
{

    $req->validate([
        'product' => 'required|string',
        'price' => 'required|numeric|min:0',
        'description' => 'required|string',
        'category' => 'required',  
        'supplier' => 'required',  
    ]);

    try {
       
        $product = Products::findOrFail($PID);
        $product->product_name = $req->input('product');
        $product->price = $req->input('price');
        $product->product_desc = $req->input('description');
        $product->PTID = $req->input('category');
        $product->SID = $req->input('supplier');
        $product->save();
        return redirect()->route('show-products')->with('success',"Product edited"); 
    } catch (\Illuminate\Database\QueryException $e) {
        
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy($PID)
{
    try {
        products::where('PID', $PID)->delete();

        
        return redirect()->route('manage-products')->with('success', 'Product deleted successfully')->setStatusCode(303);

    } catch (\Illuminate\Database\QueryException $e) {
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
}
}