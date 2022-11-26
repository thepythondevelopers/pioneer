@extends('destination.layouts.layout')



@section('content')
<section class="inner-banner bg">
    <div class="container container-1440 innercontent_wrp">
        <h2>Job detail</h2>
    </div>
</section>
    <!-- Start Job Details Section -->
    <div class="job-detail p-60">
        <div class="container container-1440">        
            <div class="job-detail-card  shadow br-10 d-flex align-items-center p-4 border-radius">
                <div class="row">
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                            <div class="job-detail-title fz-16 fw-bold">
                                Job Title
                            </div>
                            <p class="fz-14">{{$job->title}}</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                        <div class="job-detail-title fz-16 fw-bold">
                                Escrow Amount
                            </div>
                            <p class="fz-14">{{$escrow->escrow_amount}}</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                        <div class="job-detail-title fz-16 fw-bold">
                               Hire Type
                            </div>
                            <p class="fz-14">{{$escrow->hire_type}}</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                        <div class="job-detail-title fz-16 fw-bold">
                                Status
                            </div>
                            <p class="fz-14">{{$escrow->admin_status==0 ? 'Pending' : 'Received'}}</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                        <div class="job-detail-title fz-16 fw-bold">
                                Amount Spent
                            </div>
                            <p class="fz-14">{{$amount_spent}}</p>
                        </div>
                    </div>
                   <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="job-detail-cont">
                        <div class="job-detail-title fz-16 fw-bold">
                                Amount Pending in Invoice
                            </div>
                            <p class="fz-14">{{$amount_pending}}</p>
                        </div>
                    </div>
                    
                </div>
                @if($invoice->count() > 0)
                @foreach($invoice->get() as $key=>$i)
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
                                ${{$i->total_amount}}
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
                                        <th>Qty</th>
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
                                    <div class="invoiceJob">${{$i->total_amount}}</div>
                                </div>

                            </div>
                        </div>
                    </div>
                    </div>
                    <!-- end item -->
                </div>
                </div>
@endforeach

@else
            <div class="empty_text"> No Invoice Found.</div>
                
            @endif
            </div>

            
            
        </div>
    </div>
    <!-- End Job Detail Section -->
@stop
