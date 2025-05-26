@extends('admin.layout.admin_apps')\

@section('content')	
 <div class="section-body mt-3">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12">
                        <div class="card c_grid c_yellow">
                            <div class="card-body text-center">
                                <div class="circle">
                                    <img class="" src="{{ asset('uploads/students/' . $student->photo) }}" alt="{{ucwords($student->name)}}">
                                </div>
                                <h4 class="mt-3 mb-0">{{ucwords($student->name)}}</h4>
                                <h4>{{ $student->blood_group }}</h4>
                                {{-- <span></span> --}}
                                {{-- <ul class="mt-3 list-unstyled d-flex justify-content-center">
                                    <li><a class="p-3" target="_blank" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="p-3" target="_blank" href="#"><i class="fa fa-slack"></i></a></li>
                                    <li><a class="p-3" target="_blank" href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul> --}}
                                <button class="btn btn-default btn-sm"><h5>{{$student->mobile}}</h5></button>
                                <button class="btn btn-default btn-sm"><h6>{{$student->email}}</h6></button>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Address Details</h3>
                                {{-- <div class="card-options">
                                    <a href="javascript:void(0)" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                    <div class="item-action dropdown ml-2">
                                        <a href="javascript:void(0)" data-toggle="dropdown"><i class="fe fe-more-vertical"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-eye"></i> View Details </a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-share-alt"></i> Share </a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-cloud-download"></i> Download</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-copy"></i> Copy to</a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-folder"></i> Move to</a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-edit"></i> Rename</a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-trash"></i> Delete</a>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="card-body">
                                <span>{{ $student->address }}</span>
                            </div>                        
                        </div>
                        
                    </div>

                    <div class="col-lg-8 col-md-12">
                             <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Student Info</h3>
                                {{-- <div class="card-options">
                                    <a href="javascript:void(0)" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                    <div class="item-action dropdown ml-2">
                                        <a href="javascript:void(0)" data-toggle="dropdown"><i class="fe fe-more-vertical"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-eye"></i> View Details </a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-share-alt"></i> Share </a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-cloud-download"></i> Download</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-copy"></i> Copy to</a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-folder"></i> Move to</a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-edit"></i> Rename</a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-trash"></i> Delete</a>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <small class="text-muted">Name: </small>
                                        <p class="mb-0">{{ ucwords($student->name) }}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <small class="text-muted">Date Of Birth: </small>
                                        <p  class="mb-0">{{ ucwords($student->dob) }}</p>
                                    </li>
                                    <li class="list-group-item">
                                            <small class="text-muted">Father's Name: </small>
                                            <p  class="mb-0">{{ ucwords($student->father_name) }}</p>
                                        </li>
                                    <li class="list-group-item">
                                        <small class="text-muted">Mother's Name: </small>
                                        <p  class="mb-0">{{ ucwords($student->mother_name) }}</p>
                                    </li>
                                   
                                     </li>
                                        <li class="list-group-item">
                                        <small class="text-muted">Class Name: </small>
                                        <p  class="mb-0">{{ ucwords($student->class) }}</p>
                                    </li>
                                     </li>
                                        <li class="list-group-item">
                                        <small class="text-muted">Roll No: </small>
                                        <p  class="mb-0">{{ $student->roll_no }}</p>
                                    </li>
                                     </li>
                                        <li class="list-group-item">
                                        <small class="text-muted">Addmission No: </small>
                                        <p  class="mb-0">{{ $student->addmission_no }}</p>
                                    </li>
                                    </li>
                                        <li class="list-group-item">
                                        <small class="text-muted">Bus No: </small>
                                        <p  class="mb-0">{{ $student->bus_no }}</p>
                                    </li>

                                    {{-- <li class="list-group-item">
                                        <div>In Progress</div>
                                        <div class="progress progress-xs mb-0">
                                            <div class="progress-bar bg-info" style="width: 58%"></div>
                                        </div>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>


                    
                </div>
            </div>
        </div>
      
@endsection