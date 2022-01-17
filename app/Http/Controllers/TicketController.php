<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Department;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TicketController extends Controller
{
    public function index(){

        return view('admin.ticket.ticket');
    }


    public function client_show(){
 $departs=Department::all('id','department');
   $clients=Client::with('department')->get();
    return view('admin.ticket.ticket-client')->with(compact('clients','departs'));
   }

    public function ticket_select($id){

$client=Client::findorfail($id);

$client->ticket=1;
$client->save();

return view('admin.ticket.ticket-booking')->with('client',$client);
}

    public function ticket_booking(Request $request ,$id){



$validated = request()->validate([
  'date' => 'required',
  'departure'=>'required',
  'time' => 'required',
    'description' => 'sometimes',
'destination'=>'required',
/*  'department'=>'required'
*/]);
$ticket=Ticket::create([
  'date' => $validated['date'],
  'departure' => $validated['departure'],
    'destination' => $validated['destination'],
    'description' => $validated['description'],
    'time' =>Carbon::parse($validated['time'])->format('h:i:s'),



    'client_id' =>$id,

]);
    return redirect()->back();






}


public function ticket_confirm(){

    $tickets=Ticket::all();
    return view('admin.ticket.ticket-confirm')->with('tickets',$tickets);
}

public function ticket_delete($id){
$ticket=Ticket::findorfail($id);

return view('admin.ticket.ticket_update')->with('ticket',$ticket);

}
public function ticket_update($id){

$ticket=Ticket::findorfail($id);

return view('admin.ticket.ticket-update')->with('ticket',$ticket);


}

public function ticket_save(Request $request,$id){



$validated = request()->validate([
  'date' => 'required',
  'departure'=>'required',
  'time' => 'required',
    'description' => 'sometimes',
'destination'=>'required',
/*  'department'=>'required'
*/]);
$ticket=Ticket::create([
  'date' => $validated['date'],
  'departure' => $validated['departure'],
    'destination' => $validated['destination'],
    'description' => $validated['description'],
    'time' =>Carbon::parse($validated['time'])->format('h:i:s'),



    'client_id' =>$id,

]);

}
}