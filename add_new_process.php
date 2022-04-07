<?php
include 'employee_auth_middleware.php';
require 'connection.php';

$uploadDir = 'files';

if (isset($_POST)) {
    $serType = $_POST['type'];
    $desc = $_POST['description'];
    if(isset($_FILES['myfile1']) || isset($_FILES['myfile2'])){
        if(!is_dir($uploadDir)){
            mkdir($uploadDir);
        }
        if(isset($_FILES['myfile1'])){
            $file1Name = $_FILES['myfile1']['name'];
        move_uploaded_file($_FILES['myfile1']['tmp_name'], $uploadDir.'/'.$file1Name);
        }
        if(isset($_FILES['myfile2'])){
            $file2Name = $_FILES['myfile2']['name'];
        move_uploaded_file($_FILES['myfile2']['tmp_name'], $uploadDir.'/'.$file2Name);
        }
    }
    $sqlSerId = "SELECT * FROM service WHERE type = '$serType'";
    $resultSerId = $conn->query($sqlSerId);
    $row = $resultSerId->fetch_assoc();
    $_SESSION['service_type'] = $row['id'];

    $serId = $_SESSION['service_type'];
    $EmpId = $_SESSION['employee_id'] ;

    if(strlen($file1Name)>0 && strlen($file2Name)>0 ){			
    $sql = "INSERT INTO request (emp_id, service_id, description, attachment1, attachment2, status)
                VALUES ('$EmpId', '$serId', '$desc', '$uploadDir/$file1Name', '$uploadDir/$file2Name','in progress')";}
    if(strlen($file1Name)>0 && strlen($file2Name)==0){			
        $sql = "INSERT INTO request (emp_id, service_id, description, attachment1, status)
        VALUES ('$EmpId', '$serId', '$desc', '$uploadDir/$file1Name','in progress')";}
    if(strlen($file1Name)==0 && strlen($file2Name)>0){			
        $sql = "INSERT INTO request (emp_id, service_id, description, attachment2, status)
                    VALUES ('$EmpId', '$serId', '$desc','$uploadDir/$file2Name','in progress')";}

    if ($conn->query($sql) == TRUE) {
        $req_id = "SELECT * FROM `request` WHERE  emp_id= '$EmpId' AND description='$description' AND status='in progress'";
        $resultReqId=$conn->query($req_id);
        if ($resultReqId == TRUE){
            $row = $resultReqId->fetch_assoc();
            $req_id_found = $row['id'];
        header('Location: Request_information_page.php?id='.$req_id_found);}
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
