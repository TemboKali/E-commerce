<nav class="navbar navbar-expand-lg navbar-dark bg-dark position-sticky" style="top: 0; z-index: 1030;">
    <div class="container-fluid">
        <img src="{{ asset($settings->logo) }} " style='width:80px;height:80px;border-radius:50%'>
        <h4>{{ $settings->blog_name }}</h4>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse me-2" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
            <div class="icons" style="color:white;display:flex;gap:20px;font-size:1.5em;cursor:pointer">
                <div class="icon2">
                    <a href="{{ route('cart.view') }}"
                        style="color: white; text-decoration: none; position: relative; display: inline-block;">
                        <i class="bi bi-cart-fill" style="font-size: 1.5em;"></i>
                        <span class="badge bg-danger"
                            style="position: absolute; top: -10px; right: -10px; border-radius: 50%; padding: 5px 8px; font-size: 0.75em;">
                            {{ count(session('cart', [])) }}
                        </span>
                    </a>
                </div>
                <div class="icon1">
                    <a href="{{ route('client.login') }}"
                        style="color: white; text-decoration: none; position: relative; display: inline-block;">
                        <i class="bi bi-person-fill"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>