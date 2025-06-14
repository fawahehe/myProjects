<?php
include_once 'dbconn.php';
 
if (isset($_GET["DoctorID"])) {
    // Get the unique_id from the URL
    $DoctorID = $_GET["DoctorID"];
 
    // Fetch the retail center details to confirm what will be deleted (optional)
    $query = "SELECT * FROM doctors WHERE DoctorID='$DoctorID'";
    $result = mysqli_query($con, $query);
    $data = mysqli_fetch_assoc($result);
 
    if (!$data) {
        echo "Record not found.";
        echo '<p><a href="doctorlist.php">Back to list</a></p>';
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
 
        .container {
            width: 50%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
 
        .message {
            font-size: 18px;
            margin-bottom: 20px;
            color: #343a40;
        }
 
        .button-container {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
 
        a, button {
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
 
        .confirm-btn {
            background-color: #dc3545;
            color: white;
            border: none;
        }
 
        .cancel-btn {
            background-color: #007bff;
            color: white;
        }
 
        a:hover, button:hover {
            opacity: 0.9;
        }
 
        @media (max-width: 768px) {
            .container {
                width: 90%;
            }
        }
    </style>
    <script>
        function confirmDeletion(DoctorID) {
            if (confirm("Are you sure you want to delete this record?")) {
                // Redirect to the delete action
                window.location.href = "doctor_delete.php?confirm=true&DoctorID=" + DoctorID;
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <p class="message">
            Are you sure you want to delete the record for: <strong><?php echo $data['DoctorName']; ?></strong>?
        </p>
        <div class="button-container">
            <!-- Confirmation button -->
            <button class="confirm-btn" onclick="confirmDeletion('<?php echo $DoctorID; ?>')">Delete</button>
            <!-- Cancel button -->
            <a href="doctorlist.php" class="cancel-btn">Cancel</a>
        </div>
    </div>
</body>
</html>
 
<?php
// Handle confirmed deletion
if (isset($_GET["confirm"]) && $_GET["confirm"] === "true") {
    $sql = "DELETE FROM doctor WHERE DoctorID='" . $_GET["DoctorID"] . "'";
    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Record deleted successfully.');</script>";
        echo '<script>window.location.href = "doctorlist.php";</script>';
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
    mysqli_close($con);
    exit();
}
?>