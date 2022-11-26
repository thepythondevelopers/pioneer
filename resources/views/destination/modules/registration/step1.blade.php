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
                                    <div class="alert alert-{{session('message_type')}} alert-dismissible fade show text-left" role="alert">
                    {{session('message')}}
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                 </div>
                                 @endif   
                    
                    @if(Auth::user()->email_verification==0)
                                <div class="err-msg-wrap">
                                    <div class="alert alert-danger alert-dismissible fade show text-left" role="alert">
                    E-mail has been sent on your id for verification.
                                      <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                                    </div>
                                 </div>
                                 @endif    
                    
                    
                    <form id="msform" class="register-step1" action="{{route('destination.register.step1.save')}}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="account"></li>
                            <li id="personal"></li>
                            <li id="payment"></li>
                            <!-- <li id="confirm"></li> -->
                        </ul>
                        <br>
                        <fieldset class=" step-card-inner shadow br-10 step-button">
                            <div class="form-card">
                                <div class="heading-wrapper text-center">
                                    <h3 class="heading after-line after-line-center">Complete Profile</h3>
                                </div>  
                                <div class="row mt-5">
                                    <div class="col-lg-3 col-md-4">
                                        <div class="profile-picture-wrapper">
                                            <div class="profile-picture">
                                                <h5>DESTINATION LOGO</h5>
                                            </div>
                                            <div class="wrapper br-10 mb-sm-4 mb-3 mt-sm-4 mt-3">
                                            <div class="box">
                                                    <div class="js--image-preview" style="background-image:url('{{(isset($user->logo) && $user->logo!='null') ? asset(Auth::user()->logo) : 'images/Resgister-step/certificate1.png'}}');">
                                                    <div class="close-options">
                                                     
                                                        <input type="file" name="logo" class="image-upload" accept="image/png, image/jpg, image/jpeg,image/JPG, image/JPEG, image/PNG" />
                                                       <label></label>
                                                    </div>
                                                    </div>

                                                    
                                                  </div>
                                                  <div id="logo-error" class="cstm-error-image-div"></div>
                                                  
                                                </div>
                                        </div>

                                    </div>

                                    <div class="col-lg-9 mt-lg-0 mt-4">
                                        <div class="row">
                                        <div class="form-group col-md-6 mb-lg-5 mb-md-4 mb-3">
                                            <div class="input-icon-wrpper">
                                                <input  type="text" class="form-control" id="first_name" placeholder="First Name"
                                                name="first_name" value="{{$user->first_name}}">
                                            </div>
                                        </div>
                                        <div class="form-group  col-md-6 mb-lg-5 mb-md-4 mb-3">
                                            <div class="input-icon-wrpper">
                                                <input  type="text" class="form-control" id="last_name" placeholder="Last Name"
                                                name="last_name" value="{{$user->last_name}}">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 mb-lg-5 mb-md-4 mb-3">
                                            <div class="input-icon-wrpper">
                                                <input  type="text" class="form-control" id="email" placeholder="Email Id"
                                                name="email" value="{{$user->email}}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 mb-lg-5 mb-md-4 mb-3">
                                            <div class="input-icon-wrpper">
                                                <input type="text" class="form-control" id="mobile_number" maxlength="10" placeholder="Mobile Number"
                                                name="mobile_number" value="{{(isset($user->mobile_number) && $user->mobile_number!='null') ? $user->mobile_number : ''}}">
                                                <span class="tel-country-code">+44</span>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 mb-lg-5 mb-md-4 mb-3">
                                            <div class="input-icon-wrpper">
                                                <input type="text" class="form-control" id="company_name" placeholder="Company Name"
                                                name="company_name" value="{{(isset($user->company_name) && $user->company_name!='null') ? $user->company_name : ''}}">
                                            </div>
                                            
                                        </div>
                                        <div class="form-group col-md-6 mb-lg-5 mb-md-4 mb-3">
                                            <div class="input-icon-wrpper">
                                                <input type="text" class="form-control" id="vat_number" maxlength="9" placeholder="VAT Number"
                                                name="vat_number" value="{{(isset($user->vat_number) && $user->vat_number!='null') ? $user->vat_number : ''}}">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 mb-lg-5 mb-md-4 mb-3">
                                            <div class="input-icon-wrpper">
                                                <input type="text" class="form-control" id="company_number" maxlength="10" placeholder="Phone Number"
                                                name="company_number" value="{{(isset($user->company_number) && $user->company_number!='null') ? $user->company_number : ''}}">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 mb-lg-5 mb-md-4 mb-3">
                                            <div class="input-icon-wrpper">
                                                <input type="text" class="form-control" id="trading" placeholder="Trading Name"
                                                name="trading" value="{{(isset($user->trading) && $user->trading!='null') ? $user->trading : ''}}">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-lg-5 mb-md-4 mb-3">
                                            <div class="input-icon-wrpper">
                                                <input type="text" class="form-control" id="title" placeholder="Title"
                                                name="title" value="{{(isset($user->title) && $user->title!='null') ? $user->title : ''}}">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 mb-lg-5 mb-md-4 mb-3">
                                            <div class="input-icon-wrpper">
                                                <input type="text" class="form-control" id="position" placeholder="Position"
                                                name="position" value="{{(isset($user->position) && $user->position!='null') ? $user->position : ''}}">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 mb-lg-5 mb-md-4 mb-3">
                                            <div class="input-icon-wrpper">
                                                <input type="text" class="form-control" id="website" placeholder="Website"
                                                name="website" value="{{(isset($user->website) && $user->website!='null') ? $user->website : ''}}">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 mb-lg-5 mb-md-4 mb-3">
                                            <div class="input-icon-wrpper">
                                                <input type="text" class="form-control" id="billing_address" placeholder="Billing Address"
                                                name="billing_address" value="{{(isset($user->billing_address) && $user->billing_address!='null') ? $user->billing_address : ''}}">
                                            </div>
                                        </div>
                                        

                                    </div>
                                    <div class="certificates mt-4 mt-sm-3">
                                        <div class="row wrapper">
                                            <div class="col-lg-3 col-sm-6">
                                              <div class="certificate-box">
                                              <div class=" fz-16"><p>Insurance Document</p></div>
                                              <div class="box">
                                                    <div class="js--image-preview" style="background-image:url('{{(isset($user->certificate1) && $user->certificate1!='null') ? asset(Auth::user()->certificate1) : 'images/Resgister-step/certificate1.png'}}');">
                                                
                                                    <div class="close-options">
                                                      
                                                        <input type="file" name="certificate1" class="image-upload" accept="image/png, image/jpg, image/jpeg,image/JPG, image/JPEG, image/PNG"  />
                                                      <label></label>
                                                    </div>
                                                    </div>
                                                    
                                                    </div>
                                                <div id="certificate1-error" class="cstm-error-image-div"></div>
                                            </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                              <div class="certificate-box">
                                              <div class=" fz-16"><p>Certificate 1</p></div>
                                              <div class="box">
                                                    <div class="js--image-preview" style="background-image:url('{{(isset($user->certificate2) && $user->certificate2!='null') ? asset(Auth::user()->certificate2) : 'images/Resgister-step/certificate1.png'}}');">
                                                
                                                    <div class="close-options">
                                                      
                                                        <input type="file" name="certificate2" class="image-upload" accept="image/png, image/jpg, image/jpeg,image/JPG, image/JPEG, image/PNG"  />
                                                      <label></label>
                                                    </div>
                                                    </div>
                                                    </div>
                                                <div id="certificate2-error" class="cstm-error-image-div"></div>
                                            </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="certificate-box">
                                              <div class=" fz-16"><p>Certificate 2</p></div>
                                                <div class="box">
                                                    <div class="js--image-preview" style="background-image:url('{{(isset($user->certificate3) && $user->certificate3!='null') ? asset(Auth::user()->certificate3) : 'images/Resgister-step/certificate1.png'}}');">
                                                
                                                    <div class="close-options">
                                                     
                                                        <input type="file" name="certificate3" class="image-upload" accept="image/png, image/jpg, image/jpeg,image/JPG, image/JPEG, image/PNG"  />
                                                       <label></label>
                                                    </div>
                                                    </div>
                                                    </div>
                                                <div id="certificate3-error" class="cstm-error-image-div"></div>
                                            </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="certificate-box">
                                              <div class=" fz-16"><p>certificate3</p></div>
                                                
                                                  <div class="box">
                                                    <div class="js--image-preview" style="background-image:url('{{(isset($user->certificate4) && $user->certificate4!='null') ? asset(Auth::user()->certificate4) : 'images/Resgister-step/certificate1.png'}}');">
                                                        
                                                    <div class="close-options">
                                                      
                                                        <input type="file" name="certificate4" class="image-upload" accept="image/png, image/jpg, image/jpeg,image/JPG, image/JPEG, image/PNG"  />
                                                     <label> </label>
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
                            
                             @if(Auth::user()->email_verification==0)
                             <button type="submit"  class="primary-btn next_verification">Next</button>
                             @else
                                <button type="submit"  class="primary-btn">Next</button>
                             @endif

                        </fieldset>

                        
                    </form>
                </div>
                   
               
            </div>
        </div>
    </section>
@stop


@section('scripts')
<script src="{{asset('custom/js/image-upload.js')}}"></script>
<script type="text/javascript">
    



    $('body').on('click','.next_verification', function(e){
       e.preventDefault();
       window.scrollTo(0, 0);        
  });      

    $("#mobile_number,#vat_number,#company_number").keypress(function(event) {
        return /\d/.test(String.fromCharCode(event.keyCode));
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
      'company_name':{
         required: true,
        nowhitespace: true,
         maxlength:35
      },

      'title':{
         required: true,
        nowhitespace: true,
         maxlength:35
      },
      'position':{
         required: true,
        nowhitespace: true,
         maxlength:35
      },
      'website':{
         required: true,
        nowhitespace: true,
         maxlength:35
      },
      'billing_address':{
         required: true,
        nowhitespace: true,
         maxlength:35
      },
      'company_number':{
         required: true,
        nowhitespace: true,
        maxlength:10
      },

      'vat_number':{
         required: true,
        nowhitespace: true,
        minlength:9,
         maxlength:9
      },
      'trading':{
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
           /*required:function(){
           const certificate3 = '<?php echo isset($user->certificate3) && $user->certificate3!=null ? 'available' : '' ?>';
            if(certificate3=='available'){
                return false;
            }else{
                return true;
            }
        }, */
           extension: "jpg|jpeg|png|JPG|JPEG|PNG"
        },
        'certificate4':{
           /*required:function(){
           const certificate4 = '<?php echo isset($user->certificate4) && $user->certificate4!=null ? 'available' : '' ?>';
            if(certificate4=='available'){
                return false;
            }else{
                return true;
            }
        },*/ 
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