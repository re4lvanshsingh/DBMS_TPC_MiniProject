<?php
//Connect to MySQL server 
$con = mysqli_connect("localhost","root","","projmini");

if(!$con)die("connection to database failed due to" . mysqli_connect_error());
session_start();

//If there is no session user, then redirect to login page 
if (!isset($_SESSION['ID'])) {
	header("location: http://localhost/miniproj/login.php");
}

//Find various fields for an student and save them in variables for display purposes 
$pwd = $_SESSION['pwd'];
$email= $_SESSION['email'];
$result = mysqli_query($con, "SELECT * FROM users WHERE email='$email' and password= '$pwd' ");
$row = mysqli_fetch_array($result);

if ($row['email'] == $email && $row['password'] == $pwd)
{
	// $_SESSION['sess_user']= true;	
	$_SESSION['id']= true;
	$_SESSION['roll']= $row["roll_no"];
$fname = $row["first_name"];
$sname = $row["last_name"];
$dept = $row["Department"];
$roll = $row["roll_no"];
$email = $row["email"];
$phno = $row["phone"];
$pwd = $row["password"];

if(isset($_POST['submit'])){
	
	$query= "SELECT * from student where Roll_no= '$roll' ";
	$res= mysqli_query($con, $query);
    // $arr= mysqli_fetch_array($res);
    // echo $mysqli_num_rows($res);

	if(mysqli_num_rows($res) >0 ){
		$arr= mysqli_fetch_array($res);
		$_SESSION['mcpi']= $arr['Current_grades'];
        $_SESSION['pkg'] = $arr['Current_package'];
		header("location: eligible_comp.php");
	}
	
	else{
		echo "<script>alert('Please register for TPC first!')</script>";
	}
}
}
?>

<!-- 
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Profile</title>
</head>

<body>
	 <h2> <?php echo "Welcome " . $fname; ?> </h2>
	<h3>Profile Details</h3>
	<table>
		<tr>
			<td>First Name: </td>
			<td><?php echo $fname; ?></td>
		</tr>
		<tr>
			<td>last Name: </td>
			<td><?php echo $sname; ?></td>
		</tr>
		<tr>
			<td>Department: </td>
			<td><?php echo $dept; ?></td>
		</tr>
		<tr>
			<td>Roll No.: </td>
			<td><?php echo $roll; ?></td>
		</tr>
		
		<tr>
			<td>Mobile Number: </td>
			<td><?php echo $phno; ?></td>
		</tr>
		
		<tr>
			<td>Email: </td>
			<td><?php echo $email; ?></td>
		</tr>
	</table>
	<br /> -->
<!-- 
	<a href="http://localhost/miniproj/update_profile.php"> Update email/mobile </a><br />
	<a href="http://localhost/miniproj/logout.php"> Log out </a> <br>
	<a href="http://localhost/miniproj/tpcform.php"><button class="btn btn-default"> Register for TPC</button> </a> -->
    <!-- <form action="" method="post">
        <button type= "submit" name= "submit" > Eligibility</button>
    </form> 
</body>

</html>

<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Switch Template</title>
    <link href="https://fonts.googleapis.com/css?family=Heebo:400,700|IBM+Plex+Sans:600" rel="stylesheet">
    <link rel="stylesheet" href="dist/css/style.css">
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
</head>
<body class="is-boxed has-animations">
    <div class="body-wrap boxed-container">
        <header class="site-header">
            <div class="container">
                <div class="site-header-inner">
                    <div class="brand header-brand">
                        <h1 class="m-0">
                        
                            <div class="lights-toggle">
                                <input id="lights-toggle" type="checkbox" name="lights-toggle" class="switch" checked="checked">
                                <label for="lights-toggle" class="text-xs"><span>Turn me <span class="label-text">dark</span></span></label>
                            </div>
                        </h1>
                    </div>
                </div>
            </div>
        </header>

        <main>
            <section class="hero">
                <div class="container">
                    <div class="hero-inner">
						<div class="hero-copy">
	                        <h1 class="hero-title mt-0">Welcome to Student Portal</h1>
	                        <p class="hero-paragraph">Go ahead and update your requirements on the Update Page. Details of companies you are eligible for can be fetched from Eligible Page</p>
                        </div>
                            <h2> <?php echo "Welcome " . $fname; ?> </h2>
                            
	<h3>Profile Details</h3>
	<br />
	                         <div class="hero-cta">
								<a class="button button-primary" href="update_profile.php">Update</a>
                                <a class="button button-primary" href="tpcform.php"><button class="btn btn-default"> Register for TPC</button> </a>
	                    <a class="button button-primary" href="logout.php"> Log out </a>
                                <form action="" method="post">
                            <button type= "submit" name= "submit" > Eligibility</button>
                            </form>
                            
								
							 </div>
						</div>
						<div class="hero-media">
							<div class="header-illustration">
								<img class="header-illustration-image asset-light" src="dist/images/header-illustration-light.svg" alt="Header illustration">
								<img class="header-illustration-image asset-dark" src="dist/images/header-illustration-dark.svg" alt="Header illustration">
							</div>
							<div class="hero-media-illustration">
								<img class="hero-media-illustration-image asset-light" src="dist/images/hero-media-illustration-light.svg" alt="Hero media illustration">
								<img class="hero-media-illustration-image asset-dark" src="dist/images/hero-media-illustration-dark.svg" alt="Hero media illustration">
							</div>
						</div>
                    </div>
                </div>
            </section>
    </div>

    <script src="dist/js/main.min.js"></script>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Students Portal</title>
    <link href="https://fonts.googleapis.com/css?family=Heebo:400,700|IBM+Plex+Sans:600" rel="stylesheet">
    <link rel="stylesheet" href="dist/css/style.css">
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>

    <style>
        .lights-toggle .button.one{
            margin-left: 600px;
        }
        </style>
</head>
<body class="is-boxed has-animations">
    <div class="body-wrap boxed-container">
        <header class="site-header">
            <div class="container">
                <div class="site-header-inner">
                    <div class="brand header-brand">
                        <h1 class="m-0">
                            
                            <div class="lights-toggle">
                                <input id="lights-toggle" type="checkbox" name="lights-toggle" class="switch" checked="checked">
                                <label for="lights-toggle" class="text-xs"><span>Turn me <span class="label-text">dark</span></span></label>
                                
                                <!-- <form action="" method="post">
                                <button type= "submit" name= "submit" > Eligibility</button>
                                </form> -->
                                <a class="button two button-primary" href="logout.php">Logout</a>
                            </div>
                        </h1>
                    </div>
                </div>
            </div>
        </header>

        <main>
            <section class="hero">
                <div class="container">
                    <div class="hero-inner">
						<div class="hero-copy">
	                        <h1 class="hero-title mt-0">Welcome <?php echo $fname." ".$sname ?></h1>
	                        <!-- <p class="hero-paragraph">Go ahead and update your requirements on the Update Page. Details of candidates fulfilling the criteria can be fetched from Eligible Page</p> -->
                            <h4 class="hero-title mt-0"><?php echo "Roll Number: ".$roll ?> </h4>
                            <h4 class="hero-title mt-0"><?php echo "Department: ".$dept ?> </h4>
                            <h4 class="hero-title mt-0"><?php echo "Phone no: ".$phno ?> </h4>
                            <h4 class="hero-title mt-0"><?php echo "Email: ".$email ?> </h4>
	                        <div class="hero-cta">
								<a class="button button-primary" href="update_profile.php">Update Profile</a>
                                <a class="button button-primary" href="tpcform.php">Register for TPC</a>
                                <form action="" method="post">
                                <button type= "submit" name= "submit" > Eligibility</button>
                                </form>
							</div>
						</div>
						<div class="hero-media">
							<div class="header-illustration">
								<img class="header-illustration-image asset-light" src="dist/images/header-illustration-light.svg" alt="Header illustration">
								<img class="header-illustration-image asset-dark" src="dist/images/header-illustration-dark.svg" alt="Header illustration">
							</div>
							<div class="hero-media-illustration">
								<img class="hero-media-illustration-image asset-light" src="dist/images/hero-media-illustration-light.svg" alt="Hero media illustration">
								<img class="hero-media-illustration-image asset-dark" src="dist/images/hero-media-illustration-dark.svg" alt="Hero media illustration">
							</div>
						</div>
                    </div>
                </div>
            </section>
    </div>

    <script src="dist/js/main.min.js"></script>
</body>
</html>
