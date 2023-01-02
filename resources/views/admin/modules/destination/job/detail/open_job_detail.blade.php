@extends('admin.layouts.layout')



@section('content')
    <!-- Start Job Details Section -->
    <div class="job-detail p-60">
        <div class="container container-1440">
        <div class="container container-1440 innercontent_wrp">
        <div class="heading-wrapper pb-4">
            <h4 class="heading after-line grey-line mb-2">Job detail</h4>
        </div>
        </div>        
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
                            <p class="fz-14">{{$job->hour_rate}} {{currency()}}/Hr</p>
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
                            <p class="fz-14">{!! $job->description !!}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="heading-wrapper pt-5">
                <h4 class="heading after-line grey-line">Applicant List</h4>
            </div>
            <div class="job-applicant-list">
                <ul class="job-card-list list-unstyled p-0 mt-4" id="job-applicant">
                    @if($applicant->count() > 0)
                    @foreach($applicant as $key=>$a)
<li class="list-icon-card">
                        <div class="job-card border-radius shadow br-10">
                            <div class="row">
                                <div class="col-mf-9">
                                    <div class="job-card-inner">
                                        <div class="profile-picture-img shadow  br-10 ">
                                            <img src="{{asset($a->applicant->logo)}}" class=" br-10" alt="destination-img">
                                            <figure class="shadow applicant-icon">
                                            <img src="{{asset('destination/images/icons/company.png')}}" alt="icon">
                                        </figure>
                                        </div>
                                        <div class="job-card-cont job-applicant">
                                        <div class="job-title h5 mt-3">
                                                {{$a->applicant->title}}
                                            </div>
                                            
                                            <div class="job-icon-list-wrap">
                                                <ul class="job-deatils-icons applicant-icon-list">
                                                    <li>
                                                        <div class="icon-img">
                                                            <img src="{{asset('destination/images/icons/user.png')}}">
                                                        </div>
                                                        <p class="mb-0 fw-600">{{$a->applicant->first_name}}</p> 
                                                    </li>
                                                    <li>
                                                        <div class="icon-img">
                                                            <img src="{{asset('destination/images/icons/job-type.png')}}">
                                                        </div>
                                                        <p class="mb-0 fw-600">Previous Job - {{$a->applicant->pioneer_previous_jobs()}}</p> 
                                                    </li>
                                                    <li>
                                                        <div class="icon-img">
                                                            <img src="{{asset('destination/images/icons/duration.png')}}">
                                                        </div>
                                                        <p class="mb-0 fw-600">Applied - {{$a->created_at->diffForHumans()}}</p> 
                                                    </li>
                                                    <li>
                                                        <p class="mb-0 fw-600">Rating - </p>
                                                        <div class="icon-img">
                                                            {!! show_rating($a->applicant->rating_count()) !!}
                                                        </div> 
                                                    </li>
                                                </ul>
                                         
                                            </div>
                                           
                                            <p class="mt-3">{{$a->proposal}}</p>
                                        </div>
                                        
                                    </div>                                
                                </div>
                            </div>
                        </div>
                    </li>
@endforeach
@else
<li>No Data Found.</li>
@endif
          
                </ul>
            </div>
            
        </div>
    </div>
    <!-- End Job Detail Section -->
@stop

