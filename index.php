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
    $rate = $_POST['rate'];
    $hoursWorked = $_POST['hoursWorked'];

    // Perform calculations
    $grossPay = $rate * $hoursWorked;
    $sssContributions = computeSSS($grossPay);
    $philhealth = computePhilhealth($grossPay);
    $pagIbig = computePAGIBIG($grossPay);
    $cashAdvance = $_POST['cashAdvance'];
    $totalDeductions = $sssContributions + $philhealth + $pagIbig + $cashAdvance;
    $netPay = $grossPay - $totalDeductions;

    // Save to database
    $sql = "INSERT INTO employees (employee_no, name, address, age, rate_hour, hours_worked, gross_pay, sss_contributions, philhealth, pag_ibig, cash_advance, total_deductions, net_pay)
            VALUES ('$employeeNo', '$name', '$address', '$age', '$rate', '$hoursWorked', '$grossPay', '$sssContributions', '$philhealth', '$pagIbig', '$cashAdvance', '$totalDeductions', '$netPay')";
    if ($conn->query($sql) === true) {
        echo "Employee saved successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function computeSSS($grossPay) {
    if ($grossPay < 4250) {
        return 180 + 10;
    } elseif ($grossPay >= 4250 && $grossPay < 4750) {
        return 202.50 + 10;
    } elseif ($grossPay >= 4750 && $grossPay < 5250) {
        return 225 + 10;
    } elseif ($grossPay >= 5250 && $grossPay < 5750) {
        return 247.50 + 10;
    } elseif ($grossPay >= 5750 && $grossPay < 6250) {
        return 270 + 10;
    } elseif ($grossPay >= 6250 && $grossPay < 6750) {
        return 292.50 + 10;
    } elseif ($grossPay >= 6750 && $grossPay < 7250) {
        return 315 + 10;
    } elseif ($grossPay >= 7250 && $grossPay < 7750) {
        return 337.50 + 10;
    } elseif ($grossPay >= 7750 && $grossPay < 8250) {
        return 360 + 10;
    } elseif ($grossPay >= 8250 && $grossPay < 8750) {
        return 382.50 + 10;
    } elseif ($grossPay >= 8750 && $grossPay < 9250) {
        return 405 + 10;
    } elseif ($grossPay >= 9250 && $grossPay < 9750) {
        return 427.50 + 10;
    } elseif ($grossPay >= 9750 && $grossPay < 10250) {
        return 450 + 10;
    } elseif ($grossPay >= 10250 && $grossPay < 10750) {
        return 472.50 + 10;
    } elseif ($grossPay >= 10750 && $grossPay < 11250) {
        return 495 + 10;
    } elseif ($grossPay >= 11250 && $grossPay < 11750) {
        return 517.50 + 10;
    } elseif ($grossPay >= 11750 && $grossPay < 12250) {
        return 540 + 10;
    } elseif ($grossPay >= 12250 && $grossPay < 12750) {
        return 562.50 + 10;
    } elseif ($grossPay >= 12750 && $grossPay < 13250) {
        return 585 + 10;
    } elseif ($grossPay >= 13250 && $grossPay < 13750) {
        return 607.50 + 10;
    } elseif ($grossPay >= 13750 && $grossPay < 14250) {
        return 630 + 10;
    } elseif ($grossPay >= 14250 && $grossPay < 14750) {
        return 652.50 + 10;
    } elseif ($grossPay >= 14750 && $grossPay < 15250) {
        return 675 + 30;
    } elseif ($grossPay >= 15250 && $grossPay < 15750) {
        return 697.50 + 30;
    } elseif ($grossPay >= 15750 && $grossPay < 16250) {
        return 720 + 30;
    } elseif ($grossPay >= 16250 && $grossPay < 16750) {
        return 742.50 + 30;
    } elseif ($grossPay >= 16750 && $grossPay < 17250) {
        return 765 + 30;
    } elseif ($grossPay >= 17250 && $grossPay < 17750) {
        return 787.50 + 30;
    } elseif ($grossPay >= 17750 && $grossPay < 18250) {
        return 810 + 30;
    } elseif ($grossPay >= 18250 && $grossPay < 18750) {
        return 832.50 + 30;
    } elseif ($grossPay >= 18750 && $grossPay < 19250) {
        return 855 + 30;
    } elseif ($grossPay >= 19250 && $grossPay < 19750) {
        return 877.50 + 30;
    } elseif ($grossPay >= 19750 && $grossPay < 20250) {
        return 900 + 30;
    } elseif ($grossPay >= 20250 && $grossPay < 20750) {
        return 900 + 30 + 22.50;
    } elseif ($grossPay >= 20750 && $grossPay < 21250) {
        return 900 + 30 + 45;
    } elseif ($grossPay >= 21250 && $grossPay < 21750) {
        return 900 + 30 + 67.50;
    } elseif ($grossPay >= 21750 && $grossPay < 22250) {
        return 900 + 30 + 90;
    } elseif ($grossPay >= 22250 && $grossPay < 22750) {
        return 900 + 30 + 112.50;
    } elseif ($grossPay >= 22750 && $grossPay < 23250) {
        return 900 + 30 + 135;
    } elseif ($grossPay >= 23250 && $grossPay < 23750) {
        return 900 + 30 + 157.50;
    } elseif ($grossPay >= 23750 && $grossPay < 24250) {
        return 900 + 30 + 180;
    } elseif ($grossPay >= 24250 && $grossPay < 24750) {
        return 900 + 30 + 202.50;
    } elseif ($grossPay >= 24750 && $grossPay < 25250) {
        return 900 + 30 + 225;
    } elseif ($grossPay >= 25250 && $grossPay < 25750) {
        return 900 + 30 + 247.50;
    } elseif ($grossPay >= 25750 && $grossPay < 26250) {
        return 900 + 30 + 270;
    } elseif ($grossPay >= 26250 && $grossPay < 26750) {
        return 900 + 30 + 292.50;
    } elseif ($grossPay >= 26750 && $grossPay < 27250) {
        return 900 + 30 + 315;
    } elseif ($grossPay >= 27250 && $grossPay < 27750) {
        return 900 + 30 + 337.50;
    } elseif ($grossPay >= 27750 && $grossPay < 28250) {
        return 900 + 30 + 360;
    } elseif ($grossPay >= 28250 && $grossPay < 28750) {
        return 900 + 30 + 382.50;
    } elseif ($grossPay >= 28750 && $grossPay < 29250) {
        return 900 + 30 + 405;
    } elseif ($grossPay >= 29250 && $grossPay < 29750) {
        return 900 + 30 + 427.50;
    } elseif ($grossPay >= 29750) {
        return 900 + 30 + 450;
    }
}

// Function to compute PAGIBIG contribution based on gross pay
function computePAGIBIG($grossPay) {
    if ($grossPay < 1000) {
        return 0.00;
    } elseif ($grossPay >= 1000 && $grossPay < 1500) {
        return $grossPay * 0.01;
    } elseif ($grossPay >= 1500 && $grossPay < 5000) {
        return $grossPay * 0.02;
    } elseif ($grossPay >= 5000) {
        return $grossPay * 0.03;
    }
}

// Function to compute Philhealth contribution based on gross pay
function computePhilhealth($grossPay) {
    return $grossPay * 0.045;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Payroll System</title>
    <link rel="stylesheet" type="text/css" href="assets/style.css">

</head>

<body>
    <section class="main">
        <div class="container">
            <h1>Payroll System</h1>

            <div class="buttons">
                <button id="addEmployeeBtn">ADD EMPLOYEE</button>
                <button id="updateEmployeeBtn">UPDATE EMPLOYEE</button>
                <button id="removeEmployeeBtn">REMOVE EMPLOYEE</button>
                <button id="refreshBtn">REFRESH</button>
            </div>

            <div class="employee-list">
                <table>
                    <th>Employee No.</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Age</th>
                    <th>Rate/Hour</th>
                    <th>No. of Hrs Worked</th>
                    <th>Gross Pay</th>
                    <th>SSS Contributions</th>
                    <th>Philheath</th>
                    <th>Pag ibig</th>
                    <th>Cash Advance</th>
                    <th>Total Deductions</th>
                    <th>Net Pay</th>
                </table>
            </div>

        </div>
    </section>

    <section class="fill">
        <div class="add-employee-section">
            <h2>Add Employee</h2>
            <form method="post">
                <label for="employeeNo">Employee No.</label>
                <input type="text" id="employeeNo" name="employeeNo" required>

                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>

                <label for="address">Address</label>
                <input type="text" id="address" name="address" required>

                <label for="age">Age</label>
                <input type="number" id="age" name="age" required>

                <label for="rate">Rate/Hour</label>
                <input type="number" id="rate" name="rate" required>

                <label for="hoursWorked">No. of Hrs Worked</label>
                <input type="number" id="hoursWorked" name="hoursWorked" required>

                <label for="grossPay">Gross Pay</label>
                <input type="text" id="grossPay" readonly>

                <label for="sssContributions">SSS Contributions</label>
                <input type="number" id="sssContributions" name="sssContributions" readonly>

                <label for="philhealth">Philhealth</label>
                <input type="number" id="philhealth" name="philhealth" readonly>

                <label for="pagIbig">Pag ibig</label>
                <input type="number" id="pagIbig" name="pagIbig" readonly>

                <label for="cashAdvance">Cash Advance</label>
                <input type="number" id="cashAdvance" name="cashAdvance" required>

                <label for="totalDeductions">Total Deductions</label>
                <input type="text" id="totalDeductions" readonly>

                <label for="netPay">Net Pay</label>
                <input type="text" id="netPay" readonly>

                <div class="buttons">
                    <button type="button" id="calculateBtn">CALCULATE</button>
                    <button type="submit" name="submit">SAVE</button>
                    <button type="reset" id="clearBtn">CLEAR</button>
                </div>
            </form>
        </div>

        <div class="update-employee-section">
            <h2>Update Employee</h2>
            <!-- Add the input fields and other content for updating an employee -->
            <!-- You can use a <form> element for the inputs and handle the submission using JavaScript -->
        </div>
        <div class="remove-employee-section">
            <h2>Delete Employee</h2>
            <!-- Add the input fields and other content for updating an employee -->
            <!-- You can use a <form> element for the inputs and handle the submission using JavaScript -->
        </div>
    </section>


    <script src="assets/script.js"></script>
</body>

</html>