<?php
include "dbconn.php"; // Include the database connection
 
// Check if DoctorID is passed in the URL
if (isset($_GET['DoctorID'])) {
    $doctorID = $_GET['DoctorID'];
 
    // Fetch the doctor's details from the database
    $sql = "SELECT * FROM doctors WHERE DoctorID = '$doctorID'";
    $result = mysqli_query($con, $sql);
 
    // If a record is found
    if ($data = mysqli_fetch_assoc($result)) {
        // Store the data in variables
        $doctorName = $data['DoctorName'];
        $contactNo = $data['ContactNo'];
        $email = $data['Email'];
        $category = $data['Category'];
        $apc = $data['APC'];
        $mmc = $data['MMC'];
        $nricNo = $data['NRICNo'];
        $photo = $data['Photo'];  // Path to the uploaded photo
    } else {
        echo "No record found.";
        exit;
    }
} else {
    echo "No Doctor ID provided.";
    exit;
}
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Edit Doctor Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
 
        .container {
            max-width: 900px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
 
        h2 {
            text-align: center;
            color: #333;
        }
 
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
 
        table, th, td {
            border: 1px solid #ddd;
        }
 
        th, td {
            padding: 12px;
            text-align: left;
        }
 
        th {
            background-color: #f2f2f2;
        }
 
        td {
            background-color: #fafafa;
        }
 
        .submit-btn {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
 
        .submit-btn:hover {
            background-color: #2980b9;
        }
 
        .back-button {
            margin-top: 20px;
            text-align: center;
        }
 
        .back-button a {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
 
        .back-button a:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
 
<div class="container">
    <h2>Edit Doctor Record</h2>
 
    <!-- Display photo if it exists -->
    <?php if ($photo): ?>
        <img src="<?php echo $photo; ?>" alt="Doctor's Photo" class="doctor-photo" style="max-width: 150px; border-radius: 50%; display: block; margin: 20px auto;">
    <?php endif; ?>
 
    <form action="doctor_edit_process.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="DoctorID" value="<?php echo $doctorID; ?>">
 
        <table>
            <tr>
                <th>Doctor Name</th>
                <td><input type="text" name="DoctorName" size="50" value="<?php echo htmlspecialchars($doctorName); ?>" required></td>
            </tr>
            <tr>
                <th>Contact No</th>
                <td><input type="text" name="ContactNo" size="50" value="<?php echo htmlspecialchars($contactNo); ?>" required></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><input type="email" name="Email" size="50" value="<?php echo htmlspecialchars($email); ?>" required></td>
            </tr>
            <tr>
                <th>Category</th>
                <td>
                <select id="category" name="Category" required>
                    <option value="General Practitioner">General Practitioner</option>
                    <option value="Specialist">Specialist</option>
                    <option value="Surgeon">Surgeon</option>
                    <option value="Pediatrician">Pediatrician</option>
                    <!-- Add more categories if necessary -->
                </select>
                </td>
            </tr>
            <tr>
                <th>APC</th>
                <td><input type="text" name="APC" size="50" value="<?php echo htmlspecialchars($apc); ?>" required></td>
            </tr>
            <tr>
                <th>MMC</th>
                <td><input type="text" name="MMC" size="50" value="<?php echo htmlspecialchars($mmc); ?>" required></td>
            </tr>
            <tr>
                <th>NRIC No</th>
                <td><input type="text" name="NRICNo" size="50" value="<?php echo htmlspecialchars($nricNo); ?>" required></td>
            </tr>
            <tr>
                <th>Photo</th>
                <td><input type="file" name="photo"></td>
            </tr>
        </table>
 
        <div style="text-align: center;">
            <button type="submit" class="submit-btn">Update Record</button>
        </div>
    </form>
 
    <div class="back-button">
        <a href="doctorlist.php">Back to Doctor List</a>
    </div>
</div>
 
</body>
</html>