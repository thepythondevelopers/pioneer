@extends('customAuth.layouts.auth')



@section('content')
<section class="login-section">
        <div class="container-fluid wmax-1920 p-0">
            <div class="row m-0">
                <div class="col-md-6 p-0 ">
                @if($role=='destination')
                    <div class="login-img destination">
                @else($role=='pioneer')
                    <div class="login-img">
                @endif
                        <figure>
                            @if($role=='destination')
                            <!-- <img src="{{asset('destination/images/login/login-img.png')}}" alt="img" /> -->
                            <img src="{{asset('auth/images/login/destination_login.jpg')}}" alt="img" />
                            @elseif($role=='pioneer')
                            <img src="{{asset('pioneer/images/login/pioneer_login.jpg')}}" alt="img" />
                            @else
                            <!-- <img src="{{asset('destination/images/login/login-img.png')}}" alt="img" /> -->
                            <img src="{{asset('pioneer/images/login/login-img.jpg')}}" alt="img" />
                            @endif
                        </figure>
                        <div class="login_logo">
                            <img src="{{asset('auth/images/logo.png')}}" alt="img">
                        </div>
                    </div>
                   
                </div>
                <div class="col-md-6 p-0">

                    <div class="login-form-wrapper">
                    <div class="login-form-inner">
                        <a href="{{route('home_page')}}" class="logo">
                        @if($role=='destination')
                            <img src="{{asset('auth/images/login/destination_logo.png')}}" alt="img" />
                        @else
                            <img src="{{asset('auth/images/logo-bw.png')}}" alt="img" />
                        @endif
                            <div class="logo-text">
                                Login
                            </div>
                        </a>
                        <div class="form-design">
                            @if(Session::has('Success'))
          <div class="err-msg-wrap">
                                    <div class="alert alert-success alert-dismissible fade show text-left" role="alert">
                    {{session('Success')}}
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                 </div>
@endif
                            @if(session('message'))
                                <div class="err-msg-wrap">
                                    <div class="alert alert-{{session('message_type')}} alert-dismissible fade show text-left" role="alert">
                    {{session('message')}}
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                 </div>
                                 @endif                       
                            <form class="login-Form needs-validated" method="POST" action="{{ route('login') }}" id="login-Form">
                                @csrf
                                @error('email')
                                    <div class="err-msg-wrap">
                                    <div class="alert alert-danger alert-dismissible fade show text-left" role="alert">
                    {{ $message }}
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                 </div>
                                    <!-- <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> -->
                                @enderror

                                 @if($role=='destination')
                            <input type="hidden" name="role" value="destination">
                            @elseif($role=='pioneer')
                            <input type="hidden" name="role" value="pioneer">
                            @else
                            <input type="hidden" name="role" value="admin">
                            @endif

                                <div class="form-group mb-sm-5 mb-4">
                                    <div class="input-icon-wrpper">
                                        <input  type="email" class="form-control" id="email" placeholder="Enter Email"
                                        name="email" >
                                        
                                    </div>
                                    
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-icon-wrpper">
                                        <input type="password" class="form-control" id="password" placeholder="Enter Password"
                                        name="password" >
                                        <span class="input-icon">
                                        
                                    </div>
                                    <!-- @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                                </div>
                                <div class="two-column mb-sm-4">
                                    <div class="form-check mb-md-0 mb-2">
                                        <input class="form-check-input" type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">Remember me</label>
                                        
                                    </div>
                                    <a href="{{ route('password.request') }}"  class="forgot-link secondry-color">Forgot Password ?</a>
                                </div>
                                <button type="submit" class="btn form-btn">Submit</button>
                              
                            </form>
                        </div>
                       
                        @if($role=='destination')
                                <p class=" text-center mt-sm-4 mt-3 fw-600 ">New to Pionnering People?<br> <a href="{{route('destination_register')}}" class="secondry-color">Signup for an account</a></p>
                                @elseif($role=='pioneer')
                                <p class="text-center mt-sm-4 mt-3 fw-600 ">New to Pionnering People?<br> <a href="{{route('pioneer_register')}}" class="secondry-color">Signup for an account</a></p>
                                @endif
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@stop

@section('scripts')
<script type="text/javascript">
    
   jQuery("form[id='login-Form']").validate({
    rules: {
      'email':{
         required: true,
        nowhitespace: true,
         maxlength:35,
         customemail:true
      },
      'password':{
         required: true,
         nowhitespace: true,
         minlength: 8,
         maxlength:35
      }
    }
   });
</script>
@stop