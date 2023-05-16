function valideUpdate(){
    
    
    let formUpdateUser = document.getElementById('formUpdateUser');
    
    formUpdateUser.addEventListener('keyup', function(e){
        
        let password = document.getElementById('newPassword').value.trim(); 
        
       
        if(password.length < 8){
            
            
            alert("Votre mot de passe doit faire au moins 8 caractères");
            e.preventDefault();
            return;
        }
        
        /*alert("Votre mot de passe a été modifié avec succès !");*/
        formUpdateUser.submit();
        
    });
}

window.addEventListener('DOMContentLoaded', valideUpdate());