@extends('customAuth.layouts.auth')



@section('content')
 <!-- Start Header section -->
    @include('customAuth.includes.header')
    <!-- End Header section -->
  
      
    <!-- Steps Section -->
    <section class="steps-section">
        <div class="container">
            <div class="content-wrapper p-60">
@php 
        $offer_data = (isset(Auth::user()->offer) && Auth::user()->offer!='null') ? json_decode(Auth::user()->offer) : [];
    @endphp                                
                <div class="card">   
                @if(Auth::user()->email_verification==0)
                                <div class="err-msg-wrap">
                                    <div class="alert alert-danger alert-dismissible fade show text-left" role="alert">
                    E-mail has been sent on your id for verification.
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                 </div>
                                 @endif             
                    <form id="msform" action="{{route('destination.register.step3.save')}}" method="POST"  class="register-step3">
                        @csrf
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="account"></li>
                            <li id="personal" class="active"></li>
                            <li id="payment" class="active"></li>
                            <!-- <li id="confirm"></li> -->
                        </ul>
                        <br>
                        
                        
                        <fieldset class=" step-card-inner shadow br-10">
                            <div class="form-card">
                                <div class="heading-wrapper text-center mb-5">
                                    <h3 class="heading after-line after-line-center">Do you offer?</h3>
                                </div>
                                
                                <ul class="check-card-list">
                                    @foreach($service as $key=>$ser)
                                    <li>
                                        <div class="input-group check-card">
                                            <input type="checkbox" id="key{{$key}}" name="offer[]" value="{{$ser->_id}}" {{in_array($ser->_id,$offer_data) ? 'checked' : ''}}>
                                            <label for="key{{$key}}">{{$ser->name}}</label>
                                            <img src="images/icons/checkbox-check.png" alt="icon">    
                                            </div>
                                    </li>
                                    @endforeach
                                    
                                    
                                </ul>
                            
                            </div>  
                                                        <div class="err-msg-wrap">
                                
                             </div>
                             <div>
                            <a href="{{route('destination.register.step2')}}" name="previous" class="previous primary-btn bg-dark action-button-previous">Previous</a>
                            
                            <button type="submit"  class="edit-btn">Submit</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
                   
               
            </div>
        </div>
    </section>
@stop

@section('scripts')
<script type="text/javascript">
    
   jQuery("form[class='register-step3']").validate({
     errorPlacement: function(error, element) {
          error.appendTo('.err-msg-wrap');

   },
    rules: {
      'offer[]':{
         required: true, 
      }
      
    },
         messages: {
      'offer[]': { 
        required :"Please select one offer."
     }
     }
   });
</script>
@stop