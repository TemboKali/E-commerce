<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('pageTitle')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Englebert&display=swap" rel="stylesheet">
    </style>
    @stack('stylesheets')
    <style type="text/css">
        * {
            position: relative;
        }

        .list-categories {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            position: relative;
            top: 30px;
            gap: 30px;
            width: 100%;
        }

        .list-categories ul {
            display: flex;
            gap: 30px;
            position: relative;
        }

        .list-categories li {
            list-style-type: none;
        }

        .list-categories li a {
            text-decoration: none;
            color: navy;
            font-size: 1.0em;
            font-weight: bold;
        }

        .search {
            width: 300px;
        }

        .search input {
            width: 80%;
            border: none;
            outline: none;
            padding: 10px;
        }

        .search input:focus {
            border: 1px solid black;
            border-radius: 15px;
        }

        h4 {
            color: white;
            font-family: "Englebert", cursive;
            font-weight: 400;
            font-style: normal;
            margin-left: 10px;
            text-shadow: 0 2px whitesmoke;
        }

        .lists {
            position: relative;
            width: 80%;
        }

        .btn-custom {
            padding: 0.25rem 0.5rem;
            width: 150px;
        }

        .banner {
            position: relative;
            width: 100%;
            height: 740px;
            overflow: hidden;
        }

        .banner img {
            width: 100%;
            height: 740px;
            object-fit: cover;
            filter: brightness(70%);
            /* darken the image a bit for better text contrast */
        }

        .banner .overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            text-align: center;
            padding: 20px;
        }

        .banner .overlay h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .banner .overlay p {
            font-size: 1.25rem;
        }

        .icon2 {
            position: relative;
            right: 50px;
        }
    </style>
</head>

<body>
    @yield('content')
    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>