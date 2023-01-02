@extends('destination.layouts.layout')



@section('content')
<section class="inner-banner bg">
    <div class="container container-1440 innercontent_wrp">
        <h2>Job Detail</h2>
    </div>
</section>
<section class="job-history-section p-60">
    <div class="container container-1440">
      <div class="job-history-card job-detail-card pioneer-apply-job shadow br-10 p-md-5 p-4 border-radius">
        <div class="row flex-lg-row ">
          <div class="col-xl-3 col-sm-4">
            <div class="profile-picture-img shadow  br-10 ">
              <img src="{{$applicant->applicant!=null ? asset($applicant->applicant->logo) : asset('icon_black.png')}}" class=" br-10" alt="destination-img">
              <figure class="shadow applicant-icon">
                <img src="{{asset('destination/images/icons/company.png')}}" alt="icon">
              </figure>
            </div>
            <div class="applicant-name h6 fw-bold text-sm-center my-3">
              {{$applicant->applicant!=null ? $applicant->applicant->first_name : ''}}
            </div>
          </div>
          <div class="col-xl-9 col-lg-8">
            <div class="mb-5">
              <div class="d-flex justify-content-between mb-3 align-items-center flex-wrap">
              <h5 class=" fw-bold mb-0">{{$job->title}}</h5>
                <div class="my-3">
                  <a href="{{route('destination.job.applicant.profile',$applicant->submit_by)}}" class="edit-btn me-2 mb-2 mb-sm-0" >Profile</a>
                  <a href="{{route('destination.chat.param',[$job->_id,$applicant->submit_by])}}" class="edit-btn mb-2 mb-sm-0" >Message</a>
                </div>
              </div>
              <p class="fz-18 mb-4">
                {!! $job->description !!}
                
              </p>
            </div>
          </div>
        </div>
        <div class="row mt-lg-5 mb-3 mb-md-0">
          <div class=" col-lg-3 col-md-6">
            <div class="job-detail-cont btn-tag h-100">
              <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                City
              </div>
              <p>{{$job->location}}</p>
            </div>
          </div>



          <div class=" col-lg-3 col-md-6">
            <div class="job-detail-cont btn-tag h-100">
              <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
               Start Date
              </div>
              <p>{{date('M d, Y',strtotime($job->start_date))}}</p>
            </div>
          </div>
          <div class=" col-lg-3 col-md-6">
            <div class="job-detail-cont btn-tag h-100">
              <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                End Date
              </div>
              <p>{{date('M d, Y',strtotime($job->start_date))}}</p>
            </div>
          </div>
          <div class=" col-lg-3 col-md-6">
            <div class="job-detail-cont btn-tag h-100">
              <div class="job-detail-title fz-20 fw-bold d-flex mb-2">
                Rating
              </div>
              <p>{!! show_rating($job->created_user->rating_count()) !!}</p>
            </div>
          </div>
        </div>
        
        <div class="row mt-5">
          <div class="col-md-12">
            <div class="dispute-box">
              <h6 class="mb-1 fw-bold">Proposal</h6>
            </div>
          </div>
          <div class="col-md-12">
            <div class="dispute-box icon-form right-icon icon-top">
              <div class="input-icon-wrpper icon-form">
                <textarea placeholder="Submit Proposal" class="form-control br-10" rows="8" name="proposal" disabled>{{$applicant->proposal}}</textarea>
                <!-- <span class="input-icon">
                  <a href="javascript:void('0');"><img src="{{asset('pioneer/images/icons/text-edit.png')}}" alt="icon"></a>
                </span> -->
              </div>
            </div>
          </div>
          <div class="d-flex flex-wrap prsl_btns">
             @if($applicant->interested!=2)
             @if($job->hire_status!=1)
            <a href="javascript:void(0)" class="edit-btn btn me-3 mb-sm-0 mb-2" data-bs-toggle="modal" data-bs-target="#budget">Hire</a>
            @endif
            
            <form method="POST" action="{{route('destination.job.applicant.reject.applicant')}}">
              @csrf
              <input type="hidden" name="job_id" value="{{$job->_id}}">
              <input type="hidden" name="applicant_id" value="{{$applicant->submit_by}}">
              <button type="submit" class="edit-btn reject">Decline</button>
            </form>
            @else
            <a href="javascript:void(0)" class="edit-btn btn">Rejected </a>
            @endif
          </div>
        </div>

      
      </div>
    </div>
  </section>

  <div class="modal fade" id="budget" tabindex="-1" aria-labelledby="budgetLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="hire-budget-form" data-action="{{route('destination.hire.applicant.job')}}">
          <input type="hidden" name="job_id" value="{{$job->_id}}">
              <input type="hidden" name="hire_applicant_id" value="{{$applicant->submit_by}}">
              <input type="hidden" name="applicant_id" value="{{$applicant->_id}}">
        <div class="modal-body p-5 pb-2 text-center">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <h6 class="mb-3">Specify Budget?</h6>
          <input class="form-control" name="price" id="price" placeholder="{{currency()}} 0" type="text" required>
          <select name="type" class="form-control" style="color:#959595eb;">
          <option value="Fixed">Select Job Type</option>
            <option value="Fixed">Fixed</option>
            <option value="Hourly">Hourly</option>
          </select>
        </div>
        <div class="modal-footer pb-4 justify-content-center border-0">        
          <button type="submit" class="edit-btn btn popup-btn hire-submit-btn">Submit</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  @endsection
@section('scripts')
  <script type="text/javascript">
    
    jQuery("form[id='hire-budget-form']").validate({
    rules: {
      
        'hire_budget':{
            required: true,
            nowhitespace: true
        },
        'type':{
            required: true,
            nowhitespace: true
        }
    }
   });   

    $("body").on("submit", "#hire-budget-form", function(e){
            e.preventDefault();    
      data =  $(this).serialize();
      url = $(this).attr('data-action');
        hire_job(url,data);
  });

    function hire_job(url,data){
  $.ajax({
               url : url,
               type: 'POST', 
                 
               dataTYPE:'JSON',
               data : data,
               headers: {
                 'X-CSRF-TOKEN': "{{ csrf_token() }}"
               },
                beforeSend: function() {
                  $(".hire-submit-btn").prop('disabled', true);
                },
                success: function (result) {
                       if(parseInt(result.status) == 1){
                        $('#budget').modal('toggle');
                        toastr.success(result.message);
                        $(".hire-submit-btn").prop('disabled', false);        
                        setTimeout(function () {location.reload();}, 1500);
                        }
               },
               complete: function() {
                        
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

        });
}
  </script>
@endsection  