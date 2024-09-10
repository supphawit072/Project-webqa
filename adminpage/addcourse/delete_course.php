<?php
if(isset($_GET["course_id"])){
    $course_id  =$_GET["course_id"];
    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "app_qa";

// สร้างการเชื่อมต่อ
$conn = mysqli_connect($servername, $username, $password, $dbname);

$sql="DELETE FROM course WHERE course_id=$course_id";
$conn->query($sql) ;
}
header("location:http://localhost/connectform/adminpage/addcourse/index_course.php");
exit;
?>