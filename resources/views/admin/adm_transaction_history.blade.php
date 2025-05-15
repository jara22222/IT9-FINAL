@extends('layouts.app')

@section('title', 'Transaction')
@section('header', 'Transaction')
@section('header-description', 'Track employees transaction')

@section('contents')
    <div class="px-3">
        <x-messages />
        <div class="role-header d-flex justify-content-between">
            <p class="h4 fw-bold report-title">
                Transaction history
            </p>

        </div>
        <form method="GET" class="d-flex gap-2 my-3 flex-wrap">
            <div class="d-flex gap-2">
                <div class="input-group">
                    <span class="input-group-text bg-success">
                        <i class="bi bi-search text-white"></i>
                    </span>
                    <input type="text" value="{{ request('search') }}" name="search" class="form-control"
                        placeholder="Search by product or employee name">
                </div>

                <select name="sort" class="form-select">
                    <option value="">Sort by Created</option>
                    <option value="new" {{ request('sort') == 'new' ? 'selected' : '' }}>Newest First</option>
                    <option value="old" {{ request('sort') == 'old' ? 'selected' : '' }}>Oldest First</option>
                </select>

                <button class="btn btn-outline-success">Apply</button>
            </div>
        </form>


        <x-adm_transaction :histories="$histories" />



        <div class="mt-3">
            {{ $histories->links('pagination::bootstrap-5') }}
        </div>

    </div>
@endsection
