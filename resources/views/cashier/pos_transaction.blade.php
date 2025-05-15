@extends('layouts.guest')
@section('title', 'Point of Sale')
@section('header', 'Cashier')

@section('contents')

    <div class="p-3">
        <x-messages />
        <div class="role-header d-flex justify-content-between border-bottom pb-2">
            <div>
                <p class="h4 fw-bold">
                    @if (Auth::user()->role->roles === 'Manager')
                        Manager Transaction History
                    @else
                        Employee Transaction History
                    @endif

                </p>
                <small class="text-muted">This is your transaction</small>
            </div>

            <x-account />

        </div>
        <x-show_transaction_history :histories="$histories" />

        <div class="mt-3">
            {{ $histories->links('pagination::bootstrap-5') }}
        </div>

    </div>

@endsection
