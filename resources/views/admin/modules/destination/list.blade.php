<div class="table-body">
   	<table class="table dash-table table-striped">
         
   		<tr>
   			<th>First Name</th>
            <th>Last Name</th>
   			<th>Email</th>
   			<th>Phone</th>
            <th>Status</th>
            <th>Verification</th>
   			<th class="action-td">Action</th>
   		</tr>
   		@foreach($destination as $key=>$user)
         <tr>
   			<td>{{$user->first_name}}</td>
   			<td>{{$user->last_name}}</td>
   			<td>{{$user->email}}</td>
   			<td>{{$user->mobile_number}}</td>
            <td><div class="switch-button switch-button-success switch-button-lg">
                                        <input type="checkbox" class="custom-control-input status" name="status" id="status{{$key}}" data-id="{{$user->_id}}" {{$user->status==1 ? 'checked' : ''}} >
                                       <span><label for="status{{$key}}"></label></span>
                                     </div></td>

            <td>
                @if($user->admin_verification==0)
                <div class="switch-button verification-button switch-button-success switch-button-lg">
                                        
                                        <input type="checkbox" class="custom-control-input verification_status" name="verification" id="verification{{$key}}" data-id="{{$user->_id}}" {{$user->admin_verification==1 ? 'checked' : ''}} >
                                       <span><label for="verification{{$key}}"></label></span>
                                           </div>
                                       @else
                                       <label >Verified</label>
                                       @endif
                                 
                                 </td>                         
   			<td>
   				<ul class="action-btn-list">
   					
   			        <li><a href="{{route('admin.destination.edit',$user->_id)}}" class="icon-btn"><i class="fas fa-edit"></i></a></li>
   			        <li><a href="{{route('admin.destination.view',$user->_id)}}" class="icon-btn"><i class="far fa-eye"></i></a></li>
                    <li><a href="{{route('admin.destination.job',$user->_id)}}" class="icon-btn"><i class="fas fa-briefcase"></i></a></li>
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
   	<label><?=listing($count,$destination->currentPage(),$list) ?></label>

<div class="pagination-wrap text-center mt-3"> 
        {{$destination->links()}}
    </div>

   </div>