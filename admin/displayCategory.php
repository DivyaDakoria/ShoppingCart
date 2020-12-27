<?php
    session_start();
    include_once '../connect.php';
    if(!isset($_SESSION['username']))
    {
        header("Location:../index.php");
    }
    $sql= "SELECT * FROM category ORDER BY cid DESC";
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
<h3>Category</h3>
<a href="addCategory.php">ADD CATEGORY</a><br/><br/>

<table> 
            <tr> 
                <th>Category ID</th>
                <th>CategoryName</th> 
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
                while($rows=$result->fetch_assoc())
                {
            ?> 
            <tr>
                <td><?php echo $rows['cid'];?></td>
                <td><?php echo $rows['cname'];?></td>
                <td><a href="updateCategory.php?cid=<?php echo $rows['cid'];?>&&cname=<?php echo $rows['cname'];?>">Edit</a></td>
                <td><a href="deleteCategory.php?cid=<?php echo $rows['cid'];?>">Delete</a></td>
            <tr> 
            <?php
                }
            
            ?>   
        </table> 
</center>


</form>


</body>
</html>






