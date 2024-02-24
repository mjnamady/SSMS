<?php

namespace App\Http\Controllers\backend;

use App\Models\StudentYear;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class StudentYearController extends Controller
{
    public function StudentYear(){
        $years = StudentYear::orderBy('id', 'DESC')->get();
        return view('admin.studentYear.student_year_list', compact('years'));
    } // End Method

    public function AddStudentYear()
    {
        return view('admin.studentYear.add_student_year');
    } // End Method

    public function StoreStudentYear(Request $request)
    {
        $request->validate([
            'year_name' => 'required'
        ],
    [
        'year_name.required' => 'Please Enter Year Name Before Proceeding.'
    ]);

    StudentYear::insert([
        'name' => $request->year_name
    ]);

    $notification = array(
        'message' => 'Student Year Added Successfully',
        'alert-type' => 'info'
    );

    return redirect()->route('student.year')->with($notification);
    } // End Method

    public function EditStudentYear($id)
    {
        $year = StudentYear::find($id);
        return view('admin.studentYear.edit_student_year', compact('year'));
    } // End Method

    public function UpdateStudentYear(Request $request)
    {
        StudentYear::findOrFail($request->year_id)->update([
            'name' => $request->year_name
        ]);

        $notification = array(
            'message' => 'Student Year Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.year')->with($notification);
    } // End Method

    public function DeleteStudentYear($id)
    {
        StudentYear::find($id)->delete();
        $notification = array(
            'message' => 'Student Year Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.year')->with($notification);

    } // End Method
}
