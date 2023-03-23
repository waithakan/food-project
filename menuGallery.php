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
    <title>Menu</title>
</head>
<body class="registerBody">
    <div class="header">
        <div class="profileName">
        <?php
        include_once "conn.php"; 
        session_start();
        if( $_SESSION["loggedIN"]){
        $user = $_SESSION["username"];
           $pfp = mysqli_query($conn, "SELECT logo FROM  registration where businessName='$user'");
           if (mysqli_num_rows($pfp) > 0) {
           $i=0;
           while($row = mysqli_fetch_array($pfp)) {
         ?>
          <img src="Uploads/<?php echo $row["logo"]?>" alt="profile photo">
          <?php
            $i++;
           }}
          ?>
        <h5><?php 
         echo ucwords($user); 
        }?></h5>
        </div>
        <div class="searchBar">
                <input type="text" name="keyword" id="keyword">
                <button type="submit" onclick="search(id)"><i class="fas fa-search"></i></button></a>
        </div>
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
            <?php
            // }
            ?>
        </div>
    </div>
       <div class="mainMenu">
        <div class="gallery">
            <?php    
                // get items that are in the menus table in the database and display them
                $uploads = mysqli_query($conn, "SELECT * FROM  menus");
                if (mysqli_num_rows($uploads) > 0) {
                $i=0;
                while($row = mysqli_fetch_array($uploads)) {
            ?>
            <div class="card">
                <img src="Uploads/<?php echo $row["photo"]?>" alt="<?php echo $row["mealName"]?>">
                <h6><?php echo $row["mealName"]?></h6>
                <p>Ksh <?php echo $row["price"]?></p>
                <div class="bottom">
                    <div class="restaurant">                
                        <img src="Uploads/<?php echo $row["logo"]?>" alt="<?php echo $row["mealName"]?>">
                        <h5><?php echo $row["businessName"]?></h5>
                    </div>
                    <form  method="post">
                        <input value="<?php echo $row["mealName"]?>" name="mealName" type="hidden"/>
                        <input value="<?php echo $row["price"]?>" name="price" type="hidden"/>
                        <input value="<?php echo $row["id"]?>" name="id" type="hidden"/>
                        <button class="cartIcon" type="submit" name="addToCart"><i class="fa-solid fa-cart-shopping"></i></button>
                    </form>
                </div>
            </div>  
        <?php
            $i++;
            }
            }
        ?> 
        </div>

            <?php
             
            // If the user clicked the add to cart button on the product page we can check for the form data
            if (isset($_POST['addToCart'])) {
                $total = 0;

                //store the order info in an array
                $order =array(
                    'id' =>  $_POST['id'],
                    'mealName' =>  $_POST['mealName'],
                    'price' =>  $_POST['price'],
                );  

            // store all orders in an array together
            $_SESSION['orders'][]= $order; 

            //make sure no duplicates are shown
            function multi_unique_array($arr, $key) {
                $Myarray = array();
                $i = 0;
                $array_of_keys = array();
                foreach($arr as $val) {
                if (!in_array($val[$key], $array_of_keys)) {
                $array_of_keys[$i] = $val[$key];
                $Myarray[$i] = $val;
                }
                $i++;
                }
                return $Myarray;
                }
                // calling the custom function with array and id key
                $cart = multi_unique_array( $_SESSION['orders'],'id');

                //show items that have been added to cart
            if(!empty($cart)){
                ?>
                <div class="cart">
                <div class="header"><h5>CART</h5>
                <a href="menuGallery.php?action=clearAll"><i class="fa-solid fa-trash"></i></a></div>
                <form action="processing.php" method="POST">
                    <?php
                  
                foreach(($cart) as $key => $value){
            ?>
            <input value="<?php echo $value['mealName']?>" name="mealName" type="text"/>
            <input value="<?php echo $value['id']?>" name="id" type="hidden"/>
            <input value="<?php echo $value['price']?>" name="price" type="number"/>
            <?php 
                $total += $value['price'];
                ;}
            ?> 
            <input type="time" id="time" name="time" required>
            <input name="location" placeholder="location" id="locationPin" type="text"/>
            <span><h5>Total:</h5> <input value="<?php echo $total;?>" name="total" type="number"/></span>
            <button class="checkout btn" id="checkout" type="submit" name="checkout"onclick="selectTime()">Check out</button>
            <a href="menuGallery.php?action=checkout"><button class="checkout btn" id="finish" type="submit" name="checkout">Finish</button></a>
        </form>
        <!-- form for mpesa payment details -->
        <form id="pay" action="processing.php" method="post">
            <input type="number"  name="amount"  placeholder="amount" required>
            <input type="number"  name="phoneNumber" placeholder="phoneNumber" required>
        </form>
            </div>
            <?php
                            }
                        }
            // conditional statement to clear the cart if the user clicks the trash icon in the cart
            if(isset($_GET['action'])){
                if($_GET['action']== "clearAll" ||$_GET['action']== "checkout"  ){
                    unset($_SESSION['orders']);
                    // header("Location: menuGallery.php"); 
                }
                }
                        ?>
        </div>
    </div>
</body>
</html>