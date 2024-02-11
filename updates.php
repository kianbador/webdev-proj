<?php
    include 'config/conn.php';

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $stud_no = isset($_SESSION['stud_no']) ? $_SESSION['stud_no'] : '';
    $stud_no = mysqli_real_escape_string($conn, $stud_no);
 

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
<body>
    <?php include 'header.php' ?>    


</body>
</html>