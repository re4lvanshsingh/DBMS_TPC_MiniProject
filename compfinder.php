<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Past Recruitment</title>
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <!--<link rel="stylesheet" type="text/css" href="css/bootstrap.css"> -->
    
</head>
<body>
<div class="container">
		<div class="row col-md-6 col-md-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h1>Past Recruiters</h1>
				</div>
				<div class="panel-body">
					<form action="compdisplay.php" method="post">
						<div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="dep">Company</label>
                                    <select class="form-control" id="type" name="type">
                                        <option> All </option>
                                    <?php
                                        $con = mysqli_connect("localhost","root","","projmini");

                                        if(!$con)die("connection to database failed due to" . mysqli_connect_error());
        
                                        $year =  $_POST['year'];

                                        $quariy = $con->query("select distinct Company from placed;");
                                        $p=1;
                                        while ($row = mysqli_fetch_array($quariy)):
                                    ?>
                                        <option><?php echo $row['Company']; ?></option>
                                    <?php
                                        endwhile;
                                    ?>
                                    </select>
                                </div>
                            </div>
							<div class="col-md-6 mb-4">
								<div class="form-group">
									<label class="form-label" for="email">Year</label>
									<input type="year" class="form-control" name="year" id="year" placeholder="2023" />
								</div>
							</div>
						</div>
						<div class="row">
							<div style="align-items: center;padding-left: 3%;">
								<button type="submit" name="submit" class="btn btn-default">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>