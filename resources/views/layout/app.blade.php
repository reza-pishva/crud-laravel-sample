<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{URL::to('/')}}/jquery.min.js"></script>
    <script src="{{URL::to('/')}}/popper.min.js"></script>
    <script src="{{URL::to('/')}}/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{URL::to('/')}}/bootstrap.min.css"> 
    <title>Customer</title>   
</head>

<body style="padding-top: 50px;background-image: url('{{URL::to('/')}}/images1.png');">
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    @yield('content')
    <script src="{{ asset('/js/app.js') }}"></script>
</body>

</html>