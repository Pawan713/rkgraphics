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
						{{-- <form role="form" class="form-horizontal" action="{{route('user.student.store')}}" method="POST" enctype="multipart/form-data" id="profileForm"> --}}
							<form id="profileForm">
                            {{-- @csrf --}}
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" placeholder="Student Name" type="text" name="name" id="name" required value="{{ old('name') }}">
								</div>
							</div>
                            <div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" placeholder="Father Name" type="text" name="father_name" id="father_name" value="{{ old('father_name') }}">
								</div>
							</div>
                            <div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" placeholder="Mother Name" type="text" name="mother_name" id="mother_name" value="{{ old('mother_name') }}">
								</div>
							</div>


                            <div class="form-group">
								<div class="col-md-12 mb-2">
									{{-- <input class="form-control" placeholder="Class" type="text" name="class" id="class" required value="{{ old('class') }}"> --}}
									<select name="class" id="class" class="form-control" >
										<option value="">Choose Class</option>
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
										<option value="teacher">Teacher</option>
										<option value="caretaker">Caretaker</option>
										<option value="driver">Driver</option>
										<option value="director">Director</option>
									</select>
								</div>
								<div class="col-md-12 mb-2">
									<select name="section" id="section" class="form-control">
										<option value="">Choose Section</option>
										<option value="a">A</option>
										<option value="b">B</option>
										<option value="c">C</option>
										<option value="d">D</option>
										<option value="e">E</option>
										<option value="f">F</option>
									</select>
								</div>
							</div>
                            <div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" placeholder="Roll No" type="text" name="roll_no" id="roll_no" required value="{{ old('roll_no') }}">
								</div>
							</div>

							 <div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" placeholder="Addmission No" type="text" name="addmission_no"  value="{{ old('addmission_no') }}" id="addmission_no">
								</div>
							</div>

                            <div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" placeholder="Date Of Birth" type="date" name="dob" id="dob" required value="{{ old('dob') }}">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input type="email" class="form-control" id="email_id" placeholder="Email"  name="email"  value="{{ old('email') }}">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input type="text" class="form-control" id="mobile_no" placeholder="Mobile"  name="mobile" value="{{ old('mobile') }}" minlength="10" maxlength="10">
								</div>
								@error('mobile')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
                            <div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" placeholder="Bus No" type="text" name="bus_no" value="{{ old('bus_no') }}" id="bus_no">
								</div>
							</div>

                            <div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" placeholder="Blood Groups" type="text" name="blood_group" id="blood_group" value="{{ old('blood_group') }}">
								</div>
							</div>
                            <div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" placeholder="Address" type="text" name="address"  value="{{ old('address') }}" id="address">
								</div>
							</div>

                            <div class="form-group">
								<div class="col-sm-12">
									{{-- <input class="form-control" placeholder="Student Photo" type="file" name="photo" required alt="Student Photo" onchange="document.querySelector('#output').src=window.URL.createObjectURL(this.files[0])">--}}

									<input class="form-control" placeholder="Student Photo" type="file" name="photo" required alt="Student Photo" onchange="previewImage(event)" id="imageInput" />
								</div>
								<div class="col-sm-3">
								  <img id="output" class="img-thumbnail img-fluid" src="#" alt="" style="display: none;height:100px;width:150px;"/>
								</div>
							</div>

							<div class="row">							
								<div class="col-sm-10">
									<button type="submit" class="btn btn-light btn-radius btn-brd grd1">
										Save
									</button>
									<button type="reset" class="btn btn-light btn-radius btn-brd grd1">Cancel</button>
								</div>
							</div>
							<div id="status"></div>
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
	// Add Student Image Preview Before Upload 
function previewImage(event) {
    const img = document.getElementById('output');
    const file = event.target.files[0];

    if (file) {
        img.src = URL.createObjectURL(file);
        img.style.display = "block";

        // Optional: free memory after image loads
        img.onload = () => URL.revokeObjectURL(img.src);
    }
}
</script>


<script>
	// Add Student Values
	document.getElementById('profileForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Stop page from refreshing
	//axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const file = document.getElementById('imageInput').files[0];
    const status = document.getElementById('status');
	// console.log("How many 'mobile' IDs: " + document.querySelectorAll('#email_id').length);
	// alert(document.getElementById('email_id').value);
	
		// exit();
	
    if (!file) {
        alert("Please select an image");
        return;
    }
	
    status.innerText = "Processing and Uploading...";
    // 1. Start Compression
    new Compressor(file, {
        quality: 0.6,
        maxWidth: 1000,
        success(result) {
            // 2. Prepare the "Package" (FormData)
            const formData = new FormData();
			
            // Add the compressed image
            formData.append('photo', result, result.name);
            
            // Add all your other fields
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

			
            // 3. Send to Laravel via Axios
            axios.post('{{route('user.student.store')}}', formData)
            .then(response => {
                status.innerText = "Student Data Process!";
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

                // Optionally redirect or reset form
            })
            .catch(error => {
                status.innerText = "Error occurred.";
                console.error(error.response.data);
            });
        },
    });
});
</script>



@endsection