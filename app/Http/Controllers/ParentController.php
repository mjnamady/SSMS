<?php

namespace App\Http\Controllers;

use App\Models\Parents;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ParentController extends Controller
{
    public function ParentDashboard()
    {
        return view('parent.parent_dashboard');
    } // End method


    public function AllParents(){
        $parents = User::where('role', 'Parent')->orderBy('id', 'DESC')->get();
        return view('admin.parent.all_parents_view', compact('parents'));
    } // End Method

    public function AddParent(){
        return view('admin.parent.add_parent');
    } // End Method

    public function StoreParent(Request $request){

        $parent = new User();
        $parent->first_name = $request->first_name;
        $parent->last_name = $request->last_name;
        $parent->email = $request->email;
        $parent->address = $request->address;
        $parent->gender = $request->gender;
        $parent->religion = $request->religion;
        $parent->phone = $request->phone;
        $parent->role = "Parent";
        $parent->password = Hash::make('1234');
        $parent->created_at = Carbon::now();

        if($request->hasFile('photo'))
        {
            $file = $request->file('photo');
            $imageName = 'Parent'. date('YmdHi') . '.' .$file->getClientOriginalExtension();
            if(!empty($parent->photo)){
                unlink('uploads/parents/'.$parent->photo);
            }
            $file->move(public_path('uploads/parents/'),$imageName);
            $parent['photo'] = $imageName;
        }

        $parent->save();

        if(!empty($request->student_code)){
            Student::where('id_no', $request->student_code)->update(['parent_id'=>$parent->id]);
        }

        $notification = array(
            'message' => 'Parent Registration is Completed!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.parents')->with($notification);
    } // End Method

    public function ParentProfile($id){
        $parentDetails = User::findOrFail($id);
        $children = Student::where('parent_id', $id)->orderBy('user_id', 'DESC')->get();
        return view('admin.parent.parent_profile', compact('parentDetails', 'children'));
    } // End Method

    public function EditParent($id){
        $parent = User::find($id);
        return view('admin.parent.edit_parent', compact('parent'));
    } // End Method

    public function UpdateParent(Request $request, $id){

        $parent = User::findOrFail($id);
        $parent->first_name = $request->first_name;
        $parent->last_name = $request->last_name;
        $parent->email = $request->email;
        $parent->address = $request->address;
        $parent->gender = $request->gender;
        $parent->religion = $request->religion;
        $parent->phone = $request->phone;
        $parent->updated_at = Carbon::now();

        if($request->hasFile('photo'))
        {
            $file = $request->file('photo');
            $imageName = 'Parent'. date('YmdHi') . '.' .$file->getClientOriginalExtension();
            if(!empty($parent->photo)){
                unlink('uploads/parents/'.$parent->photo);
            }
            $file->move(public_path('uploads/parents/'),$imageName);
            $parent['photo'] = $imageName;
        }

        $parent->save();

        $notification = array(
            'message' => 'Parent Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('parent.profile',$parent->id)->with($notification);

    } // End Method

    public function DeleteParent($id){
        User::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Parnet Deleted Successfully!',
            'alert-type' => 'info'
        );

        return redirect()->route('all.parents')->with($notification);
    } // End Method

    public function AttachChild(Request $request, $parent_id){
        if(!empty($request->student_code)){
            Student::where('id_no', $request->student_code)->update(['parent_id'=>$parent_id]);
        }

        $notification = array(
            'message' => 'Child Attached Successfully!',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // End Method


    public function DetachChild($id){
        Student::find($id)->update(['parent_id'=>null, 'updated_at'=>Carbon::now()]);
        $notification = array(
            'message' => 'Child Detached Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method
}
