<?php     
    session_start();
    require 'elements/auth_check.php';
    require "database/Connection.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="public/css/style.css">
    <title>All customers</title>
</head>
<body>

    <?php
    $sql="select * from customers";
    $result = $con->query($sql);    
    ?>
    <div class="wrapper d-flex align-items-stretch">
        <div class="container">
        <div class="shadow p-3 mb-5 bg-body rounded">
            <table class="table">

                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                <?php
                        while($row=$result->fetch_assoc()){
                    ?>
                    <tr>
                    <th scope="row"><?php echo $row['id_customer'];?></th>
                    <td><?php echo $row['FirstName'];?></td>
                    <td><?php echo $row['LastName'];?></td>
                    <td><?php echo $row['PhoneNumber']; ?></td>
                    <td>
                        <button type="button" class="btn btn-info">Show</button>
                        <button type="button" class="btn btn-warning">Edit</button>
                        <button type="button" class="btn btn-danger">Delete</button>
                    </td>
                    <?php }?>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/popper.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/main.js"></script> 
</body>
</html>