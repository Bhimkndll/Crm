extends('admin.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
   @foreach($clients as $client)

{{$client->fullname}}
   @endforeach

   </div>
</div>
</div>

@endsection
