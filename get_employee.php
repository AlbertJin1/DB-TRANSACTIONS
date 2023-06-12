<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'payroll';

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$employeeNo = $_GET['employeeNo'];

$sql = "SELECT * FROM employees WHERE employee_no = '$employeeNo'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    header('Content-Type: application/json');
    echo json_encode($row);
} else {
    echo json_encode((object)[]);
}

$conn->close();
?>