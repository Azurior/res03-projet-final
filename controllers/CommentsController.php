<?php

class CommentsController extends AbstractController{
    
    public function __construct()
    {
        
    }
    
    public function comments(){
        
        $tab = [];
        
        array_push($tab, 'test1');
        
        $this->renderPartial('comments', [$tab]);
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
}