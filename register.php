<!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- external file -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"></script>
    <script src="https://kit.fontawesome.com/2751fbc624.js" crossorigin="anonymous"></script>
    <script src="index.js" async></script>
    <link rel="stylesheet" href="style.css">

    <title>Register</title>
</head>
<body class="registerBody">
    <!-- Navigation bar  -->
    <div class="header">
        <h5>Food Ordering Service</h5>
            <span class="menuBar" id="menuBar" onclick="openMenu()"><i class="fa-solid fa-bars"></i></span>
            <div class="menu" id="menu">
                <span onclick="closeMenu()"><i class="fa-light fa-x"></i></span>
                <ul>
                    <!-- linking to other pages -->
                    <li><a href="menuGallery.php">Menu</a></li>
                    <li><a href="register.php" onclick="join()">Join us</a></li>
                    <li><a href="logIn.php" onclick="logIn()">Log In</a></li>   
                    <li><a href="processing.php?action=logOut">Log Out</a></li>   
                    <li><a href="about.php">Contact us</a></li>
                </ul>
            </div>
    </div>
    <div class="registrationPrompt" id="registrationPrompt">
        <h5>Select category</h5>
        <div>
            <button class="btn client" onClick="showClientForm()">Client user</button>
            <button class="btn" onClick="showRestaurantForm()">Restaurant admin</button>
        </div>
    </div>
    <div class="signup form" id="restaurantForm">
        <form action="processing.php"method="POST" enctype="multipart/form-data">
            <div class="formDiv">
                <div>
                    <input name="businessName" placeholder="businessName" type="text"/>
                    <input name="emailAddress" placeholder="email address" type="text"/>
                    <input name="category" value="business" type="hidden"/>
                    <section class="passwordArea">
                        <input name="password" id="password" placeholder="password" type="password"/>
                        <span>
                            <i class="fa-regular fa-eye" onclick="showPassword()"  id="showPassword"></i>
                            <i class="fa-regular fa-eye-slash" onclick="showPassword()" id="hidePassword" ></i>
                        </span>
                    </section>
                    <label id='passwordChecker'></label>
                </div>
                <div>
                    <input name="location" placeholder="location" id="locationPin" type="text"/>
                    <input name="logo" type="text" onclick="changeType()" placeholder="Upload logo" id="photo" class="logo"/>
                </div>
            </div>
            <input name="signUp" class="btn" type="submit" value="Sign up"/>
        </form>
    </div>
    <div class="signup form" id="clientForm" >
        <form action="processing.php"method="POST" enctype="multipart/form-data">
            <div class="formDiv">
                <div>
                    <input name="fullName" placeholder="full name" type="text"/>
                    <input name="emailAddress" placeholder="email address" type="text"/>
                    <input name="category" value="client" type="hidden"/>
                    <section class="passwordArea">
                        <input name="password" id="password1" placeholder="password" type="password"/>
                        <span>
                            <i class="fa-regular fa-eye" onclick="showPassword1()"  id="showPassword1"></i>
                            <i class="fa-regular fa-eye-slash" onclick="showPassword1()" id="hidePassword1" ></i>
                        </span>
                    </section>
                    <label id='passwordChecker1'></label>
                </div>
                <div>
                <input name="photo" type="text" onclick="changeType1()" placeholder="Upload profile photo" id="photo1" class="logo"/>
                </div>
            </div>
            <input name="clientSignUp" class="btn" type="submit" value="Sign up"/>
        </form>
    </div>
</body>
</html>