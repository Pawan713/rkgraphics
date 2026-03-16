@extends('admin.layout.admin_apps')
@section('content')	
 <div class="section-body mt-3">
            <div class="container-fluid">
                <div class="row clearfix">
                    {{-- <div class="col-12">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
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
                                        </tr>
                                        <tr>
                                            <td colspan="4">
                                            {{-- <form action="#" method="GET" class="navbar-search"> --}}
                                                <div class="input-group">
                                                    <input type="text" name="search" id="search" class="form-control" placeholder="Search Student/Father Name...">
                                                </div>
                                            {{-- </form> --}}
                                        </td>
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
                                    <tbody id="student-list">
                                       @include('admin.student-table')
                                        
                                       
                                    </tbody>
                                </table>

                                    <!-- Pagination Links -->
                                <div class="d-flex justify-content-center" id="pagination-container">
                                {!! $students->links('pagination::bootstrap-5') !!}
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@push('script')

<script>

$("#search").on("keyup", function(){

    let url = window.location.pathname;
    let user_id = url.split('/').pop();
    let search = $(this).val();
    $.ajax({
        url:"{{ route('students.search') }}",
        type:"GET",
        data:{search:search,user_id:user_id},
        success:function(data){
            $("#student-list").html(data);
        }
    });

});

</script>

@endpush

@endsection