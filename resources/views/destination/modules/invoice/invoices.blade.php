@extends('destination.layouts.layout')



@section('content')
 <!-- Start Spending section -->
 <section class="inner-banner bg">
    <div class="container container-1440 innercontent_wrp">
        <h2>My Spending</h2>
    </div>
 </section>
    <section class="spending-section  p-40">
        <div class="container container-1440">
            <form id="filter-invoice" data-action="{{route('destination.invoices.list')}}">
            <div class="destination_job_btns">
               
                <div class="btn nav-link ">
                    <select class=" job-target" name="job">
                          <option value="">Job Title</option>
                          <option value="">All</option>
                            @foreach($job as $key=>$v)
                            <option value="{{$v->_id}}">{{$v->title}}</option>
                            @endforeach
                      </select>
                </div>
                 
              
             
                <div class="btn nav-link ">
                        <select class=" paid-target" name="paid">
                          <option value="all">Status</option>
                          <option value="all">All</option>
                          <option value="0">Un-Paid</option>
                          <option value="1">Paid</option>
                        </select>	
</div>

<div class="btn nav-link ">
                        <select class="type-target" name="type">
                          <option value="invoice">Payments</option>
                          <option value="escrow">Escrow</option>

                        </select>   
</div>			
              
					
               
                <!-- <div class="col-sm-4">
                <div class="dropdown dark-btn">
                    <button type="button" class="invoice-btn">Pay</button>
                    </div>
                </div> -->
            </div>
        </form>
            <div class="invoice_tab flex-row mt-3 mb-2">
                <div class="invoice_tabItem flex-60">
                    Description
                </div>
                <div class="invoice_tabItem flex-25">
                    Amount
                </div>
                <div class="invoice_tabItem flex-15 text-right">
                    Status
                </div>
            </div>

            <div class="invoice_cardWrapper invoice-list">
            </div>
           
        </div>
    </section>
    <!-- end spending section -->
@endsection

@section('scripts')
   <script type="text/javascript">
      $(document).on('click', '.pagination a', function(event){
  event.preventDefault(); 
  var $url = $( this ).attr('href');
   
    filterFormAjax($url);
 });
$(document).on('change', '.paid-target,.job-target,.type-target', function(event){
    filterFormAjax();
});



filterFormAjax();
 function filterFormAjax($url=0) {


  var $this = $("body").find('#filter-invoice');
  var url = $url == 0 ? $this.attr('data-action') : $url;
  
      $.ajax({
               url : url,
               type: 'GET', 
               data:$this.serialize(),  
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
                beforeSend: function() {
                     $("body").find('.load_screen').show();                     
                },
                success: function (result) {
                       if(parseInt(result.status) == 1){
                        $("body").find('.load_screen').hide();
                        $("body").find('.invoice-list').html(result.html);
                        
                        }
               },
               complete: function() {

               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

        });
}
</script>

@endsection