@extends('client.client_page_layout.page_layout')
@section('PageTitle', isset($pageTitle) ? $pageTitle : 'Product Description')
@section('content')
    @include('client.sections.header')
    <div class="container mt-5">
        <div class="row d-flex align-items-center">
            <div class="col-md-6 d-flex justify-content-center">
                @if($product->images->count() > 0)
                    <img src="{{ $product->images->first()->image_path }}" alt="{{ $product->name }}" class="img-fluid rounded"
                        style="width: 100%; height: 500px; object-fit: cover;">
                @endif
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <div class="ps-4">
                    <h2 class="fw-bold">{{ $product->name }}</h2>
                    <h4 class="text-danger">Price: Kshs. {{ number_format($product->price, 2) }}</h4>
                    <p>{{ $product->description }}</p>

                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn btn-primary btn-lg">Add to Cart</button>
                    </form>
                    <hr>
                    <h5 class="mt-3">Contact Us:</h5>
                    <p><strong>Email:</strong> example@email.com</p>
                    <p><strong>Phone:</strong> +254 700 000 000</p>
                </div>
            </div>
        </div>
    </div>
@endsection()