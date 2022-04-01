<?php
session_start();
require 'connection.php';

if (isset($_POST)) {

    $emp_number = $_POST['emp_number'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM employee WHERE emp_number = '$emp_number'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            $_SESSION['employee_id'] = $row['id'];
            $_SESSION['employee_role'] = 'employee';
            return header('Location: employee.php');
        }
    }

    $_SESSION['error'] = 'User doesn\'t exist!';
    header('Location: ' . $_SERVER['HTTP_REFERER']);

    $conn->close();
}
