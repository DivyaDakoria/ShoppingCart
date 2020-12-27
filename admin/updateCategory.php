<?php

session_start();
include_once '../connect.php';
if(!isset($_SESSION['username']))
{
    header("Location:../index.php");
}
    if(isset($_POST['submit']))
    {
    $cid=$_GET['cid'];
    $cname=$_POST['cname'];
    $query = "update category set cname ='".$cname."' where cid=".$cid;
    $res = mysqli_query($con,$query);
        if($res){
            echo "Update Category Successfully!!!!";
            header("Location:displayCategory.php");
        }
        else{
            echo "Error occur while Update category!!!!";
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
    <h1>Update Category</h1>
    <form method="post" id="category">
        <table>
            <tr>
                <td><label>Category Name :<label></td>
                <td><input type="text" name="cname" value="<?php echo $_GET['cname']; ?>"/></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="Add"/></td>
            </tr>
        </table>
    </form>
</center>
    
</body>
</html>