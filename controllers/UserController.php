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
        
        $this->render($user);

        
    }

    public function createUser(array $post)
    {
        // create the user in the manager
        $password_hash = password_hash($past['password'], PASSWORD_DEFAULT);
        
        $user = new User(null, $post["user"], $post["email"], $password_hash, "user");
        $user = $this->um->createUser($user);

        // render the created user
        $this->render(["data" => $user->toArray()]);
    }

    public function updateUser(string $get)
    {
        $post = $_POST;
        // update the user in the manager
        $user = new User($post["id"], $post["user"], $post["email"], $past['password'], $post['role']);
        $user = $this->um->updateUser($user);

        // render the updated user
        $this->render(["data" => $user->toArray()]);
    }

    public function deleteUser(string $get)
    {
        // delete the user in the manager
        $users = $this->um->deleteUser(intval($get));

        $list = [];
        
        foreach($users as $user)
        {
            $list[] = $user->toArray();
        }

        // render the list of all users
        $this->render(["data" => $list]);
    }
}