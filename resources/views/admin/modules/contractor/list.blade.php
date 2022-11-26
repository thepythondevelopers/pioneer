<div class="table-body">
   	<table class="table dash-table table-striped">
         
   		<tr>
   			<th>Name</th>
            <th>Job By</th>
   			<th>Hire Person</th>
   			<th class="action-td">Action</th>
   		</tr>
   		@foreach($job as $key=>$j)
         <tr>
   			<td>{{$j->title}}</td>
            <td>{{$j->created_user->first_name}}</td>
            <td>{{$j->hire_user->first_name}}</td>
            <td>
                <ul class="action-btn-list">
                    <li data-toggle="tooltip" data-placement="top" title="Escrow"><a href="{{route('admin.contractor.escrow',$j->_id)}}" class="icon-btn"><i class="far fa-eye"></i></a></li>
                    <li data-toggle="tooltip" data-placement="top" title="Invoices"><a href="{{route('admin.contractor.invoice',$j->_id)}}" class="icon-btn"><i class="fas fa-briefcase"></i></a></li>
                 </ul>
            </td>
   		</tr>
         @endforeach
   		

   	    @if($count==0)
            <tr>
                    <td colspan="5">No Data Found.</td>
            </tr>	
            @endif
   	</table>
   </div>
   <div class="table-footer">
   	<label><?=listing($count,$job->currentPage(),$list) ?></label>

<div class="pagination-wrap text-center mt-3"> 
        {{$job->links()}}
    </div>

   </div>