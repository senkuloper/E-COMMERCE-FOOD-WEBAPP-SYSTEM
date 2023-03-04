<?php  


class Cart{

    private $product=[];
    public $productName;
    public $price;

    public function __construct($product_id){
        require "database/connection.php";
        $query="select * from menus";
        $result=$con->query($query);
        // $data=$result->fetch_assoc();
        while($row =$result->fetch_assoc()){
            if($row['id_menu']==$product_id){
               $this->price=$row['Price'];
               $this->productName=$row['ProductName'];
            }
        }
    }
    public function display(){
        return "ProductName:: ".$this->productName."} price:: ".$this->price;
    }
    
    
}




?>