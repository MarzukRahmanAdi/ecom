@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Product List</h1>
    <ul style="display: flex;">
        @foreach($products as $product)
        <li>
            <strong>{{ $product->title }}</strong> - ${{ $product->price }} <br>
            {{ $product->description }} <br>
            <img src="{{ $product->imageLink }}" alt="Product Image" style="max-width: 100px; max-height: 100px;"> <br>
            
            @if(Auth::check())
            <form action="{{ route('cart.add', ['product' => $product->id]) }}" method="post">
                @csrf
                <input type="number" name="quantity" value="1" min="1">
                <button type="submit">Add to Cart</button>
            </form>
            @else
            <p>You need to <a href="{{ route('login') }}">log in</a> to add items to the cart.</p>
            @endif
        </li>
        @endforeach
    </ul>
</div>
@endsection
