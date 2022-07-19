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
  

  <!-- Start Header section -->
      @include('destination.includes.header')
  <!-- End Header section -->

  @yield('content')

     <!-- Start logout model -->
 <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="logoutLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logoutLabel"><span class="icon-img"><img src="{{asset('destination/images/icons/info.png')}}"></span>Alert</h5>
        </div>
        <div class="modal-body text-center">
            Are you sure you want
            to logout?
        </div>
        <div class="modal-footer cstm-btn-group ">
          <button type="button" class="outline-btn btn popup-btn" data-bs-dismiss="modal">No</button>
          <button type="button" class="edit-btn btn popup-btn">Yes</button>
        </div>
      
      </div>
    </div>
  </div>
  <!-- End logout model -->
    <!-- Start footer section -->
          @include('destination.includes.footer')
    <!-- End Footer section -->
  
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