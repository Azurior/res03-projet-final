//import { updateUser } from "update-user.js";
//import { deleteUser } from "delete-user.js";
//import { getUser } from "user.js";

function getUsers()
{
    fetch('https://tonygohin.sites.3wa.io/res03-projet-final/users')
        .then(response => response.json())
        .then(data => {
        
        let users = data;
        console.log(users);
        
        for(let i = 0; i < users.length; i++)
        {
            let tr = document.createElement("tr");
            
            let idTd = document.createElement("td");
            let id = document.createTextNode(users[i].id);
            idTd.appendChild(id);
            idTd.classList.add("py-1");
            tr.appendChild(idTd);
            
            let usernameTd = document.createElement("td");
            let username = document.createTextNode(users[i].user);
            usernameTd.appendChild(username);
            usernameTd.classList.add("py-1");
            tr.appendChild(usernameTd);
            
            let emailTd = document.createElement("td");
            let email = document.createTextNode(users[i].email);
            emailTd.appendChild(email);
            emailTd.classList.add("py-1");
            tr.appendChild(emailTd);
            
                
            let passwordTd = document.createElement("td");
            let password = document.createTextNode(users[i].password);
            passwordTd.appendChild(password);
            passwordTd.classList.add("py-1");
            tr.appendChild(passwordTd);
            
            let roleTd = document.createElement("td");
            let role = document.createTextNode(users[i].role);
            roleTd.appendChild(role);
            tr.appendChild(roleTd);
            
            let btnTd = document.createElement("td");
            btnTd.classList.add("py-1");
            
            let viewButton = document.createElement("a");
            viewButton.innerHTML = "<i class='bi bi-eye-fill'></i>";
            viewButton.classList.add("btn", "btn-outline-primary", "mx-1");
            viewButton.setAttribute("user-id", users[i].id);
            viewButton.setAttribute("href", "user.html?user_id=" + users[i].id);
            
            let editButton = document.createElement("a");
            editButton.innerHTML = "<i class='bi bi-pencil-fill'></i>";
            editButton.classList.add("btn", "btn-outline-success", "mx-1");
            editButton.setAttribute("user-id", users[i].id);
            editButton.setAttribute("href", "update-user.html?user_id=" + users[i].id);
            
            let deleteButton = document.createElement("button");
            deleteButton.innerHTML = "<i class='bi bi-trash3-fill'></i>";
            deleteButton.classList.add("btn", "btn-outline-danger", "mx-1");
            deleteButton.setAttribute("user-id", users[i].id);
            
            btnTd.appendChild(viewButton);
            btnTd.appendChild(editButton);
            btnTd.appendChild(deleteButton);
            tr.appendChild(btnTd);
            
            let table = document.querySelector("table tbody");
            table.appendChild(tr);
            
            //deleteButton.addEventListener("click", deleteUser);
        }
    });
}

export { getUsers };