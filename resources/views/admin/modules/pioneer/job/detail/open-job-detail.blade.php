@extends('admin.layouts.layout')



@section('content')
<section class="inner-banner bg">
    <div class="container container-1440 innercontent_wrp">
        <h2>Job Detail</h2>
    </div>
 </section>
<section class="job-history-section p-60">
    <div class="container container-1440">
      <div class="job-history-card job-detail-card pioneer-apply-job shadow br-10 p-4 border-radius">
        <div class="row flex-lg-row pb-4">
          <div class="col-xl-2 col-sm-4">
            <div class="profile-picture-img shadow  br-10 ">
              <img src="{{asset($job->created_user->logo)}}" class=" br-10" alt="destination-img">
              <figure class="shadow applicant-icon">
                <img src="{{asset('pioneer/images/icons/company.png')}}" alt="icon">
              </figure>
            </div>
            <div class="applicant-name h6 fw-bold text-sm-center my-2">
              {{$job->created_user->first_name}}
            </div>
          </div>
          <div class="col-xl-10 col-lg-8">
            <div class="mb-3 ps-lg-4">
              <h5 class="mb-2 fw-bold">{{$job->title}}</h5>
              <p class="fz-16 mb-4">
                {!! $job->description !!}
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class=" col-md-3 col-sm-6">
            <div class="job-detail-cont btn-tag">
              <div class="job-detail-title fz-20 fw-bold d-flex">
                <!-- <span class="small-icon me-2"><img src="{{asset('pioneer/images/icons/city.png')}}"></span>  -->
                City
              </div>
              <p class="mb-0">{{$job->location}}</p>
            </div>
          </div>



          <div class=" col-md-3 col-sm-6">
            <div class="job-detail-cont btn-tag">
              <div class="job-detail-title fz-20 fw-bold d-flex">
                <!-- <span class="small-icon me-2"><img src="{{asset('pioneer/images/icons/calender2.png')}}"></span> -->
                Start Date 
              </div>
              <p class="mb-0">{{date('M d, Y',strtotime($job->start_date))}}</p>
            </div>
          </div>
          <div class=" col-md-3 col-sm-6">
            <div class="job-detail-cont btn-tag">
              <div class="job-detail-title fz-20 fw-bold d-flex">
                <!-- <span class="small-icon me-2"><img src="{{asset('pioneer/images/icons/calender2.png')}}"></span>  -->
                End Date
              </div>
              <p class="mb-0">{{date('M d, Y',strtotime($job->start_date))}}</p>
            </div>
          </div>
          <div class=" col-md-3 col-sm-6">
            <div class="job-detail-cont btn-tag">
              <div class="job-detail-title fz-20 fw-bold d-flex">
                <!-- <span class="small-icon me-2"><img src="{{asset('pioneer/images/icons/rating.png')}}"></span>  -->
                Rating
              </div>
              <p class="mb-0">{!! show_rating($job->created_user->rating_count()) !!}</p>
            </div>
          </div>
        </div>
      
        <div class="row mt-5">
          <div class="col-12 col-md-3">
            <div class="dispute-box">
              <h6 class="mb-1 fw-bold">Your Proposal</h6>
            </div>
          </div>
          <div class="col-12">
            <div class="dispute-box icon-form right-icon icon-top">
              <div class="input-icon-wrpper">
                <textarea  class="form-control br-10" rows="8" name="proposal" disabled>{{$applicant!=null ? $applicant->proposal : ''}}</textarea>

              </div>
            </div>
          </div>
        </div>

      
      </div>
    </div>
  </section>
  @endsection

  