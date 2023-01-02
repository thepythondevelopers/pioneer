@extends('pioneer.layouts.layout')



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
                    

                    <div class="col-12"> 
                        <div class=" setting-tab_content steps-section shadow p-4 d-flex align-items-start br-10">

                            
                                <div class="tab-pane  " id="account" role="tabpanel" aria-labelledby="account-tab">

                                    
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
                                                    <div class="input-icon-wrpper">
                                                        <label class="label">First Name</label>
                                                        <input  type="text" class="form-control" id="first_name" placeholder="First Name"
                                                name="first_name" value="{{$user->first_name}}" disabled>
                                                     
                                                    </div>
                                                </div>
                                                <div class="form-group  col-md-6 mb-lg-4 mb-3">
                                                    <div class="input-icon-wrpper">
                                                    <label class="label">Surname</label>
                                                        <input  type="text" class="form-control" id="last_name" placeholder="Surname"
                                                name="last_name" value="{{$user->last_name}}" disabled>
                                               
                                                    </div>
                                                </div>
                                               
                                                <div class="form-group col-md-6 mb-lg-5 mb-md-4 mb-3">
                                                <label class="label">Main Phone Number</label>
                                                    <div class="input-icon-wrpper" style="position:relative;">
                                                   
                                                        <input type="text" class="form-control" id="mobile_number" maxlength="10" placeholder="Mobile Number"
                                                name="mobile_number" value="{{(isset($user->mobile_number) && $user->mobile_number!='null') ? $user->mobile_number : ''}}" disabled>
                                                <span class="tel-country-code" style="top:17px">+44</span>
                                                  
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 mb-lg-5 mb-md-4 mb-3">
                                            <div class="input-icon-wrpper">
                                            <label class="label">Company</label>
                                                <input type="text" class="form-control" id="company_name" placeholder="Company"
                                                name="company" value="{{(isset($user->company) && $user->company!='null') ? $user->company : ''}}" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-lg-5 mb-md-4 mb-3">
                                                <label class="label">Website Address</label>
                                                    <div class="input-icon-wrpper" style="position:relative;">
                                                        <input type="text" class="form-control" id="website_address"  placeholder="Website Address"
                                                name="website_address" value="{{(isset($user->website_address) && $user->website_address!='null') ? $user->website_address : ''}}" disabled>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6 mb-lg-5 mb-md-4 mb-3">
                                                <label class="label">Address1</label>
                                                    <div class="input-icon-wrpper" style="position:relative;">
                                                        <input type="text" class="form-control" id="address1"  placeholder="Address1"
                                                name="address1" value="{{(isset($user->address1) && $user->address1!='null') ? $user->address1 : ''}}" disabled>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6 mb-lg-5 mb-md-4 mb-3">
                                                <label class="label">Main Contact Name</label>
                                                    <div class="input-icon-wrpper" style="position:relative;">
                                                        <input type="text" class="form-control" id="main_contact_name"  placeholder="Main Contact Name"
                                                name="main_contact_name" value="{{(isset($user->main_contact_name) && $user->main_contact_name!='null') ? $user->main_contact_name : ''}}" disabled>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6 mb-lg-5 mb-md-4 mb-3">
                                                <label class="label">Address2</label>
                                                    <div class="input-icon-wrpper" style="position:relative;">
                                                        <input type="text" class="form-control" id="address2"  placeholder="Address2"
                                                name="address2" value="{{(isset($user->address2) && $user->address2!='null') ? $user->address2 : ''}}" disabled>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6 mb-lg-5 mb-md-4 mb-3">
                                                    <div class="input-icon-wrpper">
                                                    <label class="label">Main Contact Email</label>
                                                        <input  type="text" class="form-control" id="email" placeholder="Main Contact Email"
                                                name="email" value="{{$user->email}}" disabled>
                                                
                                                    </div>
                                                </div>
                                               
                                               <div class="form-group col-md-6 mb-lg-5 mb-md-4 mb-3">
                                                <label class="label">Town/City</label>
                                                    <div class="input-icon-wrpper" style="position:relative;">
                                                        <input type="text" class="form-control" id="town_city"  placeholder="Town/City"
                                                name="town_city" value="{{(isset($user->town_city) && $user->town_city!='null') ? $user->town_city : ''}}" disabled>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6 mb-lg-5 mb-md-4 mb-3">
                                                <label class="label">Finance Name</label>
                                                    <div class="input-icon-wrpper" style="position:relative;">
                                                        <input type="text" class="form-control" id="finance_name"  placeholder="Finance Name" name="finance_name" value="{{(isset($user->finance_name) && $user->finance_name!='null') ? $user->finance_name : ''}}" disabled>
                                                    </div>
                                                </div>  

                                                <div class="form-group col-md-6 mb-lg-5 mb-md-4 mb-3">
                                                <label class="label">Country</label>
                                                    <div class="input-icon-wrpper" style="position:relative;">
                                                        <input type="text" class="form-control" id="country"  placeholder="Country"
                                                name="country" value="{{(isset($user->country) && $user->country!='null') ? $user->country : ''}}" disabled>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6 mb-lg-5 mb-md-4 mb-3">
                                                <label class="label">Finance Email</label>
                                                    <div class="input-icon-wrpper" style="position:relative;">
                                                        <input type="text" class="form-control" id="finance_email"  placeholder="Finance Email"
                                                name="finance_email" value="{{(isset($user->finance_email) && $user->finance_email!='null') ? $user->finance_email : ''}}" disabled>
                                                    </div>
                                                </div>                                        
                                        
                                                <div class="form-group col-md-6 mb-lg-5 mb-md-4 mb-3">
                                                <label class="label">Postcode</label>
                                                    <div class="input-icon-wrpper" style="position:relative;">
                                                        <input type="text" class="form-control" id="postcode"  placeholder="Postcode"
                                                name="postcode" value="{{(isset($user->postcode) && $user->postcode!='null') ? $user->postcode : ''}}" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group icon-form col-12 mb-lg-4 mb-3">
                                            <div class="input-icon-wrpper1">
                                            <label class="label">About you/CV</label>
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
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="certificate-box">
                                                            
                                                            <div class=" fz-16"><p>Employers Liability Insurance</p></div>
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


                                                    <div class="col-lg-3 col-sm-6">
                                                    <div class="certificate-box">
                                                            <div class="fz-16"><p>Health & Safety</p></div>
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


                                                    <div class="col-lg-3 col-sm-6">
                                                     
                                                    <div class="certificate-box"> 
                                                            <div class=" fz-16"><p>CHAS</p></div>
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
                                                    
                                                    <div class="col-lg-3 col-sm-6">
                                                    <div class="certificate-box">    
                                                        <div class=" fz-16"><p>ISO</p></div>
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