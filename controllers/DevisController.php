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
            $primaryColor = $_POST["primaryColor"];
            $secondaryColor= $_POST['secondaryColor'];
            $option1Color= $_POST['option1Color'];
            $option2Color= $_POST['option2Color'];
            $option3Color= $_POST['option3Color'];
            $text= $_POST['text'];
            $sizeProject= $_POST['sizeProject'];
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
            $primaryColor = $_POST["primaryColor"];
            $secondaryColor= $_POST['secondaryColor'];
            $option1Color= $_POST['option1Color'];
            $option2Color= $_POST['option2Color'];
            $option3Color= $_POST['option3Color'];
            $text= $_POST['text'];
            $sizeProject= $_POST['sizeProject'];
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
    
    public function devisSceneCreate()
    {
        echo "fonction devisSceneCreate";
        // vérifier que le formulaire a été soumis
        if(isset($_POST['formScene']) && isset($_SESSION['id']))
        {
            // récupérer les champs du formulaire
            $numberScene = $_POST['numberScene'];
            $description = $_POST['description'];
            $theme = $_POST["themeScene"];
            $primaryColor = $_POST["primaryColor"];
            $secondaryColor= $_POST['secondaryColor'];
            $option1Color= $_POST['option1Color'];
            $option2Color= $_POST['option2Color'];
            $option3Color= $_POST['option3Color'];
            $text= $_POST['text'];
            $sizeProject= $_POST['sizeProject'];
            $idUser = $_SESSION['id'];
            
            $createDevisScene = new Devis($numberScene, $description, $theme, $primaryColor, $secondaryColor, $option1Color, $option2Color, $option3Color, $text, $sizeProject, $idUser);
            
            $devisScene = $this->dm->createDevisWallpaper($createDevisScene);
            
           
            header("Location: /res03-projet-final/home");

        }
        else
        {
            header("Location: /res03-projet-final/devis");
        }
    }
    
    public function devisLogoEdit()
    {
        
    }
    
    public function devisWallpaperEdit()
    {
        
    }
    
    public function devisSceneEdit()
    {
        
    }
    
    public function devisLogoDelete()
    {
        
    }
    
    public function devisWallpaperDelete()
    {
        
    }
    
    public function devisSceneDelete()
    {
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
}