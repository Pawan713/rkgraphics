<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\File;
class SchoolController extends Controller
{
    
    public function index()
    {
        $users=User::where('role','user')->orderBy('id', 'DESC')->get();
        // return $users;
        return view('admin.school_view')->with('users',$users);
    }

// Add New School 
    public function add_School(Request $request)
    {

        
         $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            // 'mobile' => 'required|min:10',
            'mobile' => 'required|min:10',
            'password' => 'required',
            'address' => 'required',
        ]);
        // return $request;
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'role' => 'user',
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.school')->with('success', 'School Created successfully.');
        // return view('admin.school_add');
    }


/// Edit School Information
        public function SchoolEdit(Request $request,$id)
        {
            $school=User::find($request->id);
            return view('admin.edit_school', compact('school'));
        }

    // Update School Information

        public function SchoolUpdate(Request $request,$id)
        {
            $school=User::find($request->id);
            //   $request->validate([
            //         'name' => 'required|string',
            //         // 'email' => 'required|email|unique:users',
            //         // 'mobile' => 'required|min:10',
            //         'mobile' => 'required|min:10',
            //         'address' => 'required',
            //     ]);
            
                    $school->update([
                    'name' => isset($request->name)?$request->name:$school->name,
                    'email' => isset($request->email,)?$request->email:$school->email, 
                    'mobile' =>isset($request->mobile)?$request->mobile:$school->mobile,
                    'address' => isset($request->address)?$request->address:$school->address ,
                    'role' => 'user',
                    'password' => isset($request->password)? Hash::make($request->password):$school->password ,
                ]);
             return redirect()->route('admin.school')->with('success', 'School Updated successfully.');
        }



/// Delete School Information
    public function DeleteSchool(Request $request,$id)
    {

            $school=User::find($id);
            $school->delete();
            $students=Student::where('user_id',$id)->get();

            foreach($students as $student)
            {
                 // Define the image path
                $imagePath = public_path('uploads/students/' . $student->photo);

                // Check if the file exists and delete it
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                    }
                $student->delete();
            }
            
            // return redirect()->route('user.student')->with('success', 'Student deleted Successfully.');

             session()->put('success', "School & Student Deleted Successfully!");
                 return redirect()->route('admin.school');
    }



}
