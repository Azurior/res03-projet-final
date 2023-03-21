<?php

class CategoriesController extends AbstractController{
    
    public function __construct()
    {
        
    }

    public function allCategory(){
        
        $tab = [];
        
        array_push($tab, 'test1');
        
        $this->renderPartial('categories', [$tab]);
        
    }
    
    public function categoryId(){
        
        $tab = [];
        
        array_push($tab, 'test1');
        
        $this->renderPartial('categories', [$tab]);
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
}