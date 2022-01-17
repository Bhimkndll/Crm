<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Purpose;
use Illuminate\Support\Facades\Session;

class PurposeController extends Controller
{
      public function add(Request $request){

$validated = request()->validate([
  'name' => 'required',
 
  
]);
$add=Purpose::create([
  'name' => $validated['name'],
  
]);

if($add){
    Session::flash('success','Successfully inserted');
    return redirect()->back();
}
else{
    
        Session::flash('error','error occurred');
    }}

public function show(){
    $purposes=Purpose::all('name','id');
    return view('admin.purpose.Purpose')->with('purposes',$purposes);
}

public function purpose_delete($id){
 $depart = Purpose:: find($id);
if($depart != null)
{
$depart->delete();
Session::flash('info', 'Purpose is deleted successfully'); 

return redirect()->back()->with(['message'=> 'Successfully deleted!']);
}
 }


 public function purpose_edit($id){
    $purpose=Purpose::findorfail($id);
    if($purpose!= null){

    return view('admin.purpose.purpose-edit')->with('purpose',$purpose);
    }
 }

public function purpose_update(Request $request ,$id){
$Purpose=Purpose::find($id);
if($Purpose){
$validated = request()->validate([
   'name' => ['required', 'string', 'max:255'],
           
]);

$Purpose->name = $validated['name'];

$Purpose->save();
Session::flash('success', 'Purpose is updated successfully'); 

 return redirect()->route('purpose.show');
}
else{
    Session::flash('warning', 'Purpose is not updated '); 
 return redirect()->route('Purpose.show');

}
}











}
