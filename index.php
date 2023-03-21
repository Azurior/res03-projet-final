<?php

  
session_start();  
  
require "autoload.php";  
  
$router = new Router();  
  
if(isset($_GET["path"]))  
{  
    $router->checkRoute($_GET["path"]);  
}  
else  
{  
    $router->checkRoute("");  
}
// require "autoload.php";

// try {

//     $router = new Router();

//     if(isset($_GET['path']))
//     {
        
//         $router->checkRoute($_GET["path"]); 
//         //var_dump($_GET['path']);
//     }
//     else
//     {
//         $router->checkRoute("");
//     }
//     //$router->route($routes, $request);
// }
// catch(Exception $e)
// {
//     if($e->getCode() === 404)
//     {
//         require "./templates/404.phtml";
//     }
// }