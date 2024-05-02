<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function AddResult(){
        $classes = StudentClass::all();
        return view('admin.result.add_result', compact('classes'));
    } // End method

    public function FetchStudent(Request $request){
        $class_id = $request->get('class_id');
        $students = Student::where('class_id', $class_id)->get();
        $std_data = '<option selected="">--Select Student--</option>';
        foreach ($students as $student) {
            $std_data .= '<option value="'.$student->id.'"> '.$student->id_no.' | '.$student->user->first_name.' '.$student->user->last_name.' </option>';
        }
        return response()->json($std_data);
    } // End Method
}
