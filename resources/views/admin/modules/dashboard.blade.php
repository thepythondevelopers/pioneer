@extends('admin.layouts.layout')
@section('style')
 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/daterangepicker.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
<style type="text/css">
    .app-inner {
        padding:40px;
	}
	.brands {
	box-sizing: border-box;
	background: #FAFAFA;
	border: 1px solid #FFFFFF;
	box-shadow: 0px 0px 7px rgba(0, 0, 0, 0.2);
	border-radius: 5px;
	padding: 5px 5px;
}
.thh th {
	/* font-size: 12px; */
	color: #737272;
	font-weight: normal;
	border: none;
	border: none;
	background: transparent;
	padding: 0 0 6px !important;
}
    .brands tr.thh {
        background: transparent;
        border-radius: none;
        border: none;
		padding: 4px !important;
    }
	.brands .dropdown-toggle::after {
		display: inline-block;
		margin-left: 0;
		vertical-align: 0;
		content: none;
		border-top: none;
		border-right: none;
		border-bottom: 0;
		border-left: none;
	}
    .brands tr {
        background: #fff;
        border-radius: 8px;
        border: 1px solid #EAEAEA;
    }
.profit-pie .datepicker, .profit-chrt .datepicker {
	width: 44%;
	float: right;
}
    .profit-pie, .profit-chrt {
	box-sizing: border-box;
	background: #FFFFFF;
	box-shadow: 1px 3px 13px 2px rgba(43, 43, 43, 0.09);
	border-radius: 5px;
	padding:10px;
	float: left;
	width: 100%;
}
.brands td {
	/* font-size: 12px; */
	/* padding: 4px !important; */
}
    .stats{
        /* display: grid;
        grid-template-columns: repeat(2, 1fr); */
    }    
    .stats-box.brand{
        background: linear-gradient(196deg, rgb(230 47 152) 0%, rgba(53,189,180,1) 100%);
    }
    .stats-box.clients{
        /* background-color: #E80F8B; */
        background: linear-gradient(196deg, rgb(66 182 225) 0%, rgba(232,15,139,1) 100%);
    }
    .stats-box.booking{
        /* background-color: #FBC91D; */
        background: linear-gradient(196deg, rgb(70 175 177) 0%, rgba(251,201,29,1) 100%);
    }
    .stats-box.prop{
        /* background-color: #22AEE2; */
        background: linear-gradient(196deg, rgb(245 206 72) 0%, rgba(34,174,226,1) 100%);
    }
   .stats-box {
    border-radius: 10px;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    padding: 40px 24px;
    margin: 0 10px 10px 0;
    position: relative;
}
.stats h2 {
	color: #fff;
	font-size: 26px;
	font-weight: bold;
	margin: 0 0 8px;
	line-height: 26px;
}
.stats h3 {
    color: #fff;
    font-size: 16px;
    font-weight: bold;
    margin: 0 0 14px;
    line-height: 13px;
}

    .stats p {
        color: #fff;
        font-size: 11px;
        margin: 0;
    }
	.datepicker #date {
	height: 38px;
	/* font-size: 12px; */
}
	.view {
		background: #35BDB4;
		border-radius: 5px;
		color: #fff;
		font-size: 12px;
		border: none;
		padding: 4px 9px;
		margin-right: 9px;
	}
	.view img {
		margin-right: 4px;
		position: relative;
		top: -2px;
	}
	.status {
		color: #35bdb4;
	}
	.xpl{
		background: transparent;
        border-radius: 0;
		font-size:12px;
		border:none;
	}.stats-img {
		position: absolute;
		right: 10px;
		width: 50px;
		height: auto;
	}
	.client-pic {
		float: left;
		width: 40px;
		margin-right: 10px;
	}.form-select.select-option {
	width: 45%;
	height: 38px;
	float: left;
	/* font-size: 12px; */
}
span.input-group-append span.input-group-text {
    height: 38px;
    padding-top: 10px;
}
.filter-row {
	float: left;
	width: 100%;
}
.action .btn {
	background: #ddd;
	border: none;
	box-shadow: none;
	padding: 3px 7px;
}
.action .btn:hover {
	background: #fa026f;
}
.filter-row2 {
	margin-bottom: 10px;
	float: left;
	width: 100%;
	border-bottom: 1px solid #d9d6d6;
	padding-bottom: 10px;
}
.enteries {
	float: left;
	width: 25%;
	display: flex;
	align-items: center;
	/* display: inline-flex; */
}.enteries label {
	/* font-size: 12px; */
	float: left;
	line-height: 23px;
}.enteries .form-select {
	/* font-size: 12px; */
	width: 200px;
	float: left;
	padding: 2px;
	margin: 0 5px;
	height: 38px;
}
.search-enteries{
	display: flex;
	align-items: center;
}
.search-enteries label {
	/* font-size: 12px; */
	margin-right: 5px;
	float: left;
	line-height: 21px;
}.search-enteries #search {
	/* font-size: 12px; */
	/* padding: 6px 9px;
	height: 24px; */
	border-radius: 5px;
	box-shadow: none;
	width: auto;
	float: left;
}
/* .search-enteries {
	width: 50%;
} */
/*Status Button*/
.switch {
	position: relative;
	display: inline-block;
	width: 37px;
	height: 17px;
}
.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}
.slider {
	position: absolute;
	cursor: pointer;
	top: 0;
	left: -5px;
	right: 1px;
	bottom: 0;
	background-color: #ccc;
	-webkit-transition: .4s;
	transition: .4s;
}
.slider::before {
	position: absolute;
	content: "";
	height: 13px;
	width: 13px;
	left: 1px;
	bottom: 2px;
	background-color: white;
	-webkit-transition: .4s;
	transition: .4s;
}
input:checked + .slider {
  background-color: #0ED953;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 38px;
}

.slider.round:before {
  border-radius: 50%;
}

/*Status Button End*/
</style>
@endsection
@section('content')
<div class="app-inner">
    <div class="row  mb-4">
	<div class="col-12">
            <div class="stats row mb-4">
			<div class="col-lg-3 col-md-4 col-sm-6">
                <div class="stats-box brand">                   
                    <h3>Total Pioneers</h3>
					 <h2>{{$pioneer_count}}+</h2>
                    <!-- <p>20% Increase  Last Week</p> -->
                </div>
				</div>
				<div class="col-lg-3 col-md-4 col-sm-6">
                <div class="stats-box clients">                    
                    <h3>Total Destinations</h3>
					<h2>{{$destination_count}}+</h2>
                    <!-- <p>50% Increase  Last Week</p> -->
                </div>
</div>
<div class="col-lg-3 col-md-4 col-sm-6">
                <div class="stats-box prop">                    
                    <h3>Contracts</h3>
					<h2>{{$contracts}}</h2>
                    <!-- <p>$2100 Increase  Last Week</p> -->
                </div>
</div>
<div class="col-lg-3 col-md-4 col-sm-6">
                <div class="stats-box booking">                    
                    <h3>Total No of Job Posted </h3>
					<h2>{{$job_count}}+</h2>
                    <!-- <p>80% Increase  Last Week</p> -->
                </div>
            </div>
			</div>
        </div>

        <div class="col-lg-6">		
            <div class="profit-pie p-4">		   
				   <form id="p_d_form">
				   <div class="filter-row mb-4">
					<div class="input_wpr">
                    <input type="text" class="form-control p_d_filter" name="value_from_start_date" placeholder="Start Date" value="{{date("d-m-Y", strtotime('first day of January '.date('Y') ))}}" data-datepicker="separateRange" autocomplete="off"  />
						<span class="input-group-append">
						  <span class="input-group-text bg-light d-block">
							<i class="fa fa-calendar"></i>
						  </span>
						</span>
                    </div>
					<div class="input_wpr">
						<input type="text" class="form-control p_d_filter" name="value_from_end_date" placeholder="End Date" value="{{date("d-m-Y")}}" data-datepicker="separateRange" autocomplete="off"/>
						<span class="input-group-append">
						  <span class="input-group-text bg-light d-block">
							<i class="fa fa-calendar"></i>
						  </span>
						</span>
                        </div>
						<button type="submit" class="btn_design btn">Filter</button>
			       </div> 
			   </form>
				   <!----Chart starts here-->
                     <canvas id="myChart" style="width:100%;"></canvas>	
					  <script>

					</script>	
                  <!----Chart Ends here-->					  
            </div>
        </div>
		<div class="col-lg-6">
			<div class="profit-pie p-4">	
			<form id="contrats_graph">	   
					<div class="filter-row mb-4">
                    <div class="input_wpr">
							<input type="text" class="form-control p_d_filter" name="value_from_start_date1" placeholder="Start Date" value="{{date("d-m-Y", strtotime('first day of January '.date('Y') ))}}" data-datepicker="separateRange1" autocomplete="off"  />
						<span class="input-group-append">
						  <span class="input-group-text bg-light d-block">
							<i class="fa fa-calendar"></i>
						  </span>
						</span>
                    </div>
                    <div class="input_wpr">
						<input type="text" class="form-control p_d_filter" name="value_from_end_date1" placeholder="End Date" value="{{date("d-m-Y")}}" data-datepicker="separateRange1" autocomplete="off"/>
						<span class="input-group-append">
						  <span class="input-group-text bg-light d-block">
							<i class="fa fa-calendar"></i>
						  </span>
						</span>
                    </div>
						<button type="submit" class="btn_design btn">Filter</button>
					</div>  
				</form>
                    <!----Chart starts here-->
                     <canvas id="myChart-earning" style="width:100%;"></canvas>		
                  <!----Chart Ends here-->					
			</div>
        </div>
    
    </div>
    <div class="row">
        <div class="col-lg-12">            
            <div class="brands p-4">
			<h6>Pioneer</h6>
                <table class="table">
                    <thead>
                        <tr class="thh">
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
							<th scope="col">Phone</th>
							<th scope="col">Status</th>
							<th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($pioneer->count() > 0)
                    	@foreach($pioneer as $key=>$p)
                        <tr class="row-status">
                            <td>{{$p->first_name}}</td>
                            <td>{{$p->last_name}}</td>
                            <td>{{$p->email}}</td>
							<td>{{$p->mobile_number}}</td>
							<td>
							<div class="switch-button switch-button-success switch-button-lg">
                                        <input type="checkbox" class="custom-control-input pioneer-status" name="status" id="status{{$key}}" data-id="{{$p->_id}}" {{$p->status==1 ? 'checked' : ''}} >
                                       <span><label for="status{{$key}}"></label></span>
                                     </div>
							</td>
							<td>
							<div class="btn-group action">
								<button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fa fa-list"></i>
								</button>
								<div class="dropdown-menu animated flipInY">
									<a class="dropdown-item" href="{{route('admin.pioneer.edit',$p->_id)}}">Edit</a>
									<a class="dropdown-item" href="{{route('admin.pioneer.view',$p->_id)}}">View</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="{{route('admin.pioneer.job',$p->_id)}}">Job</a>
								</div>
                            </div>

						</td>
                        </tr>
                        @endforeach
						@else
						<tr>
							<td colspan="6">No Data Found.</td>
						</tr>
						@endif

                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-12 mt-4">            
            <div class="brands p-4">
			<h6>Destination</h6>
                <table class="table">
                    <thead>
                        <tr class="thh">
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
							<th scope="col">Phone</th>
							<th scope="col">Status</th>
							<th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@if($destination->count() > 0)
                    	@foreach($destination as $key=>$d)
                        <tr class="row-status">
                            <td>{{$d->first_name}}</td>
                            <td>{{$d->last_name}}</td>
                            <td>{{$d->email}}</td>
							<td>{{$d->mobile_number}}</td>
							<td>
							<div class="switch-button switch-button-success switch-button-lg">
                                        <input type="checkbox" class="custom-control-input destination-status" name="status" id="statusd{{$key}}" data-id="{{$d->_id}}" {{$d->status==1 ? 'checked' : ''}} >
                                       <span><label for="statusd{{$key}}"></label></span>
                                     </div>
							</td>
							<td>
							<div class="btn-group action">
								<button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fa fa-list"></i>
								</button>
								<div class="dropdown-menu animated flipInY">
									<a class="dropdown-item" href="{{route('admin.destination.edit',$d->_id)}}">Edit</a>
									<a class="dropdown-item" href="{{route('admin.destination.view',$d->_id)}}">View</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="{{route('admin.destination.job',$d->_id)}}">Job</a>
								</div>
                            </div>

						</td>
                        </tr>
                        @endforeach
						@else
						<tr>
							<td colspan="6">No Data Found.</td>
						</tr>
						@endif

                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/moment.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/daterangepicker.min.js"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
	$("body").on('change', '.destination-status', function(){  
        val = $(this).is(":checked") ? 1 : 0; 
        id = $(this).attr('data-id');
        $.ajax({
               url : "{{route('admin.destination.status')}}",
               type: 'POST', 
               data: {id : id, status: val},  
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': "{{ csrf_token() }}"
               },
                beforeSend: function() {
                     $("body").find('.load_screen').show();                     
                },
                success: function (result) {
                       if(parseInt(result.status) == 1){
                        $("body").find('.load_screen').hide();
                        toastr.success(result.message);
                        
                        }
               },
               complete: function() {

               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

        });
    });

    $("body").on('change', '.pioneer-status', function(){  
        val = $(this).is(":checked") ? 1 : 0; 
        id = $(this).attr('data-id');
        $.ajax({
               url : "{{route('admin.pioneer.status')}}",
               type: 'POST', 
               data: {id : id, status: val},  
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': "{{ csrf_token() }}"
               },
                beforeSend: function() {
                     $("body").find('.load_screen').show();                     
                },
                success: function (result) {
                       if(parseInt(result.status) == 1){
                        $("body").find('.load_screen').hide();
                        toastr.success(result.message);
                        
                        }
               },
               complete: function() {

               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

        });
    });



$('body').on('submit','#p_d_form', function(e){
       e.preventDefault();
	graph_ajax();
          
  });

graph_ajax();
function graph_ajax(){
	$.ajax({
               url : "{{route('admin.p.d.graph')}}",
               type: 'GET', 
               data: $("#p_d_form").serialize(),  
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': "{{ csrf_token() }}"
               },
                beforeSend: function() {
                     $("body").find('.load_screen').show();                     
                },
                success: function (result) {
                	$("body").find('.load_screen').hide();
					if(result.status==1){
						p_d_graph(result)	
					}
					                       
               },
               complete: function() {

               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

        });
}

function p_d_graph(result){
	var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: result.key,
    datasets: [{
      label: 'Pioneers',
      data: result.pioneer,
      backgroundColor: "#fa006e"
    }, {
      label: 'Destinations',
      data: result.destination,
      backgroundColor: "#2f3232"
    }]
  }
});
}

$('body').on('submit','#contrats_graph', function(e){
       e.preventDefault();
	contracts_graph_ajax();
          
  });

contracts_graph_ajax();
function contracts_graph_ajax(){
	$.ajax({
               url : "{{route('admin.contract.graph')}}",
               type: 'GET', 
               data: $("#contrats_graph").serialize(),  
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': "{{ csrf_token() }}"
               },
                beforeSend: function() {
                     $("body").find('.load_screen').show();                     
                },
                success: function (result) {
                	$("body").find('.load_screen').hide();
					if(result.status==1){
						contracts_graph(result)	
					}
					                       
               },
               complete: function() {

               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

        });
}

function contracts_graph(result){
	var xValues = result.key;
              var yValues = result.contracts;

              new Chart("myChart-earning", {
                type: "line",
                data: {
                labels: xValues,
                datasets: [{
                  fill: false,
                  lineTension: 0.4,
                  backgroundColor: "rgba(0,0,255,1.0)",
                  borderColor: "rgba(0,0,255,0.1)",
                  data: yValues
                }]
                },
                options: {
                legend: {display: false},
                scales: {
                  yAxes: [{gridLines: { display: false}}],
                }
                }
              });
}


        

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
        //minDate: moment().add(1, 'days'),
        //maxDate: moment().add(0, 'days'),
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


            $('[data-datepicker=separateRange1]')
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
</script>
@endsection