<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('destination/images/favicon.png')}}" type="image/x-icon">
    <title>Create</title>
    <!-- Boostrap css -->
    <link rel="stylesheet" href="{{asset('destination/library/boostrap/css/bootstrap.min.css')}}">
    <!-- Custom style -->
    <link rel="stylesheet" href="{{asset('destination/css/base.css')}}">
    <link rel="stylesheet" href="{{asset('destination/css/Inner-pages.css')}}">
    <link rel="stylesheet" href="{{asset('destination/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('destination/css/responsive.css')}}">
</head>

<body>
  

  

  @yield('content')


  
  <!-- Java Script -->
  <script src="{{asset('destination/js/Jquery.js')}}"></script>
  <!-- popper js -->
  <script src="{{asset('destination/js/popper.js')}}"></script>
  <!-- boostrap -->
  <script src="{{asset('destination/library/boostrap/js/bootstrap.min.js')}}"></script>
  <!-- Custom Js -->
  <script src="{{asset('destination/js/custom.js')}}"></script>
</body>

</html>