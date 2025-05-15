@extends('layouts.app')
@section('title', 'Products')
@section('header', 'Admin products')
@section('header-description', 'This is admin products')
@section('contents')

    <div class="p-3">
        <x-messages />
        <div class="d-flex mt-3 justify-content-between">
            <p class="h5 report-title">
                Product lists
            </p>
        </div>

        <form method="GET" class="d-flex gap-2 my-3 flex-wrap">
            <div class="d-flex gap-2">
                <div class="input-group">
                    <span class="input-group-text bg-success">
                        <i class="bi bi-search text-white"></i>
                    </span>
                    <input type="text" value="{{ request('search') }}" name="search" class="form-control"
                        placeholder="Search for product name">
                </div>

                <select name="sort" class="form-select">
                    <option value="">Sort by Created</option>
                    <option value="new" {{ request('sort') == 'new' ? 'selected' : '' }}>Newest First</option>
                    <option value="old" {{ request('sort') == 'old' ? 'selected' : '' }}>Oldest First</option>
                </select>

                <button class="btn btn-outline-success">Apply</button>
            </div>
        </form>

        <x-adm_show_products :products="$products" :suppliers="$suppliers" :categories="$categories" />
        < <div class="mt-3">
            {{ $products->links('pagination::bootstrap-5') }}
    </div>

    </div>

@endsection
