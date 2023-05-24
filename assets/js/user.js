export default class User {
    username;
    email;
    password;
    confirmPassword;

    constructor(username = "", email = "", password = "", confirmPassword = "") {
        
        this.username = username;
        this.email = email;
        this.password = password;
        this.confirmPassword = confirmPassword;
    }

    get username () {
      return this.username;
    }

    set username (username) {
        this.username = username;
    }

    get email () {
        return this.email;
    }

    set email (email) {
        this.email = email;
    }

    get password () {
        return this.password;
    }

    set password (password) {
        this.password = password;
    }

    get confirmPassword () {
        return this.confirmPassword;
    }

    set confirmPassword (confirmPassword) {
        this.confirmPassword = confirmPassword;
    }

    validate() {
        if(this.checkEqualPassword() === true &&
        this.checkUsername() === true &&
        this.checkEmail() === true && 
        this.checkPassword() === true)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    
     checkEqualPassword() {
         
        if (this.password === this.confirmPassword) {
            
            return true;
        }
        else{
            
            alert("Vos mots de passe ne sont pas identiques. Veuillez vérifier !");
            return false;
        }
    }
    
    checkPassword(){
        
        if(this.password.length < 8){
            
            alert("Votre mot de passe doit contenir 8 caractères minimum");
            return false;
        }
        else{
            return true;
        }
    }

    checkUsername() {
        
        if(this.username.length > 4 || this.username.length < 12){
            return true;
            
        }
        else{
            alert("Votre pseudo doit contenir entre 4 et 12 caractères");
            return false;
        }
    }

    checkEmail() {
        
        let regex = /^[\w.-]+@[a-zA-Z_-]+?\.[a-zA-Z]{2,3}$/;
        
        if(regex.test(this.email)){
            return true;
        }
        else{
            alert("Votre adresse email n'est pas correct");
            return false;
        }
    }
}

