<?php

class Devis{
    
    private ?int $id;
    private string $user;
    private string $email;
    private string $password;
    private string $role;
    
    public function __construct(string $user, string $email, string $password, string $role){
        
        $this->id = null;
        $this->user = $user;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }
    
    
    public function getId() : ?int
    {
        return $this->id;
    }

    public function setId(?int $id) : void
    {
        $this->id = $id;
    }
    
    public function getUser() : string
    {
        return $this->user;
    }

    public function setUser(string $user) : void
    {
        $this->user = $user;
    }
    
    public function getEmail() : string
    {
        return $this->email;
    }

    public function setEmail(string $email) : void
    {
        $this->email = $email;
    }
    
    public function getPassword() : string
    {
        return $this->password;
    }

    public function setPassword(string $password) : void
    {
        $this->password = $password;
    }
    
    public function getRole() : string
    {
        return $this->role;
    }

    public function setRole(string $role) : void
    {
        $this->role = $role;
    }
    
    public function toArray() : array
    {
        return [
            "id" => $this->id,
            "user" => $this->user,
            "email" => $this->email,
            "password" => $this->password,
            "role" => $this->role
        ];
    }
    
}

?>