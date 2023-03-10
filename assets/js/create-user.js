function createUser()
{
    console.log("Create User");
    
    let form = document.querySelector("form");
    
    form.addEventListener("submit", function(event){
        event.preventDefault();
        
        let user = {
            username : document.querySelector("input[name='username']").value,
            firstName : document.querySelector("input[name='firstName']").value,
            lastName : document.querySelector("input[name='lastName']").value,
            email : document.querySelector("input[name='email']").value
        };
        
        console.log(user);
        
        let formData = new FormData();
        formData.append('username', user.username);
        formData.append('firstName', user.firstName);
        formData.append('lastName', user.lastName);
        formData.append('email', user.email);

        const options = {
            method: 'POST',
            body: formData
        };

        fetch('https://maridoucet.sites.3wa.io/user-api/create-user', options)
            .then(response => response.json())
            .then(data => {
                window.location.href = "users.html";
        });
    });
}

export { createUser };