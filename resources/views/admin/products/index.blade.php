@extends('layouts.app')
@push('styles')
    <style>
        .full-width-table {
            width: 100%;
        }

        .custom-container {
            max-width: none !important;
            width: 100% !important;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid mt-5 bg-light p-4 custom-container">
        <h1 class="mb-4">Product Management</h1>

        <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Add Product</a>

        <div class="table-responsive full-width-table">
            <table class="table table-striped table-bordered bg-white">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->title }}</td>
                            <td>${{ $product->price }}</td>
                            <td>{{ $product->description }}</td>
                            <td>
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <!-- You can add a delete button here if needed -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
