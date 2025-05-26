@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
@section('content')	
<div class="container mt-5">
    <div class="d-flex justify-content-end">
            <a href="{{route('user.student')}}"><button class="btn btn-primary">View Student</button></a>
          </div>
    <div class="card shadow-lg">
        <div class="row g-0">
            <!-- Profile Image -->
            <div class="col-md-4 text-center p-4">
                <img src="{{ asset('uploads/students/' . $student->photo) }}" 
                     alt="Profile Image" 
                     class="img-fluid rounded-circle border border-secondary" 
                     style="width: 200px; height: 200px; object-fit: cover;">
                <h5 class="mt-3">{{ ucwords($student->name) }}</h5>
            </div>

            <!-- Profile Details -->
            <div class="col-md-4">
                <div class="card-body">
                    <h4 class="card-title mb-8">Student Details</h4>
                    <div class="mb-3">
                        <strong>Full Name:</strong> {{ ucwords($student->name) }}
                    </div>
                     <div class="mb-3">
                        <strong>Date Of Birth:</strong> {{ ucwords($student->dob) }}
                    </div>
                    <div class="mb-3">
                        <strong>Father's Name:</strong> {{ $student->father_name }}
                    </div>
                    <div class="mb-3">
                        <strong>Mother's Name:</strong> {{ $student->mother_name }}
                    </div>
                    <div class="mb-3">
                        <strong>Email:</strong> {{ $student->email }}
                    </div>
                    <div class="mb-3">
                        <strong>Mobile:</strong> {{ $student->mobile }}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-body">
                    <h4 class="card-title mb-4">School Details</h4>
                    
                    <div class="mb-3">
                        <strong>Class Name:</strong> {{ ucwords($student->class) }}
                    </div>
                    <div class="mb-3">
                        <strong>Roll No:</strong> {{ $student->roll_no }}
                    </div>
                     <div class="mb-3">
                        <strong>Addmission No:</strong> {{ $student->addmission_no }}
                    </div>
                    <div class="mb-3">
                        <strong>Bus No:</strong> {{ $student->bus_no }}
                    </div>
                    <div class="mb-3">
                        <strong>Blood Group:</strong> {{ $student->blood_group }}
                    </div>
                    <div class="mb-3">
                        <strong>Address:</strong> {{ $student->address }}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection