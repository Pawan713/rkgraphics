@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

@section('content')	
<div class="section">
   
    <div class="container">
        <div class="d-flex justify-content-end">
            <a href="{{route('user.student.add')}}"><button class="btn btn-primary">Add Student</button></a>
          </div>
        <div class="row text-left stat-wrap">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">S No</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Father Name</th>
                    <th scope="col">Class</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($students)
                    @php $i=1; @endphp
                    @foreach ($students as $student)
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>
                            @if ($student->photo)
                            <img src="{{ asset('uploads/students/' . $student->photo) }}" class="img-thumbnail" width="150" height="150" alt="{{$student->photo}}">
                            @else
                            <h1>No Photo</h1>
                            @endif
                           
                        </td>
                        <td>{{ucwords($student->name)}}</td>
                        <td>{{ucwords($student->father_name)}}</td>
                        <td>{{ucwords($student->class)}}</td>
                        <td>{{$student->mobile}}</td>
                        <td>{{$student->email}}</td>
                        <td>
                            <a href="{{route('user.student.view',$student->id)}}" class="btn btn-sm btn-success">
                                <i class="bi bi-eye"></i> <!-- view icon -->
                            </a>
                            <a href="{{route('user.student.edit',$student->id)}}" class="btn btn-sm btn-primary">
                                <i class="bi bi-pencil"></i> <!-- Edit icon -->
                            </a>    
                            
                            <a href="{{route('user.student.delete',$student->id)}}" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash" onclick="return confirm('Are you sure?')"></i> <!-- Edit icon -->
                            </a>   
                        
                            {{-- <form action="" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                    <i class="bi bi-trash"></i> <!-- Delete icon -->
                                </button>
                            </form> --}}
                        </td>
                        </tr>
                        <tr>
                    @php $i++; @endphp
                    @endforeach
                    @endif
                    
                    
                </tbody>
                </table>
          
        </div><!-- end row -->

           <!-- Pagination Links -->
        <div class="d-flex justify-content-center">
            {!! $students->links('pagination::bootstrap-5') !!}
        </div>
        </div><!-- end container -->
    </div><!-- end section -->


@endsection