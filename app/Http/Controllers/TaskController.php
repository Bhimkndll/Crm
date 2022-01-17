<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Taskassign;
use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function show(){
$users=User::all('id','name');
$clients=Client::with('taskassign','department')->get();
return view('admin.task.task')->with(compact('clients','users'));

    }

    /*for specific client task*/
    public function mytask(){
    
    $tasks=Taskassign::with('user','department','client')->where(['user_id'=>Auth::id(),'status'=>"pending"])->get();
      return view('admin.mytask.mytask')->with('tasks',$tasks);  



    }




public function alltask($id){
if($id=="completed"){
$tasks=Taskassign::with('user','department','client')->where(['user_id'=>Auth::id(),'status'=>$id])->get();
return view('admin.mytask.alltask')->with('tasks',$tasks);    
}
else {
    abort(404);

}

}




public function all($id){

if($id=="All"){

$tasks=Taskassign::with('user','department','client')->where(['user_id'=>Auth::id()])->get();
return view('admin.mytask.alltask',compact('tasks'));    
}
elseif(in_array($id,array('Pending','Completed','Cancelled','Processing')))
{ 
 $tasks=Taskassign::with('user','department','client')->where(['user_id'=>Auth::id(),'status'=>$id])->get();
return view('admin.mytask.alltask',compact('tasks'));       
}
else{

    abort(404);
}
}






public function complete($id){
$task=Taskassign::findorfail($id);
$task->status = "completed";
$task->save();
return redirect()->back();
}
public function cancel($id){


$task=Taskassign::findorfail($id);
$task->status = "cancelled";
$task->save();
return redirect()->back();

}
public function processing($id){


$task=Taskassign::findorfail($id);
$task->status = "processing";
$task->save();
return redirect()->back();

}

public function pending($id){


$task=Taskassign::findorfail($id);
$task->status = "pending";
$task->save();
return redirect()->back();

}



}