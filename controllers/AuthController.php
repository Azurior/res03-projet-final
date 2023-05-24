<?php  
 
class AuthController extends AbstractController {  
  
    private UserManager $um;
    
    public function __construct()  
    {  
        $this->um = new UserManager();
    }  
    
    /* Pour la page d'inscription */  
    public function authentificator() : void  
    {  
        $this->renderPublic("authentificator", "all", []);// render la page avec le formulaire d'inscription  
    }  
      
    /* Pour vérifier l'inscription */  
    public function checkRegister() : void  
    {  
        
        if(isset($_POST["formRegister"]) === true)
        {
            // récupérer les champs du formulaire 
            $username = $this->clean($_POST["register-username"]);
            $email = $this->clean($_POST["register-email"]);
            $password = $this->clean($_POST["register-password"]);
            $confPassword = $this->clean($_POST["register-confPassword"]);
            $role = "user";
            
            if($password === $confPassword)
            {
                
                if(strlen($password) > 8){
                
                    // chiffrer le mot de passe 
                    $hashPassword = password_hash($password, PASSWORD_DEFAULT);
                    
                    // appeler le manager pour créer l'utilisateur en base de données
                    $createUser = new User($username, $email, $hashPassword, $role);
                    
                    $user = $this->um->createUser($createUser);
                    
                    // connecter l'utilisateur
                    $_SESSION["user"] = $user;
                    
                    // le renvoyer vers l'accueil
                    header("Location: /res03-projet-final/authentificator");
                }
                else{
                    
                    $_SESSION['errorPassword'] = "Votre mot de passe doit contenir 8 caractères minimum";
                    header("Location: /res03-projet-final/authentificator");
                }
            }
            else
            {
                $_SESSION['errorPasswordAndConf'] = "Votre mot de passe doit correspondre avec la confirmation !";
                header("Location: /res03-projet-final/authentificator");
            }
        }
        else
        {
            
            header("Location: /res03-projet-final/authentificator");
            
        }
           
    }  
      
    /* Pour vérifier la connexion */  
    public function checkLogin() : void  
    {  
        // vérifier que le formulaire a été soumis
        if(isset($_POST['formLogin']))
        {
            // récupérer les champs du formulaire
            $email = $this->clean($_POST["loginEmail"]);
            $password = $this->clean($_POST["loginPassword"]);
            
            // utiliser le manager pour vérifier si un utilisateur avec cet email existe
            $user = $this->um->getUserByEmail($email);
            
            if($user === null){
                
                $_SESSION['formErrorMail'] = "L'adresse mail utilisé n'existe pas";
                header("Location: /res03-projet-final/authentificator");
                
            }
            else
            {
                if($user->getEmail() === $email) // si il existe, vérifier son mot de passe 
                {
                    if(password_verify($password, $user->getPassword())) // si il est bon, connecter l'utilisateur 
                    {
                        $_SESSION['id'] = $user->getId();
                        $_SESSION['email'] = $user->getEmail();
                        $_SESSION["user"] = $user->getUser();
                        $_SESSION["role"] = $user->getRole();
                        header("Location: /res03-projet-final/home");
                    }
                    else // si il n'est pas bon renvoyer sur la page de connexion 
                    {
                        
                        $_SESSION["formErrorPassword"] = "Votre mot de passe n'est pas bon";
                        header("Location: /res03-projet-final/authentificator");
                    }
                }
                else // si il n'existe pas renvoyer vers la page de connexion
                {
                    $_SESSION['formErrorMail'] = "L'adresse mail utilisé n'existe pas";
                    header("Location: /res03-projet-final/authentificator");
                }
            }
        }
        else
        {
            header("Location: /res03-projet-final/authentificator");
        }
    }
    
    public function logout() : void
    {
        session_destroy();
        
        header("Location: /res03-projet-final/home");
    }
    
}