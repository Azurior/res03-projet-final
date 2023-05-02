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
    
    public function getAllProjectsAdmin()
    {
        // get all the users from the manager
        $allProjects = $this->pm->getAllProjects();
        
        // render
        
        $this->renderAdmin('projects', 'all', $allProjects);
    }
    
    public function getAllProjectsPublic()
    {
        // get all the users from the manager
        $allProjects = $this->pm->getAllProjects();
        
        // render
        
        $this->renderPublic('projects', 'all', $allProjects);
    }

    public function create(array $post)
    {
        // create the user in the manager
        
        
        $error = "";

        if(isset($post) && !empty($post)){

            foreach($post as $field){

                if(empty($field)){
    
                    $error = "Il faut remplir le champ titre";
                }
            }
            if($error !== ""){
                
                echo $error;

            }else{
        
                $projet = new Projects($post['text']);
                $newProjet = $this->pm->createProjects($projet);
                
                header('Location: /res03-projet-final/admin/projects');
            }
        }
        else
        {
            $this->renderAdmin('projects', 'create', []);
        }
        
    }

    public function update(string $get)
    {
        if(isset($_POST['formUpdatePost']) === true){
            
            $text = $_POST['text'];
            
            $posts = new Projects(null, $text);
            $newPosts = $this->pm->updateProjects($posts);
        }

        // render the updated user
        header('Location: /res03-projet-final/admin/projects');
    }

    public function deleteProject(int $id)
    {
        
        $this->pm->deleteProject($id);

       header('Location: /res03-projet-final/admin/projects');
    }
    
    
    
    
    
    
    
    
    
    
    
    
}