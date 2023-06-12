<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "payroll";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$employee_no = $_POST['employee_no'];
$employee_name = $_POST['employee_name'];
$address = $_POST['address'];
$age = $_POST['age'];
$rate_hr = $_POST['rate_hr'];
$nhw = $_POST['nhw'];
$sss_cont = $_POST['sss_cont'];
$phealth = $_POST['phealth'];
$pagibig = $_POST['pagibig'];
$cash_advance = $_POST['cash_advance'];

// Perform calculations
$gross_pay = $rate_hr * $nhw;
$total_deduct = $sss_cont + $phealth + $pagibig + $cash_advance;
$net_pay = $gross_pay - $total_deduct;

// Insert data into the database
$sql = "INSERT INTO employees (employee_no, employee_name, address, age, rate_hr, nhw, gross_pay, sss_cont, phealth, pagibig, cash_advance, total_deduct, net_pay)
        VALUES ('$employee_no', '$employee_name', '$address', '$age', '$rate_hr', '$nhw', '$gross_pay', '$sss_cont', '$phealth', '$pagibig', '$cash_advance', '$total_deduct', '$net_pay')";

if ($conn->query($sql) === TRUE) {
    echo "Employee added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>