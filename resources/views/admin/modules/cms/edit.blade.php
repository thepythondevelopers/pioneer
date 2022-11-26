@extends('admin.layouts.layout')



@section('content')
<div class="dash-content-wrap">
	 
                                    <form id="profile-form" method="POST" action="{{route('admin.cms.update',$cms->_id)}}" enctype="multipart/form-data">
                                        @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="input-icon-wrpper">
                                    
                                    <input type="text" name="title" value="{{$cms->title}}" class="form-control" autocomplete="off" placeholder="Title">
                                 
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Content</label>
                                    <textarea class="form-control" name="content" autocomplete="off" >{{$cms->content}}</textarea>
                                </div>
                            </div> 
                            <div class="cstm-btn-group my-4">
                                                          <button type="submit" class="edit-btn btn popup-btn min200">Submit</button>
                                                </div>                            
                                    </div>
                                </form>
                            

</div>

                                


@endsection

@section('scripts')

<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace( 'content' );

    
</script>
@endsection