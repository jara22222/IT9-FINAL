@extends('layouts.guest')
@section('title', 'Point of Sale')
@section('header', 'Cashier')

@section('contents')

    <div class="p-3">
        <x-messages />
        <div class="role-header d-flex justify-content-between border-bottom pb-2">
            <div>
                <p class="h4 fw-bold">Product Section</p>
                <small class="text-muted">This is product section</small>
            </div>
            <x-account />

        </div>
        <div class="d-flex mt-3 justify-content-between">
            <p class="h5">
                Product lists
            </p>
            @auth
                @if (Auth::user()->role->roles === 'Employee')
                @elseif (Auth::user()->role->roles == 'Manager')
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                        <i class="bi bi-bookmark-plus-fill"></i>&nbsp;Add products
                    </button>
                @endif
            @endauth

            <x-pos_addproducts :suppliers="$suppliers" :categories="$categories" />
        </div>
        <x-show_pos_products :products="$products" />

        <div class="mt-3">
            {{ $products->links('pagination::bootstrap-5') }}
        </div>

    </div>

@endsection
