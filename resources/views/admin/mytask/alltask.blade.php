  
@extends('admin.mytask.mytask')

@section('table_content')




  <div class="table-responsive">
                                 
                        
                            
                                <table class="table table-striped table-bordered table-hover" id="tabledatas">
                                    <thead>
                                        <tr>
                                         <th>SN:</th>

                                             <th>ClientName</th>
                                            <th>Department</th>
                                            <th>Purpose</th>
                                            <th>User</th>

                                            <th>Action</th>


                                        </tr>
                                    </thead>
                                    <tbody>

                                 @foreach($tasks as $task)
                                        <tr class="odd gradeX">
                                        <td>{{$loop->iteration}}</td>

                                         <td>{{$task->client->fullname}}</td>
                                            <td>{{$task->department->department}}</td>
                                            <td>{{$task->purpose}}</td>
                                            <td>{{$task->user->name}}</td>

                                            <td class="center">
                                                
                                                <a class="btn btn-sm btn-primary" href="{{route('mytask.completed',['id'=>$task->id])}}"><i class="fa fa-check fa-2x"></i></a>
                                                
                                                <a class="btn btn-sm btn-danger" href="{{route('mytask.processing',['id'=>$task->id])}}"><i class="fa fa-gear fa-spin fa-2x"></i></a>
                                                  
                                                    <a class="btn btn-sm btn-danger" href="{{route('mytask.pending',['id'=>$task->id])}}"><i class="fa fa-refresh fa-spin fa-2x"></i></a>
                                                     
                                                     <a class="btn btn-sm btn-danger" href="{{route('mytask.cancelled',['id'=>$task->id])}}"><i class="fa fa-times fa-2x"></i> </a>


                                            </td>

 
                                        </tr>

@endforeach

                                    </tbody>
                                </table>
                            </div>
@endsection