@extends('layouts.app')

@section('title', 'Suppliers')
@section('header', 'Suppliers')
@section('header-description', 'Manage your suppliers here')

@section('contents')
    <div class="p-3">
        <x-messages />
        <div class="role-header d-flex justify-content-between">
            <p class="h4 fw-bold report-title">
                Suppliers table
            </p>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSuppliers"><i
                    class="bi bi-bookmark-plus-fill"></i>&nbsp;Add suppliers</button>
            <x-add_suppliers />
        </div>

        <form method="GET" class="d-flex gap-2 my-3 flex-wrap">
            <div class="d-flex gap-2">
                <div class="input-group">
                    <span class="input-group-text bg-success">
                        <i class="bi bi-search text-white"></i>
                    </span>
                    <input type="text" value="{{ request('search') }}" name="search" class="form-control"
                        placeholder="Search supplier name">
                </div>


                <select name="sort" class="form-select">
                    <option value="">Sort by Created</option>
                    <option value="new" {{ request('sort') == 'new' ? 'selected' : '' }}>Newest First</option>
                    <option value="old" {{ request('sort') == 'old' ? 'selected' : '' }}>Oldest First</option>
                </select>

                <button class="btn btn-outline-success">Apply</button>
            </div>
        </form>

        <x-show_suppliers :suppliers="$suppliers" />



        <div class="mt-3">
            {{ $suppliers->links('pagination::bootstrap-5') }}
        </div>

    </div>
@endsection
