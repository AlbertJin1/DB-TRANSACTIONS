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
    location.reload();
});

// CALCULATIONS
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

