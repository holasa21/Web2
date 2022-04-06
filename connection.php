<?php
$servername = "localhost";
$username = "root";
$password = "root";
$database = "managersystem";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//رابط الموقع
$sys_url = 'http://127.0.01/web2/';