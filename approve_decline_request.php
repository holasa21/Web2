<?php
include 'emp-mang-auth-middleware.php';
require_once 'connection.php';

if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $req_id = htmlspecialchars($_GET['id'], ENT_QUOTES);
    if ($action == "approve") {
        $req_q = mysqli_query($conn, "SELECT * FROM `request` WHERE id = '$req_id' ")or die(mysqli_error($conn));
        $req_data = mysqli_fetch_assoc($req_q);
        $req_q = mysqli_query($conn, "UPDATE `request` SET status = 'approved' WHERE id = '$req_id'");
        if ($req_q) {
            header('Content-type: application/json');
            echo json_encode("approved");
        }
    } else if ($action == "decline") {
        $req_q = mysqli_query($conn, "SELECT * FROM `request` WHERE id = '$req_id'")or die(mysqli_error($conn));
        $req_data = mysqli_fetch_assoc($req_q);
        $req_q = mysqli_query($conn, "UPDATE `request` SET status = 'declined' WHERE id = '$req_id'");
        if ($req_q) {
            header('Content-type: application/json');
            echo json_encode("declined");
        }
    }else{
        header('Content-type: application/json');
        echo json_encode('error');
    }
}else{
    header('Content-type: application/json');
    echo json_encode('error');
}
?>