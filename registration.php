<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Registration | PHP</title>
	<link rel="stylesheet"   type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<div>
	<?php
	
	?>	
</div>

<div>
	<form action="registration.php" method="post">
		<div class="container">
			
			<div class="row">
				<div class="col-sm-3">
					<h1>Registration form</h1>
					<p>Introdu datele corecte.</p>
					<hr class="mb-3">
					<label for="firstname"><b>First Name</b></label>
					<input class="form-control" id="firstname" type="text" name="firstname" required>

					<label for="lastname"><b>Last Name</b></label>
					<input class="form-control" id="lastname"  type="text" name="lastname" required>

					<label for="email"><b>Email Address</b></label>
					<input class="form-control" id="email"  type="email" name="email" required>

					<label for="phonenumber"><b>Phone Number</b></label>
					<input class="form-control" id="phonenumber"  type="text" name="phonenumber" required>
                	<label for="city"><b>City</b></label>
					<input class="form-control" id="city"  type="city" name="city" required>
                    <label for="profession"><b>Profession</b></label>
					<input class="form-control" id="profession"  type="profession" name="profession" required>
                    <label for="edutitle"><b>Education title</b></label>
					<input class="form-control" id="edutitle"  type="edutitle" name="edutitle" required>
                    <label for="graduation"><b>Graduation date</b></label>
					<input class="form-control" id="graduation"  type="date" name="date" required>
                    <label for="edutype"><b>Education type</b></label>
				    <input class="form-control" id="edutype"  type="edutype" name="edutype" required>
                    <label for="jobname"><b>Job name</b></label>
					<input class="form-control" id="jobname"  type="jobname" name="jobname" required>
                    <label for="startdate"><b>Start date</b></label>
					<input class="form-control" id="startdate"  type="date" name="date" required>
                    <label for="enddate"><b>End date</b></label>
					<input class="form-control" id="enddate"  type="date" name="date" required>
                    <label for="location"><b>Location</b></label>
					<input class="form-control" id="location"  type="location" name="location" required>
                    <label for="company"><b>Company name</b></label>
					<input class="form-control" id="company"  type="company" name="company" required>
					<hr class="mb-3">
					<input class="btn btn-primary" type="submit" id="register" name="create" value="Submit">
				</div>
			</div>
		</div>
	</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
	$(function(){
		$('#register').click(function(e){

			var valid = this.form.checkValidity();

			if(valid){


			var firstname 	= $('#firstname').val();
			var lastname	= $('#lastname').val();
			var email 		= $('#email').val();
			var phonenumber = $('#phonenumber').val();
			var city 	    = $('#city').val();
            var profession  = $('#profession').val();
            var edutitle 	= $('#edutitle').val();
            var graduation 	= $('#graduation').val();
            var edutype 	= $('#edutype').val();
            var jobname 	= $('#jobname').val();
            var startdate	= $('#startdate').val();
            var enddate     = $('#enddate').val();
            var location	= $('#location').val();
            var company     = $('#company').val();
			

				e.preventDefault();	

				$.ajax({
					type: 'POST',
					url: 'process.php',
					data: {firstname: firstname,lastname: lastname,email: email,phonenumber: phonenumber,city: city,profession: profession,edutitle: edutitle, graduation: graduation, edutype: edutype, jobname: jobname, startdate: startdate, enddate: enddate, location: location, company: company  },
					success: function(data){
					Swal.fire({
								'title': 'Successful',
								'text': data,
								'type': 'success'
								})
							
					},
					error: function(data){
						Swal.fire({
								'title': 'Errors',
								'text': 'There were errors while saving the data.',
								'type': 'error'
								})
					}
				});

				
			}else{
				
			}

			



		});		

		
	});
	
</script>
</body>
</html>