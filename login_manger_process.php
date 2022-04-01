<?php
session_start();
require 'connection.php';

if (isset($_POST)) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM manager WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            $_SESSION['manager_id'] = $row['id'];
            $_SESSION['manager_role'] = 'manager';
            return header('Location: manger_home_page.php');
        }
    }

    $_SESSION['error'] = 'User doesn\'t exist!';
    header('Location: ' . $_SERVER['HTTP_REFERER']);

    $conn->close();
}
