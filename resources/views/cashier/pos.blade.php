@extends('layouts.guest')
@section('title', 'Point of Sale')
@section('header', 'Cashier')

@section('contents')

    <div class="p-3 d-flex gap-4 flex-grow-1">


        <div class="show-products" style="width: 975px">
            <x-show_products />
        </div>
        <div class="transcript" style="width: 490px">
            <x-transcript />
        </div>
    </div>

@endsection
