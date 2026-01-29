<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Contact;
use App\Exports\StudentExport;
use Maatwebsite\Excel\Facades\Excel;

use ZipArchive;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        //  return $request;

        $credentials = $request->only('email', 'password');
        $credentials['role'] = 'admin';

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        // session()->put('error', "Invalid Credentials");
        //     return redirect()->back();

        // return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function dashboard()
    {
        $contacts=Contact::orderby('id','desc')->get();
        return view('admin.dashboard')->with('contacts',$contacts);
    }

/// Get All Students User Wise
    public function getAllStudent(Request $request,$id)
    {
        // $students=Student::where('user_id',$id)->orderby('id','desc')->get();
         $students = Student::where('user_id',$id)->orderby('id','desc')->paginate(10);
        // $students=Student::get();
        return view('admin.student_details')->with('students',$students);
    }

// Get Single Student Details
    public function getSingleStudent(Request $request,$id)
    {
        $student=Student::where('id',$id)->first();
        return view('admin.single_student_details')->with('student',$student);
    }



// Export Zip Profile Images
    public function zipExport()
    {

         ini_set('memory_limit', '1024M');
        ini_set('max_execution_time', 300);
        ini_set('output_buffering', 'off');

        $url=explode("/",url()->previous());
        $user_id=$url[5];

           $students = \App\Models\Student::where('user_id',$user_id)->get();
                $zipFileName = 'students-profile-images.zip';
                $zipFolder = public_path('uploads/students/zips');
                // Ensure directory exists
                if (!file_exists($zipFolder)) {
                    mkdir($zipFolder, 0755, true);
                }

                $zipFilePath = $zipFolder . '/' . $zipFileName;

                // Remove old ZIP if exists
                if (file_exists($zipFilePath)) {
                    unlink($zipFilePath);
                }

                $zip = new ZipArchive;
                if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
                    $i=1;
                    foreach ($students as $student) {
                        $imagePath = public_path('uploads/students/' . $student->photo);

                        if (file_exists($imagePath)) {
                            // Save inside ZIP under `images/` folder
                            // $zip->addFile($imagePath, 'images/' . $student->photo);
                            $zip->addFile($imagePath, 'images/' . $i.'_'.$student->photo);
                        } else {
                            \Log::warning("Image missing for student: {$student->id} - {$imagePath}");
                        }

                        $i++;
                    }

                    $zip->close();
                    if(file_exists($zipFilePath))
                    {
                        ob_end_clean(); // Clean output buffer to avoid corrupt zip 
                         return response()->download($zipFilePath);
                        // return Response::download($zipFilePath)->deleteFileAfterSend(true); // Trigger the download and delete the file
                    }
                    
                } else {
                    return response()->json(['error' => 'Unable to create ZIP file'], 500);
                }
    }

// Exports Excel File Of Student
    public function exportStudents()
    {
        // return $this->zipExport();
         return Excel::download(new StudentExport, 'students.xlsx');
    }



// Admin Logout
    public function adminLogout()
    {
        
         Auth::logout();
        return redirect()->route('admin.login');
    }

    // public function adminLogout(Request $request) {
    //         if (Auth::guard('admin')->check()) {
    //             Auth::guard('admin')->logout(); // Logout the admin
    //             $request->session()->invalidate(); // Invalidate the session
    //             return redirect()->guest(route('admin.login')); // Redirect to admin login
    //         } else {
    //             // Handle the case where no admin is logged in (e.g., redirect to a general logout page or display an error)
    //             return redirect()->route('admin.login')->with('error', 'No admin is currently logged in.');
    //         }
    //     }


}
