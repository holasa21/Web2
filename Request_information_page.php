<?php 
include 'employee_auth_middleware.php';
require_once 'connection.php';


if(!isset($_GET['id'])){
    header('Location: employee.php');
}
else{
    $employee_id = $auth['id'] ;
    $request_id = $_GET['id'] ;

    $request = " SELECT *,request.id as id FROM `request` LEFT JOIN `service` ON request.service_id = service.id LEFT JOIN `employee` ON request.emp_id = employee.id WHERE  request.id= '$request_id '";
    $request = $conn->query($request);
    if($request->num_rows > 0){
        $req_data = $request->fetch_assoc() ;
    }
    else{
        header('Location: employee.php');
    }
}
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

    <title>Request information</title>
</head>

<body>
    <!--navigation bar-->
    <header>
        <nav class="navbar navbar-lightgrey bg-lightgrey">
            <div class="container">
                <div class="col-1">
                    <a class="navbar-brand" href="employee.php">
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
                <h1 class="d-inline fw-bold text-darksky"><?= $req_data['type'] ?></h1>
                <h2 class="d-inline text-muted ms-2 display-6 fs-3"><?= $req_data['status'] ?></h2>
                <h5 class="my-3 fs-4" style="text-transform: capitalize;"><?= $req_data['first_name']." ".$req_data['last_name'] ?></h5>
                <a class="col-2 btn btn-darksky fs-3" style="position: absolute; top:25%; margin:0% 0% 0% 59.5%;" href="Edit_request_page.php?id=<?= $request_id ?>">Edit</a>

                <!-- <button type="button" class="btn btn-success text-white">Approve</button>
                <button type="button" class="btn btn-danger text-white">Decline</button>
                <a class="btn btn-outline-darksky" href="#" role="button">Edit</a> -->
            </div>
                <div class="p-2 mx-5 mt-4 rounded" style="background-color: #d4d5d6;">
                    <div class="mx-5">
                    <strong class="d-inline text-darksky ms-2 display-6 fs-3 fw-bold">Description:</strong>
                    <p class="text-darksky ms-2 display-6 fs-4 mt-3 fw-normal">
                    <?= $req_data['description'] ?>
                    </p>
                    <strong class="d-inline text-darksky ms-2 display-6 fs-3 fw-bold">Attachment:</strong>
                    <div class="mt-3">
                        <?php
                        if(!empty($req_data['attachment1'])){
                            if(file_exists($req_data['attachment1']) && $req_data['attachment1']!='files/'){ ?>
                                <a class="btn btn-outline-darksky d-block col-2 my-3 fw-bold" href="<?= $req_data['attachment1'] ?>">File Link <i style="font-size:24px" class="fa">&#xf1c1;</i></a>
                            <?php }
                        }
                        ?>
                        <?php
                        if(!empty($req_data['attachment2'])){
                            if(file_exists($req_data['attachment2']) && $req_data['attachment2']!='files/'){ ?>
                                <a class="btn btn-outline-darksky d-block col-2 my-3 fw-bold" href="<?= $req_data['attachment2'] ?>">File Link <i style="font-size:24px" class="fa">&#xf1c1;</i></a>
                            <?php }
                        }
                        ?>
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