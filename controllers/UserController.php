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

    public function getUser(int $get)
    {
       
       if(isset($_SESSION['id']) && $get === $_SESSION['id'])
       {
           $userId = $this->um->getUserById($get);
           
           if($userId)
           {
    
                $user = $userId->toArray();
                
                
                // render
                
                $this->renderPublic('user', 'id', $user);
           }
           else
           {
               
               header('Location: /res03-projet-final/home');
               
           }
       }
       else
       {
           
           header('Location: /res03-projet-final/home');
           
       }
        
        

        
    }

    public function createUser(array $post)
    {
        // create the user in the manager
        $password = $this->clear($post['password']);
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        
        $user = new User(null, $this->clear($post["user"]), $this->clear($post["email"]), $password_hash, "user");
        $user = $this->um->createUser($user);

    }

    public function updateUserPassword()
    {
        $id = $_SESSION["id"];
        $user = $this->um->getUserById($id);
        
        
        if(isset($_POST['formUpdateUser'])){
            

            
            $oldPassword = $this->clean($_POST['oldPassword']);
            $checkOldPassword = password_verify($oldPassword, $user->getPassword());
            $newPassword = password_hash($this->clean($_POST['newPassword']),PASSWORD_DEFAULT);
            $role = $_SESSION["role"];
            
                
            if($checkOldPassword){
                
                if(strlen($_POST['newPassword']) < 8){
                    $updateEmail = $user->getEmail($id);
                    $updateUser = $user->getUser($id);
                    
                      
                    $newUser = new User($updateUser, $updateEmail, $newPassword, $role);
                    $newUser->setId($id);
                    $user = $this->um->updateUser($newUser);
                    
                    $_SESSION['valideUpdate'] = "Félicitation, votre mot de passe a été modifié";
                    header("Location: /res03-projet-final/user/$id");
                }
                else{
                    
                    $_SESSION["lenghtPassword"] = "Votre mot de passe doit contenir 8 caractères minimum";
                    header("Location: /res03-projet-final/user/$id");
                    
                }
            }
            else{
                    
                $_SESSION["errorOldPassword"] = "Votre ancien mot de passe n'est pas bon";
                header("Location: /res03-projet-final/user/$id");
            }
            
        }
        else{
            
            
            header("Location: /res03-projet-final/user/$id");
        }
    }
    
    public function updateUser(int $id)
    {
       
        $user = $this->um->getUserById($id);
        $array = [];
        $array[] = $user;
        
        
        if(isset($_POST['formUpdateUser'])){
            

            
            $updateUser = $_POST['updateUser'];
            
                
            if(isset($updateUser)){
                
                
                $updateEmail = $user->getEmail($id);
                $updatePassword = $user->getPassword($id);
                $role = $user->getRole($id);
                
                  
                $newUser = new User($updateUser, $updateEmail, $updatePassword, $role);
                $newUser->setId($id);
                $user = $this->um->updateUser($newUser);
                
                header("Location: /res03-projet-final/admin/users");
                    
            }
            else{
                    
                $this->renderAdmin('user', 'edit', $array);
            }
            
        }
        else{
            
            
            $this->renderAdmin('user', 'edit', $array);
        }
    }

    public function deleteUser(int $id)
    {
        
        // delete the user in the manager
        $this->um->deleteUser($id);

        // render the list of all users
        header('Location: /res03-projet-final/admin/users');
    }
}