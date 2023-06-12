<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'payroll';

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the employee number from the query string
$employeeNo = $_GET['employeeNo'];

// Prepare the SQL query
$sql = "SELECT * FROM employees WHERE employee_no = '$employeeNo'";

// Execute the query
$result = $conn->query($sql);

// Check if any rows were found
if ($result->num_rows > 0) {
    // Fetch the first row as an associative array
    $row = $result->fetch_assoc();

    // Return the row data as JSON
    header('Content-Type: application/json');
    echo json_encode($row);
} else {
    // Return an empty object if no rows were found
    echo json_encode((object)[]);
}

$conn->close();
?>