@if($job->count() > 0)
@foreach($job as $key=>$j)
<!-- <li class="list-icon-card icon-card-hover">
                    <div class="job-card border-radius shadow br-10">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="job-card-inner">
                                    <div class="job-card-cont">
                                        <div class="job-title h6 fw-bold">
                                            {{$j->title}}
                                        </div>
                                        <ul class="job-deatils-icons">
                                            <li>
                                                <div class="icon-img">
                                                    <img src="{{asset('admin/images/icons/hurly-rate.png')}}">
                                                </div>
                                                <p class="mb-0 fw-600">Hourly Rate - {{$j->hour_rate}} USD/hr</p> 
                                            </li>
                                            <li>
                                                <div class="icon-img">
                                                    <img src="{{asset('admin/images/icons/job-type.png')}}">
                                                </div>
                                                <p class="mb-0 fw-600">Job Type - {{$j->job_type}}</p> 
                                            </li>
                                            <li>
                                                <div class="icon-img">
                                                    <img src="{{asset('admin/images/icons/city.png')}}">
                                                </div>
                                                <p class="mb-0 fw-600">City - {{$j->location}}</p> 
                                            </li>
                                            <li>
                                                <div class="icon-img">
                                                    <img src="{{asset('admin/images/icons/duration.png')}}">
                                                </div>
                                                <p class="mb-0 fw-600">Duration - {{$j->duration}}</p> 
                                            </li>

                                            <li>
                                                <div class="icon-img">
                                                    <img src="{{asset('admin/images/icons/calender2.png')}}">
                                                </div>
                                                <p class="mb-0 fw-600">Start Date - {{date('M d, Y',strtotime($j->start_date))}}</p> 
                                            </li>
                                            <li>
                                                <div class="icon-img">
                                                    <img src="{{asset('admin/images/icons/post-icon.png')}}">
                                                </div>
                                                <p class="mb-0 fw-600">Posted - {{$j->created_at->diffForHumans()}}</p> 
                                            </li>
                                            <li>
                                                <p class="mb-0 fw-600 pe-2">Rating </p>
                                                <div class="icon-img">
                                                    <img src="{{asset('admin/images/icons/star-rating.png')}}">
                                                </div> 
                                            </li>
                                        </ul>
                                        <p class="mt-3">{{$j->description}}</p>
                                    </div>
                                    <div class="job-card-btn">
                                        
                                        <a href="{{route('admin.destination.closed.job.detail',$j->_id)}}" class="outline-btn btn popup-btn">View Details</a>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </li> -->

                <li class="list-icon-card newJob_card">
                <div class="newjob_heading">
                    <div class="company-name"> {{$j->title}}</div>
                    <h6 class="job-name fw-bold"> {{$j->job_type}}</h6>

                    <div class="newjob_detail mt-3">
                            <div class="fz-16 fw-bold rate"> {{$j->hour_rate}} {{currency()}}/hr</div>  
                            <div class="fz-16">{{$j->location}}</div>
                            
                            <div class="postdate">
                            <div class="icon-img">
                                <img src="http://18.209.69.216/destination/images/icons/post-icon.png">
                            </div>
                            <p class="mb-0 fw-600">Posted - {{$j->created_at->diffForHumans()}}</p>
                            </div>
                    </div>
                    <div class="job-card-btn job-card-btn pioneer-card-btn mt-3">   
                            
                            <a href="{{route('admin.destination.closed.job.detail',$j->_id)}}" class="edit-btn outline-btn btn popup-btn mt-md-0">View Details</a>
                    </div>

                </div>
            </li>
@endforeach
                <div class="pagination-wrap active-job-pagination text-center mt-3 cstm-center"> 
                        {{$job->links()}}
                    </div> 
@else
<label class="no_data">No Data Found.</label>
@endif                    