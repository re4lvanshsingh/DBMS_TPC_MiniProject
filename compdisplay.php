<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yearwise Recruiters</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #231232;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 30px;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            flex-direction: row;
            transition: box-shadow 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.2);
        }

        .card img {
            max-width: 100px;
            max-height: 100px;
            object-fit: cover;
            border-radius: 5px;
            margin-right: 20px;
        }

        .card-info {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .card-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .card-field {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .card-email {
            font-size: 14px;
            color: #999;
        }

        .card-logo {
            display: flex;
            align-items: center;
        }

        .card-logo img {
            max-width: 100px;
            max-height: 100px;
            object-fit: cover;
            border-radius: 5px;
            margin-right: 20px;
        }

        .card-info {
            flex-grow: 1;
        }
    </style>
</head>
<body>
<?php
            $con = mysqli_connect("localhost","root","","projmini");

            if(!$con)die("connection to database failed due to" . mysqli_connect_error());
        
            $year =  $_POST['year'];
            $name = $_POST['type'];

            $query;
            if($year=='' && $name=="All"){
                $query="select Company,Package,Year from placed order by Package desc;";
            }
            else if($year==''){
                $query="select Company,Package,Year from placed where Company='$name' order by Package desc;";
            }
            else if($name=="All"){
                $query="select Company,Package,Year from placed where Year='$year' order by Package desc;";
            }
            else{
                $query="select Company,Package,Year from placed where Company='$name' and Year='$year' order by Package desc;";
            }
            // echo $query;
            $quariy = $con->query($query);
            $p=1;
            while ($row = mysqli_fetch_array($quariy)):
?>
<div class="container">
        <div class="card">
            <!-- <div class="card-logo">
                <img src="https://google.com" alt="Company Logo">
            </div> -->
            <div class="card-info">
                <div class="card-title"><?php echo $p.". ".$row['Company'];$p++;?></div>
                <div class="card-field"><?php if($row['Package']!='')echo $row['Package']." LPA";?></div>
                <div class="card-email"><?php echo $row['Year'] ?></div>
            </div>
        </div>
    </div>
<?php
endwhile;
?>
</body>
</html>

