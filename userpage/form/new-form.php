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
$course_code = $course_name = $credits = $groups = "";
$A = $B_plus = $B = $C_plus = $C = $D_plus = $D = $E = $F = $F_percent = "";
$I = $VG = $G = $S = $W = $W_percent = $total = $instructor = "";
$errMessage = $successMessage =$curriculum ="";

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    // รับค่าจากฟอร์มและกำหนดให้กับตัวแปร
    $curriculum = $_POST["curriculum"] ?? "";
    $course_code = $_POST["course_code"] ?? "";
    $course_name = $_POST["course_name"] ?? "";
    $credits = $_POST["credits"] ?? "";
    $groups = $_POST["groups"] ?? "";
    $A = $_POST["A"] ?? "";
    $B_plus = $_POST["B_plus"] ?? "";
    $B = $_POST["B"] ?? "";
    $C_plus = $_POST["C_plus"] ?? "";
    $C = $_POST["C"] ?? "";
    $D_plus = $_POST["D_plus"] ?? "";
    $D = $_POST["D"] ?? "";
    $E = $_POST["E"] ?? "";
    $F = $_POST["F"] ?? "";
    $F_percent = $_POST["F_percent"] ?? "";
    $I = $_POST["I"] ?? "";
    $VG = $_POST["VG"] ?? "";
    $G = $_POST["G"] ?? "";
    $S = $_POST["S"] ?? "";
    $W = $_POST["W"] ?? "";
    $W_percent = $_POST["W_percent"] ?? "";
    $total = $_POST["total"] ?? "";
    $instructor = $_POST["instructor"] ?? "";

    // ตรวจสอบว่าฟิลด์จำเป็นถูกกรอกครบ
    if (
        empty($course_code) || empty($course_name) || empty($credits) || empty($groups) || empty($instructor)
        || empty($curriculum)

    ) {
        $errMessage = "All the required fields are required.";
    } else {
        // เตรียม query
        $sql = $conn->prepare("INSERT INTO create_form 
        (`curriculum`,`course_code`, `course_name`, `credits`, `groups`, `A`, `B_plus`, `B`, `C_plus`, `C`, `D_plus`, `D`, `E`, `F`,
         `F_percent`, `I`, `W`, `W_percent`, `VG`, `G`, `S`, `total`, `instructor`) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)");

        if (!$sql) {
            $errMessage = "Error preparing query: " . $conn->error;
        } else {
            // Bind parameters
            $sql->bind_param("sssssssssssssssssssssss", $curriculum, $course_code, $course_name, $credits, $groups, $A, $B_plus, $B, $C_plus, $C, $D_plus, $D, $E, $F, $F_percent, $I, $W, $W_percent, $VG, $G, $S, $total, $instructor);

            // Execute the statement
            if ($sql->execute()) {
                $successMessage = "Form insert successfully.";
                header("Location:http://localhost/connectform/userpage/form/index-form.php");
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
    <script>
        function calculateTotal() {
            // รับค่าจากอินพุตและแปลงเป็นตัวเลข
            var A = parseFloat(document.querySelector('input[name="A"]').value) || 0;
            var B_plus = parseFloat(document.querySelector('input[name="B_plus"]').value) || 0;
            var B = parseFloat(document.querySelector('input[name="B"]').value) || 0;
            var C_plus = parseFloat(document.querySelector('input[name="C_plus"]').value) || 0;
            var C = parseFloat(document.querySelector('input[name="C"]').value) || 0;
            var D_plus = parseFloat(document.querySelector('input[name="D_plus"]').value) || 0;
            var D = parseFloat(document.querySelector('input[name="D"]').value) || 0;
            var E = parseFloat(document.querySelector('input[name="E"]').value) || 0;
            var F = parseFloat(document.querySelector('input[name="F"]').value) || 0;
            var F_percent = parseFloat(document.querySelector('input[name="F_percent"]').value) || 0;
            var I = parseFloat(document.querySelector('input[name="I"]').value) || 0;
            var VG = parseFloat(document.querySelector('input[name="VG"]').value) || 0;
            var G = parseFloat(document.querySelector('input[name="G"]').value) || 0;
            var S = parseFloat(document.querySelector('input[name="S"]').value) || 0;
            var W = parseFloat(document.querySelector('input[name="W"]').value) || 0;
            var W_percent = parseFloat(document.querySelector('input[name="W_percent"]').value) || 0;

            // คำนวณผลรวม
            var total = A + B_plus + B + C_plus + C + D_plus + D + E + F + F_percent + I + VG + G + S + W + W_percent;

            // แสดงผลรวมในฟิลด์ total
            document.querySelector('input[name="total"]').value = total;
        }

        function clearForm() {
            document.querySelector('form').reset();
        }
    </script>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="form-container">
            <h2 class="text-center mb-4">New Form</h2>
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
                    <label class="col-sm-3 col-form-label">Curriculum</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="curriculum" value="<?php echo htmlspecialchars($curriculum); ?>" style="width: 400px;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Course Code</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="course_code" value="<?php echo htmlspecialchars($course_code); ?>" style="width: 400px;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Course Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="course_name" value="<?php echo htmlspecialchars($course_name); ?>" style="width: 400px;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Credits</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="credits" value="<?php echo htmlspecialchars($credits); ?>" style="width: 400px;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Groups</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="groups" value="<?php echo htmlspecialchars($groups); ?>" style="width: 400px;">
                    </div>
                </div>
                <!-- เพิ่มฟิลด์ข้อมูลตามที่คุณต้องการ -->
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">A</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="A" value="<?php echo htmlspecialchars($A); ?>" style="width: 400px;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">B+</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="B_plus" value="<?php echo htmlspecialchars($B_plus); ?>" style="width: 400px;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">B</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="B" value="<?php echo htmlspecialchars($B); ?>" style="width: 400px;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">C+</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="C_plus" value="<?php echo htmlspecialchars($C_plus); ?>" style="width: 400px;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">C</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="C" value="<?php echo htmlspecialchars($C); ?>" style="width: 400px;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">D+</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="D_plus" value="<?php echo htmlspecialchars($D_plus); ?>" style="width: 400px;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">D</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="D" value="<?php echo htmlspecialchars($D); ?>" style="width: 400px;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">E</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="E" value="<?php echo htmlspecialchars($E); ?>" style="width: 400px;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">F</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="F" value="<?php echo htmlspecialchars($F); ?>" style="width: 400px;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">F%</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="F_percent" value="<?php echo htmlspecialchars($F_percent); ?>" style="width: 400px;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">I</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="I" value="<?php echo htmlspecialchars($I); ?>" style="width: 400px;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">VG</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="VG" value="<?php echo htmlspecialchars($VG); ?>" style="width: 400px;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">G</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="G" value="<?php echo htmlspecialchars($G); ?>" style="width: 400px;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">S</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="S" value="<?php echo htmlspecialchars($S); ?>" style="width: 400px;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">W</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="W" value="<?php echo htmlspecialchars($W); ?>" style="width: 400px;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">W%</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="W_percent" value="<?php echo htmlspecialchars($W_percent); ?>" style="width: 400px;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Total</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="total" value="<?php echo htmlspecialchars($total); ?>" readonly style="width: 400px;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Instructor</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="instructor" value="<?php echo htmlspecialchars($instructor); ?>" style="width: 400px;">
                    </div>
                </div>
                <style>
                     .btn-psrimary-cancel {
                    margin-top: 15px;
                    
                    border: none;
                    color: white;
                    padding: 5px 15px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 14px;
                    margin: 10px 2px;
                    /*ปรับตำเเหน่งปุ่ม*/
                    cursor: pointer;
                    background-color: #fff;
                    color: black;
                    border: 1px solid #6633FF;
                    margin-bottom: 1rem;
                }

                .btn-psrimary-cancel:hover {
                    background-color: #6633CC;
                    /* เปลี่ยนสีพื้นหลังเมื่อชี้ */
                    color: white;
                    /* เปลี่ยนสีตัวอักษรเมื่อชี้ */
                }
                </style>
                <?php
                if (!empty($successMessage)) {
                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>$successMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                }
                ?>
                <div class="text-center">
                    
                    <button type="button" class="btn btn-primary" onclick="calculateTotal()">Calculate Total</button>
                    <button type="submit" class="btn btn-success">Save</button>
                    <a class="btn btn-psrimary-cancel" href="http://localhost/connectform/userpage/form/index-form.php">Cancel</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>