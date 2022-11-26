@extends('pioneer.layouts.layout')



@section('content')

 <!-- Destination deatil -->
 <section class="inner-banner bg">
    <div class="container container-1440 innercontent_wrp">
        <h2>Proposals</h2>
    </div>
 </section>
 <div class="cstm-content-wrap">
    <div class="destination-profile pinr_prpsl p-60">
        <div class="container container-1440">

            <div class="tabs effect-1">
                <!-- tab-tabs -->
                <div class="pioneer-job-tabs nav nav-pills justify-content-center" id="v-pills-tab" role="tablist">
                    <div class="pioneer-tabs-inner d-inline-flex">

                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="proposal-job" data-action="{{route('pioneer.proposal.jobs')}}">Open Proposals</button>
                            <button class="nav-link " id="proposal-closed-job" data-action="{{route('pioneer.proposal.closed.jobs')}}">Closed Proposals</button>
                            <button class="nav-link" id="hire-job" data-action="{{route('pioneer.hire.job')}}">Hired Jobs</button>
                            <button class="nav-link" id="closed-job" data-action="{{route('pioneer.closed.job')}}">Completed Jobs</button>
                        </div>
                    </div>
                </div>

                <!-- tab-content -->
                <div class="tab-content" id="nav-tabContent">

                    <!-- <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"> -->
                        <section>
                            <div class="job-applicant-list pioneer-active-card">
                                <ul class="job-card-list list-unstyled new_joblist p-0 mt-lg-4 mt-4" id="job-list">
                                    
                                    
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
    $(window).on('load', function () {
        $('.load_screen').show();
      }) 
      $(document).on('click', '.pagination a', function (event) {
        event.preventDefault();
        var $url = $(this).attr('href');

        activeFormAjax($url);
    });

$(document).on('click', '#proposal-job,#proposal-closed-job,#hire-job,#closed-job', function (event) {
    $("#proposal-job").removeClass('active');
    $("#proposal-closed-job").removeClass('active');
    $("#hire-job").removeClass('active');
    $("#active-job").removeClass('active');
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


    activeFormAjax("{{route('pioneer.proposal.jobs')}}");
    function activeFormAjax($url = 0) {
        var url = $url == 0 ? "{{route('pioneer.proposal.jobs')}}" : $url;

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