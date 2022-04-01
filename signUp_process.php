<?php
session_start();
require 'connection.php';

if (isset($_POST)) {

    $emp_number = $_POST['emp_number'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $job_title = $_POST['job_title'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM employee WHERE emp_number = '$emp_number'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['error'] = 'User already exists!';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        $sql = "INSERT INTO employee (emp_number, first_name, last_name, job_title, password)
                VALUES ('$emp_number', '$first_name', '$last_name', '$job_title', '" . password_hash($password, PASSWORD_DEFAULT) . "')";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['employee_id'] = $conn->insert_id;
            $_SESSION['employee_role'] = 'employee';

            header('Location: employee.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();
}
