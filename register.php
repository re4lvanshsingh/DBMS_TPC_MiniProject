<?php
include 'config.php';

if (isset($_POST['submit'])) {
	//Save all values given in respective variables 
	$fname = $_POST['fname'];
	$sname = $_POST['sname'];
	$dept = $_POST['dept'];
	$roll = $_POST['roll'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$pwd1 = $_POST['pwd1'];
	$pwd2 = $_POST['pwd2'];

	
	if(!(preg_match('/^[0-9]{10}+$/', $phone))) {
	// echo "Invalid Phone Number";
	echo "<script> alert ('Invalid Phone number ')</script>";
	header( "Location: http://localhost/miniproj/register.php");
	}
	//If password does not match confirm password then throw error 
	if ($pwd1 != $pwd2) {
		echo "<script>alert('Passwords do not match.')</script>";
	} else {
		//Check if user with the same student id already exists
		$query = "SELECT * FROM users where email='$email' or roll_no='$roll'";
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result) > 0) {
			echo "<script>alert('User already registered. Please login.')</script>";
		} else {
			//Insert miniproj entry into database 
			$query = "INSERT INTO users (first_name, last_name, Department, roll_no, email, phone, password) 
				VALUES ('$fname','$sname','$dept','$roll','$email','$phone','$pwd1')";

			$result = mysqli_query($conn, $query);
			//If insertion is successful, then redirect to login page else throw error 
			if ($result) {
				echo "<script>alert('User registerd!')</script>";
				header("Location: http://localhost/miniproj/login.php");
			} else {
				echo "<script>alert('Error, something went wrong!')</script>";
			}	
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
	<!--<link rel="stylesheet" type="text/css" href="css/bootstrap.css"> -->

<body>
	<div class="container">
		<div class="row col-md-6 col-md-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h1>Registration Form</h1>
				</div>
				<div class="panel-body">
					<form action="" method="post">
						<div class="row">
							<div class="col-md-6 mb-4">
								<div class="form-group">
									<label class="form-label" for="fname">First Name</label>
									<input type="text" class="form-control" name="fname" id="fname" placeholder="John" required />
								</div>
							</div>
							<div class="col-md-6 mb-4">
								<div class="form-group">
									<label for="sname" class="form-label">Last Name</label>
									<input type="text" class="form-control form-control-lg" name="sname" id="sname" placeholder= "Singh" />
								</div>

							</div>
						</div>
						<!-- <div class="form-group">
							<label for="name" class="form-label">Full Name</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Robert Smith" required />
						</div> -->
						<div class="row">
							<div class="col-md-6 mb-4">
								<div class="form-group">
									<label for="dept">Department</label>
									<select class="form-control" id="dept" name="dept">
										<option>CSE</option>
										<option>Chemical</option>
										<option>Mechanical</option></option>
										<option>Civil</option>
										<option>Electrical</option>
										<option>MNC</option>
                                        <option> AI&DS </option>
                                        <option> Engineering Physics </option>
                                        <option> Metallurgy </option>
									</select>
								</div>
							</div>
							<div class="col-md-6 mb-4">
								<div class="form-group">
									<label for="roll" class="form-label">Roll Number</label>
									<input type="text" class="form-control" id="roll" name="roll" placeholder="2101CS01" required />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 mb-4">
								<div class="form-group">
									<label class="form-label" for="email">Email ID</label>
									<input type="email" class="form-control" name="email" id="email" placeholder="abc@xyz.com" required />
								</div>
							</div>
							<div class="col-md-6 mb-4">
								<div class="form-group">
									<label for="phone" class="form-label">Mobile Number</label>
									<input type="text" class="form-control" id="phone" name="phone" placeholder="8274201282" required />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="pwd1" class="form-label">Password</label>
							<input type="password" class="form-control" name="pwd1" id="pwd1" required />
						</div>
						<div class="form-group">
							<label for="pwd2" class="form-label">Confirm Password</label>
							<input type="password" class="form-control" name="pwd2" id="pwd2" required />
						</div>
						<div class="row">
							<div style="align-items: center;padding-left: 3%;">
								<button type="submit" name="submit" class="btn btn-default">Register</button>
								Already a user? <a href="http://localhost/miniproj/login.php">Login</a>
							</div>

							<div style="align-items: center;padding-left: 75%;">
							<a href="http://localhost/miniproj/alumni_reg.php">Alumni Section </a>
							</div>

						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>