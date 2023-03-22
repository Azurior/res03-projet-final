<?php

class Projects{
    
    private ?int $id;
    private string $text;
    
    
    public function __construct(string $text){
        
        $this->id = null;
        $this->text = $text;
        
    }
    
    
    public function getId() : ?int
    {
        return $this->id;
    }

    public function setId(?int $id) : void
    {
        $this->id = $id;
    }
    
    public function getText() : string
    {
        return $this->text;
    }

    public function setText(string $text) : void
    {
        $this->text = $text;
    }
    
}

?>