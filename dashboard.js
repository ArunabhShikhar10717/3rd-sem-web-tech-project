
const showExpenseForm = document.getElementById("showExpenseForm");
const expenseForm = document.getElementById("expenseForm");
const expenseEntryForm = document.getElementById("expenseEntryForm");
const statusSelect = document.getElementById("status");
const paidAmountContainer = document.getElementById("paidAmountContainer");
const expenseTableBody = document.getElementById("expenseTableBody");
let entryCount = 1;

showExpenseForm.addEventListener("click", () => {
    showExpenseForm.style.display = "none"; // Hide the button
    expenseForm.style.display = "block";
});

const hideExpenseForm = () => {
    showExpenseForm.style.display = "block"; // Show the button
    expenseForm.style.display = "none";
    expenseEntryForm.reset();
};

statusSelect.addEventListener("change", () => {
    if (statusSelect.value === "partiallyPaid") {
        paidAmountContainer.style.display = "block";
    } else {
        paidAmountContainer.style.display = "none";
    }
});

document.getElementById("cancel").addEventListener("click", hideExpenseForm);
