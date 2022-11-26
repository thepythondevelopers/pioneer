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
        $service_data = (isset(Auth::user()->service) && Auth::user()->service!='null') ? json_decode(Auth::user()->service) : [];
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
                    <form id="msform" class="register-step2" action="{{route('destination.register.step2.save')}}" method="POST"  >
                        @csrf
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="account"></li>
                            <li id="personal" class="active"></li>
                            <li id="payment"></li>
                            <!-- <li id="confirm"></li> -->
                        </ul>
                        <br>
                        

                        <fieldset class=" step-card-inner shadow br-10">
                            <div class="form-card">
                                <div class="heading-wrapper text-center mb-5">
                                    <h3 class="heading after-line after-line-center">Please select what you are looking for?</h3>
                                </div>
                                
                                <ul class="check-card-list">
                                    @foreach($service as $key=>$ser)
                                    <li>
                                        <div class="input-group check-card">
                                            <input type="checkbox" id="key{{$key}}" name="service[]" value="{{$ser->_id}}" {{in_array($ser->_id,$service_data) ? 'checked' : ''}}>
                                            <label for="key{{$key}}">{{$ser->name}}</label>  
                                            <img src="images/icons/checkbox-check.png" alt="icon">  
                                            </div>
                                    </li>
                                    @endforeach
                                </ul>
                            
                            </div> 
                            <div class="err-msg-wrap">
                                
                             </div>
                            
                            <a href="{{route('destination.register.step1')}}" name="previous" class="previous primary-btn bg-dark action-button-previous">Previous</a>
                             
                            <div class="step-button">
                            <button type="submit"  class="primary-btn">Next</button>
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
    
   jQuery("form[class='register-step2']").validate({
         errorPlacement: function(error, element) {
          error.appendTo('.err-msg-wrap');

   },
    rules: {
      'service[]':{
         required: true, 
      }
      
    },
     messages: {
      'service[]': { 
        required :"Please select one service."
     }
     }
   });
</script>
@stop