<?php
// MEMBERS:
// REGUALOS, JESSIE ALBERT
// YASAY, ANGELO
// TAN, ERIC JOHN

// IT2R9

require './index_php_functions.php';
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll System | REGUALOS | TAN | YASAY</title>
    <link rel="stylesheet" type="text/css" href="assets/style.css">

    <link rel="icon" href="./img/AMBATU.png" type="image/x-icon">

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
                    <tr>
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
                    </tr>
                    <?php
                    // Loop through the database results and generate table rows
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['employee_no'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['address'] . "</td>";
                            echo "<td>" . $row['age'] . "</td>";
                            echo "<td>" . $row['rate_hour'] . "</td>";
                            echo "<td>" . $row['hours_worked'] . "</td>";
                            echo "<td>" . $row['gross_pay'] . "</td>";
                            echo "<td>" . $row['sss_contributions'] . "</td>";
                            echo "<td>" . $row['philhealth'] . "</td>";
                            echo "<td>" . $row['pag_ibig'] . "</td>";
                            echo "<td>" . $row['cash_advance'] . "</td>";
                            echo "<td>" . $row['total_deductions'] . "</td>";
                            echo "<td>" . $row['net_pay'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='13'><center>No employees found</center></td></tr>";
                    }
                    ?>
                </table>
            </div>
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                }
            }
            ?>

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
                <input type="text" id="rate" name="rate" required>

                <label for="hoursWorked">No. of Hrs Worked</label>
                <input type="text" id="hoursWorked" name="hoursWorked" required>

                <label for="grossPay">Gross Pay</label>
                <input type="text" id="grossPay" readonly>

                <label for="sssContributions">SSS Contributions</label>
                <input type="number" id="sssContributions" name="sssContributions" readonly>

                <label for="philhealth">Philhealth</label>
                <input type="number" id="philhealth" name="philhealth" readonly>

                <label for="pagIbig">Pag ibig</label>
                <input type="number" id="pagIbig" name="pagIbig" readonly>

                <label for="cashAdvance">Cash Advance</label>
                <input type="text" id="cashAdvance" name="cashAdvance" required>

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
            <form>
                <label for="updateEmployeeNo">Employee No.</label>
                <input type="text" id="updateEmployeeNo" required>

                <div class="buttons">
                    <button type="button" id="updateRetrieveBtn">RETRIEVE</button>
                </div>

                <label for="updateName">Name</label>
                <input type="text" id="updateName" required>

                <label for="updateAddress">Address</label>
                <input type="text" id="updateAddress" required>

                <label for="updateAge">Age</label>
                <input type="number" id="updateAge" required>

                <label for="updateRate">Rate/Hour</label>
                <input type="text" id="updateRate" required>

                <label for="updateHoursWorked">No. of Hrs Worked</label>
                <input type="text" id="updateHoursWorked" required>

                <label for="updateGrossPay">Gross Pay</label>
                <input type="text" id="updateGrossPay" readonly>

                <label for="updateSSSContributions">SSS Contributions</label>
                <input type="number" id="updateSSSContributions" readonly>

                <label for="updatePhilhealth">Philhealth</label>
                <input type="number" id="updatePhilhealth" readonly>

                <label for="updatePagIbig">Pag ibig</label>
                <input type="number" id="updatePagIbig" readonly>

                <label for="updateCashAdvance">Cash Advance</label>
                <input type="text" id="updateCashAdvance" required>

                <label for="updateTotalDeductions">Total Deductions</label>
                <input type="text" id="updateTotalDeductions" readonly>

                <label for="updateNetPay">Net Pay</label>
                <input type="text" id="updateNetPay" readonly>

                <div class="buttons">
                    <button type="button" id="updateCalculateBtn">CALCULATE</button>
                    <button type="submit" id="updateSaveBtn">SAVE</button>
                    <button type="reset" id="updateClearBtn">CLEAR</button>
                </div>
            </form>
        </div>

        <div class="remove-employee-section">
            <h2>Delete Employee</h2>
            <form id="removeEmployeeForm" method="post">
                <label for="removeEmployeeNo">Employee No.</label>
                <input type="text" id="removeEmployeeNo" name="removeEmployeeNo" required>
                <div class="buttons">
                    <button type="submit" id="removeEmployeeBtn">REMOVE</button>
                </div>
            </form>
        </div>
    </section>


    <script src="assets/script.js"></script>
</body>

</html>