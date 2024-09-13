<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
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
            width: 450px;
            /*ปรับความยาวของช่างค้นหา */

        }
    </style>
</head>

<body class="body-index">
    <?php
    $current_page = basename($_SERVER['PHP_SELF']);
    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="http://localhost/connectform/userpage/home-page.php">APPQA</a>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item <?php echo $current_page == 'homepage.php' ? 'active' : ''; ?>">
                    <a class="nav-link" href="http://localhost/connectform/userpage/home-page.php">Home</a>
                </li>
                <li class="nav-item <?php echo $current_page == 'index.php' ? 'active' : ''; ?>">
                    <a class="nav-link" href="http://localhost/connectform/userpage/form/index-form.php">AddForm</a>
                </li>
                <div class="login-button">
                    <a class="btn btn-primary" href="http://localhost/connectform/loginpage/login-page.php" role="button" style="color: #fff;">Login</a>
                </div>
            </ul>

        </div>

    </nav>
    <style>
        .modal-content {
            background-color: #ffffff;
            /* พื้นหลังสีขาว */
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
                    <input id="searchInput" type="text" name="search" required value="<?php if (isset($_GET['search'])) {
                                                                                            echo htmlspecialchars($_GET['search']);
                                                                                        } ?>" class="form-control" placeholder="Search by Form ID">
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
                    document.addEventListener('DOMContentLoaded', function() {
                        var formModal = new bootstrap.Modal(document.getElementById('formModal'), {
                            keyboard: false
                        });
                        formModal.show();

                        // เคลียร์ช่องค้นหาหลังจากปิด modal
                        var modalElement = document.getElementById('formModal');
                        modalElement.addEventListener('hidden.bs.modal', function() {
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
    <style>
        .body-index {
            background-color: #000;
            /* ตั้งค่าสีพื้นหลังของร่างกายหน้าเว็บเป็นสีดำ */
            color: #fff;
            /* ตั้งค่าสีข้อความเป็นสีขาว */
            border-radius: 25px;
            /* ตั้งค่าให้มีมุมโค้งมนที่ 25px */
        }

        .container {
            width: calc(100% - 20px);
            /* กำหนดความกว้างของคอนเทนเนอร์โดยหักขอบ 10px ซ้ายและขวา */
            max-width: 2200px;
            /* กำหนดความกว้างสูงสุดของคอนเทนเนอร์ */
            margin: 0 auto;
            /* ศูนย์กลางคอนเทนเนอร์ในหน้าจอ */
            padding: 10px;
            /* เพิ่ม padding รอบๆ คอนเทนเนอร์เพื่อเว้นขอบจากหน้าจอ */
            box-sizing: border-box;
            /* รวม padding และ border เข้ากับความกว้างที่กำหนด */
        }

        .table-container {
            width: 100%;
            /* ทำให้คอนเทนเนอร์ของตารางขยายเต็มความกว้างของคอนเทนเนอร์แม่ */
            overflow-x: auto;
            /* เพิ่ม scroll bar แนวนอนถ้าตารางกว้างกว่าคอนเทนเนอร์ */
            padding: 10px;
            /* เพิ่ม padding รอบๆ คอนเทนเนอร์ของตารางเพื่อเว้นขอบ */
        }

        .table {
            background-color: #333;
            /* ตั้งค่าสีพื้นหลังของตารางเป็นสีเทาเข้ม */
            color: #fff;
            /* ตั้งค่าสีข้อความของตารางเป็นสีขาว */
            overflow: hidden;
            /* ซ่อน overflow ที่เกิดขึ้นในตาราง */
            width: 100%;
            /* ทำให้ตารางขยายเต็มความกว้างของคอนเทนเนอร์ */
            table-layout: auto;
            /* กระจายพื้นที่คอลัมน์แบบคงที่เพื่อให้คอลัมน์ไม่ขยายตามเนื้อหามากเกินไป */
        }

        .table thead th {
            background-color: #444;
            /* ตั้งค่าสีพื้นหลังของหัวตารางเป็นสีเทาเข้ม */
            color: #fff;
            /* ตั้งค่าสีข้อความของหัวตารางเป็นสีขาว */
        }

        .table tbody tr:nth-child(even) {
            background-color: #222;
            /* ตั้งค่าสีพื้นหลังของแถวที่เป็นเลขคู่เป็นสีเทาเข้ม */
        }

        .table tbody tr:nth-child(odd) {
            background-color: #333;
            /* ตั้งค่าสีพื้นหลังของแถวที่เป็นเลขคี่เป็นสีเทาเข้มกว่าแถวคู่ */
        }

        .table td,
        .table th {
            text-align: center;
            /* ตั้งค่าการจัดตำแหน่งข้อความในตารางให้อยู่ตรงกลาง */
            width: auto;
            /* ปล่อยให้คอลัมน์ขยายตามเนื้อหา */
        }

        .btn-primary {
            margin-bottom: 15px;
            /* ตั้งค่าระยะห่างด้านล่างของปุ่ม */
            margin-left: 1rem;
        }

        .btn-danger {
            /* ปุ่มลบ */
            margin-bottom: 15px;
            background-color: #04AA6D;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            background-color: white;
            color: black;
            border: 2px solid #f44336;
            margin-bottom: 1rem;
        }

        .btn-custom-height {
            padding: 10px 16px;
            /* ตั้งค่า padding ของปุ่มเพื่อให้ความสูงเหมาะสม */
            font-size: 16px;
            /* ตั้งค่าขนาดตัวอักษรของข้อความในปุ่ม */
        }

        .btn-custom-edit {
            margin-right: 10px;
            /* ตั้งค่าระยะห่างด้านขวาของปุ่ม */
            padding: 10px 16px;
            /* เพิ่ม padding รอบๆ ข้อความในปุ่ม */
            font-size: 16px;
            /* ตั้งค่าขนาดตัวอักษรของข้อความในปุ่ม */
        }

        .navbar {
            margin-bottom: 30px;
            /* ตั้งค่าระยะห่างด้านล่างของแถบเมนู */
            border-bottom: 1px solid #ddd;
            /* เพิ่มเส้นขอบด้านล่างของแถบเมนู */
        }

        .navbar-brand {
            font-family: 'Courier New', Courier, monospace;
            /* ตั้งค่าฟอนต์ของชื่อแบรนด์ */
            font-weight: bold;
            /* ตั้งค่าความหนาของตัวอักษรเป็นตัวหนา */
        }

        .navbar-nav {
            margin-left: auto;
            /* ขยับแถบเมนูไปทางขวา */
        }

        .navbar-nav a {
            color: #333;
            /* ตั้งค่าสีข้อความของลิงก์ในเมนูเป็นสีเทาเข้ม */
            font-weight: bold;
            /* ตั้งค่าความหนาของตัวอักษรเป็นตัวหนา */
        }

        .navbar-nav a:hover {
            color: #007bff;
            /* เปลี่ยนสีข้อความของลิงก์เมื่อเอาเมาส์ไปชี้เป็นสีน้ำเงิน */
            font-size: 20px;
            /* ขยายขนาดตัวอักษรเมื่อเอาเมาส์ไปชี้ */
        }

        .navbar-nav .nav-item.active .nav-link {
            color: #007bff;
            /* เปลี่ยนสีข้อความของลิงก์ที่เป็นสถานะ active เป็นสีน้ำเงิน */
            font-weight: bold;
            /* ตั้งค่าความหนาของตัวอักษรเป็นตัวหนา */
        }

        .login-button {
            margin-left: 1rem;
            /* ตั้งค่าระยะห่างด้านซ้ายของปุ่มเข้าสู่ระบบ */
            margin-top: 2rem;
            /* ตั้งค่าระยะห่างด้านบนของปุ่มเข้าสู่ระบบ */
        }

        li.nav-item {
            font-family: 'Courier New', Courier, monospace;
            /* ตั้งค่าฟอนต์ของรายการเมนู */
            font-weight: bold;
            /* ตั้งค่าความหนาของตัวอักษรเป็นตัวหนา */
            margin-top: auto;
            /* ปรับระยะห่างด้านบนของรายการเมนู */
        }

        .form-control {
            margin-left: auto;
            /* ขยับช่องค้นหาไปทางขวา */
            margin-right: 1rem;
            /* ตั้งค่าระยะห่างด้านขวาของช่องค้นหา */
        }

        .btn-download {
            margin-top: 15px;
            border: none;
            color: black;
            /* สีตัวอักษรปกติ */
            padding: 5px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 10px 2px;
            /* ปรับตำแหน่งปุ่ม */
            cursor: pointer;
            background-color: #fff;
            /* สีพื้นหลังปกติ */
            border: 1px solid #00FF00;
            /* สีกรอบปุ่ม */
            margin-bottom: 1rem;
        }

        .btn-download:hover {
            background-color: #008000;
            /* สีพื้นหลังเมื่อชี้เมาส์ */
            color: white;
            /* สีตัวอักษรเมื่อชี้เมาส์ */
        }
    </style>
    <div class="container my-5">
        <h2 style="font-family: 'Courier New', Courier, monospace; text-align: center;">List of Forms</h2>
        <a class="btn btn-primary" href="http://localhost/connectform/userpage/form/new-form.php" role="button" style="font-family: 'Courier New', Courier, monospace; font-weight: bold;">Add New</a>
        <br>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>

                        <th>form_id</th>
                        <th>curriculum</th>
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
                                <td>{$row['curriculum']}</td>
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
                                    <a class='btn btn-primary btn-custom-edit' href='http://localhost/connectform/userpage/form/editform.php?form_id={$row['form_id']}'>Edit</a>
                                    <a class='btn btn-danger btn-sm btn-custom-height' href='http://localhost/connectform/userpage/form/deleteform.php?form_id={$row['form_id']}'>Delete</a>
                                    <a class='btn btn-download' href='http://localhost/connectform/excel.php'>Download Excel</a>

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