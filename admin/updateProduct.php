<?php
    session_start();
    include_once '../connect.php';
    if(!isset($_SESSION['username']))
    {
        header("Location:../index.php");
    }
    include_once '../connect.php';
    if(isset($_POST['submit']))
    {
    $pid=$_GET['pid'];
    $pname=$_POST['pname'];
    $cid=$_POST['cid'];
    $price=$_POST['price'];
    $description=$_POST['description'];
    $filename = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $dir = "../products/" . $filename;
    move_uploaded_file($tempname,$dir);
    $query = "update products set pname ='".$pname."',cid='".$cid."',price='".$price."',description='".$description."',image='".$filename."' where pid=".$pid;
    $res = mysqli_query($con,$query);
        if($res){
            echo "Update product Successfully!!!!";
            header("Location:displayProduct.php");
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
</head>
<body>
    <center>
    <h1>Update Product</h1>
    <form method="post" enctype="multipart/form-data">
        <label>Product Name :<label>
        <input type="text" name="pname" placeholder="Enter Product Name" value="<?php echo $_GET['pname']; ?>"/>
        <br/>
        <br/>
        <label>Select Category :<label>
        <select name="cid">
            <option disabled selected>-- Select Category --</option>
            <?php
                $res = mysqli_query($con, "SELECT * From category");  // Use select query here 
                while($data = mysqli_fetch_assoc($res))
                {
                    echo "<option  value='". $data['cid'] ."'>" .$data['cname'] ."</option>";  // displaying data in option menu
                }	
            ?>
        </select>  
        <br/>
        <br/>
        <label>Price :<label>
        <input type="number" name="price" placeholder="Enter Price" value="<?php echo $_GET['price']; ?>"/>
        <br/>
        <br/>
        <label>Description :<label>
        <input type="text" name="description" placeholder="Enter Description" value="<?php echo $_GET['description']; ?>"/>
        <br/>
        <br/>
        <label>Image :<label>
        <input type="file" id="image" name="image" >
        <input type="hidden" name="oldimg" value="<? echo $_GET['image']; ?>" /> 
        <td><image src="../products/<?php echo $_GET['image'];?>" width="100px" height="60px"></td>

        <br/>
        <br/>
        <input type="submit" name="submit" value="Update"/> 
        <br/>
    </form>
    </center>
</body>
</html>