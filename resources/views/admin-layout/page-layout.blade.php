<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('pageTitle')</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @stack('stylesheets')
    <!-- Custom styles for the dashboard -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 200px;
            background-color: #343a40;
            padding-top: 20px;
            border-right: 2px solid red;
            overflow-y: scroll;
        }

        .sidebar a {
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #007bff;
        }

        .content-wrapper {
            margin-left: 260px;
            padding: 20px;
        }

        .content-wrapper h1 {
            color: #333;
        }

        span {
            color: white;
        }

        .nav-item {
            display: flex;
            align-items: center;
            padding: 10px 15px;
        }

        .nav-item span {
            margin-right: 8px;
        }

        .nav-item a {
            color: white;
        }

        .bar {
            width: 86.5%;
            height: 100px;
            background-color: #343a40;
            position: relative;
            left: 13.2%;
            color: white;
            display: flex;
            align-items: center;
        }

        .text {
            flex-grow: 1;
            /* Ensures the text takes the available space */
        }

        .profile {
            margin-left: auto;
            width: 50px;
            height: 50px;
            border: 1px solid white;
            border-radius: 50%;
            margin-right: 100px;
        }

        h6 {
            position: relative;
            top: 41px;
            text-align: center;
        }

        a.dropdown-item {
            color: black;
        }

        .center {
            position: relative;
            top: 30px;
            gap: 20px;
        }

        .buttons {
            position: absolute;
            right: 15px;
            display: flex;
            gap: 10px;
        }

        .buttons {
            position: absolute;
            right: 15px;
            display: flex;
            gap: 10px;
            z-index: 1000;
        }


        #logoTableContainer,
        #socialTableContainer {
            margin-top: 80px;
            z-index: 1;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">

        <ul class="nav flex-column">
            <li class="nav-item">
                <span><i class="bi bi-speedometer2"></i></span>
                <a class="nav-link active" href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <span><i class="bi bi-person-circle"></i></span>
                <a class="nav-link" href="#">Profile</a>
            </li>
            <li class="nav-item">
                <span><i class="bi bi-collection-play-fill"></i></span>
                <a href="" class="nav-link">Media</a>
            </li>

            <li class="nav-item">
                <span><i class="bi bi-bag-heart-fill"></i></span>
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Products
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" type="button">View Products</a></li>
                        <li><a class="dropdown-item" type="button" href="{{ route('admin.category') }}">Categories</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <span><i class="bi bi-chat-dots-fill"></i></span>
                <a href="" class="nav-link">Chats</a>
            </li>
            <li class="nav-item">
                <span><i class="bi bi-wallet-fill"></i></span>
                <a href="{{ route('admin.payment') }}" class="nav-link">Payment Methods</a>
            </li>
            <li class="nav-item">
                <span><i class="bi bi-chat-text-fill"></i></span>
                <a class="nav-link" href="#">Reports</a>
            </li>
            <li class="nav-item">
                <span><i class="bi bi-gear-fill"></i></span>
                <a class="nav-link" href="{{ route('admin.settings') }}">Settings</a>
            </li>
            <li class="nav-item">
                <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <span><i class="bi bi-box-arrow-left"></i></span>
                    <button type="submit" class="btn btn-link text-white text-decoration-none">Logout</button>
                </form>
            </li>
        </ul>
    </div>
    @yield('content');
    @stack('scripts');
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editLogoBtn = document.getElementById('editLogoBtn');
        const editSocialBtn = document.getElementById('editSocialBtn');
        const logoTableContainer = document.getElementById('logoTableContainer');
        const socialTableContainer = document.getElementById('socialTableContainer');

        editLogoBtn.addEventListener('click', function () {
            if (logoTableContainer.style.display === 'none') {
                logoTableContainer.style.display = 'block';
                socialTableContainer.style.display = 'none';
            } else {
                logoTableContainer.style.display = 'none';
            }
        });

        editSocialBtn.addEventListener('click', function () {
            if (socialTableContainer.style.display === 'none') {
                socialTableContainer.style.display = 'block';
                logoTableContainer.style.display = 'none';
            } else {
                socialTableContainer.style.display = 'none';
            }
        });
    });
</script>


</html>