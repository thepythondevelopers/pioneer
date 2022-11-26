@extends('destination.layouts.layout')



@section('content')

    

    <!-- job-history-section -->

        <section class="job-history-section p-60">
            <div class="container container-1440">
                <div class="heading-wrapper text-uppercase mb-md-0 mb-5">
                    <h4 class="heading after-line grey-line">Job Overview</h4>
                </div>

                <div class="job-history-card job-detail-card shadow br-10 p-md-5 p-4 border-radius">
                    <div class="row">
                        <div class=" col-lg-9">
                            <div class="mb-5 pe-sm-5 ">
                                <h5 class="mb-2 fw-bold">{{$j->title}}</h5>
                                <p class="fz-18 mb-5 more_less">
                                    {{$j->description}}
                                </p>

                                <h6 class="mb-2 fw-bold">Purposal Submitted by the Applicant </h6>
                                <p class="fz-18 more_less">
                                    {{$j->hire_user_applicant->proposal}}
                                </p>
                            </div>
                        </div>
                        <div class=" col-lg-3 mb-4">
                            <div class="profile-picture-img shadow  br-10 ">
                                <img src="{{url($j->hire_user->logo)}}" class=" br-10" alt="destination-img">
                                <figure class="shadow applicant-icon">
                                <img src="{{asset('destination/images/icons/company.png')}}" alt="icon">
                            </figure>
                            </div>
                            <div class="applicant-name h6 fw-bold  my-3">
                                {{$j->hire_user->first_name}}
                            </div>
                            <div class="job-card-btn text-center">
                                <a href="{{route('destination.chat.param',[$j->_id,$j->hire_person])}}" class="edit-btn btn popup-btn">Message</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-md-4 col-sm-6">
                            <div class="job-detail-cont">
                                <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                   <!-- <span class="small-icon me-2"><img src="{{asset('destination/images/icons/city.png')}}"></span> -->
                                    City
                                </div>
                                <p>{{$j->location}}</p>
                            </div>
                        </div>
                        <div class=" col-md-4 col-sm-6">
                            <div class="job-detail-cont">
                                <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                   <!-- <span class="small-icon me-2"><img src="{{asset('destination/images/icons/notebook.png')}}"></span>  -->
                                   Contact Person Name
                                </div>
                                <p>{{$j->person_name}}</p>
                            </div>
                        </div>
                        <div class=" col-md-4 col-sm-6">
                            <div class="job-detail-cont">
                                <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                   <!-- <span class="small-icon me-2"><img src="{{asset('destination/images/icons/phone-bw.png')}}"></span> -->
                                    Contact Person Phone Number
                                </div>
                                <p>{{$j->contact_number}}</p>
                            </div>
                        </div>
                        <div class=" col-md-4 col-sm-6">
                            <div class="job-detail-cont">
                                <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                   <!-- <span class="small-icon me-2"><img src="{{asset('destination/images/icons/mail-bw.png')}}"></span>  -->
                                   Contact Person Email Id
                                </div>
                                <p>{{$j->contact_email}}</p>
                            </div>
                        </div>
                        <div class=" col-md-4 col-sm-6">
                            <div class="job-detail-cont">
                                <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                   <!-- <span class="small-icon me-2"><img src="{{asset('destination/images/icons/calender2.png')}}"></span> -->
                                    Start Date
                                </div>
                                <p>{{date('M d, Y',strtotime($j->start_date))}}</p>
                            </div>
                        </div>
                        <div class=" col-md-4 col-sm-6">
                            <div class="job-detail-cont">
                                <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                   <!-- <span class="small-icon me-2"><img src="{{asset('destination/images/icons/calender2.png')}}"></span>  -->
                                   End Date
                                </div>
                                <p>{{date('M d, Y',strtotime($j->end_date))}}</p>
                            </div>
                        </div>
                        <div class=" col-md-4 col-sm-6">
                            <div class="job-detail-cont">
                                <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                   <!-- <span class="small-icon me-2"><img src="{{asset('destination/images/icons/rating.png')}}"></span> -->
                                    Rating
                                </div>
                                <p>{!! show_rating($j->created_user->rating_count()) !!}</p>
                            </div>
                        </div>
                        <div class=" col-md-4 col-sm-6">
                            <div class="job-detail-cont">
                                <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                   <!-- <span class="small-icon me-2"><img src="{{asset('destination/images/icons/city.png')}}"></span>  -->
                                   Exact Location Address
                                </div>
                                <p>{{$j->address}}</p>
                            </div>
                        </div>
                        <div class=" col-md-4 col-sm-6">
                            <div class="job-detail-cont">
                                <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                   <!-- <span class="small-icon me-2"><img src="{{asset('destination/images/icons/duration.png')}}"></span>  -->
                                   Shift Start Time
                                </div>
                                <p>{{$j->shift_start_time}}</p>
                            </div>
                        </div>
                        <div class=" col-md-4 col-sm-6">
                            <div class="job-detail-cont">
                                <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                   <!-- <span class="small-icon me-2"><img src="{{asset('destination/images/icons/duration.png')}}"></span>  -->
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
                                   <!-- <span class="small-icon me-2"><img src="{{asset('destination/images/icons/money.png')}}"></span>  -->
                                   Total Amount Spent
                                </div>
                                <p>${{$j->total_amount_spent()}}</p>
                            </div>
                        </div>
                       
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-6">
                        <h6>Destination</h6>
                            
                            <div class="dispute-box ">
                                <div class="dispute-img shadow br-10">
                                    <img src="{{asset($j->created_user->logo)}}" class="br-10" alt="company">
                                </div>
                                <br>
                                @if($rating_destination!=null)
                                                                <div class="dispute-rating">
                                    @php $rate_d = $rating_destination!=null ? $rating_destination->rating : '' @endphp
                                    <div class="rating mt-3">
                                        {!! show_rating($rate_d) !!}
                                   </div>                                   
                                </div>
                                <p class="fz-18 mt-3 mb-5">
                                    {{$rating_destination!=null ? $rating_destination->comment : ''}}
                                </p>
                                @else
                                <p>Rating is not submitted yet.</p>
                                @endif

                                <!-- <h6 class="mb-2 fw-bold">Dispute (Me)</h6>
                                <p class="fz-18 mt-3 mb-4">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged <a href="#" class="more-link">more...</a>
                                </p> -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6>Pioneer</h6>
                            @if($rating_pioneer!=null)
                                                        <div class="dispute-box">
                                <div class="dispute-img shadow br-10">
                                    <img src="{{url($j->hire_user->logo)}}" class="br-10" alt="company">
                                </div>
                                <div class="dispute-rating">
                                    @php $rate = $rating_pioneer!=null ? $rating_pioneer->rating : '' @endphp
                                    <div class="rating mt-3" style="font-size:18px">
                                
                                    {!! show_rating($rate) !!}
                            </div>

                                    
                                </div>
                                <p class="fz-18 mt-3 mb-5"> 
                                    {{$rating_pioneer!=null ? $rating_pioneer->comment : ''}}
                                </p>
                            @else
                        <form id="rating" action="{{route('destination.rating.pioneer.job',$j->_id)}}" method="POST">
                            @csrf
                            <div class="dispute-box" >
                        <h6 class="mb-2 fw-bold">Rate Pioneer</h6>
                        <div class="dispute-rating">
                            
                            {!! rating_star_html()!!}
                        </div>

                        <textarea placeholder="Comment here" class="form-control mt-4 br-10" rows="4" name="comment"></textarea>
                        <div class="btn-group mt-4">
                            <!-- <a href="javascript:void(0)" class="edit-btn btn popup-btn"
                            >Submit Rating</a> -->
                            <button type="submit" class="edit-btn btn popup-btn">Submit Rating</button>
                        </div>
                        </div>
                    </form>
                    @endif
                    @if($dispute_pioneer!=null)
                          <h6 class="mb-2 fw-bold">Dispute (Pioneer)</h6>
                                <p class="fz-18 mt-3 mb-4">
                                    {{$dispute_pioneer->dispute}}
                                </p>
                    @endif

                          
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    <!-- job-history-detail-section -->
@stop

@section('scripts')
<script type="text/javascript">
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
</script>
@endsection