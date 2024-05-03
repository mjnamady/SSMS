<?php

namespace App\Http\Controllers;

use App\Models\ExamType;
use App\Models\Result;
use App\Models\Student;
use App\Models\StudentClass;
use App\Models\StudentYear;
use App\Models\Subject;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function AddResult(){
        $classes = StudentClass::all();
        $terms = ExamType::all();
        $years = StudentYear::all();
        return view('admin.result.add_result', compact('classes','terms','years'));
    } // End method

    public function FetchStudent(Request $request){
        $class_id = $request->get('class_id');
        $students = Student::where('class_id', $class_id)->get();
        $std_data = '<option selected="">--Select Student--</option>';
        foreach ($students as $student) {
            $std_data .= '<option value="'.$student->id.'"> '.$student->id_no.' | '.$student->user->first_name.' '.$student->user->last_name.' </option>';
        }

        $std_class = StudentClass::with('subjects')->where('id', $class_id)->first();
        $std_subjects = $std_class->subjects;

            for ($i=0; $i < count($std_subjects) ; $i++) { 
                 $subject_data[$i] = '<label class="form-label">'.$std_subjects[$i]->name.'</label>
                <input type="hidden" name="subject_ids[]" value="'.$std_subjects[$i]->id.'">
                <input type="number" name="marks[]" class="form-control" placeholder="Enter marks out of 100">';
        
            }
           
        // ['std_data'=>$std_data, 'subject_data'=>$subject_data]
        return response()->json(['std_data'=>$std_data, 'subject_data'=>$subject_data]);
    } // End Method

    public function CheckDelaredResult(Request $request){
        $std_id = $request->student_id;
        echo $std_id;
    } // End Method
}

 
