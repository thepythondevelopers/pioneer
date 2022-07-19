@extends('destination.layouts.auth')



@section('content')
<section class="login-section register-section">
        <div class="container-fluid wmax-1920 p-0">
            <div class="row m-0">
                <div class="col-md-7 p-0">
                  <div class="register-wrapper">
                    <div class="logo-wrapper">
                        <a href="#" class="logo">
                            <img src="images/logo.png" alt="img">
                        </a>
                    </div>                   
                    <div class="login-img">                       
                        <figure>
                            <img src="images/login/register-img.png" alt="img" />
                        </figure>
                    </div>
                  </div>
                </div>
                <div class="col-md-5 p-0">
                    <div class="login-form-wrapper">
                        <div class="section-heading mb-sm-5 mb-3">
                            <h2 class="text-white text-cp">Register Now</h2>
                        </div>
                        <div class="form-design w-100">
                            <form action="register-steps.html" class="needs-validated">
                                
                                <div class="form-group mb-4">
                                    <div class="input-icon-wrpper">
                                        <input  type="text" class="form-control" id="uname" placeholder="First Name"
                                        name="uname" required>
                                        <span class="input-icon">
                                            <img src="images/icons/edit-icon.png" alt="icon">
                                        </span>
                                    </div>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="input-icon-wrpper">
                                        <input  type="text" class="form-control" id="fname" placeholder="Last Name"
                                        name="fname" required>
                                        <span class="input-icon">
                                            <img src="images/icons/edit-icon.png" alt="icon">
                                        </span>
                                    </div>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="input-icon-wrpper">
                                        <input  type="text" class="form-control" id="email" placeholder="Email Id"
                                        name="email" required>
                                        <span class="input-icon">
                                            <img src="images/icons/mail-icon.png" alt="icon">
                                        </span>
                                    </div>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="input-icon-wrpper">
                                        <input type="password" class="form-control" id="pwd" placeholder="password"
                                        name="pswd" required>
                                        <span class="input-icon">
                                            <img src="images/icons/pwd-icon.png" alt="icon">
                                        </span>
                                    </div>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="input-icon-wrpper">
                                        <input type="password" class="form-control" id="cpwd" placeholder="Confirm password"
                                        name="cpwd" required>
                                        <span class="input-icon">
                                            <img src="images/icons/pwd-icon.png" alt="icon">
                                        </span>
                                    </div>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                
                                <button type="submit" class="btn site-btn">Submit</button>
                                <p class="text-white text-center mt-3 fw-600 ">If you  have already  an account? <a href="login.html" class="text-white text-underline"> Login here</a></p>
                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop