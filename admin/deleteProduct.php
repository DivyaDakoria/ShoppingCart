<?php
    session_start();
    include_once '../connect.php';
    if(!isset($_SESSION['username']))
    {
        header("Location:../index.php");
    }
    $pid=$_GET['pid'];
    
    $query = "delete from products where pid=".$pid;
    $res = mysqli_query($con,$query);
        if($res){
            echo "delete product Successfully!!!!";
            header("Location:displayProduct.php");
        }
        else{
            echo "Error occur while Update product!!!!";
            echo mysqli_error($con);
        } 
?>
