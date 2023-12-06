@extends('layouts.app')

@push('styles')
    <style>
        .full-width-container {
            width: 100vw !important;
            margin-left: calc(50% - 50vw) !important;
            margin-right: calc(50% - 50vw) !important;
        }

        .custom-container {
            max-width: none !important;
            width: 100% !important;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        .product-list {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .product-card {
            flex: 1 1 calc(25% - 15px);
            background: #fff;
            border: 1px solid #ddd;
            padding: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        .product-card:hover {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        .product-img {
            overflow: hidden;
            border-radius: 5px;
        }

        .product-img img {
            width: 100%;
            height: auto;
        }

        .product-info h5 {
            margin-top: 10px;
        }

        .product-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }

        .product-actions a {
            text-decoration: none;
            color: #333;
            padding: 8px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .product-actions a:hover {
            background-color: #f8f9fa;
        }
    </style>
@endpush
<script src="https://cdn.tailwindcss.com"></script>

@section('content')
    <div class="container-fluid mt-5 bg-light p-4 custom-container">
        <h1 class="mb-4 text-5xl font-semibold">Product Management</h1>

        <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn btn-primary mb-3">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mb-10 rounded">
Add Product</button>        
    </a>

        <div class="product-list" style="display: grid;       grid-template-columns: repeat(4, 1fr);
      gap: 10px; place-items:center">
            @foreach($products as $product)
                <div class="product-card border border-1 shadow-lg p-3">
                    <div class="product-img">
                        <img  style="width:360px; height:300px; object-fit:cover" src="{{ $product->imageLink }}" alt="{{ $product->title }}">
                    </div>
                    <div class="product-info">
                        <h5 class="mb-0 fw-bold">{{ $product->title }}</h5>
                        <p class="mb-0">{{ $product->description }}</p>
                        <div class="product-price d-flex align-items-center gap-2 mt-2">
                            <div class="h6 fw-bold">${{ $product->price }}</div>
                        </div>
                    </div>
                    <div class="product-actions">
                        <a href="{{ route('admin.products.edit', $product->id) }}" class=" btn-sm">
                        <button class="bg-transparent hover:bg-blue-500 my-3 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
  Edit
</button>
                        </a>
                        <!-- You can add a delete button here if needed -->
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
