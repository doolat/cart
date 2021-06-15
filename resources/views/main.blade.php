<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="w-75 text-white mx-auto border" style="height: 100vh;background-color: #d0c6c6;position:relative;">
        <div id="header" class="w-100 b--solid p-2" style="height: 80px;background-color: #62829c">
            <a href="{{route('getCart')}}"><button class="bg-danger text-light d-inline" style="float: right;height: 60px;width: 60px;">Cart</button></a>
            @yield('header')
        </div>
        <div id="content">
            @yield('content')
        </div>
        <div id="footer" class="p-2 align-middle text-center" style="background-color: black;height: 70px;position:absolute;width:100%;bottom:0;">
            © 2020 Copyright:
            <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
    </div>
</body>
</html>
