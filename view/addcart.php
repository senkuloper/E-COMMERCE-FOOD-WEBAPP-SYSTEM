<?php 
    session_start();

    // require("Cart.php");

    if(isset($_GET['product_id'])){
        // echo $product_id=$_GET['product_id'];
        // echo "<br>";
        // $cart=new Cart($product_id); 
        // echo $cart->display();
        if(isset($_SESSION["shopping_card"])){
            $item_array_id=array_column($_SESSION["shopping_card"],"item_id");
            if(!in_array($_GET["product_id"],$item_array_id)){
                echo "***".$_POST['hidden_name'];
                $count=count($_SESSION["shopping_card"]);
                $item_array=array(
                    'item_id'=>$_GET['product_id'],
                    'item_name'=>$_POST['hidden_name'],
                    'item_price'=>$_POST['hidden_price'],
                    // 'item_id'=>$_POST['quantity'],
                );
                $_SESSION["shopping_card"][$count]=$item_array;
            }else{
                echo '<script>alert("Item Already Added");</script>';
                echo '<script>window.location="view/addcart.php";</script>';
            }
        }
        else{
            $item_array=array(
                'item_id'=>$_GET['product_id'],
                'item_name'=>$_POST['hidden_name'],
                'item_price'=>$_POST['hidden_price'],
                // 'item_id'=>$_POST['quantity'],
            );
            $_SESSION["shopping_card"][0]=$item_array;
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>
    <h3>Order Details</h3>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th width="40%">Item Name</th>
                <th width="20%">Price</th>
            </tr>
            <?php
                if(!empty($_SESSION["shopping_card"])){
                    foreach($_SESSION["shopping_card"] as $keys => $values){
                
            ?>
            <tr>
                <td><?php echo $values["item_name"]; ?></td>
                <td><?php echo $values["item_price"]; ?></td>
                <!-- <td>echo $values["item_name"]; ?></td> -->
            </tr>
            <?php
                    }
                }
            ?>
        </table>

    </div>
</body>
</html>