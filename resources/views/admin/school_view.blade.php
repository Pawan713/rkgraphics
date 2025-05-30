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
                                <li class="nav-item"><a class="nav-link active" id="list-tab" data-toggle="tab" href="#list"><i class="fa fa-list-ul"></i> List</a></li>
                                {{-- <li class="nav-item"><a class="nav-link" id="grid-tab" data-toggle="tab" href="#grid"><i class="fa fa-th"></i> Grid</a></li> --}}
                                <li class="nav-item"><a class="nav-link" id="addnew-tab" data-toggle="tab" href="#addnew"><i class="fa fa-plus"></i> Add New</a></li>
                            </ul>
                            {{-- <div class="d-flex align-items-center sort_stat">
                                <div class="d-flex">
                                    <span class="bh_income">2,5,1,8,3,6,7,5,3,6,7,5</span>
                                    <div class="ml-2">
                                        <p class="mb-0 font-11">MY INCOME</p>
                                        <h5 class="font-16 mb-0">$5,510</h5>
                                    </div>
                                </div>
                                <div class="d-flex ml-3">
                                    <span class="bh_traffic">5,8,9,10,5,2,5,8,9,10</span> 
                                    <div class="ml-2">
                                        <p class="mb-0 font-11">SITE TRAFFIC</p>
                                        <h5 class="font-16 mb-0">53% Up</h5>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <div class="input-group mt-2">
                            <input type="text" class="form-control search" placeholder="Search..." name="search_name">
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
            <div class="tab-pane fade show active" id="list" role="tabpanel">
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="table-responsive" id="users">
                            <table class="table table-hover table-vcenter text-nowrap table_custom border-style list">
                                <thead>
                                    <th></th>
                                    <th class="text-left" scope="col">Name</th>
                                    <th class="text-left" scope="col">Email</th>
                                    <th class="text-left" scope="col">Address</th>
                                    <th class="text-center" scope="col">Action</th>
                                </thead>
                                <tbody>
                                    @if($users)
                                    @foreach ($users as $user)

                                    <tr class="">
                                        <td class="width35 hidden-xs">
                                            <a href="javascript:void(0);" class="mail-star"><i class="fa fa-star"></i></a>
                                        </td>
                                        {{-- <td class="text-center width40">
                                            <div class="avatar d-block">
                                                <img class="avatar" src="assets/images/xs/avatar4.jpg" alt="avatar">
                                            </div>
                                        </td> --}}
                                        <td>
                                            <div><a href="javascript:void(0);">{{$user->name}}</a></div>
                                            <div class="text-muted">{{$user->mobile}}</div>
                                        </td>
                                        <td class="hidden-xs">
                                            <div class="text-muted">{{$user->email}}</div>
                                        </td>
                                        <td class="hidden-sm">
                                            <div class="text-muted">{{$user->address}}</div>                                                
                                        </td>
                                        <td class="text-right">
                                            {{-- <a href="" class="btn btn-sm btn-success">
                                                <i class="bi bi-eye"></i>
                                            </a> --}}
                                            <a class="btn btn-sm btn-link" href="{{route('admin.all.student',$user->id)}}" data-toggle="tooltip" title="Student View"><i class="fa fa-eye"></i></a>

                                            {{-- <a class="btn btn-sm btn-link" href="javascript:void(0)" data-toggle="tooltip" title="Phone"><i class="fa fa-phone"></i></a>
                                            <a class="btn btn-sm btn-link" href="javascript:void(0)" data-toggle="tooltip" title="Mail"><i class="fa fa-envelope"></i></a> --}}
                                            <a class="btn btn-sm btn-link hidden-xs js-sweetalert" data-type="confirm" href="javascript:void(0)" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                        
                                    @endforeach
                                    @endif
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="tab-pane fade" id="grid" role="tabpanel">
                <div class="row row-deck">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card " >
                            <div class="card-body">
                                <div class="card-status bg-blue"></div>
                                <div class="mb-3"> <img src="assets/images/sm/avatar1.jpg" class="rounded-circle w100" alt=""> </div>
                                <div class="mb-2">
                                    <h5 class="mb-0">Paul Schmidt</h5>
                                    <p class="text-muted">Aalizeethomas@info.com</p>
                                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt</span>
                                </div>
                                <span class="font-12 text-muted">Common Contact</span>
                                <ul class="list-unstyled team-info margin-0 pt-2">
                                    <li><img src="assets/images/xs/avatar1.jpg" alt="Avatar"></li>
                                    <li><img src="assets/images/xs/avatar8.jpg" alt="Avatar"></li>
                                    <li><img src="assets/images/xs/avatar2.jpg" alt="Avatar"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card ">
                            <div class="card-body">
                                <div class="mb-3"> <img src="assets/images/sm/avatar2.jpg" class="rounded-circle w100" alt=""> </div>
                                <div class="mb-2">
                                    <h5 class="mb-0">Andrew Patrick</h5>
                                    <p>Aalizeethomas@info.com</p>
                                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt</span>
                                </div>
                                <span class="font-12 text-muted">Common Contact</span>
                                <ul class="list-unstyled team-info margin-0 pt-2">
                                    <li><img src="assets/images/xs/avatar1.jpg" alt="Avatar"></li>
                                    <li><img src="assets/images/xs/avatar2.jpg" alt="Avatar"></li>
                                    <li><img src="assets/images/xs/avatar3.jpg" alt="Avatar"></li>
                                    <li><img src="assets/images/xs/avatar4.jpg" alt="Avatar"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card ">
                            <div class="card-body">
                                <div class="mb-3"> <img src="assets/images/sm/avatar3.jpg" class="rounded-circle w100" alt=""> </div>
                                <div class="mb-2">
                                    <h5 class="mb-0">Mary Schneider</h5>
                                    <p>Aalizeethomas@info.com</p>
                                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt</span>
                                </div>
                                <span class="font-12 text-muted">Common Contact</span>
                                <ul class="list-unstyled team-info margin-0 pt-2">
                                    <li><img src="assets/images/xs/avatar1.jpg" alt="Avatar"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card " >
                            <div class="card-body">
                                <div class="card-status bg-green"></div>
                                <div class="mb-3"> <img src="assets/images/sm/avatar4.jpg" class="rounded-circle w100" alt=""> </div>
                                <div class="mb-2">
                                    <h5 class="mb-0">Sean Black</h5>
                                    <p>Aalizeethomas@info.com</p>
                                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt</span>
                                </div>
                                <span class="font-12 text-muted">Common Contact</span>
                                <ul class="list-unstyled team-info margin-0 pt-2">
                                    <li><img src="assets/images/xs/avatar2.jpg" alt="Avatar"></li>
                                    <li><img src="assets/images/xs/avatar6.jpg" alt="Avatar"></li>
                                    <li><img src="assets/images/xs/avatar5.jpg" alt="Avatar"></li>
                                    <li><img src="assets/images/xs/avatar7.jpg" alt="Avatar"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card ">
                            <div class="card-body">
                                <div class="mb-3"> <img src="assets/images/sm/avatar5.jpg" class="rounded-circle w100" alt=""> </div>
                                <div class="mb-2">
                                    <h5 class="mb-0">David Wallace</h5>
                                    <p>Aalizeethomas@info.com</p>
                                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt</span>
                                </div>
                                <span class="font-12 text-muted">Common Contact</span>
                                <ul class="list-unstyled team-info margin-0 pt-2">
                                    <li><img src="assets/images/xs/avatar3.jpg" alt="Avatar"></li>
                                    <li><img src="assets/images/xs/avatar4.jpg" alt="Avatar"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card ">
                            <div class="card-body">
                                <div class="card-status bg-pink"></div>
                                <div class="mb-3"> <img src="assets/images/sm/avatar6.jpg" class="rounded-circle w100" alt=""> </div>
                                <div class="mb-2">
                                    <h5 class="mb-0">Andrew Patrick</h5>
                                    <p>Aalizeethomas@info.com</p>
                                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt</span>
                                </div>
                                <span class="font-12 text-muted">Common Contact</span>
                                <ul class="list-unstyled team-info margin-0 pt-2">
                                    <li><img src="assets/images/xs/avatar5.jpg" alt="Avatar"></li>
                                    <li><img src="assets/images/xs/avatar6.jpg" alt="Avatar"></li>
                                    <li><img src="assets/images/xs/avatar1.jpg" alt="Avatar"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card ">
                            <div class="card-body">
                                <div class="mb-3"> <img src="assets/images/sm/avatar2.jpg" class="rounded-circle w100" alt=""> </div>
                                <div class="mb-2">
                                    <h5 class="mb-0">Michelle Green</h5>
                                    <p>Aalizeethomas@info.com</p>
                                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt</span>
                                </div>
                                <span class="font-12 text-muted">Common Contact</span>
                                <ul class="list-unstyled team-info margin-0 pt-2">
                                    <li><img src="assets/images/xs/avatar8.jpg" alt="Avatar"></li>
                                    <li><img src="assets/images/xs/avatar7.jpg" alt="Avatar"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card ">
                            <div class="card-body">
                                <div class="mb-3"> <img src="assets/images/sm/avatar4.jpg" class="rounded-circle w100" alt=""> </div>
                                <div class="mb-2">
                                    <h5 class="mb-0">Mary Schneider</h5>
                                    <p>Aalizeethomas@info.com</p>
                                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt</span>
                                </div>
                                <span class="font-12 text-muted">Common Contact</span>
                                <ul class="list-unstyled team-info margin-0 pt-2">
                                    <li><img src="assets/images/xs/avatar2.jpg" alt="Avatar"></li>
                                    <li><img src="assets/images/xs/avatar7.jpg" alt="Avatar"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="tab-pane fade" id="addnew" role="tabpanel">
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{route('admin.school.add')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Enter Name" name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Enter Mobile Number" name="mobile" maxlength10="10" minlength="10" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Enter Email" name="email" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Enter Password" name="password" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <textarea type="text" class="form-control" rows="4" name="address" required></textarea>
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-12">
                                        <input type="file" class="dropify">
                                    </div> --}}
                                    <div class="col-lg-12 mt-3">
                                        <button type="submit" class="btn btn-primary">Add</button>
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
</div>


@endsection