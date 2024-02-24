<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use PhpParser\Node\Expr\FuncCall;

class ExamTypeController extends Controller
{
    public function ExamType()
    {
        $examtype_all = ExamType::orderBy('id', 'ASC')->get();
        return view('admin.examtype.exam_type_list', compact('examtype_all'));
    } // End Method

    public function AddExamType()
    {
        return view('admin.examtype.add_exam_type');
    } // End Method

    public function StoreExamType(Request $request)
    {
        $request->validate([
            'exam_type_name' => 'required'
        ],
    [
        'exam_type_name.required' => 'Please Enter Exam Type Name Before Proceeding.'
    ]);

    ExamType::insert([
        'name' => $request->exam_type_name
    ]);

    $notification = array(
        'message' => 'Exam Type Added Successfully',
        'alert-type' => 'info'
    );

    return redirect()->route('exam.type')->with($notification);
    } // End Method

    public function EditExamType($id)
    {
        $examtype = ExamType::find($id);
        return view('admin.examtype.edit_exam_type', compact('examtype'));
    } // End Method

    public function UpdateExamType(Request $request)
    {
        ExamType::findOrFail($request->id)->update([
            'name' => $request->exam_type_name
        ]);

        $notification = array(
            'message' => 'Exam Type Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('exam.type')->with($notification);
    } // End Method

    public function DeleteExamType($id)
    {
        ExamType::find($id)->delete();
        $notification = array(
            'message' => 'Exam Type Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('exam.type')->with($notification);
    } // End Method
}
