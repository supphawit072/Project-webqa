<?php
session_start(); // เริ่ม session

// การเชื่อมต่อกับฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "app_qa";

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // เตรียมคำสั่ง SQL เพื่อตรวจสอบข้อมูลผู้ใช้
    $stmt = $conn->prepare("SELECT username, password, role FROM user WHERE username = ? LIMIT 1");
    $stmt->bind_param("s", $input_username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // ตรวจสอบรหัสผ่าน
        if ($input_password == $row['password']) {
            // เก็บข้อมูลผู้ใช้ใน session
            $_SESSION['username'] = $input_username;
            $_SESSION['role'] = $row['role'];

            // เปลี่ยนเส้นทางไปยังหน้าเว็บตามบทบาท
            if ($row['role'] == 'admin') {
                header("Location: http://localhost/connectform/homepage.php");
            } elseif ($row['role'] == 'user') {
                header("Location: http://localhost/connectform/userpage/home-page.php");
            }
            exit(); // หยุดการทำงานของสคริปต์หลังจากเปลี่ยนเส้นทาง
        } else {
            echo "<script>alert('Username or Password is incorrect!');</script>";
        }
    } else {
        echo "<script>alert('Username or Password is incorrect!');</script>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            background: linear-gradient(to right, #ffee58, #ffa000);
        }
        .login-box {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 350px;
        }
        .login-box h2 {
            color: #f39c12;
            text-align: center;
        }
        .login-box input[type="text"],
        .login-box input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-box input[type="submit"] {
            width: 50%;
            padding: 10px;
            background-color: #f39c12;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin: 0 auto;
        }
        .login-box input[type="submit"]:hover {
            background-color: #ffee58;
            color: #000;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-box">
            <h2>Welcome Back</h2>
            <form action="" method="post">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="submit" value="Log in">
            </form>
        </div>
    </div>
</body>
</html>
