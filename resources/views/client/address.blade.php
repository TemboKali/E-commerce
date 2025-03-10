@extends('client.client_page_layout.page_layout')
@section('content')
    <div class="container">
        <h2>Enter Your Address Details</h2>

        <div class="row">
            <!-- Left Side: Address Form -->
            <div class="col-md-6">
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ request('product_id') }}">

                    <div class="mb-3">
                        <label for="address">Country</label>
                        <input type="text" name="address" class="form-control" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="city">City</label>
                                <input type="text" name="city" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="zip_code">Zip Code</label>
                                <input type="text" name="zip_code" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success">CheckOut</button>
                </form>
            </div>

            <!-- Right Side: Product Details -->
            <div class="col-md-6">
                <h4 class="text-black">Product Details</h4>
                <div class="card">
                    <img src="{{ asset($product->images->first()->image_path) }}" class="card-img-top" alt="Product Image"
                        style="height:400px;width:300px;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">Price: Kshs. <span
                                id="product-price">{{ number_format($product->price, 2) }}</span></p>

                        <!-- Quantity Input -->
                        <div class="d-flex align-items-center">
                            <label for="quantity" class="me-2">Quantity:</label>
                            <input type="number" id="quantity" class="form-control" value="1" min="1" style="width: 80px;">
                        </div>

                        <!-- Total Price -->
                        <p class="mt-2">Total: Kshs. <span id="total-price">{{ number_format($product->price, 2) }}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Quantity Update -->
    <script>
        document.getElementById('quantity').addEventListener('input', function () {
            let quantity = this.value;
            let price = parseFloat({{ $product->price }});
            let totalPrice = quantity * price;
            document.getElementById('total-price').innerText = totalPrice.toFixed(2);
        });
    </script>
@endsection