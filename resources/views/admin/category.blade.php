@extends('admin-layout.page-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'category')
@section('content')
    <style type="text/css">
        table {
            position: relative;
            left: 15%;
            top: 120px;
            width: 300px;
        }

        .table {
            width: 80%;
        }
    </style>
    <div class="bar">
        <div class="text">
            <h3>Category</h3>
        </div>
    </div>
    <div class="center">
        <div class="buttons">
            <div class="categor">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#category">Add Category</button>
            </div>
            <div class="subca">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#products">Add Product</button>
            </div>
        </div>
    </div>
    <table class="table table-border">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Image</th>
                <th scope="col">Category</th>
                <th scope="col">Product</th>
                <th scope="col">Status</th>
                <th scope="col">Price(Kshs.)</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                @foreach($category->products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($product->images->count() > 0)
                                <img src="{{ $product->images->first()->image_url }}" alt="{{ $product->name }}"
                                    style="width: 50px; height: 50px; object-fit: cover;">

                            @else

                                <img src="{{ asset('storage/product_images/default.png') }}" alt="No image"
                                    style="width: 50px; height: 50px; object-fit: cover;">
                            @endif

                        </td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->stock_status }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <a href="" class="btn btn-primary">Edit</a>
                            <form action="{{ route('product.delete', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @empty
                <tr>
                    <td colspan="5" class="text-danger">No categories or products available</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="modal fade" id="category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('admin.store') }}" class="form-control">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add category</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Enter Category Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="mb-3">
                            <textarea name="" id="" row="4" column="90" maxlength="300"
                                placeholder="Enter Category Decsription" name="decsription"></textarea>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
            </form>
        </div>
    </div>
    </div>
    <div class="modal fade" id="products" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('admin.product') }}" class="form-control" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Products</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Enter Product Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <select name="category_id" id="category_select" class="form-control">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <div class="mb-3">
                            <label class="form-label">Enter Price</label>
                            <input type="text" class="form-control" name="price">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="image_path">
                        </div>
                        <div class="mb-3">
                            <label for="stock_status">Stock Status:</label>
                            <select id="stock_status" name="stock_status" required>
                                <option value="in stock">In stock</option>
                                <option value="out of stock">Out of stock</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection