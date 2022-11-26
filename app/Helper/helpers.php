<?php 

function ActiveMenu($arr,$returnText,$route=null)
{
     $currentRoute = \Request::route()->getName();
         $i=0;

         if($currentRoute == $route){
             return  $returnText;
         }elseif($route == null){

            for($j=0;$j<count($arr); $j++){
                
                if($arr[$j] == $currentRoute){
                    $i++;
                 }
           }

        }
         return $i > 0 ? $returnText : '' ;
}

function listing($count,$currentpage,$list)
{
  $count==0 ? $from=$count : $from = $list*($currentpage-1)+1;
  $count<$list*$currentpage ? $to=$count : $to=$list*$currentpage;
  if($from>0){
  $text = '<div class="table-result-formating">';
 $text .='<p>Showing result';
 $text .=' <strong>'.$from;
  $text .=' to';
  $text .=$to;
  $text .=' </strong>out of <strong>';
  $text .=$count.' </strong></p>';
  $text .='</div>';
return $text; 
}
}

function chat_html($data){
    if(Auth::user()->_id!=$data->send_by){
        $sendTo_user = \App\User::where('_id',$data->send_by)->first();
    $html ="<div class='incoming_msg'>                   
                <div class='incoming_msg_img'> <img src=".asset($sendTo_user->logo)." > </div>
                <div class='received_msg'>
                  <div class='received_withd_msg'>
                    <div class='sender-person-name'>
                      <span>".$sendTo_user->first_name."</span> 
                    </div>
                    <p>".$data->message."</p>
                    


                    <span class='chat-date mt-2'>".date("h:i A")."</span>
                  </div>
                </div>
              </div>";
     }else{         
        $html ="<div class='incoming_msg outgoing_msg'> 
                <div class='received_msg'>
                  <div class='received_withd_msg'>
                    <div class='sender-person-name'>
                      <span>".Auth::user()->first_name."</span>
                    </div>
                    <p>".$data->message."</p> 
               


                    <span class='chat-date mt-2'>".date("h:i A")."</span>
                  </div>
                </div>
                <div class='incoming_msg_img'> <img src=".asset(Auth::user()->logo)." > </div>
              </div>";
     }         
    return $html;          
           // <div class='duration-box'>
           //            <span>Limits : 40hrs/week</span>
           //            <a href='#'>View Duration</a>
           //          </div>
}

function getDefaultArray($type,$value=0)
{
  $arr = [
     'job_type' => [
        'Catering' => 'Catering',
        'Security' => 'Security',
        'Hotel Services' => 'Hotel Services',
        'Cleaning operative' => 'Cleaning operative'
     ]
 ];
 return !empty($arr[$type]) ? $arr[$type] : [];
}     

function group_date($date){
    $yesterday = \Carbon\Carbon::yesterday()->format('M  jS Y');
    $today = \Carbon\Carbon::now()->format('M  jS Y');
    if($yesterday == $date){
        return 'Yesterday';
    }elseif($today == $date){
        return 'Today';
    }else{
        return $date;
    }
}

function destination_notification($n){
    $a='';
    switch ($n->type) {
        case 'Proposal Send':
            $route = route('destination.proposal',[$n->applicant->job,$n->applicant->_id]); 
            $a='<p class="pe-3">'.$n->sendByUser->first_name.' send proposal on Job - '.$n->applicant->job->title.' <a href="'.$route.'">Click Here</a></p>';
            break;
        case 'Chat':
            $route = route('destination.chat.param',[$n->applicant->job,$n->by]); 
            $a='<p class="pe-3">Message Send by '.$n->sendByUser->first_name.' on Job - '.$n->applicant->job->title.' <a href="'.$route.'">Click Here</a></p>';
            break;    
        case 'Escrow Recieved':
            $route = route('destination.invoices');
            $a='<p class="pe-3">Escrow Payment Confirmed for Job: '.$n->job->title.' <a href="'.$route.'">Click Here</a></p>';
            break;    
        case 'Invoice Raise':
            $route = route('destination.invoices');
            $a='<p class="pe-3">Invoice raised by '.$n->sendByUser->first_name.' for Job - '.$n->job->title.' <a href="'.$route.'">Click Here</a></p>';
            break;   
        case 'Invoice Paid':
            $route = route('destination.invoices');
            $a='<p class="pe-3">Invoice No. '.$n->invoice_id.' Paid  for Job: '.$n->job->title.' <a href="'.$route.'">Click Here</a></p>';
            break;    
        case 'Dispute':
            $route = route('destination.job.closed.detail',$n->job_id); 
            $a='<p class="pe-3">Dispute raised by '.$n->sendByUser->first_name.' on Job - '.$n->job->title.' <a href="'.$route.'">Click Here</a></p>';
            break;       
        case 'Account Verified': 
            $a='<p class="pe-3">Congratulations, your account is verified by admin.</p>';
            break;       
        case 'Rating':
            $route = route('destination.job.closed.detail',[$n->job_id]);
            $a='<p class="pe-3">Rating is submitted by '.$n->sendByUser->first_name.' on job '.$n->job->title.' <a href="'.$route.'">Click Here</a></p>';
            break;                                              
        default:
            $a='';
            break;
    }
    return $a;
}

function pioneer_notification($n){
    $a='';
    switch ($n->type) {
        case 'Job Created':
            $route = route('pioneer.apply.job',$n->job->_id); 
            $a='<p class="pe-3">'.$n->sendByUser->first_name.' created a new Job - '.$n->job->title.' <a href="'.$route.'">Click Here</a></p>';
            break;
        case 'Chat':
            $route = route('pioneer.chat.param',[$n->job_id,$n->by]); 
            $a='<p class="pe-3">Message Send by '.$n->sendByUser->first_name.' on Job - '.$n->applicant->job->title.' <a href="'.$route.'">Click Here</a></p>';
            break;    
        case 'Proposal Accepted':
            $route = route('pioneer.chat.param',[$n->job_id,$n->by]);
            $a='<p class="pe-3">Chat is initiated by '.$n->sendByUser->first_name.' on Job - '.$n->job->title.' <a href="'.$route.'">Click Here</a></p>';
            break;
        case 'Hire':
            $route = route('pioneer.hire.job.detail',[$n->job_id]);
            $a='<p class="pe-3">Congratulations, you are hire for the job '.$n->job->title.' <a href="'.$route.'">Click Here</a></p>';
            break;
        case 'Escrow Recieved':
            //$route = route('pioneer.hire.job.detail',[$n->job_id]);
            $a='<p class="pe-3">Escrow Payment Recieved for Job: '.$n->job->title.'</p>';
            break;  
        case 'Invoice Paid':
            //$route = route('pioneer.hire.job.detail',[$n->job_id]);
            $a='<p class="pe-3">Invoice No. '.$n->invoice_id.' Paid  for Job: '.$n->job->title.'</p>';
            break;  
        case 'Account Verified': 
            $a='<p class="pe-3">Congratulations, your account is verified by admin.</p>';
            break;
        case 'Rating':
            $route = route('pioneer.closed.job.detail',[$n->job_id]);
            $a='<p class="pe-3">Rating is submitted by '.$n->sendByUser->first_name.' on job '.$n->job->title.' <a href="'.$route.'">Click Here</a></p>';
            break;    
        case 'Job Closed':
            $route = route('pioneer.closed.job.detail',[$n->job_id]);
            $a='<p class="pe-3">Job is closed by '.$n->sendByUser->first_name.' ,Job Title '.$n->job->title.' <a href="'.$route.'">Click Here</a></p>';
            break;                    
            
                     
        
        default:
            $a='';
            break;
    }
    return $a;
}

function admin_notification($n){
    $a='';
    switch ($n->type) {
    case 'Escrow':
            $route = route('admin.contractor.escrow',[$n->job_id]);
            $a='<p class="pe-3">Escrow Payment Received. Please check. '.$n->sendByUser->first_name.' on Job - '.$n->job->title.' <a href="'.$route.'">Click Here</a></p>';
            break;
    case 'Invoice Raise':
            $route = route('admin.contractor.invoice',[$n->job_id]);
            $a='<p class="pe-3">Invoice raised by '.$n->sendByUser->first_name.' for Job - '.$n->job->title.' <a href="'.$route.'">Click Here</a></p>';
            break;                        
    case 'Dispute':
            $route = route('admin.contractor.invoice',[$n->job_id]);
            $a='<p class="pe-3">Dispute raised by '.$n->sendByUser->first_name.' for Job - '.$n->job->title.'</p>';
            break;
    case 'Destination Signup':
            $route = route('admin.destination.index',[$n->job_id]);
            $a='<p class="pe-3">Hello, New Destination member signup '.$n->sendByUser->first_name.' <a href="'.$route.'">Click Here</a></p>';
            break;
    case 'Pioneer Signup':
            $route = route('admin.pioneer.index',[$n->job_id]);
            $a='<p class="pe-3">Hello, New Pioneer member signup '.$n->sendByUser->first_name.' <a href="'.$route.'">Click Here</a></p>';
            break;         
            
        default:
            $a='';
            break;
    }
    return $a;       
}    

function more_less($data){
    $html = '';
    if(strlen($data) > 200){
        $html .= substr($data,0,200);
        $html .= '<span id="more_p" style="display:none">'.substr($data,200).'</span><button type="button" id="more_button" style="display:none">... More</button>';
    }else{
        $html = $data;
    }
    return $html;
}

function admin(){
    $user = \App\User::where('role','admin')->first();
    return $user;
}


function socket_ip(){
    $ip= 'http://18.209.69.216:3000';
    return $ip;
}

function rating_star_html(){
    $html = '';
    $html .= '<fieldset class="rate rating">
                                        <input type="radio" id="rating10" name="rating" value="10" /><label for="rating10" title="5 stars"></label>
                                        <input type="radio" id="rating9" name="rating" value="9" /><label class="half" for="rating9" title="4 1/2 stars"></label>
                                        <input type="radio" id="rating8" name="rating" value="8" /><label for="rating8" title="4 stars"></label>
                                        <input type="radio" id="rating7" name="rating" value="7" /><label class="half" for="rating7" title="3 1/2 stars"></label>
                                        <input type="radio" id="rating6" name="rating" value="6" /><label for="rating6" title="3 stars"></label>
                                        <input type="radio" id="rating5" name="rating" value="5" /><label class="half" for="rating5" title="2 1/2 stars"></label>
                                        <input type="radio" id="rating4" name="rating" value="4" /><label for="rating4" title="2 stars"></label>
                                        <input type="radio" id="rating3" name="rating" value="3" /><label class="half" for="rating3" title="1 1/2 stars"></label>
                                        <input type="radio" id="rating2" name="rating" value="2" /><label for="rating2" title="1 star"></label>
                                        <input type="radio" id="rating1" name="rating" value="1" /><label class="half" for="rating1" title="1/2 star"></label>
                                    
                                    </fieldset>';
    return $html;                                    
}

function show_rating($r){
    $html ='';

    
        if($r=='1'){
            $html .='<span class="fa  fa-star-half checked"></span>
                    <span class="fa fa-star "></span>
                    <span class="fa fa-star "></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>';
        }elseif($r=='2'){
            $html .='<span class="fa  fa-star checked"></span>
                    <span class="fa fa-star "></span>
                    <span class="fa fa-star "></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>';
        }elseif($r=='3'){
            $html .='<span class="fa  fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star-half checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>';
        }elseif($r=='4'){
            $html .='<span class="fa  fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star "></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>';
        }elseif($r=='5'){
            $html .='<span class="fa  fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star-half checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>';
        }elseif($r=='6'){
            $html .='<span class="fa  fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>';
        }elseif($r=='7'){
            $html .='<span class="fa  fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star-half checked"></span>
                    <span class="fa fa-star"></span>';
        }elseif($r=='8'){
            $html .='<span class="fa  fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>';
        }elseif($r=='9'){
            $html .='<span class="fa  fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star-half checked"></span>';
        }elseif($r=='10'){
            $html .='<span class="fa  fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>';
        }else{
            $html .='N/A';
        }
        return $html;
    
}