@extends('pioneer.layouts.layout')



@section('content')
<section class="job-history-section p-60">
    <div class="container container-1440">
      <div class="heading-wrapper text-uppercase mb-md-0 mb-5">
        <h4 class="heading after-line grey-line">Job Detail</h4>
      </div>

      <div class="job-history-card job-detail-card pioneer-apply-job shadow br-10 p-md-5 p-4 border-radius">
        <div class="row flex-lg-row pb-5">
          <div class="col-xl-2 col-sm-4">
            <div class="profile-picture-img shadow  br-10 ">
              <img src="{{asset($job->created_user->logo)}}" class=" br-10" alt="destination-img">
              <figure class="shadow applicant-icon">
                <img src="{{asset('pioneer/images/icons/company.png')}}" alt="icon">
              </figure>
            </div>
            <div class="applicant-name h6 fw-bold text-sm-center my-3">
              {{$job->created_user->first_name}}
            </div>
          </div>
          <div class="col-xl-10 col-lg-8">
            <div class="mb-5 px-5 pe-0">
              <h5 class="mb-2 fw-bold">{{$job->title}}</h5>
              <p class="fz-18 mb-4">
                {{$job->description}}
              </p>
            </div>
          </div>
        </div>
        <div class="row mt-5">
          <div class=" col-md-3 col-sm-6">
            <div class="job-detail-cont">
              <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                <span class="small-icon me-2"><img src="{{asset('pioneer/images/icons/city.png')}}"></span> City
              </div>
              <p>{{$job->location}}</p>
            </div>
          </div>



          <div class=" col-md-3 col-sm-6">
            <div class="job-detail-cont">
              <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                <span class="small-icon me-2"><img src="{{asset('pioneer/images/icons/calender2.png')}}"></span> Start Date
              </div>
              <p>{{date('M d, Y',strtotime($job->start_date))}}</p>
            </div>
          </div>
          <div class=" col-md-3 col-sm-6">
            <div class="job-detail-cont">
              <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                <span class="small-icon me-2"><img src="{{asset('pioneer/images/icons/calender2.png')}}"></span> End Date
              </div>
              <p>{{date('M d, Y',strtotime($job->start_date))}}</p>
            </div>
          </div>
          <div class=" col-md-3 col-sm-6">
            <div class="job-detail-cont">
              <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                <span class="small-icon me-2"><img src="{{asset('pioneer/images/icons/rating.png')}}"></span> Rating
              </div>
              <p>4.5</p>
            </div>
          </div>
        </div>
        <form id="proposal-submit" action="{{route('pioneer.proposal.submit',$job->_id)}}">
        <div class="row mt-5">
          <div class="col-md-3">
            <div class="dispute-box">
              <h6 class="mb-1 fw-bold">Your Proposal</h6>
            </div>
          </div>
          <div class="col-md-9">
            <div class="dispute-box icon-form right-icon icon-top">
              <div class="input-icon-wrpper">
                <textarea placeholder="Submit Proposal" class="form-control br-10" rows="8" name="proposal">{{$job->pioneer_applicant_user->proposal}}</textarea>
                <span class="input-icon">
                  <a href="javascript:void('0');"><img src="{{asset('pioneer/images/icons/text-edit.png')}}" alt="icon"></a>
                </span>
              </div>
            </div>
          </div>
        </div>

      </form>
      </div>
    </div>
  </section>
  @endsection

  