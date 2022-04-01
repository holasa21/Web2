<?php
include 'employee_auth_middleware.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit request</title>
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
    <!--fa fa icon-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

    <!-- Content -->
    <main>
        <div class="container my-5 mx-6 px-5">
            <form id="request" name="request" method="post" action="" class="bg-lightgrey p-5 mx-5 text-darksky shadow rounded">

                <legend>
                    <div class="text-center"><strong class="fs-2">Edit Request</strong></div>
                </legend>
                <p class="fw-bold fs-5">Service type: *</p>
                <div class="form-check mb-2">
                    <input type="radio" id="promotion" name="type" value="promotion" checked>
                    <label class="fs-5" for="promotion">promotion</label><br>
                </div>
                <div class="form-check mb-2">
                    <input type="radio" id="leave" name="type" value="leave">
                    <label class="fs-5" for="leave">leave</label><br>
                </div>
                <div class="form-check mb-2">
                    <input type="radio" id="resignation" name="type" value="resignation">
                    <label class="fs-5" for="resignation">resignation</label><br>
                </div>
                <div class="form-check mb-2">
                    <input type="radio" id="allowance" name="type" value="allowance">
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

                <textarea class="rounded text-darksky" name="description" style="width:500px; height:200px;" maxlength="200">I am writing this application to inform you regarding my illness. I am having a severe headache and throat infection since last night. the doctor has advised me to take complete rest for 4 days. the medical certificate is enclosed with a letter to to confirm that I need break from work to recover.</textarea>
                <hr>
                <br>
                <label class="fw-bold fs-5" for="myfile">Attach file: *</label>
                <br>
                <br>
                <p class="fw-bold">
                    1-Change the current image:
                    <br><img class="img-thumbnail mx-5 my-4" style="width: 10%;" src="media/sickLeave.webp">
                    <br>
                    <input type="file" id="myfile" name="imageFile" accept="image/*">
                    <br>
                    <br>
                    2-Change the current File:
                    <br>
                    <a class="btn btn-outline-darksky col-2 my-3 fw-bold" href="https://www.allbusinesstemplates.com/thumbs/3323dcc7-6e1e-4814-832f-fe737efca565_1.png">File
                        Link <i style="font-size:24px" class="fa">&#xf1c1;</i></a>
                    <br><input type="file" id="myfile" name="linkFile">
                </p>
                <hr>
                <br>

                <input type="submit" class=" offset-4 col-4 btn btn-lg btn-darksky" onclick="validateForm(); return false;" value="Update" disabled>
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