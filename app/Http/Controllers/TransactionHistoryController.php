<?php

namespace App\Http\Controllers;

use App\Models\Ordered_items;
use App\Models\Orders;
use App\Models\TransactionModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
 
use Illuminate\Support\Facades\DB;


class TransactionHistoryController extends Controller
{
 
 //show products by oid
 public function index()
 {
     $eid = Auth::user()->eid;
 
     $histories = Ordered_items::with(['products', 'orders.employees'])
         ->whereHas('orders', function ($query) use ($eid) {
             $query->where('eid', $eid);
         })
         ->paginate(10);
 
     return view('cashier.pos_transaction', compact('histories'));
 }

 public function admin_transaction_history(Request $request)
{
    $search = $request->input('search');
    $sort = $request->input('sort');

    $histories = Ordered_items::with(['products', 'orders.employees'])
        ->when($search, function ($query) use ($search) {
            $query->whereHas('products', function ($q) use ($search) {
                $q->where('product_name', 'like', '%' . $search . '%');
            })->orWhereHas('orders.employees', function ($q) use ($search) {
                $q->where('first_name', 'like', '%' . $search . '%')
                  ->orWhere('last_name', 'like', '%' . $search . '%');
            });
        })
        ->when($sort, function ($query) use ($sort) {
            if ($sort === 'new') {
                $query->orderBy('created_at', 'desc');
            } elseif ($sort === 'old') {
                $query->orderBy('created_at', 'asc');
            }
        })
        ->paginate(20);

    return view('admin.adm_transaction_history', compact('histories'));
}

public function admin_sales_history(Request $request)
{
    $query = DB::table('ordered_items as oi')
        ->join('products as p', 'p.pid', '=', 'oi.pid')
        ->select(
            'p.product_name',
            DB::raw('SUM(oi.qty) as total_selled'),
            DB::raw('SUM(oi.price_at_order * oi.qty) as total')
        )
        ->groupBy('oi.pid', 'p.product_name');

    if ($request->filled('search')) {
        $query->where('p.product_name', 'like', '%' . $request->search . '%');
    }

    if ($request->sort === 'high') {
        $query->orderByDesc(DB::raw('SUM(oi.price_at_order * oi.qty)'));
    } elseif ($request->sort === 'low') {
        $query->orderBy(DB::raw('SUM(oi.price_at_order * oi.qty)'));
    }

    $sales = $query->paginate(20);

    return view('admin.adm_sales_history', compact('sales'));
}

 
}