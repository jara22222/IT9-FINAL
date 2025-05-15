@extends('layouts.guest')
@section('title', 'Point of Sale')
@section('header', 'Cashier')

@section('contents')



    <div class="pb-3 gap-2 d-flex flex-grow-1">


        <div class="content-products w-100">
            <x-messages />
            <header class=" mb-2 ">
                <div class="header d-flex justify-content-between mb-2">
                    <p class="h2">
                        {{ __('Cashier') }}
                    </p>
                    <x-account />
                </div>
                <div class="d-flex gap-3 border-bottom pb-3 ">

                    <form method="GET" class="d-flex gap-3 ">

                        {{-- Search --}}
                        <div class="d-flex align-items-center gap-2 filter">
                            <label for="search">Search</label>
                            <input type="text" name="search" id="search" value="{{ request('search') }}"
                                class="search form-control rounded-5" placeholder="Search Product">
                        </div>

                        {{-- Category Filter --}}
                        <div class="d-flex align-items-center gap-2 filter">
                            <select name="category" class="form-select rounded-5">
                                <option value="">All Categories</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->ptid }}"
                                        {{ request('category') == $category->ptid ? 'selected' : '' }}>
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Price Sorting --}}
                        <div class="d-flex align-items-center gap-2 filter">
                            <select name="price_sort" class="form-select rounded-5">
                                <option value="">Sort Price</option>
                                <option value="asc" {{ request('price_sort') == 'asc' ? 'selected' : '' }}>Low to High
                                </option>
                                <option value="desc" {{ request('price_sort') == 'desc' ? 'selected' : '' }}>High to Low
                                </option>
                            </select>
                        </div>

                        <div>
                            <button class="btn btn-primary rounded-5">Apply</button>
                        </div>

                    </form>


                </div>

            </header>
            <div class="show-products overflow-y-auto" style="max-height: 530px;">
                <x-show_products :products="$products" />
            </div>


        </div>

        <div class="transcript" style="width: 39em">
            <x-transcript />
        </div>
    </div>

@endsection
