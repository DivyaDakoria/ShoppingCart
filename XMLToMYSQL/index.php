<?php
$conn = mysqli_connect("localhost", "root", "", "studentdb");

$affectedRow = 0;

$xml = simplexml_load_file("student.xml") or die("Error: Cannot create object");

foreach ($xml->children() as $row) {
    $name = $row->name;
    $class = $row->class;
    $gender = $row->gender;
    $marks = $row->marks;
    
    $sql = "INSERT INTO tblstudent(name,class,gender,marks) VALUES('" . $name . "','" . $class . "','" . $gender . "','" . $marks . "')";
    
    $result = mysqli_query($conn, $sql);
    
    if (! empty($result)) {
        $affectedRow ++;
    } else {
        $error_message = mysqli_error($conn) . "\n";
    }
}
?>
<h3>ADD XML File Data to MYSQL(student)</h3>
<?php
if ($affectedRow > 0) {
    $message = "Your Data Successfully Added In To Mysql";
    header("location:http://localhost/phpmyadmin/sql.php?server=1&db=studentdb&table=tblstudent&pos=0");
} else {
    $message = "No records inserted";
}
?>
