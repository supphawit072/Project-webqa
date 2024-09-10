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
$username = $password = $name = $role = "";
$errMessage = $successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    // รับค่าจากฟอร์มและกำหนดให้กับตัวแปร
    $username = $_POST["username"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $role = $_POST["role"];

    // ตรวจสอบว่าฟิลด์จำเป็นถูกกรอกครบ
    if (empty($username) || empty($password) || empty($name) || empty($role)) {
        $errMessage = "All the required fields are required.";
    } else {
        // เตรียม query
        $sql = $conn->prepare("INSERT INTO user (`username`, `password`, `name`, `role`) VALUES (?, ?, ?, ?)");

        if (!$sql) {
            $errMessage = "Error preparing query: " . $conn->error;
        } else {
            // Bind parameters
            $sql->bind_param("ssss", $username, $password, $name, $role);

            // Execute the statement
            if ($sql->execute()) {
                $successMessage = "Form insert successfully.";
                header("Location: http://localhost/connectform/adminpage/adduser/index-user.php");
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
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="form-container">
            <h2 class="text-center mb-4">New User</h2>
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
                    <label class="col-sm-3 col-form-label">Username</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="username" value="<?php echo htmlspecialchars($username); ?>" style="width: 400px;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="password" value="<?php echo htmlspecialchars($password); ?>" style="width: 400px;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($name); ?>" style="width: 400px;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Role</label>
                    <div class="col-sm-9">
                        <select class="form-select" name="role" style="width: 400px;">
                            <option value="user" <?php echo ($role == 'user') ? 'selected' : ''; ?>>User</option>
                            <option value="admin" <?php echo ($role == 'admin') ? 'selected' : ''; ?>>Admin</option>
                        </select>
                    </div>
                </div>
                
                <div class="text-center">
                    <a href="http://localhost/connectform/adminpage/adduser/index-user.php" class="btn btn-primary">Cancel</a>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
