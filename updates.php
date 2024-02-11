<?php
    include 'config/conn.php';

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $stud_no = isset($_SESSION['stud_no']) ? $_SESSION['stud_no'] : '';
    $stud_no = mysqli_real_escape_string($conn, $stud_no);
 
    $sql = "SELECT * FROM application_tbl WHERE stud_no = '$stud_no'";

    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $records = $result->fetch_assoc();
        $system = $records['system'];
        $reason = $records['reason'];
        $status = $records['status'];
        $date = $records['date'];

    }
    else{
        echo "<script>alert('You did not applied yet.');</script>";
        echo "<script>window.location.href='home.php';</script>";
        exit(); 
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
    <div class="container p-5 m-5">
        <table class="table table-danger table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Student Number</th>
                    <th>System</th>
                    <th>Reason</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th class="text-center">Cancel</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $stud_no ?></td>
                    <td><?php echo $system ?></td>
                    <td><?php echo $reason ?></td>
                    <td><?php echo $date ?></td>
                    <td><button class="btn btn-primary btn-sm" disabled><?php echo $status ?></button></td>
                    <td class="text-center">
                        <a href="#" class="text-danger" style="font-size: 26px;"><i class="bi bi-x-circle"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
<script>
      function confirmAction() {
        if (window.confirm("Are you sure you want to continue?")) {
            window.location.href = 'cancel.php';
        } 
    }

    document.querySelector('.text-danger').addEventListener('click', confirmAction);
</script>
</body>
</html>