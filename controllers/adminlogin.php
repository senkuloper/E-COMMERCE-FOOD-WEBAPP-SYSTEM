<?php 
	// require"../functions.php";
	require "view/adminlogin.php";



    require "database/connection.php";

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