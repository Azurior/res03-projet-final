<?php

class DevisController extends AbstractController{
    
    public function __construct()
    {
        
    }
    
    public function devis(){
        
        $tab = [];
        
        array_push($tab, 'test1');
        
        $this->renderPartial('devis', [$tab]);
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
}