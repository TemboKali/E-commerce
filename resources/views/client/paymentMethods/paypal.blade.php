<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('postpayment') }}" method="POST">
        @csrf
        <input type="text" name='amount' placeholder="Enter amount">
        <button class="btn btn-sucess" type="submit">Send</button>
    </form>
</body>

</html>