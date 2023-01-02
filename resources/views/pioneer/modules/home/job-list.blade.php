@if($job->count() > 0)
@foreach($job as $key=>$j)
      <li class="list-icon-card newJob_card">
                <div class="newjob_heading">
                    <div class="company-name"> {{$j->title}}</div>
                    <h6 class="job-name fw-bold"> {{$j->job_type}}</h6>

                    <div class="newjob_detail mt-3">
                         <div class="fz-16 fw-bold rate">{{$j->hour_rate}} {{currency()}}/hr</div>  
                         <div class="fz-16">{{$j->location}}</div>
                         
                         <div class="postdate">
                            <div class="icon-img">
                                <img src="images/icons/post-icon.png">
                            </div>
                            <p class="mb-0 fw-600">Posted - {{$j->created_at->diffForHumans()}}</p>
                         </div>
                    </div>
                    <div class="job-card-btn pioneer-card-btn mt-3">
                        <a href="{{route('pioneer.job.applicant.profile',$j->created_by)}}" class="edit-btn btn popup-btn br-0">Profile</a>
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