<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Form</title>
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

        .table-container {
            margin-top: 30px;
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
            /*สีบอกตำเเหน่งผู้ใช้อยู่หน้าไหน*/
            font-weight: bold;
        }

        .login-button {
            /*ปรับระยะของปุ่ม*/
            margin-left: 1rem;
            margin-top: 4rem;
        }

        li.nav-item {
            /*ปรับตัวอักษรเเถบเมนู */
            font-family: 'Courier New', Courier, monospace;
            font-weight: bold;
            margin-top: auto;
        }

       
        .form-control {  /* ปรับเเต่งช่องค้นหา */
            border-radius: 10px;
            /* ขอบมลของช่องค้นหา */
            width: 400px;
            margin-left: auto;
            margin-right: 1rem
        }

        .btn-outline-primary {/* ปรับเเต่งค้นหาปุ่ม */
            margin-right: 3rem;
            border-radius: 10px;
            /* ขอบมลของปุ่มค้นหา */
            color: #fff;
            /* สีตัวอักษรในปุ่ม */
            
        }
        .modal-body {
            color: #000; /* เปลี่ยนสีตัวอักษรใน modal-body เป็นสีดำ */
        }
        .modal-footer {
            color: #000; /* เปลี่ยนสีตัวอักษรใน modal-footer เป็นสีดำ */
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
    <style>
        .modal-body {
            color: #000; /* เปลี่ยนสีตัวอักษรใน modal-body เป็นสีดำ */
        }
        .modal-footer {
            color: #000; /* เปลี่ยนสีตัวอักษรใน modal-footer เป็นสีดำ */
        }
        .input-group {
            /* ขยับไปทางขวา */
            /* justify-content: flex-end;  */
            margin-left: auto;
            margin-right: 1rem;/* ระยะห่างจากขอบขวา */
            width: 450px;/*ปรับความยาวของช่างค้นหา */
            
        }
    </style>
</head>

<body class="body-index">
    <?php
    $current_page = basename($_SERVER['PHP_SELF']);
    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="http://localhost/connectform/homepage.php">APPQA</a>

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
    <style>
        .modal-content {
            background-color: #ffffff; /* พื้นหลังสีขาว */
        }
    </style>
</head>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Search</title>
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
                <input id="searchInput" type="text" name="search" required value="<?php if (isset($_GET['search'])) { echo htmlspecialchars($_GET['search']); } ?>" class="form-control" placeholder="Search by Form ID">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        <!-- Modal -->
        <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formModalLabel">Form Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Content will be inserted here by PHP -->
                        <?php
                            $con = mysqli_connect("localhost", "root", "", "app_qa");

                            if (isset($_GET['search']) && !empty($_GET['search'])) {
                                $filtervalues = mysqli_real_escape_string($con, $_GET['search']);
                                $query = "SELECT * FROM create_form WHERE form_id = '$filtervalues'";
                                $query_run = mysqli_query($con, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $items) {
                                        echo '<div class="mb-3"><strong>Form ID:</strong> ' . htmlspecialchars($items['form_id']) . '</div>';
                                        echo '<div class="mb-3"><strong>Course Code:</strong> ' . htmlspecialchars($items['course_code']) . '</div>';
                                        echo '<div class="mb-3"><strong>Course Name:</strong> ' . htmlspecialchars($items['course_name']) . '</div>';
                                        echo '<div class="mb-3"><strong>Credits:</strong> ' . htmlspecialchars($items['credits']) . '</div>';
                                        echo '<div class="mb-3"><strong>Groups:</strong> ' . htmlspecialchars($items['groups']) . '</div>';
                                        echo '<div class="mb-3"><strong>A:</strong> ' . htmlspecialchars($items['A']) . '</div>';
                                        echo '<div class="mb-3"><strong>B Plus:</strong> ' . htmlspecialchars($items['B_plus']) . '</div>';
                                        echo '<div class="mb-3"><strong>B:</strong> ' . htmlspecialchars($items['B']) . '</div>';
                                        echo '<div class="mb-3"><strong>C Plus:</strong> ' . htmlspecialchars($items['C_plus']) . '</div>';
                                        echo '<div class="mb-3"><strong>C:</strong> ' . htmlspecialchars($items['C']) . '</div>';
                                        echo '<div class="mb-3"><strong>D Plus:</strong> ' . htmlspecialchars($items['D_plus']) . '</div>';
                                        echo '<div class="mb-3"><strong>D:</strong> ' . htmlspecialchars($items['D']) . '</div>';
                                        echo '<div class="mb-3"><strong>E:</strong> ' . htmlspecialchars($items['E']) . '</div>';
                                        echo '<div class="mb-3"><strong>F:</strong> ' . htmlspecialchars($items['F']) . '</div>';
                                        echo '<div class="mb-3"><strong>F Percent:</strong> ' . htmlspecialchars($items['F_percent']) . '</div>';
                                        echo '<div class="mb-3"><strong>I:</strong> ' . htmlspecialchars($items['I']) . '</div>';
                                        echo '<div class="mb-3"><strong>W:</strong> ' . htmlspecialchars($items['W']) . '</div>';
                                        echo '<div class="mb-3"><strong>W Percent:</strong> ' . htmlspecialchars($items['W_percent']) . '</div>';
                                        echo '<div class="mb-3"><strong>VG:</strong> ' . htmlspecialchars($items['VG']) . '</div>';
                                        echo '<div class="mb-3"><strong>G:</strong> ' . htmlspecialchars($items['G']) . '</div>';
                                        echo '<div class="mb-3"><strong>S:</strong> ' . htmlspecialchars($items['S']) . '</div>';
                                        echo '<div class="mb-3"><strong>Total:</strong> ' . htmlspecialchars($items['total']) . '</div>';
                                        echo '<div class="mb-3"><strong>Instructor:</strong> ' . htmlspecialchars($items['instructor']) . '</div>';
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
                    </div>
                </div>
            </div>
        </div>

        <!-- Button to trigger the modal -->
        <?php if (isset($_GET['search']) && !empty($_GET['search'])): ?>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var formModal = new bootstrap.Modal(document.getElementById('formModal'), {
                        keyboard: false
                    });
                    formModal.show();

                    // เคลียร์ช่องค้นหาหลังจากปิด modal
                    var modalElement = document.getElementById('formModal');
                    modalElement.addEventListener('hidden.bs.modal', function () {
                        document.getElementById('searchInput').value = '';
                    });
                });
            </script>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

    <!-- ค้นหา -->
    <div class="container my-5">
        <h2 style="font-family: 'Courier New', Courier, monospace; text-align: center;">List of Forms</h2>
        <a class="btn btn-primary" href="http://localhost/connectform/adminpage/addform/create.php" role="button" style="font-family: 'Courier New', Courier, monospace; font-weight: bold;">Add New</a>
        <br>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>form_id</th>
                        <th>coursecode</th>
                        <th>coursename</th>
                        <th>credits</th>
                        <th>groups</th>
                        <th>A</th>
                        <th>B+</th>
                        <th>B</th>
                        <th>C+</th>
                        <th>C</th>
                        <th>D+</th>
                        <th>D</th>
                        <th>E</th>
                        <th>F</th>
                        <th>F%</th>
                        <th>I</th>
                        <th>W</th>
                        <th>W%</th>
                        <th>VG</th>
                        <th>G</th>
                        <th>S</th>
                        <th>total</th>
                        <th>instructor</th>
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
                    $sql = "SELECT * FROM create_form ORDER BY form_id DESC";
                    $result = $conn->query($sql);

                    // Check if there are records
                    if ($result && $result->num_rows > 0) {
                        // Output data for each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td>{$row['form_id']}</td>
                                <td>{$row['course_code']}</td>
                                <td>{$row['course_name']}</td>
                                <td>{$row['credits']}</td>
                                <td>{$row['groups']}</td>
                                <td>{$row['A']}</td>
                                <td>{$row['B_plus']}</td>
                                <td>{$row['B']}</td>
                                <td>{$row['C_plus']}</td>
                                <td>{$row['C']}</td>
                                <td>{$row['D_plus']}</td>
                                <td>{$row['D']}</td>
                                <td>{$row['E']}</td>
                                <td>{$row['F']}</td>
                                <td>{$row['F_percent']}</td>
                                <td>{$row['I']}</td>
                                <td>{$row['W']}</td>
                                <td>{$row['W_percent']}</td>
                                <td>{$row['VG']}</td>
                                <td>{$row['G']}</td>
                                <td>{$row['S']}</td>
                                <td>{$row['total']}</td>
                                <td>{$row['instructor']}</td>
                                <td>
                                    <a class='btn btn-primary btn-custom-edit' href='http://localhost/connectform/adminpage/addform/edit-form.php?form_id={$row['form_id']}'>Edit</a>
                                    <a class='btn btn-danger btn-sm btn-custom-height' href='http://localhost/connectform/adminpage/addform/delete-form.php?form_id={$row['form_id']}'>Delete</a>
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='24'>No records found</td></tr>";
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