@extends('pioneer.layouts.layout')



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
                <div class="row flex-lg-row flex-column-reverse">
                <div class="col-xl-3 col-sm-4">
                        <div class="profile-picture-img shadow  br-10 ">
                            <img src="{{$job->created_user->logo!=null ? asset($job->created_user->logo) : asset('images/Resgister-step/company.png')}}" class=" br-10" alt="destination-img">
                            <figure class="shadow applicant-icon">
                                <img src="{{asset('pioneer/images/icons/company.png')}}" alt="icon">
                            </figure>
                        </div>
                        <div class="applicant-name h6 fw-bold text-sm-center my-3">
                            {{$job->created_user->first_name}}
                        </div>
                        
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="mb-5">
                            <h5 class="mb-2 fw-bold">{{$job->title}}</h5>
                            <p class="fz-18 mb-5">
                                {!! $job->description !!}
                                
                            </p>

                            
                        </div>
                    </div>
                    <div class="col-12">
                            <h6 class="mb-2 fw-bold">Purposal Submitted by the Applicant </h6>
                            <p class="fz-18">{{$job->pioneer_applicant_user->proposal}}</p>
                    </div>
                   
                </div>
                <div class="row">
                    <div class=" col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                            <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                <!-- <span class="small-icon me-2"><img src="{{asset('pioneer/images/icons/city.png')}}"></span> -->
                                 City
                            </div>
                            <p>{{$job->location}}</p>
                        </div>
                    </div>
                    <div class=" col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                            <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                <!-- <span class="small-icon me-2"><img src="{{asset('pioneer/images/icons/notebook.png')}}"></span>  -->
                                Contact
                                Person Name
                            </div>
                            <p>{{$job->person_name}}</p>
                        </div>
                    </div>


                    <div class=" col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                            <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                <!-- <span class="small-icon me-2"><img src="{{asset('pioneer/images/icons/calender2.png')}}"></span>  -->
                                Start Date
                            </div>
                            <p>{{date('M d, Y',strtotime($job->start_date))}}</p>
                        </div>
                    </div>
                    <div class=" col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                            <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                <!-- <span class="small-icon me-2"><img src="{{asset('pioneer/images/icons/calender2.png')}}"></span>  -->
                                End Date
                            </div>
                            <p>{{date('M d, Y',strtotime($job->end_date))}}</p>
                        </div>
                    </div>
                    <div class=" col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                            <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                <!-- <span class="small-icon me-2"><img src="{{asset('pioneer/images/icons/rating.png')}}"></span>  -->
                                Rating
                            </div>
                            <p>{!! show_rating($job->created_user->rating_count()) !!}</p>
                        </div>
                    </div>
                    <div class=" col-md-4 col-sm-6">

                        <div class="job-detail-cont">
                            <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                <!-- <span class="small-icon me-2"><img src="{{asset('pioneer/images/icons/city.png')}}"></span>  -->
                                Exact Location
                                Address
                            </div>
                            <p>{{$job->address}}</p>
                        </div>
                    </div>
                    <div class=" col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                            <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                <!-- <span class="small-icon me-2"><img src="{{asset('pioneer/images/icons/duration.png')}}"></span>  -->
                                Shift Start
                                Time
                            </div>
                            <p>{{$job->shift_start_time}}</p>
                        </div>
                    </div>
                    <div class=" col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                            <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                <!-- <span class="small-icon me-2"><img src="{{asset('pioneer/images/icons/duration.png')}}"></span>  -->
                                Shift End
                                Time
                            </div>
                            <p>{{$job->shift_end_time}}</p>
                        </div>
                    </div>



                </div>

                <div class="row mt-5">
                        <div class="col-md-6">
                            <h6>Destination</h6>
                             <div class="dispute-box">
                                <div class="dispute-img shadow br-10  mb-4">
                                    <img src="{{asset($job->created_user->logo)}}" class="br-10" alt="company">
                                </div>
                                @if($rating_destination!=null)
                                <div class="dispute-rating d-flex">
                                    @php $rate = $rating_destination!=null ? $rating_destination->rating : '' @endphp
                                    <div class="rating mt-3">
                                        {!! show_rating($rate) !!}
                                    </div>
                                    
                                </div>
                                <p class=" fz-18 mt-3 mb-5">
                                    {{$rating_destination->comment}}
                                </p>
                                @else
                                <form id="rating" action="{{route('pioneer.rating.destination.job',$job->_id)}}" method="POST">
                            @csrf
                            <div class="dispute-box">
                        <h6 class="mb-2 fw-bold">Rate Destination</h6>
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


                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6>Pioneer</h6>
                            <div class="dispute-box">
                                <div class="dispute-img shadow br-10">
                                    <img src="{{url(Auth::user()->logo)}}" class="br-10" alt="company">
                                </div>
                                @if($rating_pioneer!=null)
                                <div class="dispute-rating">

                                    @php $rate_p = $rating_pioneer!=null ? $rating_pioneer->rating : '' @endphp
                                    <div class="rating mt-3">
                                        {!! show_rating($rate_p) !!}
                                    </div>

                                    
                                </div>
                                <br>
                                <p class="fz-18 mt-3 mb-5">
                                    {{$rating_pioneer->comment}}
                                </p>
                                @else
                        
                         <label>Rating Has not been given yet.</label>
                                
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
            @if($dispute_pioneer==null)
            <div
                class="icon-text raise-diaputea-alert shadow br-10 d-flex align-items-center mt-5 p-md-4 p-3 border-radius">
                <div class="icon-img">
                    <img src="{{asset('pioneer/images/icons/alert-bw.png')}}">
                </div>
                <p class="mb-0 fw-600">In case of you are not satisfied with your employer or working with him. You can
                    raise dispute and we will sort out the matter for you. <a href="javascript:void('0')" data-bs-toggle="modal" data-bs-target="#dispute"
                    class="text-underline ms-xl-auto text-primary">Raise Dispute?</a></p>
                <!-- <a href="javascript:void('0')" data-bs-toggle="modal" data-bs-target="#dispute"
                    class="text-underline ms-xl-auto text-primary">Raise Dispute?</a> -->
            
            </div>
            @endif

        </div>
    </section>

    <!-- job-history-detail-section -->

        <!-- Raise dispute -->
    <div class="modal fade" id="dispute" tabindex="-1" aria-labelledby="disputeLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="dispute" action="{{route('pioneer.dispute.job',$job->_id)}}" method="POST">
                @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="disputeLabel">Raise Dispute</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <textarea class="form-control textarea" name="dispute"
                        placeholder="Dispute"
                        rows="8"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn edit-btn">Message</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Raise dispute -->
@endsection

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

   jQuery("form[id='dispute']").validate({
           
    rules: {
        'dispute':{
            required: true,
            nowhitespace: true  
        }
    }
   });        
</script>
@endsection