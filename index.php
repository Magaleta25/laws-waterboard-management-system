<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livingstonia Waterboard</title>
    <link rel="stylesheet" href="index.css" >
</head>
<body>

    <!-- Header -->
    <header>
        <h1>Livingstonia Waterboard</h1>
        <nav>
            <a href="#">Home</a>
            <a href="#">Services</a>
            <a href="#">About Us</a>
            <a href="#">Contact</a>
            <div class="nav-actions">
                <a href="login.php" class="login-btn">Login</a>
            </div>
        </nav>
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
        <div>
            <a href="">forget password</a>
        </div>
         <a href="signup.html">create account </a> 
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
