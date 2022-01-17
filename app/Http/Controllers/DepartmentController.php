<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\Session;

class DepartmentController extends Controller
{
      public function add(Request $request){

$validated = request()->validate([
  'department' => 'required',
 
  
]);
$add=Department::create([
  'department' => $validated['department'],
  
]);

if($add){
    Session::flash('success','Successfully inserted');
    return redirect()->back();
}
else{
    
        Session::flash('error','error occurred');
    }}

public function show(){
    $departs=Department::all('department','id');
    return view('admin.departments.department')->with('departs',$departs);
}

public function department_delete($id){
 $depart = Department:: find($id);
if($depart != null)
{
$depart->delete();
Session::flash('info', 'Department is deleted successfully'); 

return redirect()->back()->with(['message'=> 'Successfully deleted!']);
}
 }


 public function department_edit($id){
    $depart=Department::findorfail($id);
    if($depart!= null){

    return view('admin.departments.department-edit')->with('depart',$depart);
    }
 }

public function department_update(Request $request ,$id){
$Department=Department::find($id);
if($Department){
$validated = request()->validate([
   'department' => ['required', 'string', 'max:255'],
           
]);

$Department->department = $validated['department'];

$Department->save();
Session::flash('success', 'Department is updated successfully'); 

 return redirect()->route('department.show');
}
else{
    Session::flash('warning', 'Department is not updated '); 
 return redirect()->route('department.show');

}
}











}
