<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use App\Models\User;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::query();
    
        // Filter by username or email
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }
    
        // Sort by created_at
        if ($request->filled('sort')) {
            if ($request->sort === 'new') {
                $query->orderBy('created_at', 'desc');
            } elseif ($request->sort === 'old') {
                $query->orderBy('created_at', 'asc');
            }
        }
    
        $accounts = $query->paginate(20);
    
        return view('admin.adm_accounts', compact('accounts'));
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
    public function show(Accounts $accounts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Accounts $accounts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Accounts $accounts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Accounts $accounts)
    {
        //
    }
}