<?php
if(isset($_GET["form_id"])){
    $form_id =$_GET["form_id"];
    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "app_qa";

// สร้างการเชื่อมต่อ
$conn = mysqli_connect($servername, $username, $password, $dbname);

$sql="DELETE FROM create_form WHERE form_id=$form_id";
$conn->query($sql) ;
}
header("location:http://localhost/connectform/userpage/form/index-form.php");
exit;
?>