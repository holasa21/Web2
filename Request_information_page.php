<?php
include 'employee_auth_middleware.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/my-colors.css">
    <link rel="stylesheet" href="css/footer.css">
    <!--fa fa icon-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>request information</title>
</head>

<body>
    <!--navigation bar-->
    <header>
        <nav class="navbar navbar-lightgrey bg-lightgrey">
            <div class="container">
                <div class="col-1">
                    <a class="navbar-brand" href="#">
                        <img src="media/mini-logo.png" alt="" width="" height="75"
                            class="d-inline-block align-text-top">
                    </a>
                </div>
                <div class="col-10 align-middle">
                    <h3 class="text-darksky">EMPLOYEE MANGENET SYSTEM</h3>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container pt-5">
            <div class="jumbotron bg-lightgrey">
                <div class="mx-5">
                <h1 class="d-inline fw-bold text-darksky">Promotion</h1>
                <h2 class="d-inline text-muted ms-2 display-6 fs-3">In progress</h2>
                <h5 class="my-3 fs-4">Ahamd Al-Saleh</h5>

                <button type="button" class="btn btn-success text-white">Approve</button>
                <button type="button" class="btn btn-danger text-white">Decline</button>
                <a class="btn btn-outline-darksky" href="#" role="button">Edit</a>
            </div>
                <div class="p-2 mx-5 mt-4 rounded" style="background-color: #d4d5d6;">
                    <div class="mx-5">
                    <strong class="d-inline text-darksky ms-2 display-6 fs-3 fw-bold">Description:</strong>
                    <p class="text-darksky ms-2 display-6 fs-4 mt-3 fw-normal">I am writing this application to inform you regarding my illness. 
                        I am having a severe headache and throat infection since last night. the doctor has advised me to take complete rest for 
                        4 days. the medical certificate is enclosed with a letter to to confirm that I need break from work to recover. </p>
                    <strong class="d-inline text-darksky ms-2 display-6 fs-3 fw-bold">Attachment:</strong>
                    <div class="mt-3">
                        <img src="media/sickLeave.webp" style="width:15em">
                        <a class="btn btn-outline-darksky d-block col-2 my-3 fw-bold" href="https://www.allbusinesstemplates.com/thumbs/3323dcc7-6e1e-4814-832f-fe737efca565_1.png">File Link <i style="font-size:24px" class="fa">&#xf1c1;</i></a>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>

        <!--Copy Rights-->
        <p>Copyright &copy; 2022 MANGENET . All Rights Reserved</p>

    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>