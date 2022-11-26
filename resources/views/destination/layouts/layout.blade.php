<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('destination/images/favicon.png')}}" type="image/x-icon">
    <title>Destination</title>
    <!-- Boostrap css -->
    <link rel="stylesheet" href="{{asset('destination/library/boostrap/css/bootstrap.min.css')}}">
    <!-- Custom style -->
    <link rel="stylesheet" href="{{asset('destination/css/base.css')}}">
    <link rel="stylesheet" href="{{asset('destination/css/Inner-pages.css')}}">
    <link rel="stylesheet" href="{{asset('destination/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/base.css')}}">
    <link rel="stylesheet" href="{{asset('destination/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"> 
    <link rel="stylesheet" href="{{asset('custom/css/loader.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
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

  <!-- Start Header section -->
      @include('destination.includes.header')
  <!-- End Header section -->

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
    <!-- Start footer section -->
    @if(\Request::route()->getName()=='destination.chat' || \Request::route()->getName()=='destination.chat.param')
    @else   
          @include('destination.includes.footer')
    @endif      
    <!-- End Footer section -->
  
  <!-- Java Script -->
  <script src="{{asset('destination/js/Jquery.js')}}"></script>
  <!-- popper js -->
  <script src="{{asset('destination/js/popper.js')}}"></script>
  <!-- boostrap -->
  <script src="{{asset('destination/library/boostrap/js/bootstrap.min.js')}}"></script>
  <!-- Custom Js -->
  <script src="{{asset('destination/js/custom.js')}}"></script>
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
 
@if(session('job_emit'))

 <script type="text/javascript">
    var socket = io("{{socket_ip()}}");
   socket.emit('job', 'job');
 </script>
@endif
<script type="text/javascript">
 var socket = io("{{socket_ip()}}");
  socket.on('notification', function(msg){

  notification_count();  
});

notification_count();

  socket.on('chat message', function(msg){
      
  $.ajax({
               url : "{{route('destination.chat.count')}}",
               type: 'GET', 
                 
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
                beforeSend: function() {
                     
                },
                success: function (result) {
                       if(parseInt(result.status) == 1){
                        $("body").find(".message_total").text(result.count);
                        }
               },
               complete: function() {
                        
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

        });  
});

function notification_count(){
  $.ajax({
               url : "{{route('destination.notification.count')}}",
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