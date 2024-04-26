<?php

namespace App\Http\Controllers;

use App\Models\ExamFee;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Student;
use App\Models\StudentYear;
use Illuminate\Support\Str;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function AllStudents()
    {
        $users = User::where('role','student')->latest()->get();
        return view('admin.student.all_student', compact('users'));
    } // End method

    public function AddStudent()
    {
        $classes = StudentClass::orderBy('id', 'ASC')->get();
        $years = StudentYear::orderBy('id', 'ASC')->get();
        $groups = StudentGroup::orderBy('id', 'ASC')->get();
        return view('admin.student.add_student', compact('classes','years','groups'));
    } // End method

    public function StoreStudent(Request $request)
    {
        // dd(max('2024/0001','2024/0003','2024/0002'));

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->address = $request->p_address;
        $user->gender = $request->gender;
        $user->religion = $request->religion;
        $user->phone = $request->p_phone;
        $user->password = Hash::make('1234');
        $user->created_at = Carbon::now();

        if($request->hasFile('photo'))
        {
            $file = $request->file('photo');

            $imageName = 'Student'. date('YmdHi') . '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/students/'),$imageName);
            $user['photo'] = $imageName;
        }

        $user->save();

        // Get the current year
        $currentYear = Carbon::now()->year;
        $lastRollNumber = Student::whereYear('created_at', $currentYear)->max('roll_number');
        $serialNumber = $lastRollNumber ? $lastRollNumber + 1 : 1;
        $newRollNumber = $currentYear . str_pad($serialNumber, 4, '0', STR_PAD_LEFT);
        $id_no = "STD".rand(0000,9999);

        $student = new Student();
        $student->user_id = $user->id;
        $student->year_id = $request->year_id;
        $student->class_id = $request->class_id;
        $student->id_no = $id_no;
        $student->roll_number = $lastRollNumber ? $serialNumber : $newRollNumber;
        $student->group_id = $request->group_id;
        $student->dob = date('Y-m-d',strtotime($request->dob));
        $student->father_name = $request->f_name;
        $student->father_occupation = $request->f_occupation;
        $student->mother_name = $request->m_name;
        $student->mother_occupation = $request->m_occupation;
        $student->phone = $request->p_phone;
        $student->address = $request->p_address;
        $user->created_at = Carbon::now();

        $student->save();

        $nofication = array(
            'message' => 'Student Added Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.students')->with($nofication);
       
    } // End Method


    public function ViewStudent($id)
    {
        
        $user = User::findOrFail($id);
        $examFee = ExamFee::where('student_id',$user->student->id_no)->get();
        return view('admin.student.view_student_detail', compact('user','examFee'));
    } // End Method

    public function EditStudent($id)
    {
        $user = User::findOrFail($id);
        $classes = StudentClass::orderBy('id', 'ASC')->get();
        $years = StudentYear::orderBy('id', 'ASC')->get();
        $groups = StudentGroup::orderBy('id', 'ASC')->get();
        return view('admin.student.edit_student', compact('user', 'years', 'classes', 'groups'));
    } // End Method

    public function UpdateStudent(Request $request)
    {
        // dd($request);
        
        $user = User::find($request->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->address = $request->p_address;
        $user->gender = $request->gender;
        $user->religion = $request->religion;
        $user->phone = $request->p_phone;
        $user->created_at = Carbon::now();

        if($request->hasFile('photo'))
        {
            $file = $request->file('photo');
            @unlink(public_path('uploads/students/'.$user->photo));
            $imageName = 'Student'. date('YmdHi') . '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/students/'),$imageName);
            $user['photo'] = $imageName;
           
        }

        $user->save();

        Student::where('user_id', $user->id)->update([
            'year_id' => $request->year_id,
            'class_id' => $request->class_id,
            'group_id' => $request->group_id,
            'dob' => date('Y-m-d',strtotime($request->dob)),
            'father_name' => $request->f_name,
            'father_occupation' => $request->f_occupation,
            'address' => $request->p_address,
            'mother_name' => $request->m_name,
            'mother_occupation' => $request->m_occupation,
            'phone' => $request->p_phone
        ]);
    
        $nofication = array(
            'message' => 'Student Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('all.students')->with($nofication);
        
    } // End Method

    public function DeleteStudent($id)
    {    
       $user = User::findOrFail($id);

        if(!empty($user->photo))
        {
            @unlink(public_path('uploads/students/'.$user->photo));
        }

        $user->delete();

        $nofication = array(
            'message' => 'Student Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.students')->with($nofication);
    } // End Method
}
