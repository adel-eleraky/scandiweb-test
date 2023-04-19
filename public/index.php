<?php

use App\Application;
use App\Controller\ProductController;

require_once __DIR__ . "/../vendor/autoload.php";


$App = new Application;

$App->router->get("/" , [ProductController::class , "index"]);
$App->router->post("/" , [ProductController::class , "delete"]);
$App->router->get("/add-product" , [ProductController::class , "add"]);
$App->router->post("/add-product" , [ProductController::class , "save"]);

$App->run();

?>