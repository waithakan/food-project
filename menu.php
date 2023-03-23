<?php 
    //establish database connection
    include_once 'conn.php';

    //start a session and store username in variable
    session_start();
    $user = $_SESSION["username"];

    //if user is not logged in, redirect them to the home page
    if($_SESSION["loggedIN"] == false){
        header('location:index.php');
    }else{
?>
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
    <title><?php 
         echo ucwords($user);
         ?> Menu</title>
</head>
<body class="registerBody">
    <div class="header">
    <div class="profileName">
        <?php

        if( $_SESSION["loggedIN"]){
        $user = $_SESSION["username"];
           $pfp = mysqli_query($conn, "SELECT logo FROM  registration where businessName='$user'");
           if (mysqli_num_rows($pfp) > 0) {
           $i=0;
           while($row = mysqli_fetch_array($pfp)) {
         ?>
          <img src="Uploads/<?php echo $row["logo"]?>" alt="restaurant logo">
          <?php
            $i++;
           }}
          ?>
        <h5><?php 
         echo ucwords($user); 
        }?>'s Menu</h5>
        </div>
        <span class="menuBar" id="menuBar" onclick="openMenu()"><i class="fa-solid fa-bars"></i></span>
        <div class="menu" id="menu">
            <span onclick="closeMenu()"><i class="fa-light fa-x"></i></span>
            <ul>
                <li><a href="menuGallery.php">Menus</a></li>
                <li><a href="menu.php">Your menu</a></li>
                <li><a href="orders.php">Orders</a></li>
                <li><a href="processing.php?action=logOut">Log Out</a></li>   
                <li><a href="about.php">Contact us</a></li>
            </ul>
        </div>
    </div>
    <div class="menuTitle" id="chefMenu" onclick="showForm()"><i class="fa-solid fa-circle-plus"></i></div>
    <div class="mainMenu" id="chefMenu2">
         <div class="gallery">
         <?php
         // get items in the menus tables that are from the admin user's restaurant and display them
            $posts = mysqli_query($conn,"SELECT * FROM  menus where businessName='$user'");
            if (mysqli_num_rows($posts) > 0) {
            $i=0;
            while($row = mysqli_fetch_array($posts)) {
        ?>
            <div class="card">
                <img src="Uploads/<?php echo $row["photo"]?>" alt="<?php echo $row["mealName"]?>">
                <h6><?php echo $row["mealName"]?></h6>
                <p>Ksh <?php echo $row["price"]?></p>
                <p> Serves <?php echo $row["servingNumber"]?></p>
                <div class="action menuList">
                    <a href="editMenu.php?id=<?php echo $row["id"]?>" class="pencil"><div class=" cartIcon"><i class="fa-solid fa-pencil"></i></div></a>
                    <a href="processing.php?action=deleteMeal&id=<?php echo $row["id"]?>" ><div class="cartIcon"><i class="fa-solid fa-trash"></i></div></a>
                </div>
            </div>  
        <?php
            $i++;
            }
            }else{
                echo '<h3 style="margin-left: 40%; margin-top: 3em; color:black;">No meals uploaded yet</i></h3>';
            }
        ?> 
        </div>
    </div>
    <div class="menuTitle" id="uploadMenu2" onclick="showList()"><i class="fa-solid fa-arrow-left"></i></div>
    <div class="menu form" id="uploadMenu">
    <form action="processing.php"method="POST" enctype="multipart/form-data">
            <div class="formDiv">
                <div>
                    <input name="mealName" placeholder="Meal name" type="text"/>
                    <input name="price" placeholder="Price" type="numbers"/>
                    <input name="availableOrders" placeholder="Available orders" type="number"/>
                    <input name="businessName" value="<?php echo $user; ?>" type="hidden"/>
                    <input name="logo" value="<?php 
                    // get admin user's restaurant logo
                                    $results = mysqli_query($conn,"SELECT * FROM  registration where businessName='$user'");
                                    if (mysqli_num_rows($results) > 0) {
                                    $i=0;
                                    while($row = mysqli_fetch_array($results)) {
                                    echo $row["logo"];
                                    $i++;
                                    }}
                                    ?>"
                     type="hidden"/>
                </div>
                <div>
                    <input name="servingNumber" placeholder="Serving" type="number"/>
                    <input name="photo" placeholder="upload photo" type="text" onclick="changeType()" id="photo" class="logo"/>
                </div>
            </div>
            <input name="Done" class="btn" type="submit" value="Done"/>
        </form>
    </div>

</body>
</html>
<?php
}
?>