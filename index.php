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
            <form action="process.php" method="post">
                <label for="employee_no">Employee No:</label>
                <input type="text" id="employee_no" name="employee_no" required>

                <label for="employee_name">Employee's Name:</label>
                <input type="text" id="employee_name" name="employee_name" required>

                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>

                <label for="age">Age:</label>
                <input type="number" id="age" name="age" required>

                <label for="rate_hour">Rate/hour:</label>
                <input type="number" id="rate_hour" name="rate_hour" required>

                <label for="hrs_worked">No. of Hrs Worked:</label>
                <input type="number" id="hrs_worked" name="hrs_worked" required>

                <label for="sss_contributions">SSS Contributions:</label>
                <input type="number" id="sss_contributions" name="sss_contributions" required>

                <label for="phil_health">Phil Health:</label>
                <input type="number" id="phil_health" name="phil_health" required>

                <label for="pag_ibig">Pag-ibig:</label>
                <input type="number" id="pag_ibig" name="pag_ibig" required>

                <label for="cash_advance">Cash Advance:</label>
                <input type="number" id="cash_advance" name="cash_advance" required>

                <button type="button" onclick="calculate()">Calculate</button>
                <button type="reset">Clear</button>
                <button type="submit">Submit</button>
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