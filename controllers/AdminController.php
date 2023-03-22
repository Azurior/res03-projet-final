<?php

class AdminController extends AbstractController{
    
    
    private UserManager $um;
    
    
    public function __construct()
    {
        $this->um = new UserManager();
    }
    
    public function allUsers(){
        
        $tab = [];
        
        array_push($tab, 'test1');
        
        $this->renderAdminPartial('users', [$tab]);
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
}