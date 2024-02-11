<?php 
    include 'config/conn.php';

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $stud_no = isset($_SESSION['stud_no']) ? $_SESSION['stud_no'] : '';
    $stud_no = mysqli_real_escape_string($conn, $stud_no);

    $sql = "SELECT name, webmail, birthdate, password FROM student_tbl WHERE stud_no = '$stud_no'";

    $result = $conn->query($sql);

    if($result){
        $records = $result->fetch_assoc();
        $name = $records['name'];
        $webmail = $records['webmail'];
        $bday = $records['birthdate'];
        $password = $records['password'];
        $asterisks = str_repeat('*', strlen($password));
        list($user, $domain) = explode('@', $webmail, 2);
        $three = substr($user, 0, 3);
    }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title class="">Application for New/Replacement ID</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/pup.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body class="body3">
    <?php include 'header.php'; ?>

    <div class="container bg-danger py-4 ps-5 mt-5">
        <div class="row text-light">
            <div class="col-11">
            <h1 class="hh4 mb-4">Profile:</h1>
                <div class="row ms-3">
                    <div class="col-4">
                        <h4 class="hh4">Student Number:</h4>
                    </div>
                    <div class="col-6">
                        <h4><?php echo $stud_no; ?></h4>
                    </div>
                    <div class="col-4">
                        <h4 class="hh4">Name:</h4>
                    </div>
                    <div class="col-6">
                        <h4><?php echo $name; ?></h4>
                    </div>
                    <div class="col-4">
                        <h4 class="hh4">Birthdate:</h4>
                    </div>
                    <div class="col-6">
                        <h4><?php echo $bday; ?></h4>
                    </div>
                    <div class="col-4">
                        <h4 class="hh4">Webmail:</h4>
                    </div>
                    <div class="col-6">
                        <h4><?php echo $three.'***@'.$domain; ?></h4>
                    </div>
                    <div class="col-4">
                        <h4 class="hh4">Password:</h4>
                    </div>
                    <div class="col-6">
                        <h4><?php echo $asterisks; ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-1">
                <small><a href="profile_edit.php" class="terms text-warning"><i class="bi bi-pencil"></i> Edit</a></small>
            </div>
        </div>
    </div>
</body>
</html>