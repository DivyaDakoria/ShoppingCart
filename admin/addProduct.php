<?php
    session_start();
    include_once '../connect.php';
    if(!isset($_SESSION['username']))
    {
        header("Location:../index.php");
    }
    if(isset($_POST['submit']))
    {
        
        $filename = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];
        $dir = "../products/" . $filename;
        move_uploaded_file($tempname,$dir);
        $query = "insert into products (pname,cid,price,description,image) values ('".$_POST['pname']."','".$_POST['cid']."','".$_POST['price']."','".$_POST['description']."','".$filename."')";
        $res = mysqli_query($con,$query);
        if($res){
            echo "Product Added Successfully!!!!";
            header("Location:displayProduct.php");
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
    <h1 class="text-primary text-uppercase">Add Product</h1>
    <form method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td><label>Product Name :<label></td>
            <td><input type="text" name="pname" placeholder="Enter Product Name"/></td>
        </tr>
        <tr>
            <td><label>Select Category :<label></td>
            <td>
                <select name="cid">
                    <option disabled selected>-- Select Category --</option>
                    <?php
                        $res = mysqli_query($con, "SELECT * From category");  // Use select query here 
                        while($data = mysqli_fetch_assoc($res))
                        {
                            echo "<option value='". $data['cid'] ."'>" .$data['cname'] ."</option>";  // displaying data in option menu
                        }	
                    ?>
                </select>
            </td>
        </tr>  
        <tr>
            <td><label>Price :<label></td>
            <td><input type="number" name="price" placeholder="Enter Price"/></td>
        </tr>
        <tr>
            <td><label>Description :<label></td>
            <td><input type="text" name="description" placeholder="Enter Description"/></td>
        </tr>
        <tr>
            <td><label>Image :<label></td>
            <td><input type="file" name="image"/></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="submit" value="Add"/> </td>
        </tr>
    </table>
    </form>
</center>
</body>
</html>