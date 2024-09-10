<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <style>
        .body-index {
            background-color: #000;
            color: #fff;
            border-radius: 25px;
        }

        .table {
            background-color: #333;
            color: #fff;
            border-radius: 10px;
            overflow: hidden;
        }

        .table thead th {
            background-color: #444;
            color: #fff;
        }

        .table tbody tr:nth-child(even) {
            background-color: #222;
        }

        .table tbody tr:nth-child(odd) {
            background-color: #333;
        }


        .table td,
        .table th {
            text-align: center;
            width: auto;
            /* ปล่อยให้คอลัมน์ขยายตามเนื้อหา */
            margin-bottom: 30px;
        }

        .table {
            width: 100%;
            /* กำหนดความกว้างของตารางให้ขยายเต็มพื้นที่ */
            table-layout: fixed;
            /* กระจายพื้นที่คอลัมน์แบบคงที่ */
        }

        .btn-primary {
            margin-bottom: 15px;
        }

        .btn-danger {
            margin-bottom: 15px;
        }

        .btn-custom-height {
            padding: 10px 16px;
            font-size: 16px;
        }

        .btn-custom-edit {
            margin-right: 10px;
            padding: 10px 16px;
            font-size: 16px;
        }

        .table td,
        .table th {
            text-align: center;
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
            margin-top: 2rem;


        }

        li.nav-item {
            /*ปรับตัวอักษรเเถบเมนู */
            font-family: 'Courier New', Courier, monospace;
            font-weight: bold;
            margin-top: auto;
        }

        .form-control {
            /* ปรับเเต่งช่องค้นหา */
            /* border-radius: 10px; */
            /* ขอบมลของช่องค้นหา */
            /* width: 400px; */
            /* margin-left: auto;  */
            margin-right: 1rem;
            /*ปรับระยะห่างระหว่างช่องค้นหากับปุ่มค้นหา */
        }



        .navbar-nav {
            margin-left: auto;
        }

        .ms-auto {
            margin-left: auto;
            margin-right: 1rem;
            /* ระยะห่างจากขอบขวา */
        }
    </style>
</head>

<body class="body-index">
    <?php
    $current_page = basename($_SERVER['PHP_SELF']);
    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="http://localhost/connectform/homepage.php">AppQa</a>
            ก
            <ul class="navbar-nav ms-auto">
                <li class="nav-item <?php echo $current_page == 'homepage.php' ? 'active' : ''; ?>">
                    <a class="nav-link" href="http://localhost/connectform/homepage.php">Home</a>
                </li>
                <li class="nav-item <?php echo $current_page == 'index-user.php' ? 'active' : ''; ?>">
                    <a class="nav-link" href="http://localhost/connectform/adminpage/adduser/index-user.php">AddUser</a>
                </li>
                <li class="nav-item <?php echo $current_page == 'index_course.php' ? 'active' : ''; ?>">
                    <a class="nav-link" href="http://localhost/connectform/adminpage/addcourse/index_course.php">AddCourse</a>
                </li>
                <li class="nav-item <?php echo $current_page == 'index.php' ? 'active' : ''; ?>">
                    <a class="nav-link" href="http://localhost/connectform/adminpage/addform/index.php">AddForm</a>
                </li>
                <div class="login-button">
                    <a class="btn btn-primary" href="http://localhost/connectform/login.php" role="button" style="color: #fff;">Login</a>
                </div>
            </ul>
        </div>
    </nav>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Search User</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <style>
            .modal-body {
                color: #000;
                /* เปลี่ยนสีตัวอักษรใน modal-body เป็นสีดำ */
            }

            .modal-footer {
                color: #000;
                /* เปลี่ยนสีตัวอักษรใน modal-footer เป็นสีดำ */
            }
        </style>
    </head>

    <body>

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Search User</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
            <style>
                .modal-body {
                    color: #000;
                    /* เปลี่ยนสีตัวอักษรใน modal-body เป็นสีดำ */
                }

                .modal-footer {
                    color: #000;
                    /* เปลี่ยนสีตัวอักษรใน modal-footer เป็นสีดำ */
                }

                .input-group {
                    /* ขยับไปทางขวา */
                    /* justify-content: flex-end;  */
                    margin-left: auto;
                    margin-right: 1rem;
                    /* ระยะห่างจากขอบขวา */


                }
            </style>
        </head>

        <style>
            .modal-body {
                color: #000;
                /* เปลี่ยนสีตัวอักษรใน modal-body เป็นสีดำ */
            }

            .modal-footer {
                color: #000;
                /* เปลี่ยนสีตัวอักษรใน modal-footer เป็นสีดำ */
            }

            .input-group {
                margin-left: auto;
                margin-right: 1rem;
                width: 450px;
                /* ปรับความยาวของช่องค้นหา */

            }
        </style>
        </head>

        <body>
            <!-- ค้นหา -->
            <div class="container mt-4">
                <form action="" method="GET">
                    <div class="input-group mb-3">
                        <input id="searchInput" type="text" name="search" required value="<?php if (isset($_GET['search'])) {
                                                                                                echo htmlspecialchars($_GET['search']);
                                                                                            } ?>" class="form-control" placeholder="Search by User ID">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>

                <!-- Modal -->
                <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="userModalLabel">User Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Content will be inserted here by PHP -->
                                <?php
                                $con = mysqli_connect("localhost", "root", "", "app_qa");

                                if (isset($_GET['search']) && !empty($_GET['search'])) {
                                    $filtervalues = mysqli_real_escape_string($con, $_GET['search']);
                                    $query = "SELECT * FROM user WHERE user_id = '$filtervalues'";
                                    $query_run = mysqli_query($con, $query);

                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $items) {
                                            echo '<div class="mb-3"><strong>User ID:</strong> ' . htmlspecialchars($items['user_id']) . '</div>';
                                            echo '<div class="mb-3"><strong>Username:</strong> ' . htmlspecialchars($items['username']) . '</div>';
                                            echo '<div class="mb-3"><strong>Password:</strong> ' . htmlspecialchars($items['password']) . '</div>';
                                            echo '<div class="mb-3"><strong>Name:</strong> ' . htmlspecialchars($items['name']) . '</div>';
                                            echo '<div class="mb-3"><strong>Role:</strong> ' . htmlspecialchars($items['role']) . '</div>';
                                        }
                                    } else {
                                        echo '<div class="alert alert-warning">No Record Found</div>';
                                    }
                                }

                                mysqli_close($con);
                                ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <!-- ปุ่มแก้ไข -->

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Button to trigger the modal -->
                <?php if (isset($_GET['search']) && !empty($_GET['search'])): ?>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var userModal = new bootstrap.Modal(document.getElementById('userModal'), {
                                keyboard: false
                            });
                            userModal.show();

                            // เคลียร์ช่องค้นหาหลังจากปิด modal
                            var modalElement = document.getElementById('userModal');
                            modalElement.addEventListener('hidden.bs.modal', function() {
                                document.getElementById('searchInput').value = '';
                            });
                        });

                        function editUser(userId) {
                            // ส่งผู้ใช้ไปยังหน้าฟอร์มแก้ไขพร้อมกับ user_id ที่ส่งมาจากปุ่มแก้ไข
                            window.location.href = 'edit_user.php?user_id=' + userId;
                        }
                    </script>
                <?php endif; ?>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        </body>
        <!-- ค้นหา -->

    </html>

    <div class="container my-5">
        <h2 style="font-family: 'Courier New', Courier, monospace; text-align: center;margin-inline-start: 1rem;">List of User</h2>
        <a class="btn btn-primary" href="http://localhost/connectform/adminpage/adduser/create-accont.php" role="button" style="font-family: 'Courier New', Courier, monospace; font-weight: bold;">Add User</a>
        <br>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>user_id</th>
                        <th>username</th>
                        <th>password</th>
                        <th>name</th>
                        <th>role</th>
                        <th style="text-align: center;">Button</th>
                    </tr>
                </thead>
                <tbody>
                    <?php


                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "app_qa";

                    // Create connection
                    $conn = mysqli_connect($servername, $username, $password, $dbname);

                    // Check connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    // Fetch data from database


                    $sql = "SELECT * FROM user ORDER BY user_id DESC";
                    $result = $conn->query($sql);

                    // Check if there are records
               

                    $sql = "SELECT * FROM user ORDER BY user_id DESC";
                    $result = $conn->query($sql);

                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
            <td>{$row['user_id']}</td>
            <td>{$row['username']}</td>
            <td>{$row['password']}</td>
            <td>{$row['name']}</td>
            <td>{$row['role']}</td>
            <td>
                <a class='btn btn-primary btn-custom-edit' href='edit-accont.php?user_id={$row['user_id']}'>Edit</a>
                <a class='btn btn-danger btn-sm btn-custom-height' href='delete-accont.php?user_id={$row['user_id']}'>Delete</a>
            </td>
        </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No records found</td></tr>";
                    }

                    // Close connection
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>