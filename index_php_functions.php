<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'payroll';


$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// READ EMPLOYEES TABLE
$sql = "SELECT * FROM employees";
$result = $conn->query($sql);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // CHECK ADD EMPLOYEE
    if (isset($_POST['employeeNo'], $_POST['name'], $_POST['address'], $_POST['age'], $_POST['rate'], $_POST['hoursWorked'], $_POST['cashAdvance'])) {
        $employeeNo = $_POST['employeeNo'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $age = $_POST['age'];
        $rate = floatval($_POST['rate']);
        $hoursWorked = floatval($_POST['hoursWorked']);
        $cashAdvance = floatval($_POST['cashAdvance']);

        // CALCU
        $grossPay = $rate * $hoursWorked;
        $sssContributions = computeSSS($grossPay);
        $philhealth = computePhilhealth($grossPay);
        $pagIbig = computePAGIBIG($grossPay);
        $cashAdvance = $_POST['cashAdvance'];
        $totalDeductions = $sssContributions + $philhealth + $pagIbig + $cashAdvance;
        $netPay = $grossPay - $totalDeductions;

        // SAVE TO DATABASE
        $sql = "INSERT INTO employees (employee_no, name, address, age, rate_hour, hours_worked, gross_pay, sss_contributions, philhealth, pag_ibig, cash_advance, total_deductions, net_pay)
                VALUES ('$employeeNo', '$name', '$address', '$age', '$rate', '$hoursWorked', '$grossPay', '$sssContributions', '$philhealth', '$pagIbig', '$cashAdvance', '$totalDeductions', '$netPay')";
        if ($conn->query($sql) === true) {
            $error[] = 'EMPLOYEE SAVED SUCCESSFULLY!';
        } else {
            $error[] = 'WE ENCOUNTERED AN ERROR :<';
        }
    }

    // CHECK REMOVE EMPLOYEE
    if (isset($_POST['removeEmployeeNo'])) {
        $removeEmployeeNo = $_POST['removeEmployeeNo'];

        // REMOVE FROM DATABASE
        $sql = "DELETE FROM employees WHERE employee_no = '$removeEmployeeNo'";
        if ($conn->query($sql) === true) {
            $error[] = 'EMPLOYEE REMOVED SUCCESSFULLY!';
        } else {
            $error[] = 'WE ENCOUNTERED AN ERROR :<';
        }
    }

    // REDIRECT TO SAME PAGE
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// RETRIEVE INFO
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the retrieve button is clicked
    if (isset($_POST['updateRetrieveBtn'])) {
        $employeeNo = $_POST['updateEmployeeNo'];

        // RETRIEVE INFO FROM DATABASe
        $sql = "SELECT * FROM employees WHERE employee_no = '$employeeNo'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $employee = $result->fetch_assoc();

            // POPULATE ENTRY FIELD FROM RETRIEVED INFO
            $name = $employee['name'];
            $address = $employee['address'];
            $age = $employee['age'];
            $rate = $employee['rate_hour'];
            $hoursWorked = $employee['hours_worked'];
            $grossPay = $employee['gross_pay'];
            $sssContributions = $employee['sss_contributions'];
            $philhealth = $employee['philhealth'];
            $pagIbig = $employee['pag_ibig'];
            $cashAdvance = $employee['cash_advance'];
            $totalDeductions = $employee['total_deductions'];
            $netPay = $employee['net_pay'];

            // ECHO VALUES FROM JSCRIPT
            echo json_encode(array(
                'name' => $name,
                'address' => $address,
                'age' => $age,
                'rate' => $rate,
                'hoursWorked' => $hoursWorked,
                'grossPay' => $grossPay,
                'sssContributions' => $sssContributions,
                'philhealth' => $philhealth,
                'pagIbig' => $pagIbig,
                'cashAdvance' => $cashAdvance,
                'totalDeductions' => $totalDeductions,
                'netPay' => $netPay
            ));
            exit();
        } else {
            echo json_encode(array('error' => 'Employee not found'));
            exit();
        }
    }
}

// REMOVE AN EMPLOYEE
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     if (isset($_POST['removeEmployeeNo'])) {
//         $removeEmployeeNo = $_POST['removeEmployeeNo'];

//         // Remove the employee from the database
//         $sql = "DELETE FROM employees WHERE employee_no = '$removeEmployeeNo'";
//         if ($conn->query($sql) === true) {
//             echo "Employee removed successfully!";
//         } else {
//             echo "Error: " . $sql . "<br>" . $conn->error;
//         }
//     }
// }

// COMPUTE
function computeSSS($grossPay)
{
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

function computePAGIBIG($grossPay)
{
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

function computePhilhealth($grossPay)
{
    return $grossPay * 0.045;
}
?>