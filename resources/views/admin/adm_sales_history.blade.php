@extends('layouts.app')

@section('title', 'Sales')
@section('header', 'Sales')
@section('header-description', 'Track Sales History')

@section('contents')
    <div class="px-3">
        <x-messages />
        <div class="role-header d-flex justify-content-between">
            <p class="h4 fw-bold report-title">
                Product sales history
            </p>

        </div>


        <form method="GET" class="d-flex gap-2 my-3 flex-wrap">
            <div class="d-flex gap-2">
                <div class="input-group">
                    <span class="input-group-text bg-success">
                        <i class="bi bi-search text-white"></i>
                    </span>
                    <input type="text" value="{{ request('search') }}" name="search" class="form-control"
                        placeholder="Search product name">
                </div>

                <select name="sort" class="form-select">
                    <option value="">Sort by Items Sold</option>
                    <option value="high" {{ request('sort') == 'high' ? 'selected' : '' }}>Highest First</option>
                    <option value="low" {{ request('sort') == 'low' ? 'selected' : '' }}>Lowest First</option>
                </select>

                <button class="btn btn-outline-success">Apply</button>
            </div>
        </form>

        <x-adm_sales :sales="$sales" />



        <div class="mt-3">
            {{ $sales->links('pagination::bootstrap-5') }}
        </div>

    </div>
@endsection
