<?php
//Connect to MySQL server 
require 'config.php';
session_start();

//If there is no session user, then redirect to login page 
if (!isset($_SESSION['logged in'])) {
	header("location: http://localhost/miniproj/login.php");
}

//Find various fields for an student and save them in variables for display purposes 
$roll = $_SESSION['roll'];
// $email= $_SESSION['email'];
$result = mysqli_query($conn, "SELECT * FROM alumni WHERE Roll_no='$roll' ");
$row = mysqli_fetch_array($result);

// if ($row['email'] == $email && $row['password'] == $pwd)
{
	// $_SESSION['sess_user']= true;	
	$_SESSION['id']= true;
	$_SESSION['roll']= $row["Roll_no"];
$fname = $row["Name"];
$comp_name = $row["Present_company"];
$sal = $row["CTC"];
$roll = $row["Roll_no"];
$area = $row["Area"];
$pos = $row["Position"];
$loc = $row["Location"];
$workt = $row['Working_tenure'];
$email = $row['Email'];

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Profile</title>
</head>

<body>
	<center>
	<h2> <?php echo "Welcome " . $fname; ?> </h2>
	<h3>Profile Details</h3>
	<table>
		<tr>
			<td>Name: </td>
			<td><?php echo $fname; ?></td>
		</tr>
        <tr>
            <td> Email: </td>
            <td> <?php echo $email ;?></td>
        </tr>
		<tr>
			<td>Company: </td>
			<td><?php echo $comp_name; ?></td>
		</tr>
		<tr>
			<td>CTC(in l.p.a): </td>
			<td><?php echo $sal; ?></td>
		</tr>
		<tr>
			<td>Area: </td>
			<td><?php echo $area; ?></td>
		</tr>
		
		<tr>
			<td>Position: </td>
			<td><?php echo $pos; ?></td>
		</tr>
		
		<tr>
			<td>Location: </td>
			<td><?php echo $loc; ?></td>
		</tr>
	</table>
	<br />
	
	<a href="http://localhost/miniproj/update_alumni.php"> Update details </a><br />
	<a href="http://localhost/miniproj/alumni_logout.php"> Log out </a> <br>
</center>
    

</body>

</html>