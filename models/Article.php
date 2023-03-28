<?php

class User{
    
    private ?int $id;
    private string $title;
    private string $text;
    private string $description;
    private int $idCategories;
    private int $idComments;
    
    public function __construct(string $title, string $text, string $description, int $idCategories){
        
        $this->id = null;
        $this->title = $title;
        $this->text = $text;
        $this->description = $description;
        $this->idCategories = $idCategories;
        $this->idComments = null;
        
    }
    
    
    public function getId() : ?int
    {
        return $this->id;
    }

    public function setId(?int $id) : void
    {
        $this->id = $id;
    }
    
    public function getTitle() : string
    {
        return $this->title;
    }

    public function setTitle(string $title) : void
    {
        $this->title = $title;
    }
    
    public function getText() : string
    {
        return $this->text;
    }

    public function setText(string $text) : void
    {
        $this->text = $text;
    }
    
    public function getDescription() : string
    {
        return $this->description;
    }

    public function setDescription(string $description) : void
    {
        $this->description = $description;
    }
    
    public function getIdCategories() : int
    {
        return $this->idCategories;
    }

    public function setIdCategories(int $id) : void
    {
        $this->idCategories = $idCategories;
    }
    
    public function getIdComments() : ?int
    {
        return $this->idComments;
    }

    public function setIdComments(?int $id) : void
    {
        $this->idComments = $idComments;
    }
    
    
    
    
    
}

?>