<?php
session_start();
require 'connection.php';
$auth;

if (!isset($_SESSION['manager_id'])) {
    header('Location: index.php');
}

if (isset($_POST['signout'])) {
    unset($_SESSION['manager_id']);
    unset($_SESSION['manager_role']);
    header('Location: index.php');
    $conn->close();
}

// Get Logged in user record
$sql = "SELECT * FROM manager WHERE id = " . $_SESSION['manager_id'] . "";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $auth = $result->fetch_assoc();
}
