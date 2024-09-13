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

$user_id = "";
$username = $password = $name = $role = "";
$errMessage = $successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["user_id"])) {
        header("location: http://localhost/connectform/adminpage/adduser/index-user.php");
        exit;
    }
    $user_id = $_GET["user_id"];
    $sql = "SELECT * FROM user WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    if (!$row) {
        header("location: http://localhost/connectform/adminpage/adduser/index-user.php");
        exit;
    }
    $username = $row["username"];
    $password = $row["password"];
    $name = $row["name"];
    $role = $row["role"];
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST["user_id"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $role = $_POST["role"];

    if (empty($username) || empty($password) || empty($name) || empty($role)) {
        $errMessage = "All the required fields are required.";
    } else {
        $sql = $conn->prepare("UPDATE user 
        SET username = ?, 
            password = ?, 
            name = ?, 
            role = ? 
        WHERE user_id = ?");
    
        // Bind parameters to the SQL statement
        if (!$sql) {
            die("Prepare failed: " . $conn->error);
        }

        $sql->bind_param("ssssi", $username, $password, $name, $role, $user_id);
    
        // Execute the prepared statement
        if ($sql->execute()) {
            $successMessage = "User updated successfully.";
            mysqli_close($conn); // ปิดการเชื่อมต่อก่อนการรีไดเรกต์
            header("Location: http://localhost/connectform/adminpage/adduser/index-user.php");
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
    <title>Edit User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* คุณสามารถเพิ่ม CSS เพิ่มเติมที่นี่ */
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="form-container">
            <h2 class="text-center mb-4">Edit User</h2>
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
                <input type="hideden" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>" style="margin-bottom: 20px;background-color: #A9A9A9;">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Username</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="username" value="<?php echo htmlspecialchars($username); ?>" style="width: 400px;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="password" value="<?php echo htmlspecialchars($password); ?>" style="width: 400px;">
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
                    <a class="btn btn-primary" href="http://localhost/connectform/adminpage/adduser/index-user.php">Cancel</a>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
