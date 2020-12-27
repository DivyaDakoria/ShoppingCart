<?php
    session_start();
    include_once '../connect.php';
    if(!isset($_SESSION['username']))
    {
        header("Location:../index.php");
    }
    if(isset($_POST['submit']))
    {
        $cname = $_POST['cname'];
        $query = "insert into category (cname) values ('".$cname."')";
        $res = mysqli_query($con,$query);
        if($res){
            echo "Category Added Successfully!!!!";
            header("Location:displayCategory.php");
        }
        else{
            echo "Error occur while inserting category!!!!";
        echo mysqli_error($con);
        }
        
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping</title>
</head>
<body>
    <center>
    <h1 class="text-primary text-uppercase">Add Category</h1>
    <form method="post" >
        <label>Category Name :<label>
        <input type="text" name="cname" placeholder="Enter Category Name"/>
        <br/>
        <br/>
        <input type="submit" name="submit" value="Add"/> 
        <br/>
        <!-- <a href="registration.php">New user? Register here! </a> -->
    </form>
</center>
</body>
</html>