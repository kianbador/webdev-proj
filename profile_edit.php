<?php 
    include 'config/conn.php';

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $stud_no = isset($_SESSION['stud_no']) ? $_SESSION['stud_no'] : '';
    $stud_no = mysqli_real_escape_string($conn, $stud_no);

    if(isset($_POST['submit'])){
            $t_stud_no = $_POST['stud_no'];
            $name = $_POST['name'];
            $webmail = $_POST['webmail'];
            $bday = $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
            $password = $_POST['pw'];
            $t_stud_no = mysqli_real_escape_string($conn, $t_stud_no);
            $name = mysqli_real_escape_string($conn, $name);
            $webmail = mysqli_real_escape_string($conn, $webmail);
            $bday = mysqli_real_escape_string($conn, $bday );
            $password = mysqli_real_escape_string($conn, $password);

            $sql = "Update student_tbl set stud_no = '$t_stud_no', name='$name', webmail='$webmail', birthdate = '$bday', password='$password' where stud_no='$stud_no'";

            if(mysqli_query($conn, $sql)){
                $sql = "Update application_tbl set stud_no = '$t_stud_no' where stud_no='$stud_no'";
                if(mysqli_query($conn, $sql)){
                    $sql = "Update application_tbl set stud_no = '$t_stud_no' where stud_no='$stud_no'";
                    $_SESSION['stud_no'] = $t_stud_no;
                    header('Location: profile.php');
                    exit();
                }else{
                    echo 'Query Error: '.mysqli_error($conn);
                    
                }
            }else{
                echo 'Query Error: '.mysqli_error($conn);
                
            }
        }


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
            <div class="col-12">
            <a href="profile.php" class="btn btn-light mb-4"><i class="bi bi-arrow-left-circle"></i></a>
            <form action="profile_edit.php" method="POST" class="needs-validation" novalidate>

            
                <div class="row ms-3">
                    <div class="col-4">
                        <h4 class="hh4">Student Number:</h4>
                    </div>
                    <div class="col-6">
                        <input type="text" name="stud_no" value="<?php echo $stud_no; ?>" class="form-control form-control-sm" required>
                    </div>
                    <div class="col-4">
                        <h4 class="hh4">Name:</h4>
                    </div>
                    <div class="col-6">
                        <input type="text" name="name" id="name" value="<?php echo $name; ?>" class="form-control form-control-sm" required>
                    </div>
                    <div class="col-4">
                        <h4 class="hh4">Birthdate:</h4>
                    </div>
                    <div class="col-2">
                        <select name="month" class="form-select form-select-sm" required>
                            <option value="" disabled selected>Birth Month</option>
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                             <option value="12">December</option>
                        </select>
                    </div>
                    <div class="col-2">
                    <select name="day" class="form-select form-select-sm" required>
                        <option value="" disabled selected>Birth Day</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">25</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                        </select>
                    </div>
                    <div class="col-2">
                    <select name="year" class="form-select form-select-sm" required>
                                            <option value="" disabled selected>Birth Year</option>
                                            <option value="2014">2014</option>
                                            <option value="2013">2013</option>
                                            <option value="2012">2012</option>
                                            <option value="2011">2011</option>
                                            <option value="2010">2010</option>
                                            <option value="2009">2009</option>
                                            <option value="2008">2008</option>
                                            <option value="2007">2007</option>
                                            <option value="2006">2006</option>
                                            <option value="2005">2005</option>
                                            <option value="2004">2004</option>
                                            <option value="2003">2003</option>
                                            <option value="2002">2002</option>
                                            <option value="2001">2001</option>
                                            <option value="2000">2000</option>
                                            <option value="1999">1999</option>
                                            <option value="1998">1998</option>
                                            <option value="1997">1997</option>
                                            <option value="1996">1996</option>
                                            <option value="1995">1995</option>
                                            <option value="1994">1994</option>
                                            <option value="1993">1993</option>
                                            <option value="1992">1992</option>
                                            <option value="1991">1991</option>
                                            <option value="1990">1990</option>
                                            <option value="1989">1989</option>
                                            <option value="1988">1988</option>
                                            <option value="1987">1987</option>
                                            <option value="1986">1986</option>
                                            <option value="1985">1985</option>
                                            <option value="1984">1984</option>
                                            <option value="1983">1983</option>
                                            <option value="1982">1982</option>
                                            <option value="1981">1981</option>
                                            <option value="1980">1980</option>
                                            <option value="1979">1979</option>
                                            <option value="1978">1978</option>
                                            <option value="1977">1977</option>
                                            <option value="1976">1976</option>
                                            <option value="1975">1975</option>
                                            <option value="1974">1974</option>
                                            <option value="1973">1973</option>
                                            <option value="1972">1972</option>
                                            <option value="1971">1971</option>
                                            <option value="1970">1970</option>
                                        </select>
                    </div>
                    <div class="col-4">
                        <h4 class="hh4">Webmail:</h4>
                    </div>
                    <div class="col-6">
                        <input type="email" id="webmail" name="webmail" value="<?php echo $webmail; ?>" class="form-control form-control-sm" required>
                    </div>
                    <div class="col-4">
                        <h4 class="hh4">Password:</h4>
                    </div>
                    <div class="col-6">
                        <input type="password" id="pw" name="pw" placeholder="Password" class="form-control form-control-sm" required>
                    </div>
                    <div class="col-4">
                        <h4 class="hh4">Confirm Password:</h4>
                    </div>
                    <div class="col-6">
                        <input type="password" id="c_pw" name="c_pw" placeholder="Confirm Password" class="form-control form-control-sm" required>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <button class="btn btn-warning" name="submit">Submit</button>
                </div>
            </div>
            </form>
        </div>
    </div>
<script src="profile_valid.js"></script>
</body>
</html>