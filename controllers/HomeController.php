<?php

class HomeController extends AbstractController{
    
    public function __construct()
    {
        
    }
    
    public function home(){
        
        
        
        $this->renderPublic('home', 'page', []);
        
    }
    
    public function page404(){
        
        $this->renderPubic('404', 'page', []);
    }
    
    public function construction(){
        
        $this->renderPublic('construct', 'page', []);
    }
    
    
    
}