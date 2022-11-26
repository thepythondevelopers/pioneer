@extends('customAuth.layouts.auth')
 @section('content')   
    <section class="login-section register-section">
        <div class="container-fluid wmax-1920 p-0">
            <div class="row m-0">
                <div class="col-md-6 p-0">
                  <!-- <div class="register-wrapper"> -->
                    <!-- <div class="logo-wrapper">
                        <a href="{{route('home_page')}}" class="logo">
                            <img src="{{asset('auth/images/logo.png')}}" alt="img">
                        </a>
                    </div>                    -->
                    <div class="login-img">                       
                        <figure>
                            <img src="{{asset('auth/images/login/destination_sign.jpg')}}" alt="img" />
                        </figure>
                        <div class="login_logo">
                            <img src="{{asset('auth/images/logo.png')}}" alt="img">
                        </div>
                    </div>
                    
                  <!-- </div> -->
                </div>
                <div class="col-md-6 p-0">
                    <div class="login-form-wrapper">
                    <div class="login-form-inner">
                        <div class="section-heading mb-sm-5 mb-3">
                            <h2 class="text-cp text-center">Email  Confirmation</h2>
                        </div>
                        <div class="form-design">
                                                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                            <form method="POST" action="{{ route('password.email') }}" id="forgot-password">
                        @csrf
                                <div class="form-group mb-4">
                                    <div class="input-icon-wrpper">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Your Registered Email" required autocomplete="email" autofocus>
                                        
                                    </div>
                                                                    

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                               
                                
                                <button type="submit" class="btn form-btn mt-md-4 mt-3">Submit</button>
                            
                            </form>
                            </div> 
                            <p class=" text-center mt-3 fw-600 ">If you  have already  an account?<br> <a href="{{route('home_page')}}" class="secondry-color"> Login here</a></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('scripts')
<script type="text/javascript">
    
   jQuery("form[id='forgot-password']").validate({
    rules: {
      'email':{
         required: true,
        nowhitespace: true,
         maxlength:35,
         customemail:true
      }
    }
   });
</script>
@stop