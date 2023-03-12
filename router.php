<?php
require "functions.php";

$uri=parse_url($_SERVER['REQUEST_URI'])['path'];

// dd($uri);
$routes = [
    '/'=>'controllers/index.php',
    '/product'=>'controllers/product.php',
    '/admin' => 'controllers/adminlogin.php',
    '/orders' => 'controllers/orders.php',
    '/dashboard' => 'controllers/dashboard.php',
    '/customers' => 'controllers/customers.php',
    '/addcustomer' => 'controllers/addcustomer.php',
    '/menulist' => 'controllers/menu.php',
    '/addproduct' => 'controllers/addproduct.php',
    '/cart' => 'controllers/addcart.php',
];


if(array_key_exists($uri,$routes)){
    require $routes[$uri];
}else{
    http_response_code(404);

    echo "Sorry, Not found";

    die();
}


?>