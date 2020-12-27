<?php

session_start();
include_once '../connect.php';
if(!isset($_SESSION['username']))
{
   header("Location:../index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
</head>
<body>
<div class="Container">
    <h3 class="text-primary text-uppercase text-center">Shopping Cart(Admin)</h3><hr/>
    <div class="d-flex justify-content-center">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><a href="displayCategory.php" class="text-white">Category</a></button>
    </div><br/>
    <div class="d-flex justify-content-center">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><a href="displayProduct.php" class="text-white">Product</a></button>
    </div><br/>
    <div class="d-flex justify-content-center">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><a href="../logout.php" class="text-white">Logout</a></button>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>