<?php

class ProjectsController extends AbstractController{
    
    public function __construct()
    {
        
    }
    
    public function allProjects(){
        
        $tab = [];
        
        array_push($tab, 'test1');
        
        $this->renderPartial('projects', [$tab]);
        
    }
    
    public function projectId(){
        
        $tab = [];
        
        array_push($tab, 'test1');
        
        $this->renderPartial('projects', [$tab]);
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
}