<?php

/**
 * @author : Gaellan 
 * @author : Azurior
 */

require "services/Router.php";
require "models/User.php";
require "managers/AbstractManager.php";
require "managers/UserManager.php";
require "controllers/AbstractController.php";
require "controllers/UserController.php";
require "controllers/HomeController.php";

$routes = [];

// Read the routes config file
$handle = fopen("config/routes.txt", "r");

if ($handle) { // if the file exists

    while (($line = fgets($handle)) !== false) { // read it line by line

        $route = []; // each route is an array

        $routeData = explode(" ", str_replace(PHP_EOL, '', $line)); // divide the line in two strings (cut at the " ")
        

        $route["path"] = $routeData[0]; // the path is what was before the " "
        

            if(substr_count($route["path"], "/") > 1) // check if the path string has more than 1 "/"
            {
                $route["parameter"] = true; // the route expects a parameter
                $pathData = explode("/", $route["path"]); // divide the path in three strings (cut at the "/")
                
                if(substr_count($route["path"], "/") === 2){ //check if the path string is strictly equal to 2 "/"
                    
                    $route["path"] = "/".$pathData[1] . "/" . $pathData[2];
                    
                }
                else if(substr_count($route["path"], "/") === 3){ //check if the path string is strictly equal to 3 "/"
            
                    $route["path"] = "/".$pathData[1] . "/" . $pathData[2]. "/" . $pathData[3];
                    
                    
                }
                else if(substr_count($route["path"], "/") === 4){ //check if the path string is strictly equal to 4 "/"
                    
                    $route["path"] = "/".$pathData[1] . "/" . $pathData[2]. "/" . $pathData[3]. "/" . $pathData[4];
                    
                    
                }
                // Ceci permet de gérer jusqu'à 4 pages maximum et pas plus. Si je veux en rajouter, je devrais rajouter un else if.
                else {
                    
                    $route["path"] = "/".$pathData[1]; // isolate the path without the parameters
                    
                }
                
            }
            
            else
            {
                $route["parameter"] = false; // the route does not expect a parameter
            }
            
        $controllerString = $routeData[1]; // the controller string is what was after the " ";

        $controllerData = explode(":", $controllerString); // divide the controller string in two strings (cut at the ":")

        $route["controller"] = $controllerData[0]; // the controller is what was before the ":"

        $route["method"] = $controllerData[1]; // the method is what was after the ":"

        $routes[] = $route; // add the new route to the routes array
    }

    fclose($handle); // close the file
}