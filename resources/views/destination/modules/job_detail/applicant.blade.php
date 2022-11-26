@if($applicant->count() > 0)
@foreach($applicant as $key=>$a)
<li class="list-icon-card">
                        <div class="job-card border-radius shadow br-10">
                            <div class="row">
                                <div class="">
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
                                        <div class="job-card-btn">
                                                @if($a->interested==0)
                                                <a href="javascript:void(0)" class="edit-btn btn popup-btn f_message" data-job_id="{{$job_id}}" data-applicant_id="{{$a->applicant->_id}}">Message</a>
                                                @else
                                                <a href="{{route('destination.chat.param',[$job_id,$a->applicant->_id])}}" class="edit-btn btn popup-btn " data-job_id="{{$job_id}}" data-applicant_id="{{$a->applicant->_id}}">Message</a>
                                                @endif
                                                <a href="{{route('destination.proposal',[$job_id,$a->_id])}}" class="edit-btn btn ">View Details</a>

                                            </div>
                                    </div>                                
                                </div>
                            </div>
                        </div>
                    </li>
@endforeach
                    <div class="pagination-wrap text-center mt-3"> 
        {{$applicant->links()}}
    </div>
@else
<label>No Data Found.</label>
@endif    