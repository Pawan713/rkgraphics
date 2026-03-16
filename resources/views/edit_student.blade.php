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
						{{-- <form role="form" class="form-horizontal" action="{{route('user.student.update',$student->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf --}}
						<form id="editStudentForm">
							<input type="hidden" id="student_id" value="{{ $student->id }}">
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" placeholder="Sudent Name" type="text" name="name" id="name" required value="{{$student->name}}">
								</div>
							</div>
                            <div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" placeholder="Father Name" type="text" name="father_name" id="father_name" value="{{$student->father_name}}">
								</div>
							</div>
                            <div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" placeholder="Mother Name" type="text" name="mother_name" id="mother_name" value="{{$student->mother_name}}">
								</div>
							</div>

                            <div class="form-group">
								<div class="col-md-12 mb-2">
									<select name="class" id="class" class="form-control" >
										<option value="">Choose Class</option>
										<option value="playgroup"  {{$student->class=='playgroup'?'selected':''}}>Playgroup</option>
										<option {{$student->class=='pre-nursery'?'selected':''}} value="pre-nursery">Pre-Nursery</option>
										<option value="nursery" {{$student->class=='nursery'?'selected':''}}>Nursery</option>
										<option value="lkg" {{$student->class=='lkg'?'selected':''}}>LKG</option>
										<option value="ukg" {{$student->class=='ukg'?'selected':''}}>UKG</option>
										<option value="I" {{$student->class=='I'?'selected':''}}>Class 1</option>
										<option value="II" {{$student->class=='II'?'selected':''}}>Class 2</option>
										<option value="III" {{$student->class=='III'?'selected':''}}>Class 3</option>
										<option value="IV" {{$student->class=='IV'?'selected':''}}>Class 4</option>
										<option value="V" {{$student->class=='V'?'selected':''}}>Class 5</option>
										<option value="VI" {{$student->class=='VI'?'selected':''}}>Class 6</option>
										<option value="VII" {{$student->class=='VII'?'selected':''}}>Class 7</option>
										<option value="VIII" {{$student->class=='VIII'?'selected':''}}>Class 8</option>
										<option value="IX" {{$student->class=='IX'?'selected':''}}>Class 9</option>
										<option value="X" {{$student->class=='X'?'selected':''}}>Class 10</option>
										<option value="XI" {{$student->class=='XI'?'selected':''}}>Class 11</option>
										<option value="XII" {{$student->class=='XII'?'selected':''}}>Class 12</option>
										<option value="teacher"  {{$student->class=='teacher'?'selected':''}}>Teacher</option>
										<option value="caretaker"  {{$student->class=='caretaker'?'selected':''}}>Caretaker</option>
										<option value="driver"  {{$student->class=='driver'?'selected':''}}>Driver</option>
										<option value="director"  {{$student->class=='director'?'selected':''}}>Director</option>
									</select>
							
								</div>
								<div class="col-md-12 mb-2">
									<select name="section" id="section" class="form-control">
										<option value="">Choose Section</option>
										<option value="a"  {{$student->section=='a'?'selected':''}}>A</option>
										<option value="b"  {{$student->section=='b'?'selected':''}}>B</option>
										<option value="c"  {{$student->section=='c'?'selected':''}}>C</option>
										<option value="d"  {{$student->section=='d'?'selected':''}}>D</option>
										<option value="e"  {{$student->section=='e'?'selected':''}}>E</option>
										<option value="f"  {{$student->section=='f'?'selected':''}}>F</option>
									</select>
								</div>
							</div>
                            <div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" placeholder="Roll No" type="text" name="roll_no" id="roll_no" required value="{{$student->roll_no}}">
								</div>
							</div>

							  <div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" placeholder="Addmission No" type="text" name="addmission_no" id="addmission_no" value="{{$student->addmission_no}}">
								</div>
							</div>

                            <div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" placeholder="Date Of Birth" type="date" name="dob" id="dob" value="{{$student->dob}}">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input type="email" class="form-control" id="email_id" placeholder="Email"  name="email" value="{{$student->email}}">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input  type="text" class="form-control" id="mobile_no" placeholder="Mobile"  name="mobile" value="{{$student->mobile}}" minlength="10" maxlength="10" id="mobile">
								</div>
							</div>
                            <div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" placeholder="Bus No Name" type="text" name="bus_no" id="bus_no" value="{{$student->bus_no}}">
								</div>
							</div>

                            <div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" placeholder="Blood Groups" type="text" name="blood_group" id="blood_group" value="{{$student->blood_group}}">
								</div>
							</div>
                            <div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" placeholder="Address" type="text" name="address" id="address" value="{{$student->address}}">
								</div>
							</div>

                            <div class="form-group">
								<div class="col-sm-12">
									{{-- <input class="form-control" placeholder="Student Photo" type="file" name="photo" alt="Student Photo"> --}}

									<input class="form-control" placeholder="Student Photo" type="file" name="photo" id="imageInput" alt="Student Photo" onchange="document.querySelector('#output').src=window.URL.createObjectURL(this.files[0])">

                                 

								</div>

								<div class="col-sm-3">
								  {{-- <img id="output" class="img-thumbnail img-fluid" src="#" alt=""/> --}}
								     <img id="output" src="{{ asset('uploads/students/' . $student->photo) }}" class="img-thumbnail img-fluid" width="150" height="150" alt="{{$student->photo}}">
								</div>
                                
							</div>

							<div class="row">							
								<div class="col-sm-10">
									<input type="submit" class="btn btn-light btn-radius btn-brd grd1" value="Update"/>
									{{-- <input type="reset" class="btn btn-light btn-radius btn-brd grd1" value="Cancel"/> --}}
									
										
								</div>
							</div>
							<div id="status" style="color:green"></div>
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

<script>
	document.getElementById('editStudentForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const studentId = document.getElementById('student_id').value;
    const file = document.getElementById('imageInput').files[0];
    const status = document.getElementById('status');
    
    status.innerText = "Saving changes...";
		// alert(document.getElementById('email').value);
    // Function to send data to server
    const sendData = (compressedFile = null) => {
        const formData = new FormData();
        formData.append('name', document.getElementById('name').value);
            formData.append('father_name', document.getElementById('father_name').value);
            formData.append('mother_name', document.getElementById('mother_name').value);
            formData.append('class', document.getElementById('class').value);
			formData.append('section', document.getElementById('section').value);
            formData.append('roll_no', document.getElementById('roll_no').value);
			formData.append('addmission_no', document.getElementById('addmission_no').value);
			formData.append('dob', document.getElementById('dob').value);
			formData.append('email', document.getElementById('email_id').value);
			formData.append('mobile', document.getElementById('mobile_no').value);
			formData.append('bus_no', document.getElementById('bus_no').value);
			formData.append('blood_group', document.getElementById('blood_group').value);
			formData.append('address', document.getElementById('address').value);

        if (compressedFile) {
            formData.append('photo', compressedFile, compressedFile.name);
        }

        // Use POST but spoof PUT for Laravel RESTful routing
        formData.append('_method', 'PUT'); 

		let urlTemplate = "{{ route('user.student.update', ':id') }}";
		let finalUrl = urlTemplate.replace(':id', studentId);
		// console.log("Final URL:", finalUrl);
        axios.post(finalUrl, formData)
            .then(response => {
					Swal.fire({
						icon: 'success',
						title: 'Success',
						text: response.data.message,
						timer: 2000, // 2 seconds
						timerProgressBar: true,
						confirmButtonText: 'OK'
					}).then((result) => {
						/* This code runs only AFTER the alert disappears */
						if (response.data.redirect_url) {
							window.location.href = response.data.redirect_url;
						}
					});
            })
            .catch(error => {
					Swal.fire({
					icon: 'error',
					title: 'Update Failed',
					text: error.response.message,
					confirmButtonText: 'Close',
					confirmButtonColor: '#d33' // Optional: red color for the button
				});
                // console.error(error.response);
                // alert("Error updating record.");
            });
    };

    // If user selected a NEW image, compress it first
    if (file) {
        new Compressor(file, {
            quality: 0.6,
            maxWidth: 1000,
            success(result) {
                sendData(result);
            }
        });
    } else {
        // No new image, just send text fields
        sendData();
    }
});
</script>

@endsection