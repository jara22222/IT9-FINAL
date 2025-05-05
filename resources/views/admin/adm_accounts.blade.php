@extends('layouts.app')
@section('title', 'Accounts')
@section('header', 'View Accounts')
@section('header-description', 'This section contains add, edit, delete and view accounts.')

@section('contents')


    <div class="p-3">
        <x-messages />


        <div class="role-header d-flex justify-content-between">
            <p class="h4 fw-bold">
                Accounts information
            </p>

            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal"><i
                    class="bi bi-bookmark-plus-fill"></i>&nbsp;Add Employees</button>
            <x-addemployee-modal />
        </div>




        <div class="mt-3">

        </div>

    </div>
@endsection
