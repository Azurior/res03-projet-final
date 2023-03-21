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
        $this->renderPartial("authentificator", []);// render la page avec le formulaire d'inscription  
    }  
      
    /* Pour vérifier l'inscription */  
    public function checkRegister() : void  
    {  
        
        if(isset($_POST["formRegister"]) === true)
        {
            // récupérer les champs du formulaire 
            $username = $_POST["register-username"];
            $email = $_POST["register-email"];
            $password = $_POST["register-password"];
            $confPassword = $_POST["register-confPassword"];
            $role = "user";
            
            if($password === $confPassword)
            {
                
                // chiffrer le mot de passe 
                $hashPassword = password_hash($password, PASSWORD_DEFAULT);
                
                // appeler le manager pour créer l'utilisateur en base de données
                $createUser = new User($username, $email, $hashPassword, $role);
                
                $user = $this->um->createUser($createUser);
                
                // connecter l'utilisateur
                $_SESSION["user"] = $user;
                
                // le renvoyer vers l'accueil
                header("Location: /res03-projet-final");
            }
            else
            {
                
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
            $email = $_POST["login-email"];
            $password = $_POST["login-password"];
            
            // utiliser le manager pour vérifier si un utilisateur avec cet email existe
            $user = $this->um->getUserByEmail($email);
            
            if($user === true) // si il existe, vérifier son mot de passe 
            {
                if(password_verify($password, $user->getPassword())) // si il est bon, connecter l'utilisateur 
                {
                    $_SESSION["user"] = $user;
                    header("Location: /res03-projet-final");
                }
                else // si il n'est pas bon renvoyer sur la page de connexion 
                {
                    echo 'mauvais mot de passe';
                    //header("Location: /res03-projet-final/authentificator");
                }
            }
            else // si il n'existe pas renvoyer vers la page de connexion
            {
                echo '$user = false';
                //header("Location: /res03-projet-final/authentificator");
            }
        }
        else
        {
            echo 'formLogin = false';
            //header("Location: /res03-projet-final/authentificator");
        }
    }
    
}