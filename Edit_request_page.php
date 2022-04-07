<?php 
include 'employee_auth_middleware.php';
require_once 'connection.php';


if(!isset($_GET['id'])){
    header('Location: employee.php');
}
else{
    $employee_id = $auth['id'] ;
    $request_id = $_GET['id'] ;

    $request = " SELECT *,request.id as id FROM `request` LEFT JOIN `service` ON request.service_id = service.id  WHERE  request.id= '$request_id '";
    $request = $conn->query($request);
    if($request->num_rows > 0){
        $req_data = $request->fetch_assoc() ;
    }
    else{
        header('Location: employee.php');
    }
}



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
            <form id="request" name="request" method="post" action="employee.php" enctype="multipart/form-data" class="bg-lightgrey p-5 mx-5 text-darksky shadow rounded">

                <legend>
                    <div class="text-center"><strong class="fs-2">Edit Request</strong></div>
                </legend>
                <p class="fw-bold fs-5">Service type: *</p>
                <div class="form-check mb-2">
                    <input type="radio" id="promotion" name="type" value="1" <?= $req_data['type']=='Promotion' ? 'checked' : '' ?>>
                    <label class="fs-5" for="promotion">Promotion</label><br>
                </div>
                <div class="form-check mb-2">
                    <input type="radio" id="leave" name="type" value="2" <?= $req_data['type']=='Leave' ? 'checked' : '' ?>>
                    <label class="fs-5" for="leave">Leave</label><br>
                </div>
                <div class="form-check mb-2">
                    <input type="radio" id="allowance" name="type" value="3" <?= $req_data['type']=='Allowance' ? 'checked' : '' ?>>
                    <label class="fs-5" for="allowance">Allowance</label><br>
                </div>
                
                <div class="form-check mb-2">
                    <input type="radio" id="resignation" name="type" value="4" <?= $req_data['type']=='Resignation' ? 'checked' : '' ?>>
                    <label class="fs-5" for="resignation">Resignation</label><br>
                </div>
                
                <div class="form-check mb-2">
                    <input type="radio" id="healthInsurance" name="type" value="5" <?= $req_data['type']=='healthInsurance' ? 'checked' : '' ?>>
                    <label class="fs-5" for="healthInsurance">healthInsurance</label><br>
                </div>

                <input type="hidden" name="id" value="<?= $req_data['id'] ?>">

                <br>
                <hr>
                <p class="fw-bold fs-5">Description: *<br>
                    <small class="fw-normal">(No more than 200 characters)</small>
                </p>

                <textarea class="rounded text-darksky" name="description" style="width:500px; height:200px;" maxlength="200"><?= $req_data['description'] ?></textarea>
                <hr>
                <br>
                <label class="fw-bold fs-5" for="myfile">Attach file: *</label>
                <br>
                <br>
                <p class="fw-bold">
                    1-Change the current File:
                    <br>
                    <?php
                    $img_ext=['jpeg','png','gif','svg','Webp','apng','jpg'];
                    //file 1
                    $dotPos1=strpos($req_data['attachment1'], '.');
                    $file1Type= substr($req_data['attachment1'],$dotPos1+1);

                    //file2
                    $dotPos2=strpos($req_data['attachment2'], '.');
                    $file2Type= substr($req_data['attachment2'],$dotPos2+1);

                        if(!empty($req_data['attachment1'])){
                            if(file_exists($req_data['attachment1']) && $req_data['attachment1']!='files/'){
                                if(in_array($file1Type, $img_ext)){?>
                                    <img class="img-fluid" alt="attachment" src="<?= $req_data['attachment1'] ?>"><br>
                            <?php    } else {?>
                                <a class="btn btn-outline-darksky d-block col-2 my-3 fw-bold" href="<?= $req_data['attachment1'] ?>">File Link <i style="font-size:24px" class="fa">&#xf1c1;</i></a>
                            <?php }
                            }
                        }
                        ?>
                    <br>
                    <input type="file" id="myfile" name="myfile1" >
                    <input type="hidden" name="file1ExistingValue" value="<?= $req_data['attachment1'] ?>">
                    <br>
                    <br>
                    2-Change the current File:
                    <br>
                    <?php
                        if(!empty($req_data['attachment2'])){
                            if(file_exists($req_data['attachment2']) && $req_data['attachment2']!='files/'){ 
                                if(in_array($file2Type, $img_ext)){?>
                                    <img class="img-fluid" alt="attachment" src="<?= $req_data['attachment2'] ?>">
                                <?php }
                                else { ?>
                                <a class="btn btn-outline-darksky d-block col-2 my-3 fw-bold" href="<?= $req_data['attachment2'] ?>">File Link <i style="font-size:24px" class="fa">&#xf1c1;</i></a>
                            <?php } 
                             }
                        }
                        ?>
                    <br><input type="file" id="myfile" name="myfile2">
                    <input type="hidden" name="file2ExistingValue" value="<?= $req_data['attachment2'] ?>">
                </p>
                <hr>
                <br>

                <input type="submit" name="update" class=" offset-4 col-4 btn btn-lg btn-darksky"  value="Update" >
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