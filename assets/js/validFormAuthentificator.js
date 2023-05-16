function validFormRegister(){
    
        let registerForm = document.getElementById('registerForm');
        
        
        registerForm.addEventListener('submit', function(e){
            let username = document.getElementById('register-username').value.trim();
            let email = document.getElementById('register-email').value.trim();
            let password = document.getElementById('register-password').value.trim();
            let confPassword = document.getElementById('register-confPassword').value.trim();
            let regex = /^[a-zA-ZÀ-ÖØ-öø-ÿ\s-']{2,50}$/;
            
            if(username.length < 4){
                
                alert('Votre pseudo doit comporter au moins 2 caractères');
                e.preventDefault();
                return;
            }
            
            if(email === ''){
                
                alert("Veuillez remplir le champs Email, s'il vous plaît");
                e.preventDefault();
                return;
            }
            
            if(regex.test(email)){
                
                alert("Votre email n'est pas conforme");
                e.preventDefault();
                return;
            }
            
            if(password.length < 4){
                
                alert("Votre mot de passe doit faire au moins 4 caractères");
                e.preventDefault();
                return;
            }
            
            if(password !== confPassword){
                
                alert("Votre mot de passe ne correspond pas à votre confirmation de mot de passe. Vérifiez bien");
                e.preventDefault();
                return;
            }
            
            alert("Vous vous êtes enregistré. Vous pouvez dès à present vous connecter");
            registerForm.submit();
        });
        
    }

function validFormLogin(){
    
        let formLogin = document.getElementById('formLogin');
        
        formLogin.addEventListener('submit', function(e){
            
            let loginEmail = document.getElementById('loginEmail').value.trim();
            let loginPassword = document.getElementById('loginPassword').value.trim();
            let regex = /^[a-zA-ZÀ-ÖØ-öø-ÿ\s-']{2,50}$/;
            
            if(loginEmail === ''){
                
                alert("Veuillez saisir votre adresse email pour vous connecter");
                e.preventDefault();
                return;
            }
            
            if(regex.test(loginEmail)){
                
                alert("Votre email n'est pas conforme");
                e.preventDefault();
                return;
            }
            
            if(loginPassword === ''){
                
                alert("Veuillez saisir votre mot de passe pour vous connecter");
                e.preventDefault();
                return;
            }
            
            
            formLogin.submit();
        });
    }
    
window.addEventListener('DOMContentLoaded', validFormLogin(), validFormRegister());