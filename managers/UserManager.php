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
        $query = $this->db->prepare('SELECT * FROM users WHERE id = :id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);
        $user = $query->fetch(PDO::FETCH_ASSOC);
        
        $newUser = new User($user["user"], $user["email"], $user['password'], $user['role']);
        $newUser->setId($user['id']);
        
        
        return $newUser;
    }
    
    public function getUserByEmail(string $email) : User
    {
        // get the user with $email from the database
        $query = $this->db->prepare('SELECT * FROM users WHERE email = :email');
        $parameters = [
            'email' => $email
        ];
        $query->execute($parameters);
        $user = $query->fetch(PDO::FETCH_ASSOC);
        
        $newUser = new User($user["user"], $user["email"], $user['password'], $user['role']);
        $newUser->setId($user['id']);
        
        return $newUser;
    }

    public function createUser(User $user) : User
    {
        // create the user from the database
        // get the user with $id from the database
        $query = $this->db->prepare('INSERT INTO users VALUES(:id, :user, :email, :password, :role)');
        $parameters = [
            'id' => null,
            'user' => $user->getUser(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'role' => $user->getRole()
        ];
        $query->execute($parameters);
        
        //$user->setId($id);
        
        $newUser = $query->fetch(PDO::FETCH_ASSOC);
        
        $id = $this->db->lastInsertId();
        
        return $this->getUserById($id);

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