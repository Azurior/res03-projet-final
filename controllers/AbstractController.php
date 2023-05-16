<?php  
   
abstract class AbstractController  
{  
    protected function renderPublic(string $template, string $page, array $values)  
    {  
        $data = $values;
        
          
        require "templates/layout.phtml";  
    }
    
    
    protected function renderAdmin(string $template, string $page, array $values)  
    {  
        $data = $values;
       
          
        require "templates/admin/admin_layout.phtml";  
    }
      
    protected function render(array $values)  
    {  
        echo json_encode($values);  
    }
    
    protected function clean(string $string)
    {
        $clear = htmlspecialchars($string);
        
        return $clear;
    }
}