<?php

class ArticleController extends AbstractController{
    
    public function __construct()
    {
        
    }
    
    public function allArticle(){
        
        $tab = [];
        
        array_push($tab, 'test1');
        
        $this->renderPartial('article', [$tab]);
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
}