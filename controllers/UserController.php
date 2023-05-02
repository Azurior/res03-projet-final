<?php

class UserController extends AbstractController {
    private UserManager $um;

    public function __construct()
    {
        $this->um = new UserManager();
    }

    public function getAllUsers()
    {
        // get all the users from the manager
        $allUsers = $this->um->getAllUsers();
        
        // render
        //$this->renderAdminPartial('users', []);
        $this->renderAdmin('user', 'all', $allUsers);
    }

    public function getUser(string $get)
    {
         // get the user from the manager
        // either by email or by id
        
        $id = intval($get);
        $userId = $this->um->getUserById($id);

        $user = $userId->toArray();
        
        // render
        
        $this->renderAdmin('user', 'id', $user);

        
    }

    public function createUser(array $post)
    {
        // create the user in the manager
        $password_hash = password_hash($past['password'], PASSWORD_DEFAULT);
        
        $user = new User(null, $post["user"], $post["email"], $password_hash, "user");
        $user = $this->um->createUser($user);

    }

    public function updateUser(int $id)
    {
        $userId = getUser($id);
        
        
        if(isset($_POST['formUpdateUser']) === true){
            
            $user = $_POST['user'];
            $role = $_POST['role'];
            
            // update the user in the manager
            $user = new User($user, $role);
            $user->getId($id);
            $user->getEmail($id);
            $user->getPassword($id);
            $user = $this->um->updateUser($user);
    
            // render the updated user
            header('Location: /res03-projet-final/admin/users');
            
        }
        else
        {
            header('Location: /res03-projet-final/admin/users/<?= $user->getId(); ?>/edit');
        }
        
    }

    public function deleteUser(int $id)
    {
        echo 'fonction deleteUser du controller';
        // delete the user in the manager
        $this->um->deleteUser($id);

        // render the list of all users
        header('Location: /res03-projet-final/admin/users');
    }
}