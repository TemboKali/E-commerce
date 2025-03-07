<div class="container">
    <div class="row">
        @forelse($categories as $category)
            @foreach($category->products as $product)
                <div class="col-md-3 mb-4">
                    <a href="{{ route('product.show', $product->id) }}" class="text-decoration-none text-dark">
                        <div class="product-card mt-4" style="cursor:pointer;">
                            @if($product->images->count() > 0)
                                <img src="{{ $product->images->first()->image_url }}" alt="{{ $product->name }}" class="img-fluid"
                                    style="width:500px;height: 200px; object-fit: cover;">
                            @endif

                            <div class="product-info text-center mt-3">
                                <h5 class="product-name">{{ $product->name }}</h5>
                                <p class="product-price">Kshs.{{ number_format($product->price, 2) }}</p>
                                <div class="d-flex justify-content-center gap-2">
                                    <form action="" method="POST" class="d-inline">
                                        @csrf
                                        <input type="hidden">
                                        <button type="submit" class="btn btn-danger buy-now">Buy now</button>
                                    </form>
                                    <form action="{{ route('cart.add') }}" method="POST" class="d-inline"
                                        onsubmit="return myFunc(event)">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="btn btn-primary add-to-cart">Add to Cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        @empty
            <span class="text-danger">Empty</span>
        @endforelse
    </div>
</div>
<script>
    function myFunc(e) {
        e.preventDefault();

        const form = e.target;
        const formData = new FormData(form);
        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log('Success:', data);
                alert("Product added to cart!");
                if (data.cart_count !== undefined) {
                    const cartBadge = document.querySelector('.badge.bg-danger');
                    if (cartBadge) {
                        cartBadge.textContent = data.cart_count;
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert("There was an error adding the product to your cart.");
            });

        return false;
    }
</script>

<style>
    .product-card {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
        position: relative;
        top: 30px;
    }

    .product-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
    }

    .product-name {
        font-size: 18px;
        font-weight: bold;
    }

    .product-price {
        font-size: 16px;
        color: #28a745;
        margin: 10px 0;
    }

    .add-to-cart {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 8px 15px;
        border-radius: 5px;
        cursor: pointer;
    }

    .add-to-cart:hover {
        background-color: #0056b3;
    }
</style>