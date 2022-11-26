@extends('admin.layouts.layout')



@section('content')

<div class="dash-content-wrap">
    <h2 class="dash-title">Cms Pages</h2>
<div class="table-layout-wrap">
      <div class="table-body">
    <table class="table dash-table">
         
        <tr>
            <th>Sno</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        
            @foreach($cms as $key=>$c)
         <tr>
            <td>{{$key+1}}</td>
            <td>{{$c->title}}</td>
            <td>
                <ul class="action-btn-list">
                    
                    <li><a href="{{route('admin.cms.edit',$c->_id)}}" class="icon-btn"><i class="fas fa-edit"></i></a></li>
                    
                 </ul>
           </td>
        </tr>
        @endforeach
        
        

        

    </table>
   </div>

</div>
</div>
   @endsection
