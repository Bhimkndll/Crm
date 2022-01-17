@extends('admin.master')

@section('child_content')




            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Dashboard <small>Summary of your App</small>
                        </h1>
           <!--  <ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Library</a></li>
  <li class="active">Data</li>
</ol> -->
                    </div>
                </div>
        
        
                <!-- /. ROW  -->

                <div class="row">
                    @include('layouts.message')

                    <div class="col-md-3 col-sm-12 col-xs-12">

                        <a  data-toggle="modal" href="#exampleModal">
                        <div class="panel panel-primary text-center no-boder bg-color-blue blue">
                            <div class="blue">
                                <i class="fa fa-plus fa-5x"></i> 
                            </div>
                            
                                <h4>Add Client</h4>
                            
                        </div>
                        </a> 

                    </div>


 <div class="col-md-3 col-sm-12 col-xs-12">

   <a data-toggle="modal" data-target="#department">
                        <div class="panel panel-primary text-center no-boder bg-color-blue blue">
                            <div class="blue">
                                <i class="fa fa-plus fa-5x"></i> 
                            </div>
                            
                                <h4>Add Department</h4>
                            
                        </div>
                        </a>

                    </div>


                </div>
        
    
    <div class="row">
      <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel">
            <h4>Customers</h4>
            <div class="easypiechart" id="easypiechart-blue" data-percent="82" ><span class="percent">82%</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel">
            <h4>Sales</h4>
            <div class="easypiechart" id="easypiechart-orange" data-percent="55" ><span class="percent">55%</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel">
            <h4>Profits</h4>
            <div class="easypiechart" id="easypiechart-teal" data-percent="84" ><span class="percent">84%</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel">
            <h4>No. of Visits</h4>
            <div class="easypiechart" id="easypiechart-red" data-percent="46" ><span class="percent">46%</span>
            </div>
          </div>
        </div>
      </div>
    </div><!--/.row-->
        
        
                <div class="row">
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Bar Chart Example
                            </div>
                            <div class="panel-body">
                                <div id="morris-bar-chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Donut Chart Example
                            </div>
                            <div class="panel-body">
                                <div id="morris-donut-chart"></div>
                            </div>
                        </div>
                    </div>

                </div>
        <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              Area Chart
            </div>
            <div class="panel-body">
              <div id="morris-area-chart"></div>
            </div>
          </div>  
          </div>    
        </div>  
                <!-- /. ROW  -->

     
        
        
        
                
                <!-- /. ROW  -->
                <!-- start for add customer -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Add Customer</h4>
      </div>
      <div class="modal-body">



      <form  id="targets" action="{{route('client.register')}}" method = "post">
                {{ csrf_field() }}

          <div class="form-group">
<label for="recipient-name" class="control-label">FullName:</label>
            <input type="text" class="form-control" id="recipient-name" name="fullname" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Address:</label>
            <input type="text" class="form-control" id="message-text" name="address" required>
          </div>


      
           <div class="form-group">
            <label for="message-text" class="control-label">Phone:</label>
            <input type="text" class="form-control" id="message-text"name="phone" required>
          </div>

<!-- 

<div class="form-group">
    <label class="input-group-text" for="inputGroupSelect01">Purpose</label>


  <select class="custom-select form-control" name="department">

@foreach($departs as $depart)

    <option selected value="{{$depart->id}}">{{$depart->department}}</option>
   
@endforeach

  </select>
</div>
 -->
           <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary"id="targets">
      </div>
        </form>
      </div>
     
    </div>
  </div>
</div>

<!-- end for  add customer -->
<!-- modal for department -->


@include('admin.departments.department-add')

<!--  -->


        <footer><p>All right reserved. &copy; {{ now()->year }} Powered By: <a href="https://www.bitmapitsolution.com">Bitmap I.T. Solution Pvt. Ltd.</a></p></footer>
            </div>

       

@endsection