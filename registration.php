<?php
    include_once 'connect.php';
    if(isset($_POST['submit']))
    {
        
        $query = "insert into users (username,email,password,role,contactno) values ('".$_POST['username']."','".$_POST['email']."','".$_POST['password']."','user','".$_POST['contactno']."')";
        $res = mysqli_query($con,$query);
        if($res){
            echo "Registered Successfully!!!!";
            header("Location:index.php");
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
    <style>
    table, th, td {
  border: 1px solid black;
}
    </style>
</head>
<body>
    <center>
    <h1 class="text-primary text-uppercase">Registration</h1>
    <form method="post" enctype="multipart/form-data" id="login">
<table>
    <tr>
        <td><label>User Name :<label></td>
        <td><input type="text" name="username" placeholder="Enter User Name"/></td>
    </tr>
    <tr>
        <td><label>Email:<label></td>
        <td><input type="email" name="email" placeholder="Enter Email"/></td>
    </tr>
    <tr>
        <td><label>Password:<label></td>
        <td><input type="password" name="password" placeholder="Enter Password"/></td>
    </tr>
    <tr>
        <td><label>Contact No:<label></td>
        <td><input type="number" name="contactno" placeholder="Enter Contact No"/></td>
    </tr>
    <tr>
        <td><input type="submit" name="submit" value="Add"/>
        <td><a href="index.php">Login!!! </a></td>
    </tr>
</table>

        
    </form>
    </center>
</body>
</html>