<?php
include 'employee_auth_middleware.php';
require 'connection.php';

if (isset($_POST)) {

    $serType = $_POST['type'];
    $desc = $_POST['description'];
    $att1 = $_POST['myfile1'];
    $att2 = $_POST['myfile2'];

    $sqlSerId = "SELECT * FROM service WHERE type = '$serType'";
    $resultSerId = $conn->query($sqlSerId);
    $row = $resultSerId->fetch_assoc();
    $_SESSION['service_type'] = $row['id'];

    $serId = $_SESSION['service_type'];
    $EmpId = $_SESSION['employee_id'] ;
    					
    $sql = "INSERT INTO request (emp_id, service_id, description, attachment1, attachment2, status)
                VALUES ('$EmpId', '$serId', '$desc', '$att1', '$att1','In progress')";

    if ($conn->query($sql) === TRUE) {
        header('Location: Request_information_page.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
