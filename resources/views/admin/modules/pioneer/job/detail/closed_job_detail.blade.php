@extends('admin.layouts.layout')



@section('content')
<!-- job-history-section -->

    <section class="job-history-section p-60">
        <div class="container container-1440">
            <div class="heading-wrapper text-uppercase mb-md-0 mb-5">
                <h4 class="heading after-line grey-line">Job Overview</h4>
            </div>

            <div class="job-history-card job-detail-card shadow br-10 p-md-5 p-4 border-radius">
                <div class="row flex-lg-row flex-column-reverse">
                    <div class="col-xl-9 col-lg-8">
                        <div class="mb-5 pe-5">
                            <h5 class="mb-2 fw-bold">{{$job->title}}</h5>
                            <p class="fz-18 mb-5">
                                {{$job->description}}
                            </p>

                            <h6 class="mb-2 fw-bold">Purposal Submitted by the Applicant </h6>
                            <p class="fz-18">{{$job->hire_user_applicant->proposal}}</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-4 mb-4">
                        <div class="profile-picture-img shadow  br-10 ">
                            <img src="{{$job->created_user->logo!=null ? asset($job->created_user->logo) : asset('images/Resgister-step/company.png')}}" class=" br-10" alt="destination-img">
                            <figure class="shadow applicant-icon">
                                <img src="{{asset('pioneer/images/icons/company.png')}}" alt="icon">
                            </figure>
                        </div>
                        <div class="applicant-name h6 fw-bold  my-3 ">
                            {{$job->created_user->first_name}}
                        </div>
                        
                    </div>
                </div>
                <div class="row">
                    <div class=" col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                            <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                City
                            </div>
                            <p>{{$job->location}}</p>
                        </div>
                    </div>
                    <div class=" col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                            <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                              Contact Person Name
                            </div>
                            <p>{{$job->person_name}}</p>
                        </div>
                    </div>


                    <div class=" col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                            <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                Start Date
                            </div>
                            <p>{{date('M d, Y',strtotime($job->start_date))}}</p>
                        </div>
                    </div>
                    <div class=" col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                            <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                End Date
                            </div>
                            <p>{{date('M d, Y',strtotime($job->end_date))}}</p>
                        </div>
                    </div>
                    <div class=" col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                            <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                 Rating
                            </div>
                            <p>{!! show_rating($job->created_user->rating_count()) !!}</p>
                        </div>
                    </div>
                    <div class=" col-md-4 col-sm-6">

                        <div class="job-detail-cont">
                            <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                 Exact Location
                                Address
                            </div>
                            <p>{{$job->address}}</p>
                        </div>
                    </div>
                    <div class=" col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                            <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                               Shift Start
                                Time
                            </div>
                            <p>{{$job->shift_start_time}}</p>
                        </div>
                    </div>
                    <div class=" col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                            <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
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
                                <div class="dispute-img profile-picture-img shadow br-10 mb-3">
                                    <img src="{{asset($job->created_user->logo)}}" class="br-10" alt="company">
                                </div>
                                <br>
                                @if($rating_destination!=null)
                                <div class="dispute-rating">
                                    @php $rate = $rating_destination!=null ? $rating_destination->rating : '' @endphp
                                    <div class="rating mt-3">
                                        {!! show_rating($rate) !!}
                                    </div>
                                    
                                </div>
                                <p class="fz-18 mt-3 mb-5">
                                    {{$rating_destination->comment}}
                                </p>
                                @else
                                <label>Rating Has not been given yet.</label>
                                @endif

                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6>Pioneer</h6>
                            <div class="dispute-box">
                                <div class="dispute-img profile-picture-img shadow br-10 mb-3">
                                    <img src="{{asset($job->hire_user->logo)}}" class="br-10" alt="company">
                                </div>
                                <br>
                                @if($rating_pioneer!=null)
                                <div class="dispute-rating">

                                    @php $rate_p = $rating_pioneer!=null ? $rating_pioneer->rating : '' @endphp
                                    <div class="rating mt-3">
                                        {!! show_rating($rate_p) !!}
                                    </div>

                                    
                                </div>
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
            

        </div>
    </section>

    <!-- job-history-detail-section -->


@endsection

