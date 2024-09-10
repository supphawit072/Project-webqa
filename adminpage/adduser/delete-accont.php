<?php
if(isset($_GET["user_id"])){
    $user_id =$_GET["user_id"];
    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "app_qa";

// สร้างการเชื่อมต่อ
$conn = mysqli_connect($servername, $username, $password, $dbname);

$sql="DELETE FROM user WHERE user_id=$user_id";
$conn->query($sql) ;
}
header("location:http://localhost/connectform/adminpage/adduser/index-user.php");
exit;
?>