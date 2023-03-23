<?php
//connect to database
include_once 'conn.php';

$loginStatus = false;
//sign up
// check that signup is not null
if(isset($_POST['signUp']))
{	
    // specify directory for uploading the file
    $target_dir = "Uploads/";
    $fileName = basename($_FILES["logo"]["name"]);
    $targetFilePath = $target_dir . $fileName;
    $imageFileType = strtolower(pathinfo($targetFilePath,PATHINFO_EXTENSION));

    //if file input is not empty
    if(!empty($_FILES["logo"]["name"])){
    //move uploaded file
    move_uploaded_file($_FILES["logo"]["tmp_name"], $targetFilePath); 
    }
    //create session
    session_start();
    
    //store values submitted in the signup form in variables
	 $businessName = $_POST['businessName'];
	 $emailAddress = $_POST['emailAddress'];
	 $password = $_POST['password'];
     $location = $_POST['location'];
     $logo = $_POST['logo'];
     $category = $_POST['category'];
     
     //statement to enter values into the registration table in the database
	 $sql = "INSERT INTO registration (businessName,emailAddress, password, location, logo, category)
	 VALUES ('$businessName','$emailAddress','$password','$location', '$fileName', '$category')";

     //if sql query is executed...
	 if (mysqli_query($conn, $sql)) {
        $_SESSION["loggedIN"] = true;
        $loginStatus = $_SESSION["loggedIN"];
        $_SESSION["username"] = $businessName;

        if($_SESSION["loggedIN"]){
        //redirect user to their menu page
        header("Location: menu.php"); 
        }else{
            //redirect to the home page
            header('location:index.php');
        }
			 } else {	
                //show error
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
     //close connection
	 mysqli_close($conn);

}
//sign up
// check that signup is not null
if(isset($_POST['clientSignUp']))
{	
    // specify directory for uploading the file
    $target_dir = "Uploads/";
    $fileName = basename($_FILES["photo"]["name"]);
    $targetFilePath = $target_dir . $fileName;
    $imageFileType = strtolower(pathinfo($targetFilePath,PATHINFO_EXTENSION));

    //if file input is not empty
    if(!empty($_FILES["photo"]["name"])){
    //move uploaded file
    move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath); 
    }
    //create session
    session_start();
    
    //store values submitted in the signup form in variables
	 $fullName = $_POST['fullName'];
	 $emailAddress = $_POST['emailAddress'];
	 $password = $_POST['password'];
     $photo = $_POST['photo'];
     $category = $_POST['category'];

     //statement to enter values into the registration table in the database
	 $sql = "INSERT INTO registration (businessName,emailAddress, password, logo, category)
	 VALUES ('$fullName','$emailAddress','$password', '$fileName', '$category')";

     //if sql query is executed...
	 if (mysqli_query($conn, $sql)) {
        $_SESSION["loggedIN"] = true;
        $loginStatus = $_SESSION["loggedIN"];
        $_SESSION["username"] = $fullName;
      
        if($_SESSION["loggedIN"]){
        //redirect user to their menu page
        header("Location: menuGallery.php"); 
        }else{
            //redirect to the home page
            header('location:index.php');
        }
			 } else {	
                //show error
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
     //close connection
	 mysqli_close($conn);

}


// check that meal upload submit form is not null
if(isset($_POST['Done']))
{	
    // specify directory for uploading the file
    $target_dir2 = "Uploads/";
    $fileName2 = basename($_FILES["photo"]["name"]);
    $targetFilePath2 = $target_dir2 . $fileName2;
    $imageFileType2 = strtolower(pathinfo($targetFilePath2,PATHINFO_EXTENSION));

    //if file input is not empty
    if(!empty($_FILES["photo"]["name"])){
    //move uploaded file
    move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath2);
    } 

    //store values submitted in the meal upload form in variables
	 $mealName = $_POST['mealName'];
	 $price = $_POST['price'];
	 $availableOrders = $_POST['availableOrders'];
     $servingNumber = $_POST['servingNumber'];
     $businessName = $_POST['businessName'];
     $logo = $_POST['logo'];

     //statement to enter values into the menus table in the database
	 $sql = "INSERT INTO menus (mealName,price, availableOrders, servingNumber, photo, businessName, logo)
	 VALUES ('$mealName','$price','$availableOrders', '$servingNumber', '$fileName2', '$businessName', '$logo')";

     //if sql query is executed...
	 if (mysqli_query($conn, $sql)) {
        //redirect user to their menu page
        header("Location: menu.php"); 
			 } else {	
                //show error
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
     //close connection
	 mysqli_close($conn);
}

//login
//check that login is not null
if(isset($_POST['logIn']))
{
    //create session
    session_start();

    //import variables from an array into local symbol table
    extract($_POST);
    $emailAddress = $_POST ["emailAddress"];
    $password = $_POST ["password"];

     //statement to select values from the registration table in the database
    $sql=mysqli_query($conn,"SELECT * FROM registration where emailAddress='$emailAddress' and password='$password'");
    //fetch the result row as an array
    $row  = mysqli_fetch_array($sql);
    //if sql query is executed...
    if(is_array($row))
    {
        $_SESSION["emailAddress"]=$row['emailAddress'];
        $_SESSION["username"]=$row['businessName'];
        $_SESSION['category']=$row['category'];
        $_SESSION["loggedIN"] = true;
        $loginStatus = $_SESSION["loggedIN"];

        if($_SESSION['category'] == 'client'){
            header("Location: menuGallery.php"); 
        }else if($_SESSION['category'] == 'business'){
            header("Location: menu.php"); 
        }
    }
    else
    {
        echo "Invalid Username /Password";
    }
}
if(isset($_GET['action'])){
    if($_GET['action']== "checkStatus"){
        unset($_SESSION['orders']);
        header("Location: menuGallery.php"); 
    }
    }

//check that the edit form submission is not null
if(isset($_POST['edit']))
{	 
     // specify directory for uploading the file
     $target_dir3 = "Uploads/";
     $fileName3 = basename($_FILES["photo"]["name"]);
     $targetFilePath3 = $target_dir3 . $fileName3;
     $imageFileType3 = strtolower(pathinfo($targetFilePath3,PATHINFO_EXTENSION));

    //if file input is not empty
     if(!empty($_FILES["photo"]["name"])){
     //move uploaded file
     move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath3);
     } 

   //store values submitted in the meal upload form in variables
    $id = $_POST['id'];
    $mealName = $_POST['mealName'];
    $price = $_POST['price'];
    $availableOrders = $_POST['availableOrders'];
    $servingNumber = $_POST['servingNumber'];
    $businessName = $_POST['businessName'];
    $logo = $_POST['logo'];

    //statement to update values
    $sql = "UPDATE menus SET mealName='$mealName', price='$price', availableOrders='$availableOrders', 
                   servingNumber='$servingNumber', businessName='$businessName' WHERE id='$id'";

    // if sql query is executed and database connection is established
    if (mysqli_query($conn, $sql)) {
        header('location:menu.php');
    } else {	
    echo "Error: " . $sql . "
" . mysqli_error($conn);
    }
    mysqli_close($conn);
}

//check that the edit form submission is not null
if(isset($_POST['checkout']))
{	 
   //store values submitted in the meal upload form in variables
    $id = $_POST['id'];
    $mealName = $_POST['mealName'];
    $price = $_POST['price'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $total = $_POST['total'];

    //statement to enter values into the menus table in the database
	 $sql = "INSERT INTO orders (mealName,price, id, time, location, total)
	 VALUES ('$mealName','$price','$id', '$time', '$location', '$total')";

    // if sql query is executed and database connection is established
    if (mysqli_query($conn, $sql)) {
        unset($_SESSION['orders']);
        header('location:menuGallery.php?action=checkout');
    } else {	
    echo "Error: " . $sql . "
" . mysqli_error($conn);
    }
    mysqli_close($conn);
}

 if(isset($_GET['action'])){
// log out if the user selects "Log Out" on the menu bar
    if($_GET['action']== "logOut"){
        session_start();
        session_unset();
        header("Location: index.php"); 
    }

//delete an item from the menus table in the database if a restaurant admin user selects the trash icon in their menu 
    if($_GET['action'] == "deleteMeal"){
        $id = $_GET['id'];
        $sql = "DELETE FROM menus WHERE id=$id";
         if (mysqli_query($conn, $sql))
          {           
            header('location:menu.php');
         } 
    
         else {
            echo "Error: " . $sql . "
    " . mysqli_error($conn);
         }
         mysqli_close($conn);
    }
    }
?>