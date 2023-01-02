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
                        <div class="col-lg-9">
                            <div class="mb-5 pe-5">
                                <h5 class="mb-2 fw-bold">{{$j->title}}</h5>
                                <p class="fz-18 mb-5 more_less">
                                    
                                    {!! $j->description !!}
                                </p>

                                <h6 class="mb-2 fw-bold">Purposal Submitted by the Applicant </h6>
                                <p class="fz-18 more_less">
                                    {{$j->hire_user_applicant->proposal}}
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="profile-picture-img w-100 shadow  br-10 ">
                                <img src="{{url($j->hire_user->logo)}}" class=" br-10" alt="destination-img">
                                <figure class="shadow applicant-icon">
                                <img src="{{asset('destination/images/icons/company.png')}}" alt="icon">
                            </figure>
                            </div>
                            <div class="applicant-name h6 fw-bold my-3">
                                {{$j->hire_user->first_name}}
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
                                <p>4.5</p>
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
                        
                        <div class=" col-md-4 col-sm-6">
                            <div class="job-detail-cont">
                                <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                                    Total Amount Spent
                                </div>
                                <p>$300</p>
                            </div>
                        </div>
                       
                    </div>


                </div>

            </div>
        </section>

    <!-- job-history-detail-section -->
@stop
