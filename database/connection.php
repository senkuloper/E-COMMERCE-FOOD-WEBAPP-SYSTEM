<?php 
	$host='localhost';
	$user='root';
	$password='';
    $db='pdfcom_db';

    $con=mysqli_connect($host,$user,$password,$db);
    if(! $con){
        die("Could not connect to database");
    }

?>