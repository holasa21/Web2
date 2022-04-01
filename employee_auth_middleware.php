<?php

session_start();
require 'connection.php';
$auth;

if (!isset($_SESSION['employee_id'])) {
    header('Location: index.php');
}

if (isset($_POST['signout'])) {
    unset($_SESSION['employee_id']);
    unset($_SESSION['employee_role']);
    header('Location: index.php');
}

// Get Logged in user record
$sql = "SELECT * FROM employee WHERE id = " . $_SESSION['employee_id'] . "";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $auth = $result->fetch_assoc();
}

$conn->close();
