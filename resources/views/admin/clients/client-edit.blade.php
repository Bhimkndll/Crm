@extends('admin.master')

@section('child_content')


    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Update Client</h4>
      </div>
      <div class="modal-body">
@include('layouts.message')



      <form  id="targets" action="{{route('client.update',['id'=>$client->id])}}" method = "post">
                {{ csrf_field() }}

          <div class="form-group">
<label for="recipient-name" class="control-label">FullName:</label>
            <input type="text" class="form-control" id="recipient-name"value="{{$client->fullname}}" name="fullname" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Address:</label>
            <input type="text" class="form-control" id="message-text" value="{{$client->address}}" name="address" required>
          </div>


      
           <div class="form-group">
            <label for="message-text" class="control-label">Phone:</label>
            <input type="text" class="form-control" id="message-text"value="{{$client->phone}}"name="phone" required>
          </div>



<div class="form-group">
    <label class="input-group-text" for="inputGroupSelect01">Purpose</label>


<select class="custom-select form-control" name="department">
@foreach($departs as $depart)



<option  value="{{$depart->id}}"

{{($client->department_id==$depart->id)?"selected":''}}


  >{{$depart->department}}</option>
@endforeach
</select>
</div>

           <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary"id="targets">
      </div>
        </form>
      </div>
     
    </div>
  
@endsection