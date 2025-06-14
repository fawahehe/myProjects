<!DOCTYPE html>
<html>
<head>
<title>Insert New Doctor</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 600px;
        margin: 50px auto;
        background-color: #fff;
        padding: 20px 30px;
        border-radius: 10px:
        box-shadow: 0 4px, 8px,rgba(0, 0, 0, 0.1);
    }
    h2 {
        text-align: center;
        color: blue;
        margin-bottom: 20px;
    }
    form {
        width: 100%;
    }
    label {
        font-weight: bold;
        display: block;
        margin-bottom: 8px;
        color: #555;
    }
    input[type="text"],
    input[type="email"],
    input[type="file"],
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        transition: border-color 0.3s;
    }
    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="file"]:focus,
    select:focus {
        border-color:#007bff;
        outline: none;
    }
    .button-group {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }
    .btn {
        display: inline-block;
        text-align: center;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
        font-size: 14px;
        font-weight: bold;
        transition: background-color 0.3s, color 0.3s;
    }
    .submit-btn {
        background-color: #4f02df;
        color: white;
    }
    .submit-btn-hover {
        background-color: #0056b3;
    }
    .back-btn {
        background-color: #4f02df;
        color: white;
    }
    .back-btn-hover {
        background-color: #0056b3;
    }
</style>
<body>
<div class="container">
<h2>Insert New Doctor Record</h2>

<form action="doctor_insert_process.php" method="POST" enctype="multipart/form-data">
    <label for="DoctorID">Doctor ID</label>
    <input type="text" name="DoctorID" id="DoctorID" required>

    <label for="DoctorName">Doctor Name</label>
    <input type="text" name="DoctorName" id="DoctorName" required>

    <label for="ContactNo">Contact No</label>
    <input type="text" name="ContactNo" id="ContactNo" required>

    <label for="Email">Email</label>
    <input type="email" name="Email" id="Email" required>

    <label for="Category">Category</label>
    <select name="Category" id="Category" required>
        <option value=""> -- Select Category -- </option>
        <option value="General Pratitioner">General Pratitioner</option>
        <option value="Surgery">Surgery</option>
        <option value="Pediatricion">Pediatricion</option>
        <option value="General Doctor">General Doctor</option>
        <option value="Neurologist">Neurologist</option>
    </select>

    <label for="APC">APC</label>
    <input type="text" name="APC" id="APC" required>  

    <label for="MMC">MMC</label>
    <input type="text" name="MMC" id="MMC" required> 

    <label for="NRICNo">NRIC No</label>
    <input type="text" name="NRICNo" id="NRICNo" required> 

    <label for="Photo">Upload Photo</label>
    <input type="file" name="Photo" id="Photo" accept="image/*"> 

<div class="button-group">
    <button type="submit" class="btn submit-btn">Add Doctor</button>
    <a href="doctorlist.php" class="btn back-btn">Back to list</a>
</div>
</from>
</div>
</body>
</html>
[3:09 pm, 03/12/2024] PA ISMA ISHAK: doctor_insert.php👆
[3:20 pm, 03/12/2024] PA ISMA ISHAK: <?php
include "dbconn.php"; // Include database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $doctorID = $_POST['DoctorID'];
    $doctorName = $_POST['DoctorName'];
    $contactNo = $_POST['ContactNo'];
    $email = $_POST['Email'];
    $category = $_POST['Category'];
    $apc = $_POST['APC'];
    $mmc = $_POST['MMC'];
    $nricNo = $_POST['NRICNo'];

    // Handle file upload
    $photo = $_FILES['Photo']['name'];
    $targetDir = "uploads/"; // Directory to save uploaded files
    $targetFilePath = $targetDir . basename($photo);
    $uploadOk = 1;

    // Check if the directory exists; if not, create it
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    // Move the uploaded file
    if (!empty($photo)) {
        if (move_uploaded_file($_FILES['Photo']['tmp_name'], $targetFilePath)) {
            echo "The file " . htmlspecialchars(basename($photo)) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
            $uploadOk = 0;
        }
    }

    // Insert data into the database
    if ($uploadOk) {
        $sql = "INSERT INTO doctor (DoctorID, DoctorName, ContactNo, Email, Category, APC, MMC, NRICNo, Photo) 
                VALUES ('$doctorID','$doctorName', '$contactNo', '$email', '$category', '$apc', '$mmc', '$nricNo', '$targetFilePath')";

        if (mysqli_query($con, $sql)) {
            echo "Record inserted successfully.";
            header("Location: doctorlist.php"); // Redirect to the doctor list page
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }
}
?>