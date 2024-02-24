<?php

namespace App\Http\Controllers\backend;

use App\Models\StudentShift;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentShiftController extends Controller
{
    public function StudentShift(){
        $shifts = StudentShift::orderBy('id', 'DESC')->get();
        return view('admin.studentShift.student_shift_list', compact('shifts'));
    } // End Method

    public function AddStudentShift()
    {
        return view('admin.studentShift.add_student_shift');
    } // End Method

    public function StoreStudentShift(Request $request)
    {
        $request->validate([
            'shift_name' => 'required'
        ],
    [
        'shift_name.required' => 'Please Enter Shift Name Before Proceeding.'
    ]);

    StudentShift::insert([
        'name' => $request->shift_name
    ]);

    $notification = array(
        'message' => 'Student Shift Added Successfully',
        'alert-type' => 'info'
    );

    return redirect()->route('student.shift')->with($notification);
    } // End Method

    public function EditStudentShift($id)
    {
        $shift = StudentShift::find($id);
        return view('admin.studentShift.edit_student_shift', compact('shift'));
    } // End Method

    public function UpdateStudentShift(Request $request)
    {
        StudentShift::findOrFail($request->year_id)->update([
            'name' => $request->year_name
        ]);

        $notification = array(
            'message' => 'Student Shift Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.shift')->with($notification);
    } // End Method

    public function DeleteStudentShift($id)
    {
        StudentShift::find($id)->delete();
        $notification = array(
            'message' => 'Student Shift Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.shift')->with($notification);

    } // End Method
}
