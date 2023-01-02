    @extends('admin.layouts.layout')
@section('content')
<div class="dash-content-wrap">
	                   <form id="profile-form" method="POST" action="{{route('admin.pioneer.update',$user->_id)}}" enctype="multipart/form-data">
                                        @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="profile-picture-wrapper">
                                                <div class="profile-picture">
                                                    <h5 class="text-uppercase">Profile details</h5>
                                                    <div class="my-2 fz-16">Profile Picture</div>
                                                </div>
                                                <div class="wrapper br-10 mb-sm-4 mb-5 ">
                                                <div class="box">
                                                    <div class="js--image-preview" style="background-image:url('{{(isset($user->logo) && $user->logo!='null') ? asset($user->logo) : asset('admin/images/Resgister-step/certificate1.png')}}');">
													<div class="upload-options">
                                                      
                                                        <input type="file" name="logo" class="image-upload" accept="image/png, image/jpg, image/jpeg,image/JPG, image/JPEG, image/PNG"  />
                                                     <label> </label>
                                                    </div>
													</div>
                                                    
                                                  </div>
                                                  <div id="logo-error" class="cstm-error-image-div"></div>
                                                </div>                                        
                                            </div>
                                        </div>
                                        <div class="col-12 mt-4">
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
                                                    <label class="label">Sur Name</label>
                                                    <div class="input-icon-wrpper">
                                                        <input  type="text" class="form-control" id="last_name" placeholder="Sur Name"
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
                                              <div class="col-md-12">
                                                <label class="label">About Us</label>
                                                <div class="form-group icon-form ">
                                                    <div class="input-icon-wrpper1">
                                                        <textarea class="form-control " rows="8" placeholder="About Us" name="about_us" >{{(isset($user->about_us) && $user->about_us!='null') ? Auth::user()->about_us : '' }}</textarea>
                                                      
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="certificates">
                                                <div class="row wrapper">
                                                    <div class=" col-md-3 col-sm-6">
                                                        <div class="certificate-box"> 
                                                            <div class="fz-16"><p class="mb-3">CV</p></div>
                                                             <div class="box">
                                                    <div class="js--image-preview" style="background-image:url('{{(isset($user->certificate1) && $user->certificate1!='null') ? asset($user->certificate1) : asset('admin/images/Resgister-step/certificate1.png')}}');">
                                                    <div class="upload-options">
                                                      
                                                        <input type="file" class="image-upload" name="certificate1" accept="image/png, image/jpg, image/jpeg,image/JPG, image/JPEG, image/PNG" />
                                                      <label></label>
                                                    </div>
                                                    </div>
                                                  </div>
                                                  </div>
                                                     <div id="certificate1-error" class="cstm-error-image-div"></div>      
                                                        
                                                    </div>
                                                    <div class=" col-md-3 col-sm-6">
                                                    <div class="certificate-box"> 
                                                        
                                                    <div class="fz-16"><p class="mb-3">Right to work ID</p></div>
                                                             <div class="box">
                                                    <div class="js--image-preview" style="background-image:url('{{(isset($user->certificate2) && $user->certificate2!='null') ? asset($user->certificate2) : asset('admin/images/Resgister-step/certificate1.png')}}');">
													<div class="upload-options">
                                                      
                                                        <input type="file" class="image-upload" name="certificate2" accept="image/png, image/jpg, image/jpeg,image/JPG, image/JPEG, image/PNG" />
                                                      <label></label>
                                                    </div>
													</div>
                                                    </div>
                                                  </div>
                                                           
                                                          <div id="certificate2-error" class="cstm-error-image-div"></div> 
                                                    </div>
                                                    <div class=" col-md-3 col-sm-6">
                                                    <div class="certificate-box"> 
                                                    <div class="fz-16">   <p class="mb-3">DBS Certificate</p></div>
                                                            <div class="box">
                                                    <div class="js--image-preview" style="background-image:url('{{(isset($user->certificate3) && $user->certificate3!='null') ? asset($user->certificate3) : asset('admin/images/Resgister-step/certificate1.png')}}');">
													<div class="upload-options">
                                                      
                                                        <input type="file" class="image-upload" name="certificate3" accept="image/png, image/jpg, image/jpeg,image/JPG, image/JPEG, image/PNG" />
                                                      <label></label>
                                                    </div>
													</div>
                                                </div>
                                                  </div>
                                                          <div id="certificate3-error" class="cstm-error-image-div"></div> 
                                                    </div>
                                                    <div class=" col-md-3 col-sm-6 col-12">
                                                    <div class="certificate-box"> 
                                                    <div class="fz-16"><p class="mb-3">Security Clearance</p></div>
                                                           <div class="box">
                                                    <div class="js--image-preview" style="background-image:url('{{(isset($user->certificate4) && $user->certificate4!='null') ? asset($user->certificate4) : asset('admin/images/Resgister-step/certificate1.png')}}');">
													<div class="upload-options">
                                                      
                                                        <input type="file" class="image-upload" name="certificate4" accept="image/png, image/jpg, image/jpeg,image/JPG, image/JPEG, image/PNG" />
                                                      <label></label>
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
                                                    <div class="js--image-preview" style="background-image:url('{{(isset($user->certificate5) && $user->certificate5!='null') ? asset($user->certificate5) : asset('admin/images/Resgister-step/certificate1.png')}}');">
                                                        
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
                                                <div class="cstm-btn-group my-4">
                                                          <button type="submit" class="edit-btn btn popup-btn min200">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            
</div>


                                


@endsection


@section('scripts')
<script src="{{asset('custom/js/image-upload.js')}}"></script>
<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
<script type="text/javascript">
 CKEDITOR.replace( 'about_us' );
    $("#mobile_number,#utr_number").keypress(function(event) {
        return /\d/.test(String.fromCharCode(event.keyCode));
    });

 

   jQuery("form[id='profile-form']").validate({
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
        // case 'certificate5':
        //     error.appendTo("#certificate5-error");
        //     break;    
        
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
        //   'certificate5':{
        //    required:function(){
        //    const certificate5 = 'available';
        //     if(certificate5=='available'){
        //         return false;
        //     }else{
        //         return true;
        //     }
        // }, 
        //    extension: "jpg|jpeg|png|JPG|JPEG|PNG"
        // }
      
      
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
     },
     'certificate5': { 
        extension :"jpeg,png,jpg are allowed."
     }
     }
   });
</script>
@stop