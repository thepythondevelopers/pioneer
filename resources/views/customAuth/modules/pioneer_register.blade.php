@extends('customAuth.layouts.auth')



@section('content')

    <section class="login-section register-section">
        <div class="container-fluid wmax-1920 p-0">
            <div class="row m-0">
                <div class="col-md-6 p-0">
                  <!-- <div class="register-wrapper"> -->
                    <!-- <div class="logo-wrapper">
                        <a href="#" class="logo">
                            <img src="{{asset('auth/images/logo.png')}}" alt="img">
                        </a>
                    </div>                    -->
                    <div class="login-img">                       
                        <figure>
                            <!-- <img src="{{asset('pioneer/images/login/register-img.png')}}" alt="img" /> -->
                            <img src="{{asset('pioneer/images/login/login-img.jpg')}}" alt="img" />
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
                    <a href="{{route('home_page')}}" class="logo">
                            <img src="{{asset('auth/images/logo-bw.png')}}" alt="img" />
                            <div class="logo-text">
                                Signup
                            </div>
                        </a>
                        <div class="form-design w-100">
                            @error('email')
                                    <div class="err-msg-wrap">
                                    <div class="alert alert-danger alert-dismissible fade show text-left" role="alert">
                    {{ $message }}
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                 </div>
                                @enderror
                            <form action="{{route('pioneer_register_save')}}"  id="pioneer-register" method="POST">
                                @csrf
                                <div class="form-group mb-4">
                                    <div class="input-icon-wrpper">
                                        <input  type="text" class="form-control" id="first_name" placeholder="First Name"
                                        name="first_name" autocomplete="off">
                                      
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="input-icon-wrpper">
                                        <input  type="text" class="form-control" id="last_name" placeholder="Last Name"
                                        name="last_name" autocomplete="off">
                                       
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="input-icon-wrpper">
                                        <input  type="text" class="form-control" id="email" placeholder="Email Id"
                                        name="email" autocomplete="off">
                               
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="input-icon-wrpper">
                                        <input type="password" class="form-control" id="password" placeholder="Password"
                                        name="password" autocomplete="off">
                             
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="input-icon-wrpper">
                                        <input type="password" class="form-control" id="confirm-password" placeholder="Confirm password" name="confirm-password">
                                   
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn form-btn mt-xl-3">Register</button>
                               
                            
                            </form>
                            </div>
                            <p class="text-center mt-3 fw-600 ">If you  have already  an account?<br> <a href="{{route('login_role','pioneer')}}" class="secondry-color"> Login</a></p>
                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection


@section('scripts')
<script type="text/javascript">
    
   jQuery("form[id='pioneer-register']").validate({
    rules: {
      'first_name':{
         required: true, 
         nowhitespace: true,
         minlength: 3,
         maxlength:35
      },
      'last_name':{
         required: true,
        nowhitespace: true,
        minlength: 3,
         maxlength:35
      },
      'email':{
         required: true,
        nowhitespace: true,
         maxlength:35,
         customemail:true,
            remote: {
                          url: "{{route('checkUserEmail')}}",
                          type: "get"
            }
      },
      'password':{
         required: true,
         nowhitespace: true,
         minlength: 8,
         maxlength:35
      },
      'confirm-password':{
         required: true,
         nowhitespace: true,
         minlength: 8,
         maxlength:35,
         equalTo: "#password"
      }
    },
    messages: {
        email: {
            remote: "Email already used!"
        } 
    },
   });
</script>
@stop