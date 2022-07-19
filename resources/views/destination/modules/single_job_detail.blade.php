@extends('destination.layouts.layout')



@section('content')
    <!-- Start Job Details Section -->
    <div class="job-detail p-60">
        <div class="container">
            <div class="heading-wrapper text-uppercase mb-md-0 mb-5">
                <h3 class="heading after-line grey-line">Job detail</h3>
            </div>
        
            <div class="job-detail-card  shadow br-10 d-flex align-items-center p-4 border-radius">
                <div class="row">
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                            <div class="job-detail-title h6">
                                Job Title
                            </div>
                            <p>Cleaner</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                            <div class="job-detail-title h6">
                                Job Type
                            </div>
                            <p>Full Time</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                            <div class="job-detail-title h6">
                                Start Date
                            </div>
                            <p>23 June 2022</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                            <div class="job-detail-title h6">
                                End Date
                            </div>
                            <p>24 July 2022</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                            <div class="job-detail-title h6">
                                Job Description
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                            <div class="job-detail-title h6">
                                Houly Rate
                            </div>
                            <p>20 Usd/Hr</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                            <div class="job-detail-title h6">
                                Shift Start Date
                            </div>
                            <p>8am</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                            <div class="job-detail-title h6">
                                Shift End Date
                            </div>
                            <p>5pm</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                            <div class="job-detail-title h6">
                                Location
                            </div>
                            <p>XYZ</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                            <div class="job-detail-title h6">
                                Job Duration
                            </div>
                            <p>8 Hour</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                            <div class="job-detail-title h6">
                                Contact Person Name
                            </div>
                            <p>8 Hour</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                            <div class="job-detail-title h6">
                                Contact Person Phone Number
                            </div>
                            <p>8 Hour</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                            <div class="job-detail-title h6">
                                Contact Person Email Id
                            </div>
                            <p>example@gmail.com</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                            <div class="job-detail-title h6">
                                Meeting Time
                            </div>
                            <p>4pm</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="heading-wrapper pt-5">
                <h3 class="heading after-line grey-line">Applicant List</h3>
            </div>
            <div class="job-applicant-list">
                <ul class="job-card-list list-unstyled p-0 mt-4">
                    <li class="list-icon-card">
                        <div class="job-card border-radius shadow br-10">
                            <div class="row">
                                <div class="col-mf-9">
                                    <div class="job-card-inner">
                                        <div class="profile-picture-img shadow  br-10 ">
                                            <img src="images/aplicant.png" class=" br-10" alt="destination-img">
                                            <figure class="shadow applicant-icon">
                                            <img src="images/icons/company.png" alt="icon">
                                        </figure>
                                        </div>
                                        <div class="job-card-cont job-applicant">
                                            <div class="job-icon-list-wrap">
                                                <ul class="job-deatils-icons applicant-icon-list">
                                                    <li>
                                                        <div class="icon-img">
                                                            <img src="images/icons/user.png">
                                                        </div>
                                                        <p class="mb-0 fw-600">James Thomas</p> 
                                                    </li>
                                                    <li>
                                                        <div class="icon-img">
                                                            <img src="images/icons/job-type.png">
                                                        </div>
                                                        <p class="mb-0 fw-600">Previous Job - 15</p> 
                                                    </li>
                                                    <li>
                                                        <div class="icon-img">
                                                            <img src="images/icons/duration.png">
                                                        </div>
                                                        <p class="mb-0 fw-600">Applied - 10min Ago</p> 
                                                    </li>
                                                    <li>
                                                        <p class="mb-0 fw-600">Rating - </p>
                                                        <div class="icon-img">
                                                            <img src="images/icons/star-rating.png">
                                                        </div> 
                                                    </li>
                                                </ul>
                                            <div class="job-card-btn">
                                                <a href="chat.html" class="edit-btn btn popup-btn">Message</a>
                                            </div>
                                            </div>
                                            <div class="job-title h5 mt-3">
                                                Cleaning Service Provider
                                            </div>
                                            <p class="mt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s                                            only five centuries, 
                                                but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets 
                                                containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                        </div>
                                    </div>                                
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-icon-card">
                        <div class="job-card border-radius shadow br-10">
                            <div class="row">
                                <div class="col-mf-9">
                                    <div class="job-card-inner">
                                        <div class="profile-picture-img shadow  br-10 ">
                                            <img src="images/aplicant.png" class=" br-10" alt="destination-img">
                                            <figure class="shadow applicant-icon">
                                            <img src="images/icons/company.png" alt="icon">
                                        </figure>
                                        </div>
                                        <div class="job-card-cont job-applicant">
                                            <div class="job-icon-list-wrap">
                                                <ul class="job-deatils-icons applicant-icon-list">
                                                    <li>
                                                        <div class="icon-img">
                                                            <img src="images/icons/user.png">
                                                        </div>
                                                        <p class="mb-0 fw-600">James Thomas</p> 
                                                    </li>
                                                    <li>
                                                        <div class="icon-img">
                                                            <img src="images/icons/job-type.png">
                                                        </div>
                                                        <p class="mb-0 fw-600">Previous Job - 15</p> 
                                                    </li>
                                                    <li>
                                                        <div class="icon-img">
                                                            <img src="images/icons/duration.png">
                                                        </div>
                                                        <p class="mb-0 fw-600">Applied - 10min Ago</p> 
                                                    </li>
                                                    <li>
                                                        <p class="mb-0 fw-600">Rating - </p>
                                                        <div class="icon-img">
                                                            <img src="images/icons/star-rating.png">
                                                        </div> 
                                                    </li>
                                                </ul>
                                            <div class="job-card-btn">
                                                <a href="chat.html" class="edit-btn btn popup-btn">Message</a>
                                            </div>
                                            </div>
                                            <div class="job-title h5 mt-3">
                                                Cleaning Service Provider
                                            </div>
                                            <p class="mt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s                                            only five centuries, 
                                                but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets 
                                                containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                        </div>
                                    </div>                                
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-icon-card">
                        <div class="job-card border-radius shadow br-10">
                            <div class="row">
                                <div class="col-mf-9">
                                    <div class="job-card-inner">
                                        <div class="profile-picture-img shadow  br-10 ">
                                            <img src="images/aplicant.png" class=" br-10" alt="destination-img">
                                            <figure class="shadow applicant-icon">
                                            <img src="images/icons/company.png" alt="icon">
                                        </figure>
                                        </div>
                                        <div class="job-card-cont job-applicant">
                                            <div class="job-icon-list-wrap">
                                                <ul class="job-deatils-icons applicant-icon-list">
                                                    <li>
                                                        <div class="icon-img">
                                                            <img src="images/icons/user.png">
                                                        </div>
                                                        <p class="mb-0 fw-600">James Thomas</p> 
                                                    </li>
                                                    <li>
                                                        <div class="icon-img">
                                                            <img src="images/icons/job-type.png">
                                                        </div>
                                                        <p class="mb-0 fw-600">Previous Job - 15</p> 
                                                    </li>
                                                    <li>
                                                        <div class="icon-img">
                                                            <img src="images/icons/duration.png">
                                                        </div>
                                                        <p class="mb-0 fw-600">Applied - 10min Ago</p> 
                                                    </li>
                                                    <li>
                                                        <p class="mb-0 fw-600">Rating - </p>
                                                        <div class="icon-img">
                                                            <img src="images/icons/star-rating.png">
                                                        </div> 
                                                    </li>
                                                </ul>
                                            <div class="job-card-btn">
                                                <a href="chat.html" class="edit-btn btn popup-btn">Message</a>
                                            </div>
                                            </div>
                                            <div class="job-title h5 mt-3">
                                                Cleaning Service Provider
                                            </div>
                                            <p class="mt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s                                            only five centuries, 
                                                but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets 
                                                containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                        </div>
                                    </div>                                
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-icon-card">
                        <div class="job-card border-radius shadow br-10">
                            <div class="row">
                                <div class="col-mf-9">
                                    <div class="job-card-inner">
                                        <div class="profile-picture-img shadow  br-10 ">
                                            <img src="images/aplicant.png" class=" br-10" alt="destination-img">
                                            <figure class="shadow applicant-icon">
                                            <img src="images/icons/company.png" alt="icon">
                                        </figure>
                                        </div>
                                        <div class="job-card-cont job-applicant">
                                            <div class="job-icon-list-wrap">
                                                <ul class="job-deatils-icons applicant-icon-list">
                                                    <li>
                                                        <div class="icon-img">
                                                            <img src="images/icons/user.png">
                                                        </div>
                                                        <p class="mb-0 fw-600">James Thomas</p> 
                                                    </li>
                                                    <li>
                                                        <div class="icon-img">
                                                            <img src="images/icons/job-type.png">
                                                        </div>
                                                        <p class="mb-0 fw-600">Previous Job - 15</p> 
                                                    </li>
                                                    <li>
                                                        <div class="icon-img">
                                                            <img src="images/icons/duration.png">
                                                        </div>
                                                        <p class="mb-0 fw-600">Applied - 10min Ago</p> 
                                                    </li>
                                                    <li>
                                                        <p class="mb-0 fw-600">Rating - </p>
                                                        <div class="icon-img">
                                                            <img src="images/icons/star-rating.png">
                                                        </div> 
                                                    </li>
                                                </ul>
                                            <div class="job-card-btn">
                                                <a href="chat.html" class="edit-btn btn popup-btn">Message</a>
                                            </div>
                                            </div>
                                            <div class="job-title h5 mt-3">
                                                Cleaning Service Provider
                                            </div>
                                            <p class="mt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s                                            only five centuries, 
                                                but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets 
                                                containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                        </div>
                                    </div>                                
                                </div>
                            </div>
                        </div>
                    </li>   
                </ul>
            </div>
            <div class="pagination-list mt-5">
                <ul class="list-unstyled">
                    <li class="pagination-prev">
                        <a href="#">Prev</a>
                    </li>
                    <li class="pg-prev-icon">
                        <a href="#"><img src="images/icons/prev-icon.png"></a>
                    </li>
                    <li class="pagination-item "><a href="#" class="active">1</a></li>
                    <li class="pagination-item"><a href="#">2</a></li>
                    <li class="pagination-item"><a href="#">3</a></li>
                    <li class="pagination-item"><a href="#">4</a></li>
                    <li class="pagination-item"><a href="#">5</a></li>
                    <li class="pg-next-icon">
                        <a href="#"><img src="images/icons/next-icon.png"></a>  
                    </li>
                    <li class="pagination-next"><a href="#">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Job Detail Section -->
@stop