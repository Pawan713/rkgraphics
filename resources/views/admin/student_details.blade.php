@extends('admin.layout.admin_apps')
@section('content')	
 <div class="section-body mt-3">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="id">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Priority">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Department">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Agent">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" data-provide="datepicker" placeholder="Date">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <button type="submit" class="btn btn-primary btn-block">Search</button>
                                        {{-- <a href="javascript:void(0);" class="btn btn-primary btn-block" title="">Search</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="d-flex justify-content-end ">
                                <a href="{{route('admin.export.zip')}}" class="btn btn-success mr-1" title="Zip Student Image"><i class="bi bi-file-zip"></i></a>
                                <a href="{{route('admin.export.excel')}}" class="btn btn-success " title="Excel Student Info"><i class="bi bi-file-excel"></i></a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-vcenter mb-0 text-nowrap">
                                    <thead>
                                        <tr>
                                            <th colspan="12"><h1>Student Detail</h1></th>
                                            {{-- <th colspan="3">Activity</th> --}}
                                        </tr>
                                        <tr>
                                            <th>S No</th>
                                            <th>Name</th>
                                            <th>Father's Name</th>
                                            <th>Class</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Activity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($students)
                                        @php $i=1; @endphp
                                        @foreach ($students as $student)
                                        <tr>
                                            <td><a href="#">{{$i}}</a></td>
                                            <td><span>{{ucwords($student->name)}}</span></td>
                                            <td>{{ucwords($student->father_name)}}</td>
                                            <td>{{ucwords($student->class)}}</td>
                                            <td>{{$student->mobile}}</td>
                                            <td>{{$student->email}}</td>
                                            <td> <a href="{{route('admin.single.student',$student->id)}}" class="btn btn-sm btn-success">
                                                <i class="bi bi-eye"></i> <!-- view icon -->
                                            </a>
                                            {{-- <a href="" class="btn btn-sm btn-primary">
                                                <i class="bi bi-pencil"></i> <!-- Edit icon -->
                                            </a>     --}}
                                            
                                            {{-- <a href="" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash" onclick="return confirm('Are you sure?')"></i> <!-- Edit icon -->
                                            </a>    --}}
                                        </td>
                                        </tr>
                                           @php $i++; @endphp
                                              @endforeach
                                        @endif
                                        
                                       
                                    </tbody>
                                </table>

                                    <!-- Pagination Links -->
                            <div class="d-flex justify-content-center">
                                {!! $students->links('pagination::bootstrap-5') !!}
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
<script>
    $(document).ready(function () {
        $("#btnExport").click(function () {
            let table = document.getElementsByTagName("table");
            alert("hii");
            console.log(table);
            debugger;
            TableToExcel.convert(table[0], {
                name: `StudentInfo.xlsx`,
                sheet: {
                    name: 'Usermanagement'
                }
            });
        });
    });





</script>



@endsection