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
								<div class="col-sm-12">
									<input class="form-control" placeholder="Class" type="text" name="class" required value="{{$student->class}}" id="class">
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