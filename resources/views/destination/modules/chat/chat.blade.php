@extends('destination.layouts.layout')



@section('content')
<div class="cstm-content-wrap">
  <!-- Start chat sec -->
  <input type="hidden" id="f_user_id" value="{{$user_id}}">
  <input type="hidden" id="f_job_id" value="{{$job_id}}">
  <div class="chat-sec-wrap">
    <div class="w-100">
      <div class="messaging">
        <div class="inbox_msg shadow">
          
          <div class="inbox_people shadow" >
              <div class="headind_srch">
              <div class="srch_bar">
                <div class="srch-bar-inner">
                  <input type="text" class="search-bar" id="user-search" placeholder="Client Name">
                  <span class="input-group-addon">
                    <img src="{{asset('pioneer/images/icons/search-icon.png')}}" alt="search">
                  </span>
                </div>
              </div>
            </div>
            <div id="user-list"></div>
          </div>
          
          <div class="mesgs" id="chat-message"></div>          
        </div>

      </div>
    </div>
  </div>
 
  <!-- End Chat sec -->
  </div>
  <!-- Start budget model -->


@stop

@section('scripts')

<script type="text/javascript">
  $(window).on('load', function () {
        $('.load_screen').show();
      })
user_list();
chat_message();
$("body").on( "keypress", "#hire_budget" ,function(event) {
        if (this.value.length == 0 && event.which == 48 ){
            return false;
        }
        return /\d/.test(String.fromCharCode(event.keyCode));
    });




$("body").on("submit", "#hire-budget-form", function(e){
            e.preventDefault();    
      data =  $(this).serialize();
      url = $(this).attr('data-action');
        hire_job(url,data);
  });

var socket = io("{{socket_ip()}}");


$("body").on('keyup', "#user-search", function(e){
            e.preventDefault();    
            user_list($(this).val());
});            

$("body").on("submit", "#form", function(e){
            e.preventDefault();    
      socket.emit('chat message', $(this).serialize());
      chat_save($(this).serialize());
      $("#message").val('');
  });
  
$("body").on("click", ".user-select", function(e){
  count = $(this).find('.count').text('');
  $('.user-select').removeClass('active_chat');
  $(this).addClass('active_chat');
  job_id = $(this).attr('data-job_id');
    applicant_id = $(this).attr('data-applicant_id');
  chat_message(job_id,applicant_id);
});  
socket.on('chat message', function(msg){
      
  condition = $("#form").serialize();
  user_id = "{{Auth::user()->_id}}";  

const msg_params = new URLSearchParams(msg);
const condition_params = new URLSearchParams(condition);

const send_to = msg_params.get('send_to');
const send_by = msg_params.get('send_by');
const job_id = msg_params.get('job_id');
const c_job_id = condition_params.get('job_id');


  if((user_id == send_to || user_id == send_by) && job_id==c_job_id){
    chat_html(msg);
  }
    user_list();


});

function chat_html(data){
  $.ajax({
               url : "{{route('destination.chat.html')}}",
               type: 'GET', 
               data:data,  
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': "{{ csrf_token() }}"
               },
                beforeSend: function() {
                     //$("body").find('.load_screen').show();
                },
                success: function (result) {

                       if(parseInt(result.status) == 1){
                        $("body").find('.msg_history').append(result.html);
                        $('.msg_history').animate({  scrollTop: $('.msg_history')[0].scrollHeight}, "slow");
                        }
               },
               complete: function() {
                        
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

        });
}


function chat_save(data) {

  
      $.ajax({
               url : "{{route('destination.chat.save')}}",
               type: 'POST', 
               data:data,  
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': "{{ csrf_token() }}"
               },
                beforeSend: function() {
                     
                },
                success: function (result) {
                      //  socket.emit('notification', 'notification');
               },
               complete: function() {
                        
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

        });
}


    
function user_list(data=null) {

  
      $.ajax({
               url : "{{route('destination.chat.user.list')}}",
               type: 'GET', 
               data:{search: data},  
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
                beforeSend: function() {
                     $("body").find('.load_screen').show();
                },
                success: function (result) {
                       if(parseInt(result.status) == 1){
                        $("body").find('#user-list').html(result.html);
                        
                        }
               },
               complete: function() {
                
                    $("body").find('.load_screen').hide();    
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

        });
}

    
function chat_message(job_id=null,user_id=null) {
    job_id = job_id!=null ? job_id : $("#f_job_id").val();
    user_id = user_id!=null ? user_id : $("#f_user_id").val();
      $.ajax({
               url : "{{route('destination.chat.message')}}",
               type: 'GET', 
               data:{job_id : job_id,user_id:user_id},  
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
                beforeSend: function() {
                     $("body").find('.load_screen').show();
                },
                success: function (result) {
                  
                       if(parseInt(result.status) == 1){
                        $("body").find('#chat-message').html(result.html);      
                        }
                        
                        if(result.check===null){
                           chat_message($(".user-select").attr("data-job_id"),$(".user-select").attr("data-applicant_id"))      
                           
                        }else{
                          $('.msg_history').animate({  scrollTop: $('.msg_history')[0].scrollHeight}, "slow");
                          id = $("#active-user-list").val();
                          $(".user-select").removeClass("active_chat");
                         $("."+id).addClass("active_chat");
                         message_count();
                        }
               },
               complete: function() {
                   $("body").find('.load_screen').hide();             
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

        });
}

function message_count(){
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
}

function hire_job(url,data){
  $.ajax({
               url : url,
               type: 'POST', 
                 
               dataTYPE:'JSON',
               data : data,
               headers: {
                 'X-CSRF-TOKEN': "{{ csrf_token() }}"
               },
                beforeSend: function() {
                     
                },
                success: function (result) {
                       if(parseInt(result.status) == 1){
                        $('#budget').modal('toggle');
                        toastr.success(result.message);
                          chat_message();   
                          socket.emit('notification', 'notification');
                        }
               },
               complete: function() {
                        
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

        });
}

</script>
@endsection