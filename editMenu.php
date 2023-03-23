<?php 
    include_once 'conn.php';
    session_start();
    $user = $_SESSION["username"];
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
        <h5><?php 
         echo ucwords($_SESSION["username"]);
         ?>'s Menu</h5>
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

    <div class="menu form" id="editMenu">
    <form action="processing.php"method="POST" enctype="multipart/form-data">
            <div class="formDiv">
                <div>
                <?php 
                    //get restaurant id from url
                    $id = $_GET['id'];

                    // get items in the menus table from the restaurant with the same id as in the url and display the items
                    $records = mysqli_query($conn,"SELECT * FROM  menus where id='$id'");
                    if (mysqli_num_rows($records) > 0) {
                    $i=0;
                    while($result = mysqli_fetch_array($records)) {
                ?>
                    <input name="mealName" placeholder="Meal name" type="text" value="<?php echo $result["mealName"] ?>"/>
                    <input name="price" placeholder="Price" type="numbers"  value="<?php echo $result["price"] ?>"/>
                    <input name="availableOrders" placeholder="Available orders" type="number"  value="<?php echo $result["availableOrders"] ?>"/>
                    <input name="businessName"  value="<?php echo $result["businessName"] ?>" type="hidden"/>
                    <input name="id"  value="<?php echo $result["id"] ?>" type="hidden"/>
                    <input name="logo" value="<?php 
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
                    <input name="servingNumber" placeholder="Serving" type="number"  value="<?php echo $result["servingNumber"] ?>"/>
                    <input name="photo" placeholder="upload photo" type="text" onclick="changeType()" id="photo" class="logo"
                      value="<?php echo $result["photo"] ?>"/>
                    <?php
                        $i++;
                        }}
                    ?>
                </div>
            </div>
            <input name="edit" class="btn" type="submit" value="Done"/>
        </form>
    </div>
</body>
</html>
<?php
}
?>