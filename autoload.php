<?php

// services
require "services/Router.php";

// models
require "models/User.php";
require "models/Admin.php";
require "models/Categories.php";
require "models/Comments.php";
require "models/Devis.php";
require "models/Projects.php";
require "models/DevisScene.php";


// managers
require "managers/AbstractManager.php";
require "managers/UserManager.php";
require "managers/CategoriesManager.php";
require "managers/CommentsManager.php";
require "managers/DevisManager.php";
require "managers/ProjectsManager.php";
require "managers/ArticleManager.php";
require "managers/MediaManager.php";

//upload

require "models/Media.php";
require "models/RandomStringGenerator.php";
require "models/Uploader.php";


// controllers
require "controllers/AbstractController.php";
require "controllers/UserController.php";
require "controllers/HomeController.php";
require "controllers/CategoriesController.php";
require "controllers/ArticleController.php";
require "controllers/AuthController.php";
require "controllers/CommentsController.php";
require "controllers/DevisController.php";
require "controllers/ProjectsController.php";
require "controllers/AdminController.php";


