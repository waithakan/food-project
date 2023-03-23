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
    <div class="body">
            <div class="intro">
                <h1>Food Ordering Service</h1>
                <h6>EVERY MENU, FOR YOU</h6>
            </div>
            <div class="CTA">
                <h5>Popular</h5>
                <?php    
                include_once "conn.php"; 

                //get item that has appeared on orders the most and display it
                $popular = mysqli_query($conn, "SELECT id, COUNT(id)  AS `value_occurence` 
                FROM  orders GROUP BY id ORDER BY `value_occurence` desc LIMIT 1");
                if (mysqli_num_rows($popular) > 0) {
                $i=0;
                $id;
                while($row = mysqli_fetch_array($popular)) {
                    $id = $row["id"];
                    $i++;}}
                $selected =  mysqli_query($conn, "SELECT * FROM  menus WHERE id=$id");
                if (mysqli_num_rows($selected) > 0) {
                    $j=0;
                    while($results = mysqli_fetch_array($selected)) {
            ?>
            <div class="card">
                <img src="Uploads/<?php echo $results["photo"]?>" alt="<?php echo $results["mealName"]?>">
                <h6><?php echo $results["mealName"]?></h6>
                <p>Ksh <?php echo $results["price"]?></p>
                <div class="bottom">
                    <div class="restaurant">                
                        <img src="Uploads/<?php 
                        $name = $results["businessName"];
                        $restaurant =  mysqli_query($conn, "SELECT * FROM  registration WHERE businessName='$name'");
                        if (mysqli_num_rows($restaurant) > 0) {
                            $k=0;
                            while($result = mysqli_fetch_array($restaurant)) {
                        echo $result["logo"];
                        $k++;}}?>"?>
                        <h6><?php echo $results["businessName"]?></h6>
                    </div>
                    <a href="logIn.php" ><i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
            <?php
                $j++;
                }
                }
            
            ?>
            </div>
    </div>
</body>
</html>