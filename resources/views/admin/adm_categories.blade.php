@extends('layouts.app')
@section('title', 'Category')
@section('header', 'Manage Categories')
@section('header-description', 'Manage your categories here')

@section('contents')

    <div class="p-3">
        <x-messages />
        <div class="role-header d-flex justify-content-between">
            <p class="h4 fw-bold report-title">
                Categories table
            </p>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal"><i
                    class="bi bi-bookmark-plus-fill"></i>&nbsp;Add Category</button>
            <x-add_categories />
        </div>

        <form method="GET" class="d-flex gap-2 my-3 flex-wrap">
            <div class="d-flex gap-2">
                {{-- Search Input --}}
                <div class="input-group">
                    <span class="input-group-text bg-success">
                        <i class="bi bi-search text-white"></i>
                    </span>
                    <input type="text" value="{{ request('search') }}" name="search" class="form-control"
                        placeholder="Search category name">
                </div>

                {{-- Status Filter (Optional: if you use status in categories) --}}
                {{-- <select name="status" class="form-select">
                    <option value="">All Status</option>
                    <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Inactive</option>
                </select> --}}

                {{-- Sort Filter --}}
                <select name="sort" class="form-select">
                    <option value="">Sort by Created</option>
                    <option value="new" {{ request('sort') == 'new' ? 'selected' : '' }}>Newest First</option>
                    <option value="old" {{ request('sort') == 'old' ? 'selected' : '' }}>Oldest First</option>
                </select>

                <button class="btn btn-outline-success">Apply</button>
            </div>
        </form>


        <x-category_table :categories="$categories" />



        <div class="mt-3">
            {{-- {{ $roles->links('pagination::bootstrap-5') }} --}}
        </div>

    </div>
@endsection
