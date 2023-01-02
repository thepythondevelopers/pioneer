@extends('destination.layouts.layout')



@section('content')
    <!-- Start setting section -->
    <section class="inner-banner bg">
    <div class="container container-1440 innercontent_wrp">
        <h2>Profile details</h2>
    </div>
 </section>
    <section class="setting-section p-40 ">
        <div class="container container-1440">
            <div class="sectting-inner">
                <div class="row">
                    <!-- <div class="col-12">
                        <div class="setting-tab nav nav-pills" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            
                            <button class="nav-link active" id="account-tab" data-bs-toggle="pill"
                                data-bs-target="#account" type="button" role="tab" aria-controls="account"
                                aria-selected="true">
                                Account
                            </button>

                        </div>
                    </div> -->

                    <div class="col-12"> 
                        <div class=" setting-tab_content steps-section shadow p-4 d-flex align-items-start br-10">
                            <div class="tab-content w-100">
                                <div class="">
                                    
                                    <div class="row">
                                       
                                        <div class="col-md-3">
                                        
                                            <div class="profile-picture-wrapper">
                                                <div class="profile-picture">
                                                    <h5 class="text-capitalize">Profile details</h5>                                                    
                                                </div>
                                                <div class="wrapper br-10 mb-sm-4 mb-5 ">
                                                <div class="box">
                                                    <div class="js--image-preview" style="background-image:url('{{(isset($user->logo) && $user->logo!='null') ? asset(Auth::user()->logo) : 'images/Resgister-step/certificate1.png'}}');">
                                                    <div class="close-options">
                                                     
                                                        <input type="file" name="logo" class="image-upload" accept="image/png, image/jpg, image/jpeg,image/JPG, image/JPEG, image/PNG" disabled />
                                                       <label></label>
                                                    </div>
                                                    </div>

                                                    
                                                  </div>
                                                  <div id="logo-error" class="cstm-error-image-div"></div>
                                                  
                                                </div>                                        
                                            </div>
                                            
                                        </div>                                    
                                        <div class="col-9">


                                            <div class="row form-design">
                                                <div class="form-group col-md-6 mb-lg-4 mb-3">
                                                    <label class="label">First Name</label>
                                                    <div class="input-icon-wrpper">
                                                        <input  type="text" class="form-control" id="first_name" placeholder="First Name"
                                                name="first_name" value="{{$user->first_name}}" disabled>
                                                     
                                                    </div>
                                                </div>
                                                <div class="form-group  col-md-6 mb-lg-4 mb-3">
                                                    <label class="label">Company</label>
                                                    <div class="input-icon-wrpper">
                                                        <input  type="text" class="form-control" id="company" placeholder="Company"
                                                name="company" value="{{$user->company}}" disabled>
                                               
                                                    </div>
                                                </div>
                                                <div class="form-group  col-md-6 mb-lg-4 mb-3">
                                                    <label class="label">Surn ame</label>
                                                    <div class="input-icon-wrpper">
                                                        <input  type="text" class="form-control" id="last_name" placeholder="Surname"
                                                name="last_name" value="{{$user->last_name}}" disabled>
                                               
                                                    </div>
                                                </div>
                                                <div class="form-group  col-md-6 mb-lg-4 mb-3">
                                                    <label class="label">Address1</label>
                                                    <div class="input-icon-wrpper">
                                                        <input  type="text" class="form-control" id="address1" placeholder="Address1"
                                                name="address1" value="{{$user->address1}}" disabled>
                                               
                                                    </div>
                                                </div>
                                               <div class="form-group col-6 mb-lg-4 mb-3">
                                                <label class="label">Email</label>
                                                    <div class="input-icon-wrpper">
                                                        <input  type="text" class="form-control" id="email" placeholder="Email Id"
                                                name="email" value="{{$user->email}}" disabled>
                                                
                                                    </div>
                                                </div>
                                                <div class="form-group  col-md-6 mb-lg-4 mb-3">
                                                    <label class="label">Address2</label>
                                                    <div class="input-icon-wrpper">
                                                        <input  type="text" class="form-control" id="address2" placeholder="Address2"
                                                name="address2" value="{{$user->address2}}" disabled>
                                               
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 mb-lg-4 mb-3 mbl_no">
                                                    <label class="label">Mobile Number</label>
                                                    <div class="input-icon-wrpper">
                                                        <input type="text" class="form-control" id="mobile_number" maxlength="10" placeholder="Mobile Number"
                                                name="mobile_number" value="{{(isset($user->mobile_number) && $user->mobile_number!='null') ? $user->mobile_number : ''}}" disabled>
                                                <span class="tel-country-code">+44</span>
                                                  
                                                    </div>
                                                </div>
                                                <div class="form-group  col-md-6 mb-lg-4 mb-3">
                                                    <label class="label">Town/City</label>
                                                    <div class="input-icon-wrpper">
                                                        <input  type="text" class="form-control" id="town_city" placeholder="Town/City"
                                                name="town_city" value="{{$user->town_city}}" disabled>
                                               
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                        <div class="form-group col-6 mb-lg-4 mb-3">
                                            <label class="label">National Insurance number</label>
                                            <div class="input-icon-wrpper">
                                                <input type="text"  class="form-control" id="national_insurance_number"  placeholder="National Insurance number"
                                                name="national_insurance_number" value="{{(isset($user->national_insurance_number) && $user->national_insurance_number!='null') ? $user->national_insurance_number : ''}}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 mb-lg-5 mb-md-4 mb-3">
                                                <label class="label">Postcode</label>
                                                    <div class="input-icon-wrpper" style="position:relative;">
                                                        <input type="text" class="form-control" id="postcode"  placeholder="Postcode"
                                                name="postcode" value="{{(isset($user->postcode) && $user->postcode!='null') ? $user->postcode : ''}}" disabled>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                                                                 
                                        </div>
                                        <div class="form-group icon-form col-12 mb-lg-4 mb-3">
                                        <label class="label">About Us</label>
                                            <div class="input-icon-wrpper1">
                                                <textarea class="form-control " rows="8" placeholder="About Us" name="about_us" disabled >{{(isset($user->about_us) && $user->about_us!='null') ? Auth::user()->about_us : '' }}</textarea>
                                            
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="hr" />
                                <div class="certificates">
                                                <div class="row wrapper">
                                                    <div class="col-12 mb-3">
                                                    <div class="profile-picture">
                                                        <h5 class="text-capitalize fw-bold ">Uploaded documents</h5>                                                    
                                                    </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <div class="certificate-box">
                                                            
                                                            <div class=" fz-16"><p>CV</p></div>
                                                             <div class="box">
                                                    <div class="js--image-preview certificate1-preview1" style="background-image:url('{{(isset($user->certificate1) && $user->certificate1!='null') ? asset(Auth::user()->certificate1) : 'images/Resgister-step/certificate1.png'}}');">
                                                        <a href="javascript:void(0)" class="remove_prev_image" onclick="myImgRemove(1)" style="display:none"><i class="fas fa-times"></i></a>
                                                    <div class="close-options">
                                                      
                                                        <input type="file" name="certificate1" class="image-upload certificate1" accept="image/png, image/jpg, image/jpeg,image/JPG, image/JPEG, image/PNG" disabled />
                                                      <label></label>
                                                    </div>
                                                    </div>
                                                    
                                                    </div>
                                                  </div>
                                                  <div id="certificate1-error" class="cstm-error-image-div"></div>
                                                          

                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                    <div class="certificate-box">
                                                            <div class="fz-16"><p>Right to work ID</p></div>
                                                             <div class="box">
                                                    <div class="js--image-preview certificate1-preview2" style="background-image:url('{{(isset($user->certificate2) && $user->certificate2!='null') ? asset(Auth::user()->certificate2) : 'images/Resgister-step/certificate1.png'}}');">
                                                        <a href="javascript:void(0)" class="remove_prev_image" onclick="myImgRemove(2)" style="display:none"><i class="fas fa-times"></i></a>
                                                    <div class="close-options">
                                                      
                                                        <input type="file" name="certificate2" class="image-upload certificate2" accept="image/png, image/jpg, image/jpeg,image/JPG, image/JPEG, image/PNG" disabled />
                                                      <label></label>
                                                    </div>
                                                    </div>
                                                    </div>
                                                  </div>
                                                      <div id="certificate2-error" class="cstm-error-image-div"></div>     
                                                      
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                     
                                                    <div class="certificate-box"> 
                                                            <div class=" fz-16"><p>DBS Certificate</p></div>
                                                            <div class="box">
                                                    <div class="js--image-preview certificate1-preview3" style="background-image:url('{{(isset($user->certificate3) && $user->certificate3!='null') ? asset(Auth::user()->certificate3) : 'images/Resgister-step/certificate1.png'}}');">
                                                        <a href="javascript:void(0)" class="remove_prev_image" onclick="myImgRemove(3)" style="display:none"><i class="fas fa-times"></i></a>
                                                    <div class="close-options">
                                                     
                                                        <input type="file" name="certificate3" class="image-upload certificate3" accept="image/png, image/jpg, image/jpeg,image/JPG, image/JPEG, image/PNG" disabled />
                                                       <label></label>
                                                    </div>
                                                    </div>
                                                    </div>
                                                  </div>
                                                  <div id="certificate3-error" class="cstm-error-image-div"></div>
                                                        
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                    <div class="certificate-box">    
                                                        <div class=" fz-16"><p>Security Clearance</p></div>
                                                           <div class="box">
                                                    <div class="js--image-preview certificate1-preview4" style="background-image:url('{{(isset($user->certificate4) && $user->certificate4!='null') ? asset(Auth::user()->certificate4) : 'images/Resgister-step/certificate1.png'}}');">
                                                        <a href="javascript:void(0)" class="remove_prev_image" onclick="myImgRemove(4)" style="display:none"><i class="fas fa-times"></i></a>
                                                    <div class="close-options">
                                                      
                                                        <input type="file" name="certificate4" class="image-upload certificate4" accept="image/png, image/jpg, image/jpeg,image/JPG, image/JPEG, image/PNG" disabled />
                                                     <label> </label>
                                                    </div>
                                                    </div>

                                                  </div>
                                                  </div>
                                                  <div id="certificate4-error" class="cstm-error-image-div"></div>
                                                       
                                                    </div>

                                                     <!-- <div class="col-md-3 col-sm-6">
                                                <div class="certificate-box">
                                                    <div class=" fz-16"><p>Right to work Document</p></div>
                                                    <div class="box">
                                                    <div class="js--image-preview certificate1-preview5" style="background-image:url('{{(isset($user->certificate5) && $user->certificate5!='null') ? asset(Auth::user()->certificate5) : 'images/Resgister-step/certificate1.png'}}');">
                                                           <a href="javascript:void(0)" class="remove_prev_image" onclick="myImgRemove(5)" style="display:none"><i class="fas fa-times"></i></a>
                                                    <div class="close-options">
                                                      
                                                        <input type="file" name="certificate5" class="image-upload certificate5" accept="image/png, image/jpg, image/jpeg,image/JPG, image/JPEG, image/PNG"  />
                                                     <label> </label>
                                                    </div>
                                                    </div>

                                                  </div>
                                                </div>
                                                <div id="certificate5-error" class="cstm-error-image-div"></div>
                                            </div> -->

                                                </div>
                                                
                                            </div>
                                            
                                            
                                </div>







                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
    <!-- End setting section -->
@endsection

@section('scripts')

<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
<script type="text/javascript">
 CKEDITOR.replace( 'about_us' );
</script>
@endsection 