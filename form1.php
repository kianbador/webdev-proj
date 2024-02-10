<?php 

    $reason = '';
    if(isset($_POST['reason'])){
        if($_POST['reason']=== 'Transferee'){
            $reason = $_POST['reason'];
        }
        elseif($_POST['reason']=== 'Late Filing'){
            $reason = $_POST['reason'];
        }
        elseif($_POST['reason']=== 'Old ID'){
            $reason = $_POST['reason'];
        }
        elseif($_POST['reason']=== 'Shiftee'){
            $reason = $_POST['reason'];
        }
        elseif($_POST['reason']=== 'Damaged'){
            $reason = $_POST['reason'];
        }
        elseif($_POST['reason']=== 'Correction of Entry'){
            $reason = $_POST['reason'];
        }
    }

    if($reason !== ''){
        session_start();
        $_SESSION['reason'] = $reason;
        header('Location:form2.php');
        exit();

    }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/pup.png" type="image/x-icon">
    <title class="">Application for New/Replacement ID</title>
</head>
<body class="body2">
    <?php include 'header.php';?>
    <div class="text-center">
        <div class="mb-5">
            <h3 class="hh4 mt-5 mb-4 pt-5 text-light">PUP’s Application for New/Replacement ID</h3>
            <small class="text-light">Please select the reason for applying:</small>
        </div>
        <div class="container">
            <form action="form1.php" method="POST">
            <div class="row mt-4">
                <div class="col-6 mb-4">
                    <button type="submit" name="reason" class="btn btn-lg w-100 btn-danger rounded-0 danger-link" value="Transferee">Transferee</button>
                </div>

                <div class="col-6 mb-4">
                    <button type="submit" name="reason" class="btn btn-lg w-100 btn-danger rounded-0 danger-link" value="Late Filing">Late Filing</button>
                </div>


                <div class="col-6 mb-4">
                    <button type="submit" name="reason" class="btn btn-lg w-100 btn-danger rounded-0 danger-link" value="Old ID">Old ID</button>
                </div>

                <div class="col-6 mb-4">
                    <button type="submit" name="reason" class="btn btn-lg w-100 btn-danger rounded-0 danger-link" value="Shiftee">Shiftee</button>
                </div>

                <div class="col-6 mb-4">
                    <button type="submit" name="reason" class="btn btn-lg w-100 btn-danger rounded-0 danger-link" value="Damaged">Damaged</button>
                </div>

                <div class="col-6 mb-4">
                    <button type="submit" name="reason" class="btn btn-lg w-100 btn-danger rounded-0 danger-link" value="Correction of Entry">Correction of Entry</button>
                </div>

            </div>
            </form>
        </div>
    </div>

</body>
</html>