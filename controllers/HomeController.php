<?php

class HomeController extends AbstractController{
    
    public function __construct()
    {
        
    }
    
    public function home(){
        
        
        
        $this->renderPublic('home', []);
        
    }
    
    
    
}