@extends('layouts.app')
@section('title', 'Roles')
@section('header', 'Roles')
@section('header-description', 'This section contains add, edit, delete and view roles.')

@section('contents')

    <div class="p-3">
        <x-messages />
        <div class="role-header d-flex justify-content-between">
            <p class="h4 fw-bold">
                Roles table
            </p>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal"><i
                    class="bi bi-bookmark-plus-fill"></i>&nbsp;Add role</button>
            <x-addroles-modal />
        </div>

        <x-roles-table :roles="$roles" />



        <div class="mt-3">
            {{ $roles->links('pagination::bootstrap-5') }}
        </div>

    </div>
@endsection
