@extends('customAuth.layouts.auth')



@section('content')
 <!-- Start Header section -->
    @include('customAuth.includes.header')
    <!-- End Header section --> 
  
      
    <!-- Steps Section -->
    <section class="steps-section">
        <div class="container">
            <div class="content-wrapper p-60">
                
                <div class="card">
                @if(Auth::user()->email_verification==0)
                                <div class="err-msg-wrap">
                                    <div class="alert alert-danger alert-dismissible fade show text-left" role="alert">
                    E-mail has been sent on your id for verification.
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                 </div>
                          @endif            
                    <form id="msform" class="register-step3" action="{{route('pioneer.register.step3.save')}}" method="POST"  >
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
                                    <h3 class="heading after-line after-line-center">
                                        please select your prefference
                                    </h3>
                                </div>
                                
                                <div class="row">
                                    <div class="range-wrapper col-lg-6 mb-lg-5 mb-md-4 mb-3">
                                        <div class="range-slider">
                                            <div class="label-icon">
                                                <img src="images/icons/duration.png" alt="img">
                                                <div class="fz-18 font-bold">Hours</div>
                                            </div>
                                            <div id="tooltip"></div>
                                            <!-- <input id="range" type="range" step="10" value="20" min="10" max="60" name="hour"> -->
                                            <input id="range" class="range-slider__range browser-default" step="1" type="range" value="5" min="0" max="24" name="hour">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group  d-flex align-items-center col-lg-6 mb-5">
                                        <div class="input-icon-wrpper w-100">
                                            <select name="day_of_work" id="dweek" class="form-control select">
                                                <option value="">Working Day per Week</option>
                                                <option value="2">2 Days</option>
                                                <option value="3">3 Days</option>
                                                <option value="4">4 Days</option>
                                                <option value="5">5 Days</option>
                                                <option value="5">6 Days</option>
                                            </select>
                                            <span class="input-icon pioneer-chevron">
                                                <img src="images/icons/arrow-down.png" alt="icon">
                                            </span>
                                        </div>
                                        
                                    </div>

                                    <div class="range-wrapper col-lg-6 mb-lg-5 mb-md-4 mb-3">
                                        <div class="water-slider"> 
                                            <div class="label-icon mb-0">
                                                <img src="images/icons/duration.png" alt="img">
                                                <div class="fz-18 font-bold">Rates of Pay</div>
                                            </div>                                          
                                            <div class="range-slider">
                                                
                                              <span class="range-slider__value">20</span>
                                              <input id="range-slider-val" class="range-slider__range browser-default" type="range" value="100" min="1" max="500" name="rate_of_pay">
                                            </div>
                                          </div>
                                    </div>

                                    <div class="form-group   d-flex align-items-center col-lg-6 mb-lg-5 mb-md-4 mb-3">
                                        <div class="input-icon-wrpper w-100">
                                            <?php $job_type = getDefaultArray('job_type') ?>
                                            <select name="job_type"  class="form-control select">
                                                <option value="">Job Type</option>
                                                @foreach($job_type as $key=>$job)
                                                <option value="{{$job}}">{{$job}}</option>
                                                @endforeach
                                            </select>
                                            <span class="input-icon pioneer-chevron">
                                                <img src="images/icons/arrow-down.png" alt="icon">
                                            </span>
                                        </div>

                                    </div>

                                    <div class="form-group  d-flex align-items-center   col-lg-6 mb-lg-5 mb-md-4 mb-3">
                                        <div class="input-icon-wrpper w-100">
                                            @php $location = \App\Models\Location::get(); @endphp
                                            <select name="location"  class="form-control select">
                                                <option value="">Location</option>
                                                @foreach($location as $key=>$loc)
                                                    <option value="{{$loc->name}}">{{$loc->name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="input-icon pioneer-chevron">
                                                <img src="images/icons/arrow-down.png" alt="icon">
                                            </span>
                                        </div>
                                        
                                    </div>
                            
                            </div>  
                            <a href="{{route('pioneer.register.step2')}}" name="previous" class="previous primary-btn bg-dark action-button-previous">Previous</a>
                             <div class="step-button">
                            <button type="submit"  class="primary-btn">Submit</button>
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
    rules: {
      'day_of_work':{
         required: true, 
      },
      'job_type':{
         required: true
      },
      'location':{
         required: true
      }
      
    }
   });
</script>
@stop
