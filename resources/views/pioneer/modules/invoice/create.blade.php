@extends('pioneer.layouts.layout')



@section('content')

 <!-- Destination deatil -->
 <section class="inner-banner bg">
    <div class="container container-1440 innercontent_wrp">
        <h2>Invoice</h2>
    </div>
 </section>
 <div class="cstm-content-wrap">
    <div class="destination-profile p-60">
        <div class="container container-1440">
            <form class="icon-form" action="{{route('pioneer.invoice.save',$job->_id)}}" method="POST" id="create-invoice">
                    @csrf
                    <input type="hidden" name="total_amount" id="h_total_amount" value="">
                    <div class="row">

                        <div class="form-group  col-md-12 mb-xl-5 mb-md-4 mb-3">
                            <label class="label">Type</label>
                                <select name="type" id="jtype" class="form-control">
                                    <option value="Fixed">Fixed</option>
                                    <option value="Hourly">Hourly</option>
                                  </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4 mb-xl-5 mb-md-4 mb-3">
                            <label class="label">Role</label>
                            <input type="text" class="form-control"  placeholder="Role" name="description[]" >
                        </div>
                        <div class="form-group col-md-4 mb-xl-5 mb-md-4 mb-3">
                            <label class="label">Hours Work</label>
                            <input type="number" class="form-control qty hour_field"  placeholder="Hours Work" name="qty[]" disabled>
                        </div>
                        <div class="form-group col-md-4 mb-xl-5 mb-md-4 mb-3">
                            <label class="label">Rate</label>
                            <input type="text" class="form-control amount"  placeholder="Rate" name="amount[]" >
                        </div>

                    </div>
                    <div id="description_item"></div>
                    <div class="row">
                        <div class="form-group col-md-4 mb-xl-5 mb-md-4 mb-3">
                            <button type="button" id="add_more" onclick="addrow();">+add more item</button>
                        </div>
                        <div class="form-group col-md-4 mb-xl-5 mb-md-4 mb-3">
                            <label class="form-control">Total</label>
                        </div>
                        <div class="form-group col-md-4 mb-xl-5 mb-md-4 mb-3">
                            <label class="form-control" id="total_amount">00</label>
                        </div>

                    </div>
                    <div class="btn-wrapper">
                            <button type="submit" class="btn btn-lg push-right edit-btn">Submit</button>
                        </div>

            </form>            
            
        </div>
    </div>
</div>
    <!-- end desrinationdetail -->
@endsection

@section('scripts')
<script type="text/javascript">
//$(".amount").keypress(function(event) {
$(document).on("keypress", ".amount", function() {
        if (this.value.length == 0 && event.which == 48 ){
            return false;
        }
        return /\d/.test(String.fromCharCode(event.keyCode));
    });    
$(document).on("input", ".amount,.qty", function() {    
    $t = 0;
    type = $("#jtype").val();
    if(type=='Fixed'){
        $(".amount").each(function() {
            $t += $(this).val()=='' ? 0 : parseInt($(this).val());
        });
        $("#total_amount").text($t);
        $("#h_total_amount").val($t);
    }else{
        $(".amount").each(function() {
            qty = $(this).parent().parent().find('.qty').val()=='' ? 1 : $(this).parent().parent().find('.qty').val();
            $t += $(this).val()=='' ? 0 : parseInt($(this).val())*parseInt(qty);

        });
        $("#total_amount").text($t);
        $("#h_total_amount").val($t);
    }
});

$(document).on("click", ".remove", function() {    
    $t = 0;
    type = $("#jtype").val();
    if(type=='Fixed'){
        $(".amount").each(function() {
            $t += $(this).val()=='' ? 0 : parseInt($(this).val());
        });
        $("#total_amount").text($t);
        $("#h_total_amount").val($t);
    }else{
        $(".amount").each(function() {
            qty = $(this).parent().parent().find('.qty').val()=='' ? 1 : $(this).parent().parent().find('.qty').val();
            $t += $(this).val()=='' ? 0 : parseInt($(this).val())*parseInt(qty);

        });
        $("#total_amount").text($t);
        $("#h_total_amount").val($t);
    }
    
});

$('#jtype').on('change', function() {
  $t = 0;
    type = $("#jtype").val();
    if(type=='Fixed'){
        $(".hour_field").val('');
        $(".hour_field").attr('disabled','disabled');
        $(".amount").each(function() {
            $t += $(this).val()=='' ? 0 : parseInt($(this).val());
        });
        $("#total_amount").text($t);
        $("#h_total_amount").val($t);
    }else{
        $(".hour_field").removeAttr('disabled');
        $(".amount").each(function() {
            qty = $(this).parent().parent().find('.qty').val()=='' ? 1 : $(this).parent().parent().find('.qty').val();
            $t += $(this).val()=='' ? 0 : parseInt($(this).val())*parseInt(qty);

        });
        $("#total_amount").text($t);
        $("#h_total_amount").val($t);
    }
});
function addrow(){
        
        r = Math.random();
        $("#description_item").append('<div class="row"><div class="form-group col-md-4 mb-xl-5 mb-md-4 mb-3"><input type="text" class="form-control"  placeholder="Role" name="description['+r+']" required=""></div><div class="form-group col-md-4 mb-xl-5 mb-md-4 mb-3"><input type="number" class="form-control qty hour_field"  placeholder="Hours Work" name="qty['+r+']" required></div><div class="form-group col-md-4 mb-xl-5 mb-md-4 mb-3"><input type="text" class="form-control amount"  placeholder="Rate" name="amount['+r+']" required><input type="button" class="remove btn btn-primary" value="Remove" onclick="$(this).parent().parent().remove();"></div></div>');
        if($("#jtype").val()=='Fixed'){
            $(".hour_field").attr('disabled','disabled');
        }
    }    


         jQuery("form[id='create-invoice']").validate({
    rules: {
      'description[]':{
            required: true,
            nowhitespace: true,
            maxlength:55 
        }, 
        'qty[]':{
            required: true,
            nowhitespace: true  
        }, 
        'amount[]':{
            required: true,
            nowhitespace: true,
        }
    }
   });            
</script>
@endsection