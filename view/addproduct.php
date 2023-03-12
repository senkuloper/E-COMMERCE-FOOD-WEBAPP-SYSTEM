<?php     
    require "database/Connection.php";

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $imageUpload=$_FILES['imageUpload']["name"];
        $ProductName=$_POST['ProductName'];
        $Price=$_POST['price'];
        $target_dir="public/assets/img/tech/";
        $target_file=$target_dir.basename($_FILES['imageUpload']["name"]);
        $uploadOk=1;
        $imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $check=getimagesize($_FILES["imageUpload"]["tmp_name"]);
        if($check!==false){
            echo "file is an image - ".$check["mime"].".";
            $uploadOk=1;
        }else{
            echo "File is not an image";
            $uploadOk=0;

        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["imageUpload"]["name"])). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        // }


        
        $sql="Insert into menus (ProductName,Price,image) VALUES ('$ProductName','$Price','$imageUpload')";
        if(mysqli_query($con,$sql)){
            echo "New Record added Successfully";
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
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="public/css/style.css">
        <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <title>Add Product</title>
</head>
<body>
    <form method="POST" action="#" enctype="multipart/form-data">
        <div class="custom-file">
            <input type="file" name="imageUpload" class="custom-file-input" id="customFile">
            <label class="custom-file-label"  for="customFile">Add Image</label>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Food Name</label>
            <input type="text" class="form-control" name="ProductName" id="exampleFormControlInput1" placeholder="Food Name" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Price</label>
            <input type="text" class="form-control" name="price" id="exampleFormControlInput1" placeholder="Price" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Food</button>
    </form>
</body>
<script src="public/js/jquery.min.js"></script>
    <script src="public/js/popper.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
</html>