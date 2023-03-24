<?php

class CategoriesController extends AbstractController{
    
    private CategoriesManager $cm;
    
    public function __construct()
    {
        $this->cm = new CategoriesManager();
    }
    
    
    public function categoriesId(string $get){
        
        $id = intval($get);
        $categories = $this->pm->getCategoriesById($id);
        
        $this->renderPartial('categories', $categories);
        
    }
    
    public function getAllCategories()
    {
        // get all the users from the manager
        $allCategories = $this->pm->getAllCategories();
        
        // render
        //$this->renderAdminPartial('users', []);
        $this->renderAdminPartial('categories', $allCategories);
    }

    public function createCategory()
    {
        // create the user in the manager
        
        if(isset($_POST['formCreateCat']) === true){
            
            $title = $_POST['title'];
            $media = $_POST['media'];
            
            $cat = new Categories(null, $title, $media);
            $newCategories = $this->cm->createCategories($cat);
            
        }

        // render the created user
        header('Location: /res03-projet-final/admin-categories');
    }

    public function updateCategory()
    {
        
        if(isset($_POST['formUpdateCat']) === true){
            
            $title = $_POST['title'];
            $media = $_POST['media'];
            
            $car = new User(null, $title, $media);
            $car = $this->cm->updateUser($post);
            
        }

        // render the updated user
        header('Location: /res03-projet-final/admin-categories');
    }

    public function deleteCategory(string $get)
    {
        // delete the user in the manager
        $users = $this->cm->deletePost(intval($get));

       header('Location: /res03-projet-final/admin-categories');
    }
    
    
    
    
    
    
    
    
    
    
    
    
}