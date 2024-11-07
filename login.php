<html>
<head>
<title></title>
</head>
<link rel="stylesheet" href="login.css">
<body>
    <header class="header">
        <div>
        <h1>livingstonia water board</h1>
        </div> 
    </header>
<div>
<form class="form" action="next.php" method="POST">
        <div><label for="email">Email</label></div>
        <div>
        <input class="input"  type="email" placeholder="email" id="email" name="email">
        </div>
       <!-- <div><?php echo  htmlspecialchars($_POST[$errors['EMAIL']]);  ?></div>-->
        <div><label for="password">Password</label></div>
        <div>
        <input class="input" type="password" id="password" name="password" id="password">
        </div>
        <div>
            <input class="login" type="submit" value="Login" name="login">
        </div>
        <div class="bottom-text" >
            <a href="">forget password</a>
            <a href="signup.html">create account </a>
        </div> 
    </form>
</div>

<script>
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
       
</script>
    
</body>
</html>