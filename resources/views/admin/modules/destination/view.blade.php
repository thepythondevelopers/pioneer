@extends('admin.layouts.layout')



@section('content')
<div class="dash-content-wrap">
                       
                                    <div class="row">
                                        <div class="col-12"><h5 class="text-uppercase">Profile details</h5></div>
                                        <div class="col-lg-2 col-md-3">
                                            <div class="profile-picture-wrapper">
                                                <div class="profile-picture">                                                    
                                                    <div class="my-2 fz-16 fw-bold">Profile Picture</div>
                                                </div>

                                                <div class="profile-view-img">
                                                    <img src="{{(isset($user->logo) && $user->logo!='null') ? asset($user->logo) : asset('admin/images/Resgister-step/certificate1.png')}}">
                                                </div>                  
                                            </div>
                                        </div>
                                        <div class="col-lg-10 col-md-9">
                                            <div class="my-2 fz-16 fw-bold">DESTINATION INFORMATICS</div>
                                            <ul class="contact-info-list">
                                                <li><label>First Name:</label> <p>{{(isset($user->first_name) && $user->first_name!='null') ? $user->first_name : ''}}</p></li>
                                                <li><label>Sur Name:</label> <p>{{(isset($user->last_name) && $user->last_name!='null') ? $user->last_name : ''}}</p></li>
                                                <li><label>Main Phone Number:</label> <p>{{(isset($user->mobile_number) && $user->mobile_number!='null') ? $user->mobile_number : ''}}</p></li>
                                                <li><label>Company:</label> <p>{{(isset($user->company) && $user->company!='null') ? $user->company : ''}}</p></li>

                                                <li><label>Website Address:</label> <p>{{(isset($user->website_address) && $user->website_address!='null') ? $user->website_address : ''}}</p></li>
                                                <li><label>Address1:</label> <p>{{(isset($user->address1) && $user->address1!='null') ? $user->address1 : ''}}</p></li>
                                                <li><label>Main Contact Name:</label> <p>{{(isset($user->main_contact_name) && $user->main_contact_name!='null') ? $user->main_contact_name : ''}}</p></li>
                                                <li><label>Address2:</label> <p>{{(isset($user->address2) && $user->address2!='null') ? $user->address2 : ''}}</p></li>
                                                <li><label>Main Contact Email:</label> <p>{{(isset($user->email) && $user->email!='null') ? $user->email : ''}}</p></li>
                                                <li><label>Town/City:</label> <p>{{(isset($user->town_city) && $user->town_city!='null') ? $user->town_city : ''}}</p></li>
                                                <li><label>Finance Name:</label> <p>{{(isset($user->finance_name) && $user->finance_name!='null') ? $user->finance_name : ''}}</p></li>
                                                <li><label>Country:</label> <p>{{(isset($user->country) && $user->country!='null') ? $user->country : ''}}</p></li>
                                                <li><label>Finance Email:</label> <p>{{(isset($user->finance_email) && $user->finance_email!='null') ? $user->finance_email : ''}}</p></li>
                                                <li><label>Postcode:</label> <p>{{(isset($user->postcode) && $user->postcode!='null') ? $user->postcode : ''}}</p></li>
                                                <li><label>About Us:</label> <p>{!!(isset($user->about_us) && $user->about_us!='null') ? $user->about_us : '' !!}</p></li>

                                            </ul>
                                        </div>
                                        <div class="col-12 mt-4">

                                            <div class="certificates mt-5">
                                                <div class="row wrapper">
                                                    <div class="col-md-3 col-sm-6">
                                                            <h6 class="mb-3">Employers Liability Insurance</h6>
                                                  <div class="profile-view-img">
                                                    <img src="{{(isset($user->certificate1) && $user->certificate1!='null') ? asset($user->certificate1) : asset('admin/images/Resgister-step/certificate1.png')}}">
                                                </div>
                                                          
                                                        
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        
                                                            <h6 class="mb-3">Health & Safety</h6>
                                                  <div class="profile-view-img">
                                                    <img src="{{(isset($user->certificate2) && $user->certificate2!='null') ? asset($user->certificate2) : asset('admin/images/Resgister-step/certificate1.png')}}">
                                                </div>
                                                           
                                                        
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        
                                                            <h6 class="mb-3">CHAS</h6>
                                                  <div class="profile-view-img">
                                                    <img src="{{(isset($user->certificate3) && $user->certificate3!='null') ? asset($user->certificate3) : asset('admin/images/Resgister-step/certificate1.png')}}">
                                                </div>
                                                        
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <h6 class="mb-3">ISO</h6>
                                                  <div class="profile-view-img">
                                                    <img src="{{(isset($user->certificate4) && $user->certificate4!='null') ? asset($user->certificate4) : asset('admin/images/Resgister-step/certificate1.png')}}">
                                                </div>

                                                        
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                
   </div>                         



                                


@endsection
