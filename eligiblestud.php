<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eligible Students</title>
    <style>
    html,
body {
	height: 100%;
}

body {
	margin: 0;
	background: linear-gradient(45deg, #49a09d, #5f2c82);
	font-family: sans-serif;
	font-weight: 100;
}

.container {
	position: absolute;
	top: 30%;
	left: 50%;
	transform: translate(-50%, -50%);
}

table {
	width: 800px;
	border-collapse: collapse;
	overflow: hidden;
	box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

th,
td {
	padding: 15px;
	background-color: rgba(255,255,255,0.2);
	color: #fff;
}

th {
	text-align: left;
}

thead {
	th {
		background-color: #55608f;
	}
}

tbody {
	tr {
		&:hover {
			background-color: rgba(255,255,255,0.3);
		}
	}
	td {
		position: relative;
		&:hover {
			&:before {
				content: "";
				position: absolute;
				left: 0;
				right: 0;
				top: -9999px;
				bottom: -9999px;
				background-color: rgba(255,255,255,0.2);
				z-index: -1;
			}
		}
	}
}
</style>
</head>
<body>
<div class="container">
	<table>
		<thead>
			<tr>
				<th>S. No.</th>
				<th>Roll Number</th>
                <th>CPI </th>
			</tr>
		</thead>
<?php 
    $con = mysqli_connect("localhost","root","","projmini");

    if(!$con)die("connection to database failed due to" . mysqli_connect_error());

    session_start();
    $email=$_SESSION['mail'];
    // $email="vanshenrique.singh@gmail.com";

    $temp=$con->query("select * from companyupd where email = '$email';");
    $tmp=mysqli_fetch_array($temp);

    if(empty($tmp))die();

    $mingrade=$tmp['minqual'];
    $package=$tmp['package'];
    $year=2025;


    $query="SELECT Roll_no,Current_grades from student where Current_grades>= $mingrade and Current_package<$package and Batch_year=$year order by Current_grades desc;";
    $quariy = $con->query($query);
    $p=1;
    while ($row = mysqli_fetch_array($quariy)):
?>
		<tbody>
			<tr>
				<td><?php echo $p;$p++; ?></td>
				<td><?php echo $row['Roll_no']; ?></td>
                <td><?php echo $row['Current_grades'] ?></td>
			</tr>
		</tbody>
<?php
endwhile;
?>
</table>
</div>
</body>
</html>