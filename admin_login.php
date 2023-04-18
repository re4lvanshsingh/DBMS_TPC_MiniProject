    <?php 
session_start();
if(isset($_POST['submit'])){
    $usid = $_POST['uid'];
    $pwd= $_POST['pwd'];

    if($usid == 'iitp@123' and $pwd== 'tpc@2023'){
        $_SESSION['logedin']= true;
        header("Location: http://localhost/miniproj/stats_search.php");   
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
        <div  class="form-group" >
        <h1 style="text-align: center;"> Login</h1>
            <form action="" method="post" >
                <label for="uid"> Username: </label>
                <input type="password" id= 'uid' name= uid> <br><br>
                <label for="pwd">Password:</label>
                <input type="password" name="pwd" id="pwd"><br><br>

                <div style="padding-left: 3%; ">
						<input type="submit" value="Submit" name="submit" />
						<!-- No credentials yet? <a href="register.php">Register</a> -->
				</div><br>

                <div></div><a href="index.html"> Back to Home page</a>

            </form>
        </div>
  
    </center>
</body>
</html>