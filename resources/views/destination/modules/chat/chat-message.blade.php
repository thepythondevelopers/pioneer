@if($job!=null)

    @php 
      \App\Models\Chat::where('applicant_id',$applicant_id)->where('send_to',Auth::user()->_id)->update(['read_status' => 1]);
    @endphp
            <ul class="list-unstyled">
              <input type="hidden" name="active-user" id="active-user-list" value="{{$job->_id}}-{{$send_to}}">
              <li class="list-icon-card my-0">
                <div class="job-card border border-1">
                  <div class="row">
                    <div class="col-mf-9">
                      <div class="job-card-inner">

                        <div class="job-card-cont">
                          <div class="job-title h6">
                          <a href="{{route('destination.proposal',[$job->_id,$applicant_id])}}">{{$job->title}}</a>
                          </div>
                          <ul class="job-deatils-icons">
                            <li>
                              <div class="icon-img">
                                <img src="{{asset('destination/images/icons/hurly-rate.png')}}">
                              </div>
                              <p class="mb-0 fw-600">Hourly Rate - {{$job->hour_rate}} USD/hr</p>
                            </li>
                            <li>
                              <div class="icon-img">
                                <img src="{{asset('destination/images/icons/job-type.png')}}">
                              </div>
                              <p class="mb-0 fw-600">Job Type - {{$job->job_type}}</p>
                            </li>

                            <li>
                              <div class="icon-img">
                                <img src="{{asset('destination/images/icons/duration.png')}}">
                              </div>
                              <p class="mb-0 fw-600">{{$job->duration}}</p>
                            </li>
                            <li>
                              <div class="icon-img">
                                <img src="{{asset('destination/images/icons/post-icon.png')}}">
                              </div>
                              <p class="mb-0 fw-600">Posted - {{$job->created_at->diffForHumans()}}</p>
                            </li>
                          </ul>
                        </div>
                        @if($job->hire_status==0)
                        <div class="job-card-btn">
                          <a href="javascript:void(0)" class="edit-btn btn popup-btn" data-bs-toggle="modal" data-bs-target="#budget">Hire</a>
                        </div>
                        @endif
                      </div>

                    </div>
                  </div>
                </div>
              </li>
            </ul>
            <div class="msg_history" id="msg-scroll">
              @foreach($chat as $key=>$c)
              <div class="date-seprater my-4"><span>{{$key}}</span></div>



             @foreach($c as $kk=>$msg)

              <!-- <div class="date-seprater my-4"><span>Today</span></div> -->
              @if($msg->send_by == Auth::user()->_id)
              <div class='incoming_msg outgoing_msg'> 
                <div class='received_msg'>
                  <div class='received_withd_msg'>
                    <div class='sender-person-name'>
                      <span>{{Auth::user()->first_name}}</span>
                    </div>
                    <p>{{$msg->message}}</p> 
               
                    <span class='chat-date mt-2'>{{$msg->created_at->format('h:i A')}}</span>

                    
                  </div>
                </div>
                <div class='incoming_msg_img'> <img src="{{asset(Auth::user()->logo)}}" > </div>
              </div>

                @else
                       <div class='incoming_msg'>                   
                <div class='incoming_msg_img'> <img src="{{asset($msg->sendBy_user->logo)}}" > </div>
                <div class='received_msg'>
                  <div class='received_withd_msg'>
                    <div class='sender-person-name'>
                      <span>{{$msg->sendBy_user->first_name}}</span> 
                    </div>
                    <p>{{$msg->message}}</p>
                    <span class='chat-date mt-2'>{{$msg->created_at->format('h:i A')}}</span>


                    
                  </div>
                </div>
              </div>            
              @endif
              @endforeach
              @endforeach
     
              

            </div>
            <form id="form" >
              <input type="hidden" name="job_id" value="{{$job_id}}">
              <input type="hidden" name="send_to" value="{{$send_to}}">
              <input type="hidden" name="send_by" value="{{Auth::user()->_id}}">
              <input type="hidden" name="applicant_id" value="{{$applicant_id}}">
            <div class="type_msg">
                <textarea placeholder="Type a message" class="write_msg" id="message" name="message" required></textarea>
                <div class="chat-btn-group">
                    <!-- <button type="submit" class="smile">
                        <img src="images/icons/smile.png" alt="smile">
                    </button> -->
                    <button type="submit" >
                          <img src="{{asset('destination/images/icons/send.png')}}" alt="send">
                    </button>
               
              </div>
            </div>
          </form>
          
@endif

<div class="modal fade" id="budget" tabindex="-1" aria-labelledby="budgetLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="hire-budget-form" data-action="{{route('destination.hire.applicant.job')}}">
          <input type="hidden" name="job_id" value="{{$job_id}}">
              <input type="hidden" name="hire_applicant_id" value="{{$send_to}}">
              <input type="hidden" name="applicant_id" value="{{$applicant_id}}">
        <div class="modal-body p-5 pb-2 text-center">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <h6 class="mb-3">Specify Budget?</h6>
          <input class="form-control text-center" name="price" id="price" placeholder="$0" type="text" required>
          <select name="type" class="form-control">
          <option value="Fixed">Select Job Type</option>
            <option value="Fixed">Fixed</option>
            <option value="Hourly">Hourly</option>
          </select>
        </div>
        <div class="modal-footer pb-4 justify-content-center border-0">        
          <button type="submit" class="edit-btn btn popup-btn">Submit</button>
        </div>
      </form>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    
    jQuery("form[id='hire-budget-form']").validate({
    rules: {
      
        'hire_budget':{
            required: true,
            nowhitespace: true
        },
        'type':{
            required: true,
            nowhitespace: true
        }
    }
   });   
  </script>