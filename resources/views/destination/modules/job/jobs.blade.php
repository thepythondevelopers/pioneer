@extends('destination.layouts.layout')



@section('content')
        <section class="inner-banner bg">
            <div class="container container-1440 innercontent_wrp">
                <h2>Proposals</h2>
            </div>
        </section>
        <div class="destination-profile p-60">
        <div class="container container-1440">
            <div class="destination_job_btns">
                
                <a class="btn nav-link active" id="open-jobs" data-action="{{route('destination.open.jobs')}}">Open Jobs</a>
                <a class="popup-btn nav-link " id="hire-jobs" data-action="{{route('destination.hire.jobs')}}">Hired Jobs</a>
                <a class="popup-btn nav-link " id="closed-jobs" data-action="{{route('destination.closed.jobs')}}">Closed Jobs</a>
            </div>
            <ul class="job-card-list list-unstyled p-0 mt-4" id="job-list">
            </ul>
        </div>
    </div>


@stop

@section('scripts')
<script type="text/javascript">
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


    


    activeFormAjax("{{route('destination.open.jobs')}}");
    function activeFormAjax($url = 0) {
        var url = $url == 0 ? "{{route('destination.open.jobs')}}" : $url;

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
                    $("body").find('#job-list').html(result.html);
                    

                }
            },
            complete: function () {
                $("body").find('.load_screen').hide();
            },
            error: function (jqXhr, textStatus, errorMessage) {

            }

        });
    }
</script>
@endsection