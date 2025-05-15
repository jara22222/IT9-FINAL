<?php

namespace App\Http\Controllers;

use App\Models\Ordered_items;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    function getdata(Request $request){

        $sumqty = Ordered_items::sum('qty');
        $totalincome = Orders::sum('total');
        $gcash = Orders::where('p_type','=','gcash')->count();
        $cash = Orders::where('p_type','=','cash')->count();

        $dailySales = Orders::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('SUM(total) as total')
        )
        ->groupBy(DB::raw('DATE(created_at)'))
        ->orderBy('date', 'asc')
        ->get();
    
        $dates = $dailySales->pluck('date');
        $totals = $dailySales->pluck('total');


        $categoryOrders = DB::table('ordered_items')
    ->join('products', 'ordered_items.pid', '=', 'products.pid')
    ->join('categories', 'products.ptid', '=', 'categories.ptid')
    ->select('categories.category_name', DB::raw('SUM(ordered_items.qty) as total_orders'))
    ->groupBy('categories.category_name')
    ->orderByDesc('total_orders')
    ->pluck('total_orders', 'categories.category_name');

    $categories = $categoryOrders->keys();   
    $orders = $categoryOrders->values();      


    $productOrders = DB::table('ordered_items')
    ->join('products', 'ordered_items.pid', '=', 'products.pid')
    ->select('products.product_name', DB::raw('SUM(ordered_items.qty) as total_orders'))
    ->groupBy('products.product_name')
    ->orderByDesc('total_orders')
    ->pluck('total_orders', 'products.product_name');

    $product = $productOrders->keys();  
    $tots = $productOrders->values();


    $query = Orders::with('employees')
    ->select('eid', DB::raw('COUNT(*) as total_orders'))
    ->groupBy('eid');


    if($request->emp === "old"){
            $query->orderBy('eid');
    }
    elseif($request->emp === "new"){
        $query->orderByDesc('eid');
    }

    if($request->transact === "high"){
        $query->orderBy('total_orders');
    }
    elseif($request->transact === "low"){
        $query->orderBy('total_orders');

    }

    if ($request->search) {
        $query->whereHas('employees', function ($q) use ($request) {
            $q->where(DB::raw("CONCAT(first_name,' ',middle_name,' ',last_name)"), 'like', '%' . $request->search . '%');
        });
    }

        $counts = $query->paginate(20);


        return view('admin.adm_main',compact('totalincome','sumqty','gcash','cash','dates','totals','categories'
    ,'orders','product','tots','counts'));
        
    }
}