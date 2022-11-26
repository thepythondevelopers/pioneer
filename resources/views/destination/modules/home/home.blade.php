@extends('destination.layouts.layout')



@section('content')
 

<!-- Banner warpper -->
<div class="banner-wrapper">
    <section class="banner-sec"></section>
    <div class="greeting-card shadow mb-lg-4">
        <div class="greeting-content">
            <div class="date"></div>
            <div class="greeting"><span id="greeting"></span>,
            <br> {{$user->first_name}} {{$user->last_name}}.</div>
    </div>
</div>
 <!-- Destination deatil -->
    <div class="destination-profile p-60">
        <div class="container container-1440">
            <!-- <ul class="job-card-list list-unstyled p-0 mt-4" id="job-card-list">
            </ul> -->
            <div class="job-applicant-list">
                <ul class="job-card-list list-unstyled new_joblist p-0" id="job-card-list">

                </ul>
            </div>
        </div>
    </div>
    <!-- end desrinationdetail -->


@stop    


@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
<script type="text/javascript">

/* $(document).on('click', '#more_button', function(event){
  event.preventDefault();
  $(this).hide();
  $("#less_button").show();
  $("#more_p").show();
});

 $(document).on('click', '#less_button', function(event){
  event.preventDefault();
  $(this).hide();
  $("#more_button").show();
  $("#more_p").hide();
});*/
//  $('#more_button').click(function() {
//   $('#more_p').slideToggle();
//   if ($('#more_button').text() == "... More") {
//     $(this).text("Less")
//   } else {
//     $(this).text("... More")
//   }
// });


function more_less(){
    // Configure/customize these variables.
    var showChar = 270;  // How many characters are shown by default
    var ellipsestext = "...";
    var moretext = "Show more";
    var lesstext = "Show less";
    

    $('.more_less').each(function() {
        var content = $(this).html();
 
        if(content.length > showChar) {
 
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
 
            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span><button type="button" class="morelink">' + moretext + '</button></span>';
 
            $(this).html(html);
        }
 
    });
 
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
}

var monthname  = moment().format('MMMM');
var dayname  = moment().format('dddd');
var d  = moment().format('Do');

date_string = dayname+', ' +monthname +' ' +d ;
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

     $(document).on('click', '.pagination a', function(event){
  event.preventDefault(); 
  var $url = $( this ).attr('href');
   
    filterFormAjax($url);
 });
      

      filterFormAjax();
function filterFormAjax($url=0) {


  
  var url = $url == 0 ? "{{route('destination.job.list')}}" : $url;
  
      $.ajax({
               url : url,
               type: 'GET', 
              // data:$this.serialize(),  
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
                beforeSend: function() {
                     $("body").find('.load_screen').show();
                     
                },
                success: function (result) {
                       if(parseInt(result.status) == 1){
                        $("body").find('#job-card-list').html(result.html);
                        more_less()
                              
                        }
               },
               complete: function() {
                        $("body").find('.load_screen').hide();
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

        });
}
</script>
@endsection

  
     
