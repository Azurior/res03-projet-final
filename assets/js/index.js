import { getUsers } from "./users.js";
//import { getUser } from "./user.js";
//import { updateUser } from "./update-user.js";
//import { deleteUser } from "./delete-user.js";
//import { createUser }  from "./create-user.js";

function getPage(url)
{
    if(url.indexOf("?") !== -1)
    {
        return url.substring(url.lastIndexOf("/") + 1, url.indexOf("?"));
    }
    else
    {
        return url.substring(url.lastIndexOf("/") + 1);
    }
}

window.addEventListener("DOMContentLoaded", function(){
    console.log(window.location.href);
    let page = getPage(window.location.href);
    
    console.log(page);
    
    if(page === "articles")
    {
        getUsers();
        let addBtn = document.getElementById("btnAddUser");
        addBtn.addEventListener("click", function(){
            window.location.href = "create-user.html";
        });
    }
    else if (page === "user.phtml")
    {
        //getUser();
    }
    else if (page === "update-user.html")
    {
        //updateUser();
    }
    else if (page === "login.phtml")
    {
        //createUser();
    }
    else
    {
        console.log("Aucune condition n'a fonctionné");
    }
    
})