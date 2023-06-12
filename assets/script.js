// FOR THE SECTION DISPLAY BUTTONS
var addEmployeeBtn = document.getElementById("addEmployeeBtn");
var updateEmployeeBtn = document.getElementById("updateEmployeeBtn");
var removeEmployeeBtn = document.getElementById("removeEmployeeBtn");
var addEmployeeSection = document.querySelector(".add-employee-section");
var updateEmployeeSection = document.querySelector(".update-employee-section");
var removeEmployeeSection = document.querySelector(".remove-employee-section");

addEmployeeBtn.addEventListener("click", function () {
    addEmployeeSection.style.display = "block";
    updateEmployeeSection.style.display = "none";
    removeEmployeeSection.style.display = "none";
});

updateEmployeeBtn.addEventListener("click", function () {
    updateEmployeeSection.style.display = "block";
    addEmployeeSection.style.display = "none";
    removeEmployeeSection.style.display = "none";
});

removeEmployeeBtn.addEventListener("click", function () {
    updateEmployeeSection.style.display = "none";
    addEmployeeSection.style.display = "none";
    removeEmployeeSection.style.display = "block";
});

// REFRESH
var refreshBtn = document.getElementById("refreshBtn");

refreshBtn.addEventListener("click", function () {
    location.reload('index.php');
});

// CALCULATIONS FOR ADD
var rateInput = document.getElementById("rate");
var hoursWorkedInput = document.getElementById("hoursWorked");
var grossPayInput = document.getElementById("grossPay");
var sssContributionsInput = document.getElementById("sssContributions");
var philhealthInput = document.getElementById("philhealth");
var pagIbigInput = document.getElementById("pagIbig");
var cashAdvanceInput = document.getElementById("cashAdvance");
var totalDeductionsInput = document.getElementById("totalDeductions");
var netPayInput = document.getElementById("netPay");
var calculateBtn = document.getElementById("calculateBtn");

calculateBtn.addEventListener("click", function () {
    var rate = parseFloat(rateInput.value);
    var hoursWorked = parseFloat(hoursWorkedInput.value);
    var cashAdvance = parseFloat(cashAdvanceInput.value);

    var grossPay = rate * hoursWorked;
    var sssContributions = calculateSSS(grossPay);
    var philhealth = calculatePhilhealth(grossPay);
    var pagIbig = calculatePAGIBIG(grossPay);
    var totalDeductions = sssContributions + philhealth + pagIbig + cashAdvance;
    var netPay = grossPay - totalDeductions;

    grossPayInput.value = grossPay.toFixed(2);
    sssContributionsInput.value = sssContributions.toFixed(2);
    philhealthInput.value = philhealth.toFixed(2);
    pagIbigInput.value = pagIbig.toFixed(2);
    totalDeductionsInput.value = totalDeductions.toFixed(2);
    netPayInput.value = netPay.toFixed(2);
});

// CALCULATIONS FOR UPDATE
var updateRateInput = document.getElementById("updateRate");
var updateHoursWorkedInput = document.getElementById("updateHoursWorked");
var updateGrossPayInput = document.getElementById("updateGrossPay");
var updateSSSContributionsInput = document.getElementById("updateSSSContributions");
var updatePhilhealthInput = document.getElementById("updatePhilhealth");
var updatePagIbigInput = document.getElementById("updatePagIbig");
var updateCashAdvanceInput = document.getElementById("updateCashAdvance");
var updateTotalDeductionsInput = document.getElementById("updateTotalDeductions");
var updateNetPayInput = document.getElementById("updateNetPay");
var updateCalculateBtn = document.getElementById("updateCalculateBtn");

updateCalculateBtn.addEventListener("click", function () {
    var rate = parseFloat(updateRateInput.value);
    var hoursWorked = parseFloat(updateHoursWorkedInput.value);
    var cashAdvance = parseFloat(updateCashAdvanceInput.value);

    var grossPay = rate * hoursWorked;
    var sssContributions = calculateSSS(grossPay);
    var philhealth = calculatePhilhealth(grossPay);
    var pagIbig = calculatePAGIBIG(grossPay);
    var totalDeductions = sssContributions + philhealth + pagIbig + cashAdvance;
    var netPay = grossPay - totalDeductions;

    updateGrossPayInput.value = grossPay.toFixed(2);
    updateSSSContributionsInput.value = sssContributions.toFixed(2);
    updatePhilhealthInput.value = philhealth.toFixed(2);
    updatePagIbigInput.value = pagIbig.toFixed(2);
    updateTotalDeductionsInput.value = totalDeductions.toFixed(2);
    updateNetPayInput.value = netPay.toFixed(2);
});

function calculateSSS(grossPay) {
    if (grossPay < 4250) {
        return 180 + 10;
    } else if (grossPay < 4750) {
        return 202.50 + 10;
    } else if (grossPay < 5250) {
        return 225 + 10;
    } else if (grossPay < 5750) {
        return 247.50 + 10;
    } else if (grossPay < 6250) {
        return 270 + 10;
    } else if (grossPay < 6750) {
        return 292.50 + 10;
    } else if (grossPay < 7250) {
        return 315 + 10;
    } else if (grossPay < 7750) {
        return 337.50 + 10;
    } else if (grossPay < 8250) {
        return 360 + 10;
    } else if (grossPay < 8750) {
        return 382.50 + 10;
    } else if (grossPay < 9250) {
        return 405 + 10;
    } else if (grossPay < 9750) {
        return 427.50 + 10;
    } else if (grossPay < 10250) {
        return 450 + 10;
    } else if (grossPay < 10750) {
        return 472.50 + 10;
    } else if (grossPay < 11250) {
        return 495 + 10;
    } else if (grossPay < 11750) {
        return 517.50 + 10;
    } else if (grossPay < 12250) {
        return 540 + 10;
    } else if (grossPay < 12750) {
        return 562.50 + 10;
    } else if (grossPay < 13250) {
        return 585 + 10;
    } else if (grossPay < 13750) {
        return 607.50 + 10;
    } else if (grossPay < 14250) {
        return 630 + 10;
    } else if (grossPay < 14750) {
        return 652.50 + 10;
    } else if (grossPay < 15250) {
        return 675 + 30;
    } else if (grossPay < 15750) {
        return 697.50 + 30;
    } else if (grossPay < 16250) {
        return 720 + 30;
    } else if (grossPay < 16750) {
        return 742.50 + 30;
    } else if (grossPay < 17250) {
        return 765 + 30;
    } else if (grossPay < 17750) {
        return 787.50 + 30;
    } else if (grossPay < 18250) {
        return 810 + 30;
    } else if (grossPay < 18750) {
        return 832.50 + 30;
    } else if (grossPay < 19250) {
        return 855 + 30;
    } else if (grossPay < 19750) {
        return 877.50 + 30;
    } else if (grossPay < 20250) {
        return 900 + 30;
    } else if (grossPay < 20750) {
        return 900 + 30 + 22.50;
    } else if (grossPay < 21250) {
        return 900 + 30 + 45;
    } else if (grossPay < 21750) {
        return 900 + 30 + 67.50;
    } else if (grossPay < 22250) {
        return 900 + 30 + 90;
    } else if (grossPay < 22750) {
        return 900 + 30 + 112.50;
    } else if (grossPay < 23250) {
        return 900 + 30 + 135;
    } else if (grossPay < 23750) {
        return 900 + 30 + 157.50;
    } else if (grossPay < 24250) {
        return 900 + 30 + 180;
    } else if (grossPay < 24750) {
        return 900 + 30 + 202.50;
    } else if (grossPay < 25250) {
        return 900 + 30 + 225;
    } else if (grossPay < 25750) {
        return 900 + 30 + 247.50;
    } else if (grossPay < 26250) {
        return 900 + 30 + 270;
    } else if (grossPay < 26750) {
        return 900 + 30 + 292.50;
    } else if (grossPay < 27250) {
        return 900 + 30 + 315;
    } else if (grossPay < 27750) {
        return 900 + 30 + 337.50;
    } else if (grossPay < 28250) {
        return 900 + 30 + 360;
    } else if (grossPay < 28750) {
        return 900 + 30 + 382.50;
    } else if (grossPay < 29250) {
        return 900 + 30 + 405;
    } else if (grossPay < 29750) {
        return 900 + 30 + 427.50;
    } else {
        return 900 + 30 + 450;
    }
}

function calculatePAGIBIG(grossPay) {
    if (grossPay < 1000) {
        return 0.00;
    } else if (grossPay < 1500) {
        return grossPay * 0.01;
    } else if (grossPay < 5000) {
        return grossPay * 0.02;
    } else {
        return grossPay * 0.03;
    }
}

function calculatePhilhealth(grossPay) {
    return grossPay * 0.045;
}

// CLEAR
document.getElementById("clearBtn").addEventListener("click", function () {
    document.getElementById("employeeNo").value = "";
    document.getElementById("name").value = "";
    document.getElementById("address").value = "";
    document.getElementById("age").value = "";
    document.getElementById("rate").value = "";
    document.getElementById("hoursWorked").value = "";
    document.getElementById("grossPay").value = "";
    document.getElementById("sssContributions").value = "";
    document.getElementById("philhealth").value = "";
    document.getElementById("pagIbig").value = "";
    document.getElementById("cashAdvance").value = "";
    document.getElementById("totalDeductions").value = "";
    document.getElementById("netPay").value = "";
});

// Update Retrieve button click event
document.getElementById('updateRetrieveBtn').addEventListener('click', function () {
    // Get the employee number input value
    var employeeNo = document.getElementById('updateEmployeeNo').value;

    // Create an XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Prepare the request
    xhr.open('GET', 'get_employee.php?employeeNo=' + employeeNo, true);

    // Set the response type to JSON
    xhr.responseType = 'json';

    // Define the onload event handler
    xhr.onload = function () {
        // Check if the request was successful
        if (xhr.status === 200) {
            // Retrieve the employee data from the response
            var employeeData = xhr.response;

            // Update the form fields with the retrieved data
            document.getElementById('updateName').value = employeeData.name;
            document.getElementById('updateAddress').value = employeeData.address;
            document.getElementById('updateAge').value = employeeData.age;
            document.getElementById('updateRate').value = employeeData.rate_hour;
            document.getElementById('updateHoursWorked').value = employeeData.hours_worked;
            document.getElementById('updateGrossPay').value = employeeData.gross_pay;
            document.getElementById('updateSSSContributions').value = employeeData.sss_contributions;
            document.getElementById('updatePhilhealth').value = employeeData.philhealth;
            document.getElementById('updatePagIbig').value = employeeData.pag_ibig;
            document.getElementById('updateCashAdvance').value = employeeData.cash_advance;
            document.getElementById('updateTotalDeductions').value = employeeData.total_deductions;
            document.getElementById('updateNetPay').value = employeeData.net_pay;
        } else {
            // Display an error message
            console.log('Error: ' + xhr.status);
        }
    };

    // Send the request
    xhr.send();
});

// Update Save button click event
document.getElementById('updateSaveBtn').addEventListener('click', function () {
    // Get the form and form fields
    var form = document.getElementById('updateEmployeeForm');
    var employeeNo = document.getElementById('updateEmployeeNo').value;
    var name = document.getElementById('updateName').value;
    var address = document.getElementById('updateAddress').value;
    var age = document.getElementById('updateAge').value;
    var rate = document.getElementById('updateRate').value;
    var hoursWorked = document.getElementById('updateHoursWorked').value;
    var grossPay = document.getElementById('updateGrossPay').value;
    var sssContributions = document.getElementById('updateSSSContributions').value;
    var philhealth = document.getElementById('updatePhilhealth').value;
    var pagIbig = document.getElementById('updatePagIbig').value;
    var cashAdvance = document.getElementById('updateCashAdvance').value;
    var totalDeductions = document.getElementById('updateTotalDeductions').value;
    var netPay = document.getElementById('updateNetPay').value;

    // Create an XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Prepare the request
    xhr.open('POST', 'update_employee.php', true);

    // Set the request header
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // Define the onload event handler
    xhr.onload = function () {
        // Check if the request was successful
        if (xhr.status === 200) {
            // Display a success message
            console.log('Employee updated successfully!');
        } else {
            // Display an error message
            console.log('Error: ' + xhr.status);
        }
    };

    // Create the request body
    var requestBody = 'employeeNo=' + encodeURIComponent(employeeNo) +
        '&name=' + encodeURIComponent(name) +
        '&address=' + encodeURIComponent(address) +
        '&age=' + encodeURIComponent(age) +
        '&rate=' + encodeURIComponent(rate) +
        '&hoursWorked=' + encodeURIComponent(hoursWorked) +
        '&grossPay=' + encodeURIComponent(grossPay) +
        '&sssContributions=' + encodeURIComponent(sssContributions) +
        '&philhealth=' + encodeURIComponent(philhealth) +
        '&pagIbig=' + encodeURIComponent(pagIbig) +
        '&cashAdvance=' + encodeURIComponent(cashAdvance) +
        '&totalDeductions=' + encodeURIComponent(totalDeductions) +
        '&netPay=' + encodeURIComponent(netPay);

    // Send the request
    xhr.send(requestBody);
});