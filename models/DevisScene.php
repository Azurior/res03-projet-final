<?php

class DevisScene extends Devis{
    
    private ?int $id;
    private int $number_scene;
    private string $description;
    
    public function __construct(int $number_scene, string $description){
        
        $this->id = null;
        $this->number_scene = $number_scene;
        $this->description = $description;
    }
    
    
    public function getId() : ?int
    {
        return $this->id;
    }

    public function setId(?int $id) : void
    {
        $this->id = $id;
    }
    
    public function getNumberScene() : string
    {
        return $this->number_scene;
    }

    public function setNumberScene(string $number_scene) : void
    {
        $this->number_scene = $number_scene;
    }
    
    public function getDescription() : string
    {
        return $this->description;
    }

    public function setDescription(string $description) : void
    {
        $this->description = $description;
    }
    
}

?>