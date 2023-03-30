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
        
        $this->renderPublic('projects', 'id', $projects);
        
    }
    
    public function getAllProjects()
    {
        // get all the users from the manager
        $allProjects = $this->pm->getAllProjects();
        
        // render
        
        $this->renderAdmin('projects', 'all', $allProjects);
    }

    public function createProject(string $post)
    {
        
        echo 'Je suis dans la fonction';
        // create the user in the manager
        
        $error = "";

        if(isset($post) && !empty($post)){

            foreach($post as $field){

                if(empty($field)){
    
                    $error = "Il faut remplir le champ texte";
                }
            }
            if($error !== ""){
                
                echo $error;

            }else{
            
            $posts = new Projects(null, $post['text']);
            $newPosts = $this->pm->createProjects($posts);
            
            header('Location: /res03-projet-final/admin-projects');
            }
        }
        else
        {
            $this->renderAdminPartial('projects' , 'create', []);
        }
        
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