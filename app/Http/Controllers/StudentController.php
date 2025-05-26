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
         $students = Student::where('user_id',Auth::user()->id)->orderBy('id', 'DESC')->paginate(5);
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
            //  dd(Auth::user()->id);
            $request->validate([
                'name' => 'required|string|regex:/^[A-Za-z\s]+$/',
                'father_name' => 'required|regex:/^[A-Za-z\s]+$/',
                'mother_name' => 'required|regex:/^[A-Za-z\s]+$/',
                'class' => 'required',
                'roll_no' => 'required|numeric|min:1',
                'photo'=>'required'
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
                'roll_no' => isset($request->roll_no)?$request->roll_no:"",
                'dob' => isset($request->dob)?$request->dob:"",
                'email' =>isset($request->email)?$request->email:"",
                'mobile' =>isset($request->mobile)?$request->mobile:"" ,
                'bus_no' =>isset($request->bus_no)?$request->bus_no:"",
                'blood_group' => isset($request->blood_group)?$request->blood_group:"" ,
                'address' =>isset($request->address)?$request->address:"" ,
                'photo' => $filename,
                 'status' => 1,
                 'user_id' => Auth::user()->id,
                // 'password' => Hash::make($request->password),
            ]);

                //  $msg = \Lang::get('messages.Student created successfully');
                 $msg="Student created successfully";
                session()->put('success', $msg);
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
               'name' => 'required|string|regex:/^[A-Za-z\s]+$/',
                'father_name' => 'required|regex:/^[A-Za-z\s]+$/',
                'mother_name' => 'required|regex:/^[A-Za-z\s]+$/',
                'class' => 'required',
                'roll_no' => 'required|numeric|min:1',
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
                'roll_no' => isset($request->roll_no)?$request->roll_no:"",
                'dob' => isset($request->dob)?$request->dob:"",
                'email' =>isset($request->email)?$request->email:"",
                'mobile' =>isset($request->mobile)?$request->mobile:"" ,
                'bus_no' =>isset($request->bus_no)?$request->bus_no:"",
                'blood_group' => isset($request->blood_group)?$request->blood_group:"" ,
                'address' =>isset($request->address)?$request->address:"" ,
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
