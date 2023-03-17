<?php

class CategoriesController extends AbstractController{
    
    
    public function category(){
        
        $tab = [];
        
        array_push($tab, 'test1');
        
        $this->renderPartial('categories', [$tab]);
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
}