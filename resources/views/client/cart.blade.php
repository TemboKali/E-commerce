@extends('client.client_page_layout.page_layout')
@section('content')
    @include('client.sections.header')
    <div class="container mt-4">
        <h2 class="mb-3">Shopping Cart</h2>

        @if(session('cart') && count(session('cart')) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(session('cart') as $id => $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>
                                <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" width="50">
                            </td>
                            <td>Kshs.{{ number_format($item['price'], 2) }}</td>
                            <td>
                                <form action="{{ route('cart.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $id }}">
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1">
                                    <button type="submit" class="btn btn-sm btn-warning">Update</button>
                                </form>
                            </td>
                            <td>Kshs.{{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                            <td>
                                <a href="{{ route('cart.remove', $id) }}" class="btn btn-danger btn-sm">Remove</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center">Your cart is empty.</p>
        @endif
    </div>
@endsection