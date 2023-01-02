@extends('pioneer.layouts.layout')



@section('content')
    <!-- Start setting section -->
    <section class="inner-banner bg">
    <div class="container container-1440 innercontent_wrp">
        <h2>Accounts</h2>
    </div>
 </section>
    <section class="setting-section p-40 ">
        <div class="container container-1440">
            <div class="sectting-inner">
                <div class="row">
                    <div class="col-12">
                        <div class="setting-tab nav nav-pills" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <!-- <div class="row"> -->
                            <!-- <div class="col-sm-4"> -->
                            <button class="nav-link" id="account-tab" data-bs-toggle="pill"
                                data-bs-target="#account" type="button" role="tab" aria-controls="account"
                                aria-selected="true">
                                Account
                            </button>
                            <!-- </div>
                            <div class="col-sm-4"> -->
                            <!-- <button class="nav-link" id="v-pills-bank-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-bank" type="button" role="tab"
                                aria-controls="v-pills-bank" aria-selected="false">
                                Payment
                            </button> -->
                            <!-- </div>
                            <div class="col-sm-4"> -->
                            <button class="nav-link" id="change-password-tab" data-bs-toggle="pill"
                                data-bs-target="#change-password" type="button" role="tab"
                                aria-controls="change-password" aria-selected="false">
                                Change Password
                            </button>
                            <!-- </div> -->
                        <!-- </div> -->
                        </div>
                    </div>

                    <div class="col-12"> 
                        <div class=" setting-tab_content steps-section shadow p-4 d-flex align-items-start br-10">
                            <div class="tab-content w-100" id="v-pills-tabContent">
                                <div class="tab-pane fade " id="account" role="tabpanel" aria-labelledby="account-tab">
                                    <form id="profile-form" data-action="{{route('pioneer.setting.profile.update')}}">
                                        @csrf
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
										<div class="edit-form ">
                                                        <button type="button" onclick="enable_disable()" id="edit_info">Edit Info</button>
                                                    </div>

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
                                                    <label class="label">Surname</label>
                                                    <div class="input-icon-wrpper">
                                                        <input  type="text" class="form-control" id="last_name" placeholder="Sur Name"
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
                                                <div class="form-group col-md-6 mb-lg-4 mb-3">
                                                    <label class="label">Mobile Number</label>
                                                    <div class="input-icon-wrpper">
                                                        <input type="text" class="form-control" id="mobile_number" maxlength="10" placeholder="Mobile Number"
                                                name="mobile_number" value="{{(isset($user->mobile_number) && $user->mobile_number!='null') ? $user->mobile_number : ''}}" disabled>
                                                <span class="tel-country-code" style="top:17px">+44</span>
                                                  
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
                                        <label class="label">About you/CV</label>
                                            <div class="input-icon-wrpper1">
                                                <textarea class="form-control " rows="8" placeholder="About Us" name="about_us" >{{(isset($user->about_us) && $user->about_us!='null') ? Auth::user()->about_us : '' }}</textarea>
                                            
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
                                                   <!--   <div class="col-md-3 col-sm-6">
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
											
                                            <div class="cstm-btn-group my-4" id="profile-submit" style="display: none;">
                                                          <button type="submit" class="edit-btn btn popup-btn min200">Submit</button>
                                                </div>
                                                </form>
                                </div>




                        <!-- Change Password -->

                                <div class="tab-pane fade" id="change-password" role="tabpanel"
                                    aria-labelledby="change-password-tab">
                                    <h5>Change Password</h5>
                                     <form id="change-password-form" data-action="{{route('pioneer.setting.password.change')}}">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-12  mb-3">
                                            <label class="label">Old Password</label>
                                                <div class="input-icon-wrpper">
                                                    <input type="password" class="form-control" id="old_password" placeholder="Old Password" name="old_password" >
                                               
                                                </div>
                                            </div>
                                            <div class="form-group col-12 mb-3">
                                            <label class="label">New Password</label>
                                                <div class="input-icon-wrpper">
                                                    <input type="password" class="form-control" id="new_password" placeholder="New Password" name="new_password" >
                                                
                                                </div>
                                            </div>
                                            <div class="form-group col-12  mb-3">
                                            <label class="label">Confirm Password</label>
                                                <div class="input-icon-wrpper">
                                                    <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" name="confirm_password" >
                                                  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cstm-btn-group my-3">
                                            <button type="submit" class="edit-btn btn popup-btn min200">Submit</button>
                                        </div>
                                     </form>
                                
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
<script src="{{asset('custom/js/image-upload.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>


<script type="text/javascript">
    CKEDITOR.replace( 'about_us' );


 function myImgRemove(number) {
    swal({
  title: "Are you sure?",
  text: "Want to remove.",
  icon: "warning",
  buttons: true,
  dangerMode: true,
   buttons: ["No, cancel it!",'Yes, I am sure!']
})
.then((willDelete) => {
  if (willDelete) {
        var imageUrl = "<?php echo asset('destination/images/Resgister-step/certificate1.png') ?>";
        $(".certificate1-preview"+number).css("background-image", "url(" + imageUrl + ")");      
        $(".certificate"+number).value = null;

        imageRemove("certificate"+number);
  } else {
    
  }
});

    }

function enable_disable() {
    if($("input[name='first_name']").is(':disabled')){
        $("#profile-form :input,.textarea").prop('disabled', false);        
        $("#email").prop('disabled', true);
        $("#edit_info").text("Cancel");
        $("#profile-submit").show();
        $(".remove_prev_image").show();
    }else{
        $("#profile-form :input,.textarea").prop('disabled', true);
        $("#edit_info").prop('disabled', false);
        $("#edit_info").text("Edit Info");
        $("#profile-submit").hide();
        $(".remove_prev_image").hide();
    }
}

$("#mobile_number,#utr_number").keypress(function(event) {
        return /\d/.test(String.fromCharCode(event.keyCode));
    });
    
    $(document).ready(function() {
        tab_active();
});

function tab_active(){
      var hash = window.location.hash;
 $('.setting-tab button').removeClass('active');
    $('.tab-content .tab-pane').removeClass('show active');
  if(hash==''){
    $("#account-tab").addClass('active');
   $("#account").addClass('show active'); 
  }else{
   $(hash+"-tab").addClass('active');
   $(hash).addClass('show active'); 
}
}

$(".dropdown-item").click(function(){
    setTimeout(function() { tab_active(); }, 1000);
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
/*            'about_us':{
         required: true,
        nowhitespace: true,
      },*/


              'postcode':{
                 required: true,
                nowhitespace: true,        
                 maxlength:35
        },



      'certificate1':{
        //    required:function(){
        //    const certificate1 = '<?php echo isset($user->certificate1) && $user->certificate1!=null ? 'available' : '' ?>';
        //     if(certificate1=='available'){
        //         return false;
        //     }else{
        //         return true;
        //     }
        // }, 
           extension: "jpg|jpeg|png|JPG|JPEG|PNG"
        },
        'certificate2':{
        //    required:function(){
        //    const certificate2 = '<?php echo isset($user->certificate2) && $user->certificate2!=null ? 'available' : '' ?>';
        //     if(certificate2=='available'){
        //         return false;
        //     }else{
        //         return true;
        //     }
        // }, 
           extension: "jpg|jpeg|png|JPG|JPEG|PNG"
        },
        'certificate3':{
        //    required:function(){
        //    const certificate3 = '<?php echo isset($user->certificate3) && $user->certificate3!=null ? 'available' : '' ?>';
        //     if(certificate3=='available'){
        //         return false;
        //     }else{
        //         return true;
        //     }
        // }, 
           extension: "jpg|jpeg|png|JPG|JPEG|PNG"
        },
        'certificate4':{
        //    required:function(){
        //    const certificate4 = '<?php echo isset($user->certificate4) && $user->certificate4!=null ? 'available' : '' ?>';
        //     if(certificate4=='available'){
        //         return false;
        //     }else{
        //         return true;
        //     }
        // }, 
           extension: "jpg|jpeg|png|JPG|JPEG|PNG"
        },
        // 'certificate5':{
        //    required:function(){
        //    const certificate5 = '<?php echo isset($user->certificate5) && $user->certificate5!=null ? 'available' : '' ?>';
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
     /*'certificate5': { 
        extension :"jpeg,png,jpg are allowed."
     }*/
     }
   });

   jQuery("form[id='change-password-form']").validate({
    rules: {
      'old_password':{
            required: true,
            nowhitespace: true,
            minlength: 8,
            maxlength:35 
        }, 
        'new_password':{
            required: true,
            nowhitespace: true,
            minlength: 8,
            maxlength:35  
        }, 
        'confirm_password':{
            required: true,
            nowhitespace: true,
            minlength: 8,
            maxlength:35,
            equalTo: "#new_password"
        }
    }
   });










 $('body').on('submit','#profile-form', function(e){
       e.preventDefault();
       submitForm();
  });

function submitForm() {
        var form = $('body').find('#profile-form')[0]; 
        var formData = new FormData(form);
        var $this = $('body').find('#profile-form');
        $.ajax({
           url:$this.attr('data-action'),
           method:"POST",
           data:formData,
           dataType:'JSON',
           contentType: false,
           cache: false,
           processData: false,
           beforeSend: function() {
                 $this.find('button').attr('disabled','true');

          },
           xhr: function () {
           var xhr = new window.XMLHttpRequest();
            xhr.upload.addEventListener("progress", function (evt) {

            }, false);
            return xhr;
          },
           success:function(data)
           {
                $this.find('button').removeAttr('disabled');
                if(data.status==1){
                    $("#change-password-form")[0].reset();
                    message = data.message;
                    toastr.success(message);
                    enable_disable();
                }
           }

          });
}


$('body').on('submit','#change-password-form,#payment-form,#bank_details', function(e){
       e.preventDefault();
       paswordForm($(this));
  });

function paswordForm($this){
    
$.ajax({
                url : $this.attr('data-action'),
                type: 'POST',  
                data:$this.serialize(),     
                dataTYPE:'JSON',
                headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
                },
                beforeSend: function() {
                  $this.find('button').attr('disabled','true');                          
                },
                success: function (data) {                                   
                    $this.find('button').removeAttr('disabled');
                  if(data.status==0){
                        message = data.message;
                        toastr.error(message);
                    }else if(data.status==1){
                        $("#change-password-form")[0].reset();
                        message = data.message;
                        toastr.success(message);
                    }
                },
                complete: function(result) {

                    
                },
                error: function (jqXhr, textStatus, errorMessage) {
                     
                }

        });     
}    

function imageRemove(type){
    
$.ajax({
                url : "{{route('pioneer.setting.image.remove')}}",
                type: 'POST',  
                data:{type : type},     
                dataTYPE:'JSON',
                headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
                },
                beforeSend: function() {
                 // $this.find('button').attr('disabled','true');                          
                },
                success: function (data) {                                   
                 //   $this.find('button').removeAttr('disabled');
                  if(data.status==0){
                        message = data.message;
                        toastr.error(message);
                    }else if(data.status==1){
                        
                        message = data.message;
                        toastr.success(message);
                    }
                },
                complete: function(result) {

                    
                },
                error: function (jqXhr, textStatus, errorMessage) {
                     
                }

        });     
}
</script>
@stop