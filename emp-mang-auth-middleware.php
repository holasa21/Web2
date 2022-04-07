<?php
session_start();
require 'connection.php';
error_reporting(E_ALL);
ini_set('display_errors',1);
$auth;

if (!isset($_SESSION['employee_id']) && !isset($_SESSION['manager_id']) ) {
    header('Location: index.php');
}

if (isset($_POST['signout'])) {
    if (isset($_SESSION['manager_id'])){
    unset($_SESSION['manager_id']);
    unset($_SESSION['manager_role']);
    $conn->close();
}
    if (isset($_SESSION['employee_id'])){
    unset($_SESSION['employee_id']);
    unset($_SESSION['employee_role']);
    header('Location: index.php');
    $conn->close();
    }
}

if (isset($_SESSION['employee_id'])){
// Get Logged in user record
$sql = "SELECT * FROM employee WHERE id = " . $_SESSION['employee_id'] . "";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $auth = $result->fetch_assoc();
}
}

if (isset($_SESSION['manager_id'])){
    // Get Logged in user record
    $sql = "SELECT * FROM manager WHERE id = " . $_SESSION['manager_id'] . "";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    $auth = $result->fetch_assoc();
}
}