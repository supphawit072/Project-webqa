<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "app_qa";

// สร้างการเชื่อมต่อ
$conn = mysqli_connect($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$course_id = "";
$coursecode = $coursename = $credits = $groups = "";
$instructor = "";
$receives = "";
$errMessage = $successMessage = "";

// เช็กว่ามาจาก GET หรือ POST
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["course_id"])) {
        // ถ้าไม่มี course_id ให้กลับไปยังหน้า index
        header("location: http://localhost/connectform/adminpage/addcourse/index_course.php");
        exit;
    }
    
    // รับค่า course_id จาก URL
    $course_id = $_GET["course_id"];
    
    // ใช้ค่า course_id เพื่อดึงข้อมูลจากฐานข้อมูลและแสดงในฟอร์มแก้ไข
    $sql = "SELECT * FROM course WHERE course_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    
    if (!$row) {
        // ถ้าไม่พบข้อมูล ให้กลับไปยังหน้า index
        header("location: http://localhost/connectform/adminpage/addcourse/index_course.php");
        exit;
    }
    
    // กำหนดค่าต่าง ๆ ที่จะใช้ในฟอร์มแก้ไข
    $coursecode = $row["coursecode"];
    $coursename = $row["coursename"];
    $credits = $row["credits"];
    $groups = $row["groups"];
    $instructor = $row["instructor"];
    $receives = $row["receives"];
}
 else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // รับค่าจากฟอร์มผ่าน POST
    $course_id = $_POST["course_id"];
    $coursecode = $_POST["coursecode"];
    $coursename = $_POST["coursename"];
    $credits = $_POST["credits"];
    $groups = $_POST["groups"];
    $instructor = $_POST["instructor"];
    $receives = $_POST["receives"];

    // ตรวจสอบว่าฟิลด์ทั้งหมดไม่ว่าง
    if (empty($coursecode) || empty($coursename) || empty($credits) || empty($groups) || empty($instructor) || empty($receives)) {
        $errMessage = "All the required fields are required.";
    } else {
        // SQL สำหรับการอัปเดตข้อมูลในตาราง course
        $sql = $conn->prepare("UPDATE course 
            SET coursecode = ?, 
                coursename = ?, 
                credits = ?, 
                groups = ?, 
                instructor = ?, 
                receives = ?
            WHERE course_id = ?");
    
        // Bind parameters ให้ตรงกับ SQL
        $sql->bind_param(
            "ssssssi",
            $coursecode,
            $coursename,
            $credits,
            $groups,
            $instructor,
            $receives,
            $course_id
        );
    
        // Execute คำสั่ง SQL
        if ($sql->execute()) {
            $successMessage = "Course updated successfully.";
            header("Location: http://localhost/connectform/adminpage/addcourse/index_course.php"); // กลับไปยังหน้า index_course.php หลังจากอัปเดตสำเร็จ
            exit;
        } else {
            $errMessage = "Error updating record: " . $sql->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="form-container">
            <h2 class="text-center mb-4">Edit Course</h2>

            <?php
            if (!empty($errMessage)) {
                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }

            if (!empty($successMessage)) {
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>$successMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }
            ?>

            <form method="post">
                <input type="hideden" name="course_id" value="<?php echo htmlspecialchars($course_id); ?>"style="margin-bottom: 20px;background-color: #A9A9A9;">

                <!-- ฟิลด์ข้อมูล -->
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Course Code</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="coursecode" value="<?php echo htmlspecialchars($coursecode); ?>" style="width: 400px;">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Course Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="coursename" value="<?php echo htmlspecialchars($coursename); ?>" style="width: 400px;">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Credits</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="credits" value="<?php echo htmlspecialchars($credits); ?>" style="width: 400px;">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Instructor</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="instructor" value="<?php echo htmlspecialchars($instructor); ?>" style="width: 400px;">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Groups</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="groups" value="<?php echo htmlspecialchars($groups); ?>" style="width: 400px;">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Receives</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="receives" value="<?php echo htmlspecialchars($receives); ?>" style="width: 400px;">
                    </div>
                </div>

                <div class="text-center">
                    <a href="http://localhost/connectform/adminpage/addcourse/index_course.php" class="btn btn-primary">Cancel</a>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
