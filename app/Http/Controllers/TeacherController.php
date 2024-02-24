<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Teacher;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class TeacherController extends Controller
{
    public function TeacherDashboard()
    {
        return view('teacher.teacher_dashboard');
    } // End method


    public function AllTeachers()
    {
        $users = User::where('role','teacher')->latest()->get();
        return view('admin.teacher.all_teacher_list', compact('users'));
    } // End Method

    public function AddTeacher()
    {
        $classes = StudentClass::orderBy('id', 'ASC')->get();
        $subjects = Subject::orderBy('id', 'ASC')->get();
        $groups = StudentGroup::orderBy('id', 'ASC')->get();
        return view('admin.teacher.add_teacher', compact('classes', 'groups', 'subjects'));
    } // End Method

    public function StoreTeacher(Request $request)
    {
        // dd($request);
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->religion = $request->religion;
        $user->role = 'teacher';
        $user->password = Hash::make('1234');
        $user->created_at = Carbon::now();

        if($request->hasFile('photo'))
        {
            $file = $request->file('photo');

            $imageName = 'Teacher'. date('YmdHi') . '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/teacher/'),$imageName);
            $user['photo'] = $imageName;
        }

        $user->save();

        $teacher = new Teacher();
        $teacher->user_id = $user->id;
        $teacher->class_id = $request->class_id;
        $teacher->subject_id = $request->subject_id;
        $teacher->dob = date('y-m-d',strtotime($request->dob));
        $teacher->save();

        $nofication = array(
            'message' => 'Teacher Added Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.teachers')->with($nofication);
    } // End Method


    public function EditTeacher($id)
    {
        $user = User::find($id);
        return view('admin.teacher.edit_teacher', compact('user'));
    } // End Method


    public function TeacherProfile($id){
        $user = User::find($id);
        return view('admin.teacher.teacher_profile', compact('user'));
    } // End Method

    public function UpdateTeacher(Request $request, $id){

        // dd($request->dob);
        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->religion = $request->religion;
        $user->role = 'teacher';
        $user->updated_at = Carbon::now();

        if($request->hasFile('photo'))
        {
            $file = $request->file('photo');
            $imageName = 'Teacher'. date('YmdHi') . '.' .$file->getClientOriginalExtension();
            if(!empty($user->photo)){
                unlink('uploads/teacher/'.$user->photo);
            }
           
            $file->move(public_path('uploads/teacher/'),$imageName);
            $user['photo'] = $imageName;
        }

        $user->save();

        // Teacher::where('user_id', $user->id)->updateOrInsert([
        //     'dob' => date('d-m-y',strtotime($request->dob))
        // ]);


        $teacher = $user->teacher;
        $teacher->dob = date('y-m-d',strtotime($request->dob));
        $teacher->save();

        $nofication = array(
            'message' => 'Teacher Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.teachers')->with($nofication);

    } // End Method



}
