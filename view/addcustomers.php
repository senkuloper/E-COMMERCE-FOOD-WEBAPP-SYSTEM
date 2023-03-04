<?php     
    require "database/connection.php"; 


    if($_SERVER['REQUEST_METHOD']=='POST'){
        $firstname=$_POST['FirstName'];
        $lastname=$_POST['LastName'];
        $phone=$_POST['PhoneNumber'];
        $sql="Insert into customers (FirstName,LastName,PhoneNumber) values('$firstname','$lastname','$phone')";
        echo $sql;
        if(mysqli_query($con,$sql)){
            echo "New record created successfully";
        }else{
            echo "New record not created";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="public/css/style.css">

    <title>Add New Customer</title>
</head>
<body>
    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">First Name</label>
            <input name="FirstName" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Last Name</label>
            <input name="LastName" type="text" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Phone Number</label>
            <input name="PhoneNumber" type="text" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Add Customer</button>
    </form>
</body>
<script src="public/js/jquery.min.js"></script>
	<script src="public/js/popper.js"></script>
	<script src="public/js/bootstrap.min.js"></script>
	<script src="public/js/main.js"></script>
</html>