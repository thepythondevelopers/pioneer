@extends('destination.layouts.layout')


@section('style')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/daterangepicker.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
<style type="text/css">
    .table-inputs { 
  border-spacing:0; 
  border-collapse:collapse; }

.table-inputs th { 
  padding: 0 0.75rem;
  line-height: 1.75rem; 
  font-weight:normal; 
  font-size:12px; 
  border:1px solid #d2d2d2; }

.table-inputs td { 
  background-color:#fff;
  border:1px solid #d2d2d2;
  padding:0; }

.table-inputs input { 
  border:0; 
  background-color:transparent; } 

/* dropdown */

.ui-timepicker-container {
    position: absolute;
    overflow: hidden;
    box-sizing: border-box
}

.ui-timepicker,
.ui-timepicker-viewport {
    box-sizing: content-box;
    height: 205px;
    display: block;
    margin: 0
}

.ui-timepicker {
    list-style: none;
    padding: 0 1px;
    text-align: center
}

.ui-timepicker-viewport {
    padding: 0;
    overflow: auto;
    overflow-x: hidden
}

.ui-timepicker-standard {
    font-size: 12px; font-family:sans-serif;
    list-style: none;
    background-color: #fff;
    background-clip: padding-box;
    border-radius: 0 0 3px 3px;
    box-shadow: 0 0 0 .75px #bbb, 2px 1.5px 3px rgba(0,0,0,.16);
    margin: 0; padding:0;
}

.ui-timepicker-standard a {
  display:block;  
  background:transparent; filter:none; border:none; 
  width:100%;
  text-align: left; 
  border-radius:0;
  font-size: 11.5px;
  padding: 5px 10px; 
  line-height:18px;
  white-space:nowrap;
  text-decoration: none; 
  color:inherit;
}

/*Note: do not delete - breaks arrow keys (wut wut) */
.ui-timepicker-standard .ui-state-hover {
    box-shadow:none; 
    border:none; 
    text-decoration: none;
    background-color: #555; 
    color:#fff; 
}

.ui-timepicker-standard .ui-menu-item {
    margin: 0;
    padding: 0
}

.ui-timepicker-hidden {
    display: none
}

.ui-timepicker-no-scrollbar .ui-timepicker {
    border: none
}

.timepicker-input-icon {
    left: 25px !important;
    max-width: 20px;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
}

</style>
@endsection
@section('content')

  <!-- Start Create Job Form -->
  <section class="inner-banner bg">
        <div class="container container-1440 innercontent_wrp">
            <h2>Create Job</h2>
        </div>
    </section>
    @if(Auth::user()->admin_verification==1)
    <section class="create-job-section p-60">
        <div class="container container-1440">
            <div class="create-job-wrapper">
                <form class="icon-form" action="{{route('destination.save.job')}}" method="POST" id="create-job">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                         
                                <input type="text" class="form-control" id="jtitle" placeholder="Job Title" name="title" >
                      
                            
                        </div>

                        <div class="form-group  col-md-6 mb-xl-5 mb-md-4 mb-3">
                                <?php $job_type = getDefaultArray('job_type') ?>
                                <select name="job_type" id="jtype" class="form-control">
                                    <option value="">Job Type</option>
                                    @foreach($job_type as $key=>$job)
                                    <option value="{{$job}}">{{$job}}</option>
                                    @endforeach
                                  </select>
                        </div>

                        <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                                <input type="text" class="form-control" name="value_from_start_date" placeholder="Start Date" data-datepicker="separateRange"/>                           
                        </div>

                        <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                                <input type="text" name="value_from_end_date" class="form-control" placeholder="End Date" data-datepicker="separateRange"/>
                        </div>

                        <div class="form-group col-12 mb-xl-5 mb-md-4 mb-3">
                                <input  class="form-control"  placeholder="Address Line 1" name="address">                                             
                        </div>                    
                        
                        <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                            <select name="location" id="Location" class="form-control">
                                <option value="">Location</option>
                                @foreach($location as $key=>$loc)
                                    <option value="{{$loc->name}}">{{$loc->name}}</option>
                                @endforeach
                            </select>
                        </div>  
                        <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                            <input type="text" name="hour_rate" id="hour_rate" maxlength="5" class="form-control" placeholder="Hour Rate" />
                        </div>
                        <!-- <div class="form-group  col-md-12 mb-xl-5 mb-md-4 mb-3">
                            <div class="input-icon-wrpper">
                                <input type="text" name="daterange" class="form-control" value="" placeholder="Shift Start/End Time" />
                                <input type="hidden" class="form-control" name="shift_start_time" id="time_start" placeholder="Shift Start Time">
                                <input type="hidden" class="form-control" id="time_end" name="shift_end_time" placeholder="Shift End Time">
                                <span class="input-icon">
                                    <img src="{{asset('destination/images/icons/shift-time.png')}}" alt="icon">
                                </span>
                            </div>
                            
                        </div> --> 
                        <div class="form-group  col-md-6 mb-xl-5 mb-md-4 mb-3">
                            <div class=" timepicker-wrapper " >
                                <input type="text" class="form-control" name="shift_start_time" id="time_start" autocomplete="off" placeholder="Shift Start Time">
                           </div>  
                        </div>
                        <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                            <div class="timepicker-wrapper" >
                                <input type="text" class="form-control" id="time_end" name="shift_end_time" placeholder="Shift End Time">
                         
                            </div> 
                        </div>

                        <div class="form-group col-12 mb-xl-5 mb-md-4 mb-3">
                                <textarea  class="form-control textarea"  placeholder="Job Description" name="description" ></textarea>
                        </div>
                        <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                                <select name="duration" id="jduration" class="form-control">
                                    <option value="Daily">Daily</option>
                                    <option value="Weekly">Weekly</option>
                                  </select>
                        </div>
                        <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                            <input type="text" class="form-control" id="cpname" placeholder="Contact Person Name" name="person_name" >
                         </div>
                        <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                            <input type="email" class="form-control" id="cpemial" placeholder="Contact Person Email Id" name="contact_email" >
                        </div>
                        <div class="form-group col-md-6 mb-xl-5 mb-md-4 mb-3">
                            <div class=" input_number">
                                <input type="text" class="form-control code-span" id="contact_number" maxlength="10" placeholder="Contact Person Phone Number" name="contact_number" pattern="[1-9]{1}[0-9]{9}">
                                <span class="tel-country-code-l">+44</span>
                            </div>
                            
                        </div>  
                        <div class="btn-wrapper">
                            <button type="submit" class="btn btn-lg edit-btn">Submit</button>
                        </div>  
                    </div>
                </form>
            </div>
        </div>
    </section>
    @else
    <label class="empty_text cross_icon">Account Not Verified By Admin</label>
    @endif
    <!-- End Create job Form -->
@stop    


@section('scripts')

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/moment.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/daterangepicker.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript">
        var maxchars = 1500;
  $('textarea').keyup(function () {
    var tlength = $(this).val().length;
    $(this).val($(this).val().substring(0, maxchars));
    
});

$("#hour_rate").keypress(function(event) {
        return /\d/.test(String.fromCharCode(event.keyCode));
    });
$("#contact_number").keypress(function(event) {
        if (this.value.length == 0 && event.which == 48 ){
            return false;
        }
        return /\d/.test(String.fromCharCode(event.keyCode));
    });



         jQuery("form[id='create-job']").validate({
    rules: {
      'title':{
            required: true,
            nowhitespace: true,
            maxlength:55 
        }, 
        'job_type':{
            required: true,
            nowhitespace: true  
        }, 
        'description':{
            required: true,
            nowhitespace: true,
            maxlength:500
        },
        'address':{
            required: true,
            nowhitespace: true
        },
        'value_from_start_date':{
            required: true,
            nowhitespace: true
        },
        'location':{
            required: true,
            nowhitespace: true
        },
        'hour_rate':{
            required: true,
            nowhitespace: true
        },
        'daterange':{
            required: true,
            nowhitespace: true
        },
/*        'shift_end_time':{
            required: true,
            nowhitespace: true
        },*/
        'duration':{
            required: true,
            nowhitespace: true
        },
        'person_name':{
            required: true,
            nowhitespace: true,
            maxlength:55
        },
        'contact_email':{
            required: true,
            nowhitespace: true,
            customemail : true
        },
        'contact_number':{
            required: true,
            nowhitespace: true,
            minlength : 10,
            maxlength:10
        }
    }
   });        



            var separator = ' - ', dateFormat = 'DD-MM-YYYY';
    var options = {
        autoUpdateInput: false,
        autoApply: true,
        locale: {
            format: dateFormat,
            separator: separator,
            applyLabel: '確認',
            cancelLabel: '取消'
        },
        minDate: moment().add(1, 'days'),
        maxDate: moment().add(359, 'days'),
        opens: "right"
    };


        $('[data-datepicker=separateRange]')
            .daterangepicker(options)
            .on('apply.daterangepicker' ,function(ev, picker) {
                var boolStart = this.name.match(/value_from_start_/g) == null ? false : true;
                var boolEnd = this.name.match(/value_from_end_/g) == null ? false : true;

                var mainName = this.name.replace('value_from_start_', '');
                if(boolEnd) {
                    mainName = this.name.replace('value_from_end_', '');
                    $(this).closest('form').find('[name=value_from_end_'+ mainName +']').blur();
                }

                $(this).closest('form').find('[name=value_from_start_'+ mainName +']').val(picker.startDate.format(dateFormat));
                $(this).closest('form').find('[name=value_from_end_'+ mainName +']').val(picker.endDate.format(dateFormat));

                $(this).trigger('change').trigger('keyup');
            })
            .on('show.daterangepicker', function(ev, picker) {
                var boolStart = this.name.match(/value_from_start_/g) == null ? false : true;
                var boolEnd = this.name.match(/value_from_end_/g) == null ? false : true;
                var mainName = this.name.replace('value_from_start_', '');
                if(boolEnd) {
                    mainName = this.name.replace('value_from_end_', '');
                }

                var startDate = $(this).closest('form').find('[name=value_from_start_'+ mainName +']').val();
                var endDate = $(this).closest('form').find('[name=value_from_end_'+ mainName +']').val();

                $('[name=daterangepicker_start]').val(startDate).trigger('change').trigger('keyup');
                $('[name=daterangepicker_end]').val(endDate).trigger('change').trigger('keyup');
                
                if(boolEnd) {
                    $('[name=daterangepicker_end]').focus();
                }
            });



$('#time_end').prop('disabled', true);
$('#time_start').datetimepicker({
  format: 'LT',
  useCurrent: false,
   
     icons: {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-arrow-up",
        down: "fa fa-arrow-down",
        previous: "fa fa-chevron-left",
        next: "fa fa-chevron-right",
        today: "fa fa-clock-o",
        clear: "fa fa-trash-o"
    }
});


$('#time_end').datetimepicker({
  format: 'LT',
  useCurrent: false,
  icons: {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-arrow-up",
        down: "fa fa-arrow-down",
        previous: "fa fa-chevron-left",
        next: "fa fa-chevron-right",
        today: "fa fa-clock-o",
        clear: "fa fa-trash-o"
    }
});

$("#time_start").on("dp.change", function (e) {
  $('#time_end').prop('disabled', false);
  if( e.date ){
    $('#time_end').data("DateTimePicker").date(e.date.add(1, 'm'));
  }
  
  $('#time_end').data("DateTimePicker").minDate(e.date);
});

/*   var $begin = $('#time_start');
var $end = $('#time_end');
var $input = $('.timeSum');

var timeOptions = {
  interval: 15,
  dropdown: true,
   format : 'HH:mm',
  change: function(time) {
    sumHours();
  }
}

$begin.timepicker(timeOptions);

$end.timepicker(timeOptions);

$(document).on('focus', $end, function() {
  $(this).select();  // select entire text on focus
});

$begin.on("click, focus", function () {
  $(this).select();
});


function sumHours () {

    var time1 = $begin.timepicker().getTime();
    var time2 = $end.timepicker().getTime();

    if ( time1 && time2 ) {

      if ( time1 > time2 ) {
        //Correct the day so second entry is always 
        //after first, as in midnight shift. Use a new 
        //date object so original is not incremented.
        v = new Date(time2);
        v.setDate(v.getDate() + 1);
      } else {
        v = time2;
      }

      var diff = ( Math.abs( v - time1) / 36e5 ).toFixed(2);
      $input.val(diff); 
      
    } else {

      $input.val(''); 

    }
} 
*/
/*$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left',
     autoUpdateInput: false,
    timePicker: true,
            timePicker24Hour: true,
            timePickerIncrement: 1,
            //timePickerSeconds: true,
    locale: {
                format: 'HH:mm'
            }
  }, function(start, end, label) {
    $('input[name="daterange"]').val(start.format('HH:mm') + '-' + end.format('HH:mm'))
    $("#time_start").val(start.format('HH:mm'));
    $("#time_end").val(end.format('HH:mm'));

  }).on('show.daterangepicker', function (ev, picker) {
            picker.container.find(".calendar-table").hide();
        });;
});*/
 /*$('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
  });*/

  /*$('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
  });*/

    </script>
@endsection