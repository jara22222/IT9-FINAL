@extends('layouts.app')

@section('title', 'Suppliers')
@section('header', 'Suppliers')
@section('header-description', 'Manage your suppliers here')

@section('contents')
    <div class="p-3">
        <x-messages />
        <div class="role-header d-flex justify-content-between">
            <p class="h4 fw-bold">
                Suppliers table
            </p>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSuppliers"><i
                    class="bi bi-bookmark-plus-fill"></i>&nbsp;Add role</button>
            <x-add_suppliers />
        </div>

        <x-show_suppliers :suppliers="$suppliers" />



        <div class="mt-3">
            {{ $suppliers->links('pagination::bootstrap-5') }}
        </div>

    </div>
@endsection
