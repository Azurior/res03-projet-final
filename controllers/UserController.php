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
        $this->renderAdminPartial('users', $allUsers);
    }

    public function getUser(string $get)
    {
         // get the user from the manager
        // either by email or by id
        
        $id = intval($get);
        $userId = $this->um->getUserById($id);

        $user = $userId->toArray();
        
        // render
        
        $this->renderAdminPartial('user', $user);

        
    }

    public function createUser(array $post)
    {
        // create the user in the manager
        $password_hash = password_hash($past['password'], PASSWORD_DEFAULT);
        
        $user = new User(null, $post["user"], $post["email"], $password_hash, "user");
        $user = $this->um->createUser($user);

    }

    public function updateUser(string $get)
    {
        $post = $_POST;
        // update the user in the manager
        $user = new User($post["id"], $post["user"], $post["email"], $past['password'], $post['role']);
        $user = $this->um->updateUser($user);

        // render the updated user
        header('Location: /res03-projet-final/admin-users');
    }

    public function deleteUser(string $get)
    {
        // delete the user in the manager
        $user = $this->um->deleteUser(intval($get));

        // render the list of all users
        header('Location: /res03-projet-final/admin-users');
    }
}