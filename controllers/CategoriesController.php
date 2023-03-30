<?php

class CategoriesController extends AbstractController{
    
    private CategoriesManager $cm;
    private Uploader $uploader;
    private MediaManager $mediaManager;
    
    public function __construct()
    {
        $this->cm = new CategoriesManager();
    }
    
    
    public function categoriesId(int $id){
        
       
        $categories = $this->pm->getCategoriesById($id);
        
        $this->renderPartial('categories', $categories);
        
    }
    
     public function categoriesAdminId(int $id){
        
        
        $categories = $this->pm->getCategoriesById($id);
        
        $this->renderAdmin('categories', 'id', $categories);
        
    }
    
    public function getAllCategories()
    {
        // get all the users from the manager
        $allCategories = $this->cm->getAllCategories();
        
        // render
        //$this->renderAdminPartial('users', []);
        $this->renderAdminPartial('categories', 'all', $allCategories);
    }
    
    public function getAllCategoriesByProject(int $id)
    {
        // get all the users from the manager
        $allCategories = $this->cm->getAllCategoriesByProject($id);
        
        // render
        //$this->renderAdminPartial('users', []);
        $this->renderPartial('categories', $allCategories);
    }

    public function createCategory()
    {
        // create the user in the manager
        
        if(isset($_POST['formCreateCat']) === true){
            
            $title = $_POST['title'];
            $uploader = new Uploader();
            $media = $uploader->upload($_FILES, "image");
            
            $category = new Categories(null, $title, $media);
            $newCategories = $this->cm->createCategories($category);
            
            
            
        }

        // render the created user
        header('Location: /res03-projet-final/admin-categories');
    }

    public function updateCategory()
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