@extends('layouts.guest')
@section('title', 'Point of Sale')
@section('header', 'Cashier')

@section('contents')

    <div class="p-3">
        <x-messages />
        <div class="role-header d-flex justify-content-between">
            <p class="h4 fw-bold">
                Product lists
            </p>
            @if (Auth::user()->role === 'Employee')
                No redirection
            @elseif (Auth::user()->role == 'Manager')
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal"><i
                        class="bi bi-bookmark-plus-fill"></i>&nbsp;Add products</button>
            @endif
            <x-pos_addproducts />
        </div>
        <x-show_pos_products />

        <div class="mt-3">
            {{-- {{ $roles->links('pagination::bootstrap-5') }} --}}
        </div>

    </div>

@endsection
