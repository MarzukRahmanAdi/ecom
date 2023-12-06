
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Shopping Cart</h1>

        @if (count($cartItems) > 0)
            <ul>
                @foreach($cartItems as $item)
                    <li>
                        {{ $item->product->name }} - Quantity: {{ $item->quantity }}
                        <!-- Add more details if needed -->
                        <form action="{{ route('cart.edit', ['cart' => $item->id]) }}" method="post">
                            @csrf
                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1">
                            <button type="submit">Update</button>
                        </form>
                        <form action="{{ route('cart.delete', ['cart' => $item->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit">Delete</button>
                        </form>
                    </li>
                @endforeach
            </ul>

            <!-- Display total price if needed -->
            <p>Total Price: ${{ $totalPrice }}</p>
        @else
            <p>Your cart is empty.</p>
        @endif
    </div>
@endsection
