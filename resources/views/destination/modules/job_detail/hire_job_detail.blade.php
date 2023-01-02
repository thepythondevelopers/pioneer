@extends('destination.layouts.layout')



@section('content')

    

    <!-- job-history-section -->
    <section class="inner-banner bg">
        <div class="container container-1440 innercontent_wrp">
            <h2>Job Overview</h2>
        </div>
    </section>
        <section class="job-history-section p-60">
            <div class="container container-1440">
                <div class="job-history-card job-detail-card shadow br-10 p-md-5 p-4 border-radius">
                    <div class="row">
                    <div class=" col-lg-3 mb-4">
                            <div class="profile-picture-img shadow  br-10 ">
                                <img src="{{url($j->hire_user->logo)}}" class=" br-10" alt="destination-img">
                                <figure class="shadow applicant-icon">
                                <img src="{{asset('destination/images/icons/company.png')}}" alt="icon">
                            </figure>
                            </div>
                            <div class="applicant-name h6 fw-bold my-3">
                                {{$j->hire_user->first_name}}
                            </div>
                            <div class="job-card-btn text-center">
                                <a href="{{route('destination.chat.param',[$j->_id,$j->hire_person])}}" class="edit-btn btn popup-btn">Message</a>
                            </div>
                        </div>

                        <div class=" col-lg-9">
                            
                                <h5 class="mb-2 fw-bold">{{$j->title}}</h5>
                                <p class="fz-18 mb-5 more_less">
                                    {!! $j->description !!}
                                </p>                               
                           
                        </div>
                        <div class=" col-12">
                        <div class="mb-5 ">
                        <h6 class="mb-2 fw-bold">Purposal Submitted by the Applicant </h6>
                                <p class="fz-18 more_less">
                                    {{$j->hire_user_applicant->proposal}}
                                </p>
                        </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class=" col-md-4 col-sm-6">
                            <div class="job-detail-cont">
                                <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                  City
                                </div>
                                <p>{{$j->location}}</p>
                            </div>
                        </div>
                        <div class=" col-md-4 col-sm-6">
                            <div class="job-detail-cont">
                                <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                 Contact Person Name
                                </div>
                                <p>{{$j->person_name}}</p>
                            </div>
                        </div>
                        <div class=" col-md-4 col-sm-6">
                            <div class="job-detail-cont">
                                <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                  Contact Person Phone Number
                                </div>
                                <p>{{$j->contact_number}}</p>
                            </div>
                        </div>
                        <div class=" col-md-4 col-sm-6">
                            <div class="job-detail-cont">
                                <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                  Contact Person Email Id
                                </div>
                                <p>{{$j->contact_email}}</p>
                            </div>
                        </div>
                        <div class=" col-md-4 col-sm-6">
                            <div class="job-detail-cont">
                                <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                   Start Date
                                </div>
                                <p>{{date('M d, Y',strtotime($j->start_date))}}</p>
                            </div>
                        </div>
                        <div class=" col-md-4 col-sm-6">
                            <div class="job-detail-cont">
                                <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                  End Date
                                </div>
                                <p>{{date('M d, Y',strtotime($j->end_date))}}</p>
                            </div>
                        </div>
                        <div class=" col-md-4 col-sm-6">
                            <div class="job-detail-cont">
                                <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                Rating
                                </div>
                                <p>{!! show_rating($j->created_user->rating_count()) !!}</p>
                            </div>
                        </div>
                        <div class=" col-md-4 col-sm-6">
                            <div class="job-detail-cont">
                                <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                   Exact Location Address
                                </div>
                                <p>{{$j->address}}</p>
                            </div>
                        </div>
                        <div class=" col-md-4 col-sm-6">
                            <div class="job-detail-cont">
                                <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                  Shift Start Time
                                </div>
                                <p>{{$j->shift_start_time}}</p>
                            </div>
                        </div>
                        <div class=" col-md-4 col-sm-6">
                            <div class="job-detail-cont">
                                <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                    Shift End Time
                                </div>
                                <p>{{$j->shift_end_time}}</p>
                            </div>
                        </div>
                        <!-- <div class=" col-md-4 col-sm-6">
                            <div class="job-detail-cont">
                                <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                   <span class="small-icon me-2"><img src="{{asset('destination/images/icons/clock-bw.png')}}"></span> Meeting Time
                                </div>
                                <p>08:25 PM</p>
                            </div>
                        </div> -->
                        <div class=" col-md-4 col-sm-6">
                            <div class="job-detail-cont">
                                <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                 Total Amount Spent
                                </div>
                                <p>${{$j->total_amount_spent()}}</p>
                            </div>
                        </div>
                       
                    </div>
                    <div class=" col-md-12 mt-4">
                            <button type="button" class="btn job_close edit-btn  popup-btn" data-action="{{route('destination.job.close.status',$j->_id)}}">Job Close</button>
                    </div>
                </div>

            </div>
        </section>

    <!-- job-history-detail-section -->
@stop

@section('scripts')
<script type="text/javascript">
    var socket = io("{{socket_ip()}}");
             jQuery("form[id='rating']").validate({
                ignore:'',
    rules: {
      'rating':{
            required: true
        }, 
        'comment':{
            required: true,
            nowhitespace: true  
        }
    }
   });        


 function more_less(){
    // Configure/customize these variables.
    var showChar = 270;  // How many characters are shown by default
    var ellipsestext = "...";
    var moretext = "Show more";
    var lesstext = "Show less";
    

    $('.more_less').each(function() {
        var content = $(this).html();
 
        if(content.length > showChar) {
 
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
 
            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span><button type="button" class="morelink">' + moretext + '</button></span>';
 
            $(this).html(html);
        }
 
    });
 
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
}   

         
$(document).on('click', '.job_close', function(event){
        url = $(this).attr('data-action');
    $this = $(this);
    $.ajax({
               url : url,
               type: 'POST', 
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
                        toastr.success(result.message);
                        
                        setTimeout(function () {
                    window.location.href = result.url;
                    socket.emit('notification', 'notification');
                 }, 1000);
                        }else{
                            toastr.error(result.message);    
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