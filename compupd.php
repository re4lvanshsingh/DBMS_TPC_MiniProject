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


<body style="background-color: #8595AE">
	<div class="container">
		<div class="row col-md-6 col-md-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h1>Update Company Requirements</h1>
				</div>
				<div class="panel-body">
					<form action="compexec.php" method="post">
						<div class="row">
							<div class="col-md-6 mb-4">
								<div class="form-group">
									<label class="form-label" for="eid">Company Name</label>
									<input type="text" class="form-control" name="compname" id="compname" placeholder="E123" required />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 mb-4">
								<div class="form-group">
									<label class="form-label" for="email">Minimum Qualifications (CPI)</label>
									<input type="number" step="0.1" class="form-control" name="minqual" id="minqual" placeholder="7.0" required />
								</div>
							</div>
							<div class="col-md-6 mb-4">
								<div class="form-group">
									<label for="phno" class="form-label">Role Offered</label>
									<input type="text" class="form-control" id="field" name="field" placeholder="Software Developer" required />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 mb-4">
								<div class="form-group">
									<label for="dep">Type of Test</label>
									<select class="form-control" id="type" name="type">
										<option>Written</option>
										<option>Interview</option>
									</select>
								</div>
							</div>
                            <div class="col-md-6 mb-4">
								<div class="form-group">
									<label for="dep">Mode of Conduction</label>
									<select class="form-control" id="conduct" name="conduct">
										<option>Online</option>
										<option>Offline</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 mb-4">
								<div class="form-group">
									<label class="form-label" for="email">Salary Package (in LPA)</label>
									<input type="number" class="form-control" name="salary" id="salary" placeholder="20" required />
								</div>
							</div>
						</div>
						<div class="row">
							<div style="align-items: center;padding-left: 3%;">
								<button type="submit" name="submit" class="btn btn-default">Update</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>