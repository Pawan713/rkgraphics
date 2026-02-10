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
use Intervention\Image\Facades\Image;
use App\Exports\StudentExport;
use Maatwebsite\Excel\Facades\Excel;
use ZipArchive;
use Illuminate\Support\Facades\Response;


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

        // return $request->all();
             
            $request->validate([
                'name' => 'required|string|regex:/^[A-Za-z\s]+$/',
                // 'father_name' => 'required|regex:/^[A-Za-z\s]+$/',
                // 'mother_name' => 'required|regex:/^[A-Za-z\s]+$/',
                'class' => 'required',
                'roll_no' => 'required|numeric|min:1',
                'photo'=>'required'
            ]);


         if ($request->hasFile('photo')) {
             
              $image =  $request->file('photo');
            $extension = $request->file('photo')->getClientOriginalExtension();
        // 1. Create instance
                    // $img = Image::make($image->getRealPath());
        // 2. Resize dimensions (Crucial for file size)
        // This scales the image to 800px width and maintains aspect ratio
                    // $img->resize(800, null, function ($constraint) {
                    //     $constraint->aspectRatio();
                    //     $constraint->upsize(); // Prevents blowing up small images
                    // });

        // 3. Compress and encode
        // We encode as 'jpg' with 70% quality to get closer to 100KB
                    // $resource = $img->encode('jpg', 70);

        // 4. Save to disk
                    //  $name=str_replace(' ', '_', $request->name);
                    //  $filename = $name.'_'.uniqid() . '_' . time() . '.' . $extension;
                    // $path = public_path('uploads/students/' . $filename);
                    // $resource->save($path);


            // Upload media
              
                
                $dir = public_path() .'/uploads/students/';
                $filename = $request->name.'_'.uniqid() . '_' . time() . '.' . $extension;
                //   dd($resizedImage);
                $var = $request->file('photo')->move($dir, $filename);
                
                // $data->media = $filename;
                // $data->save();
                

        // Save to storage (public path or storage/app/public)
        // Storage::put("public/uploads/students/{$filename}", $resizedImage);

        

        // return back()->with('success', 'Image uploaded and compressed.');
    }


            Student::create([
                'name' => strtolower($request->name),
                'father_name' =>strtolower(isset($request->father_name)?$request->father_name:""), 
                'mother_name' =>strtolower(isset($request->mother_name)?$request->mother_name:""),
                'addmission_no' => isset($request->addmission_no)?$request->addmission_no:"",
                'class' => $request->class,
                'roll_no' => isset($request->roll_no)?$request->roll_no:"",
                'dob' => isset($request->dob)?$request->dob:"",
                'email' =>strtolower(isset($request->email)?$request->email:""),
                'mobile' =>isset($request->mobile)?$request->mobile:"" ,
                'bus_no' =>isset($request->bus_no)?$request->bus_no:"",
                'blood_group' => isset($request->blood_group)?$request->blood_group:"" ,
                'address' =>isset($request->address)?$request->address:"" ,
                'photo' => trim($filename),
                 'status' => 1,
                 'user_id' => Auth::user()->id,
                // 'password' => Hash::make($request->password),
            ]);

                // return redirect()->back()->with('success', 'Data added successfully!');
                //  $msg = \Lang::get('messages.Student created successfully');
                //  $msg="Student added Successfully";
                // session()->put('success', "Student added Successfully!");
                //  return redirect()->route('user.student');
                 return response()->json([
                            'success' => true,
                            'redirect_url' => route('user.student'), // Or '/dashboard'
                            'message' => 'Student added successfully!'
                        ]);
            // ->with('success', 'Student created successfully.');
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

            // return $request->all();

            $student=Student::find($request->id);

             $request->validate([
               'name' => 'required|string|regex:/^[A-Za-z\s]+$/',
                // 'father_name' => 'required|regex:/^[A-Za-z\s]+$/',
                // 'mother_name' => 'required|regex:/^[A-Za-z\s]+$/',
                'class' => 'required',
                'roll_no' => 'required|numeric|min:1',
            ]);
            


                if(!empty($request->photo)) {
                // Upload media
                        $image =  $request->file('photo');
                        $extension = $request->file('photo')->getClientOriginalExtension();
                        $dir = public_path() .'/uploads/students/';                     
                        $filename = $request->name.'_'.uniqid() . '_' . time() . '.' . $extension;
                        $var = $request->file('photo')->move($dir, $filename);

                        // 1. Create instance
                                    // $img = Image::make($image->getRealPath());
                        // 2. Resize dimensions (Crucial for file size)
                        // This scales the image to 800px width and maintains aspect ratio
                                    // $img->resize(800, null, function ($constraint) {
                                    //     $constraint->aspectRatio();
                                    //     $constraint->upsize(); // Prevents blowing up small images
                                    // });

                        // 3. Compress and encode
                        // We encode as 'jpg' with 70% quality to get closer to 100KB
                                    // $resource = $img->encode('jpg', 70);

                        // 4. Save to disk
                                    // $name=str_replace(' ', '_', $request->name);
                                    // $filename = $name.'_'.uniqid() . '_' . time() . '.' . $extension;
                                    // $path = public_path('uploads/students/' . $filename);
                                    // $resource->save($path);


                    }
                    else
                    {
                       $filename=$student->photo; 
                    }

    
            $student->update([

                 'name' => strtolower($request->name),
               'father_name' =>strtolower(isset($request->father_name)?$request->father_name:""), 
                'mother_name' =>strtolower(isset($request->mother_name)?$request->mother_name:""),
                'addmission_no' => isset($request->addmission_no)?$request->addmission_no:"",
                'class' => $request->class,
                'roll_no' => isset($request->roll_no)?$request->roll_no:"",
                'dob' => isset($request->dob)?$request->dob:"",
                'email' =>strtolower(isset($request->email)?$request->email:""),
                'mobile' =>isset($request->mobile)?$request->mobile:"" ,
                'bus_no' =>isset($request->bus_no)?$request->bus_no:"",
                'blood_group' => isset($request->blood_group)?$request->blood_group:"" ,
                'address' =>isset($request->address)?$request->address:"" ,
                'photo' => trim($filename),
                'user_id' => Auth::user()->id,
                 'status' => 1,
            ]);

            //  session()->put('success', "Student Updated Successfully!");
            //      return redirect()->route('user.student');

                  return response()->json([
                            'success' => true,
                            'redirect_url' => route('user.student'), // Or '/dashboard'
                            'message' => 'Student Updated successfully!'
                        ]);

            // return redirect()->route('user.student')->with('success', 'Student Updated Successfully.');
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
            $imagePath = public_path('uploads/students/'.$student->photo);

            // Check if the file exists and delete it
            if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            $student->delete();
            // return redirect()->route('user.student')->with('success', 'Student deleted Successfully.');

             session()->put('success', "Student Deleted Successfully!");
                 return redirect()->route('user.student');
        }


        // Zip Image Exprots In Student Profile
            public function PhotoZipExport()
            {

                ini_set('memory_limit', '1024M');
                ini_set('max_execution_time', 300);
                ini_set('output_buffering', 'off');

                // $url=explode("/",url()->previous());
                $user_id=Auth::user()->id;

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


    // Exports Excel File Of Student Information
            public function exportStudents()
            {
                // return $this->zipExport();
                return Excel::download(new StudentExport, 'students.xlsx');
            }


}
