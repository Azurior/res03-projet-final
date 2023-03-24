<?php

class ProjectsController extends AbstractController{
    
    private ProjectsManager $pm;
    
    public function __construct()
    {
        $this->pm = new ProjectsManager();
    }
    
    
    public function projectId(string $get){
        
        $id = intval($get);
        $projects = $this->pm->getProjectById($id);
        
        $this->renderPartial('projects', $projects);
        
    }
    
    public function getAllProjects()
    {
        // get all the users from the manager
        $allProjects = $this->pm->getAllProjects();
        
        // render
        //$this->renderAdminPartial('users', []);
        $this->renderAdminPartial('projects', $allProjects);
    }

    public function createPost(array $post)
    {
        // create the user in the manager
        
        if(isset($_POST['formCreatePost']) === true){
            
            $text = $_POST['text'];
            
            $posts = new Projects(null, $text);
            $newPosts = $this->pm->createProjects($posts);
        }
        
        

        // render the created user
        header('Location: /res03-projet-final/admin-projects');
    }

    public function updatePost(string $get)
    {
        if(isset($_POST['formUpdatePost']) === true){
            
            $text = $_POST['text'];
            
            $posts = new Projects(null, $text);
            $newPosts = $this->pm->updateProjects($posts);
        }

        // render the updated user
        header('Location: /res03-projet-final/admin-projects');
    }

    public function deletePost(string $get)
    {
        // delete the user in the manager
        $users = $this->pm->deletePost(intval($get));

       header('Location: /res03-projet-final/admin-projects');
    }
    
    
    
    
    
    
    
    
    
    
    
    
}