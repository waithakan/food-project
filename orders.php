<?php 
    //establish database connection
    include_once 'conn.php';

    //start a session and store username in variable
    session_start();
    $user = $_SESSION["username"];

    //get logo
    $z = 0;
    $logo;
    $photoResult = mysqli_query($conn, "SELECT logo FROM  registration where businessName='$user'");
    if (mysqli_num_rows($photoResult) > 0){
        while($row = mysqli_fetch_array($photoResult)) {
            $logo = $row['logo'];
            $z++;
        }}
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
    <title>Orders to <?php 
         echo ucwords($user);
         ?></title>
</head>
<body class="registerBody">
    <div class="header">
        <div class="searchBar">
                <input type="text" name="keyword" id="keyword">
                <button type="submit" onclick="search(id)"><i class="fas fa-search"></i></button></a>
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
    <h3 class="listTitle"><?php 
         echo ucwords($user);
         ?> Orders</h3>
    <div class="orders">
        <div class="list">
        <?php 
        // declare variables   
        $i=0;
        $k=0;
        $l=0;
        $id;
        $date;
        $total =0;

        //sql statement to get items that have been ordered
        $results = mysqli_query($conn, "SELECT id, COUNT(id), date, location,  total, orderId, deliveryStatus FROM  orders where deliveryStatus=0
                                        Group BY date, id");
        if (mysqli_num_rows($results) > 0) {
            ?>
            <h3>Undelivered
            <?php
            while($row = mysqli_fetch_array($results)) {
                $i++;
                $id = $row["id"];
                $date = $row["date"]; 
                $totalPrice =  $row["total"];    
                $location =  $row["location"]; 
                $orderId = $row["orderId"]
            ?>  
            <?php
            //sql statemnt to get items that have been ordered and display them
            $orders = mysqli_query($conn, "SELECT * FROM  menus where id='$id'");
            if (mysqli_num_rows($orders) > 0) {
                $j = 0;
                while($row = mysqli_fetch_array($orders)){

            ?>
            <div class="card">
                <img src="Uploads/<?php echo $row["photo"]?>" alt="beef stew">
                <div>
                    <p><?php echo $row["mealName"];
                     $l++;
                     ?></p>
                    <p>Ksh <?php echo $row["price"]?></p>
                </div>
                <div>
                    <p><?php echo $date?></p>
                    <p> Serving: 
                        <?php 
                        echo ($totalPrice/$row["price"]);
                        ?>
                    </p>
                </div>
                <div>
                    <p>At <?php $total += $row["price"];
                      echo $location?></p>
                      <p>
                            Delivered:
                            <a href="orders.php?action=deliveryStatus&id=<?php echo $orderId?>"><i class="fas fa-check-square"></i></a>
                    </p>
                    <a href="ordersPrint.php?id=<?php echo $id?>&name=<?php echo $row["mealName"]?>&from=<?php echo $user?>&price=<?php echo $total?>&logo=<?php echo $logo ?>" id="print"><i class="fa-solid fa-print"></i></a>
                </div>
            </div>
            <?php
                    $j++;
                }}
                $k++;
            }}
                        // conditional statement to clear the cart if the user clicks the trash icon in the cart
                        if(isset($_GET['action'])){
                            if($_GET['action'] == "deliveryStatus"){
                                $deliveryStatus = 1;
                                $id = $_GET['id'];
                                //statement to enter values into the menus table in the database
                                $sql = "UPDATE orders SET deliveryStatus = '$deliveryStatus' where orderId='$id'";

                                // if sql query is executed and database connection is established
                                if (mysqli_query($conn, $sql)) {
                                    unset($_SESSION['orders']);
                                    header('location:orders.php');
                                } else {	
                                echo "Error: " . $sql . "
                            " . mysqli_error($conn);
                                }
                                mysqli_close($conn);
                            }}
                ?>
        </div>

        </div>
    </div>
    <div class='allOrders'>
        <table>
            <tr>
            <th>Order Id</th>
            <th>Meal Name</th>
            <th>Price</th>
            <th>Location</th>
            <th>Time</th>
            </tr>
            <?php
                $all = mysqli_query($conn, "SELECT* FROM  orders
                Group BY date, id");
                if (mysqli_num_rows($all) > 0) {
                while($result = mysqli_fetch_array($all)) {
            ?>
            <tr>
                <td><?php echo $result["orderId"]?></td>
                <td><?php echo $result["mealName"]?></td>
                <td><?php echo $result["price"]?></td>
                <td><?php echo $result["location"]?></td>
                <td><?php echo $result["date"]?></td>
            </tr>
            <?php }} ?>
        </table>
    </div>
</body>
</html>
<?php
}
?>