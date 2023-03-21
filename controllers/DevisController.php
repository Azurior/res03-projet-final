<?php

class DevisController extends AbstractController{
    
    public function __construct()
    {
        
    }
    
    public function home(){
        
        $tab = [];
        
        array_push($tab, 'test1');
        
        $this->renderPartial('devis', [$tab]);
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
}