<?php 
    include "config/conn.php";

    if (isset($_POST['submit'])){

        $stud_no = $_POST['stud_no'];
        $stud_no = mysqli_real_escape_string($conn, $stud_no);
        $stmt = $conn->prepare("SELECT stud_no FROM student_tbl WHERE stud_no = ?");
        $stmt->bind_param("s", $stud_no);
        $stmt->execute();
        $stmt->bind_result($resultStudent);
        $stmt->fetch();
        if($resultStudent){
            echo "<script>alert('Student Number Already Exist! Try Again.');</script>";
        }
        else{
            $name = $_POST['fname'].' ' . $_POST['lname'];
            $webmail = $_POST['webmail'];
            $bday = $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
            $password = $_POST['password'];

            $name = mysqli_real_escape_string($conn, $name);
            $webmail = mysqli_real_escape_string($conn, $webmail);
            $bday = mysqli_real_escape_string($conn, $bday );
            $password = mysqli_real_escape_string($conn, $password);

            $sql = "Insert into student_tbl(name, stud_no, webmail, birthdate, password) values ('$name','$stud_no', '$webmail', '$bday', '$password')";

            if(mysqli_query($conn, $sql)){
                header('Location: login.php');
            }else{
                echo 'Query Error: '.mysqli_error($conn);
                
            }
        }
        
}

?>

<!DOCTYPE html>
<html>
<head>
    <title class="">Application for New/Replacement ID</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/pup.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body class="body1">
    <div class="container">
            <div class="row justify-content-end">
                <div class="col-5 col-md-5">
                    <div class="card card-custom px-1 rounded-0 text-light ">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="img/pup.png" alt="logo" class="img-thumbnail mt-1 mb-4" width="80" height="80">
                            </div>
                            <form action="sign.php" method="POST" class="needs-validation" novalidate>
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" name="fname" id="fname" class="form-control form-control-sm rounded-0 mb-4" placeholder="First Name" required>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="lname" id="lname" class="form-control form-control-sm rounded-0 mb-4" placeholder="Last Name" required>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="stud_no" id="stud_no" class="form-control form-control-sm rounded-0 mb-4" placeholder="Student Number" required>
                                    </div>
                                    <div class="col-12">
                                        <input type="email" name="webmail" id="webmail" class="form-control form-control-sm rounded-0 mb-4" placeholder="Webmail" required>
                                    </div>
                                    <div class="col-4 mb-4">
                                        <select name="month" class="form-select form-select-sm rounded-0" required>
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
                                    <div class="col-4">
                                        <select name="day" class="form-select form-select-sm rounded-0" required>
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
                                    <div class="col-4">
                                        <select name="year" class="form-select form-select-sm rounded-0" required>
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
                                    <div class="col-12">
                                        <input type="password" name="password" id="password" class="form-control form-control-sm rounded-0 mb-4" placeholder="Password" required>
                                    </div>
                                    <div class="col-12">
                                        <input type="password" name="cpassword" id="cpassword" class="form-control form-control-sm rounded-0 mb-4" placeholder="Confirm Password" required>
                                    </div>
                                    <div class="text-center mb-4">
                                        <button type="submit" name="submit" class="btn btn-sm btn-warning w-100">Sign up</button>
                                    </div>
                                </div>
                            </form>
                            <div class="text-center">
                                <small>Already have an account? <a href="login.php" class="terms text-warning">Sign in</a></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

<script src="signUp_valid.js"></script>
</html>