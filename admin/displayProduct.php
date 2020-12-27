<?php
    session_start();
    include_once '../connect.php';
    if(!isset($_SESSION['username']))
    {
        header("Location:../index.php");
    }
    $sql= "SELECT * FROM products p,category c where c.cid=p.cid ORDER BY pid DESC";
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
<a href="addProduct.php">ADD PRODUCT</a><br/><br/>

<table> 
            <tr> 
                <th>ProductID</th>
                <th>ProductName</th> 
                <th>CategoryName</th> 
                <th>Price</th> 
                <th>Description</th> 
                <th>ProductImage</th> 
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
                while($rows=$result->fetch_assoc())
                {
            ?> 
            <tr>
                <td><?php echo $rows['pid'];?></td>
                <td><?php echo $rows['pname'];?></td>
                <td><?php echo $rows['cname'];?></td>
                <td><?php echo $rows['price'];?></td>
                <td><?php echo $rows['description'];?></td>
                <td><image src="../products/<?php echo $rows['image'];?>" width="100px" height="60px"></td>
                <td><a href="updateProduct.php?pid=<?php echo $rows['pid'];?>&&pname=<?php echo $rows['pname'];?>&&cid=<?php echo $rows['cid'];?>&&price=<?php echo $rows['price'];?>&&description=<?php echo $rows['description'];?>&&image=<?php echo $rows['image'];?>;">Edit</a></td>
                <td><a href="deleteProduct.php?pid=<?php echo $rows['pid'];?>">Delete</a></td>
            <tr> 
            <?php
                }
            ?>   
        </table> 
</center>


</form>


</body>
</html>






