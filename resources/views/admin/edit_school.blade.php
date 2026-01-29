@extends('admin.layout.admin_apps')
@section('content')	
<div class="section-body mt-3">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex justify-content-between">
                            <ul class="nav nav-tabs b-none">
                                <li class="nav-item"><a class="nav-link" id="addnew-tab" data-toggle="tab" href="#addnew"><i class="fa fa-plus"></i> Edit School Info</a></li>
                            </ul>
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-body">
    <div class="container-fluid">
        <div class="tab-content">

             <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{route('admin.school.update',$school->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Enter Name" name="name" required value="{{$school->name}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Enter Mobile Number" name="mobile" maxlength10="10" minlength="10" required value="{{$school->mobile}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Enter Email" name="email" required value="{{$school->email}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Enter Password" name="password">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <textarea type="text" class="form-control" rows="4" name="address">{{$school->address}}</textarea>
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-12">
                                        <input type="file" class="dropify">
                                    </div> --}}
                                    <div class="col-lg-12 mt-3">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <button type="Reset" class="btn btn-default">Cancel</button>
                                    </div>
                                </div>
                            </form>

                            </div>
                        </div>
                    </div>
                </div>
         
        
        </div>
    </div>
</div>


@endsection