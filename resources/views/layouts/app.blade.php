<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laravel CRUD </title>
    <meta charset="utf-8">
    <!--<meta name="csrf-token" content=" csrf_token() ">-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>-->
	<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>-->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script src="{{ asset('js/customers.js') }}"></script>
    <script src="{{ asset('js/orders.js') }}"></script>

</head>
<body>
<div class="container">
    @yield('content')
</div>
</body>



</html>
