<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan 
 * @author : Azurior
 */

class Router {

    private UserController $userController;
    private HomeController $homeController;
    private ArticleController $articleController;
    private CategoriesController $categoriesController;
    private CommentsController $commentsController;
    private DevisController $devisController;
    private ProjectsController $projectsController;
    private AuthController $authController;
    private AdminController $adminController;
    
    public function __construct(){
        
        $this->userController = new UserController();
        $this->homeController = new HomeController();
        $this->articleController = new ArticleController();
        $this->categoriesController = new CategoriesController();
        $this->commentsController = new CommentsController();
        $this->devisController = new DevisController();
        $this->projectsController = new ProjectsController();
        $this->authController = new AuthController();
        $this->adminController = new AdminController();
    }
    
    private function splitRouteAndParameters(string $route) : array  
    {  
        $routeAndParams = [];  
        $routeAndParams["route"] = null;  
        $routeAndParams["project-id"] = null;
        $routeAndParams["category-id"] = null;
        $routeAndParams["article-id"] = null;
        $routeAndParams["comments-id"] = null;
        $routeAndParams["devislogo-id"] = null;
        $routeAndParams["deviswallpaper-id"] = null;
        $routeAndParams["devisscene-id"] = null;
        $routeAndParams["user-id"] = null;
        $routeAndParams["sub-route"] = null; 
        $routeAndParams["sub-route-two"] = null;
        $routeAndParams["methode"] = null; 
        
        
      
        if(strlen($route) > 0) // si la chaine de la route n'est pas vide (donc si ça n'est pas la home)  
        {  
            $tab = explode("/", $route);  
      
      
        
            if($tab[0] === "home" && !isset($tab[1])){
                
               $routeAndParams["route"] = "home"; 
                
            }    
            else if($tab[0] === "projects" && !isset($tab[1])) // page Projects  
            {  
                 
                $routeAndParams["route"] = "projects";  
                
            }
            else if($tab[0] === "projects" && $tab[1] !== null && !isset($tab[2])) // page project en fonction de l'id 
            {  
                 
                $routeAndParams["route"] = "projects";  
                $routeAndParams["projects-id"] = $tab[1];
                 
            } 
            else if($tab[0] === "projects" && $tab[1] !== null && $tab[2] !== null && !isset($tab[3])) // page Categorie  
            {  
                 
                $routeAndParams["route"] = "projects";
                $routeAndParams["projects-id"] = $tab[1];
                $routeAndParams["sub-route"] = $tab[2];
                
                 
            }
            else if($tab[0] === "projects" && $tab[1] !== null && $tab[2] !== null && $tab[3] !== null && !isset($tab[4])) // page Categorie en fonction de l'id 
            {  
                 
                $routeAndParams["route"] = "projects";
                $routeAndParams["projects-id"] = $tab[1];
                $routeAndParams["sub-route"] = $tab[2];
                $routeAndParams["category-id"] = $tab[3];
                
                 
            }
            else if($tab[0] === "projects" && $tab[1] !== null && $tab[2] !== null && $tab[3] !== null && $tab[4] !== null && !isset($tab[5])) // page Article  
            {  
                 
                $routeAndParams["route"] = "projects";
                $routeAndParams["projects-id"] = $tab[1];
                $routeAndParams["sub-route"] = $tab[2];
                $routeAndParams["categories-id"] = $tab[3];
                $routeAndParams["sub-route-two"] = $tab[4];
                
                 
            }
            else if($tab[0] === "projects" && $tab[1] !== null && $tab[2] !== null && $tab[3] !== null && $tab[4] !== null && $tab[5] !== null && !isset($tab[6])) // page Articles en fonction de l'id 
            {  
                 
                $routeAndParams["route"] = "projects";
                $routeAndParams["projects-id"] = $tab[1];
                $routeAndParams["sub-route"] = $tab[2];
                $routeAndParams["categories-id"] = $tab[3];
                $routeAndParams["sub-route-two"] = $tab[4];
                $routeAndParams["article-id"] = $tab[5];
                 
            }
            else if($tab[0] === "devis" && !isset($tab[1])) // page Devis  
            {  
                 
                $routeAndParams["route"] = "devis";  
                 
            }
            else if($tab[0] === "check-wallpaper" && !isset($tab[1])) // page Devis  
            {  
                 
                $routeAndParams["route"] = "check-wallpaper";  
                 
            }
            else if($tab[0] === "check-logo" && !isset($tab[1])) // page Devis  
            {  
                 
                $routeAndParams["route"] = "check-logo";  
                 
            }
            else if($tab[0] === "check-scene" && !isset($tab[1])) // page Devis  
            {  
                 
                $routeAndParams["route"] = "check-scene";  
                 
            }
            else if($tab[0] === "authentificator" && !isset($tab[1])) // page de création d'un utilisateur 
            {  
                 
                $routeAndParams["route"] = "authentificator"; 
                
            }
            else if($tab[0] === "check-register" && !isset($tab[1])) // condition(s) pour envoyer vers la page de connexion/inscription 
            {  
                $routeAndParams["route"] = "check-register"; 
            }
            else if($tab[0] === "check-login" && !isset($tab[1])) // condition(s) pour envoyer vers la page de connexion/inscription 
            {  
                $routeAndParams["route"] = "check-login";
            }
            else if($tab[0] === "logout" && !isset($tab[1])) // page de deconnexion
            {
                $routeAndParams["route"] = "logout";
            }
            else if($tab[0] === "user" && $tab[1] !== null &&!isset($tab[2])) // page d'un Utilisateur  
            {  
                 
                $routeAndParams["route"] = "user"; 
                $routeAndParams["user-id"] = $tab[1];
                 
            }
            
            
            //----------------------------------------------------- Admin -----------------------------------------------------\\
            
            
            // User
            else if($tab[0] === "admin" && !isset($tab[1])) // page Admin   
            {  
                 
                $routeAndParams["route"] = "admin";  
                 
            }
            else if($tab[0] === 'admin' && $tab[1] !== null && !isset($tab[2])) // route vers l'index d'un type de modèle pour l'administrateur 
            {    
                $routeAndParams["route"] = "admin";  
                $routeAndParams["sub-route"] = $tab[1];
            }
            else if($tab[0] === "admin" && $tab[1] === 'user' && $tab[2] !== null && $tab[3] === "edit" && !isset($tab[4])) // page d'édition d'un utilisateur 
            {  
                 
                $routeAndParams["route"] = "admin";
                $routeAndParams["sub-route"] = $tab[1];
                $routeAndParams["user-id"] = $tab[2];
                $routeAndParams["methode"] = $tab[3];
                
            }
            else if($tab[0] === "admin" && $tab[1] === 'user' && $tab[2] !== null && $tab[3] === "delete" && !isset($tab[4])) // page de suppression d'un utilisateur  
            {  
                 
                $routeAndParams["route"] = "admin"; 
                $routeAndParams["sub-route"] = $tab[1];
                $routeAndParams["user-id"] = $tab[2];
                $routeAndParams["methode"] = $tab[3];
                
            }
            
            // Projet
            else if($tab[0] === "admin" && $tab[1] === 'projects' && $tab[2] === "create" && !isset($tab[3])) // page de création de projet
            {  
                 
                $routeAndParams["route"] = "admin";
                $routeAndParams["sub-route"] = $tab[1];
                $routeAndParams["methode"] = $tab[2];
        
            }
            else if($tab[0] === "admin" && $tab[1] === 'projects' && $tab[2] !== null && $tab[3] === "edit" && !isset($tab[4])) // page d'édit de projet
            {  
                 
                $routeAndParams["route"] = "admin";
                $routeAndParams["sub-route"] = $tab[1];
                $routeAndParams["project-id"] = $tab[2];
                $routeAndParams["methode"] = $tab[3];
                
            }
            else if($tab[0] === "admin" && $tab[1] === 'projects' && $tab[2] !== null && $tab[3] === "delete" && !isset($tab[4])) // page de suppression de projet
            {  
                 
                $routeAndParams["route"] = "admin";
                $routeAndParams["sub-route"] = $tab[1];
                $routeAndParams["project-id"] = $tab[2];
                $routeAndParams["methode"] = $tab[3];
                
            }
            
            // Categorie
            else if($tab[0] === "admin" && $tab[1] === 'categories' && $tab[2] === "create" && !isset($tab[3])) // page de création d'une catégorie
            {  
                 
                $routeAndParams["route"] = "admin";
                $routeAndParams["sub-route"] = $tab[1];
                $routeAndParams["methode"] = $tab[2];
                
            }
            else if($tab[0] === "admin" && $tab[1] === 'categories' && $tab[2] !== null && $tab[3] === "edit" && !isset($tab[4])) // page d'édit d'une catégorie
            {  
                 
                $routeAndParams["route"] = "admin";
                $routeAndParams["sub-route"] = $tab[1];
                $routeAndParams["category-id"] = $tab[2];
                $routeAndParams["methode"] = $tab[3];
                
            }
            else if($tab[0] === "admin" && $tab[1] === 'categories' && $tab[2] !== null && $tab[3] === "delete" && !isset($tab[4])) // page de suppression d'une catégorie
            {  
                 
                $routeAndParams["route"] = "admin";
                $routeAndParams["sub-route"] = $tab[1];
                $routeAndParams["category-id"] = $tab[2];
                $routeAndParams["methode"] = $tab[3];
                
            }
            
            // Article
            
            else if($tab[0] === "admin" && $tab[1] === 'articles' && $tab[2] === "create" && !isset($tab[3])) // page de création d'un article
            {  
                $routeAndParams["route"] = "admin";
                $routeAndParams["sub-route"] = $tab[1];
                $routeAndParams["methode"] = $tab[2];
                
            }
            else if($tab[0] === "admin" && $tab[1] === 'articles' && $tab[2] !== null && $tab[3] === "edit" && !isset($tab[4])) // page d'édit d'un article
            {  
                 
                $routeAndParams["route"] = "admin";
                $routeAndParams["sub-route"] = $tab[1];
                $routeAndParams["articles-id"] = $tab[2];
                $routeAndParams["methode"] = $tab[3];
                
            }
            else if($tab[0] === "admin" && $tab[1] === 'articles' && $tab[2] !== null && $tab[3] === "delete" && !isset($tab[4])) // page de suppression d'un article
            {  
                 
                $routeAndParams["route"] = "admin";
                $routeAndParams["sub-route"] = $tab[1];
                $routeAndParams["articles-id"] = $tab[2];
                $routeAndParams["methode"] = $tab[3];
                
            }
            
            // Commentaires
            
            else if($tab[0] === "admin" && $tab[1] === 'comments' && $tab[2] !== null && $tab[3] === "accept" && !isset($tab[4])) // page d'acceptation d'un commentaire
            {  
                 
                $routeAndParams["route"] = "admin";
                $routeAndParams["sub-route"] = $tab[1];
                $routeAndParams["comments-id"] = $tab[2];
                $routeAndParams["methode"] = $tab[3];
                
            }
            else if($tab[0] === "admin" && $tab[1] === 'comments' && $tab[2] !== null && $tab[3] === "delete" && !isset($tab[4])) // page de suppression d'un commentaire
            {  
                 
                $routeAndParams["route"] = "admin";
                $routeAndParams["sub-route"] = $tab[1];
                $routeAndParams["comments-id"] = $tab[2];
                $routeAndParams["methode"] = $tab[3];
                
            }
            
            // Devis
            
            else if($tab[0] === "admin" && $tab[1] === 'devislogo' && $tab[2] !== null && $tab[3] === "edit" && !isset($tab[4])) // Liste de tous les devis
            {  
                 
                $routeAndParams["route"] = "admin";
                $routeAndParams["sub-route"] = $tab[1];
                $routeAndParams["devislogo-id"] = $tab[2];
                $routeAndParams["methode"] = $tab[3];
                
            }
            else if($tab[0] === "admin" && $tab[1] === 'deviswallpaper' && $tab[2] !== null && $tab[3] === "edit" && !isset($tab[4])) // Liste de tous les devis
            {  
                 
                $routeAndParams["route"] = "admin";
                $routeAndParams["sub-route"] = $tab[1];
                $routeAndParams["deviswallpaper-id"] = $tab[2];
                $routeAndParams["methode"] = $tab[3];
                
            }
            else if($tab[0] === "admin" && $tab[1] === 'devisscene' && $tab[2] !== null && $tab[3] === "edit" && !isset($tab[4])) // Liste de tous les devis
            {  
                 
                $routeAndParams["route"] = "admin";
                $routeAndParams["sub-route"] = $tab[1];
                $routeAndParams["devisscene-id"] = $tab[2];
                $routeAndParams["methode"] = $tab[3];
                
            }
            else if($tab[0] === "admin" && $tab[1] === 'devislogo' && $tab[2] !== null && $tab[3] === "delete" && !isset($tab[4])) // Liste de tous les devis
            {  
                 
                $routeAndParams["route"] = "admin";
                $routeAndParams["sub-route"] = $tab[1];
                $routeAndParams["devislogo-id"] = $tab[2];
                $routeAndParams["methode"] = $tab[3];
                
            }
            else if($tab[0] === "admin" && $tab[1] === 'deviswallpaper' && $tab[2] !== null && $tab[3] === "delete" && !isset($tab[4])) // Liste de tous les devis
            {  
                 
                $routeAndParams["route"] = "admin";
                $routeAndParams["sub-route"] = $tab[1];
                $routeAndParams["deviswallpaper-id"] = $tab[2];
                $routeAndParams["methode"] = $tab[3];
                
            }
            else if($tab[0] === "admin" && $tab[1] === 'devisscene' && $tab[2] !== null && $tab[3] === "delete" && !isset($tab[4])) // Liste de tous les devis
            {  
                 
                $routeAndParams["route"] = "admin";
                $routeAndParams["sub-route"] = $tab[1];
                $routeAndParams["devisscene-id"] = $tab[2];
                $routeAndParams["methode"] = $tab[3];
                
            }
            
            
        }  
        else  
        {  
            $routeAndParams["route"] = "";  
        }  
      
        return $routeAndParams;  
    }
    
    public function checkRoute(string $route) : void  
    {  
        $routeTab = $this->splitRouteAndParameters($route); 
        $post = $_POST;
      
        // Public 
    
        
        if($routeTab["route"] === "home") // condition(s) pour envoyer vers la home  
        {  
            $this->homeController->home(); // appeler la méthode du controlleur pour afficher la home  
        }  
        else if($routeTab["route"] === "projects") // condition(s) pour envoyer vers les projets
        {  
            $this->projectsController->getAllProjectsPublic(); // appeler la méthode du controlleur pour tous les projects
        }  
        else if($routeTab["route"] === "projects" && $routeTab["project-id"] !== null) // condition(s) pour envoyer vers un projet par rapport à son ID
        {  
            $this->projectsController->projectId(intval($routeTab["project-id"])); // appeler la méthode du controlleur pour afficher un projet par rapport à son ID  
        }  
        else if($routeTab["route"] === "projects" && $routeTab["project-id"] !== null && $routeTab["sub-route"] === "categories") // condition(s) pour envoyer vers les catégories d'un projet 
        {  
            $this->categoriesController->allCategories();// appeler la méthode du controlleur pour afficher les catégories d'un projet 
        }
        else if($routeTab["route"] === "projects" && $routeTab["project-id"] !== null && $routeTab["sub-route"] === "categories" && $routeTab["categories-id"] !== null) // condition(s) pour envoyer vers une seule catégorie  
        {  
            $this->categoriesController->categoriesId(intval($routeTab["category-id"]));// appeler la méthode du controlleur pour afficher une seule catégorie 
        }
        else if($routeTab["route"] === "projects" && $routeTab["project-id"] !== null && $routeTab["sub-route"] === "categories" && $routeTab["categories-id"] !== null && $routeTab["sub-route-two"] === "articles") // condition(s) pour envoyer vers tous les articles de la catégorie choisis 
        {  
            $this->articleController->allArticles();// appeler la méthode du controlleur pour afficher tous les articles de la catégorie choisis
        } 
        else if($routeTab["route"] === "projects" && $routeTab["project-id"] !== null && $routeTab["sub-route"] === "categories" && $routeTab["categories-id"] !== null && $routeTab["sub-route-two"] === "articles" && $routeTab["articles-id"] !== null) // condition(s) pour envoyer vers l'article sélectionné  
        {  
            $this->articleController->articlesId(intval($routeTab["articles-id"]));// appeler la méthode du controlleur pour afficher l'article sélectionné
        } 
        else if($routeTab["route"] === "devis") // condition(s) pour envoyer vers la page devis 
        {  
            $this->devisController->devis(); // appeler la méthode du controlleur pour récupérer les formulaires des devis

        }
        else if($routeTab["route"] === "check-wallpaper") // condition(s) pour envoyer vers la page devis 
        {  
           
            $this->devisController->devisWallpaperCreate();
            
        }
        else if($routeTab["route"] === "check-logo") // condition(s) pour envoyer vers la page devis 
        {  
            
            $this->devisController->devisLogoCreate();

        }
        else if($routeTab["route"] === "check-scene") // condition(s) pour envoyer vers la page devis 
        {  

            $this->devisController->devisSceneCreate();
            
        }
        else if($routeTab["route"] === "authentificator") // condition(s) pour envoyer vers la page de connexion/inscription 
        {  
            $this->authController->authentificator();
        }
        else if($routeTab["route"] === "check-register") // condition(s) pour envoyer vers la page de connexion/inscription 
        {  
            $this->authController->checkRegister(); // appeler la méthode du controlleur pour s'enregistrer
        }
        else if($routeTab["route"] === "check-login") // condition(s) pour envoyer vers la page de connexion/inscription 
        {  
            $this->authController->checkLogin(); // appeler la méthode du controlleur pour se connecter 
        }
        else if($routeTab["route"] === "logout") // condition(s) pour envoyer vers la page de déconnexion 
        {  
            $this->authController->logout(); // appeler la méthode du controlleur pour se déconnecter 
        }
        else if($routeTab["route"] === "user" && $routeTab["user-id"] !== null) // condition(s) pour envoyer vers la page de l'utilisateur 
        {  
            $this->userController->getUser(intval($routeTab["user-id"])); // appeler la méthode du controlleur pour s'inscrire
        }
        
        //----------------------------------------------------- Admin -----------------------------------------------------\\
        else if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'){
            
            if($routeTab["route"] === 'admin' && $routeTab["sub-route"] === null){
            
            $this->adminController->indexAdmin(); // appeler la méthode du controlleur pour afficher la page d'accueil de l'admininistrateur
            
            }
        
            else if($routeTab["route"] === 'admin' && $routeTab["sub-route"] !== null &&  $routeTab["methode"] === null){
                
                if($routeTab["sub-route"] === "users"){
                    
                    $this->userController->getAllUsers(); // appeler la méthode du controlleur pour afficher tous les projets
                    
                }else if($routeTab["sub-route"] === "projects"){
                    
                    $this->projectsController->getAllProjectsAdmin(); // appeler la méthode du controlleur pour afficher tous les projets
                    
                }else if($routeTab["sub-route"] === "categories"){
                    
                    $this->categoriesController->getAllCategories(); // appeler la méthode du controlleur pour toutes les categories
                    
                }else if($routeTab["sub-route"] === "articles"){
                    
                    $this->articleController->getAllArticles(); // appeler la méthode du controlleur pour afficher tous les articles
                    
                }else if($routeTab["sub-route"] === "comments"){
                    
                    $this->commentsController->getAllComments(); // appeler la méthode du controlleur pour afficher tous les commentaires
                    
                }else if($routeTab["sub-route"] === "devislogo"){
                    
                    $this->devisController->getAllDevisLogo(); // appeler la méthode du controlleur pour afficher tous les devis type logo
                    
                }else if($routeTab["sub-route"] === "deviswallpaper"){
                    
                    $this->devisController->getAllDevisWallpaper(); // appeler la méthode du controlleur pour afficher tous les devis type wallpaper
                    
                }else if($routeTab["sub-route"] === "devisscene"){
                    
                    $this->devisController->getAllDevisScene(); // appeler la méthode du controlleur pour afficher tous les devis type scene
                    
                }
                
            }
            
            else if($routeTab["route"] === 'admin' && $routeTab["sub-route"] !== null && $routeTab["methode"] === "create"){
                
                if($routeTab["sub-route"] === 'projects'){
                    
                    $this->projectsController->create($post); // appeler la méthode du controlleur pour créer un post
                    
                }else if ($routeTab["sub-route"] === 'categories'){
                    
                    $this->categoriesController->create(); // appeler la méthode du controlleur pour créer une catégorie
                    
                    
                }else if ($routeTab["sub-route"] === 'articles'){
                    
                    $this->articlesController->create(); // appeler la méthode du controlleur pour créer un article
                    
                }
                
                
                
            }
            
            else if($routeTab["route"] === 'admin' && $routeTab["sub-route"] === 'user' && $routeTab["user-id"] !== null && $routeTab["methode"] === "edit"){
                
                $this->userController->updateUser($routeTab["user-id"]); // appeler la méthode du controlleur pour modifier un utilisateur
                
            }
            
            else if($routeTab["route"] === 'admin' && $routeTab["sub-route"] === 'projects' && $routeTab["project-id"] !== null && $routeTab["methode"] === "edit"){
                
                $this->projectController->updateProject($routeTab["projects-id"]); // appeler la méthode du controlleur pour édit un projet
                
            }
            
            else if($routeTab["route"] === 'admin' && $routeTab["sub-route"] === 'categories' && $routeTab["category-id"] !== null && $routeTab["methode"] === "edit"){
                
                $this->categoriesController->updateCategories($routeTab["category-id"]); // appeler la méthode du controlleur pour éditer une categorie
                
            }
            
            else if($routeTab["route"] === 'admin' && $routeTab["sub-route"] === 'articles' && $routeTab["article-id"] !== null && $routeTab["methode"] === "edit"){
                
                $this->articlesController->updateArticles($routeTab["article-id"]); // appeler la méthode du controlleur pour modifier un article
                
            }
            
            else if($routeTab["route"] === 'admin' && $routeTab["sub-route"] === 'comments' && $routeTab["comments-id"] !== null && $routeTab["methode"] === "edit"){
                
                $this->commentsController->updateComments($routeTab["comments-id"]); // appeler la méthode du controlleur pour modifier un utilisateur
                
            }
            
            else if($routeTab["route"] === 'admin' && $routeTab["sub-route"] === 'devislogo' && $routeTab["devislogo-id"] !== null && $routeTab["methode"] === "edit"){
                
                $this->devisController->devisLogoEdit(); // appeler la méthode du controlleur pour afficher tout les utilisateurs
                
            }
            
            else if($routeTab["route"] === 'admin' && $routeTab["sub-route"] === 'deviswallpaper' && $routeTab["deviswallpaper-id"] !== null && $routeTab["methode"] === "edit"){
                
                $this->devisController->devisWallpaperEdit(); // appeler la méthode du controlleur pour afficher tout les utilisateurs
                
            }
            
            else if($routeTab["route"] === 'admin' && $routeTab["sub-route"] === 'devisscene' && $routeTab["devisscene-id"] !== null && $routeTab["methode"] === "edit"){
                
                $this->devisController->devisSceneEdit(); // appeler la méthode du controlleur pour afficher tout les utilisateurs
                
            }
            
            else if($routeTab["route"] === 'admin' && $routeTab["sub-route"] === 'user' && $routeTab["user-id"] !== null && $routeTab["methode"] === "delete"){
                
                $this->userController->deleteUser(intval($routeTab["user-id"])); // appeler la méthode du controlleur pour supprimer un utilisateur
                
            }
            
            else if($routeTab["route"] === 'admin' && $routeTab["sub-route"] === 'projects' && $routeTab["project-id"] !== null && $routeTab["methode"] === "delete"){
                
                $this->projectsController->deleteProject(intval($routeTab["project-id"])); // appeler la méthode du controlleur pour supprimer un projet
                
            }
            
            else if($routeTab["route"] === 'admin' && $routeTab["sub-route"] === 'categories' && $routeTab["category-id"] !== null && $routeTab["methode"] === "delete"){
                
                $this->categoriesController->deleteCategories($routeTab["categories-id"]); // appeler la méthode du controlleur pour supprimer une catégorie
                
            }
            
            else if($routeTab["route"] === 'admin' && $routeTab["sub-route"] === 'articles' && $routeTab["article-id"] !== null && $routeTab["methode"] === "delete"){
                
                $this->articlesController->deleteArticle($routeTab["articles-id"]); // appeler la méthode du controlleur pour supprimer une article
                
            }
            
            else if($routeTab["route"] === 'admin' && $routeTab["sub-route"] === 'comments' && $routeTab["comments-id"] !== null && $routeTab["methode"] === "delete"){
                
                $this->commentsController->deleteComments($routeTab["comments-id"]); // appeler la méthode du controlleur pour supprimer un commentaire
                
            }
            
            else if($routeTab["route"] === 'admin' && $routeTab["sub-route"] === 'devislogo' && $routeTab["devislogo-id"] !== null && $routeTab["methode"] === "delete"){
                
                $this->devisController->devisLogoDelete(intval($routeTab["devislogo-id"])); // appeler la méthode du controlleur pour afficher tout les utilisateurs
                
            }
            
            else if($routeTab["route"] === 'admin' && $routeTab["sub-route"] === 'deviswallpaper' && $routeTab["deviswallpaper-id"] !== null && $routeTab["methode"] === "delete"){
                
                $this->devisController->devisWallpaperDelete(intval($routeTab["deviswallpaper-id"])); // appeler la méthode du controlleur pour afficher tout les utilisateurs
                
            }
            
            else if($routeTab["route"] === 'admin' && $routeTab["sub-route"] === 'devisscene' && $routeTab["devisscene-id"] !== null && $routeTab["methode"] === "delete"){
                
                $this->devisController->devisSceneDelete(intval($routeTab["devisscene-id"])); // appeler la méthode du controlleur pour afficher tout les utilisateurs
                
            }
            
        }
        else{
            
            $this->homeController->page404();
        }
        
        
    }
    
}