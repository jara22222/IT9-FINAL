@extends('layouts.app')
@section('title', 'Employee')
@section('header', 'View Employee')
@section('header-description', 'This section contains add, edit, delete and view employees.')

@section('contents')


    <div class="p-3">
        <x-messages />


        <div class="role-header d-flex justify-content-between">
            <p class="h4 fw-bold report-title">
                Employees basic information
            </p>

            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal"><i
                    class="bi bi-bookmark-plus-fill"></i>&nbsp;Add Employees</button>
            <x-addemployee-modal />
        </div>


        <form method="GET" class="d-flex gap-2 my-3 flex-wrap">
            <div class="d-flex gap-2">
                <div class="input-group">
                    <span class="input-group-text bg-success">
                        <i class="bi bi-search text-white"></i>
                    </span>
                    <input type="text" value="{{ request('search') }}" name="search" class="form-control"
                        placeholder="Search for name">
                </div>

                <select name="status" class="form-select">
                    <option value="">All Status</option>
                    <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Registered</option>
                    <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Unregistered</option>
                </select>

                <select name="sort" class="form-select">
                    <option value="">Sort by Created</option>
                    <option value="new" {{ request('sort') == 'new' ? 'selected' : '' }}>Newest First</option>
                    <option value="old" {{ request('sort') == 'old' ? 'selected' : '' }}>Oldest First</option>
                </select>

                <button class="btn btn-outline-success">Apply</button>
            </div>
        </form>








        <x-employees_table :employees="$employees" />

        <x-add_users :roles="$roles" :employees="$employees" />


        <div class="mt-3">
            {{ $employees->links('pagination::bootstrap-5') }}
        </div>

    </div>


@endsection
