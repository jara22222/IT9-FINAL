<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\categories;
use App\Models\products;
use App\Models\Suppliers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class AdminProductsController extends Controller
{
    

    public function admshow(Request $request)
    {
        $query = Products::query();
    
        if ($request->has('search')) {
            $query->where('product_name', 'like', '%' . $request->search . '%');
        }

    
        if ($request->sort === 'new') {
            $query->orderBy('created_at', 'desc');
        } elseif ($request->sort === 'old') {
            $query->orderBy('created_at', 'asc');
        }
    
        $products = $query->paginate(10);
        $suppliers = Suppliers::all();
        $categories = Categories::all();
    
        return view('admin.adm_products', compact('products', 'suppliers', 'categories'));
    }
    
    
    public function admupdate(Request $req, $pid)
    {
        $req->validate([
            'product' => 'required|string|max:255',
            'price' => 'required|numeric',
            'supplier' => 'required|exists:suppliers,sid',
            'category' => 'required|exists:categories,ptid',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
    
        try {
            DB::beginTransaction();
    
            $product = products::findOrFail($pid);
    
            if ($req->hasFile('image')) {
                // Delete old image if it exists
                if ($product->image && Storage::disk('public')->exists($product->image)) {
                    Storage::disk('public')->delete($product->image);
                }
            
                // Store new image
                $imagePath = $req->file('image')->store('products', 'public');
            }
    
            $product->product_name = $req->input('product');
            $product->price = $req->input('price');
            $product->sid = $req->input('supplier');
            $product->ptid = $req->input('category');
            $product->product_desc = $req->input('description');
    
            $product->save();
    
            DB::commit();
            return redirect()->route('show.products')->with('success', 'Product updated successfully');
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function destroy($pid){

        products::findOrFail($pid)->first()->delete();


        return redirect()->route('show.products')->with('success','Successfully deleted');
        
    }
}