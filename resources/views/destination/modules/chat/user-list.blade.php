
            
            <div class="inbox_chat scrollbar">
              @foreach($user_list as $key=>$user)
            @php
            
            
            $chat = \App\Models\Chat::where('applicant_id',$key)->orderBy('created_at', 'DESC')->first();
            $count = \App\Models\Chat::where('applicant_id',$key)->where('send_to',Auth::user()->_id)->where('read_status',0)->count();
            $count = $count == 0 ? '' : $count; 
            @endphp
              <div class="chat_list  user-select chat-count {{$chat->job_id}}-{{$chat->applicant->submit_by}}" data-job_id="{{$chat->job_id}}" data-applicant_id="{{$chat->applicant->submit_by}}">
                <div class="chat_people">
                  <div class="chat_img"> <img src="{{isset($chat->applicant->applicant->logo) ? asset($chat->applicant->applicant->logo) : asset('destination/images/aplicant.png')}}" > </div>
                  <div class="chat_ib">
                    <h5>{{$chat->applicant->applicant->first_name}} <span class="chat_date">{{$chat->created_at->format('M d')}}</span><span class="count">{{$count}}</span></h5>
                    <p class="chat-job-title">{{$chat->job->title}} </p>
                    <p>{{substr($chat->message,0,35)}}</p>
                  </div>
                </div>
              </div>
          
              @endforeach
            </div>
          