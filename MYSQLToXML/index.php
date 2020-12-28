<!DOCTYPE HTML>
<html>
<head>
<title>MYSQL To XML</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
	$con = mysqli_connect("localhost", "root", "","studentdb")
			or die("Could not connect : " . mysql_error());
		//echo "Connected successfully";
		
	$result = mysqli_query($con, "SELECT * FROM tblstudent");
	$fp=fopen("student.xml","w");

		if(mysqli_num_rows($result)!=0)
		{
		$xml_str="<?xml version='1.0' encoding='ISO-8859-1' ?>";
		$xml_str.="<items>";
		
		while ($row = mysqli_fetch_array($result)) 
		{
		$xml_str.="<item>";
		$xml_str.="<name>".$row['name']."</name>";
		$xml_str.="<class>".$row['class']."</class>";
		$xml_str.="<gender>".$row['gender']."</gender>";
		$xml_str.="<marks>".$row['marks']."</marks>";
		$xml_str.="</item>";
		}
		$xml_str.="</items>";
		}
		
	fwrite($fp,$xml_str);
	echo "XML File is created!";
	mysqli_close($con);
	?>

</body>
</html>
