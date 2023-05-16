export class User {
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
        this.checkEmail() === true)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    checkEqualPassword() {
        
    }

    checkUsername() {
        
    }

    checkEmail() {
        
    }
}

