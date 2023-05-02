<?php

class Categories{
    
    private ?int $id;
    private string $title;
    private int $idMedia;
    private ?int $idArticles;

    
    public function __construct(string $title, int $idMedia){
        
        $this->id = null;
        $this->title = $title;
        $this->idMedia = $idMedia;
        $this->idArticles = null;

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
    
    public function getIdMedia() : int
    {
        return $this->idMedia;
    }

    public function setIdMedia(?int $id) : void
    {
        $this->idMedia = $idMedia;
    }
    
    public function getIdArticles() : ?int
    {
        return $this->idArticles;
    }

    public function setIdArticles(?int $id) : void
    {
        $this->idArticles = $idArticles;
    }
    
    
}

?>