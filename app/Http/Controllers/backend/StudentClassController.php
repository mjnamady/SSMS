<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    public function StudentClass()
    {
        $classes = StudentClass::orderBy('id', 'ASC')->get();
        return view('admin.studentClass.student_class_view', compact('classes'));
    } // End Method

    public function AddStudentClass()
    {
        return view('admin.studentClass.add_student_class');
    } // End Method

    public function StoreStudentClass(Request $request)
    {
        $request->validate([
            'class_name' => 'required'
        ],
    [
        'class_name.required' => 'Please Enter Class Name Before Proceeding.'
    ]);

    StudentClass::insert([
        'name' => $request->class_name
    ]);

    $notification = array(
        'message' => 'Student Class Added Successfully',
        'alert-type' => 'info'
    );

    return redirect()->route('student.class')->with($notification);
    } // End Method

    public function EditStudentClass($id)
    {
        $class = StudentClass::find($id);
        return view('admin.studentClass.edit_student_class', compact('class'));
    } // End Method

    public function UpdateStudentClass(Request $request)
    {
        StudentClass::findOrFail($request->student_id)->update([
            'name' => $request->class_name
        ]);

        $notification = array(
            'message' => 'Student Class Updated Successfully',
            'alert-type' => 'info'
        );
    
        return redirect()->route('student.class')->with($notification);
    } // End Method

    public function DeleteStudentClass($id)
    {
        StudentClass::find($id)->delete();
        $notification = array(
            'message' => 'Student Class Deleted Successfully',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);
    } // End Method
}
