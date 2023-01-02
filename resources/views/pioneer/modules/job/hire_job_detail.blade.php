@extends('pioneer.layouts.layout')



@section('content')
<!-- job-history-section -->
<section class="inner-banner bg">
        <div class="container container-1440 innercontent_wrp">
            <h2>Ongoing Job Overview</h2>
        </div>
    </section>
    <section class="job-history-section p-60">
        <div class="container container-1440">
            <div class="job-history-card job-detail-card shadow br-10 p-md-5 p-4 border-radius">
                <div class="row flex-lg-row flex-column-reverse">
                <div class="col-xl-3 col-sm-4 mb-4">
                        <div class="profile-picture-img shadow  br-10 ">
                            <img src="{{$job->created_user->logo!=null ? asset($job->created_user->logo) : images/Resgister-step/company.png}}" class=" br-10" alt="destination-img">
                            <figure class="shadow applicant-icon">
                                <img src="{{asset('pioneer/images/icons/company.png')}}" alt="icon">
                            </figure>
                        </div>
                        <div class="applicant-name h6 fw-bold  my-3">
                            {{$job->created_user->first_name}}
                        </div>
                        <div class="job-card-btn text-sm-center">
                            <a href="{{route('pioneer.chat')}}" class="edit-btn btn popup-btn">Message</a>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="mb-5">
                            <h5 class="mb-2 fw-bold">{{$job->title}}</h5>
                            <!-- <ul class="job-deatils-icons" style="font-size:15px">
                                <li>
                                
                                    <p class="mb-0 fw-600">Hourly Rate - {{$job->hour_rate}} USD/hr</p>
                                </li>
                                <li>
         
                                    <p class="mb-0 fw-600">Job Type - {{$job->job_type}}</p>
                                </li>

                                <li>
                      
                                    <p class="mb-0 fw-600">Duration - {{$job->duration}}</p>
                                </li>


                                <li>
                      
                                    <p class="mb-0 fw-600">Posted - {{$job->created_at->diffForHumans()}}</p>
                                </li>

                            </ul> -->
                            <p class="fz-18 mb-5">{!! $job->description !!}</p>

                            
                        </div>
                    </div>
                    <div class="col-12">
                    <div class="mb-5">
                            <h6 class="mb-2 fw-bold">Your Proposal</h6>
                            <p class="fz-18">{{$job->pioneer_applicant_user->proposal}}</p>
                    </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class=" col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                            <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                <!-- <span class="small-icon me-2"><img src="{{asset('pioneer/images/icons/city.png')}}"></span>  -->
                                City
                            </div>
                            <p>{{$job->location}}</p>
                        </div>
                    </div>
                    <div class=" col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                            <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                <!-- <span class="small-icon me-2"><img src="{{asset('pioneer/images/icons/notebook.png')}}"></span> -->
                                Contact
                                Person Name
                            </div>
                            <p>{{$job->person_name}}</p>
                        </div>
                    </div>


                    <div class=" col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                            <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                <!-- <span class="small-icon me-2"><img src="{{asset('pioneer/images/icons/money.png')}}"></span>  -->
                                Total Amount
                                Spent
                            </div>
                            <p>${{$job->total_amount_spent()}}</p>
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
                            <p>{!! show_rating($job->created_user->rating_count()) !!} </p>
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
                                <!-- <span class="small-icon me-2"><img src="{{asset('pioneer/images/icons/duration.png')}}"></span> -->
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
                    <div class="col-md-3">
                    <div class="btn-group mb-lg-0 mb-4">
                                <a href="{{route('pioneer.invoice.create',$job->_id)}}" class="edit-btn btn popup-btn">Create Invoice</a>
                            </div>
                    </div>        
                    
                </div>

            </div>



        </div>
    </section>


@endsection