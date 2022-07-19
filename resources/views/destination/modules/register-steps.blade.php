@extends('destination.layouts.auth')



@section('content')
 <!-- Start Header section -->
    <header class="main-header bg-dark">
        <div class="container container-1440">
            <div class="header-inner">
                <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                    <div class="container-fluid">
                        <a href="#" class="logo">
                            <img src="images/logo-white.png" alt="img">
                        </a>           
                    </div>
                  </nav>
            </div>
        </div>
    </header>
    <!-- End Header section -->
  
      
    <!-- Steps Section -->
    <section class="steps-section">
        <div class="container">
            <div class="content-wrapper p-60">
                
                <div class="card">            
                    <form id="msform" action="create_job.html"  class="needs-validated">
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
                                        <div class="profile-picture-wrapper">
                                            <div class="profile-picture">
                                                <h5>DESTINATION LOGO</h5>
                                            </div>
                                            <div class="profile-picture-img text-center shadow  br-10 mb-sm-4 mb-3">
                                                <img src="images/Resgister-step/company.png" class=" br-10" alt="destination-img">
                                            </div>
                                            <a href="javascrpit:;" class="edit-btn">Upload</a>
                                        </div>
                                    </div>

                                    <div class="col-lg-9 mt-lg-0 mt-4">
                                        <div class="row">
                                        <div class="form-group col-md-6 mb-lg-5 mb-md-4 mb-3">
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
                                        <div class="form-group  col-md-6 mb-lg-5 mb-md-4 mb-3">
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
                                        <div class="form-group col-md-6 mb-lg-5 mb-md-4 mb-3">
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
                                        <div class="form-group col-md-6 mb-lg-5 mb-md-4 mb-3">
                                            <div class="input-icon-wrpper">
                                                <input type="number" class="form-control" id="mnumber" placeholder="Mobile Number"
                                                name="mnumber" required>
                                                <span class="input-icon">
                                                    <img src="images/icons/phone.png" alt="icon">
                                                </span>
                                            </div>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                        <div class="form-group col-md-6 mb-lg-5 mb-md-4 mb-3">
                                            <div class="input-icon-wrpper">
                                                <input type="text" class="form-control" id="cname" placeholder="Company Name"
                                                name="cname" required>
                                                <span class="input-icon">
                                                    <img src="images/icons/company.png" alt="icon">
                                                </span>
                                            </div>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                        <div class="form-group col-md-6 mb-lg-5 mb-md-4 mb-3">
                                            <div class="input-icon-wrpper">
                                                <input type="text" class="form-control" id="vat" placeholder="VAT Number"
                                                name="vat" required>
                                                <span class="input-icon">
                                                    <img src="images/icons/vat.png" alt="icon">
                                                </span>
                                            </div>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                        <div class="form-group col-md-6 mb-lg-5 mb-md-4 mb-3">
                                            <div class="input-icon-wrpper">
                                                <input type="password" class="form-control" id="trading" placeholder="Trading Name"
                                                name="trading" required>
                                                <span class="input-icon">
                                                    <img src="images/icons/trade.png" alt="icon">
                                                </span>
                                            </div>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>   
                                    </div>
                                    <div class="certificates">
                                        <div class="row">
                                            <div class="col-md-3 col-sm-6">
                                                <div class="profile-picture-wrapper">
                                                    <div class="profile-picture">
                                                        <h5>Certificate 1</h5>
                                                    </div>
                                                    <div class="profile-picture-img text-center shadow  br-10 mb-sm-4 mb-3">
                                                        <img src="images/Resgister-step/certificate1.png" class=" br-10" alt="destination-img">
                                                    </div>
                                                    <a href="javascrpit:;" class="edit-btn">Upload</a>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                                <div class="profile-picture-wrapper">
                                                    <div class="profile-picture">
                                                        <h5>Certificate 2</h5>
                                                    </div>
                                                    <div class="profile-picture-img text-center shadow  br-10 mb-sm-4 mb-3">
                                                        <img src="images/Resgister-step/certificate2.png" class=" br-10" alt="destination-img">
                                                    </div>
                                                    <a href="javascrpit:;" class="edit-btn">Upload</a>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                                <div class="profile-picture-wrapper">
                                                    <div class="profile-picture">
                                                        <h5>Certificate 3</h5>
                                                    </div>
                                                    <div class="profile-picture-img text-center shadow  br-10 mb-sm-4 mb-3">
                                                        <img src="images/Resgister-step/certificate1.png" class=" br-10" alt="destination-img">
                                                    </div>
                                                    <a href="javascrpit:;" class="edit-btn">Upload</a>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                                <div class="profile-picture-wrapper">
                                                    <div class="profile-picture">
                                                        <h5>Certificate 4</h5>
                                                    </div>
                                                    <div class="profile-picture-img text-center shadow  br-10 mb-sm-4 mb-3">
                                                        <img src="images/Resgister-step/certificate2.png" class=" br-10" alt="destination-img">
                                                    </div>
                                                    <a href="javascrpit:;" class="edit-btn">Upload</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    
                                </div> 

                                
                                    
                            </div>  
                            
                            <input type="button" name="next" class="next primary-btn action-button" value="Next" />                           
                        </fieldset>

                        <fieldset class=" step-card-inner shadow br-10">
                            <div class="form-card">
                                <div class="heading-wrapper text-center mb-5">
                                    <h3 class="heading after-line after-line-center">Please select what you are looking for?</h3>
                                </div>
                                
                                <ul class="check-card-list">
                                    <li>
                                        <div class="input-group check-card">
                                            <input type="checkbox" id="Skilled" name="fav_language" value="Skilled">
                                            <label for="Skilled">Skilled Pioneer</label>  
                                            <img src="images/icons/checkbox-check.png" alt="icon">  
                                            </div>
                                    </li>
                                    <li>
                                        <div class="input-group check-card">
                                            <input type="checkbox" id="Verified" name="fav_language" value="Verified">
                                            <label for="Verified">Verified Pioneer</label>  
                                            <img src="images/icons/checkbox-check.png" alt="icon">  
                                            </div>
                                    </li>
                                    <li>
                                        <div class="input-group check-card">
                                            <input type="checkbox" id="flexible" name="fav_language" value="flexible">
                                            <label for="flexible">flexible worker  with 
                                                Instant  availaibility</label>    
                                                <img src="images/icons/checkbox-check.png" alt="icon">
                                            </div>
                                    </li>
                                    <li>
                                        <div class="input-group check-card">
                                            <input type="checkbox" id="local" name="fav_language" value="local">
                                            <label for="local">local</label>  
                                            <img src="images/icons/checkbox-check.png" alt="icon">  
                                            </div>
                                    </li>
                                </ul>
                            
                            </div> 
                            <input type="button" name="previous" class="previous primary-btn bg-dark action-button-previous" value="Previous" />
                            <input type="button" name="next" class="next primary-btn action-button" value="Next" /> 
                        </fieldset>
                        
                        <fieldset class=" step-card-inner shadow br-10">
                            <div class="form-card">
                                <div class="heading-wrapper text-center mb-5">
                                    <h3 class="heading after-line after-line-center">Do you offer?</h3>
                                </div>
                                
                                <ul class="check-card-list">
                                    <li>
                                        <div class="input-group check-card">
                                            <input type="checkbox" id="wage" name="offer" value="wage">
                                            <label for="wage">Real living wage or higher</label>
                                            <img src="images/icons/checkbox-check.png" alt="icon">    
                                            </div>
                                    </li>
                                    <li>
                                        <div class="input-group check-card">
                                            <input type="checkbox" id="secure" name="offer" value="secure">
                                            <label for="secure">safe & secure</label>   
                                            <img src="images/icons/checkbox-check.png" alt="icon"> 
                                            </div>
                                    </li>
                                    <li>
                                        <div class="input-group check-card">
                                            <input type="checkbox" id="instruction" name="offer" value="instruction">
                                            <label for="instruction">on site on boarding &
                                                instruction</label>    
                                                <img src="images/icons/checkbox-check.png" alt="icon">
                                            </div>
                                    </li>
                                    <li>
                                        <div class="input-group check-card">
                                            <input type="checkbox" id="Meet" name="offer" value="Meet">
                                            <label for="Meet">Meet and greet</label>
                                            <img src="images/icons/checkbox-check.png" alt="icon">    
                                            </div>
                                    </li>
                                    <li>
                                        <div class="input-group check-card">
                                            <input type="checkbox" id="schedule" name="offer" value="schedule">
                                            <label for="schedule">schedule of work</label>  
                                            <img src="images/icons/checkbox-check.png" alt="icon">  
                                            </div>
                                    </li>
                                    <li>
                                        <div class="input-group check-card">
                                            <input type="checkbox" id="support" name="offer" value="support">
                                            <label for="support">support</label>
                                            <img src="images/icons/checkbox-check.png" alt="icon">    
                                            </div>
                                    </li>
                                    
                                </ul>
                            
                            </div>  
                            <input type="button" name="previous" class="previous primary-btn bg-dark action-button-previous" value="Previous" />
                            <!-- <input type="button" name="next" class="next primary-btn  action-button" value="Submit" />  -->
                            <button type="submit" href="create_job.html" class="primary-btn">Submit</button>
                        </fieldset>
                    </form>
                </div>
                   
               
            </div>
        </div>
    </section>
@stop