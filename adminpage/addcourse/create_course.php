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

// กำหนดตัวแปรให้เป็นค่าว่างเริ่มต้น
$coursecode = $coursename = $credits = $groups = "";
$instructor = "";
$receives = "";
$errMessage = $successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    // รับค่าจากฟอร์มและกำหนดให้กับตัวแปร
    $coursecode = $_POST["coursecode"] ?? "";
    $coursename = $_POST["coursename"] ?? "";
    $credits = $_POST["credits"] ?? "";
    $groups = $_POST["groups"] ?? "";
    $receives = $_POST["receives"] ?? "";
    $instructor = $_POST["instructor"] ?? "";

    // ตรวจสอบว่าฟิลด์จำเป็นถูกกรอกครบ
    if (
        empty($coursecode) || empty($coursename) || empty($credits) || empty($groups) || empty($instructor)
    ) {
        $errMessage = "All the required fields are required.";
    } else {
        // เตรียม query
        $sql = $conn->prepare("INSERT INTO course
        (`coursecode`, `coursename`, `credits`, `instructor`, `groups`, `receives`) 
        VALUES (?, ?, ?, ?, ?, ?)");

        if (!$sql) {
            $errMessage = "Error preparing query: " . $conn->error;
        } else {
            // Bind parameters
            $sql->bind_param("ssssss", $coursecode, $coursename, $credits, $instructor, $groups, $receives);

            // Execute the statement
            if ($sql->execute()) {
                $successMessage = "Form inserted successfully.";
                header("Location: http://localhost/connectform/adminpage/addcourse/index_course.php");
                exit;
            } else {
                $errMessage = "Invalid query: " . $sql->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* คุณสามารถเพิ่ม CSS เพิ่มเติมที่นี่ */
    </style>

</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="form-container">
            <h2 class="text-center mb-4">New Course</h2>
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
                <!-- เพิ่มฟิลด์ข้อมูลตามที่คุณต้องการ -->
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
                    <a class="btn btn-primary" href="http://localhost/connectform/adminpage/addcourse/index_course.php">Cancel</a>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
