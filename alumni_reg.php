<?php 
    include 'config.php';
    session_start();
    if(isset($_POST['submit']))
	{$roll= $_POST['roll'];

    $query= "SELECT * from placed where roll_no = '$roll'";
    $result= mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
	// $name1= $row['first_name'];

	if(mysqli_num_rows($result)==0){
		// echo " Alumni not found"
		echo "<script>alert('Alumni not found!')</script>";
		// header("location: alumni_reg.php");
	}
	else{

	// $name1= $row['first_name'];
	// $name2= $row['last_name'];
    $name= $_POST['name'];
    $email= $_POST['email'];
	$pcy= $_POST['cname'];
	$ctc= $_POST['sname'];
	$area= $_POST['dept'];
	$pos= $_POST['pos'];
	$loc= $_POST['loc'];
	$workt= $_POST['pwd1'];

	$query1= "INSERT into alumni (Name, Roll_no,Email, Present_company, CTC, Area, Position, Location, Working_tenure) values 
	('$name', '$roll', '$email', '$pcy', '$ctc', '$area', '$pos', '$loc', '$workt')";
	
	$result1= mysqli_query($conn, $query1);
	if ($result1) {
		echo "<script>alert('Alumni registerd!')</script>";
		header("Location: http://localhost/miniproj/alumni_login.php");
	} else {
		echo "<script>alert('Error, something went wrong!')</script>";
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
    <!-- <center>
        <h1> <?php echo "Welcome  " . $row["first_name"] . " " . $row["last_name"]; ?></h1>
    </center> -->


	<div class="container">
		<div class="row col-md-7 col-md-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h1>Alumni Details</h1>
				</div>
				<div class="panel-body">
					<form action="" method="post">
						<div class="row">
							<div class="col-md-6 mb-4">
								<div class="form-group">
									<label class="form-label" for="name">Your Name</label>
									<input type="text" class="form-control" name="name" id="name" placeholder="Divyam" required />
								</div>
							</div>
							<div class="col-md-6 mb-4">
								<div class="form-group">
									<label for="roll" class="form-label">Institute Roll no :</label>
									<input type="text" class="form-control form-control-lg" name="roll" id="roll" placeholder= "Ex: 2101CS01" required />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 mb-4">
								<div class="form-group">
									<label class="form-label" for="cname">Your present company</label>
									<input type="text" class="form-control" name="cname" id="cname" placeholder="Google" required />
								</div>
							</div>
							<div class="col-md-6 mb-4">
								<div class="form-group">
									<label for="sname" class="form-label">C.T.C</label>
									<input type="text" class="form-control form-control-lg" name="sname" id="sname" placeholder= "Ex: 40 L.P.A" />
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
									<label for="dept">Area</label>
									<select class="form-control" id="dept" name="dept">
										<option>Web Development</option>
										<option>IoT</option>
										<option>Android Development</option></option>
										<option>Data Analyst</option>
										<option>finance</option>
										<option>Core Sector</option>
                                        <option> AI&DS </option>
                                        <option> Machine learning </option>
                                        <option> UI/UX </option>
                                        <option> Game Development </option>
										<option> Other </option>
									</select>
								</div>
							</div>
							<div class="col-md-6 mb-4">
								<div class="form-group">
									<label for="pos" class="form-label">Position</label>
									<input type="text" class="form-control" id="pos" name="pos" placeholder="Ex: VIce president"  />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 mb-4">
								<div class="form-group">
									<label class="form-label" for="loc">Location</label>
									<input type="text" class="form-control" name="loc" id="loc" placeholder="Bangalore"  />
								</div>
							</div>
							<div class="col-md-6 mb-4">
								<label for="pwd1" class="form-label">Working Tenure</label>
								<input type="text" class="form-control" name="pwd1" id="pwd1" />
							</div>
							
						</div>
								<div class="form-group"; padding-left: 3%>
									<label for="email" class="form-label">Email-id </label>
									<input type="email" class="form-control" id="email" name="email" placeholder="abc@gmail.com" required />
								</div>
							
						<div class="form-group"; padding-left: 3%>
							<label for="pwd2" class="form-label">Password</label>
							<input type="password" class="form-control" name="pwd2" id="pwd2" required />
						</div>
						<div class="row">
							<center><div style="align-items: center;padding-left: 3%">
								<button type="submit" name="submit" class="btn btn-default">Submit</button>
							</div>
							<br>
							<div style="align-items: center;padding-right: 3%;">
								Already a registerd Alumni <a href="http://localhost/miniproj/alumni_login.php">Login</a>
							</div>
						</center>

						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>