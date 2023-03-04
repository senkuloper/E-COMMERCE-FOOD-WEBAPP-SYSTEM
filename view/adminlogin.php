<?php 
	// require"../functions.php";
	$host='localhost';
	$user='root';
	$password='';
    $db='pdfcom_db';

    $con=mysqli_connect($host,$user,$password,$db);

    // session_start();
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $query="select * from adminlogin where email='$email' and password='$password'";

        $result=mysqli_query($con,$query);
        $row=mysqli_fetch_array($result);
        $count=mysqli_num_rows($result);

        if($count==1){
            // $_SESSION["email"]=$email;
            header("location:dashboard");
        }
        else{
            echo "email or password is incorrect";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="public/css/style.css">

    <title>Log In</title>
</head>
<body>
	<section class="ftco-section">
		<div class="container">

			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
				<h3 class="text-center mb-4">Have an account?</h3>
				<form action="#" method="post" class="login-form">
					<div class="form-group">
						<input type="text" name="email" class="form-control rounded-left" placeholder="Email" required>
					</div>
					<div class="form-group d-flex">
						<input type="password" name="password" class="form-control rounded-left" placeholder="Password" required>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary rounded submit p-3 px-5">LogIn</button>
					</div>
				</form>
	        </div>
				</div>
			</div>
		</div>
	</section>
    <script src="public/js/jquery.min.js"></script>
	<script src="public/js/popper.js"></script>
	<script src="public/js/bootstrap.min.js"></script>
	<script src="public/js/main.js"></script>
</body>
</html>