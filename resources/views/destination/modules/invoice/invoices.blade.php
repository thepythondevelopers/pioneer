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
<!-- <script>
var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script> -->

@endsection