@extends('destination.layouts.auth')



@section('content')
<section class="login-section">
        <div class="container-fluid wmax-1920 p-0">
            <div class="row m-0">
                <div class="col-md-7 p-0">
                    <div class="login-img">
                        <figure>
                            <img src="images/login/login-img.png" alt="img" />
                        </figure>
                    </div>
                </div>
                <div class="col-md-5 p-0">
                    <div class="login-form-wrapper">
                        <a href="#" class="logo">
                            <img src="images/logo-white.png" alt="img">
                        </a>
                        <div class="form-design w-100">
                            <form action="create_job.html" class="needs-validated">
                                <div class="form-group mb-sm-5 mb-4">
                                    <div class="input-icon-wrpper">
                                        <input  type="text" class="form-control" id="uname" placeholder="Enter username"
                                        name="uname" required>
                                        <span class="input-icon">
                                            <img src="images/icons/mail-icon.png" alt="icon">
                                        </span>
                                    </div>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-icon-wrpper">
                                        <input type="password" class="form-control" id="pwd" placeholder="Enter password"
                                        name="pswd" required>
                                        <span class="input-icon">
                                            <img src="images/icons/pwd-icon.png" alt="icon">
                                        </span>
                                    </div>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="two-column mb-sm-5 mb-4">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="myCheck" name="remember"
                                            required>
                                        <label class="form-check-label" for="myCheck">Remember me</label>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Check this checkbox to continue.</div>
                                    </div>
                                    <a href="W" target="_blank" class="forgot-link">Forgot Password ?</a>
                                </div>
                                <button type="submit" class="btn site-btn">Submit</button>
                                <p class="text-white text-center mt-3 fw-600 ">Don’t have an account  yet? <a href="register.html" class="text-white text-underline"> Sign Up</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop