<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\User;
use App\Models\Purpose;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PurposeController extends Controller
{
   
public function assign($id){

/*$client=Client::findorfail($id);
*/

$client=Client::with('department')->where('id',$id)->get()->first();

return view('admin.purpose.purpose')->with('client',$client);
}
public function add(Request $request,$id){
$validated = request()->validate([
  'purpose' => 'required|min:4',
   'reason'=>'nullable|string|min:4'
  
]);
$user = Auth::user();
$client=Client::findorfail($id);

Purpose::create([
    'department_id'=>$client->department_id,
    'user_id'=>$user->id,
    'client_id'=>$client->id,
    'purpose' => $validated['purpose'],
    'reason' => $validated['reason'],


]);
    return redirect()->route('client.show');

}
}
