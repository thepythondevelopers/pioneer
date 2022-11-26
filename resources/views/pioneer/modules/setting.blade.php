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
            <div class="sectting-inner shadow br-10 py-3 px-3">
                <div class="row">
                    <div class="col-md-3">
                        <div class="setting-tab nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <button class="nav-link" id="account-tab" data-bs-toggle="pill"
                                data-bs-target="#account" type="button" role="tab" aria-controls="account"
                                aria-selected="true">
                                <!-- <span><img src="images/icons/setting-user.png" alt="text"></span> -->Account
                            </button>

                            <button class="nav-link" id="about-us-tab" data-bs-toggle="pill"
                                data-bs-target="#about" type="button" role="tab"
                                aria-controls="about" aria-selected="false">
                                <!-- <span><img src="images/icons/setting-about.png" alt="text"></span> -->About Us
                            </button>

                            <button class="nav-link" id="v-pills-bank-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-bank" type="button" role="tab"
                                aria-controls="v-pills-bank" aria-selected="false">
                                <!-- <span><img src="images/icons/bank.png" alt="text"></span> -->Bank Details
                            </button>

                            <button class="nav-link" id="v-pills-payment-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-payment" type="button" role="tab"
                                aria-controls="v-pills-payment" aria-selected="false">
                                <!-- <span><img src="images/icons/payment.png" alt="text"></span> -->Payment
                            </button>

                            <button class="nav-link" id="change-password-tab" data-bs-toggle="pill"
                                data-bs-target="#change-password" type="button" role="tab"
                                aria-controls="change-password" aria-selected="false">
                                <!-- <span><img src="images/icons/setting-pwd.png" alt="text"></span> -->Change Password
                            </button>

                            <button class="nav-link" id="terms-condition-tab" data-bs-toggle="pill"
                                data-bs-target="#terms-condition" type="button" role="tab"
                                aria-controls="terms-condition" aria-selected="false">
                                <!-- <span><img src="images/icons/setting-term.png" alt="text"></span> -->Terms & Conditions
                            </button>

                            <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="modal" data-bs-target="#logout" type="button">
                                <!-- <span><img src="images/icons/exit-b.png" alt="text"></span> -->Logout
                            </button>
                        </div>
                    </div>

                    <div class="col-md-9">
 
                        <div class=" setting-tab_content steps-section shadow p-4 d-flex align-items-start br-10">
                            <div class="tab-content" id="v-pills-tabContent">
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
                                                    <div class="input-icon-wrpper">
                                                        <input  type="text" class="form-control" id="first_name" placeholder="First Name"
                                                name="first_name" value="{{$user->first_name}}" disabled>
                                                     
                                                    </div>
                                                </div>
                                                <div class="form-group  col-md-6 mb-lg-4 mb-3">
                                                    <div class="input-icon-wrpper">
                                                        <input  type="text" class="form-control" id="last_name" placeholder="Last Name"
                                                name="last_name" value="{{$user->last_name}}" disabled>
                                               
                                                    </div>
                                                </div>
                                               
                                                <div class="form-group col-md-6 mb-lg-4 mb-3">
                                                    <div class="input-icon-wrpper">
                                                        <input type="text" class="form-control" id="mobile_number" maxlength="10" placeholder="Mobile Number"
                                                name="mobile_number" value="{{(isset($user->mobile_number) && $user->mobile_number!='null') ? $user->mobile_number : ''}}" disabled>
                                                <span class="tel-country-code">+44</span>
                                                  
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 mb-lg-5 mb-md-4 mb-3">
                                            <div class="input-icon-wrpper">
                                                <input type="date"  onclick="this.showPicker()" class="form-control" id="cname" max="<?php echo date("Y-m-d"); ?>" placeholder="Date of Birth"
                                                name="dob" value="{{(isset($user->dob) && $user->dob!='null') ? $user->dob : ''}}" disabled>
                                          
                                            </div>
                                        </div>
                                                <div class="form-group col-12 mb-lg-4 mb-3">
                                                    <div class="input-icon-wrpper">
                                                        <input  type="text" class="form-control" id="email" placeholder="Email Id"
                                                name="email" value="{{$user->email}}" disabled>
                                                
                                                    </div>
                                                </div>
                                                <div class="form-group icon-form col-md-12 mb-lg-4 mb-3">
                                                    <div class="input-icon-wrpper">
                                                        <textarea class="form-control textarea" placeholder="Address" disabled>{{(isset($user->address) && $user->address!='null') ? Auth::user()->address : '' }}</textarea>
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                                                                 
                                        </div>
                                    </div>
                                
								<div class="certificates">
                                                <div class="row wrapper">
                                                    <div class="col-md-3 col-sm-6">
                                                        <div class="certificate-box">
                                                            
                                                            <div class=" fz-16"><p>Driving Licence</p></div>
                                                             <div class="box">
                                                    <div class="js--image-preview" style="background-image:url('{{(isset($user->certificate1) && $user->certificate1!='null') ? asset(Auth::user()->certificate1) : 'images/Resgister-step/certificate1.png'}}');">
                                                        <a href="javascript:void(0)" class="remove_prev_image" onclick="myImgRemove(1)" style="display:none"><i class="fas fa-times"></i></a>
													<div class="close-options">
                                                      
                                                        <input type="file" name="certificate1" class="image-upload" accept="image/png, image/jpg, image/jpeg,image/JPG, image/JPEG, image/PNG" disabled />
                                                      <label></label>
                                                    </div>
													</div>
                                                    
                                                    </div>
                                                  </div>
                                                  <div id="certificate1-error" class="cstm-error-image-div"></div>
                                                          

                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                    <div class="certificate-box">
                                                            <div class="fz-16"><p>Insurance Certificate</p></div>
                                                             <div class="box">
                                                    <div class="js--image-preview" style="background-image:url('{{(isset($user->certificate2) && $user->certificate2!='null') ? asset(Auth::user()->certificate2) : 'images/Resgister-step/certificate1.png'}}');">
                                                        <a href="javascript:void(0)" class="remove_prev_image" onclick="myImgRemove(2)" style="display:none"><i class="fas fa-times"></i></a>
													<div class="close-options">
                                                      
                                                        <input type="file" name="certificate2" class="image-upload" accept="image/png, image/jpg, image/jpeg,image/JPG, image/JPEG, image/PNG" disabled />
                                                      <label></label>
                                                    </div>
													</div>
                                                    </div>
                                                  </div>
                                                      <div id="certificate2-error" class="cstm-error-image-div"></div>     
                                                      
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                     
                                                    <div class="certificate-box"> 
                                                            <div class=" fz-16"><p>Public Liability Certificate</p></div>
                                                            <div class="box">
                                                    <div class="js--image-preview" style="background-image:url('{{(isset($user->certificate3) && $user->certificate3!='null') ? asset(Auth::user()->certificate3) : 'images/Resgister-step/certificate1.png'}}');">
                                                        <a href="javascript:void(0)" class="remove_prev_image" onclick="myImgRemove(3)" style="display:none"><i class="fas fa-times"></i></a>
													<div class="close-options">
                                                     
                                                        <input type="file" name="certificate3" class="image-upload" accept="image/png, image/jpg, image/jpeg,image/JPG, image/JPEG, image/PNG" disabled />
                                                       <label></label>
                                                    </div>
													</div>
                                                    </div>
                                                  </div>
                                                  <div id="certificate3-error" class="cstm-error-image-div"></div>
                                                        
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                    <div class="certificate-box">    
                                                        <div class=" fz-16"><p>DBS Certificate</p></div>
                                                           <div class="box">
                                                    <div class="js--image-preview" style="background-image:url('{{(isset($user->certificate4) && $user->certificate4!='null') ? asset(Auth::user()->certificate4) : 'images/Resgister-step/certificate1.png'}}');">
                                                        <a href="javascript:void(0)" class="remove_prev_image" onclick="myImgRemove(4)" style="display:none"><i class="fas fa-times"></i></a>
													<div class="close-options">
                                                      
                                                        <input type="file" name="certificate4" class="image-upload" accept="image/png, image/jpg, image/jpeg,image/JPG, image/JPEG, image/PNG" disabled />
                                                     <label> </label>
                                                    </div>
													</div>

                                                  </div>
                                                  </div>
                                                  <div id="certificate4-error" class="cstm-error-image-div"></div>
                                                       
                                                    </div>
                                                </div>
                                                
                                            </div>
											
                                            <div class="cstm-btn-group my-4" id="profile-submit" style="display: none;">
                                                          <button type="submit" class="edit-btn btn popup-btn min200">Submit</button>
                                                </div>
                                                </form>
                                </div>



                                <div class="tab-pane fade" id="about" role="tabpanel"
                                    aria-labelledby="about-us-tab">
                                    <h5 class="heading grey-line ">{{$about->title}}</h5>
                                    {!! $about->content !!}
                                </div>

                                                                <!-- Bank Detail tab content -->
                                <div class="tab-pane fade" id="v-pills-bank" role="tabpanel" aria-labelledby="v-pills-bank-tab">
                                <h5 class="heading  grey-line mb-sm-5 mb-4">Bank Details</h5>
                                <div class="create-job-wrapper">
                                    <form class="icon-form " id="bank_details" data-action="{{route('pioneer.setting.bank.details')}}">
                                        <div class="row">
                                      
                                            <div class="form-group  col-md-6 mb-xl-5 mb-md-4 mb-3">
                                                <div class="input-icon-wrpper">
                                                    <select name="bank_name" id="bankname" class="form-control">
                                                        <option value="">Bank Name</option>
                                                        <option value="bank_name1">HSBC Bank</option>
                                                        <option value="bank_name2">HSBC Bank</option>
                                                        <option value="bank_name3">HSBC Bank</option>
                                                      </select>
                                              
                                                </div>
                                            </div>
                                         
                                            <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                                                <div class="input-icon-wrpper">
                                                  <input type="number" class="form-control" id="Reviso" placeholder="Account no. in Reviso" name="account_reviso" >
                                                  
                                               
                                                </div>
                                            </div> 
                                            <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                                                <div class="input-icon-wrpper">
                                                  <input type="number" class="form-control" id="sortcode" placeholder="Sort Code" name="sortcode" >
                                                  
                                             
                                                </div>
                                            </div> 
                                            <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                                                <div class="input-icon-wrpper">
                                                  <input type="number" class="form-control" id="bankacc" placeholder="Bank Account No." name="account_number" >
                                             
                                                </div>
                                            </div> 
                                            <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                                                <div class="input-icon-wrpper">
                                                  <input type="number" class="form-control" id="stime" placeholder="SWIFT/BIC Code" name="swift_code" >
                                                 
                                                </div>
                                            </div> 
                                            <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                                                <div class="input-icon-wrpper">
                                                  <input type="number" class="form-control" id="iban" placeholder="IBAN No." name="iban" >
                                                
                                                </div>
                                            </div> 
                                           
        
                                            <div class="btn-wrapper my-3">
                                                <button type="submit" class="btn btn-lg edit-btn">Add Account</button>
                                            </div>
                                            
                                            <hr class="hr mx-90 mt-3" />
                                            <h5 class="heading  grey-line my-3">Bank Details</h5>
                                            <div class="row">
                                                <div class="col-md-4 col-sm-6">
                                                    <div class="payment_card">
                                                        <div class="heading">VISA</div>
                                                        <div class="payment_content">
                                                            <div class="fz-14">***********789</div>
                                                            <div class="fz-14">expires 26/2022</div>
                                                        </div>
                                                    </div>
                                                    <a href="#" class="d-flex mb-4 text-dark">Edit </a>
                                                </div>

                                                <div class="col-md-4 col-sm-6">
                                                    <div class="payment_card">
                                                        <div class="heading">Apple Pay</div>
                                                        <div class="payment_content">
                                                            <div class="fz-14">***********789</div>
                                                            <div class="fz-14">expires 26/2022</div>
                                                        </div>
                                                    </div>
                                                    <a href="#" class="d-flex mb-4 text-dark">Edit </a>
                                                </div>

                                                <div class="col-md-4 col-sm-6">
                                                    <div class="payment_card">
                                                        <div class="heading">American Express</div>
                                                        <div class="payment_content">
                                                            <div class="fz-14">***********789</div>
                                                            <div class="fz-14">expires 26/2022</div>
                                                        </div>
                                                    </div>
                                                    <a href="#" class="d-flex mb-4 text-dark">Edit </a>
                                                </div>

                                                <div class="col-md-4 col-sm-6">
                                                    <div class="payment_addCard">
                                                    <img src="images/plus.png" alt="text">
                                                    </div>
                                                    <a href="#" class="d-flex mb-4 text-dark">Add New</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>

                            <!-- Payment Tab content -->
                                <div class="tab-pane fade" id="v-pills-payment" role="tabpanel" aria-labelledby="v-pills-payment-tab">
                                <h5 class="heading  grey-line  mb-sm-5 mb-4">Payment</h5>
                                <div class="payment_wrapper">
                                    <form class="icon-form" id="payment-form" data-action="{{route('pioneer.setting.payment.details')}}">
                                        <div class="row">
        
                                            <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                                                <div class="input-icon-wrpper">
                                                  <input type="text" class="form-control" id="cardname" placeholder="Name" name="cardname" >
                                              
                                                </div>
                                            </div> 
                                            <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                                                <div class="input-icon-wrpper">
                                                  <input type="number" class="form-control" id="ccn" placeholder="Credit Card Number" name="ccn" >
                                               
                                                </div>
                                            </div> 
                                            <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                                                <div class="input-icon-wrpper">
                                                  <input type="number" class="form-control" id="edate" placeholder="Expiration Date" name="expiry_date" >
                                           
                                                </div>
                                            </div> 
                                            <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                                                <div class="input-icon-wrpper">
                                                  <input type="number" class="form-control" id="cvv" placeholder="CVV" name="cvv" required="">
                                                
                                                </div>
                                            </div> 
        
                                            <div class="btn-wrapper text-right">
                                                <button type="submit" class="btn btn-lg edit-btn">Add Account</button>
                                            </div>  
                                        </div>
                                    </form>
                                </div>
                            </div>


                                <div class="tab-pane fade" id="change-password" role="tabpanel"
                                    aria-labelledby="change-password-tab">
                                    <h5>Change Password</h5>
                                     <form id="change-password-form" data-action="{{route('pioneer.setting.password.change')}}">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-12  mb-3">
                                                <div class="input-icon-wrpper">
                                                    <input type="password" class="form-control" id="old_password" placeholder="Old Password" name="old_password" >
                                               
                                                </div>
                                            </div>
                                            <div class="form-group col-12 mb-3">
                                                <div class="input-icon-wrpper">
                                                    <input type="password" class="form-control" id="new_password" placeholder="New Password" name="new_password" >
                                                
                                                </div>
                                            </div>
                                            <div class="form-group col-12  mb-3">
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


                                <div class="tab-pane fade" id="terms-condition" role="tabpanel"
                                    aria-labelledby="terms-condition-tab">
                                    <h5 class="heading grey-line">{{$term->title}}</h5>
                                    {!! $term->content !!}
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
<script type="text/javascript">

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

$("#mobile_number").keypress(function(event) {
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

 
 /*$('body').on('submit','#logo,#certificate1-form,#certificate2-form,#certificate3-form,#certificate4-form', function(e){
        e.preventDefault();
        form_id = $(this).attr("id");
      ImageUpload(form_id);               
       
});*/
   
    

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
         maxlength:35
      },
      'last_name':{
         required: true,
        nowhitespace: true,
         maxlength:35
      },
      'mobile_number':{
         required: true,
        nowhitespace: true,
         maxlength:10
      },
      'dob':{
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


jQuery("form[id='payment-form']").validate({
    rules: {

      'cardname':{
         required: true, 
         nowhitespace: true,
         maxlength:35
      },
      'ccn':{
         required: true,
        nowhitespace: true,
         maxlength:35
      },
      'expiry_date':{
         required: true,
        nowhitespace: true,
         maxlength:10
      }
    }
});

jQuery("form[id='bank_details']").validate({
    rules: {

      'bank_name':{
         required: true, 
         nowhitespace: true,
         maxlength:35
      },
      'account_reviso':{
         required: true,
        nowhitespace: true,
         maxlength:35
      },
      'sortcode':{
         required: true,
        nowhitespace: true,
         maxlength:10
      },
      'account_number':{
         required: true,
        nowhitespace: true,
         maxlength:35
      },
      'swift_code':{
         required: true,
        nowhitespace: true,
         maxlength:35
      },
      'iban':{
         required: true,
        nowhitespace: true,
         maxlength:35
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

// function ImageUpload(form_id) {
//         var form = $('body').find('#'+form_id)[0]; 
//         var formData = new FormData(form);
//         var $this = $('body').find('#'+form_id);
//         $.ajax({
//            url:$this.attr('data-action'),
//            method:"POST",
//            data:formData,
//            dataType:'JSON',
//            contentType: false,
//            cache: false,
//            processData: false,
//            beforeSend: function() {
//                               $this.find('button').attr('disabled','true');

//           },
//            xhr: function () {
//            var xhr = new window.XMLHttpRequest();
//             xhr.upload.addEventListener("progress", function (evt) {

//             }, false);
//             return xhr;
//           },
//            success:function(data)
//            {
//                 $this.find('button').removeAttr('disabled');
//                 if(data.status==1){
//                     $("#change-password-form")[0].reset();
//                     message = data.message;
//                     toastr.success(message);
//                 }
//            }

//           });
// }
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