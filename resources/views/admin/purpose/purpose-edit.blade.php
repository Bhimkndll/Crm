@extends('admin.master')

@section('child_content')



            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Edit Department <small></small>
                        </h1>
           <!--  <ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Library</a></li>
  <li class="active">Data</li>
</ol> -->
                    </div>
                </div>
        
  <div class="modal-body Department-update">
<script type="text/javascript">toastr.info('Are you the 6 fingered man?')
</script>

@include('layouts.message')

      <form  id="targets" action="{{route('purpose.update',['id'=>$purpose->id])}}" method = "post">
                {{ csrf_field() }}

          <div class="form-group">
<label for="recipient-name" class="control-label">Department:</label>
            <input type="text" class="form-control" id="recipient-name8" name="name" value="{{$purpose->name}}">
          </div>
          
           <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary"id="targets">
      </div>
        </form>
      </div>
  </div>
@endsection