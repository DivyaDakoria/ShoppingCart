<?php
    session_start();
    include_once '../connect.php';
    if(!isset($_SESSION['username']))
    {
        header("Location:../index.php");
    }
    $cid=$_GET['cid'];
    
    $query = "delete from category where cid=".$cid;
    $res = mysqli_query($con,$query);
        if($res){
            echo "delete Category Successfully!!!!";
            header("Location:displayCategory.php");
        }
        else{
            echo "Error occur while Update category!!!!";
            echo mysqli_error($con);
        } 
?>
