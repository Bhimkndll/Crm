<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Purpose;
use App\Models\Client;
use App\Models\Taskassign;

use App\Models\Department;
use Illuminate\Http\Request;

class TaskassignController extends Controller
{
    public function show($id){
      $client=Client::findorfail($id);


        $users=User::all('id','name');
        $departs=Department::all('id','department');
        $purposes=Purpose::all('id','name');
        return view('admin.taskassign.task-add')->with(compact('users','departs','purposes','client'));
    }



public function add(Request $request,$id){

$client=Client::findorfail($id);
$validated = request()->validate([
    'department'=>'required',
        'user'=>'required',
         'purpose' => 'required',
          'reason'=>'nullable|string|min:4'
  ]);
Taskassign::create([
    'department_id'=> $validated['department'],
    'user_id'=> $validated['user'],
    'client_id'=> $client->id,
    'purpose' => $validated['purpose'],
    'status'=>"pending",
]);
    return redirect()->route('client.show');

}





}
