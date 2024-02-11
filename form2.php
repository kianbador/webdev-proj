<?php 
    include 'config/conn.php';

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $stud_no = isset($_SESSION['stud_no']) ? $_SESSION['stud_no'] : '';
    $reason = isset($_SESSION['reason']) ? $_SESSION['reason'] : '';
    

    if(isset($_POST['submit'])){
        $system = $_POST['system'];
        $college = $_POST['college'];
        $course = $_POST['course'];
        $year_sec = $_POST['year'].'-'.$_POST['section'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $phone_no = $_POST['phone_no'];
        $tel_no = $_POST['tel_no'];
        $email = $_POST['email'];
        $p_name = $_POST['p_name'];
        $p_phoneno = $_POST['p_phoneno'];
        $p_address = $_POST['p_address'];

        $stud_no = mysqli_real_escape_string($conn, $stud_no);
        $reason = mysqli_real_escape_string($conn, $reason);

        $system = mysqli_real_escape_string($conn, $system);
        $college = mysqli_real_escape_string($conn, $college);
        $course = mysqli_real_escape_string($conn, $course);
        $year_sec = mysqli_real_escape_string($conn, $year_sec);
        $gender = mysqli_real_escape_string($conn, $gender);
        $address = mysqli_real_escape_string($conn, $address);
        $phone_no = mysqli_real_escape_string($conn, $phone_no);
        $tel_no = mysqli_real_escape_string($conn, $tel_no);
        $email = mysqli_real_escape_string($conn, $email);
        $p_name = mysqli_real_escape_string($conn, $p_name);
        $p_phoneno = mysqli_real_escape_string($conn, $p_phoneno);
        $p_address = mysqli_real_escape_string($conn, $p_address);

        $sql1 = "UPDATE student_tbl 
            SET college = '$college', course = '$course', 
                year_sec = '$year_sec', gender = '$gender', full_address = '$address', 
                phone_no = '$phone_no', tel_no = '$tel_no', email = '$email', 
                guardian_name = '$p_name', guardian_phone = '$p_phoneno', guardian_address = '$p_address'
            WHERE stud_no = '$stud_no'";
        if (mysqli_query($conn, $sql1)) {
            $sql2 = "Insert into application_tbl(reason, system, stud_no, status) values ('$reason', '$system', '$stud_no', 'In Progress')";
            if (mysqli_query($conn, $sql2)) {
                echo "<script> alert('Form Successfully Recorded.') </script>";
                echo "<script>window.location.href='home.php';</script>";
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }

    }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="img/pup.png" type="image/x-icon">
    <title class="">Application for New/Replacement ID</title>
</head>
<body class="body2">
    <div class="container mx-5 mt-4">
        <div>
            <a href="form1.php" class="btn btn-light"><i class="bi bi-arrow-left-circle"></i></a>
            <h3 class="text-light mt-4 hh4">ID INFORMATION</h3>
            <small class="text-light">Please fill out this form with required information. Put “NA” if it is not applicable.</small>
        </div>
        <form action="form2.php" method="POST" class="needs-validation" novalidate>
            <div class="row">

                <div class="col-12 mt-4">
                    <select name="system" class="form-select form-select-sm rounded-0" required>
                        <option value="" disabled selected>System</option>
                        <option value="LHS">LHS</option>
                        <option value="Undergrad">Undergrad</option>
                        <option value="College of Law">College of Law</option>
                        <option value="Graduate School">Graduate School</option>
                        <option value="Open University">Open University</option>
                        <option value="Institute of Technology">Institute of Technology</option>
                    </select>
                </div>

                <div class="col-12 mt-4">
                    <select name="college" class="form-select form-select-sm rounded-0" required>
                        <option value="" disabled selected>College</option>
                        <option value="CAF">CAF</option>
                        <option value="CADBE">CADBE</option>
                        <option value="CAL">CAL</option>
                        <option value="CBA">CBA</option>
                        <option value="COC">COC</option>
                        <option value="CCIS">CCIS</option>
                        <option value="COED">COED</option>
                        <option value="CE">CE</option>
                        <option value="CHK">CHK</option>
                        <option value="CPSA">CPSPA</option>
                        <option value="CSSD">CSSD</option>
                        <option value="CS">CS</option>
                        <option value="CTHTM">CTHTM</option>
                    </select>
                </div>

                <div class="col-4 mt-4">
                    <input type="text" name="course" class="form-control form-control-sm rounded-0 mb-4" placeholder="Course (e.g. BSIT)" required>
                </div>

                <div class="col-4 mt-4">
                    <select name="year" class="form-select form-select-sm rounded-0" required>
                        <option value="" disabled selected>Year</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>

                <div class="col-4 mt-4">
                    <select name="section" class="form-select form-select-sm rounded-0" required>
                        <option value="" disabled selected>Section</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="1N">1N</option>
                        <option value="2N">2N</option>
                    </select>
                </div>

                <div class="col-12 mb-4">
                    <select name="gender" class="form-select form-select-sm rounded-0" required>
                        <option value="" disabled selected>Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <div class="col-12">
                    <textarea class="form-control form-control-sm rounded-0" name="address" placeholder="Full Address" required></textarea>
                </div>

                <div class="col-6 mt-4">
                    <input type="text" name="phone_no" class="form-control form-control-sm rounded-0 mb-4" placeholder="Phone Number" required>
                </div>

                <div class="col-6 mt-4">
                    <input type="text" name="tel_no" class="form-control form-control-sm rounded-0 mb-4" placeholder="Telephone Number" required>
                </div>

                <div class="col-12">
                    <input type="email" name="email" class="form-control form-control-sm rounded-0 mb-4" placeholder="Email" required>
                </div>

                <small class="custom-small text-light ms-3 mt-3">In case of emergency, please notify</small>
                <div class="col-12">
                    <div class="container custom-container mt-3 mx-2">
                        <div class="row">
                            <div class="col-12 mt-1">
                                <input type="text" name="p_name" class="form-control form-control-sm rounded-0" placeholder="Complete Name" required>
                            </div>
                            <div class="col-12 mt-3">
                                <input type="text" name="p_phoneno" class="form-control form-control-sm rounded-0 mb-4" placeholder="Phone/Telephone Number" required>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control form-control-sm rounded-0" name="p_address" placeholder="Full Address" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center my-4">
                    <button class="btn btn-warning btn-sm submit-btn" type="submit" name="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>

    <script src="form_valid.js"></script>
</body>
</html>