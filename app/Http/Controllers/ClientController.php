<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
 use Illuminate\Session\Store;
 use App\Models\Department;
  use App\Models\Taskassign;
  use App\Models\Ticket;



class ClientController extends Controller
{
   public function show(){
 $departs=Department::all('id','department');
   $clients=Client::with('department')->get();
    return view('admin.clients.client')->with(compact('clients','departs'));
   }

public function add(Request $request){


$validated = request()->validate([
  'fullname' => 'required',
  'address'=>'required',
  'phone' => 'required',
/*  'department'=>'required'
*/]);
$add=Client::create([
  'fullname' => $validated['fullname'],
  'address' => $validated['address'],
    'phone' => $validated['phone'],
/*    'department_id' => $validated['department'],
*/
]);
    return redirect()->back();



}



 public function client_edit($id){
    $client=Client::findorfail($id);
    $departs=Department::all();
    if($client!= null){

   return view('admin.clients.client-edit')->with(compact('client','departs'),'department');
    }
     
 }


public function client_delete($id){
 $client = Client:: find($id);
if($client != null)
{
$client->delete();
return redirect()->back()->with('info','Successfully deleted!');
}
 }




public function client_update(Request $request ,$id){
$client=Client::find($id);
if($client){
$validated = request()->validate([
   'fullname' => ['required', 'string', 'max:255'],
           
            'address'=>['required','string','max:25','min:3'],
            'phone'=>['required','string','min:10'],
            'department'=>['required']

]);

$client->fullname = $validated['fullname'];
$client->address = $validated['address'];
$client->phone= $validated['phone'];

$client->department_id = $validated['department'];

$client->save();
Session::flash('success', 'Client is updated successfully'); 

 return redirect()->route('client.show');
}
else{
    Session::flash('warning', 'Client is not updated '); 
 return redirect()->route('client.show');

}
}


public function detail($id){
    $client=Client::findorfail($id);

$visit=Taskassign::where('client_id',$id)->get()->count();

$ticket=Ticket::where('client_id',$id)->get()->count();

/*$client=Client::with('taskassign','ticket')->get()->count();
*/
return view('admin.clients.client-detail')->with(compact('visit','ticket'));

}








}