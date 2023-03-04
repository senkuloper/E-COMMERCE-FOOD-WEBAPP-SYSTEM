<?php     require "database/connection.php"; 
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $customerId = $_POST['customer'];
        $productId = $_POST['product'];
        $sql="Insert into orders (id_customer,id_menu) values('$customerId','$productId')";
        echo $sql;
        if(mysqli_query($con,$sql)){
            echo "Successfully inserted";
        }else{
            echo "Failed to insert order";
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <title>Orders</title>
</head>
<body>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Order Now
</button>
    <?php
        $sql="select * from menus";
        $result = $con->query($sql);  
        $sqlc="select * from customers";
        $resultc = $con->query($sqlc);     
    ?>
    <!-- Modal -->
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Order Now</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
  
                <select name="customer">
                    <?php while($rowc=$resultc->fetch_assoc()){ ?>
                    <option value="<?php echo $rowc['id_customer'] ?>"><?php echo $rowc['FirstName']." ".$rowc['LastName']; ?></option>
                    <?php } ?>
                </select>

                <select name="product">
                    <?php while($row=$result->fetch_assoc()){ ?>
                    <option value="<?php echo $row['id_menu'] ?>"><?php echo $row['ProductName'] ?></option>
                    <?php } ?>
                </select>

        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">SUBMIT</button>
        </div>
        </form>
    </div>
    </div>
    </div>
    <?php
    $sql="select * from orders inner join customers on orders.id_customer = customers.id_customer";
    $sqlmenu="select * from orders inner join menus on orders.id_menu = menus.id_menu";
    $result = $con->query($sql);    
    $resultmenu=$con->query($sqlmenu);
    ?>
    <div class="wrapper d-flex align-items-stretch">
        <div class="container">
        <div class="shadow p-3 mb-5 bg-body rounded">
            <table class="table">

                <thead>
                    <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Order Name</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Order Status</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                <?php
                        while($row=$result->fetch_assoc()){
                        while($rowmenu=$resultmenu->fetch_assoc()){
                    ?>
                    <tr>
                    <th scope="row"><?php echo $row['id_order'];?></th>
                    <td><?php echo $rowmenu['ProductName'];?></td>
                    <td><?php echo $row['FirstName']." ".$row['LastName'];?></td>
                    <td>#</td>

                    <?php }?>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
</body>
</html>