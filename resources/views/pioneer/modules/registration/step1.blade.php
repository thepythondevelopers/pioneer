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
                    @if(session('message1'))
                                <div class="err-msg-wrap">
                                    <div class="alert alert-success alert-dismissible fade show text-left" role="alert">
                    {{session('message')}}
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                 </div>
                                 @endif   
                    @if(Auth::user()->email_verification==0)
                <div class="err-msg-wrap">
                                    <div class="alert alert-danger alert-dismissible fade show text-left" role="alert">
                    E-mail has been sent on your id for verification.
                                      
                                    </div>
                                 </div>
                                 @endif          
                    <form id="msform" class="register-step1" action="{{route('pioneer.register.step1.save')}}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="account"></li>
                            <li id="personal"></li>
                            <li id="payment"></li>
                            <!-- <li id="confirm"></li> -->
                        </ul>
                        <br>
                        <fieldset class=" step-card-inner shadow br-10">
                            <div class="form-card">
                                <div class="heading-wrapper text-center">
                                    <h3 class="heading after-line after-line-center">Complete Profile</h3>
                                </div>  
                                <div class="row mt-5">
                                    <div class="col-lg-3 col-md-4">
                                        <div class="profile-picture-wrapper wrapper">
                                            <div class="profile-picture">
                                                <h5>Profile Picture</h5>
                                            </div>
                                            <div class="box">
                                                    <div class="js--image-preview" style="background-image:url('{{(isset($user->logo) && $user->logo!='null') ? asset(Auth::user()->logo) : 'images/Resgister-step/certificate1.png'}}');">
                                                    <div class="close-options">
                                                     
                                                        <input type="file" name="logo" class="image-upload" accept="image/png, image/jpg, image/jpeg,image/JPG, image/JPEG, image/PNG"  />
                                                       <label></label>
                                                    </div>
                                                    </div>

                                                    
                                                  </div>
                                                  <div id="logo-error" class="cstm-error-image-div"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-9 mt-lg-0 mt-4">
                                        <div class="row">
                                        <div class="form-group col-md-6 mb-lg-4 mb-3">
                                                    <label class="label">First Name</label>
                                                    <div class="input-icon-wrpper">
                                                        <input  type="text" class="form-control" id="first_name" placeholder="First Name"
                                                name="first_name" value="{{$user->first_name}}" >
                                                     
                                                    </div>
                                                </div>
                                                <div class="form-group  col-md-6 mb-lg-4 mb-3">
                                                    <label class="label">Company</label>
                                                    <div class="input-icon-wrpper">
                                                        <input  type="text" class="form-control" id="company" placeholder="Company"
                                                name="company" value="{{$user->company}}" >
                                               
                                                    </div>
                                                </div>
                                                <div class="form-group  col-md-6 mb-lg-4 mb-3">
                                                    <label class="label">Surname</label>
                                                    <div class="input-icon-wrpper">
                                                        <input  type="text" class="form-control" id="last_name" placeholder="Surname"
                                                name="last_name" value="{{$user->last_name}}" >
                                               
                                                    </div>
                                                </div>
                                                <div class="form-group  col-md-6 mb-lg-4 mb-3">
                                                    <label class="label">Address1</label>
                                                    <div class="input-icon-wrpper">
                                                        <input  type="text" class="form-control" id="address1" placeholder="Address1"
                                                name="address1" value="{{$user->address1}}" >
                                               
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
                                                name="address2" value="{{$user->address2}}" >
                                               
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 mb-lg-4 mb-3">
                                                    <label class="label">Mobile Number</label>
                                                    <div class="input-icon-wrpper">
                                                        <input type="text" class="form-control" id="mobile_number" maxlength="10" placeholder="Mobile Number"
                                                name="mobile_number" value="{{(isset($user->mobile_number) && $user->mobile_number!='null') ? $user->mobile_number : ''}}" >
                                                <span class="tel-country-code">+44</span>
                                                  
                                                    </div>
                                                </div>
                                                <div class="form-group  col-md-6 mb-lg-4 mb-3">
                                                    <label class="label">Town/City</label>
                                                    <div class="input-icon-wrpper">
                                                        <input  type="text" class="form-control" id="town_city" placeholder="Town/City"
                                                name="town_city" value="{{$user->town_city}}" >
                                               
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                        <div class="form-group col-6 mb-lg-4 mb-3">
                                            <label class="label">National Insurance number</label>
                                            <div class="input-icon-wrpper">
                                                <input type="text"  class="form-control" id="national_insurance_number"  placeholder="National Insurance number"
                                                name="national_insurance_number" value="{{(isset($user->national_insurance_number) && $user->national_insurance_number!='null') ? $user->national_insurance_number : ''}}" >
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-lg-5 mb-md-4 mb-3">
                                                <label class="label">Postcode</label>
                                                    <div class="input-icon-wrpper" style="position:relative;">
                                                        <input type="text" class="form-control" id="postcode"  placeholder="Postcode"
                                                name="postcode" value="{{(isset($user->postcode) && $user->postcode!='null') ? $user->postcode : ''}}" >
                                                    </div>
                                                </div>
                                    </div>

                                    </div>
                                    <div class="form-group icon-form col-12 mb-lg-4 mb-3">
                                    <label class="label">About you/CV</label>
                                            <div class="input-icon-wrpper1">
                                                         <textarea class="form-control " rows="8" placeholder="About Us" name="about_us" >{{(isset($user->about_us) && $user->about_us!='null') ? Auth::user()->about_us : '' }}</textarea>
                                            </div>
                                        </div>
                                    <div class="certificates  wrapper">
                                        <div class="row">
                                            <div class="col-xl-3 col-md-4 col-sm-6">
                                                <div class="certificate-box">
                                                    <div class=" fz-16"><p>CV</p></div>
                                                    <div class="box">
                                                    <div class="js--image-preview" style="background-image:url('{{(isset($user->certificate1) && $user->certificate1!='null') ? asset(Auth::user()->certificate1) : 'images/Resgister-step/certificate1.png'}}');">
                                                        
                                                    <div class="close-options">
                                                      
                                                        <input type="file" name="certificate1" class="image-upload" accept="image/png, image/jpg, image/jpeg,image/JPG, image/JPEG, image/PNG"  />
                                                      <label></label>
                                                    </div>
                                                    </div>
                                                    
                                                    </div>
                                                </div>
                                                <div id="certificate1-error" class="cstm-error-image-div"></div>
                                            </div>
                                            <div class="col-xl-3 col-md-4 col-sm-6">
                                                <div class="certificate-box">
                                                    <div class=" fz-16"><p>Right to work ID</p></div>
                                                    <div class="box">
                                                    <div class="js--image-preview" style="background-image:url('{{(isset($user->certificate2) && $user->certificate2!='null') ? asset(Auth::user()->certificate2) : 'images/Resgister-step/certificate1.png'}}');">
                                                        
                                                    <div class="close-options">
                                                      
                                                        <input type="file" name="certificate2" class="image-upload" accept="image/png, image/jpg, image/jpeg,image/JPG, image/JPEG, image/PNG"  />
                                                      <label></label>
                                                    </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div id="certificate2-error" class="cstm-error-image-div"></div>
                                            </div>
                                            <div class="col-xl-3 col-md-4 col-sm-6">
                                                <div class="certificate-box">
                                                    <div class=" fz-16"><p>DBS Certificate</p></div>
                                                    <div class="box">
                                                    <div class="js--image-preview" style="background-image:url('{{(isset($user->certificate3) && $user->certificate3!='null') ? asset(Auth::user()->certificate3) : 'images/Resgister-step/certificate1.png'}}');">
                                                        
                                                    <div class="close-options">
                                                     
                                                        <input type="file" name="certificate3" class="image-upload" accept="image/png, image/jpg, image/jpeg,image/JPG, image/JPEG, image/PNG"  />
                                                       <label></label>
                                                    </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div id="certificate3-error" class="cstm-error-image-div"></div>
                                            </div>
                                            <div class="col-xl-3 col-md-4 col-sm-6">
                                                <div class="certificate-box">
                                                    <div class=" fz-16"><p>Security Clearance</p></div>
                                                    <div class="box">
                                                    <div class="js--image-preview" style="background-image:url('{{(isset($user->certificate4) && $user->certificate4!='null') ? asset(Auth::user()->certificate4) : 'images/Resgister-step/certificate1.png'}}');">
                                                        
                                                    <div class="close-options">
                                                      
                                                        <input type="file" name="certificate4" class="image-upload" accept="image/png, image/jpg, image/jpeg,image/JPG, image/JPEG, image/PNG"  />
                                                     <label> </label>
                                                    </div>
                                                    </div>

                                                  </div>
                                                </div>
                                                <div id="certificate4-error" class="cstm-error-image-div"></div>
                                            </div>
                                           <!--  <div class="col-xl-3 col-md-4 col-sm-6">
                                                <div class="certificate-box">
                                                    <div class=" fz-16"><p>Right to work Document</p></div>
                                                    <div class="box">
                                                    <div class="js--image-preview" style="background-image:url('{{(isset($user->certificate5) && $user->certificate5!='null') ? asset(Auth::user()->certificate5) : 'images/Resgister-step/certificate1.png'}}');">
                                                        
                                                    <div class="close-options">
                                                      
                                                        <input type="file" name="certificate5" class="image-upload" accept="image/png, image/jpg, image/jpeg,image/JPG, image/JPEG, image/PNG"  />
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
                            <div class="step-button">
                            
                            @if(Auth::user()->email_verification==0)
                             <button type="submit"  class="primary-btn next_verification">Next</button>
                             @else
                                <button type="submit"  class="primary-btn">Next</button>
                             @endif
                            </div>                           
                        </fieldset>

                    </form>
                </div>
                   
               
            </div>
        </div>
    </section>
@stop


@section('scripts')
<script src="{{asset('custom/js/image-upload.js')}}"></script>
<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
<script type="text/javascript">
 CKEDITOR.replace( 'about_us' );
    $("#mobile_number,#utr_number").keypress(function(event) {
        return /\d/.test(String.fromCharCode(event.keyCode));
    });

    $('body').on('click','.next_verification', function(e){
       e.preventDefault();
       window.scrollTo(0, 0);        
  });
 

   jQuery("form[class='register-step1']").validate({
        errorPlacement: function (error, element) {

    switch (element.attr("name")) {
        case  'logo':
            error.appendTo("#logo-error");
            break;
        case 'certificate1':
            error.appendTo("#certificate1-error");
            break;
        case 'certificate2':
            error.appendTo("#certificate2-error");
            break;
        case 'certificate3':
            error.appendTo("#certificate3-error");
            break;
        case 'certificate4':
            error.appendTo("#certificate4-error");
            break;
        case 'certificate5':
            error.appendTo("#certificate5-error");
            break;
        
        default:
            error.insertAfter(element);
    }
},
    rules: {
        'logo':{
            required:function(){
           const logo = '<?php echo isset($user->logo) && $user->logo!=null ? 'available' : '' ?>';
            if(logo=='available'){
                return false;
            }else{
                return true;
            }
        },
         //   required: true, 
             extension: "jpg|jpeg|png|JPG|JPEG|PNG"
        },
            'first_name':{
         required: true, 
         nowhitespace: true,
         minlength:3,
         maxlength:35
      },
      'last_name':{
         required: true,
        nowhitespace: true,
        minlength:3,
         maxlength:35
      },
      'mobile_number':{
         required: true,
        nowhitespace: true,
         maxlength:10
      },
      'company':{
         required: true,
        nowhitespace: true,
      },
    'address1':{
         required: true,
        nowhitespace: true,
      },
    'address2':{
         required: true,
        nowhitespace: true,
      },
            'town_city':{
         required: true,
        nowhitespace: true,
      },
            'national_insurance_number':{
         required: true,
        nowhitespace: true,
      },
              'postcode':{
                 required: true,
                nowhitespace: true,        
                 maxlength:35
        },
      'certificate1':{
           required:function(){
           const certificate1 = '<?php echo isset($user->certificate1) && $user->certificate1!=null ? 'available' : '' ?>';
            if(certificate1=='available'){
                return false;
            }else{
                return true;
            }
        }, 
           extension: "jpg|jpeg|png|JPG|JPEG|PNG"
        },
        'certificate2':{
           required:function(){
           const certificate2 = '<?php echo isset($user->certificate2) && $user->certificate2!=null ? 'available' : '' ?>';
            if(certificate2=='available'){
                return false;
            }else{
                return true;
            }
        }, 
           extension: "jpg|jpeg|png|JPG|JPEG|PNG"
        },
        'certificate3':{
           required:function(){
           const certificate3 = '<?php echo isset($user->certificate3) && $user->certificate3!=null ? 'available' : '' ?>';
            if(certificate3=='available'){
                return false;
            }else{
                return true;
            }
        }, 
           extension: "jpg|jpeg|png|JPG|JPEG|PNG"
        },
        'certificate4':{
           required:function(){
           const certificate4 = '<?php echo isset($user->certificate4) && $user->certificate4!=null ? 'available' : '' ?>';
            if(certificate4=='available'){
                return false;
            }else{
                return true;
            }
        }, 
           extension: "jpg|jpeg|png|JPG|JPEG|PNG"
        },
        'certificate5':{
           required:function(){
           const certificate5 = '<?php echo isset($user->certificate5) && $user->certificate5!=null ? 'available' : '' ?>';
            if(certificate5=='available'){
                return false;
            }else{
                return true;
            }
        }, 
           extension: "jpg|jpeg|png|JPG|JPEG|PNG"
        }
      
      
    },
        messages: {
      'logo': { 
        extension :"jpeg,png,jpg are allowed."
     },
     'certificate1': { 
        extension :"jpeg,png,jpg are allowed."
     },
     'certificate2': { 
        extension :"jpeg,png,jpg are allowed."
     },
     'certificate3': { 
        extension :"jpeg,png,jpg are allowed."
     },
     'certificate4': { 
        extension :"jpeg,png,jpg are allowed."
     }
     }
   });
</script>
@stop