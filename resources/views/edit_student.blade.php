@extends('layouts.app')
@section('content')	

<div class="section ">
    <div class="container"> 
			@if ($errors->any())
				<div id="error-alert" class="alert alert-danger">
					<ul class="mb-0">
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
		<div class="d-flex justify-content-end">
            <a href="{{route('user.student')}}"><button class="btn btn-primary">View Student</button></a>
          </div>
        <div class="tab-pane" id="Registration">
						<form role="form" class="form-horizontal" action="{{route('user.student.update',$student->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" placeholder="Sudent Name" type="text" name="name" required value="{{$student->name}}">
								</div>
							</div>
                            <div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" placeholder="Father Name" type="text" name="father_name" required value="{{$student->father_name}}">
								</div>
							</div>
                            <div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" placeholder="Mother Name" type="text" name="mother_name" required value="{{$student->mother_name}}">
								</div>
							</div>

                            <div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" placeholder="Addmission No" type="text" name="addmission_no" required value="{{$student->addmission_no}}">
								</div>
							</div>

                            <div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" placeholder="Class" type="text" name="class" required value="{{$student->class}}">
								</div>
							</div>
                            <div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" placeholder="Roll No" type="text" name="roll_no" required value="{{$student->roll_no}}">
								</div>
							</div>
                            <div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" placeholder="Date Of Birth" type="date" name="dob" required value="{{$student->dob}}">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="email" placeholder="Email" type="email" name="email" value="{{$student->email}}">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="mobile" placeholder="Mobile" type="text" name="mobile" value="{{$student->mobile}}" minlength="10" maxlength="10">
								</div>
							</div>
                            <div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" placeholder="Bus No Name" type="text" name="bus_no" required value="{{$student->bus_no}}">
								</div>
							</div>

                            <div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" placeholder="Blood Groups" type="text" name="blood_group" required value="{{$student->blood_group}}">
								</div>
							</div>
                            <div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" placeholder="Address" type="text" name="address" required value="{{$student->address}}">
								</div>
							</div>

                            <div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" placeholder="Student Photo" type="file" name="photo" alt="Student Photo">
                                    <img src="{{ asset('uploads/students/' . $student->photo) }}" class="img-thumbnail" width="150" height="150" alt="{{$student->photo}}">

								</div>
                                
							</div>

							<div class="row">							
								<div class="col-sm-10">
									<button type="submit" class="btn btn-light btn-radius btn-brd grd1">
										Save
									</button>
									<button type="reset" class="btn btn-light btn-radius btn-brd grd1">
										Cancel</button>
								</div>
							</div>
						</form>
		</div>
    </div><!-- end container -->
</div><!-- end section -->

<script>
    setTimeout(function () {
        let alert = document.getElementById('error-alert');
        if (alert) {
            alert.style.transition = 'opacity 0.5s ease';
            alert.style.opacity = 0;
            setTimeout(() => alert.remove(), 500);
        }
    }, 5000); // 5000 ms = 5 seconds
</script>
@endsection