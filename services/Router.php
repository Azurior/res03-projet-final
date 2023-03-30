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
    
    public function __construct(){
        
        $this->userController = new UserController();
        $this->homeController = new HomeController();
        $this->articleController = new ArticleController();
        $this->categoriesController = new CategoriesController();
        $this->commentsController = new CommentsController();
        $this->devisController = new DevisController();
        $this->projectsController = new ProjectsController();
        $this->authController = new AuthController();
    }
    
    private function splitRouteAndParameters(string $route) : array  
    {  
        $routeAndParams = [];  
        $routeAndParams["route"] = null;  
        $routeAndParams["project-id"] = null;
        $routeAndParams["categories-id"] = null;
        $routeAndParams["article-id"] = null;
        $routeAndParams["comments-id"] = null;
        $routeAndParams["devis-id"] = null;
        $routeAndParams["user-id"] = null;
        $routeAndParams["sub-route"] = null; 
        $routeAndParams["sub-route-two"] = null;
        $routeAndParams["sub-route-three"] = null;
        $routeAndParams["methode"] = null; 
        
        
      
        if(strlen($route) > 0) // si la chaine de la route n'est pas vide (donc si ça n'est pas la home)  
        {  
            $tab = explode("/", $route);  
      
            if($tab[0] === "projects" && !isset($tab[1])) // page Projects  
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
                $routeAndParams["categories-id"] = $tab[3];
                
                 
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
            
            // Admin
            
            
            // User
            else if($tab[0] === "admin" && !isset($tab[1])) // page Admin Tout Utilisateurs  
            {  
                 
                $routeAndParams["route"] = "admin-users";  
                 
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
            else if($tab[0] === "admin" && $tab[1] === 'projects' && !isset($tab[2])) // page de tous les projets 
            {  
                 
                $routeAndParams["route"] = "admin";
                $routeAndParams["sub-route"] = $tab[1];
                
                
            }
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
            else if($tab[0] === "admin-projects" && $tab[1] === 'projects' && $tab[2] !== null && $tab[3] === "delete" && !isset($tab[4])) // page de suppression de projet
            {  
                 
                $routeAndParams["route"] = "admin";
                $routeAndParams["sub-route"] = $tab[1];
                $routeAndParams["project-id"] = $tab[2];
                $routeAndParams["methode"] = $tab[3];
                
            }
            
            // Categorie
            else if($tab[0] === "admin" && $tab[1] === 'categories' && !isset($tab[2])) // page de toutes les categories
            {  
                 
                $routeAndParams["route"] = "admin";
                $routeAndParams["sub-route"] = $tab[1];
                
            }
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
                $routeAndParams["categories-id"] = $tab[2];
                $routeAndParams["methode"] = $tab[3];
                
            }
            else if($tab[0] === "admin" && $tab[1] === 'categories' && $tab[2] !== null && $tab[3] === "delete" && !isset($tab[4])) // page de suppression d'une catégorie
            {  
                 
                $routeAndParams["route"] = "admin";
                $routeAndParams["sub-route"] = $tab[1];
                $routeAndParams["categories-id"] = $tab[2];
                $routeAndParams["methode"] = $tab[3];
                
            }
            
            // Article
            
            else if($tab[0] === "admin" && $tab[1] === 'articles' && !isset($tab[1])) // page de tous les articles
            {  
                 
                $routeAndParams["route"] = "admin";
                
                
            }
            else if($tab[0] === "admin" && $tab[1] === 'articles' && $tab[2] === "create" && !isset($tab[3])) // page de création d'un article
            {  
                $routeAndParams["route"] = "admin";
                $routeAndParams["sub-route"] = $tab[1];
                $routeAndParams["methode"] = $tab[2];
                
            }
            else if($tab[0] === "admin-articles" && $tab[1] === 'articles' && $tab[2] !== null && $tab[3] === "edit" && !isset($tab[4])) // page d'édit d'un article
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
            
            else if($tab[0] === "admin-comments" && !isset($tab[1])) // page de tous les commentaires
            {  
                 
                $routeAndParams["route"] = "admin-comments";
                
            }
            else if($tab[0] === "admin-comments" && $tab[1] !== null && $tab[2] !== null && $tab[3] === "accept" && !isset($tab[4])) // page d'acceptation d'un commentaire
            {  
                 
                $routeAndParams["route"] = "admin-comments";
                $routeAndParams["comments-id"] = $tab[1];
                $routeAndParams["sub-route"] = $tab[2];
                $routeAndParams["methode"] = $tab[3];
                
            }
            else if($tab[0] === "admin-comments" && $tab[1] !== null && $tab[2] !== null && $tab[3] === "delete" && !isset($tab[4])) // page de suppression d'un commentaire
            {  
                 
                $routeAndParams["route"] = "admin-comments";
                $routeAndParams["comments-id"] = $tab[1];
                $routeAndParams["sub-route"] = $tab[2];
                $routeAndParams["methode"] = $tab[3];
                
            }
            
            // Devis
            
            else if($tab[0] === "admin-devislogo" && !isset($tab[1])) // Liste de tous les devis
            {  
                 
                $routeAndParams["route"] = "admin-devislogo";
                
            }
            else if($tab[0] === "admin-deviswallpaper" && !isset($tab[1])) // Liste de tous les devis
            {  
                 
                $routeAndParams["route"] = "admin-deviswallpaper";
                
            }
            else if($tab[0] === "admin-devisscene" && !isset($tab[1])) // Liste de tous les devis
            {  
                 
                $routeAndParams["route"] = "admin-devisscene";
                
            }
            else if($tab[0] === "admin-devislogo" && $tab[1] !== null && $tab[2] !== null && $tab[3] === "edit" && !isset($tab[4])) // Liste de tous les devis
            {  
                 
                $routeAndParams["route"] = "admin-devislogo";
                $routeAndParams["devis-id"] = $tab[1];
                $routeAndParams["sub-route"] = $tab[2];
                $routeAndParams["methode"] = $tab[3];
                
            }
            else if($tab[0] === "admin-deviswallpaper" && $tab[1] !== null && $tab[2] !== null && $tab[3] === "edit" && !isset($tab[4])) // Liste de tous les devis
            {  
                 
                $routeAndParams["route"] = "admin-deviswallpaper";
                $routeAndParams["devis-id"] = $tab[1];
                $routeAndParams["sub-route"] = $tab[2];
                $routeAndParams["methode"] = $tab[3];
                
            }
            else if($tab[0] === "admin-devisscene" && $tab[1] !== null && $tab[2] !== null && $tab[3] === "edit" && !isset($tab[4])) // Liste de tous les devis
            {  
                 
                $routeAndParams["route"] = "admin-devisscene";
                $routeAndParams["devis-id"] = $tab[1];
                $routeAndParams["sub-route"] = $tab[2];
                $routeAndParams["methode"] = $tab[3];
                
            }
             else if($tab[0] === "admin-devislogo" && $tab[1] !== null && $tab[2] !== null && $tab[3] === "delete" && !isset($tab[4])) // Liste de tous les devis
            {  
                 
                $routeAndParams["route"] = "admin-devislogo";
                $routeAndParams["devis-id"] = $tab[1];
                $routeAndParams["sub-route"] = $tab[2];
                $routeAndParams["methode"] = $tab[3];
                
            }
             else if($tab[0] === "admin-deviswallpaper" && $tab[1] !== null && $tab[2] !== null && $tab[3] === "delete" && !isset($tab[4])) // Liste de tous les devis
            {  
                 
                $routeAndParams["route"] = "admin-deviswallpaper";
                $routeAndParams["devis-id"] = $tab[1];
                $routeAndParams["sub-route"] = $tab[2];
                $routeAndParams["methode"] = $tab[3];
                
            }
             else if($tab[0] === "admin-devisscene" && $tab[1] !== null && $tab[2] !== null && $tab[3] === "delete" && !isset($tab[4])) // Liste de tous les devis
            {  
                 
                $routeAndParams["route"] = "admin-devisscene";
                $routeAndParams["devis-id"] = $tab[1];
                $routeAndParams["sub-route"] = $tab[2];
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
      
        // Public 
    
        if($routeTab["route"] === "") // condition(s) pour envoyer vers la home  
        {  
            $this->homeController->home(); // appeler la méthode du controlleur pour afficher la home  
        }  
        else if($routeTab["route"] === "projects" && $routeTab["project-id"] === null) // condition(s) pour envoyer vers les projets
        {  
            $this->projectsController->getAllProjects(); // appeler la méthode du controlleur pour les projects en fonction de leurs ID
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
            $this->categoriesController->categoriesId(intval($routeTab["categories-id"]));// appeler la méthode du controlleur pour afficher une seule catégorie 
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
            $this->devisController->devis(); // appeler la méthode du controlleur pour récupérer le formulaire du devis
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
        else if($routeTab["route"] === "logout") // condition(s) pour envoyer vers la page de connexion/inscription 
        {  
            $this->authController->logout(); // appeler la méthode du controlleur pour se déconnecter 
        }
        else if($routeTab["route"] === "user" && $routeTab["user-id"] !== null) // condition(s) pour envoyer vers la page de connexion/inscription 
        {  
            $this->userController->getUser(intval($routeTab["user-id"])); // appeler la méthode du controlleur pour s'inscrire
        }
        
        // Admin
        
        // users
        else if($routeTab["route"] === "admin-users") // condition(s) pour envoyer vers la page administrateur de tous les utilisateurs
        {  
            $this->userController->getAllUsers(); // appeler la méthode du controlleur pour afficher tout les utilisateurs
        }
        else if($routeTab["route"] === "admin-user" && $routeTab["user-id"] !== null && $routeTab["sub-route"] !== null && $routeTab["methode"] === "edit") // condition(s) pour envoyer vers la page administrateur de tous les utilisateurs
        {  
            if($routeTab["sub-route"] === 'edit'){
                $this->userController->updateUser($routeTab["user-id"]); // appeler la méthode du controlleur pour modifier un utilisateur
                
            }
        }
        else if($routeTab["route"] === "admin-user" && $routeTab["user-id"] !== null && $routeTab["sub-route"] !== null && $routeTab["methode"] === "delete") // condition(s) pour envoyer vers la page administrateur de tous les utilisateurs
        {  
            if($routeTab["sub-route"] === 'delete'){
                $this->userController->deleteUser($routeTab["user-id"]); // appeler la méthode du controlleur pour supprimer un utilisateur
                
            }
        }
        
        //projets
        else if($routeTab["route"] === "admin-projects") // condition(s) pour envoyer vers la page administrateur de tous les utilisateurs
        {  
            $this->projectsController->getAllProjects(); // appeler la méthode du controlleur pour afficher tout les utilisateurs
        }
        else if($routeTab["route"] === "admin-projects" && $routeTab["sub-route"] !== null && $routeTab["methode"] === "create") // condition(s) pour envoyer vers la page administrateur de tous les utilisateurs
        {
            if($routeTab["sub-route"] === 'create'){
                $this->projectController->createProject($post); // appeler la méthode du controlleur pour créer un post
            }
            
        }
        else if($routeTab["route"] === "admin-projects" && $routeTab["projects-id"] !== null && $routeTab["sub-route"] !== null && $routeTab["methode"] === "edit") // condition(s) pour envoyer vers la page administrateur de tous les utilisateurs
        {  
            if($routeTab["sub-route"] === 'edit'){
                $this->projectController->updateProject($routeTab["projects-id"]); // appeler la méthode du controlleur pour édit un projet
            }
            
        }
        else if($routeTab["route"] === "admin-projects" && $routeTab["projects-id"] !== null && $routeTab["sub-route"] !== null && $routeTab["methode"] === "delete") // condition(s) pour envoyer vers la page administrateur de tous les utilisateurs
        {  
            if($routeTab["sub-route"] === 'delete'){
                $this->projectController->deleteProject($routeTab["projects-id"]); // appeler la méthode du controlleur pour supprimer un projet
            }
            
        }
        
        //categories
        else if($routeTab["route"] === "admin-categories") // condition(s) pour envoyer vers la page administrateur de tous les utilisateurs
        {  
            $this->categoriesController->getAllCategories(); // appeler la méthode du controlleur pour afficher tout les utilisateurs
        }
        else if($routeTab["route"] === "admin-categories" && $routeTab["categories-id"] !== null && $routeTab["sub-route"] !== null && $routeTab["methode"] === "create") // condition(s) pour envoyer vers la page administrateur de tous les utilisateurs
        {  
            if($routeTab["sub-route"] === 'create'){
                $this->categoriesController->createCategories($routeTab["categories-id"]); // appeler la méthode du controlleur pour créer une catégorie
            }
        }
        else if($routeTab["route"] === "admin-categories" && $routeTab["categories-id"] !== null && $routeTab["sub-route"] !== null && $routeTab["methode"] === "edit") // condition(s) pour envoyer vers la page administrateur de tous les utilisateurs
        {  
            if($routeTab["sub-route"] === 'edit'){
                $this->categoriesController->updateCategories($routeTab["categories-id"]); // appeler la méthode du controlleur pour éditer une categorie
            }
        }
        else if($routeTab["route"] === "admin-categories" && $routeTab["categories-id"] !== null && $routeTab["sub-route"] !== null && $routeTab["methode"] === "delete") // condition(s) pour envoyer vers la page administrateur de tous les utilisateurs
        {  
            if($routeTab["sub-route"] === 'delete'){
                $this->categoriesController->deleteCategories($routeTab["categories-id"]); // appeler la méthode du controlleur pour supprimer une catégorie
            }
        }
        
        //articles
        else if($routeTab["route"] === "admin-articles") // condition(s) pour envoyer vers la page administrateur de tous les utilisateurs
        {  
            $this->articleController->getAllArticles(); // appeler la méthode du controlleur pour afficher tout les utilisateurs
        }
        else if($routeTab["route"] === "admin-articles" && $routeTab["articles-id"] !== null && $routeTab["sub-route"] !== null && $routeTab["methode"] === "create") // condition(s) pour envoyer vers la page administrateur de tous les utilisateurs
        {  
            if($routeTab["sub-route"] === 'create'){
                $this->articlesController->createArticles($routeTab["articles-id"]); // appeler la méthode du controlleur pour créer un article
                
            }
        }
        else if($routeTab["route"] === "admin-articles" && $routeTab["articles-id"] !== null && $routeTab["sub-route"] !== null && $routeTab["methode"] === "edit") // condition(s) pour envoyer vers la page administrateur de tous les utilisateurs
        {  
            if($routeTab["sub-route"] === 'edit'){
                $this->articlesController->updateArticles($routeTab["articles-id"]); // appeler la méthode du controlleur pour modifier un article
                
            }
        }
        else if($routeTab["route"] === "admin-articles" && $routeTab["articles-id"] !== null && $routeTab["sub-route"] !== null && $routeTab["methode"] === "delete") // condition(s) pour envoyer vers la page administrateur de tous les utilisateurs
        {  
            if($routeTab["sub-route"] === 'delete'){
                $this->articlesController->deleteArticle($routeTab["articles-id"]); // appeler la méthode du controlleur pour supprimer une article
                
            }
        }
        
        //commentaires
        else if($routeTab["route"] === "admin-comments") // condition(s) pour envoyer vers la page administrateur de tous les utilisateurs
        {  
            $this->commentsController->getAllComments(); // appeler la méthode du controlleur pour afficher tout les utilisateurs
        }
        else if($routeTab["route"] === "admin-comments" && $routeTab["comments-id"] !== null && $routeTab["sub-route"] !== null && $routeTab["methode"] === "create") // condition(s) pour envoyer vers la page administrateur de tous les utilisateurs
        {  
            if($routeTab["sub-route"] === 'edit'){
                $this->commentsController->createComments($routeTab["comments-id"]); // appeler la méthode du controlleur pour modifier un utilisateur
                
            }
        }
        else if($routeTab["route"] === "admin-comments" && $routeTab["comments-id"] !== null && $routeTab["sub-route"] !== null && $routeTab["methode"] === "edit") // condition(s) pour envoyer vers la page administrateur de tous les utilisateurs
        {  
            if($routeTab["sub-route"] === 'delete'){
                $this->commentsController->updateComments($routeTab["comments-id"]); // appeler la méthode du controlleur pour supprimer un commentaire
                
            }
        }
        
        //devis
        else if($routeTab["route"] === "admin-devislogo") // condition(s) pour envoyer vers la page administrateur de tous les utilisateurs
        {  
            $this->devisController->getAllDevisLogo(); // appeler la méthode du controlleur pour afficher tout les utilisateurs
        }
        else if($routeTab["route"] === "admin-deviswallpaper") // condition(s) pour envoyer vers la page administrateur de tous les utilisateurs
        {  
            $this->devisController->getAllDevisWallpaper(); // appeler la méthode du controlleur pour afficher tout les utilisateurs
        }
        else if($routeTab["route"] === "admin-devisscene") // condition(s) pour envoyer vers la page administrateur de tous les utilisateurs
        {  
            $this->devisController->getAllDevisScene(); // appeler la méthode du controlleur pour afficher tout les utilisateurs
        }
        else if($routeTab["route"] === "admin-devislogo" && $routeTab["comments-id"] !== null && $routeTab["sub-route"] !== null && $routeTab["methode"] === "edit") // condition(s) pour envoyer vers la page administrateur de tous les utilisateurs
        {  
            if($routeTab["sub-route"] === 'edit'){
                $this->devisController->getAllDevisLogoEdit(); // appeler la méthode du controlleur pour afficher tout les utilisateurs
                
            }
        }
        else if($routeTab["route"] === "admin-deviswallpaper" && $routeTab["comments-id"] !== null && $routeTab["sub-route"] !== null && $routeTab["methode"] === "edit") // condition(s) pour envoyer vers la page administrateur de tous les utilisateurs
        {  
            if($routeTab["sub-route"] === 'edit'){
                $this->devisController->getAllDevisWallpaperEdit(); // appeler la méthode du controlleur pour afficher tout les utilisateurs
                
            }
        }
        else if($routeTab["route"] === "admin-devisscene" && $routeTab["comments-id"] !== null && $routeTab["sub-route"] !== null && $routeTab["methode"] === "edit") // condition(s) pour envoyer vers la page administrateur de tous les utilisateurs
        {  
            if($routeTab["sub-route"] === 'edit'){
                $this->devisController->getAllDevisSceneEdit(); // appeler la méthode du controlleur pour afficher tout les utilisateurs
                
            }
        }
        else if($routeTab["route"] === "admin-devislogo" && $routeTab["comments-id"] !== null && $routeTab["sub-route"] !== null && $routeTab["methode"] === "delete") // condition(s) pour envoyer vers la page administrateur de tous les utilisateurs
        {  
            if($routeTab["sub-route"] === 'delete'){
                $this->devisController->getAllDevisLogoDelete(); // appeler la méthode du controlleur pour afficher tout les utilisateurs
                
            }
        }
        else if($routeTab["route"] === "admin-deviswallpaper" && $routeTab["comments-id"] !== null && $routeTab["sub-route"] !== null && $routeTab["methode"] === "delete") // condition(s) pour envoyer vers la page administrateur de tous les utilisateurs
        {  
            if($routeTab["sub-route"] === 'delete'){
                $this->devisController->getAllDevisWallpaperDelete(); // appeler la méthode du controlleur pour afficher tout les utilisateurs
                
            }
        }
        else if($routeTab["route"] === "admin-devisscene" && $routeTab["comments-id"] !== null && $routeTab["sub-route"] !== null && $routeTab["methode"] === "delete") // condition(s) pour envoyer vers la page administrateur de tous les utilisateurs
        {  
            if($routeTab["sub-route"] === 'delete'){
                $this->devisController->getAllDevisSceneDelete(); // appeler la méthode du controlleur pour afficher tout les utilisateurs
                
            }
        }
        
    }
    
}