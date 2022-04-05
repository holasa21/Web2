<?php
include 'employee_auth_middleware.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add new request</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">


    <!--<link rel="stylesheet" href="css/styles.css">-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/my-colors.css">
    <link rel="stylesheet" href="css/footer.css">
</head>

<body>
    <!-- Header -->
    <header>
        <nav class="navbar navbar-lightgrey bg-lightgrey">
            <div class="container">
                <div class="col-1">
                    <a class="navbar-brand" href="./employee.php">
                        <img src="media/mini-logo.png" alt="" width="" height="75" class="d-inline-block align-text-top">
                    </a>
                </div>
                <div class="col-8 align-middle">
                    <h3 class="text-darksky">EMPLOYEE MANGENET SYSTEM</h3>
                </div>
                <a class="btn btn-darksky col-1" href="./employee.php">Back</a>
            </div>
        </nav>
    </header>

    <main>
        <!-- Content -->
        <div class="container my-5 mx-6 px-5">
            <form id="request" name="request" method="post" onsubmit="validateForm();" action="add_new_process.php" enctype="multipart/form-data" class="bg-lightgrey p-5 mx-5 text-darksky shadow rounded">

                <legend>
                    <div class="text-center"><strong class="fs-2">New Request</strong></div>
                </legend>
                <p class="fw-bold fs-5">Service type: *</p>
                <div class="form-check mb-2">
                    <input type="radio" id="promotion" name="type" value="Promotion">
                    <label class="fs-5" for="promotion">promotion</label><br>
                </div>
                <div class="form-check mb-2">
                    <input type="radio" id="leave" name="type" value="Leave">
                    <label class="fs-5" for="leave">leave</label><br>
                </div>
                <div class="form-check mb-2">
                    <input type="radio" id="resignation" name="type" value="Resignation">
                    <label class="fs-5" for="resignation">resignation</label><br>
                </div>
                <div class="form-check mb-2">
                    <input type="radio" id="allowance" name="type" value="Allowance">
                    <label class="fs-5" for="allowance">allowance</label><br>
                </div>
                <div class="form-check mb-2">
                    <input type="radio" id="healthInsurance" name="type" value="healthInsurance">
                    <label class="fs-5" for="healthInsurance">health insurance</label><br>
                </div>

                <br>
                <hr>
                <p class="fw-bold fs-5">Description: *<br>
                    <small class="fw-normal">(No more than 200 characters)</small>
                </p>

                <textarea class="rounded text-darksky" name="description" style="width:500px; height:200px;" maxlength="200"></textarea>
                <hr>
                <br>
                <label class="fw-bold fs-5" for="myfile">Attach file: *</label>
                <br>
                <br>
                <p>
                    1-<input type="file" id="myfile" name="myfile1">
                    <br>
                    <br>
                    2-<input type="file" id="myfile" name="myfile2">
                </p>
                <hr>
                <br>

                <input type="submit" class=" offset-3 col-2 btn btn-lg btn-darksky" value="Submit">
                <input type="Reset" class=" offset-2 col-2 btn btn-lg  btn-grey" value="Reset">
            </form>
        </div>
    </main>

    <footer id="footer1">

        <!--Copy Rights-->
        <p>Copyright &copy; 2022 MANGENET . All Rights Reserved</p>

    </footer>
    <script src="js/javascript.js"></script>
</body>

</html>