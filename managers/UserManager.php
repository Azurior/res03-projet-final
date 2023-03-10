<?php

class UserManager extends AbstractManager {

    public function getAllUsers() : array
    {
        // get all the users from the database
        $query = $this->db->prepare('SELECT * FROM users');
        $query->execute();
        $items = $query->fetchAll(PDO::FETCH_ASSOC);
        
        $users = [];
        
        foreach($items as $item)
        {
            $user = new User($item["id"], $item["user"], $item["email"], $item['password'], $item['role']);
            $users[] = $user;
        }
        
        return $users;
    }

    public function getUserById(int $id) : User
    {
        // get the user with $id from the database
        $query = $this->db->prepare('SELECT * FROM users WHERE users.id = :id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);
        $item = $query->fetch(PDO::FETCH_ASSOC);
        
        $user = new User($item["id"], $item["user"], $item["email"], $item['password'], $item['role']);
        
        return $user;
    }

    public function createUser(User $user) : User
    {
        // create the user from the database
        // get the user with $id from the database
        $query = $this->db->prepare('INSERT INTO users VALUES(null, :user, :email, :password, :role)');
        $parameters = [
            'user' => $user->getUser(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'role' => $user->getRole()
        ];
        $query->execute($parameters);
        
        $query = $this->db->prepare('SELECT * FROM users WHERE users.email = :email');
        $parameters = [
            'email' => $user->getEmail()
        ];
        $query->execute($parameters);
        $item = $query->fetch(PDO::FETCH_ASSOC);
        
        
        $user = new User($item["id"], $item["user"], $item["email"], $item['password'], $item['role']);
        
        return $user;

        // return it with its id
    }

    public function updateUser(User $user) : User
    {
        // update the user in the database
        $query = $this->db->prepare('UPDATE users SET user=:user, email=:email, password=:password, role=:role WHERE users.id=:id');
        $parameters = [
            'id' => $user->getId(),
            'user' => $user->getUser(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'role' => $user->getRole()
        ];
        $query->execute($parameters);
        
        $query = $this->db->prepare('SELECT * FROM users WHERE users.id = :id');
        $parameters = [
            'id' => $user->getId()
        ];
        $query->execute($parameters);
        $item = $query->fetch(PDO::FETCH_ASSOC);
        
        $user = new User($item["id"], $item["user"], $item["email"], $item['password'], $item['role']);
        
        return $user;
        // return it
    }

    public function deleteUser(int $id) : array
    {
        // delete the user from the database
        $query = $this->db->prepare('DELETE FROM users WHERE users.id = :id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);

        // return the full list of users
        return $this->getAllUsers();
    }
}