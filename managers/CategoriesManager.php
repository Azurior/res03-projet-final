<?php

class CategoriesManager extends AbstractManager {

    public function getAllCategories() : array
    {
        // get all the users from the database
        $query = $this->db->prepare('SELECT * FROM categories');
        $query->execute();
        $items = $query->fetchAll(PDO::FETCH_ASSOC);
        
        $categories = [];
        
        foreach($items as $item)
        {
            $categorie = new Categories($item["title"]);
            $categorie->setId($item['id']);
            $categories[] = $categorie;
        }
        
        return $categories;
    }

    public function getCategoriesById(int $id) : Categories
    {
        // get the user with $id from the database
        $query = $this->db->prepare('SELECT * FROM categories WHERE :id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);
        $categories = $query->fetch(PDO::FETCH_ASSOC);
        
        $newCategories = new Categories($categories["title"]);
        $newCategories->setId($categories['id']);
        
        
        return $newCategories;
    }
    

    public function createCategories(Categories $categories) : Categories
    {
        // create the user from the database
        // get the user with $id from the database
        $query = $this->db->prepare('INSERT INTO categories VALUES(:id, :title)');
        $parameters = [
            'id' => null,
            'title' => $categories->getTitle(),
        ];
        $query->execute($parameters);
        
        //$user->setId($id);
        
        $newCategories = $query->fetch(PDO::FETCH_ASSOC);
        
        $id = $this->db->lastInsertId();
        
        return $this->getCategoriesById($id);

        // return it with its id
    }

    public function updateCategories(Categories $categories) : Categories
    {
        // update the user in the database
        $query = $this->db->prepare('UPDATE categories SET :title WHERE :id');
        $parameters = [
            'id' => $categories->getId(),
            'title' => $categories->getTitle()
        ];
        $query->execute($parameters);
        
        $query = $this->db->prepare('SELECT * FROM categories WHERE :id');
        $parameters = [
            'id' => $categories->getId()
        ];
        $query->execute($parameters);
        $item = $query->fetch(PDO::FETCH_ASSOC);
        
        $newCategorie = new Categories($item["title"]);
        $newCategorie->setId($item['id']);
        
        return $newCategorie;
        // return it
    }

    public function deleteCategories(int $id) : array
    {
        // delete the user from the database
        $query = $this->db->prepare('DELETE FROM categories WHERE :id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);

        // return the full list of users
        return $this->getAllCategories();
    }
}