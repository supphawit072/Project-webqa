<?php
// นำเข้าฟังก์ชันตรวจสอบการล็อกอิน
require_once '../loginpage/check_login.php'; // หนึ่งระดับสูงขึ้น

check_login(); // ตรวจสอบการล็อกอิน
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage-User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f4f4;
            color: #333;
        }

        .navbar {
            margin-bottom: 30px;
            border-bottom: 1px solid #ddd;
        }

        .navbar-brand {
            font-family: 'Courier New', Courier, monospace;
            font-weight: bold;
        }

        .navbar-nav {
            margin-left: auto;
        }

        .navbar-nav a {
            color: #333;
            font-weight: bold;
        }

        .navbar-nav a:hover {
            /* ปรับเเถบเมนูเมื่อเอาเมาส์ไปชี้ */
            color: #007bff;
            font-size: 20px;
        }

        .navbar-nav .nav-item.active .nav-link {
            color: #007bff;
            font-weight: bold;
        }

        .login-button {
            /*ปรับตำเเหน่งปุ่มLogin */
            margin-left: 1rem;
            margin-top: 4rem;
        }

        .image-container {
            text-align: center;
            margin-top: 30px;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        li.nav-item {
            /*ปรับตัวอักษรเเถบเมนู */
            font-family: 'Courier New', Courier, monospace;
            font-weight: bold;
            margin-top: auto;
        }
    </style>
</head>
<body>
    <?php
    $current_page = basename($_SERVER['PHP_SELF']);
    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="http://localhost/connectform/userpage/home-page.php">AppQa</a>
            <div class="login-button">
                <a class="btn btn-primary" href="http://localhost/connectform/loginpage/login-page.php" role="button">Login</a>
            </div>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item <?php echo $current_page == 'home-page.php' ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo !isset($_SESSION['username']) ? 'http://localhost/connectform/loginpage/login-page.php' : 'http://localhost/connectform/userpage/home-page.php'; ?>">Home</a>
                </li>
                <li class="nav-item <?php echo $current_page == 'index-form.php' ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo !isset($_SESSION['username']) ? 'http://localhost/connectform/loginpage/login-page.php' : 'http://localhost/connectform/userpage/form/index-form.php'; ?>">AddForm</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="image-container">
            <img src="http://placekitten.com/1200/600" alt="Sample Image">
            <!-- เปลี่ยน URL ของรูปภาพตามที่คุณต้องการ -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
