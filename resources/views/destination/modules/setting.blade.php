@extends('destination.layouts.layout')



@section('content')


    <!-- Start setting section -->
    <section class="setting-section p-40 ">
        <div class="container container-1440">
            <div class="sectting-inner shadow br-10 py-3 px-3">
                <div class="row">
                    <div class="col-md-3">
                        <div class="setting-tab nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <button class="nav-link " id="account-tab" data-bs-toggle="pill"
                                data-bs-target="#account" type="button" role="tab" aria-controls="account"
                                aria-selected="true">
                                <span><img src="images/icons/setting-user.png" alt="text"></span>Account
                            </button>

                            <button class="nav-link" id="about-us-tab" data-bs-toggle="pill"
                                data-bs-target="#about-us" type="button" role="tab"
                                aria-controls="about-us" aria-selected="false">
                                <span><img src="images/icons/setting-about.png" alt="text"></span>About Us
                            </button>

                            <button class="nav-link" id="v-pills-bank-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-bank" type="button" role="tab"
                                aria-controls="v-pills-bank" aria-selected="false">
                                <span><img src="images/icons/bank.png" alt="text"></span>Bank Details
                            </button>

                            <button class="nav-link" id="v-pills-payment-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-payment" type="button" role="tab"
                                aria-controls="v-pills-payment" aria-selected="false">
                                <span><img src="images/icons/payment.png" alt="text"></span>Payment
                            </button>

                            <button class="nav-link" id="change-password-tab" data-bs-toggle="pill"
                                data-bs-target="#change-password" type="button" role="tab"
                                aria-controls="change-password" aria-selected="false">
                                <span><img src="images/icons/setting-pwd.png" alt="text"></span>Change Password
                            </button>

                            <button class="nav-link" id="terms-condition-tab" data-bs-toggle="pill"
                                data-bs-target="#terms-condition" type="button" role="tab"
                                aria-controls="terms-condition" aria-selected="false">
                                <span><img src="images/icons/setting-term.png" alt="text"></span>Terms & Conditions
                            </button>

                            <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="modal" data-bs-target="#logout" type="button">
                                <span><img src="images/icons/exit-b.png" alt="text"></span>Logout
                            </button>
                        </div>
                    </div>

                    <div class="col-md-9">
 
                        <div class=" setting-tab_content steps-section shadow p-4 d-flex align-items-start br-10">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade " id="account" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <form id="profile-form" data-action="{{route('destination.setting.profile.update')}}">
                                        @csrf
                                        
                                    <div class="row">                                    
                                        <div class="col-md-3">
										
                                        
                                            <div class="profile-picture-wrapper">
                                                <div class="profile-picture">
                                                    <h5 class="text-uppercase">Profile details</h5>
                                                </div>
                                                <div class="wrapper br-10 mb-sm-3 mb-5 ">
                                                <div class="box">
                                                    <div class="js--image-preview" style="background-image:url('{{(isset($user->logo) && $user->logo!='null') ? asset(Auth::user()->logo) : 'images/Resgister-step/certificate1.png'}}');">
													<div class="close-options">
                                                      
                                                        <input type="file" name="logo" class="image-upload" accept="image/png, image/jpg, image/jpeg,image/JPG, image/JPEG, image/PNG"  disabled  />
														<label>
                                                      </label>
                                                    </div>
													</div>
													
                                                    
													
													
                                                  </div>
                                                  <div id="logo-error" class="cstm-error-image-div"></div>
                                                </div> 
                                                                                      
                                            </div>
											
                                        </div>
                                    
                                        <div class="col-9 mt-4">
										<div class="edit-form">
                                                        <button type="button" onclick="enable_disable()" id="edit_info">Edit Info</button>
                                                    </div>
														
                                            <div class="row">
                                                <div class="form-group col-md-6 mb-lg-4 mb-3">
                                                    <div class="input-icon-wrpper">
                                                        <input  type="text" class="form-control" id="first_name" placeholder="First Name" name="first_name" value="{{$user->first_name}}" disabled>
                                                        <span class="input-icon">
                                                            <img src="images/icons/notebook.png" alt="icon">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="form-group  col-md-6 mb-lg-4 mb-3">
                                                    <div class="input-icon-wrpper">
                                                        <input  type="text" class="form-control" id="last_name" placeholder="Last Name" name="last_name" value="{{$user->last_name}}" disabled>
                                                        <span class="input-icon">
                                                            <img src="images/icons/notebook.png" alt="icon">
                                                        </span>
                                                    </div>
                                                </div>
                                               
                                                <div class="form-group col-md-6 mb-lg-4 mb-3">
                                                    <div class="input-icon-wrpper">
                                                        <input type="text" class="form-control" id="mobile_number" maxlength="10" placeholder="Mobile Number"
                                                name="mobile_number" value="{{(isset($user->mobile_number) && $user->mobile_number!='null') ? $user->mobile_number : ''}}" disabled>
                                                <span class="tel-country-code">+44</span>
                                                        <span class="input-icon">
                                                            <img src="images/icons/phone-bw.png" alt="icon">
                                                        </span>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group col-md-6 mb-lg-4 mb-3">
                                                    <div class="input-icon-wrpper">
                                                        <input type="text" class="form-control" id="vat_number" maxlength="9" placeholder="VAT Number"
                                                name="vat_number" value="{{(isset($user->vat_number) && $user->vat_number!='null') ? $user->vat_number : ''}}" disabled>
                                                        <span class="input-icon">
                                                            <img src="images/icons/vat.png" alt="icon">
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-12 mb-lg-4 mb-3">
                                                    <div class="input-icon-wrpper">
                                                        <input  type="text" class="form-control" id="email" placeholder="Email Id" name="email" value="{{$user->email}}" disabled>
                                                        <span class="input-icon">
                                                            <img src="images/icons/mail-bw.png" alt="icon">
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6 mb-lg-4 mb-3">
                                                    <div class="input-icon-wrpper">
                                                        <input type="text" class="form-control" id="company_name" placeholder="Company Name" name="company_name" value="{{(isset($user->company_name) && $user->company_name!='null') ? $user->company_name : ''}}" disabled>
                                                        <span class="input-icon">
                                                            <img src="images/icons/calender2.png" alt="icon">
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6 mb-lg-4 mb-3">
                                            <div class="input-icon-wrpper">
                                                <input type="text" class="form-control" id="trading" placeholder="Trading Name"
                                                name="trading" value="{{(isset($user->trading) && $user->trading!='null') ? $user->trading : ''}}" disabled>
                                                <span class="input-icon">
                                                    <img src="images/icons/trade.png" alt="icon">
                                                </span>
                                            </div>
                                        </div>

                                                

                                                <div class="form-group icon-form col-md-12 mb-lg-4 mb-3">
                                                    <div class="input-icon-wrpper">
                                                        <textarea class="form-control textarea" placeholder="Address" name="address" disabled>{{(isset($user->address) && $user->address!='null') ? $user->address : ''}}</textarea>
                                                        <span class="input-icon">
                                                            <img src="images/icons/city.png" alt="icon">
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                               
                                           
                                    
                                        </div>
                                    </div>
                                
								<div class="certificates ">
                                        <div class="row wrapper">
										<div class="col-md-3 col-sm-6">
                                        
                                        <div class="certificate-box">
                                        <div class="fz-16"><p>Certificate 1</p></div>
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
                                        <div class="fz-16"><p>Certificate 2</p></div>
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
                                        <div class="fz-16"><p>Certificate 3</p></div>
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
                                           <div class="fz-16"><p>Certificate 4</p></div>
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
                                           <div class="cstm-btn-group my-2" id="profile-submit" style="display: none;">
                                                          <button type="submit" class="edit-btn btn popup-btn min200">Submit</button>
                                                </div>
                                            </form>
                                </div>



                                <div class="tab-pane fade" id="about-us" role="tabpanel"
                                    aria-labelledby="about-us-tab">
                                    <h5 class="heading after-line grey-line text-uppercase">{{$about->title}}</h5>
                                    {!! $about->content !!}
                                </div>

                                <!-- Bank Detail tab content -->
                                <div class="tab-pane fade" id="v-pills-bank" role="tabpanel" aria-labelledby="v-pills-bank-tab">
                                <h5 class="heading after-line grey-line text-uppercase mb-sm-5 mb-4">Bank Details</h5>
                                <div class="create-job-wrapper">
                                    <form class="icon-form" id="bank_details" data-action="{{route('destination.setting.bank.details')}}">
                                        <div class="row">
                                      
                                            <div class="form-group  col-md-6 mb-xl-5 mb-md-4 mb-3">
                                                <div class="input-icon-wrpper">
                                                    <select name="bank_name" id="bankname" class="form-control">
                                                        <option value="">Bank Name</option>
                                                        <option value="bank_name1">HSBC Bank</option>
                                                        <option value="bank_name2">HSBC Bank</option>
                                                        <option value="bank_name3">HSBC Bank</option>
                                                      </select>
                                                    <span class="input-icon">
                                                        <img src="images/icons/notebook.png" alt="icon">
                                                    </span>
                                                </div>
                                            </div>
                                         
                                            <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                                                <div class="input-icon-wrpper">
                                                  <input type="number" class="form-control" id="Reviso" placeholder="Account no. in Reviso"  name="account_reviso">
                                                  
                                                    <span class="input-icon">
                                                        <img src="images/icons/notebook.png" alt="icon">
                                                    </span>
                                                </div>
                                            </div> 
                                            <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                                                <div class="input-icon-wrpper">
                                                  <input type="number" class="form-control" id="sortcode" placeholder="Sort Code" name="sortcode" >
                                                  
                                                    <span class="input-icon">
                                                        <img src="images/icons/notebook.png" alt="icon">
                                                    </span>
                                                </div>
                                            </div> 
                                            <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                                                <div class="input-icon-wrpper">
                                                  <input type="number" class="form-control" id="bankacc" placeholder="Bank Account No." name="account_number" >
                                                    <span class="input-icon">
                                                        <img src="images/icons/notebook.png" alt="icon">
                                                    </span>
                                                </div>
                                            </div> 
                                            <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                                                <div class="input-icon-wrpper">
                                                  <input type="number" class="form-control" id="stime" placeholder="SWIFT/BIC Code" name="swift_code" >
                                                    <span class="input-icon">
                                                        <img src="images/icons/notebook.png" alt="icon">
                                                    </span>
                                                </div>
                                            </div> 
                                            <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                                                <div class="input-icon-wrpper">
                                                  <input type="number" class="form-control" id="iban" placeholder="IBAN No." name="iban" >
                                                    <span class="input-icon">
                                                        <img src="images/icons/notebook.png" alt="icon">
                                                    </span>
                                                </div>
                                            </div> 
                                           
        
                                            <div class="btn-wrapper text-right">
                                                <button type="submit" class="btn btn-lg edit-btn">Add Acoount</button>
                                            </div>  
                                        </div>
                                    </form>
                                </div>

                            </div>

                            <!-- Payment Tab content -->
                                <div class="tab-pane fade" id="v-pills-payment" role="tabpanel" aria-labelledby="v-pills-payment-tab">
                                <h5 class="heading after-line grey-line text-uppercase mb-sm-5 mb-4">Payment</h5>
                                <div class="payment_wrapper">
                                    <form class="icon-form" data-action="{{route('destination.setting.payment.details')}}" id="payment-form">
                                        <div class="row">
        
                                            <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                                                <div class="input-icon-wrpper">
                                                  <input type="text" class="form-control" id="cardname" placeholder="Name" name="cardname" >
                                                    <span class="input-icon">
                                                        <img src="images/icons/notebook.png" alt="icon">
                                                    </span>
                                                </div>
                                            </div> 
                                            <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                                                <div class="input-icon-wrpper">
                                                  <input type="number" class="form-control" id="ccn" placeholder="Credit Card Number" name="ccn" >
                                                    <span class="input-icon">
                                                        <img src="images/icons/notebook.png" alt="icon">
                                                    </span>
                                                </div>
                                            </div> 
                                            <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                                                <div class="input-icon-wrpper">
                                                  <input type="number" class="form-control" id="edate" placeholder="Expiration Date" name="expiry_date" >
                                                    <span class="input-icon">
                                                        <img src="images/icons/notebook.png" alt="icon">
                                                    </span>
                                                </div>
                                            </div> 
                                            <!-- <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                                                <div class="input-icon-wrpper">
                                                  <input type="number" class="form-control" id="cvv" placeholder="CVV" name="cvv" >
                                                    <span class="input-icon">
                                                        <img src="images/icons/notebook.png" alt="icon">
                                                    </span>
                                                </div>
                                            </div> --> 
        
                                            <div class="btn-wrapper text-right">
                                                <button type="submit" class="btn btn-lg edit-btn">Add Acoount</button>
                                            </div>  
                                        </div>
                                    </form>
                                </div>
                            </div>

                                <div class="tab-pane fade" id="change-password" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                    <h5>Change Password</h5>

                                     <form id="change-password-form" data-action="{{route('destination.setting.password.change')}}">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-12  mb-3">
                                                <div class="input-icon-wrpper">
                                                    <input type="password" class="form-control" id="old_password" placeholder="Old Password" name="old_password" >
                                                    <span class="input-icon">
                                                        <img src="images/icons/setting-pwd.png" alt="icon">
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group col-12 mb-3">
                                                <div class="input-icon-wrpper">
                                                    <input type="password" class="form-control" id="new_password" placeholder="New Password" name="new_password" >
                                                    <span class="input-icon">
                                                        <img src="images/icons/setting-pwd.png" alt="icon">
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group col-12  mb-3">
                                                <div class="input-icon-wrpper">
                                                    <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" name="confirm_password" >
                                                    <span class="input-icon">
                                                        <img src="images/icons/setting-pwd.png" alt="icon">
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                     </form>
                                
                                </div>


                                <div class="tab-pane fade" id="terms-condition" role="tabpanel"
                                    aria-labelledby="v-pills-settings-tab">
                                   <h5 class="heading after-line grey-line text-uppercase">{{$term->title}}</h5>
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


@stop


@section('scripts')
<script src="{{asset('custom/js/image-upload.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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


$("#mobile_number,#vat_number").keypress(function(event) {
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
      'company_name':{
         required: true,
        nowhitespace: true,
         maxlength:35
      },
      'vat_number':{
         required: true,
        nowhitespace: true,
         maxlength:35
      },
      'trading':{
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
           extension: "jpg|jpeg|png|JPG|JPEG|PNG"
        },
        'certificate4':{
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
      'title':{
            required: true,
            nowhitespace: true,
            maxlength:55 
        }, 
        'job_type':{
            required: true,
            nowhitespace: true  
        }, 
        'description':{
            required: true,
            nowhitespace: true
        },
        'address':{
            required: true,
            nowhitespace: true
        },
        'value_from_start_date':{
            required: true,
            nowhitespace: true
        },
        'location':{
            required: true,
            nowhitespace: true
        },
        'hour_rate':{
            required: true,
            nowhitespace: true
        },
        'shift_start_time':{
            required: true,
            nowhitespace: true
        },
        'shift_end_time':{
            required: true,
            nowhitespace: true
        },
        'duration':{
            required: true,
            nowhitespace: true
        },
        'person_name':{
            required: true,
            nowhitespace: true,
            maxlength:55
        },
        'contact_email':{
            required: true,
            nowhitespace: true,
            customemail : true
        },
        'contact_number':{
            required: true,
            nowhitespace: true,
            minlength : 10,
            maxlength:10
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



function imageRemove(type){
    
$.ajax({
                url : "{{route('destination.setting.image.remove')}}",
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

</script>
@stop