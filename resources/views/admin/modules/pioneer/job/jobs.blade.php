@extends('admin.layouts.layout')



@section('content')
 <!-- Destination deatil -->
<div class="dash-content-wrap">
    <div class="destination-profile p-60">
        <div class="container container-1440">

            <div class="tabs effect-1">
                <!-- tab-tabs -->
                <div class="pioneer-job-tabs nav nav-pills justify-content-center" id="v-pills-tab" role="tablist">
                    <div class="pioneer-tabs-inner">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="open-proposal" data-action="{{route('admin.pioneer.open.jobs',$user_id)}}">Open Proposals</button>
                            <button class="nav-link" id="closed-proposal" data-action="{{route('admin.pioneer.closed.proposal.jobs',$user_id)}}">Closed Proposals</button>
                            <button class="nav-link" id="hire-job" data-action="{{route('admin.pioneer.hire.job',$user_id)}}">Hired Jobs</button>
                            <button class="nav-link" id="closd-job" data-action="{{route('admin.pioneer.closed.job',$user_id)}}">Completed Jobs</button>
                        </div>
                    </div>
                </div>

                <!-- tab-content -->
                <div class="tab-content" id="nav-tabContent">

                    
                        <section>
                            <div class="job-applicant-list pioneer-active-card">
                                <ul class="job-card-list list-unstyled p-0 mt-5" id="job-list">
                                    
                                    
                                </ul>
                            </div>
                          
                        </section>
                    <!-- </div> -->

                    
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- end desrinationdetail -->
@endsection

@section('scripts')
<script type="text/javascript">
      $(document).on('click', '.pagination a', function (event) {
        event.preventDefault();
        var $url = $(this).attr('href');

        activeFormAjax($url);
    });

$(document).on('click', '#open-proposal,#closed-proposal,#hire-job,#closd-job', function (event) {

    $("#open-proposal").removeClass('active');
    $("#closed-proposal").removeClass('active');
    $("#hire-job").removeClass('active');
    $("#closd-job").removeClass('active');
    $(this).addClass('active');
    url = $(this).attr('data-action');
    activeFormAjax(url);
});    


$('.main-search').keyup(function(event){    
    if($( "#active-job" ).hasClass( "active" )){
        url = $( "#active-job").attr('data-action');
    }
    if($( "#hire-job" ).hasClass( "active" )){
        url = $("#hire-job").attr('data-action');   
    }
    if($( "#closed-job" ).hasClass( "active" )){
        url = $("#closed-job").attr('data-action');
    }
    
    activeFormAjax(url);

});    


    activeFormAjax("{{route('admin.pioneer.open.jobs',$user_id)}}");
    function activeFormAjax($url = 0) {
        var url = $url == 0 ? "{{route('admin.pioneer.open.jobs',$user_id)}}" : $url;

        $.ajax({
            url: url,
            type: 'GET',
            data:{main_search : $(".main-search").val()},  
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