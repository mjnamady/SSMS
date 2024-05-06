<?php

namespace App\Http\Controllers;

use App\Models\ExamType;
use App\Models\Result;
use App\Models\Student;
use App\Models\StudentClass;
use App\Models\StudentYear;
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
        $std_id = $request->get('student_id');
        $term_id = $request->get('term_id');
        $year_id = $request->get('year_id');

        $query = Result::where('student_id',$std_id)
                        ->where('term_id',$term_id)
                        ->where('year_id',$year_id)->first();
        $output = '';
        if (!empty($query)) {
            $output = '<div class="alert alert-success alert-dismissible fade show">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>	
            <strong>Result!</strong> Is Already Declared.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="fa-solid fa-xmark"></i></span>
            </button>
        </div>';
        }
        return response()->json($output);
    } // End Method

    public function StoreResult(Request $request){
    
        $subjects = count($request->subject_ids);
        for ($i=0; $i < $subjects; $i++) { 
            $newResult = [
                'student_id' => $request->student_id,
                'class_id' => $request->class_id,
                'subject_id' => $request->subject_ids[$i],
                'marks' => $request->marks[$i],
                'term_id' => $request->term_id,
                'year_id' => $request->year_id
            ];
            Result::create($newResult);
        }
        
        $notification = array(
            'message' => 'Result Declared Successfully!',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    } // End Method

    public function ManageResult(){
        $results = Result::groupBy('student_id')->get();
        return view('admin.result.manage_result', compact('results'));
    } // End Method

    public function EditResult($id){
        $classes = StudentClass::all();
        $terms = ExamType::all();
        $years = StudentYear::all();
        $result = Result::where('student_id',$id)->get();
        return view('admin.result.edit_result', compact('classes','terms','years','result'));
    } // End Method

    public function UpdateResult(Request $request){
        // dd($request->all());
        $subjects = count($request->subject_ids);
        for ($i=0; $i < $subjects; $i++) { 
            Result::where('id', $request->ids[$i])->update([
                'subject_id' => $request->subject_ids[$i],
                'marks' => $request->marks[$i],
                'term_id' => $request->term_id,
                'year_id' => $request->year_id
            ]);
        }
        
        $notification = array(
            'message' => 'Student Result Update Successfully!',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    } // End Method

    public function ViewResult($id){
        $result = Result::where('student_id', $id)->get();
        // dd($result);
        return view('admin.result.result', compact('result'));
    } // End Method
}

 
