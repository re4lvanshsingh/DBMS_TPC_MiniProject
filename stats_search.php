
<?php 
    include 'config.php';
    session_start();
	if($_SESSION['logedin']){

	if(isset($_POST['Logout'])){
		header("location: http://localhost/miniproj/admin_logout.php");
	}

	if (isset($_POST['submit'])){
        $comp = $_REQUEST['cname'];
        $yr= $_POST['yr'];
		$_SESSION['c1'] = false;
		$_SESSION['c2'] = false;
		$_SESSION['c3'] = false;

		// echo ($comp);
        // echo($yr);
		if($comp && $yr){
        $query= " SELECT * FROM placed where Year = '$yr' and Company= '$comp' ORDER BY Package"  ;
        $res= mysqli_query($conn, $query);
        $row = mysqli_fetch_array($res);
		
        if (mysqli_num_rows($res) == 0){
			echo "<script>alert('No Data found! Please select another year.')</script>";
			// header("Location: stats_search.php");
        }

		else
        {	
			$_SESSION['comp']= $comp;
			$_SESSION['yr']= $yr;
			$_SESSION['c1']= true;
            header("Location: http://localhost/miniproj/stats.php");
        }
	    }
	else if($comp){
        {	
			$_SESSION['comp']= $comp;
			$_SESSION['c2']= true;
            header("Location: http://localhost/miniproj/stats.php");
        }
	}
	else if($yr){
		
		$query= " SELECT * FROM placed where Year = '$yr'ORDER BY Package"  ;
        $res= mysqli_query($conn, $query);
        $row = mysqli_fetch_array($res);
        if (mysqli_num_rows($res) == 0){
			echo "<script>alert('No Data found! Please select another year.')</script>";
			// header("Location: stats_search.php");
        }

		else
        {	
			$_SESSION['yr']= $yr;
			$_SESSION['c3']= true;
            header("Location: http://localhost/miniproj/stats.php");
        }
	}
	// header("Location: http://localhost/miniproj/stats.php");
    }
}
else
header("location: http://localhost/miniproj/admin_login.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Placement
	</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
	<!--<link rel="stylesheet" type="text/css" href="css/bootstrap.css"> -->

<body>
<!-- include ph -->

	<div class="container">
		<div class="row col-md-6 col-md-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h1 style="text-align: center;">Placement stats</h1>
				</div>
				<div class="panel-body">
					<form action="" method="post">
                    <div class="col-md-6 mb-4">
								<div class="form-group" style= "padding-left: 10%">
									<label for="cname">Select Company</label>
									<select class="form-control" id="cname" name="cname">
									<!-- <option value="" disabled selected hidden>Choose Company</option> -->
										
										<option value=""> Select Company</option>
										<?php 
										$sql= "SELECT DISTINCT Company from placed" ;
                                        $res= mysqli_query($conn, $sql);
                                        while($row= mysqli_fetch_assoc($res))
                                        {?>
                                            <option value= <?php echo( $row['Company']) ;?> > <?php echo $row['Company'] ;?> </option>
                                        <?php 
                                        } ?>
                                        
									</select>
                                </div>
						</div>
                                <div class="col-md-6 mb-4" >
								<div class="form-group">
									<label for="yr">Select Year</label>
									<select class="form-control" id="yr" name="yr">
									<!-- <option value="" disabled selected hidden>Choose a year</option> -->
										<option value="">Select year</option>
										<!-- <option value="2016">2014</option> -->
										<option value="2016">2015</option>
										<option value="2016">2016</option>
										<option value="2017">2017</option>
										<option value="2018">2018</option>
										<option value="2019">2019</option>
										<option value="2020">2020</option>
										<option value="2021">2021</option>
										<option value="2022">2022</option>
										<option value="2023">2023</option>
									</select>
									</div>
								</div>
						
                        <center><div class="row">
							<div style="align-items: center;padding-left: 3%;">
							<input type="submit" value="submit" name="submit" />
							</div>

							<div style="align-items: center; padding-right: 80%;">
								<input type="submit" value="Logout" name= "Logout">
							</div>
						</div>
                        </center>
						
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>