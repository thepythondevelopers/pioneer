
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
                            
                        </div>
                        <div class="flex-25">
                            <div class="invoiceAmount">
                                {{currency_symbol()}}{{$i->total_amount}}
                            </div>
                        </div>
                        <div class="flex-15">
                             @if($i->paid==0)
                            <div class="invoicebtn-Wrapper">
                            <a href="javascript:void(0)" class="invoice-btn">Un-Paid</a>
                            </div>
                            @else
                            <div class="paid-btn text-right">
                                <span class="paid-btn-text"><img src="{{url('pioneer/images/paidicon.png')}}" class="me-2"><h5 class="mb-0">Paid</h5></span>
                                <span class="invoicedate">on {{$i->paid_date}}</span>
                            </div>
                            @endif
                        </div>
                 </div>
                 <div class="accordion accordion-flush" id="accordionFlushExample">
                    <!-- start item -->
                    <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed p-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$key}}" aria-expanded="false" aria-controls="flush-collapse{{$key}}">
                        </button>
                    </h2>
                    <div id="flush-collapse{{$key}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$key}}" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="flex-row">
                                <table class="inv_detail" width="99.4%">
                                    <tr>
                                        <th>Description</th>
                                        <th>Hours</th>
                                        <th>Amout</th>
                                    </tr>
                                    @foreach($data as $k=>$d)
                                        <tr>
                                            <td>{{$d->description}}</td>
                                            <td>{{$d->qty}}</td>
                                            <td>{{$d->amount}}</td>
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

                            </div>
                        </div>
                    </div>
                    </div>
                    <!-- end item -->
                </div>
                </div>
@endforeach

@if($count==0)
            <label class="text-center py-5 w-100">No Data Found.</label>
           
            @endif

<?=listing($count,$invoice->currentPage(),$list) ?>

<div class="pagination-wrap text-center mt-3"> 
        {{$invoice->links()}}
    </div>