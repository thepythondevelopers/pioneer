@extends('admin.layouts.layout')



@section('content')

<div class="dash-content-wrap">
    <h2 class="dash-title">Destination</h2>
<div class="table-layout-wrap">
      <form id="formFilter" class="" data-action="{{route('admin.destination.list')}}">
   <div class="table-head">
   	<div class="table-select"><label>Show</label><select class="entries-select" name="list"><option>10</option> <option>20</option></select><label>Entries</label></div>
   	<div class="serch-box"><label>Search</label><input type="text" name="search" id="search" class="table-search p-2"></div>
   </div>
   </form>
  <div id="table-wrap">
   
</div>
</div>
</div>
   @endsection

   @section('scripts')
   <script type="text/javascript">
    var socket = io("{{socket_ip()}}");
      $(document).on('click', '.pagination a', function(event){
  event.preventDefault(); 
  var $url = $( this ).attr('href');
   
    filterFormAjax($url);
 });
      $("body").on('keyup','input[id=MainSearch]',function(){
   var $form = $("body").find('#formFilter');
   $form.find('input[name=search]').val($(this).val());
  filterFormAjax();    
});

   $("#search").keyup(function(){
     filterFormAjax();    
});

      filterFormAjax();
function filterFormAjax($url=0) {


  var $this = $("body").find('#formFilter');
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
                        $("body").find('#table-wrap').html(result.html);
                        
                        }
               },
               complete: function() {

               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

        });
}

 
 $("body").on('change', '.status', function(){  
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

 $("body").on('change', '.verification_status', function(){  
        val = $(this).is(":checked") ? 1 : 0; 
        id = $(this).attr('data-id');
        $(this).prop("disabled", true);
        $.ajax({
               url : "{{route('admin.destination.verification')}}",
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
                        socket.emit('notification', 'notification');
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


