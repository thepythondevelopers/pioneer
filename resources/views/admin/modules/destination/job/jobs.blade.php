@extends('admin.layouts.layout')



@section('content')
<div class="dash-content-wrap">
        <div class="destination-profile p-60">
        <div class="container container-1440">

            <div class="heading-wrapper mb-md-0 mb-5">
                <h4 class="heading after-line grey-line text-uppercase">Job Postings</h4>
            </div>

            <div class="ongoing-btn-wrap destination_job_btns">
                <a class="edit-btn btn nav-link popup-btn active" id="open-jobs" data-action="{{route('admin.destination.open.jobs',$user_id)}}">Open Jobs</a>
                <a class="edit-btn btn nav-link popup-btn " id="hire-jobs" data-action="{{route('admin.destination.hire.jobs',$user_id)}}">Hire Jobs</a>
                <a class="edit-btn btn nav-link popup-btn " id="closed-jobs" data-action="{{route('admin.destination.closed.jobs',$user_id)}}">Closed Jobs</a>
            </div>


            <ul class="job-card-list list-unstyled p-0 mt-4" id="job-list">
                

            </ul>
        </div>
    </div>
</div>

@stop

@section('scripts')
<script type="text/javascript">
  //         $(window).on('load', function () {
  //   $('.load_screen').show();
  // }) 

      $(document).on('click', '.pagination a', function (event) {
        event.preventDefault();
        var $url = $(this).attr('href');

        activeFormAjax($url);
    });

$(document).on('click', '#open-jobs,#hire-jobs,#closed-jobs', function (event) {


    $("#open-jobs").removeClass('active');
    $("#hire-jobs").removeClass('active');
    $("#closed-jobs").removeClass('active');
    $(this).addClass('active');
    url = $(this).attr('data-action');
    activeFormAjax(url);
});    


    


    activeFormAjax("{{route('admin.destination.open.jobs',$user_id)}}");
    function activeFormAjax($url = 0) {
        var url = $url == 0 ? "{{route('admin.destination.open.jobs',$user_id)}}" : $url;

        $.ajax({
            url: url,
            type: 'GET',
            data:$("#search-filter").serialize(),  
            dataTYPE: 'JSON',
            headers: {
                'X-CSRF-TOKEN': $('input[name=_token]').val()
            },
            beforeSend: function () {
                $("body").find('.load_screen').show();
            },
            success: function (result) {
                if (parseInt(result.status) == 1) {
                    $("body").find('.load_screen').hide();
                    $("body").find('#job-list').html(result.html);

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