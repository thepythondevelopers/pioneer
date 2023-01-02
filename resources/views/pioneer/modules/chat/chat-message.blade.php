@if($job!=null)
    @php 
      \App\Models\Chat::where('applicant_id',$applicant_id)->where('send_to',Auth::user()->_id)->update(['read_status' => 1]);
    @endphp
            <ul class="list-unstyled">
              <input type="hidden" name="active-user" id="active-user-list" value="{{$job->_id}}-{{Auth::user()->_id}}">
              <li class="list-icon-card my-0">
                <div class="job-card border border-1">
                  <div class="row">
                    <div class="col-mf-9">
                      <div class="job-card-inner">

                        <div class="job-card-cont">
                          <div class="job-title h6">
                          <a href="{{route('pioneer.proposal',$job->_id)}}">{{$job->title}}</a>
                          </div>
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
                              <p class="mb-0 fw-600">{{$job->duration}}</p>
                            </li>
                            <li>
                              <div class="icon-img">
                                <img src="{{asset('pioneer/images/icons/post-icon.png')}}">
                              </div>
                              <p class="mb-0 fw-600">Posted - {{$job->created_at->diffForHumans()}}</p>
                            </li>
                          </ul>
                        </div>

                        
                      </div>

                    </div>
                  </div>
                </div>
              </li>
            </ul>
            <div class="msg_history">
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
                          <img src="{{asset('pioneer/images/icons/send.png')}}" alt="send">
                    </button>
               
              </div>
            </div>
          </form>
          
@endif