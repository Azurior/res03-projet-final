<?php

class ProjectsManager extends AbstractManager {

    public function getAllProjects() : array
    {
        // get all the users from the database
        $query = $this->db->prepare('SELECT * FROM projects');
        $query->execute();
        $items = $query->fetchAll(PDO::FETCH_ASSOC);
        
        $projects = [];
        
        foreach($items as $item)
        {
            $project = new Projects($item["text"]);
            $project->setId($item['id']);
            $projects[] = $project;
        }
        
        return $projects;
    }

    public function getProjectsById(int $id) : Projects
    {
        // get the user with $id from the database
        $query = $this->db->prepare('SELECT * FROM projects WHERE :id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);
        $project = $query->fetch(PDO::FETCH_ASSOC);
        
        $newProject = new Projects($project["text"]);
        $newProject->setId($project['id']);
        
        
        return $newProject;
    }
    

    public function createProjects(Projects $projects) : Projects
    {
        // create the user from the database
        // get the user with $id from the database
        $query = $this->db->prepare('INSERT INTO projects VALUES(:id, :text)');
        $parameters = [
            'id' => null,
            'text' => $projects->getText(),
        ];
        $query->execute($parameters);
        
        //$user->setId($id);
        
        $newProject = $query->fetch(PDO::FETCH_ASSOC);
        
        $id = $this->db->lastInsertId();
        
        return $this->getProjectsById($id);

        // return it with its id
    }

    public function updateProject(Projects $projects) : Projects
    {
        // update the user in the database
        $query = $this->db->prepare('UPDATE projects SET :text WHERE :id');
        $parameters = [
            'id' => $projects->getId(),
            'text' => $projects->getText()
        ];
        $query->execute($parameters);
        
        $query = $this->db->prepare('SELECT * FROM projects WHERE :id');
        $parameters = [
            'id' => $projects->getId()
        ];
        $query->execute($parameters);
        $item = $query->fetch(PDO::FETCH_ASSOC);
        
        $projects = new Projects($item["text"]);
        $projects->setId($item['id']);
        
        return $projects;
        // return it
    }

    public function deleteProject(int $id) : array
    {
        // delete the user from the database
        $query = $this->db->prepare('DELETE FROM projects WHERE id=:id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);

        // return the full list of users
        return $this->getAllProjects();
    }
}