<?php

class Devis{
    
    protected ?int $id;
    protected string $theme;
    protected string $primary_color;
    protected string $second_color;
    protected string $option1_color;
    protected string $option2_color;
    protected string $option3_color;
    protected string $text;
    protected string $size_project;
    protected int $id_user;
    
    public function __construct(string $theme, string $primary_color, string $second_color, string $option1_color, string $option2_color, string $option3_color, string $text, string $size_project, int $id_user){
        
        $this->id = null;
        $this->theme = $theme;
        $this->primary_color = $primary_color;
        $this->second_color = $second_color;
        $this->option1_color = $option1_color;
        $this->option2_color = $option2_color;
        $this->option3_color = $option3_color;
        $this->text = $text;
        $this->size_project = $size_project;
        $this->id_user = $id_user;
    }
    
    
    public function getId() : ?int
    {
        return $this->id;
    }

    public function setId(?int $id) : void
    {
        $this->id = $id;
    }
    
    public function getTheme() : string
    {
        return $this->theme;
    }

    public function setTheme(string $theme) : void
    {
        $this->theme = $theme;
    }
    
    public function getPrimaryColor() : string
    {
        return $this->primary_color;
    }

    public function setPrimaryColor(string $primary_color) : void
    {
        $this->primary_color = $primary_color;
    }
    
    public function getSecondColor() : string
    {
        return $this->second_color;
    }

    public function setSecondColor(string $second_color) : void
    {
        $this->second_color = $second_color;
    }
    
    public function getOption1Color() : ?string
    {
        return $this->option1_color;
    }

    public function setOption1Color(string $option1_color) : void
    {
        $this->option1_color = $option1_color;
    }
    
    public function getOption2Color() : ?string
    {
        return $this->option2_color;
    }

    public function setOption2Color(string $option2_color) : void
    {
        $this->option2_color = $option2_color;
    }
    
    public function getOption3Color() : ?string
    {
        return $this->option3_color;
    }

    public function setOption3Color(string $option3_color) : void
    {
        $this->option3_color = $option3_color;
    }
    
    public function getText() : string
    {
        return $this->text;
    }

    public function setText(string $text) : void
    {
        $this->text = $text;
    }
    
    public function getSizeProject() : string
    {
        return $this->size_project;
    }

    public function setSizeProject(string $size_project) : void
    {
        $this->size_project = $size_project;
    }
    
    public function getIdUser() : int
    {
        return $this->id_user;
    }

    public function setIdUser(int $id_user) : void
    {
        $this->id_user = $id_user;
    }
    
}

?>