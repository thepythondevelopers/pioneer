
@if($job->count() >0)
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

        <div class="job-card-btn">
            <a href="{{route('pioneer.chat')}}"
                class="edit-btn btn popup-btn">Message</a>
            <a href="{{route('pioneer.closed.job.detail',$j->_id)}}"
                class="edit-btn outline-btn btn popup-btn mt-md-0">View Details</a>
        </div>
</li>




@endforeach
                                    <div class="pagination-wrap closed-job-pagination w-100 text-center mt-3 cstm-center"> 
                        {{$job->links()}}
                    </div> 
@else
<div class="empty-job">
    <label>No Data Found.</label>
</div>
@endif                    