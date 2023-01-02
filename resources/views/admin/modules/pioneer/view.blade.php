@extends('admin.layouts.layout')



@section('content')
<div class="dash-content-wrap">
	                   
    <div class="row">
        <div class="col-12">
        <div class="profile-picture">
            <h5 class="text-uppercase">Profile details</h5>
        </div>
    </div>
        <div class="col-lg-2 col-md-3">
            <div class="profile-picture-wrapper">
                <div class="profile-picture">                                                    
                     <div class="my-2 fz-16">Profile Picture</div>
                </div>

                <div class="profile-view-img">
                    <img src="{{(isset($user->logo) && $user->logo!='null') ? asset($user->logo) : asset('admin/images/Resgister-step/certificate1.png')}}">
                </div>                  
            </div>
        </div>
        <div class="col-lg-10 col-md-9">
            <div class="my-2 fz-16  fw-bold">PIONEER INFORMATICS</div>
            <ul class="contact-info-list">
                <li><label>First Name:</label> <p>{{(isset($user->first_name) && $user->first_name!='null') ? $user->first_name : ''}}</p></li>
                <li><label>Sur Name:</label> <p>{{(isset($user->last_name) && $user->last_name!='null') ? $user->last_name : ''}}</p></li>
                <li><label>Email:</label> <p>{{$user->email}}</p></li>
                <li><label>Mobile Number:</label> <p>{{(isset($user->mobile_number) && $user->mobile_number!='null') ? $user->mobile_number : ''}}</p></li>
                <li><label>National Insurance Number:</label> <p>{{(isset($user->national_insurance_number) && $user->national_insurance_number!='null') ? $user->national_insurance_number : ''}}</p></li>
                <li><label>Company:</label> <p>{{$user->company}}</p></li>
                <li><label>Address1:</label> <p>{{$user->address1}}</p></li>
                <li><label>Address2:</label> <p>{{$user->address2}}</p></li>
                <li><label>Town/City:</label> <p>{{$user->town_city}}</p></li>
                <li><label>Postcode:</label> <p>{{$user->postcode}}</p></li>
                <li><label>About Us:</label> <p>{!!(isset($user->about_us) && $user->about_us!='null') ? $user->about_us : '' !!}</p></li>
            </ul>
        </div>
        <div class="col-12 mt-4">

            <div class="certificates mt-5">
                <div class="row wrapper justify-content-between">
                    <div class="col-md-3 col-sm-6">
                            <h6 class="mb-3">CV</h6>
                    <div class="profile-view-img">
                    <img src="{{(isset($user->certificate1) && $user->certificate1!='null') ? asset($user->certificate1) : asset('admin/images/Resgister-step/certificate1.png')}}">
                </div>
                            
                        
                    </div>
                    <div class="col-md-3 col-sm-6">
                        
                            <h6 class="mb-3">Right to work ID</h6>
                    <div class="profile-view-img">
                    <img src="{{(isset($user->certificate2) && $user->certificate2!='null') ? asset($user->certificate2) : asset('admin/images/Resgister-step/certificate1.png')}}">
                </div>
                            
                        
                    </div>
                    <div class="col-md-3 col-sm-6">
                        
                            <h6 class="mb-3">DBS Certificate</h6>
                    <div class="profile-view-img">
                    <img src="{{(isset($user->certificate3) && $user->certificate3!='null') ? asset($user->certificate3) : asset('admin/images/Resgister-step/certificate1.png')}}">
                </div>
                        
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <h6 class="mb-3">Security Clearance</h6>
                    <div class="profile-view-img">
                    <img src="{{(isset($user->certificate4) && $user->certificate4!='null') ? asset($user->certificate4) : asset('admin/images/Resgister-step/certificate1.png')}}">
                </div>

                        
                    </div>
                    <!-- <div class="col-md-3 col-sm-6">
                        <h6 class="mb-3">Right to work Document</h6>
                    <div class="profile-view-img">
                    <img src="{{(isset($user->certificate5) && $user->certificate5!='null') ? asset($user->certificate5) : asset('admin/images/Resgister-step/certificate1.png')}}">
                </div>

                        
                    </div> -->
                </div>
                
            </div>
        </div>
    </div>
                                
   </div>                         



                                


@endsection
