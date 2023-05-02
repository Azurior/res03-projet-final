<?php

class DevisController extends AbstractController{
    
    private DevisManager $dm;
    
    public function __construct()
    {
        $this->dm = new DevisManager();
    }
    
    public function devis()
    {
        
        $this->renderPublic('devis', 'all', []);
        
    }
    
    public function getAllDevisLogo()
    {
        
        $allDevisLogo = $this->dm->getAllDevisLogo();
        
        
        $this->renderAdmin('devislogo', 'all', $allDevisLogo);
    }
    
    public function getAllDevisWallpaper()
    {
        
        $allDevisWallpaper = $this->dm->getAllDevisWallpaper();
        
        
        $this->renderAdmin('deviswallpaper', 'all', $allDevisWallpaper);
    }
    
    public function getAllDevisScene()
    {
       
        $allDevisScene = $this->dm->getAllDevisScene();
        
        
        $this->renderAdmin('devisscene', 'all', $allDevisScene);
    }
    
    public function devisLogoCreate()
    {
        
        echo "fonction devisLogoCreate";
        // vérifier que le formulaire a été soumis
        if(isset($_POST['formLogo']) && isset($_SESSION['id']))
        {
            // récupérer les champs du formulaire
            $theme = $_POST["themeLogo"];
            $primaryColor = $_POST["primaryColorLogo"];
            $secondaryColor= $_POST['secondaryColorLogo'];
            $option1Color= $_POST['option1ColorLogo'];
            $option2Color= $_POST['option2ColorLogo'];
            $option3Color= $_POST['option3ColorLogo'];
            $text= $_POST['textLogo'];
            $sizeProject= $_POST['sizeProjectLogo'];
            $idUser = $_SESSION['id'];
            
            $createDevisLogo = new Devis($theme, $primaryColor, $secondaryColor, $option1Color, $option2Color, $option3Color, $text, $sizeProject, $idUser);
            
            $devisLogo = $this->dm->createDevisLogo($createDevisLogo);
            
            echo "Le devis a été envoyé";
            header("Location: /res03-projet-final/home");

        }
        else
        {
            echo "Le devis n'a pas été envoyé";
            header("Location: /res03-projet-final/devis");
        }
    }
    
    public function devisWallpaperCreate()
    {
        echo "fonction devisWallpaperCreate";
        // vérifier que le formulaire a été soumis
        if(isset($_POST['formWallpaper']) && isset($_SESSION['id']))
        {
            // récupérer les champs du formulaire
            $theme = $_POST["themeWallpaper"];
            $primaryColor = $_POST["primaryColorWallpaper"];
            $secondaryColor= $_POST['secondaryColorWallpaper'];
            $option1Color= $_POST['option1ColorWallpaper'];
            $option2Color= $_POST['option2ColorWallpaper'];
            $option3Color= $_POST['option3ColorWallpaper'];
            $text= $_POST['textWallpaper'];
            $sizeProject= $_POST['sizeProjectWallpaper'];
            $idUser = $_SESSION['id'];
            
            $createDevisWallpaper = new Devis($theme, $primaryColor, $secondaryColor, $option1Color, $option2Color, $option3Color, $text, $sizeProject, $idUser);
            
            $devisWallpaper = $this->dm->createDevisWallpaper($createDevisWallpaper);
            
            
            header("Location: /res03-projet-final/home");

        }
        else
        {
            header("Location: /res03-projet-final/devis");
        }
        
    }
    
    public function devisSceneCreate() : ?DevisScene
    {
        echo "fonction devisSceneCreate";
        // vérifier que le formulaire a été soumis
        if(isset($_POST['formScene']) && isset($_SESSION['id']))
        {
            // récupérer les champs du formulaire
            $numberScene = $_POST['numberScene'];
            $description = $_POST['description'];
            $theme = $_POST["themeScene"];
            $primaryColor = $_POST["primaryColorScene"];
            $secondaryColor= $_POST['secondaryColorScene'];
            $option1Color= $_POST['option1ColorScene'];
            $option2Color= $_POST['option2ColorScene'];
            $option3Color= $_POST['option3ColorScene'];
            $text= $_POST['textScene'];
            $sizeProject= $_POST['sizeProjectScene'];
            $idUser = $_SESSION['id'];
            
            $createDevisScene = new DevisScene($numberScene, $description, $theme, $primaryColor, $secondaryColor, $option1Color, $option2Color, $option3Color, $text, $sizeProject, $idUser);
            
            $devisScene = $this->dm->createDevisScene($createDevisScene);
            
           
            header("Location: /res03-projet-final/home");

        }
        else
        {
            header("Location: /res03-projet-final/devis");
        }
    }
    
    public function devisLogoEdit()
    {
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
            header('Location: /res03-projet-final/admin/devislogo');
            
        }
        else
        {
            header('Location: /res03-projet-final/admin/devislogo/<?= $user->getId(); ?>/edit');
        }
    }
    
    public function devisWallpaperEdit()
    {
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
            header('Location: /res03-projet-final/admin/deviswallpaper');
            
        }
        else
        {
            header('Location: /res03-projet-final/admin/deviswallpaper/<?= $user->getId(); ?>/edit');
        }
    }
    
    public function devisSceneEdit()
    {
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
            header('Location: /res03-projet-final/admin/devisscene');
            
        }
        else
        {
            header('Location: /res03-projet-final/admin/devisscene/<?= $user->getId(); ?>/edit');
        }
    }
    
    public function devisLogoDelete(int $id)
    {
        // delete the user in the manager
        $this->dm->deleteDevisLogo($id);

        // render the list of all users
        header('Location: /res03-projet-final/admin/devislogo');
    }
    
    public function devisWallpaperDelete(int $id)
    {
        // delete the user in the manager
        $this->dm->deleteDevisWallpaper($id);

        // render the list of all users
        header('Location: /res03-projet-final/admin/deviswallpaper');
    }
    
    public function devisSceneDelete(int $id)
    {
        // delete the user in the manager
        $this->dm->deleteDevisScene($id);

        // render the list of all users
        header('Location: /res03-projet-final/admin/devisscene');
    }
    
}