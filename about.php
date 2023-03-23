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
    <title>Food Ordering site</title>
</head>
<body class="homeBody">
    <div class="header">
        <span class="menuBar" id="menuBar" onclick="openMenu()"><i class="fa-solid fa-bars"></i></span>
        <div class="menu" id="menu">
            <span onclick="closeMenu()"><i class="fa-light fa-x"></i></span>
            <ul>
                <li><a href="menuGallery.php">Menu</a></li>
                <li><a href="register.php" onclick="join()">Join us</a></li>
                <li><a href="logIn.php" onclick="logIn()">Log In</a></li>   
                <li><a href="processing.php?action=logOut">Log Out</a></li>   
                <li><a href="about.php">Contact us</a></li>
            </ul>
        </div>
</div>
    <h1 class="contactsTitle">FOOD ORDERING SERVICE</h1>
    <div class="contactBody">
            <div class="about">
                <h5>About Us</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <div class="contacts">
                <h5>Get in Touch with us</h5>
                <h6><i class="fa-solid fa-location-dot"></i>123 Anywhere St. 
                    Any City, State
                    Country 12345</h6>
                <h6><i class="fa-solid fa-phone"></i><a href="tel:(123) 456 7890">(123) 456 7890</a></h6>
                <h6><i class="fa-solid fa-envelope"></i><a href="mailto:hello@reallygreatsite.com">hello@reallygreatsite.com</a></h6>
            </div>
    </div>
</body>
</html>