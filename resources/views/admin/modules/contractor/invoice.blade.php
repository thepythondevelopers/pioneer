@extends('admin.layouts.layout')



@section('content')
<div class="dash-content-wrap">

    <section class="inner-banner bg">
    <div class="container container-1440 innercontent_wrp">
        <h2>Invoices</h2>
    </div>
 </section>
    <section class="spending-section  p-40">
        <div class="container container-1440">
            <div class="invoice_tab flex-row mt-3 mb-2">
                <div class="invoice_tabItem flex-60">
                    Description
                </div>
                <div class="invoice_tabItem flex-25">
                    Amount
                </div>
                <div class="invoice_tabItem flex-15 ">
                    Status
                </div>
            </div>

            <div class="invoice_cardWrapper">
                @foreach($invoice as $key=>$i)
                @php $data = json_decode($i->data); @endphp
                <div class="invoice-card">
                    <div class=" flex-row">
                    <div class="flex-60">
                        <div class="invoiceToken">
                             Invoice #{{$i->_id}}
                        </div>
                        <div class="invoiceJob">
                        {{$i->job->title}}
                        </div>
                        <!-- <div class="invoiceName">
                        Chris Forbes
                        </div> -->
                    </div>
                    <div class="flex-25">
                        <div class="invoiceAmount">
                            {{$i->total_amount}}
                        </div>
                    </div>
                    <div class="flex-15">
                        <div class="invoicebtn-Wrapper">
                            @if($i->paid==0)
                           <a href="javascript:void(0)" class="invoice-btn invoice-pay" data-action="{{route('admin.contractor.invoice.pay',$i->_id)}}">Pay</a>
                           @else
                           <div class="paid-btn text-right">
                                <span class="paid-btn-text"><img src="{{url('pioneer/images/paidicon.png')}}" class="me-2"><h5 class="mb-0">Paid</h5></span>
                                <span class="invoicedate">on {{$i->paid_date}}</span>
                            </div>
                           @endif 
                           <!-- <a href="#" class="invoice-btn">Export</a> -->
                        </div>
                    </div>
                 </div>
                 <div class="accordion accordion-flush" id="accordionFlushExample">
                    <!-- start item -->
                    <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed p-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$key}}" aria-expanded="false" aria-controls="flush-collapse{{$key}}">
                        </button>
                    </h2>
                    <div id="flush-collapse{{$key}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="flex-row">
                                <table class="inv_detail" width="99.4%">
                                    <tr>
                                        <th>Description</th>
                                        <th>Amout</th>
                                        <th>Hours</th>
                                    </tr>
                                    @foreach($data as $k=>$d)
                                        <tr>
                                            <td>{{$d->description}}</td>
                                            <td>{{$d->amount}}</td>
                                            <td>{{$d->qty}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                                </div>
								<div class="flex-row">                                
									<div class="flex-60 white-box mt-2 ms-0">
										<div class="invoiceJob">Total</div>
									</div>
                                <div class="flex-20 white-box mt-2">
                                    <div class="invoiceJob">{{currency_symbol()}}{{$i->total_amount}}</div>
                                </div>
<!--                                 <div class="flex-20  flex-grow white-box mt-2">
                                    <div class="invoiceJob">$100</div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    </div>
                    <!-- end item -->
                </div>
                </div>
                @endforeach

                
                
            </div>
           
        </div>
    </section>
</div>
@stop

@section('scripts')
<script type="text/javascript">
    var socket = io("{{socket_ip()}}");
    $("body").on('click', '.invoice-pay', function(){  
        $.ajax({
               url : $(this).attr('data-action'),
               type: 'POST', 
               
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
                        socket.emit('notification', 'notification');
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                        
                        }
               },
               complete: function() {

               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

        });
    });
</script>
@endsection