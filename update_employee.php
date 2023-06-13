<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'payroll';

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employeeNo = $_POST['employeeNo'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $rate = strval($_POST['rate']);
    $hoursWorked = strval($_POST['hoursWorked']);
    $grossPay = $_POST['grossPay'];
    $sssContributions = $_POST['sssContributions'];
    $philhealth = $_POST['philhealth'];
    $pagIbig = $_POST['pagIbig'];
    $cashAdvance = strval($_POST['cashAdvance']);
    $totalDeductions = $_POST['totalDeductions'];
    $netPay = $_POST['netPay'];

    // Update the employee record in the database
    $sql = "UPDATE employees SET name='$name', address='$address', age='$age', rate_hour='$rate', hours_worked='$hoursWorked', gross_pay='$grossPay', sss_contributions='$sssContributions', philhealth='$philhealth', pag_ibig='$pagIbig', cash_advance='$cashAdvance', total_deductions='$totalDeductions', net_pay='$netPay' WHERE employee_no='$employeeNo'";

    if ($conn->query($sql) === true) {
        echo "Employee updated successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>