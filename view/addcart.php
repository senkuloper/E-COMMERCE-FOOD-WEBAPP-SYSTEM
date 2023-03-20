<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>
<?php 
    session_start();
    if(isset($_GET['product_id'])){
        if(isset($_SESSION["shopping_card"])){
            $item_array_id=array_column($_SESSION["shopping_card"],"item_id");
            if(!in_array($_GET["product_id"],$item_array_id)){
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
            </tr>
            <?php
                    }
                }
            ?>
        </table>
    </div>
    <form>
        <button>Checkout</button>
    </form>
    
</body>
</html>