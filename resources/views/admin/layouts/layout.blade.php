<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('admin/images/favicon.png')}}" type="image/x-icon">
    <title>Admin</title>
    <!-- Boostrap css -->
    <link rel="stylesheet" href="{{asset('admin/library/boostrap/css/bootstrap.min.css')}}">
    <!-- Custom style -->
    <link rel="stylesheet" href="{{asset('admin/css/base.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/responsive.css')}}">

    <link rel="stylesheet" href="{{asset('custom/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/base.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/admin/style.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{asset('custom/css/loader.css')}}">
    <style>
      div#logout .modal-dialog {
    max-width: 300px;
    top: 18%;
}

div#logout .modal-content {
    padding: 20px;
    border-radius: 15px;
}

div#logout .modal-header {
    display: flex;
    justify-content: center;
    padding: 0;
    border: 0;
    text-align: center;
}

div#logout .modal-header img {
    max-width: 80px;
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

div#logout .modal-body {
    font-size: 12px;
    font-weight: 600;
    padding: 10px 0;
}

div#logout .modal-footer {
    border: 0;
    padding: 0;
    flex-wrap: nowrap;
    justify-content: center;
}

div#logout .cstm-btn-group {
    display: inline-flex;
    align-items: center;
}

div#logout .modal-footer button,
div#logout .modal-footer .btn {
    min-height: auto;
    max-width: 45%;
    width: 100%;
    max-height: 40px;
    display: flex;
    align-items: center;
    background:#fa006e;
    border: 0 !important;
    border-radius: 0;
    justify-content: center;
}

    </style>
    @yield('style')
</head>
<body>
   <div class="load_screen">
      <div class="loading">
        <div class="loader-wrapper">
          <div class="loader"></div>
          <div class="loader-section section-left"></div>
          <div class="loader-section section-right"></div>
        </div>
      </div>
    </div>
    <div class="dashboard">
        <!-- Start Side Navbar -->
        @include('admin.includes.navbar')

        <!-- Main content -->
        <div class="dashboard-content pt-0">
            @include('admin.includes.header')
            @yield('content')

            <!-- Start logout model -->
 <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="logoutLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="logoutLabel"><span><img src="http://18.209.69.216/pioneer/images/icons/logout_icon.png"></span>
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
        <!-- <div class="modal-footer cstm-btn-group ">
          <button type="button" class="outline-btn btn popup-btn" data-bs-dismiss="modal">No</button>
          <a href="{{route('logout')}}" class="edit-btn btn popup-btn">Yes</a>
        </div> -->
      
      </div>
    </div>
  </div>
  <!-- End logout model -->

            <!-- footer -->
            @include('admin.includes.footer')
        </div>
    </div>



    <!-- Java Script -->
    <script src="{{asset('admin/js/Jquery.js')}}"></script>
    <!-- Plotyly -->
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <!-- Graph js -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- popper js -->
    <script src="{{asset('admin/js/popper.js')}}"></script>
    <!-- boostrap -->
    <script src="{{asset('admin/library/boostrap/js/bootstrap.min.js')}}"></script>
    <!-- Custom Js -->
    <script src="{{asset('admin/js/custom.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script> 
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>  
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
      <script type="text/javascript">        
                jQuery.validator.addMethod("nowhitespace", function(value, element) {
          return this.optional(element) || /^\S+/i.test(value);
        }, "Space is not allowed at the beginning.");

         jQuery.validator.addMethod("customemail", function(value, element) {
          return this.optional(element) || /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value);
        }, "Please enter a valid email address."); 
      toastr.options = {
        'closeButton': true,
        'debug': false,
        'newestOnTop': false,
        'progressBar': false,
        'positionClass': 'toast-top-right',
        'preventDuplicates': false,
        'showDuration': '1000',
        'hideDuration': '1000',
        'timeOut': '5000',
        'extendedTimeOut': '1000',
        'showEasing': 'swing',
        'hideEasing': 'linear',
        'showMethod': 'fadeIn',
        'hideMethod': 'fadeOut',
      }

       
         $(window).on('load', function () {
    $('.load_screen').hide();
  }) 
      </script>
      @if(session('message'))
     <script type="text/javascript">
       toastr.{{session('message_type')}}('{{session('message')}}');
     </script> 
@endif
 <script src="{{socket_ip()}}/socket.io/socket.io.js" ></script>
 @if(session('notification'))
 <script type="text/javascript">
    var socket = io("{{socket_ip()}}");
   socket.emit('notification', 'notification');
 </script>
@endif

<script type="text/javascript">
 var socket = io("{{socket_ip()}}");
  socket.on('notification', function(msg){
          notification_count();
  
});

  function notification_count(){
    $.ajax({
               url : "{{route('admin.notification.count')}}",
               type: 'GET', 
                 
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
                beforeSend: function() {
                     
                },
                success: function (result) {
                       if(parseInt(result.status) == 1){
                          count = result.count==0 ? '' : result.count;
                          $("body").find('.counts').text(count);
                        }
               },
               complete: function() {
                        
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

        });  
  }
</script>
  @yield('scripts')
</body>

</html>