import User from "./user.js";

window.addEventListener("DOMContentLoaded", function(){
   let form = document.getElementById("formRegister");
    
   form.addEventListener("submit", function(event){
        
        console.log('test addEventListener');
       let user = new User();

       user.username = document.getElementById("register-username").value;
       user.email = document.getElementById("register-email").value;
       user.password = document.getElementById("register-password").value;
       user.confirmPassword = document.getElementById("register-confPassword").value;

       if(!user.validate())
       {
           event.preventDefault(); // empecher la soumission
           alert("Vérifiez vos champs");
       }
       else
       {
           // afficher un message de succès dans le formulaire
           alert("Vous vous êtes enregistré. Vous pouvez dès à present vous connecter");
       }
   });

});