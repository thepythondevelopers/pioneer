@if($job->count() > 0)
@foreach($job as $key=>$j)
      <li class="list-icon-card newJob_card">
                <div class="newjob_heading">
                    <div class="company-name"> {{$j->title}}</div>
                    <h6 class="job-name fw-bold"> {{$j->job_type}}</h6>

                    <div class="newjob_detail mt-3">
                         <div class="fz-16 fw-bold rate">{{$j->hour_rate}} USD/hr</div>  
                         <div class="fz-16">{{$j->location}}</div>
                         
                         <div class="postdate">
                            <div class="icon-img">
                                <img src="images/icons/post-icon.png">
                            </div>
                            <p class="mb-0 fw-600">Posted - {{$j->created_at->diffForHumans()}}</p>
                         </div>
                    </div>
                    <div class="job-card-btn pioneer-card-btn mt-3">
                        @if(Auth::user()->admin_verification==1)
                            @if($j->pioneer_applicant_user!=null )
                            <a href="{{route('pioneer.proposal',$j->_id)}}" class="edit-btn btn popup-btn br-0">Applied</a>
                            @else
                                <a href="{{route('pioneer.apply.job',$j->_id)}}" class="edit-btn btn popup-btn br-0">Apply Job</a>
                            @endif
                            </div>
                            @else
                            <a href="javascript:void(0)" class="edit-btn btn popup-btn br-0" data-bs-toggle="modal" data-bs-target="#not_verified">Apply Job</a>
                            
                            @endif
                </div>
                        <!-- <div class="job-card border-radius shadow br-10">
                            <div class="row">
                                <div class="col-mf-9">
                                    <div class="job-card-inner">
                                        <div class="profile-picture-img shadow pioneer-card-img  br-10 ">
                                            <img src="{{asset($j->created_user->logo)}}" class=" br-10"
                                                alt="destination-img">
                                            <figure class="shadow applicant-icon">
                                                <img src="images/icons/company.png" alt="icon">
                                            </figure>
                                        </div>
                                        <div class="job-card-cont job-applicant pioneer-card-cont">
                                            <div class="job-title h5 mt-3">
                                                {{$j->title}}
                                            </div>
                                            <div class="job-icon-list-wrap">
                                                <ul class="job-deatils-icons">
                                                    <li>
                                                        <div class="icon-img">
                                                            <img src="images/icons/hurly-rate.png">
                                                        </div>
                                                        <p class="mb-0 fw-600">Hourly Rate - {{$j->hour_rate}} USD/hr</p>
                                                    </li>
                                                    <li>
                                                        <div class="icon-img">
                                                            <img src="images/icons/job-type.png">
                                                        </div>
                                                        <p class="mb-0 fw-600">Job Type - {{$j->job_type}}</p>
                                                    </li>
                                                    <li>
                                                        <div class="icon-img">
                                                            <img src="images/icons/city.png">
                                                        </div>
                                                        <p class="mb-0 fw-600">City - {{$j->location}}</p>
                                                    </li>


                                                    <li>
                                                        <div class="icon-img">
                                                            <img src="images/icons/calender2.png">
                                                        </div>
                                                        <p class="mb-0 fw-600">Start Date - {{date('M d, Y',strtotime($j->start_date))}}</p>
                                                    </li>
                                                    <li>
                                                        <div class="icon-img">
                                                            <img src="images/icons/post-icon.png">
                                                        </div>
                                                        <p class="mb-0 fw-600">Posted - {{$j->created_at->diffForHumans()}}</p>
                                                    </li>
                                                    <li>
                                                        <p class="mb-0 fw-600 pe-2">Rating </p>
                                                        <div class="icon-img">
                                                            <img src="images/icons/star-rating.png">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="icon-img">
                                                            <img src="images/icons/duration.png">
                                                        </div>
                                                        <p class="mb-0 fw-600">Duration - {{$j->duration}}</p>
                                                    </li>
                                                </ul>
                                            </div>

                                            <p class="mt-3">{{ $j->description}} </p>
                                        </div>
                                        <div class="job-card-btn pioneer-card-btn">
                                        @if($j->pioneer_applicant_user!=null )
                                        <a href="{{route('pioneer.proposal',$j->_id)}}" class="edit-btn btn popup-btn">Applied</a>
                                        @else
                                         <a href="{{route('pioneer.apply.job',$j->_id)}}" class="edit-btn btn popup-btn">Apply Job</a>
                                        @endif
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </li>
                   @endforeach
              
                    <div class="pagination-wrap text-center mt-3 cstm-center"> 
                        {{$job->links()}}
                    </div> 
  @else
  <div class="empty-text">
     <label>No Job Found, Please try searching with other Values</label>
  </div>
  @endif              