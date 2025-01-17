@extends('pioneer.layouts.layout')



@section('content')
<!-- job-history-section -->

    <section class="job-history-section p-60">
        <div class="container container-1440">
            <div class="heading-wrapper text-uppercase mb-md-0 mb-5">
                <h4 class="heading after-line grey-line">Ongoing Job Overview</h4>
            </div>

            <div class="job-history-card job-detail-card shadow br-10 p-md-5 p-4 border-radius">
                <div class="row flex-lg-row flex-column-reverse">
                    <div class="col-xl-9 col-lg-8">
                        <div class="mb-5 pe-5">
                            <h5 class="mb-2 fw-bold">{{$job->title}}</h5>
                            <ul class="job-deatils-icons">
                                <li>
                                    <div class="icon-img">
                                        <img src="{{asset('pioneer/images/icons/hurly-rate.png')}}">
                                    </div>
                                    <p class="mb-0 fw-600">Hourly Rate - {{$job->hour_rate}} {{currency()}}/hr</p>
                                </li>
                                <li>
                                    <div class="icon-img">
                                        <img src="{{asset('pioneer/images/icons/job-type.png')}}">
                                    </div>
                                    <p class="mb-0 fw-600">Job Type - {{$job->job_type}}</p>
                                </li>

                                <li>
                                    <div class="icon-img">
                                        <img src="{{asset('pioneer/images/icons/duration.png')}}">
                                    </div>
                                    <p class="mb-0 fw-600">Duration - {{$job->duration}}</p>
                                </li>


                                <li>
                                    <div class="icon-img">
                                        <img src="{{asset('pioneer/images/icons/post-icon.png')}}">
                                    </div>
                                    <p class="mb-0 fw-600">Posted - {{$job->created_at->diffForHumans()}}</p>
                                </li>

                            </ul>
                            <p class="fz-18 mb-5">{!! $job->description !!}</p>

                            <h6 class="mb-2 fw-bold">Your Purposal</h6>
                            <p class="fz-18">{{$job->pioneer_applicant_user->proposal}}</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-4">
                        <div class="profile-picture-img shadow  br-10 mb-4 ">
                            <img src="{{$job->created_user->logo!=null ? asset($job->created_user->logo) : images/Resgister-step/company.png}}" class=" br-10" alt="destination-img">
                            <figure class="shadow applicant-icon">
                                <img src="{{asset('pioneer/images/icons/company.png')}}" alt="icon">
                            </figure>
                        </div>
                        <div class="applicant-name h6 fw-bold text-sm-center my-3">
                            {{$job->created_user->first_name}}
                        </div>
                        <div class="job-card-btn text-sm-center">
                            <a href="{{route('pioneer.chat')}}" class="edit-btn btn popup-btn">Message</a>
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
                               Contact
                                Person Name
                            </div>
                            <p>{{$job->person_name}}</p>
                        </div>
                    </div>


                    <div class=" col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                            <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                Total Amount Spent
                            </div>
                            <p>${{$job->total_amount_spent()}}</p>
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
                            
                    
                </div>
               
            </div>


                 </div>
    </section>

  
@endsection