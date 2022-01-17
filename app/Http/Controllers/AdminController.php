<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
 use Illuminate\Session\Store;
use Illuminate\Http\Request;
use App\Models\Department;
class AdminController extends Controller
{
    public function index(){
        return view('child.dashboard')->with('departs',Department::all());
    }

public function add(Request $request){

$validated = request()->validate([
  'fullname' => 'required',
  'address'=>'required',
  'phone' => 'required',
  
]);
$add=Client::create([
  'fullname' => $validated['fullname'],
  'address' => $validated['address'],
    'phone' => $validated['phone'],

]);

if($add){
    return redirect()->back();
}
else{
    return "error";
}


    }




public function users(){
    $users=User::all('id','name','email','phone','role','address');
    return view('admin.users.user')->with('users',$users);
 }




public function user_delete($id){
 $users = User:: find($id);
if($users != null)
{
$users->delete();
Session::flash('info', 'User is deleted successfully'); 

return redirect()->back()->with(['message'=> 'Successfully deleted!']);
}
 }


 public function user_edit($id){
    $user=User::findorfail($id);
    if($user!= null){

    return view('admin.users.user-edit')->with('user',$user);
    }
 }
public function user_update(Request $request ,$id){
$user=User::find($id);
if($user){
$validated = request()->validate([
   'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'address'=>['required','string','max:25','min:8'],
            'phone'=>['required','string','min:10'],
            'role'=>['required']

]);

$user->name = $validated['name'];
$user->email = $validated['email'];
$user->address= $validated['address'];

$user->phone = $validated['phone'];
$user->role =  $validated['role'];

$user->password= Hash::make($validated['password']);
$user->save();
Session::flash('success', 'User is updated successfully'); 

 return redirect()->route('users.show');
}
else{
    Session::flash('warning', 'User is not updated '); 
 return redirect()->route('users.show');

}
}










public function tabs(){
        return view('child.tabs');
    }

}
