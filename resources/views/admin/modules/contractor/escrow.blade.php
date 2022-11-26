@extends('admin.layouts.layout')



@section('content')

<div class="dash-content-wrap">
    <section class="inner-banner bg">
    <div class="container container-1440 innercontent_wrp">
        <h2>Escrow</h2>
    </div>
 </section>
    <section class="spending-section  p-40">
        <div class="container container-1440">
            <div class="invoice_tab flex-row mt-3 mb-2">
                <div class="invoice_tabItem flex-60">
                    Describtion
                </div>
                <div class="invoice_tabItem flex-25">
                    Amount
                </div>
                <div class="invoice_tabItem flex-15">
                    Status
                </div>
            </div>

            <div class="invoice_cardWrapper">
                @foreach($payment as $p)
                <div class="invoice-card">
                    <div class=" flex-row">
                    <div class="flex-60">
                        <div class="invoiceToken">
                             Id #{{$p->_id}}
                        </div>
                        <div class="invoiceJob">
                        {{$p->job->title}}
                        </div>
                        <div class="invoiceName">
                        {{$p->job->created_user->first_name}}
                        </div>
                    </div>
                    <div class="flex-25">
                        <div class="invoiceAmount">
                            ${{$p->escrow_amount}}
                        </div>
                    </div>
                    <div class="flex-15">
                        <div class="invoicebtn-Wrapper">
                            @if($p->admin_status==0)
                           <a href="javascript:void(0)" class="invoice-btn payment_button" data-id="{{$p->_id}}">Pending</a>
                           @else
                            <label>Recieved</label>
                           @endif
                           
                        </div>
                    </div>
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
    $("body").on('click', '.payment_button', function(){  
        
        $.ajax({
               url : "{{route('admin.contractor.escrow.status')}}",
               type: 'POST', 
               data: {id: $(this).attr('data-id')},  
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
                        setTimeout(function() {
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