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
            $project = new Projects($item["text"]);
            $project->setId($item['id']);
            $projects[] = $project;
        }
        
        return $projects;
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
        
        $newCategories = new Categories($categories["text"]);
        $newCategories->setId($categories['id']);
        
        
        return $newProject;
    }
    

    public function createCategories(Categories $categories) : Categories
    {
        // create the user from the database
        // get the user with $id from the database
        $query = $this->db->prepare('INSERT INTO categories VALUES(:id, :title)');
        $parameters = [
            'id' => null,
            'title' => $projects->getText(),
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
        $query = $this->db->prepare('UPDATE categories SET :text WHERE :id');
        $parameters = [
            'id' => $categories->getId(),
            'text' => $categories->getText()
        ];
        $query->execute($parameters);
        
        $query = $this->db->prepare('SELECT * FROM categories WHERE :id');
        $parameters = [
            'id' => $categories->getId()
        ];
        $query->execute($parameters);
        $item = $query->fetch(PDO::FETCH_ASSOC);
        
        $categories = new Categories($item["text"]);
        $categories->setId($item['id']);
        
        return $categories;
        // return it
    }

    public function deleteUser(int $id) : array
    {
        // delete the user from the database
        $query = $this->db->prepare('DELETE FROM projects WHERE :id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);

        // return the full list of users
        return $this->getAllProjects();
    }
}