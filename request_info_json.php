<?php 
include 'emp-mang-auth-middleware.php';
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
        
        header('Content-type: application/json');
        echo json_encode($req_data['description']);
    }
    else{
        header('Content-type: application/json');
        echo json_encode('error');
    }
}
?>