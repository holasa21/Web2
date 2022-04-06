<?php
include 'employee_auth_middleware.php';
require_once 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Home</title>
    <link rel="stylesheet" href="css/employee.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/my-colors.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<?php

if(isset($_POST['update'])){
    $up_id = $_POST['id'] ;
    $type_update = $_POST['type'] ;
    $dec_update = $_POST['description'] ;

    $uploadDir = 'files';

    if(isset($_FILES['myfile1']) || isset($_FILES['myfile2'])){
        if(!is_dir($uploadDir)){
            mkdir($uploadDir);
        }
        if(isset($_FILES['myfile1']) && $_FILES['myfile1']['size']>0){
            $file1Name = $uploadDir.'/'.$_FILES['myfile1']['name'];
        move_uploaded_file($_FILES['myfile1']['tmp_name'], $file1Name);
        }
        else{
            $file1Name = $_POST['file1ExistingValue'] ;
        }
        if(isset($_FILES['myfile2']) && $_FILES['myfile2']['size']>0){
            $file2Name = $uploadDir.'/'.$_FILES['myfile2']['name'];
        move_uploaded_file($_FILES['myfile2']['tmp_name'], $uploadDir.'/'.$file2Name);
        }
        else{
            $file2Name = $_POST['file2ExistingValue'] ;
        }
    }

    $up_qry = " UPDATE `request` SET `service_id`='$type_update',`description`='$dec_update', `attachment1`='$file1Name',`attachment2`='$file2Name' WHERE id = $up_id " ;
    $update = $conn->query($up_qry);
    if($update){

        echo "<script> window.onload = function() {
            Swal.fire(
                'Done',
                'Request Updated',
                'success'
            );
        }; </script>" ;

    }
    else{
        echo "<script> window.onload = function() {
            Swal.fire(
                'Error',
                'Request Not Updated',
                'error'
            );
        }; </script>" ;
    }
}


$employee_id = $auth['id'] ;


$requests_qry_processing = " SELECT *,request.id as id FROM `request` LEFT JOIN `service` ON request.service_id = service.id WHERE request.emp_id = '$employee_id' AND request.status= 'in progress' ";
$requests_processing = $conn->query($requests_qry_processing);




$requests_qry_approved = " SELECT *,request.id as id FROM `request` LEFT JOIN `service` ON request.service_id = service.id WHERE request.emp_id = '$employee_id' AND request.status= 'approved' ";
$requests_approved = $conn->query($requests_qry_approved);

?>

<body>
    <header>
        <main>
        <nav class="navbar navbar-lightgrey bg-lightgrey">
            <div class="container">
                <div class="col-1">
                    <a class="navbar-brand" href="employee.php">
                        <img src="media/mini-logo.png" alt="" width="" height="75" class="d-inline-block align-text-top">
                    </a>
                </div>
                <div class="col-10 align-middle">
                    <h3 class="text-darksky">EMPLOYEE MANGENET SYSTEM</h3>
                </div>
            </div>
        </nav>
    </header>
    <div class="dashboard bg-lightgrey my-3">
        <div id="emp-info">
            <p class="emp-welcome text-darksky fs-1">Welcome <span class="emp-name" style="text-transform: capitalize;"> <?php echo $auth['first_name']." ".$auth['last_name'] ?></span>!</p>
            <p>Employee's ID: <span class="emp-id"><?php echo $auth['emp_number'] ?></span></p>
            <P>Job Title: <span class="job-title"><?php echo $auth['job_title'] ?></span></p>

        </div>
        <div id="buttons">
            <a class="offset-7 col-5 btn btn-lg btn-darksky" id="myLink" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
            <a class="offset-7 col-5 btn btn-lg btn-grey" href="Add new request.php">+ Add request</a>
        </div>

        <div id="requests">

            <h3 class="main-title">Requests</h3>
            <h3 class="request-heading">In progress</h3>

            <table>
                <?php
                    if ($requests_processing->num_rows > 0) {
                        while($request_processing = $requests_processing->fetch_assoc()){ ?>
                           <tr>
                                <td class="request"><a href="Request_information_page.php?id=<?= $request_processing['id'] ?>"><?= $request_processing['id']." - ".$request_processing['type'] ?></a></td>
                                <td><a class="col-6 btn btn-lg btn-darksky fs-3" href="Edit_request_page.php?id=<?= $request_processing['id'] ?>">Edit</a></td>
                            </tr>
                        <?php }
                    }
                    else{
                        echo "No Request found In progress" ;
                    }
                ?>
            </table>

            <h3 class="request-heading">Previous Requests</h3>

            <table>
                <tr>
                    <th>Requests</th>
                    <th>Status</th>
                </tr>

                <?php
                    if ($requests_approved->num_rows > 0) {
                        while($request_approved = $requests_approved->fetch_assoc()){ ?>

                        <tr>
                            <td class="request"><a href="Request_information_page.php?id=<?= $request_approved['id'] ?>"><?= $request_approved['id']." - ".$request_approved['type'] ?></a></td>
                            <td><?= $request_approved['status'] ?></td>
                        </tr>

                        <?php }
                    }
                    else{
                        echo "<tr><td colspan='2'>No Request found In Approved</td></td>" ;
                    }
                ?>

            </table>

        </div>


    </div>
    <footer>

        <!--Copy Rights-->
        <p>Copyright &copy; 2022 MANGENET . All Rights Reserved</p>

    </footer>

    <form id="logout-form" action="./employee_auth_middleware.php" method="POST" style="display: none;">
        <input type="hidden" name="signout" value="1">
    </form>

    <script src="js/employee.js"></script>
    
    </main>
</body>

</html>