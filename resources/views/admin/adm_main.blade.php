@extends('layouts.app')

@section('title', 'Dashboard')
@section('header', 'Dashboard')
@section('header-description', 'Sales Summary')

@section('contents')
    <div class="px-3 ">
        <div class="row my-3">
            <div class="col-md-4 p-2">
                <x-total_item_selled :sumqty="$sumqty" />
            </div>
            <div class="col-md-4 p-2">
                <x-cash_gcash :cash="$cash" :gcash="$gcash" />
            </div>

            <div class="col-md-4 p-2">
                <x-total_income :totalincome="$totalincome" />
            </div>

        </div>
        <div class="row my-3">

            {{-- line-chart --}}
            <div class="col-md-12 my-3">

                <x-linechart_top :dates="$dates" :totals="$totals" />

            </div>



            {{-- bar-chart --}}
            <div class="col-md-6  my-3">
                <x-bar-chart_top :product="$product" :tots="$tots" />
            </div>



            {{-- piechart --}}
            <div class="col-md-6  my-3">
                <x-pie-chart_top :categories="$categories" :orders="$orders" />
            </div>

        </div>

        <div class="row my-3">
            {{-- Best employee --}}
            <div class="col-md-12 my-3 d-flex justify-content-between">

                <div class="header ">
                    <p class="h3 fw-bold">Best Employee</p>
                </div>




                <form method="GET" class="filters d-flex gap-3">
                    <div class="d-flex gap-2">
                        <select name="emp" class="form-select">
                            <option value="" selected disabled>By Employee</option>
                            <option value="old">Oldest To Newest</option>
                            <option value="new">Newest to Oldest</option>
                        </select>
                        <select name="transact" class="form-select">
                            <option value="" selected disabled>By Transaction</option>
                            <option value="asc">Lowest to Highest</option>
                            <option value="desc">Highest to Lowest</option>
                        </select>
                        <button class="btn btn-outline-success">Filter</button>
                    </div>
                    <div class="d-flex gap-2">
                        <div class="input-group">
                            <span class="input-group-text bg-success">
                                <i class="bi bi-search text-white"></i>
                            </span>
                            <input type="text" name="search" class="form-control" placeholder="Search for name">
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-md-12 ">
                <x-best_employee :counts="$counts" />
            </div>
        </div>
    </div>

    </div>



@endsection
