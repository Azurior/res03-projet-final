<?php

class DevisManager extends AbstractManager {

    // Models DevisScene
    public function getAllDevisLogo() : array
    {
        // get all the users from the database
        $query = $this->db->prepare('SELECT * FROM devis_logo');
        $query->execute();
        $items = $query->fetchAll(PDO::FETCH_ASSOC);
        
        $devis = [];
        
        foreach($items as $item)
        {
            $newDevis = new Devis($item["theme"], $item["primary_color"], $item["second_color"], $item['option1_color'], $item['option2_color'], $item['option3_color'], $item["text"], $item["size_project"], $item["id_user"]);
            $newDevis->setId($item['id']);
            $devis[] = $newDevis;
        }
        
        return $devis;
    }
    
    public function getAllDevisWallpaper() : array
    {
        // get all the users from the database
        $query = $this->db->prepare('SELECT * FROM devis_wallpaper');
        $query->execute();
        $items = $query->fetchAll(PDO::FETCH_ASSOC);
        
        $devis = [];
        
        foreach($items as $item)
        {
            $newDevis = new Devis($item["theme"], $item["primary_color"], $item["second_color"], $item['option1_color'], $item['option2_color'], $item['option3_color'], $item["text"], $item["size_project"], $item["id_user"]);
            $newDevis->setId($item['id']);
            $devis[] = $newDevis;
        }
        
        return $devis;
    }
    
    public function getAllDevisScene() : array
    {
        // get all the users from the database
        $query = $this->db->prepare('SELECT * FROM devis_scene');
        $query->execute();
        $items = $query->fetchAll(PDO::FETCH_ASSOC);
        
        $devis = [];
        
        foreach($items as $item)
        {
            $newDevis = new DevisScene($item['number_scene'], $item["description"], $item["theme"], $item["primary_color"], $item["second_color"], $item['option1_color'], $item['option2_color'], $item['option3_color'], $item["text"], $item["size_project"], $item["id_user"]);
            $newDevis->setId($item['id']);
            $devis[] = $newDevis;
        }
        
        return $devis;
    }

    public function getDevisLogoById(int $id) : Devis
    {
        // get the user with $id from the database
        $query = $this->db->prepare('SELECT * FROM devis_logo WHERE :id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);
        $item = $query->fetch(PDO::FETCH_ASSOC);
        
        $newDevis = new Devis($item["theme"], $item["primary_color"], $item["second_color"], $item['option1_color'], $item['option2_color'], $item['option3_color'], $item["text"], $item["size_project"], $item["id_user"]);
        $newDevis->setId($item['id']);
        
        
        return $newDevis;
    }
    
    public function getDevisWallpaperById(int $id) : Devis
    {
        // get the user with $id from the database
        $query = $this->db->prepare('SELECT * FROM devis_wallpaper WHERE :id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);
        $item = $query->fetch(PDO::FETCH_ASSOC);
        
        $newDevis = new Devis($item["theme"], $item["primary_color"], $item["second_color"], $item['option1_color'], $item['option2_color'], $item['option3_color'], $item["text"], $item["size_project"], $item["id_user"]);
        $newDevis->setId($item['id']);
        
        
        return $newDevis;
    }
    
    public function getDevisSceneById(int $id) : Devis
    {
        // get the user with $id from the database
        $query = $this->db->prepare('SELECT * FROM article WHERE :id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);
        $item = $query->fetch(PDO::FETCH_ASSOC);
        
        $newDevis = new DevisScene($item['number_scene'], $item["description"], $item["theme"], $item["primary_color"], $item["second_color"], $item['option1_color'], $item['option2_color'], $item['option3_color'], $item["text"], $item["size_project"], $item["id_user"]);
        $newDevis->setId($item['id']);
        
        
        return $newDevis;
    }
    

    public function createDevisLogo(Devis $devis) : Devis
    {
        // create the user from the database
        // get the user with $id from the database
        $query = $this->db->prepare('INSERT INTO devis_logo VALUES(:id, :theme, :primary_color, :second_color, :option1_color, :option2_color, :option3_color, :text, :size_project, :id_user)');
        $parameters = [
            'id' => null,
            'theme' => $devis->getTheme(),
            'primary_color' => $devis->getPrimaryColor(),
            'second_color' => $devis->getSecondColor(),
            'option1_color' => $devis->getOption1Color(),
            'option2_color' => $devis->getOption2Color(),
            'option3_color' => $devis->getOption3Color(),
            'text' => $devis->getText(),
            'size_project' => $devis->getSizeProject(),
            'id_user' => $devis->getIdUser()
        ];
        $query->execute($parameters);
        
        //$user->setId($id);
        
        $newDevis = $query->fetch(PDO::FETCH_ASSOC);
        
        $id = $this->db->lastInsertId();
        
        return $this->getDevisLogoById($id);

        // return it with its id
    }
    
    public function createDevisWallpaper(Devis $devis) : Devis
    {
        // create the user from the database
        // get the user with $id from the database
        $query = $this->db->prepare('INSERT INTO devis_wallpaper VALUES(:id, :theme, :primary_color, :second_color, :option1_color, :option2_color, :option3_color, :text, :size_project, :id_user)');
        $parameters = [
            'id' => null,
            'theme' => $devis->getTheme(),
            'primary_color' => $devis->getPrimaryColor(),
            'second_color' => $devis->getSecondColor(),
            'option1_color' => $devis->getOption1Color(),
            'option2_color' => $devis->getOption2Color(),
            'option3_color' => $devis->getOption3Color(),
            'text' => $devis->getText(),
            'size_project' => $devis->getSizeProject(),
            'id_user' => $devis->getIdUser()
        ];
        $query->execute($parameters);
        
        //$user->setId($id);
        
        $newDevis = $query->fetch(PDO::FETCH_ASSOC);
        
        $id = $this->db->lastInsertId();
        
        return $this->getDevisWallpaperById($id);

        // return it with its id
    }
    
    public function createDevisScene(DevisScene $devis) : DevisScene
    {
        // create the user from the database
        // get the user with $id from the database
        $query = $this->db->prepare('INSERT INTO devis_devis VALUES(:id, :number_scene, :description, :theme, :primary_color, :second_color, :option1_color, :option2_color, :option3_color, :text, :size_project, :id_user)');
        $parameters = [
            'id' => null,
            'number_scene' => $devis->getNumberScene(),
            'description' => $devis->getDescription(),
            'theme' => $devis->getTheme(),
            'primary_color' => $devis->getPrimaryColor(),
            'second_color' => $devis->getSecondColor(),
            'option1_color' => $devis->getOption1Color(),
            'option2_color' => $devis->getOption2Color(),
            'option3_color' => $devis->getOption3Color(),
            'text' => $devis->getText(),
            'size_project' => $devis->getSizeProject(),
            'id_user' => $devis->getIdUser()
        ];
        $query->execute($parameters);
        
        //$user->setId($id);
        
        $newDevis = $query->fetch(PDO::FETCH_ASSOC);
        
        $id = $this->db->lastInsertId();
        
        return $this->getDevisSceneById($id);

        // return it with its id
    }

    public function updateDevisLogo(Devis $devis) : Devis
    {
        // update the user in the database
        $query = $this->db->prepare('UPDATE devis_logo SET :theme, :primary_color, :second_color, :option1_color, :option2_color, :option3_color, :text, :size_project, :id_user WHERE :id');
        $parameters = [
            'id' => $devis->getId(),
            'theme' => $devis->getTheme(),
            'primary_color' => $devis->getPrimaryColor(),
            'second_color' => $devis->getSecondColor(),
            'option1_color' => $devis->getOption1Color(),
            'option2_color' => $devis->getOption2Color(),
            'option3_color' => $devis->getOption3Color(),
            'text' => $devis->getText(),
            'size_project' => $devis->getSizeProject(),
            'id_user' => $devis->getIdUser()
        ];
        $query->execute($parameters);
        
        $query = $this->db->prepare('SELECT * FROM devis_logo WHERE :id');
        $parameters = [
            'id' => $devis->getId()
        ];
        $query->execute($parameters);
        $item = $query->fetch(PDO::FETCH_ASSOC);
        
        $newDevis = new Devis($item["theme"], $item["primary_color"], $item["second_color"], $item["text"], $item["image"], $item["size_project"], $item["id_user"]);
        $newDevis->setId($item['id']);
        
        return $newDevis;
        // return it
    }
    
    public function updateDevisWallpaper(Devis $devis) : Devis
    {
        // update the user in the database
        $query = $this->db->prepare('UPDATE devis_wallpaper SET :theme, :primary_color, :second_color, :option1_color, :option2_color, :option3_color, :text, :size_project, :id_user WHERE :id');
        $parameters = [
            'id' => $devis->getId(),
            'theme' => $devis->getTheme(),
            'primary_color' => $devis->getPrimaryColor(),
            'second_color' => $devis->getSecondColor(),
            'option1_color' => $devis->getOption1Color(),
            'option2_color' => $devis->getOption2Color(),
            'option3_color' => $devis->getOption3Color(),
            'text' => $devis->getText(),
            'size_project' => $devis->getSizeProject(),
            'id_user' => $devis->getIdUser()
        ];
        $query->execute($parameters);
        
        $query = $this->db->prepare('SELECT * FROM devis_wallpaper WHERE :id');
        $parameters = [
            'id' => $devis->getId()
        ];
        $query->execute($parameters);
        $item = $query->fetch(PDO::FETCH_ASSOC);
        
        $newDevis = new Devis($item["theme"], $item["primary_color"], $item["second_color"], $item["text"], $item["image"], $item["size_project"], $item["id_user"]);
        $newDevis->setId($item['id']);
        
        return $newDevis;
        // return it
    }
    
    public function updateDevisScene(DevisScene $devis) : DevisScene
    {
        // update the user in the database
        $query = $this->db->prepare('UPDATE devis_scene SET :theme, :primary_color, :second_color, :option1_color, :option2_color, :option3_color, :text, :size_project, :id_user WHERE :id');
        $parameters = [
            'id' => null,
            'number_scene' => $devis->getNumberScene(),
            'description' => $devis->getDescription(),
            'theme' => $devis->getTheme(),
            'primary_color' => $devis->getPrimaryColor(),
            'second_color' => $devis->getSecondColor(),
            'option1_color' => $devis->getOption1Color(),
            'option2_color' => $devis->getOption2Color(),
            'option3_color' => $devis->getOption3Color(),
            'text' => $devis->getText(),
            'size_project' => $devis->getSizeProject(),
            'id_user' => $devis->getIdUser()
        ];
        $query->execute($parameters);
        
        $query = $this->db->prepare('SELECT * FROM devis_scene WHERE :id');
        $parameters = [
            'id' => $devis->getId()
        ];
        $query->execute($parameters);
        $item = $query->fetch(PDO::FETCH_ASSOC);
        
        $newDevis = new DevisScene($item['number_scene'], $item["description"], $item["theme"], $item["primary_color"], $item["second_color"], $item["text"], $item["image"], $item["size_project"], $item["id_user"]);
        $newDevis->setId($item['id']);
        $newDevis->setOption1($item['option1_color']);
        $newDevis->setOption2($item['option2_color']);
        $newDevis->setOption3($item['option3_color']);
        
        return $newDevis;
        // return it
    }

    public function deleteDevisLogo(int $id) : array
    {
        // delete the user from the database
        $query = $this->db->prepare('DELETE FROM devis_logo WHERE :id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);

        // return the full list of users
        return $this->getAllDevisLogo();
    }
    
    public function deleteDevisWallpaper(int $id) : array
    {
        // delete the user from the database
        $query = $this->db->prepare('DELETE FROM devis_wallpaper WHERE :id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);

        // return the full list of users
        return $this->getAllDevisWallpaper();
    }
    
    public function deleteDevisScene(int $id) : array
    {
        // delete the user from the database
        $query = $this->db->prepare('DELETE FROM devis_scene WHERE :id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);

        // return the full list of users
        return $this->getAllDevisScene();
    }
}