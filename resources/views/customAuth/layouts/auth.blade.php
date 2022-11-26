<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('auth/images/favicon.png')}}" type="image/x-icon">
    <title>Pioneer</title>
    <!-- Boostrap css -->
    <link rel="stylesheet" href="{{asset('auth/library/boostrap/css/bootstrap.min.css')}}">
    <!-- Custom style -->
    <link rel="stylesheet" href="{{asset('auth/css/base.css')}}">
    <link rel="stylesheet" href="{{asset('auth/css/Inner-pages.css')}}">
    <link rel="stylesheet" href="{{asset('auth/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('auth/css/responsive.css')}}">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
</head>

<body>
  

  

  @yield('content')

  <!-- Start logout model -->
  <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="logoutLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logoutLabel"><span><img src="{{asset('pioneer/images/icons/logout_icon.png')}}"></span>
          </h5>
        </div>
        <div class="modal-body text-center">
          Are you sure you want
          to logout?
        </div>
        <div class="modal-footer cstm-btn-group ">
          <button type="button" class="btn form-btn" data-bs-dismiss="modal">No</button>
          <a href="{{route('logout')}}" class="btn form-btn">Yes</a>
        </div>

      </div>
    </div>
  </div>
  <!-- End logout model -->
  

  
  <!-- Java Script -->
  <script src="{{asset('auth/js/Jquery.js')}}"></script>
  <!-- popper js -->
  <script src="{{asset('auth/js/popper.js')}}"></script>
  <!-- boostrap -->
  <script src="{{asset('auth/library/boostrap/js/bootstrap.min.js')}}"></script>
  <!-- Custom Js -->
  <script src="{{asset('auth/js/custom.js')}}"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script> 
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>  
      <script type="text/javascript">        
                jQuery.validator.addMethod("nowhitespace", function(value, element) {
          return this.optional(element) || /^\S+/i.test(value);
        }, "Space is not allowed at the beginning.");

         jQuery.validator.addMethod("customemail", function(value, element) {
          return this.optional(element) || /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value);
        }, "Please enter a valid email address."); 
      </script>
  @yield('scripts')
</body>

</html>