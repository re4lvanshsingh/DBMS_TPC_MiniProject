<?php
            $con = mysqli_connect("localhost","root","","projmini");

            if(!$con)die("connection to database failed due to" . mysqli_connect_error());
        
            $email = $_POST['email'];
            $password =  $_POST['password'];
            $sq1 = "select `password` from `companyreg` where `email` = '$email';";
            $result = mysqli_query($con,$sq1);

            $data = array();
            if (mysqli_num_rows($result) > 0){
                while ($row = mysqli_fetch_assoc($result)){
                    $data[] = $row;
                }
            }

            $found = "";
            foreach($data as $row){
                $found = $row['password'];
                break;
            }

            if($found == ""){
                echo "No such email ID found";
                die();
            }
            else{
                if($found==$password){
                    session_start();
                    $_SESSION['mail'] = $email;
                    $qry = "insert ignore into `companyupd` (`email`) values ('$email');"; 

                    if($con->query($qry)==true){
                        
                    }
                    else echo "ERROR: $qry <br> $con->error";
                }
                else{
                    echo "Wrong Password entered";
                    die();
                }
            }
        
            $con->close();
?>

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
	                        <h1 class="hero-title mt-0">Welcome to Recruiters Portal</h1>
	                        <p class="hero-paragraph">Go ahead and update your requirements on the Update Page. Details of candidates fulfilling the criteria can be fetched from Eligible Page</p>
	                        <div class="hero-cta">
								<a class="button button-primary" href="compupd.php">Update</a>
                                <a class="button button-primary" href="eligiblestud.php">Eligible</a>
								
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
