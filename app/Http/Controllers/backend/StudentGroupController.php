<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
    public function StudentGroup(){
        $groups = StudentGroup::orderBy('id', 'DESC')->get();
        return view('admin.studentGroup.student_group_list', compact('groups'));
    } // End Method

    public function AddStudentGroup()
    {
        return view('admin.studentGroup.add_student_group');
    } // End Method

    public function StoreStudentGroup(Request $request)
    {
        $request->validate([
            'group_name' => 'required'
        ],
    [
        'group_name.required' => 'Please Enter Group Name Before Proceeding.'
    ]);

    StudentGroup::insert([
        'name' => $request->group_name
    ]);

    $notification = array(
        'message' => 'Student Group Added Successfully',
        'alert-type' => 'info'
    );

    return redirect()->route('student.group')->with($notification);
    } // End Method

    public function EditStudentGroup($id)
    {
        $group = StudentGroup::find($id);
        return view('admin.studentGroup.edit_student_group', compact('group'));
    } // End Method

    public function UpdateStudentGroup(Request $request)
    {
        StudentGroup::findOrFail($request->group_id)->update([
            'name' => $request->group_name
        ]);

        $notification = array(
            'message' => 'Student Group Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.group')->with($notification);
    } // End Method

    public function DeleteStudentGroup($id)
    {
        StudentGroup::find($id)->delete();
        $notification = array(
            'message' => 'Student Group Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.group')->with($notification);

    } // End Method
}
