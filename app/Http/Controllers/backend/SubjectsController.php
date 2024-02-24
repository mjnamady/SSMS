<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    public function AllSubjects()
    {
        $all_subjects = Subject::orderBy('id', 'ASC')->get();
        return view('admin.subjects.all_subject_list', compact('all_subjects'));
    } // End method

    public function AddSubject()
    {
        return view('admin.subjects.add_subject');
    } // End Method

    public function StoreSubject(Request $request)
    {
        $request->validate([
            'subject_name' => 'required'
        ],
    [
        'subject_name.required' => 'Please Enter Subject Name Before Proceeding.'
    ]);

    Subject::insert([
        'name' => $request->subject_name
    ]);

    $notification = array(
        'message' => 'Subject Added Successfully',
        'alert-type' => 'info'
    );

    return redirect()->route('all.subjects')->with($notification);
    } // End Method

    public function EditSubject($id)
    {
        $subject = Subject::find($id);
        return view('admin.subjects.edit_subject', compact('subject'));
    } // End Method

    public function UpdateSubject(Request $request)
    {
        Subject::findOrFail($request->id)->update([
            'name' => $request->subject_name
        ]);

        $notification = array(
            'message' => 'Subject Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.subjects')->with($notification);
    } // End Method

    public function DeleteSubject($id)
    {
        Subject::find($id)->delete();
        $notification = array(
            'message' => 'Subject Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method
}
