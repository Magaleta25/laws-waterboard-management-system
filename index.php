<html>
<head>
<title></title>
</head>
<link rel="stylesheet" href="index.css">
<body>
    <header class="header">
        <div>
        <h1>livingstonia water board</h1>
        </div> 
    </header>
<div>
    <div class="error-message">
        <?php
            if(isset($_GET['error'])){
                echo $_GET['error'];
            }
        ?>
        <div class="error"></div>
    </div>
<form class="form" action="next.php" method="POST">
        <div><label for="email">Email</label></div>
        <div>
        <input class="input"  type="email" placeholder="email" id="email" name="email">
        </div>
       <!-- <?php if (empty($errors['EMAIL'])) { echo "<span style='color: red'>".$errors['EMAIL']."</span>"; } ?>
        -->
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
        let FORMElemenent = document.querySelector(".form"),
        error = document.queryselector(".error");        

        FORMElemenent.addEventListener("submit",(e)=>{
            let email = EMAIL(emailElement.value);
            let password = PASSWORD(passwordElement.value);
});

function EMAIL(input)
{
    if(input === "")
        {
            error.innerHTML = "please enter your email";
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