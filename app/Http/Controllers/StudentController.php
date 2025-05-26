<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Rules\ValidateArrayElement;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Student;

class StudentController extends Controller
{
    
    public function index()
    {
         $students = Student::paginate(5);
        // $students=Student::get();
        return view('student', compact('students'));
        // return view('view_student')->with('students',$students);
    }

// Add New Student Info
        public function create()
        {
            return view('add_student');
        }
// Store Student Info
        public function store(Request $request)
        {
            // dd($request);
            $request->validate([
                'name' => 'required|string|regex:/^[A-Za-z\s]+$/',
                'father_name' => 'required|regex:/^[A-Za-z\s]+$/',
                'mother_name' => 'required|regex:/^[A-Za-z\s]+$/',
                'addmission_no' => 'required|min:2',
                'class' => 'required',
                'roll_no' => 'required|numeric|min:1',
                'dob' => 'required',
                'email' => 'required|email|unique:students',
                'mobile' => 'required|numeric|min:10',
                'bus_no' => 'required|numeric',
                'blood_group' => 'required',
                'address' => 'required|string',
            ]);



            // Upload media
                $upload_video_link =  $request->file('photo');
                $extension = $request->file('photo')->getClientOriginalExtension();
                $dir = public_path() .'/uploads/students/';
                
                $filename = $request->name.'_'.uniqid() . '_' . time() . '.' . $extension;
                $var = $request->file('photo')->move($dir, $filename);
                // $data->media = $filename;
                // $data->save();

            Student::create([
                'name' => $request->name,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'addmission_no' => $request->addmission_no,
                'class' => $request->class,
                'roll_no' => $request->roll_no,
                'dob' => $request->dob,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'bus_no' => $request->bus_no,
                'blood_group' => $request->blood_group,
                'address' => $request->address,
                'photo' => $filename,
                 'status' => 1,
                 'user_id' => Auth::user()->id,
                // 'password' => Hash::make($request->password),
            ]);

            return redirect()->route('user.student')->with('success', 'Student created successfully.');
        }
/// Edit Student
        public function edit(Request $request,$id)
        {
            $student=Student::find($request->id);
            return view('edit_student', compact('student'));
        }
    
/// Update Student

        public function update(Request $request, $id)
        {

            $student=Student::find($request->id);

             $request->validate([
                'name' => 'required|string',
                'father_name' => 'required|string',
                'mother_name' => 'required|string',
                'addmission_no' => 'required|min:2',
                'class' => 'required',
                'roll_no' => 'required|min:1',
                'dob' => 'required',
                'email' => 'required|email',
                'mobile' => 'required|min:10',
                'bus_no' => 'required',
                'blood_group' => 'required',
                'address' => 'required',
            ]);

            


                if(!empty($request->photo)) {
                // Upload media
                        $upload_video_link =  $request->file('photo');
                        $extension = $request->file('photo')->getClientOriginalExtension();
                        $dir = public_path() .'/uploads/students/';
                        
                        $filename = $request->name.'_'.uniqid() . '_' . time() . '.' . $extension;
                        $var = $request->file('photo')->move($dir, $filename);

                    }
                    else
                    {
                       $filename=$student->photo; 
                    }

    
            $student->update([

                 'name' => $request->name,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'addmission_no' => $request->addmission_no,
                'class' => $request->class,
                'roll_no' => $request->roll_no,
                'dob' => $request->dob,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'bus_no' => $request->bus_no,
                'blood_group' => $request->blood_group,
                'address' => $request->address,
                'photo' => $filename,
                'user_id' => Auth::user()->id,
                 'status' => 1,
            ]);

            return redirect()->route('user.student')->with('success', 'Student Updated Successfully.');
        }

// View Single Student Information
         public function view(Request $request,$id)
        {
            $student=Student::find($request->id);
            return view('view_student', compact('student'));
        }


    // Delete Student
        public function destroy(Request $request,$id)
        {
            $student=Student::find($request->id);
               // Define the image path
            $imagePath = public_path('uploads/students/' . $student->photo);

            // Check if the file exists and delete it
            if (File::exists($imagePath)) {
                File::delete($imagePath);
                }
            $student->delete();
            return redirect()->route('user.student')->with('success', 'Student deleted Successfully.');
        }


}
