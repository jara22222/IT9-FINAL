@extends('layouts.app')
@section('title', 'Employee')
@section('header', 'View Employee')
@section('header-description', 'This section contains add, edit, delete and view employees.')

@section('contents')


    <div class="p-3">
        <x-messages />


        <div class="role-header d-flex justify-content-between">
            <p class="h4 fw-bold">
                Employees basic information
            </p>

            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal"><i
                    class="bi bi-bookmark-plus-fill"></i>&nbsp;Add Employees</button>
            <x-addemployee-modal />
        </div>


        <x-employees_table :employees="$employees" />

        <x-add_users :roles="$roles" :employees="$employees" />


        <div class="mt-3">
            {{ $employees->links('pagination::bootstrap-5') }}
        </div>

    </div>
@endsection
