<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrdersRequest;
use App\Models\categories;
use App\Models\Orders;
use Illuminate\Container\Attributes\Auth;
use illuminate\Database\QueryException;
use App\Http\Controllers\OrderedItemsController;
use App\Models\Ordered_items;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function index(Request $request)
     {
         $validated = $request->validate([
             'eid' => 'required|exists:employees,eid',
             'total' => 'required|numeric|min:0',
             'items' => 'required|array|min:1',
             'items.*.pid' => 'required|exists:products,pid',
             'items.*.qty' => 'required|integer|min:1',
             'p_type' => 'required',
         ]);
     
         DB::beginTransaction();
         try {
            
             $order = Orders::create([
                 'eid' => $validated['eid'],
                 'total' => $validated['total'],
                 'p_type' => $validated['p_type'], 
             ]);
     
             foreach ($validated['items'] as $item) {
                 $product = products::find($item['pid']);
                 
             
                 if ($product->stock < $item['qty']) {
                     throw new \Exception("Not enough stock for {$product->product_name}");
                 }
     
              
                 Ordered_items::create([
                     'oid' => $order->oid,
                     'pid' => $item['pid'],
                     'qty' => $item['qty'],
                     'price_at_order' => $product->price 
                 ]);
     
              
                 $product->decrement('stock', $item['qty']);
             }

             $query = Products::query();

             // Search by name
             if ($search = $request->input('search')) {
                 $query->where('product_name', 'like', "%$search%");
             }
         
             // Filter by category
             if ($categoryId = $request->input('category')) {
                 $query->where('category_id', $categoryId);
             }
         
             // Sort by price
             if ($priceSort = $request->input('price_sort')) {
                 $query->orderBy('price', $priceSort);
             }
         
             $products = $query->where('stock', '>', 0)->paginate(20); 
             $categories = categories::all();
         
            
     
             DB::commit();
             return redirect()->route('employee.dashboard', $order->oid)
                    ->with('success', 'Order processed successfully!');
     
         } catch (\Exception $e) {
             DB::rollBack();
             return redirect()->back()
                    ->with('error', 'Order failed: ' . $e->getMessage());
         }
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
      //
    }

    /**
     * Display the specified resource.
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orders $orders)
    {
        //
    }
}