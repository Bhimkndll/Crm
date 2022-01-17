@extends('admin.master')

@section('child_content')


    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
        <h4 class="modal-title" id="exampleModalLabel">Purpose</h4>
      </div>
      <div class="modal-body">
@include('layouts.message')



      <form  id="targets" action="{{route('client.purpose.add',['id'=>$client->id])}}" method = "post">
                {{ csrf_field() }}
<div class="form-group">
    <label for="exampleFormControlTextarea1">Purpose</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="purpose"></textarea>
  </div>

      <div class="form-group">
    <label for="exampleFormControlTextarea1">Reason</label>
    <textarea class="form-control" id="exampleFormControlTextarea2" rows="2" name="reason"></textarea>
  </div>

        

           <div class="modal-footer">
        <input type="submit" class="btn btn-primary"id="targets">
      </div>
        </form>
      </div>
     
    </div>
  
@endsection