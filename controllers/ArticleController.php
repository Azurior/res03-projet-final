<?php

class ArticleController extends AbstractController{
    
    private ArticleManager $am;
    private Uploader $uploader;
    private MediaManager $mediaManager;
    
    
    public function __construct()
    {
        $this->am = new ArticleManager();
    }
    
    public function articleId(int $id){
        
        
        $articles = $this->pm->getArticleById($id);
        
        $this->renderPartial('article', $articles);
        
    }
    
    public function getAllArticles()
    {
        // get all the users from the manager
        $allArticle = $this->pm->getAllArticles();
        
        // render
        //$this->renderAdminPartial('users', []);
        $this->renderAdminPartial('article', $allArticle);
    }

    public function createArticle()
    {
        // create the user in the manager
        
        if(isset($_POST['formCreateArticle']) === true){
            
            $title = $_POST['title'];
            $text = $_POST['text'];
            $description = $_POST['description'];
            $uploader = new Uploader();
            $media = $uploader->upload($_FILES, "image");
            
            $artiicle = new Article(null, $title, $text, $description, $media);
            $newArticle = $this->cm->createArticle($article);
            
        }

        // render the created user
        header('Location: /res03-projet-final/admin-categories');
    }

    public function updateArticle()
    {
        
        if(isset($_POST['formUpdateArticle']) === true){
            
            $title = $_POST['title'];
            $text = $_POST['text'];
            $description = $_POST['description'];
            $uploader = new Uploader();
            $media = $uploader->upload($_FILES, "image");
            
            $car = new User(null, $title, $text, $description, $media);
            $car = $this->cm->updateArticle($post);
            
        }

        // render the updated user
        header('Location: /res03-projet-final/admin-categories');
    }

    public function deleteArticle(string $get)
    {
        // delete the user in the manager
        $users = $this->cm->deleteArticle(intval($get));

       header('Location: /res03-projet-final/admin-categories');
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}