@extends('destination.layouts.layout')



@section('content')

    <!-- job-history-section -->
    <section class="inner-banner bg">
            <div class="container container-1440 innercontent_wrp">
                <h2>Ongoing Job Overview</h2>
            </div>
        </section>
        <section class="job-history-section ongoing-jobs p-60">
            <div class="container container-1440">
                <div class="job-history-card job-detail-card shadow br-10 p-4 border-radius">
                    <div class="row">
                        <div class="col-xl-10 col-lg-9">
                            <div class="mb-sm-5 mb-4 pe-4">
                                <h5 class="mb-2 fw-bold">{{$j->title}}</h5>
                                <p class="fz-14 mb-4 more_less">
                                    {{$j->description}}
                                </p>

                                <h6 class="mb-2 fw-bold">Purposal Submitted by the Applicant </h6>
                                <p class="fz-14">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged <a href="#" class="more-link">more...</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3">
                            <div class="profile-picture-img shadow  br-10 ">
                                <img src="{{asset('destination/images/aplicant.png')}}" class=" br-10" alt="destination-img">
                                <figure class="shadow applicant-icon">
                                <img src="{{asset('destination/images/icons/company.png')}}" alt="icon">
                            </figure>
                            </div>
                            <div class="applicant-name fz-18 fw-bold my-2">
                                Jack  Carter
                            </div>
                            <div class="job-card-btn text-center mb-sm-0 mb-4">
                                <a href="/chat" class="edit-btn btn popup-btn">Message</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-md-4 col-sm-6">
                            <div class="job-detail-cont">
                                <div class="job-detail-title fz-16 fw-bold d-flex mb-2">
                                   <span class="small-icon me-2"><img src="{{asset('destination/images/icons/city.png')}}"></span> City
                                </div>
                                <p class="fz-14">{{$j->location}}</p>
                            </div>
                        </div>
                        <div class=" col-md-4 col-sm-6">
                            <div class="job-detail-cont">
                                <div class="job-detail-title fz-16 fw-bold d-flex mb-2">
                                   <span class="small-icon me-2"><img src="{{asset('destination/images/icons/notebook.png')}}"></span> Contact Person Name
                                </div>
                                <p class="fz-14">{{$j->person_name}}</p>
                            </div>
                        </div>
                        <div class=" col-md-4 col-sm-6">
                            <div class="job-detail-cont">
                                <div class="job-detail-title fz-16 fw-bold d-flex mb-2">
                                   <span class="small-icon me-2"><img src="{{asset('destination/images/icons/phone-bw.png')}}"></span> Contact Person Phone Number
                                </div>
                                <p class="fz-14">{{$j->contact_number}}</p>
                            </div>
                        </div>
                        <div class=" col-md-4 col-sm-6">
                            <div class="job-detail-cont">
                                <div class="job-detail-title fz-16 fw-bold d-flex mb-2">
                                   <span class="small-icon me-2"><img src="{{asset('destination/images/icons/mail-bw.png')}}"></span> Contact Person Email Id
                                </div>
                                <p class="fz-14">{{$j->contact_email}}</p>
                            </div>
                        </div>
                        <div class=" col-md-4 col-sm-6">
                            <div class="job-detail-cont">
                                <div class="job-detail-title fz-16 fw-bold d-flex mb-2">
                                   <span class="small-icon me-2"><img src="{{asset('destination/images/icons/calender2.png')}}"></span> Start Date
                                </div>
                                <p class="fz-14">{{date('M d, Y',strtotime($j->start_date))}}</p>
                            </div>
                        </div>
                        <div class=" col-md-4 col-sm-6">
                            <div class="job-detail-cont">
                                <div class="job-detail-title fz-16 fw-bold d-flex mb-2">
                                   <span class="small-icon me-2"><img src="{{asset('destination/images/icons/calender2.png')}}"></span> End Date
                                </div>
                                <p class="fz-14">{{date('M d, Y',strtotime($j->end_date))}}</p>
                            </div>
                        </div>
                        <div class=" col-md-4 col-sm-6">
                            <div class="job-detail-cont">
                                <div class="job-detail-title fz-16 fw-bold d-flex mb-2">
                                   <span class="small-icon me-2"><img src="{{asset('destination/images/icons/rating.png')}}"></span> Rating
                                </div>
                                <p class="fz-14">4.5</p>
                            </div>
                        </div>
                        <div class=" col-md-4 col-sm-6">
                            <div class="job-detail-cont">
                                <div class="job-detail-title fz-16 fw-bold d-flex mb-2">
                                   <span class="small-icon me-2"><img src="{{asset('destination/images/icons/city.png')}}"></span> Exact Location Address
                                </div>
                                <p class="fz-14">{{$j->address}}</p>
                            </div>
                        </div>
                        <div class=" col-md-4 col-sm-6">
                            <div class="job-detail-cont">
                                <div class="job-detail-title fz-16 fw-bold d-flex mb-2">
                                   <span class="small-icon me-2"><img src="{{asset('destination/images/icons/duration.png')}}"></span> Shift Start Time
                                </div>
                                <p class="fz-14">{{$j->shift_start_time}}</p>
                            </div>
                        </div>
                        <div class=" col-md-4 col-sm-6">
                            <div class="job-detail-cont">
                                <div class="job-detail-title fz-16 fw-bold d-flex mb-2">
                                   <span class="small-icon me-2"><img src="{{asset('destination/images/icons/duration.png')}}"></span> Shift End Time
                                </div>
                                <p class="fz-14">{{$j->shift_end_time}}</p>
                            </div>
                        </div>

                        <div class=" col-md-4 col-sm-6">
                            <div class="job-detail-cont">
                                <div class="job-detail-title fz-16 fw-bold d-flex mb-2">
                                   <span class="small-icon me-2"><img src="{{asset('destination/images/icons/money.png')}}"></span> Total Amount Spent
                                </div>
                                <p class="fz-14">$300</p>
                            </div>
                        </div>
                       
                    </div>

                    <div class="row mt-5">
                        @if($j->close_job==0)
                        <div class="col-md-6">
                            <div class="dispute-box">
                                <h6 class="mb-1 fw-bold">Close Job</h6>
                                <!-- <small>25 June 2022 - 25 July 2022</small>
                                <h5 class="mt-3 mb-4">
                                    <b>2569</b><span> USD</span>
                                </h5>  -->
                                <div class="btn-group">
                                    
                                    <button type="button" class="edit-btn btn popup-btn close_job" data-action="{{route('destination.job.close.status',$j->_id)}}">Close Job</button>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="col-md-6">
                        <!-- <div class="dispute-box">
                        <h6 class="mb-2 fw-bold">Rate Pioneer</h6>
                        <div class="dispute-rating">
                            <div class="rating">
                            <input type="radio" id="star5" name="rating" value="5" />
                            <label class="star" for="star5" title="Awesome" aria-hidden="true"></label>
                            <input type="radio" id="star4" name="rating" value="4" />
                            <label class="star" for="star4" title="Great" aria-hidden="true"></label>
                            <input type="radio" id="star3" name="rating" value="3" />
                            <label class="star" for="star3" title="Very good" aria-hidden="true"></label>
                            <input type="radio" id="star2" name="rating" value="2" />
                            <label class="star" for="star2" title="Good" aria-hidden="true"></label>
                            <input type="radio" id="star1" name="rating" value="1" />
                            <label class="star" for="star1" title="Bad" aria-hidden="true"></label>
                            </div>
                        </div>

                        <textarea
                            placeholder="Comment here"
                            class="form-control mt-4 br-10"
                            rows="4"
                        ></textarea>
                        <div class="btn-group mt-4">
                            <a href="javascript:void(0)" class="edit-btn btn popup-btn"
                            >Submit Rating</a
                            >
                        </div>
                        </div> -->

                            <!-- <div class="dispute-box">
                                <h6 class="mb-2 fw-bold">Rate Pioneer</h6> -->
                                <!-- <div class="dispute-rating">
                                    <div class="dispute-star mt-2">
                                        <img src="{{asset('destination/images/icons/star-fill.png')}}" class="small-icon" alt="star">
                                        <img src="{{asset('destination/images/icons/star-fill.png')}}" class="small-icon" alt="star">
                                        <img src="{{asset('destination/images/icons/star-fill.png')}}" class="small-icon" alt="star">
                                        <img src="{{asset('destination/images/icons/star-fill.png')}}" class="small-icon" alt="star">
                                        <img src="{{asset('destination/images/icons/star-border.png')}}" class="small-icon" alt="star">
                                    </div>
                                </div> -->
                                <!-- <div class="dispute-rating">
                                    <div class="rating">
                                    <input type="radio" id="star5" name="rating" value="5">
                                    <label class="star" for="star5" title="Awesome" aria-hidden="true"></label>
                                    <input type="radio" id="star4" name="rating" value="4">
                                    <label class="star" for="star4" title="Great" aria-hidden="true"></label>
                                    <input type="radio" id="star3" name="rating" value="3">
                                    <label class="star" for="star3" title="Very good" aria-hidden="true"></label>
                                    <input type="radio" id="star2" name="rating" value="2">
                                    <label class="star" for="star2" title="Good" aria-hidden="true"></label>
                                    <input type="radio" id="star1" name="rating" value="1">
                                    <label class="star" for="star1" title="Bad" aria-hidden="true"></label>
                                    </div>
                                </div>
                               
                                <textarea placeholder="Comment here" class="form-control  mt-4 br-10" rows="4"></textarea>
                                <div class="btn-group mt-4">
                                    <a href="javascript:void(0)" class="edit-btn btn popup-btn">Submit Rating</a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>


                <div class="raise-alert icon-text  shadow br-10 d-flex align-items-center mt-4 border-radius">
                  
                    <p class="mb-0 fw-600">In case of you are not satisfied with your employer or working with him. You can raise dispute and we will sort out the matter for you.
                    <a href="javascript:void('0')"  data-bs-toggle="modal" data-bs-target="#dispute" class="text-underline text-primary">Raise Dispute?</a></p>
                </div>
            </div>
        </section>

        <!-- Raise dispute -->
            <div class="modal fade" id="dispute" tabindex="-1" aria-labelledby="disputeLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="disputeLabel">Raise Dispute</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                    </div>
                    <div class="modal-body">         
                    <textarea class="form-control textarea" placeholder="# 1590 , Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum 1500s." rows="4"></textarea>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn edit-btn">Message</button>
                    </div>
                </div>
                </div>
            </div>
            <!-- End Raise dispute -->


    <!-- job-history-detail-section -->
@stop

@section('scripts')
<script type="text/javascript">
    $("body").on('click', '.close_job', function(){  
        var $this = $( this );
        $.ajax({
               url : $this.attr('data-action'),
               type: 'POST', 
               
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': "{{ csrf_token() }}"
               },
                beforeSend: function() {             
                     $this.attr('disabled', true); 
                     $("body").find('.load_screen').show();
                      
                },
                success: function (result) {
                       $this.attr('disabled', false);
                       $("body").find('.load_screen').hide();
                       if(parseInt(result.status) == 1){                        
                        toastr.success(result.message);
                        setTimeout(function () {
                            window.location = result.url;
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
</script>
@endsection