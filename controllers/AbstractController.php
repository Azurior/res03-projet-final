<?php  
   
abstract class AbstractController  
{  
    protected function renderPartial(string $template, array $values)  
    {  
        $data = $values;
        $page = $template;
          
        require "templates/layout.phtml";  
    }
    
    protected function renderAdminPartial(string $template, array $values)  
    {  
        $data = $values;
        $page = $template;
          
        require "templates/admin/admin_layout.phtml";  
    } 
      
    protected function render(array $values)  
    {  
        echo json_encode($values);  
    }  
}