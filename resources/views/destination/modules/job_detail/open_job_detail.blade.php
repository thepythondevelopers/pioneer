@extends('destination.layouts.layout')



@section('content')
<section class="inner-banner bg">
    <div class="container container-1440 innercontent_wrp">
        <h2>Job detail</h2>
    </div>
</section>
    <!-- Start Job Details Section -->
    <div class="job-detail p-60">
        <div class="container container-1440">        
            <div class="job-detail-card  shadow br-10 d-flex align-items-center p-4 border-radius">
                <div class="row">
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                            <div class="job-detail-title fz-16 fw-bold">
                                Job Title
                            </div>
                            <p class="fz-14">{{$job->title}}</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                        <div class="job-detail-title fz-16 fw-bold">
                                Job Type
                            </div>
                            <p class="fz-14">{{$job->job_type}}</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                        <div class="job-detail-title fz-16 fw-bold">
                                Start Date
                            </div>
                            <p class="fz-14">{{date('M d, Y',strtotime($job->start_date))}}</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                        <div class="job-detail-title fz-16 fw-bold">
                                End Date
                            </div>
                            <p class="fz-14">{{date('M d, Y',strtotime($job->end_date))}}</p>
                        </div>
                    </div>
                   
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                        <div class="job-detail-title fz-16 fw-bold">
                                Houly Rate
                            </div>
                            <p class="fz-14">{{$job->hour_rate}} Usd/Hr</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                        <div class="job-detail-title fz-16 fw-bold">
                                Shift Start Date
                            </div>
                            <p class="fz-14">{{$job->shift_start_time}}</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                        <div class="job-detail-title fz-16 fw-bold">
                                Shift End Date
                            </div>
                            <p class="fz-14">{{$job->shift_end_time}}</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                        <div class="job-detail-title fz-16 fw-bold">
                                Location
                            </div>
                            <p class="fz-14">{{$job->location}}</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                        <div class="job-detail-title fz-16 fw-bold">
                                Job Duration
                            </div>
                            <p class="fz-14">{{$job->duration}}</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                        <div class="job-detail-title fz-16 fw-bold">
                                Contact Person Name
                            </div>
                            <p class="fz-14">{{$job->person_name}}</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                        <div class="job-detail-title fz-16 fw-bold">
                                Contact Person Phone Number
                            </div>
                            <p class="fz-14">{{$job->contact_number}}</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                        <div class="job-detail-title fz-16 fw-bold">
                                Contact Person Email Id
                            </div>
                            <p class="fz-14">{{$job->contact_email}}</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="job-detail-cont">
                        <div class="job-detail-title fz-16 fw-bold">
                                Job Description
                            </div>
                            <p class="fz-14">{{$job->description}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="heading-wrapper pt-5">
                <h4 class="heading after-line grey-line">Applicant List</h4>
            </div>
            <div class="job-applicant-list">
                <ul class="job-card-list list-unstyled p-0 mt-4" id="job-applicant">
                    
                </ul>
            </div>
            
        </div>
    </div>
    <!-- End Job Detail Section -->
@stop

@section('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    var socket = io("{{socket_ip()}}");
$(document).on('click', '.pagination a', function(event){
  event.preventDefault(); 
  var $url = $( this ).attr('href');   
    filterFormAjax($url);
 });
      
filterFormAjax();

function filterFormAjax($url=0) {  
  var url = $url == 0 ? "{{route('destination.job.applicant',$job->_id)}}" : $url;
      $.ajax({
               url : url,
               type: 'GET', 
              // data:$this.serialize(),  
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
                beforeSend: function() {
                     $("body").find('.load_screen').show();
                },
                success: function (result) {
                       if(parseInt(result.status) == 1){
                        $("body").find('.load_screen').hide();
                        $("body").find('#job-applicant').html(result.html);
                        
                        }
               },
               complete: function() {
                        
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

        });
}

$(document).on('click', '.f_message', function(event){
 swal({
  title: "Are you sure?",
  text: "Want to initialize the message",
  icon: "warning",
  buttons: true,
  dangerMode: true,
   buttons: ["No, cancel it!",'Yes, I am sure!']
})
.then((willDelete) => {
  if (willDelete) {
    job_id = $(this).attr('data-job_id');
    applicant_id = $(this).attr('data-applicant_id');
    initialize_message_chat(job_id,applicant_id);
  } else {
    
  }
});
 });

function initialize_message_chat(job_id,applicant_id){
    $.ajax({
               url : "{{route('destination.job.applicant.initialize.chat')}}",
               type: 'POST', 
               data:{job_id: job_id,applicant_id:applicant_id},  
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': "{{csrf_token()}}"
               },
                beforeSend: function() {
                     $("body").find('.load_screen').show();
                },
                success: function (result) {
                       if(parseInt(result.status) == 1){
                        $("body").find('.load_screen').hide();
                        socket.emit('notification', 'notification');
                        window.location.href = result.route;
                        }
               },
               complete: function() {
                        
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

        });
}
$(document).on('click', '.c_message', function(event){
        job_id = $(this).attr('data-job_id');
    applicant_id = $(this).attr('data-applicant_id');
    $.ajax({
               url : "{{route('destination.chat')}}",
               type: 'GET', 
               data:{job_id: job_id,applicant_id:applicant_id},  
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': "{{csrf_token()}}"
               },
                beforeSend: function() {
                     $("body").find('.load_screen').show();
                },
                success: function (result) {
                       if(parseInt(result.status) == 1){
                        $("body").find('.load_screen').hide();
                        window.location.href = result.route;
                        }
               },
               complete: function() {
                        
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

        });
});
    </script>
@endsection