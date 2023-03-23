<?php

class ArticlesManager extends AbstractManager {

    public function getAllArticle() : array
    {
        // get all the users from the database
        $query = $this->db->prepare('SELECT * FROM article');
        $query->execute();
        $items = $query->fetchAll(PDO::FETCH_ASSOC);
        
        $articles = [];
        
        foreach($items as $item)
        {
            $article = new Categories($item["title"], $item["description"], $item["idCategories"]);
            $article->setId($item['id']);
            $articles[] = $article;
        }
        
        return $articles;
    }

    public function getArticleById(int $id) : Article
    {
        // get the user with $id from the database
        $query = $this->db->prepare('SELECT * FROM article WHERE :id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);
        $item = $query->fetch(PDO::FETCH_ASSOC);
        
        $newArticle = new Article($item["title"], $item["description"], $item["idCategories"]);
        $newArticle->setId($item['id']);
        
        
        return $newArticle;
    }
    

    public function createArticle(Article $article) : Article
    {
        // create the user from the database
        // get the user with $id from the database
        $query = $this->db->prepare('INSERT INTO article VALUES(:id, :title, :description, :idCategories)');
        $parameters = [
            'id' => null,
            'title' => $article->getTitle(),
            'description' => $article->getDescription(),
            'idCategories' => $article->getIdCategories()
        ];
        $query->execute($parameters);
        
        //$user->setId($id);
        
        $newArticle = $query->fetch(PDO::FETCH_ASSOC);
        
        $id = $this->db->lastInsertId();
        
        return $this->getArticleById($id);

        // return it with its id
    }

    public function updateArticle(Article $article) : Article
    {
        // update the user in the database
        $query = $this->db->prepare('UPDATE article SET :title, :description, :idCategories WHERE :id');
        $parameters = [
            'id' => $article->getId(),
            'title' => $article->getTitle(),
            'description' => $article->getDescription(),
            'idCategories' => $article->getIdCategories()
        ];
        $query->execute($parameters);
        
        $query = $this->db->prepare('SELECT * FROM article WHERE :id');
        $parameters = [
            'id' => $article->getId()
        ];
        $query->execute($parameters);
        $item = $query->fetch(PDO::FETCH_ASSOC);
        
        $newArticle = new Article($item["title"], $item["description"], $item["idCategories"]);
        $newArticle->setId($item['id']);
        
        return $newArticle;
        // return it
    }

    public function deleteCategories(int $id) : array
    {
        // delete the user from the database
        $query = $this->db->prepare('DELETE FROM article WHERE :id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);

        // return the full list of users
        return $this->getAllArticle();
    }
}