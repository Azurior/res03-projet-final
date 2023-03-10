<?php

class HomeController extends AbstractController{
    
    
    public function home(){
        
        $tab = [];
        
        array_push($tab, 'test1');
        
        $this->renderPartial('home', [$tab]);
        
    }
    
    
    
    
    
    
    
    
    
    
}