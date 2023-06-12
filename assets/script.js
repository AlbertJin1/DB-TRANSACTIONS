// FOR THE SECTION
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