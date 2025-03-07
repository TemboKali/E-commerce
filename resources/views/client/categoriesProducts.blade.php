@extends('client.client_page_layout.page_layout')
@section('PageTitle', isset($pageTitle) ? $pageTitle : 'Home')
@section('content')
    @include('client.sections.header')
    <div class="container mt-4">
        <div class="row">
            <!-- Sidebar: Categories List -->
            <div class="col-md-3">
                <h4 class="text-black">Categories</h4>
                <ul class="list-group">
                    @forelse($categories as $category)
                        <li class="list-group-item">
                            <a href="{{ route('client.listproducts', $category->id) }}" class="text-decoration-none">
                                {{ $category->name }}
                            </a>
                        </li>
                    @empty
                        <li class="list-group-item text-danger">No Categories Found</li>
                    @endforelse
                </ul>
            </div>
            <div class="col-md-9">
                <h4 class="text-black">Products</h4>
                <div class="row">
                    @forelse($products as $product)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                @if($product->images->count() > 0)
                                    <img src="{{ $product->images->first()->image_path }}" class="card-img-top"
                                        alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text text-danger">Kshs. {{ number_format($product->price, 2) }}</p>
                                    <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-danger">No products found in this category.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection