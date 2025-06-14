<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Clinic Management System - Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .header {
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .header p {
            margin: 5px 0;
        }

        .container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin: 30px auto;
            max-width: 1200px;
        }

        .card {
            background-color: white;
            width: 250px;
            margin: 20px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card h2 {
            font-size: 18px;
            margin: 10px 0;
            color: #4CAF50;
        }

        .card p {
            font-size: 14px;
            color: #555;
        }

        .card a {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            font-size: 14px;
            color: white;
            background-color: #4CAF50;
            text-decoration: none;
            border-radius: 5px;
        }

        .card a:hover {
            background-color: #45a049;
        }

        .logout {
            text-align: center;
            margin-top: 20px;
        }

        .logout a {
            color: white;
            background-color: #e74c3c;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
        }

        .logout a:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>Welcome to Clinic Management System</h1>
    <p>Logged in as: <strong><?php echo $_SESSION['username']; ?></strong></p>
</div>

<div class="container">
    <!-- Doctors Section -->
    <div class="card">
        <h2>Doctor Records</h2>
        <p>Manage information about clinic doctors.</p>
        <a href="doctorlist.php">View Doctors</a>
    </div>

    <!-- Patients Section -->
    <div class="card">
        <h2>Patient Records</h2>
        <p>Manage information about clinic patients.</p>
        <a href="patient_list.php">View Patients</a>
    </div>

    <!-- Medications Section -->
    <div class="card">
        <h2>Medications</h2>
        <p>Manage medication inventory and details.</p>
        <a href="medication_list.php">View Medications</a>
    </div>

    <!-- Visits Section -->
    <div class="card">
        <h2>Visits</h2>
        <p>Manage patient visits and consultations.</p>
        <a href="visit_list.php">View Visits</a>
    </div>

    <!-- USer Section -->
    <div class="card">
        <h2>Users</h2>
        <p>Manage user of the system.</p>
        <a href="user_list.php">View Visits</a>
    </div>
</div>

<div class="logout">
    <a href="logout.php">Logout</a>
</div>

</body>
</html>