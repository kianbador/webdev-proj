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
        <form action="">
            <div class="row">
                <div class="col-12 mt-4">
                    <select name="gender" class="form-select form-select-sm rounded-0">
                        <option disabled selected>Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <div class="col-12 mt-4">
                    <select name="college" class="form-select form-select-sm rounded-0">
                        <option disabled selected>College</option>
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
                    <input type="text" name="course" class="form-control form-control-sm rounded-0 mb-4" placeholder="Course (e.g. BSIT)">
                </div>

                <div class="col-4 mt-4">
                    <select name="year" class="form-select form-select-sm rounded-0">
                        <option disabled selected>Year</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>

                <div class="col-4 mt-4">
                    <select name="section" class="form-select form-select-sm rounded-0">
                        <option disabled selected>Section</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="1N">1N</option>
                        <option value="2N">2N</option>
                    </select>
                </div>

                <div class="col-12">
                    <textarea class="form-control form-control-sm rounded-0" name="address" placeholder="Full Address"></textarea>
                </div>

                <div class="col-6 mt-4">
                    <input type="text" name="phone_no" class="form-control form-control-sm rounded-0 mb-4" placeholder="Phone Number">
                </div>

                <div class="col-6 mt-4">
                    <input type="text" name="tel_no" class="form-control form-control-sm rounded-0 mb-4" placeholder="Telephone Number">
                </div>

                <div class="col-12">
                    <input type="email" name="email" class="form-control form-control-sm rounded-0 mb-4" placeholder="Email">
                </div>

                <small class="custom-small text-light ms-3 mt-3">In case of emergency, please notify</small>
                <div class="col-12">
                    <div class="container custom-container mt-3 mx-2">
                        <div class="row">
                            <div class="col-12 mt-1">
                                <input type="text" name="p_name" class="form-control form-control-sm rounded-0" placeholder="Complete Name">
                            </div>
                            <div class="col-12 mt-3">
                                <input type="text" name="p_phoneno" class="form-control form-control-sm rounded-0 mb-4" placeholder="Phone/Telephone Number">
                            </div>
                            <div class="col-12">
                                <textarea class="form-control form-control-sm rounded-0" name="address" placeholder="Full Address"></textarea>
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
</body>
</html>