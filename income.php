<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Financial Tracker</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 20px;
        background-color: #ecf0f1; /* Light Gray Background */
        color: #34495e; /* Dark Gray Text */
    }

    h1 {
        color: #3498db; /* Blue Heading */
        text-align: center;
    }

    /* Container for the page */
    #container {
        max-width: 800px;
        margin: auto;
    }

    /* Styles for each section */
    .section {
        background-color: #fff;
        border: 1px solid #bdc3c7; /* Light Gray Border */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 8px;
    }

    #recordForm, #records, #summary, #charts, #budgetForm {
        width: 100%;
    }

    h2 {
        color: #3498db; /* Blue Heading */
    }

    h3 {
        color: #e74c3c; /* Red Text */
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: #3498db; /* Blue Label Text */
    }

    input,
    select {
        width: calc(100% - 22px); /* Adjusted width for better alignment */
        padding: 10px;
        margin-bottom: 15px;
        box-sizing: border-box;
        border: 1px solid #bdc3c7; /* Light Gray Border */
        border-radius: 4px;
    }

    button {
        background-color: #3498db; /* Blue Background */
        color: #fff; /* White Text */
        padding: 10px;
        border: none;
        cursor: pointer;
        border-radius: 4px;
        width: calc(100% - 22px); /* Adjusted width for better alignment */
    }

    button:hover {
        background-color: #2980b9; /* Darker Blue Background on Hover */
    }

    /* Records section */
    .icons {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .delete-button,
    .update-button {
        background-color: #3498db;
        border: none;
        cursor: pointer;
        font-size: 18px;
        color: #fff;
        margin-right: 10px;
        padding: 8px;
        border-radius: 4px;
        transition: background-color 0.3s;
    }

    .update-button {
        color: #fff;
        background-color: #2ecc71;
    }

    .update-button:hover,
    .delete-button:hover {
        background-color: #c0392b; /* Darker Red Background on Hover */
    }

    /* Chart section */
    #charts {
        text-align: center;
    }

    /* Adjusted size for a more professional appearance */
    #myChart {
        width: 70%;
        height: 70%;
    }

    /* Budget form section */
    #budgetForm {
        text-align: center;
    }


    .container-fluid {
        overflow: hidden;
    }

    .topnav {
        background-color: #0092DB;
        position: relative;
    }

    .topnav a {
        float: left;
        display: block;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    .topnav a:hover {
        background-color: #ddd;
        color: black;
    }

</style>
</head>

<body>

<div class="container-fluid topnav">
    <!-- Top Navigation Bar -->
    <a href="index.php">Home</a>
    <a href="profile.php">Profile</a>
    <a href="rules.html">GST Rules</a>
    <a href="rates.html">GST Rates</a>
    <a href="act.html">GST Act</a>
    <a href="expenses.html">Expences</a>
    <a href="income.php">Income</a>
    <a href="supplies.html">Supplies</a>
    <a href="chatpage.php">Discussion Forum</a>
    <a href="logout.php">Logout</a>
</div>
<h1>Financial Tracker</h1>
<div id="container">
    <!-- Record Form Section -->
    <div id="recordForm" class="section">
        <h2>Add New Record</h2>
        <label for="description">Description:</label>
        <input type="text" id="description" placeholder="Enter description">

        <label for="amount">Amount:</label>
        <input type="number" id="amount" placeholder="Enter amount">

        <label for="type">Type:</label>
        <select id="type">
            <option value="income">Income</option>
            <option value="expense">Expense</option>
        </select>

        <!-- Added Date Field -->
        <label for="date">Date:</label>
        <input type="date" id="date">

        <!-- Added Categories Field -->
        <label for="category">Category:</label>
        <input type="text" id="category" placeholder="Enter category">

        <button onclick="addRecord()">Add Record</button>
    </div>

    <!-- Records Section -->
    <div id="records" class="section">
        <h2>Records</h2>
        <div id="incomeList">
            <h3>Income</h3>
            <div id="incomeRecords"></div>
        </div>
        <div id="expenseList">
            <h3>Expenses</h3>
            <div id="expenseRecords"></div>
        </div>
    </div>

    <!-- Charts Section -->
    <div id="charts" class="section">
        <h2>Spending Patterns</h2>
        <canvas id="myChart" width="400" height="200"></canvas>
    </div>

    <!-- Budget Form Section -->
    <div id="budgetForm" class="section">
        <h2>Budget Tracking</h2>
        <label for="budget">Monthly Budget:</label>
        <input type="number" id="budget" placeholder="Enter monthly budget">
        <button onclick="setBudget()">Set Budget</button>
    </div>

    <!-- Summary Section -->
    <div id="summary" class="section">
        <h2>Monthly Summary</h2>
        <div class="summary-item total-spent">
            <span>Total Spent:</span>
            <span id="totalSpent">₹0.00</span>
        </div>
        <div class="summary-item remaining-balance">
            <span>Remaining Balance:</span>
            <span id="remainingBalance">₹0.00</span>
        </div>
        <div class="summary-item savings">
            <span>Savings:</span>
            <span id="savings">₹0.00</span>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var totalIncome = 0;
    var totalExpense = 0;

    function addRecord() {
        var description = document.getElementById('description').value;
        var amount = parseFloat(document.getElementById('amount').value) || 0;
        var type = document.getElementById('type').value;
        var date = document.getElementById('date').value;
        var category = document.getElementById('category').value;

        if (description.trim() === '' || isNaN(amount) || amount <= 0 || date === '' || category.trim() === '') {
            alert('Please enter valid details.');
            return;
        }

        var recordItem = document.createElement('div');
        recordItem.classList.add('record-item');
        recordItem.innerHTML = '<span>' + description + '</span>' +
            '<span class="' + type + '">₹' + amount.toFixed(2) + '</span>' +
            '<div class="icons">' +
            '<button class="delete-button" onclick="deleteRecord(this)"><i class="fas fa-trash-alt"></i></button>' +
            '<button class="update-button" onclick="updateRecord(this)"><i class="fas fa-edit"></i></button>' +
            '</div>';

        if (type === 'income') {
            document.getElementById('incomeRecords').appendChild(recordItem);
            totalIncome += amount;
        } else {
            document.getElementById('expenseRecords').appendChild(recordItem);
            totalExpense += amount;
        }

        updateSummary();
        // Clear input fields
        document.getElementById('description').value = '';
        document.getElementById('amount').value = '';
        document.getElementById('date').value = '';
        document.getElementById('category').value = '';
    }

    function deleteRecord(button) {
        var recordItem = button.parentElement.parentElement;
        var type = recordItem.querySelector('span:last-child').classList.contains('income') ? 'income' : 'expense';
        var amount = parseFloat(recordItem.querySelector('span:last-child').innerText.replace('₹', ''));

        recordItem.remove();
        if (type === 'income') {
            totalIncome -= amount;
        } else {
            totalExpense -= amount;
        }

        updateSummary();
    }

    function updateRecord(button) {
        var recordItem = button.parentElement.parentElement;
        var description = recordItem.querySelector('span:first-child').innerText;
        var amount = parseFloat(recordItem.querySelector('span:last-child').innerText.replace('₹', ''));
        var type = recordItem.querySelector('span:last-child').classList.contains('income') ? 'income' : 'expense';

        // Set values in the form for editing
        document.getElementById('description').value = description;
        document.getElementById('amount').value = amount;
        document.getElementById('type').value = type;
        document.getElementById('date').value = '';
        document.getElementById('category').value = '';

        // Delete the existing record
        deleteRecord(button);
    }

    function updateSummary() {
        var incomeItems = document.querySelectorAll('#incomeRecords .record-item');
        var expenseItems = document.querySelectorAll('#expenseRecords .record-item');

        var totalSpent = totalIncome + totalExpense;
        var remainingBalance = totalIncome - totalExpense;
        var savings = totalIncome - totalSpent;

        document.getElementById('totalSpent').innerText = '₹' + totalSpent.toFixed(2);
        document.getElementById('remainingBalance').innerText = '₹' + remainingBalance.toFixed(2);
        document.getElementById('savings').innerText = '₹' + savings.toFixed(2);

        updateChart();
    }

    function updateChart() {
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Income', 'Expenses'],
                datasets: [{
                    data: [totalIncome, totalExpense],
                    backgroundColor: ['#2ecc71', '#e74c3c']
                }]
            }
        });
    }

    function setBudget() {
        var budget = parseFloat(document.getElementById('budget').value) || 0;

        if (isNaN(budget) || budget <= 0) {
            alert('Please enter a valid budget.');
            return;
        }

        var remainingBalance = budget - totalExpense;
        document.getElementById('remainingBalance').innerText = '₹' + remainingBalance.toFixed(2);
    }
</script>
</body>

</html>
