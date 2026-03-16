@extends('layouts.app')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
@section('content')	

<div class="section">
   
    <div class="container">
        <div class="row">
                <div class="col-md-6">
                    <h2 class="mb-4"> Search Student List</h2>
                      <input type="text" name="search" id="search" class="form-control" placeholder="Search Student/Father Name/Mobile No..." class="">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    {{-- <h2 class="mb-4"> Select Class</h2> --}}
                     <select name="class" id="class" class="form-control">
                        	<option value="">Select Class</option>
										<option value="playgroup">Playgroup</option>
										<option value="pre-nursery">Pre-Nursery</option>
										<option value="nursery">Nursery</option>
										<option value="lkg">LKG</option>
										<option value="ukg">UKG</option>
										<option value="I">Class 1</option>
										<option value="II">Class 2</option>
										<option value="III">Class 3</option>
										<option value="IV">Class 4</option>
										<option value="V">Class 5</option>
										<option value="VI">Class 6</option>
										<option value="VII">Class 7</option>
										<option value="VIII">Class 8</option>
										<option value="IX">Class 9</option>
										<option value="X">Class 10</option>
										<option value="XI">Class 11</option>
										<option value="XII">Class 12</option>
                     </select>
                </div>
       </div>
                <div class="d-flex justify-content-end">
                    <a href="{{route('user.export.photo.zip')}}" class="btn btn-success mr-1" title="Zip Student Image"><i class="bi bi-file-zip"></i></a>
                    <a href="{{route('admin.export.excel')}}" class="btn btn-success " title="Excel Student Info"><i class="bi bi-file-excel"></i></a>
                    <a href="{{route('user.student.add')}}"><button class="btn btn-primary">Add Student</button></a>
                </div>
       
        <div class="row text-left stat-wrap ">
         <div class="table-responsive">
            <table class="table table-bordered table-striped">
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
                <tbody id="student-list">
                  @include('user-student-table')
                </tbody>
                </table>
         </div>
        </div><!-- end row -->

           <!-- Pagination Links -->
            @if(method_exists($students,'links'))
                    <div class="d-flex justify-content-center">
                    {!! $students->links('pagination::bootstrap-5') !!}
                    </div>
            @endif

        </div><!-- end container -->
    </div><!-- end section -->




@push('script')
<script>
function fetchStudents(){
    let user_id = "{{ auth()->user()->id }}";
    let search = $("#search").val();
    let class_name = $("#class").val();
    $.ajax({
        url:"{{ route('user.students.search') }}",
        type:"GET",
        data:{
            search:search,
            class:class_name,
            user_id:user_id
        },
        success:function(data){
            $("#student-list").html(data);
        }
    });

}




// search by name
$("#search").on("keyup", function(){
    fetchStudents();
});

// search by class
$("#class").on("change", function(){
    fetchStudents();
});


// $("#search").on("keyup", function(){
//     let user_id = "{{ auth()->user()->id }}";
//     let search = $(this).val();
//     $.ajax({
//         url:"{{ route('user.students.search') }}",
//         type:"GET",
//         data:{search:search,user_id:user_id},
//         success:function(data){
//             $("#student-list").html(data);
//         }
//     });

// });
</script>
@endpush

@endsection