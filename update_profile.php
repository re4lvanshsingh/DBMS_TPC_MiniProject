<?php
//Connect to MySQL 
require 'config.php';
session_start();

//If there is no session user, then redirect to login page 
if (!isset($_SESSION['id'])) {
	header("location: http://localhost/miniproj/student_profile.php");
}
$sid = $_SESSION['roll'];
if (isset($_POST['submit'])) {

	//Store entered values in variables 
	$phno = $_POST['phno'];
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];

	//Check credentials with password and proceed 
	$query = "SELECT * FROM users WHERE roll_no='$sid' AND password='$pwd'";
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) != 0) {

		//If any field is left blank, then do not update the attribute. 
		if ($phno && $email) {
			$result = mysqli_query($conn, "UPDATE users SET phone='$phno', email='$email' WHERE roll_no='$sid'");
			if ($result) {
				echo "<script>alert('Profile updated!')</script>";
                $_SESSION['pwd'] = $pwd;
                $_SESSION['email'] = $email;
				header("Location: http://localhost/miniproj/student_profile.php");
			} else {
				echo "<script>alert('Something went wrong.')</script>";
			}
		} else if ($phno) {
			$result = mysqli_query($conn, "UPDATE users SET phone='$phno' WHERE roll_no='$sid'");
			if ($result) {
				echo "<script>alert('Profile updated!')</script>";
                $_SESSION['pwd'] = $pwd;
                $_SESSION['email'] = $email;
				header("Location: http://localhost/miniproj/profile.php");
			} else {
				echo "<script>alert('Something went wrong.')</script>";
			}
		} else if ($email) {
			$result = mysqli_query($conn, "UPDATE users SET email='$email' WHERE roll_no='$sid'");
			if ($result) {
				echo "<script>alert('Profile updated!')</script>";
                $_SESSION['pwd'] = $pwd;
                $_SESSION['email'] = $email;
				header("Location: http://localhost/miniproj/profile.php");
			} else {
				echo "<script>alert('Something went wrong.')</script>";
			}
		} else {
			echo "<script>alert('Atleast one field required.')</script>";
		}
	} else {
		echo "<script>alert('Wrong password.')</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
	<!--<link rel="stylesheet" type="text/css" href="css/bootstrap.css"> -->

<body>
	<div class="container" >
		<div class="row col-md-6 col-md-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h1>Profile Updation</h1>
				</div>
				<div class="panel-body">
					<form action="" method="post">
						<div class="row mb-3">
							<label class="col-sm-3 col-form-label" for="sid">Student Roll No.</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="sid" id="sid" value="<?php echo $sid; ?>" disabled />
							</div>
						</div>
						<br />
						<div class="row mb-3">
							<label for="pwd" class="col-sm-3 col-form-label">Password</label>
							<div class="col-sm-9">
								<input type="password" class="form-control" id="pwd" name="pwd" required />
							</div>
						</div>
						<br />
						<div class="row mb-3">
							<label class="col-sm-3 col-form-label" for="phno">Mobile Number</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="phno" id="phno" />
							</div>
						</div>
						<br />
						<div class="row mb-3">
							<label class="col-sm-3 col-form-label" for="email">Email</label>
							<div class="col-sm-9">
								<input type="email" class="form-control" name="email" id="email" />
							</div>
						</div>
						<br />
						<button type="submit" name="submit" class="btn btn-default">Update</button>
						<a href="http://localhost/miniproj/student_profile.php">Back to profile</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>