@extends('layouts.app')
@section('title', 'Accounts')
@section('header', 'View Accounts')
@section('header-description', 'This section contains add, edit, delete and view accounts.')

@section('contents')


    <div class="p-3">
        <x-messages />


        <div class="role-header d-flex justify-content-between">
            <p class="h4 fw-bold report-title">
                Accounts information
            </p>


        </div>

        <form method="GET" class="d-flex gap-2 my-3 flex-wrap">
            <div class="d-flex gap-2">
                <div class="input-group">
                    <span class="input-group-text bg-success">
                        <i class="bi bi-search text-white"></i>
                    </span>
                    <input type="text" value="{{ request('acc_search') }}" name="acc_search" class="form-control"
                        placeholder="Search username">
                </div>

                <select name="sort" class="form-select">
                    <option value="">Sort by Created</option>
                    <option value="new" {{ request('sort') == 'new' ? 'selected' : '' }}>Newest First</option>
                    <option value="old" {{ request('sort') == 'old' ? 'selected' : '' }}>Oldest First</option>
                </select>

                <button class="btn btn-outline-success">Apply</button>
            </div>
        </form>


        <div class="my-2">
            <x-view_accounts :users="$users" />
        </div>




        <div class="mt-3">

        </div>

    </div>
@endsection
