@foreach($escrow as $key=>$i)
@php $data = json_decode($i->data); @endphp
                <div class="invoice-card">
                    <div class=" flex-row">
                        <div class="flex-60">
                            <div class="invoiceToken">
                                Escrow #{{$i->_id}}
                            </div>
                            <div class="invoiceJob">
                            {{$i->job->title}}
                            </div>
                            <div class="invoiceJob">
                            {{$i->hire_type}}
                            </div>
                            
                        </div>
                        <div class="flex-25">
                            <div class="invoiceAmount">
                                ${{$i->escrow_amount}}
                            </div>
                        </div>
                        <div class="flex-15">
                             @if($i->admin_status==0)
                            <div class="invoicebtn-Wrapper">
                            <a href="javascript:void(0)" class="invoice-btn">Pending</a>
                            </div>
                            @else
                            <div class="paid-btn text-right">
                                <span class="paid-btn-text"><img src="{{url('pioneer/images/paidicon.png')}}" class="me-2"><h5 class="mb-0">Recieved</h5></span>
                                
                            </div>
                            @endif
                        </div>
                 </div>
                 
                </div>
@endforeach

@if($count==0)
            <div class="empty_text"> Data Found.</div>
                
            @endif

<?=listing($count,$escrow->currentPage(),$list) ?>

<div class="pagination-wrap text-center mt-3"> 
        {{$escrow->links()}}
    </div>