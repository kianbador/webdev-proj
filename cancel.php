<?php 
    include('config/conn.php');

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $stud_no = isset($_SESSION['stud_no']) ? $_SESSION['stud_no'] : '';
    $stud_no = mysqli_real_escape_string($conn, $stud_no);

    $sql = "Delete from application_tbl where stud_no = '$stud_no'";
    if (mysqli_query($conn, $sql)){
        header('Location: home.php');
    }
    else{
        echo "Error updating record: " . mysqli_error($conn);
    }

?>