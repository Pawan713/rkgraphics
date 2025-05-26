<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class StudentExport implements FromCollection, WithHeadings, WithDrawings
{
    // public function collection()
    // {
    //     return Student::select('id', 'name','father_name','mother_name','addmission_no','class','roll_no','dob','email','mobile','bus_no','blood_group','address','photo')->get();
    // }

    // public function headings(): array
    // {
    //     return ['ID', 'Name','Father Name','Mother Name','Addmission No', 'Class', 'Roll No','Date Of Birth', 'Email','Mobile No','Bus No','Blood Group','Address', 'Profile Image'];
    // }

    // public function drawings()
    // {
    //     $drawings = [];
    //     $users = Student::all();
    //     $row = 2; // Start from row 2 (after headings)

    //     foreach ($users as $user) {
    //         if ($user->photo && file_exists(public_path('uploads/students' . $user->photo))) {
    //             $drawing = new Drawing();
    //             $drawing->setName($user->name);
    //             $drawing->setDescription('Profile Image');
    //             $drawing->setPath(public_path('uploads/students' . $user->photo));
    //             $drawing->setHeight(50);
    //             $drawing->setCoordinates('N' . $row); // Column N
    //             $drawings[] = $drawing;
    //         }
    //         $row++;
    //     }

    //     return $drawings;
    // }




    protected $students;

    public function __construct()
    {
        $this->students = Student::all();
    }

    public function collection()
    {
        return $this->students->map(function ($student) {
            return [
                'ID'       => $student->id,
                'Name'     => $student->name,
                'Father Name'     => $student->father_name,
                'Mother Name'     => $student->mother_name,
                'Addmission No'     => $student->addmission_no,
                'Class'     => $student->class,
                'Roll No'     => $student->roll_no,
                'Date Of Birth'     => $student->dob,
                'Email'     => $student->email,
                'Mobile No'     => $student->mobile,
                'Bus No'     => $student->bus_no,
                'Blood Group'     => $student->blood_group,
                'Address'     => $student->address,

                'Image'    => '', // Placeholder; image added via WithDrawings
            ];
        });
    }

    public function headings(): array
    {
        return ['ID', 'Name','Father Name','Mother Name','Addmission No', 'Class', 'Roll No','Date Of Birth', 'Email','Mobile No','Bus No','Blood Group','Address', 'Profile Image'];
    }

 

     public function drawings()
    {
        $drawings = [];
        $row = 2; // Start from second row (after headings)
        
        foreach ($this->students as $student) {
            
            $imageRelativePath = 'uploads/students/' . $student->photo;
            $imageFullPath = public_path($imageRelativePath);

            if (file_exists($imageFullPath)) {
                $drawing = new Drawing();
                $drawing->setName($student->name);
                $drawing->setDescription('Profile Image');
                $drawing->setPath($imageFullPath);
                $drawing->setHeight(50);
                $drawing->setCoordinates('N' . $row); // Column N = 14th column
                $drawings[] = $drawing;
            }

            $row++;
        }

        return $drawings;
    }


}
