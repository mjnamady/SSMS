<?php

namespace App\Http\Controllers\backend;

use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Models\AssignSubject;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;

class AssignSubjectController extends Controller
{
    public function AssignSubject()
    {
        $assign_subject_all = StudentClass::with('subjects')->orderBy('name', 'ASC')->get();
        return view('admin.assign_subject.assign_subject_list', compact('assign_subject_all'));
    } // End Method

    public function AddAssignSubject()
    {
        $classes = StudentClass::orderBy('id', 'ASC')->get();
        $subjects = Subject::orderBy('id', 'ASC')->get();
        return view('admin.assign_subject.add_assign_subject', compact('classes', 'subjects'));
    } // End Method

    public function StoreAssignSubject(Request $request)
    {

        $subject_ids = $request->subjects_ids;

        if($subject_ids > 0){
            foreach ($subject_ids as $subject_id) {
                $class = StudentClass::with('subjects')->find($request->class_id);
                $class->subjects()->attach($subject_id);
            }
        }

        $nofication = array(
            'message' => 'Subjects Assign Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('assign.subject')->with($nofication);
    } // End Method

    public function AssignSubjectDetails($class_id)
    {
        $detailsData = AssignSubject::where('class_id',$class_id)->orderBy('subject_id','asc')->get();
        return view('admin.assign_subject.assign_subject_details', compact('detailsData'));
    } // End Method

    public function AssignSubjectEdit($class_id)
    {
        $classes = StudentClass::orderBy('id', 'ASC')->get();
        $subjects = Subject::orderBy('id', 'ASC')->get();
        $detailsData = StudentClass::with('subjects')->findOrFail($class_id);
        $defaultClass = StudentClass::with('subjects')->find($class_id);
        return view('admin.assign_subject.assign_subject_edit', compact('detailsData','classes','subjects','defaultClass'));
    } // End Method

    public function TeacherSubject($id){
        $user = User::with('teacher')->find($id);
        $subjects = Subject::orderBy('id', 'ASC')->get();
        return view('admin.assign_subject.teacher_subject_assign', compact('user', 'subjects'));
    } // End Method

    public function TeacherSubjectStore(Request $request, $id){
        $subjects = $request->subjects;
        // dd($subjects);
        if(count($subjects) > 0){
            foreach ($subjects as $subject) {
                $user = User::with('teacher')->find($id);
                $user->teacher->subjects()->attach($subject);
            }

            $nofication = array(
                'message' => 'Subject(s) Assign Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($nofication);
        }

        $nofication = array(
            'message' => 'Please Select Atleast One Subject To Proceed!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($nofication);
        
    } // End Method

    public function UnAssignSubject($subject_id, $user_id){
        
        $user = User::with('teacher')->find($user_id);
    
        $user->teacher->subjects()->detach($subject_id);

        $nofication = array(
            'message' => 'Subject Un-Assigned!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($nofication);
    } // End Method

    public function TeacherClass($id){

        $user = User::with('teacher')->find($id);
        $classes = StudentClass::get();
        return view('admin.assign_class.teacher_class_assign', compact('user', 'classes'));
    } // End Method


    public function TeacherClassStore(Request $request, $id){
        $classes = $request->classes;
        if(count($classes) > 0){
            foreach ($classes as $class) {
                $user = User::with('teacher')->find($id);
                $user->teacher->classes()->attach($class);
            }
        
            $nofication = array(
                'message' => 'Class(es) Assign Successfully!',
                'alert-type' => 'success'
            );
        } else {
            $nofication = array(
                'message' => 'Please Select Atleast One Subject To Proceed!',
                'alert-type' => 'info'
            );
        }
            return redirect()->back()->with($nofication);
    } // End Method

    public function UnAssignClass($class_id, $user_id){
        $user = User::with('teacher')->find($user_id);
    
        $user->teacher->classes()->detach($class_id);

        $nofication = array(
            'message' => 'Class Un-Assigned!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($nofication);
    } // End Method


    public function TeacherDelete($id){

        $user = User::with('teacher')->findOrFail($id);

        if(file_exists('uploads/teacher/'.$user->photo) && !empty($user->photo)){
            @unlink('uploads/teacher/'.$user->photo);
        }

        if(@$user->teacher->subjects != null){
            @$subjects = $user->teacher->subjects->pluck('id')->toArray();
            foreach ($subjects as $subject) {
                $user->teacher->subjects()->detach($subject);
            }

        } elseif(@$user->teacher->classes != null){
            @$classes = $user->teacher->classes->pluck('id')->toArray();
            foreach ($classes as $class) {
                $user->teacher->classes()->detach($class);
            }
        }
            
        Teacher::where('user_id', $user->id)->delete();
        $user->delete();
        
        $nofication = array(
            'message' => 'Teacher Deleted Succcessfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($nofication);

    } // End Method

    public function DeleteClassSubject($class_id, $subject_id){

       $class = StudentClass::with('subjects')->findOrFail($class_id);
       $class->subjects()->detach($subject_id);

       $nofication = array(
        'message' => 'Subject Deleted Succcessfully.',
        'alert-type' => 'success'
    );
    return redirect()->back()->with($nofication);
    } // End Method

    public function UpdateAssignSubject(Request $request){

        $class_id = $request->class_id;
        $subjects = $request->subjects_ids;

        $class = StudentClass::with('subjects')->find($class_id);  
        $class->subjects()->sync($subjects);      
        $nofication = array(
            'message' => 'Subjects Updated Succcessfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($nofication);  
    } // End Method



}
