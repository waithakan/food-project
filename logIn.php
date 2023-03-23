<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"></script>
    <script src="https://kit.fontawesome.com/2751fbc624.js" crossorigin="anonymous"></script>
    <script src="index.js" async></script>
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body class="registerBody">
    <div class="header">
        <h5>Food Ordering Service</h5>
            <span class="menuBar" id="menuBar" onclick="openMenu()"><i class="fa-solid fa-bars"></i></span>
            <div class="menu" id="menu">
                <span onclick="closeMenu()"><i class="fa-light fa-x"></i></span>
                <ul>
                    <li><a href="menuGallery.php">Menu</a></li>
                    <li><a href="register.php">Join us</a></li>
                    <li><a href="logIn.php">Log In</a></li>   
                    <li><a href="processing.php?action=logOut">Log Out</a></li>   
                    <li><a href="about.php">Contact us</a></li>
                </ul>
            </div>
            </div>
    <div class="login form" id="loginForm">
        <form action="processing.php"method="POST" >
            <div class="formDiv">
                <div>
                    <input name="emailAddress" placeholder="email address" type="text" required/>
                </div>
                <div>
                <section class="passwordArea">
                        <input name="password" id="password" placeholder="password" type="password"/>
                        <span>
                            <i class="fa-regular fa-eye" onclick="showPassword()" id="showPassword"></i>
                            <i class="fa-regular fa-eye-slash" onclick="showPassword()" id="hidePassword"></i>
                        </span>
                    </section>
                    <label id='passwordChecker'></label>                </div>
            </div>
            <input name="logIn" class="btn" type="submit" value="Log In"/>
        </form>
    </div>
    <div class="createAccount">
    <a href="register.php" onclick="join()"><h5>Create Account</h5></a>
    </div>
</body>
</html>