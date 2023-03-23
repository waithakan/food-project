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
    <title>Order Receipt <?php
         ?></title>
</head>
<body>
<div class="receipt">
    <div class='head'>
        <img src="Uploads/<?php echo $_GET['logo']?>"/>
        <h5><?php echo $_GET['from']?></h5>
    </div>
    <div class='info'>
        <h6>RECEIPT</h6>
        <p>Order code: <?php echo $_GET['id']?></p>
        <p>Meal Ordered: <?php echo $_GET['name']?></p>
        <p>For the price: <?php echo $_GET['price']?></p>
    </div>
</div>
<button class="checkout btn" id="printBtn" type="submit" name="checkout"onclick="window.print()">Print</button>
</body>
</html>
<?php
}
?>