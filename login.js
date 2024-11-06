let emailElement = document.querySelector("#email");
let passwordElement = document.querySelector("#password");
let loginElemenent = document.querySelector(".login");
let FORMElemenent = document.querySelector(".form");        

FORMElemenent.addEventListener("submit",(Event)=>{
            let email = EMAIL(emailElement.value);
            let password = PASSWORD(passwordElement.value);

});

function EMAIL(input)
{
    if(input === "")
        {
            alert("please enter your email");
            event.preventDefault();
        }
}

function PASSWORD(input)
{
    if(input === "")
        {
            alert("please enter your password");
            event.preventDefault();
        }
}