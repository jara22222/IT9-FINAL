@extends('layouts.app')
@section('title', 'Category')
@section('header', 'Manage Categories')
@section('header-description', 'Manage your categories here')

@section('contents')

    <div class="p-3">
        <x-messages />
        <div class="role-header d-flex justify-content-between">
            <p class="h4 fw-bold">
                Categories table
            </p>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal"><i
                    class="bi bi-bookmark-plus-fill"></i>&nbsp;Add Category</button>
            <x-add_categories />
        </div>

        <x-category_table :categories="$categories" />



        <div class="mt-3">
            {{-- {{ $roles->links('pagination::bootstrap-5') }} --}}
        </div>

    </div>
@endsection
