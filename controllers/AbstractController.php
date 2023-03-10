<?php  
   
abstract class AbstractController  
{  
    protected function renderPartial(string $template, array $values)  
    {  
        $data = $values;  
          
        require "templates/layout.phtml";  
    }  
      
    protected function render(array $values)  
    {  
        echo json_encode($values);  
    }  
}