<?php 
 
$conn= mysqli_connect('localhost','root','', 'projmini');

if(!$conn){
    echo 'Connection Error' . mysqli_connect_error();
}

if(isset($_POST['submit'])){
    $name= $_POST['name'];
    $roll= $_POST['roll'];
    $mak1= $_POST['m1'];
    $mak2= $_POST['m2'];
    $cpi= $_POST['cpi'];
    $age= $_POST['age'];
    $spl= $_POST['spl'];
    $byr= $_POST['BY'];
    $pld= $_POST['PL'];
    $sp= $_POST['PK'];


$query = "SELECT * FROM student where Name='$name' and Roll_no='$roll'";
		$result = mysqli_query($conn, $query);
		// if (mysqli_num_rows($result) > 0) {
		// 	echo "<script>alert('User already registered.')</script>";}
		  {
			//Insert miniproj entry into database
            if($pld=='Y'){
			$query1 = "INSERT INTO student (Name,Roll_no,Class_10,Class_12, Current_grades,Age, Specialization, Batch_year, Placed,Current_package)
				VALUES ('$name','$roll','$mak1','$mak2','$cpi','$age','$spl','$byr', '$pld', '$sp')";
        }
        else{
            $query1 = "INSERT INTO student (Name,Roll_no,Class_10,Class_12, Current_grades,Age, Specialization, Batch_year, Placed,Current_package)
				VALUES ('$name','$roll','$mak1','$mak2','$cpi','$age','$spl','$byr', '$pld', '0')";
        }
			$result1 = mysqli_query($conn, $query1);
			//If insertion is successful, then redirect to login page else throw error 
			if ($result1) {
				echo "<script>alert('User registerd!')</script>";
				header("Location: http://localhost/miniproj/student_profile.php");
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
	<div class="container">
		<div class="row col-md-6 col-md-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h1>T.P.C. Registration Form</h1>
				</div>
				<div class="panel-body">
					<form action="" method="post">
						<div class="row">
							<div class="col-md-6 mb-4">
								<div class="form-group">
									<label class="form-label" for="name">Student Name</label>
									<input type="text" class="form-control" name="name" id="name" placeholder="John" required />
								</div>
							</div>
							<div class="row">
							<div class="col-md-5 mb-4">
								<div class="form-group">
									<label for="roll" class="form-label">Roll Number</label>
									<input type="text" class="form-control" id="roll" name="roll" placeholder="2101CS01" required />
								</div>
							</div>
						    </div>
						</div>
						<!-- <div class="form-group">
							<label for="name" class="form-label">Full Name</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Robert Smith" required />
						</div> -->
						<div class="row">
							<div class="col-md-5 mb-4">
								<div class="form-group">
									<label for="roll" class="form-label">10th grade(in %)</label>
									<input type="text" class="form-control" id="m1" name="m1" placeholder="" required />
								</div>
							</div>
                            
							<div class="col-md-5 mb-4">
                                <div class="form-group">
                                    <label for="roll" class="form-label">12th grade(in %)</label>
									<input type="text" class="form-control" id="m2" name="m2" placeholder="" required />
								</div>
							</div>
                        </div>
						
						<div class="row">
							<div class="col-md-5 mb-4">
								<div class="form-group">
									<label class="form-label" for="cpi">Currrent CPI</label>
									<input type="text" class="form-control" name="cpi" id="cpi"  required />
								</div>
							</div>
							<div class="col-md-4 mb-4">
								<div class="form-group">
									<label for="phone" class="form-label">Age</label>
									<input type="text" class="form-control" id="age" name="age" required />
								</div>
							</div>
						</div>
                        <div class= "row">
						<div class="col-md-6 mb-4">
								<div class="form-group">
									<label for="dept">Specialization</label>
									<select class="form-control" id="spl" name="spl">
										<option>CSE</option>
										<option>Chemical Engineering</option>
										<option>Mechanical Engineering</option></option>
										<option>Civil Engineering</option>
										<option>Electrical Engineering</option>
										<option>MNC</option>
                                        <option> AI&DS </option>
                                        <option> Engineering Physics </option>
                                        <option> Metallurgy </option>
									</select>
								</div>
							</div>
                            <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label for="pwd2" class="form-label">Batch year</label>
                                <input type="text" class="form-control" name="BY" id="pwd2" required />
                            </div>
                            </div>
                        </div>
						<div class="form-group">
							<label for="pwd3" class="form-label">Are you placed?(Y/N)</label>
							<input type="text" class="form-control" name="PL" id="pwd3" required />
						</div>
						<div class="form-group">
							<label for="pwd4" class="form-label">Salary Package</label>
							<input type="text" class="form-control" name="PK" id="pwd4" />
						</div>
						<div class="row">
							<div style="align-items: center;padding-left: 40%;">
								<button type="submit" name="submit" class="btn btn-default">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>