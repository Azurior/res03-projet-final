function formLogo(){
    
    let devisLogo = document.getElementById('devisLogo');
    
    devisLogo.addEventListener('submit', function(e){
        
        let themeLogo = document.getElementById("themeLogo").value.trim();
        let primaryColor = document.getElementById("primaryColorLogo").value.trim();
        let secondaryColor = document.getElementById("secondaryColorLogo").value.trim();
        let text = document.getElementById("textLogo").value.trim();
        let sizeProject = document.getElementById("sizeProjectLogo").value.trim();
        
        if(themeLogo === ''){
            
            alert("Veuillez définir un thème de logo");
            e.preventDefault();
            return;
        }
        
        if(primaryColor === ''){
            
            alert("Veuillez définir une couleur principale s'il vous plaît");
            e.preventDefault();
            return;
        }
        
        if(secondaryColor === ''){
            
            alert("Veuillez définiir une couleur secondaire s'il vous plaît");
            e.preventDefault();
            return;
        }
        
        if(text === ''){
            
            alert("Veuillez saisir un texte ou un pseudo s'il vous plaît");
            e.preventDefault();
            return;
        }
        
        if(sizeProject === ""){
            
            alert("Vous avez oublié de définir la taille de votre projet");
            e.preventDefault();
            return;
        }
        
        devisLogo.submit();
        
        
    });
    
}

function formWallpaper(){
    
    let devisWallpaper = document.getElementById('devisWallpaper');
    
    devisWallpaper.addEventListener('submit', function(e){
        
        let themeWallpaper = document.getElementById("themeWallpaper").value.trim();
        let primaryColor = document.getElementById("primaryColorWallpaper").value.trim();
        let secondaryColor = document.getElementById("secondaryColorWallpaper").value.trim();
        let text = document.getElementById("textWallpaper").value.trim();
        let sizeProject = document.getElementById("sizeProjectWallpaper").value.trim();
        
        if(themeWallpaper === ''){
            
            alert("Veuillez définir un thème de logo");
            e.preventDefault();
            return;
        }
        
        if(primaryColor === ''){
            
            alert("Veuillez définir une couleur principale s'il vous plaît");
            e.preventDefault();
            return;
        }
        
        if(secondaryColor === ''){
            
            alert("Veuillez définiir une couleur secondaire s'il vous plaît");
            e.preventDefault();
            return;
        }
        
        if(text === ''){
            
            alert("Veuillez saisir un texte ou un pseudo s'il vous plaît");
            e.preventDefault();
            return;
        }
        
        if(sizeProject === ""){
            
            alert("Vous avez oublié de définir la taille de votre projet");
            e.preventDefault();
            return;
        }
        
        devisWallpaper.submit();
    });
    
}

function formScene(){
    
    let devisScene = document.getElementById('devisScene');
    
    devisScene.addEventListener('submit', function(e){
        
        let themeScene = document.getElementById("themeScene").value.trim();
        let primaryColor = document.getElementById("primaryColorScene").value.trim();
        let secondaryColor = document.getElementById("secondaryColorScene").value.trim();
        let text = document.getElementById("textScene").value.trim();
        let sizeProject = document.getElementById("sizeProjectScene").value.trim();
        let numberScene = document.getElementById("numberScene").value.trim();
        let description = document.getElementById("descriptionScene").value.trim();
        
        if(themeScene === ''){
            
            alert("Veuillez définir un thème de logo");
            e.preventDefault();
            return;
        }
        
        if(primaryColor === ''){
            
            alert("Veuillez définir une couleur principale s'il vous plaît");
            e.preventDefault();
            return;
        }
        
        if(secondaryColor === ''){
            
            alert("Veuillez définiir une couleur secondaire s'il vous plaît");
            e.preventDefault();
            return;
        }
        
        if(text === ''){
            
            alert("Veuillez saisir un texte ou un pseudo s'il vous plaît");
            e.preventDefault();
            return;
        }
        
        if(sizeProject === ""){
            
            alert("Vous avez oublié de définir la taille de votre projet");
            e.preventDefault();
            return;
        }
        
        if(numberScene === ""){
            
            alert("Veuillez définir un nombre de scènes");
            e.preventDefault();
            return;
        }
        
        if(description === ""){
            
            alert("La description est vide. Il me faut des détails sur ce que vous voulez pour certaines scènes");
            e.preventDefault();
            return;
        }
        
        devisScene.submit();
        
    });
    
}

window.addEventListener('DOMContentLoaded', formLogo(), formScene(), formWallpaper());