<?php

class CategoriesController extends AbstractController{
    
    private CategoriesManager $cm;
    private Uploader $uploader;
    private MediaManager $mediaManager;
    
    public function __construct()
    {
        $this->cm = new CategoriesManager();
        $this->mediaManager = new MediaManager();
        $this->uploader = new Uploader();
    }
    
    
    public function categoriesId(int $id){
        
       
        $categories = $this->cm->getCategoriesById($id);
        
        $this->renderPartial('categories', $categories);
        
    }
    
     public function categoriesAdminId(int $id){
        
        
        $categories = $this->cm->getCategoriesById($id);
        
        $this->renderAdmin('categories', 'id', $categories);
        
    }
    
    public function getAllCategories()
    {
        // get all the users from the manager
        $allCategories = $this->cm->getAllCategories();
        
        // render
        //$this->renderAdminPartial('users', []);
        $this->renderAdmin('categories', 'all', $allCategories);
    }
    
    public function getAllCategoriesByProject(int $id)
    {
        // get all the users from the manager
        $allCategories = $this->cm->getAllCategoriesByProject($id);
        
        // render
        //$this->renderAdminPartial('users', []);
        $this->renderPartial('categories', $allCategories);
    }

    public function create(array $post)
    {
        // create the user in the manager
        
        $error = "";
        var_dump($post);

        if(isset($post) && !empty($post)){

            foreach($post as $field){

                if(empty($field)){
    
                    $error = "Il faut remplir tous les champs !";
                }
            }
            if($error !== ""){
                
                echo $error;

            }else{
                
                $title = $_POST['title'];
                $media = $this->mediaManager->insertMedia($this->uploader->upload($_FILES, "category-image"));
                $idMedia = $this-mediaManager->getLastIdMedia($media);
                
                $category = new Categories($title, $media, $idMedia);
                $newCategories = $this->cm->createCategories($category);
                
                header('Location: /res03-projet-final/admin/categories');
            }
        }
        else
        {
            echo "ce n'est pas créé";
            $this->renderAdmin('categories', 'create', []);
        }

    }

    public function update(int $id)
    {
        
        if(isset($_POST['formUpdateCat']) === true){
            
            $title = $_POST['title'];
            $uploader = new Uploader();
            $media = $uploader->upload($_FILES, "image");
            
            $car = new User(null, $title, $media);
            $car = $this->cm->updateCatageories($post);
            
        }

        // render the updated user
        header('Location: /res03-projet-final/admin-categories');
    }

    public function deleteCategory(int $id)
    {
        // delete the user in the manager
        $users = $this->cm->deleteCategories(intval($id));

       header('Location: /res03-projet-final/admin-categories');
    }
    
    
    
    
    
    
    
    
    
    
    
    
}