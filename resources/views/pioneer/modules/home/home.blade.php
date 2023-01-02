@extends('pioneer.layouts.layout')

@section('style')
  <style>       
/* .pro-btn{	
    display: inline-block;
    padding: 10px 30px;
    color: #333;
    font-weight: 600;
    border:1px solid #333;
    border-radius: 50px;
    /* background: transparent; */
    /* box-shadow: 0 0 10px rgb(0 0 0 / 20%); */
/* }  */
 
.btn-sub {
    margin-top: 5px;
}
.pro-form .card.card-body {
    background: var(--primary-color);
    border-radius: 20px;
    margin-top: 17px;
}  
.pro-btn:before{
    filter:invert(1);
}   
.pro-btn:hover:before{
    filter:invert(0);
}   
.pro-btn:not(.collapsed)::before {
    background-color: transparent;
    color: #fff;
    background-image: url(/pioneer/images/icons/arrow-up.png);
}	
.pro-btn.collapsed::before {
    background-image: url(/pioneer/images/icons/arrow-down.png);
}				
.pro-btn::before {
    flex-shrink: 0;
    width: 16px;
    height: 15px;
    margin-left: auto;
    content: "";
    background-image: url(/pioneer/images/icons/arrow-down.png);
    background-repeat: no-repeat;
    background-size: contain;
    transition: transform -2.2s ease-in-out;
    display: inline-block;
    position: relative;
    left: -8px;
    background-position-y: 3px;
}             
.pro-btn:hover {
    border: 1px solid #333;
    color: #fff;
    background-color:#494a4a;
}
.pro-btn[aria-expanded="true"] {
    background: #333;
    color: #fff !important;
}
.form-group {
    margin-bottom: 15px !important;
}
.search-filter .btn{
    min-width: 104px;
}	
.new_btn{
    background: var(--secondry-color);
    border-color: var(--secondry-color);
    border-radius: 0;
    max-width: 200px;
    width: 100%;
}			
            </style>
@endsection
@section('content')

<!-- Destination deatil -->
<div class="banner-wrapper">
    <section class="banner-sec"></section>
    <div class="greeting-card shadow mb-lg-4">
        <div class="greeting-content">
            <div class="date"></div>
            <div class="greeting"><span id="greeting">
            </span>,<br> {{$user->first_name}} {{$user->last_name}}.</div>
    </div>
</div>
</div>
<div class="destination-profile p-60">
    <div class="container container-1440">
        <div class="poineer-text-wrap">          
            <div class="poineer-btn-grp">
                <!-- Toggle ends Here-->
                <a class="edit-btn pro-btn collapsed" data-bs-toggle="collapse" href="#collapseExample" role="button"
                    aria-expanded="false" aria-controls="collapseExample">
                    Advanced Search
                </a>
                <!-- <a class ="edit-btn" href="#"><img src="images/icons/job.png">  Advanced Search</a> -->
                <a class="outline-btn" href="{{route('pioneer.home')}}"><img src="images/icons/job-seeker.png"><span class="job_count">0</span> New Jobs Found</a>

            </div>
        </div>
        <!--New Collapse Div Start here--------------------------------->

        <div class="collapse pro-form" id="collapseExample">
            <div class="card card-body">
                <form class="icon-form left-icon" id="search-filter">
                    <div class="row">
                        <div class="col-12">
                        <div class="row">
                        <div class="form-group col-md-4 mb-xl-4 mb-md-4">
                            <div class="input-icon-wrpper">
                                <input type="text" class="form-control"  name="title" placeholder="Title">
                                <!-- <span class="input-icon">
                                    <img src="images/icons/title.png" alt="icon">
                                </span> -->
                            </div>

                        </div>
                        

                        <div class="form-group col-md-4 mb-xl-4 mb-md-4">
                            <div class="input-icon-wrpper">
                                <?php $job_type = getDefaultArray('job_type') ?>
                                <select  id="jtype" name="job_type" class="form-control">
                                    <option value="">Job Type</option>
                                    @foreach($job_type as $key=>$job)
                                    <option value="{{$job}}">{{$job}}</option>
                                    @endforeach
                                </select>
                                <!-- <span class="input-icon">
                                    <img src="images/icons/post.png" alt="icon">
                                </span> -->
                                <span class="input-icon pioneer-chevron">
                                    <img src="images/icons/arrow-down.png" alt="icon">
                                </span>
                            </div>

                        </div>
                        <div class="form-group col-md-4 mb-xl-4 mb-md-5">
                            <div class="input-icon-wrpper">
                                        <input type="text" class="form-control"  name="location" placeholder="Location">
                                
                                <!-- <span class="input-icon">
                                    <img src="images/icons/location.png" alt="icon">
                                </span> -->
                                <!-- <span class="input-icon pioneer-chevron">
                                    <img src="images/icons/arrow-down.png" alt="icon">
                                </span> -->
                            </div>
                        </div>
                        </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="row">
                        <div class="col-md-2 mb-xl-2 mb-md-2">
                            <button type="button" class="btn edit-btn btn-sub clear-btn new_btn br-0">Clear</button>
                        </div>
                        
                        <div class="col-md-2 mb-xl-2 mb-md-2">
                            <button type="submit" class="btn btn-lg edit-btn new_btn btn-sub">Submit</button>
                        </div>
</div>
                        </div>

                    </div>
                  
                      
                    
                    
                </form>
            </div>
        </div>
        <!--New Collapse Div Ends here---------------------------------->

        <div class="job-applicant-list">
            <ul class="job-card-list list-unstyled new_joblist p-0 mt-lg-4 mt-4" id="job-card-list">

            </ul>
        </div>

    </div>
</div>
<!-- end desrinationdetail -->


<!-- advanced search -->
<div class="modal fade pioneer-adsearch-popup" id="adsearch" tabindex="-1" aria-labelledby="adsearchLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0 br-10">
                <div class="popup-wrap pioneer-advance-popup">
                    <div class="popup-header">
                        <h5 class="modal-title text-white" id="adsearchLabel">Advanced Search</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="popup-body text-center">
                        <form class="icon-form left-icon" action="home.html">
                            <div class="row">
                                <div class="form-group col-md-12 mb-xl-12 mb-md-12 mb-3">
                                    <label class="mt-3 text-left d-block">
                                        <h6 class="text-left">Title</h6>
                                    </label>
                                    <div class="input-icon-wrpper">
                                        <input type="text" class="form-control" id="jtitle" name="jtitle" required="">
                                      
                                    </div>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="form-group col-md-12 mb-xl-12 mb-md-12 mb-3">
                                    <label class=" text-left d-block">
                                        <h6 class="text-left">Description</h6>
                                    </label>
                                    <div class="input-icon-wrpper">
                                        <textarea class="form-control textarea" required=""></textarea>
                                       
                                    </div>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="form-group col-md-12 mb-xl-12 mb-md-12 mb-3">
                                    <label class=" text-left d-block">
                                        <h6 class="text-left">Posted Ago</h6>
                                    </label>
                                    <div class="input-icon-wrpper">
                                        <select name="jType" id="jtype" class="form-control">
                                            <option value=""></option>
                                            <?php $job_type = getDefaultArray('job_type') ?>
                                                @foreach($job_type as $key=>$job)
                                                <option value="{{$job}}">{{$job}}</option>
                                                @endforeach
                                        </select>
                                        <span class="input-icon pioneer-chevron">
                                            <img src="images/icons/arrow-down.png" alt="icon">
                                        </span>
                                    </div>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="form-group col-md-12 mb-xl-12 mb-md-12 mb-3">
                                    <label class="text-left d-block">
                                        <h6 class="text-left">Location</h6>
                                    </label>
                                    <div class="input-icon-wrpper">
                                        <select name="Location" id="Location" class="form-control">
                                            <option value="volvo"></option>
                                            <option value="saab">Saab</option>
                                            <option value="mercedes">Mercedes</option>
                                            <option value="audi">Audi</option>
                                        </select>
                                        <span class="input-icon pioneer-chevron">
                                            <img src="images/icons/arrow-down.png" alt="icon">
                                        </span>
                                    </div>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="btn-wrapper text-center">
                                    <button type="submit" class="btn btn-lg edit-btn">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- advanced search -->


<!-- <div class="modal cstm_model" id=""> -->
<div class="modal" id="not_verified">
    <div class="modal-dialog cstom-modal">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logoutLabel"><span><img src="{{asset('pioneer/images/icons/logout_icon.png')}}"></span>
          </h5>
        </div>
        <div class="modal-body text-center">
        Verification of account is in progress by Pioneering People
        </div>
        <!-- <div class="modal-footer cstm-btn-group ">
          <button type="button" class="btn form-btn" data-bs-dismiss="modal">No</button>
          <a class="btn form-btn">Yes</a>
        </div> -->

      </div>
    </div>
  </div>
@endsection


@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
<script type="text/javascript">
    $(window).on('load', function () {
        $('.load_screen').show();
      }) 

    socket.on('job', function(msg){
      
        count = $("body").find(".job_count").text();
count = parseInt(count);
$("body").find(".job_count").text(count+1);
});

    var monthname = moment().format('MMMM');
    var dayname = moment().format('dddd');
    var d = moment().format('Do');

    date_string = dayname + ', ' + monthname + ' ' + d;
    $('.date').append(date_string);

    var thehours = new Date().getHours();
    var themessage;
    var morning = ('Good Morning');
    var afternoon = ('Good Afternoon');
    var evening = ('Good Evening');

    if (thehours >= 0 && thehours < 12) {
        themessage = morning;

    } else if (thehours >= 12 && thehours < 17) {
        themessage = afternoon;

    } else if (thehours >= 17 && thehours < 24) {
        themessage = evening;
    }

    $('#greeting').append(themessage);

    $(document).on('click', '.pagination a', function (event) {
        event.preventDefault();
        var $url = $(this).attr('href');

        filterFormAjax($url);
    });

    $(document).on('submit', '#search-filter', function (event) {
        event.preventDefault();
        filterFormAjax();
    });    

$(document).on('click', '.clear-btn', function (event) {
        event.preventDefault();
        $('#search-filter')[0].reset();
        filterFormAjax();
});    



$('.main-search').keyup(function(event){    
    filterFormAjax();
});


    filterFormAjax();
    function filterFormAjax($url = 0) {
        data = $("#search-filter").serialize()+ '&main_search=' + $('.main-search').val();
        

        var url = $url == 0 ? "{{route('pioneer.job.list')}}" : $url;

        $.ajax({
            url: url,
            type: 'GET',
            data:data,  
            dataTYPE: 'JSON',
            headers: {
                'X-CSRF-TOKEN': $('input[name=_token]').val()
            },
            beforeSend: function () {
                $("body").find('.load_screen').show();
            },
            success: function (result) {
                if (parseInt(result.status) == 1) {
                    $("body").find('#job-card-list').html(result.html);
                    
                    $("body").find('.load_screen').hide();
                }
            },
            complete: function () {

            },
            error: function (jqXhr, textStatus, errorMessage) {

            }

        });
    }
</script>
@endsection