<?php
    session_start();
    include_once '../connect.php';
    if(!isset($_SESSION['username']))
    {
       header("Location:../index.php");
    }
    $sql= "SELECT * FROM products p,category c where c.cid=p.cid and p.cid=".$_GET['cid']." ORDER BY pid DESC";
    $result = $con->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <style> 
        table { 
            margin: 0 auto; 
            font-size: large; 
            border: 1px solid black; 
        } 
  
        td { 
            border: 1px solid black; 
        } 
  
        th, 
        td { 
            font-weight: bold; 
            border: 1px solid black; 
            padding: 10px; 
            text-align: center; 
        } 
  
        td { 
            font-weight: lighter; 
        } 
    </style> 
</head>
<body>

<form method="post" name="category" id="category">
<center>
<h3>Product</h3>
<table> 
            <?php
                while($rows=$result->fetch_assoc())
                {
            ?> 
            <tr>
            <td><image src="../products/<?php echo $rows['image'];?>" width="100px" height="100px"></td>
            <tr> 
            <tr>
            <td><?php echo $rows['pname'];?></td>
            <tr>
            <tr>
            <td><?php echo $rows['price'];?></td>
            <tr>
            <tr>
                <td><?php echo $rows['description'];?></td>            
            <tr>
            <tr>
                <td> <input type="submit" name="submit" value="Add To Cart"/> </td>
            <tr>
            <?php
                }
            ?>   
        </table> 
</center>


</form>


</body>
</html>






