<?php
include "dbconn.php"; // Include the database connection
 
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
 
    // Handle photo upload
    $photo = $_FILES['photo']['name'];
    if ($photo) {
        // If a new photo is uploaded, move it to the server
        $targetDir = "uploads/"; // relative path
        $targetFilePath = $targetDir . basename($photo);
 
        // Move the uploaded file to the target directory
        if (!move_uploaded_file($_FILES['photo']['tmp_name'], $targetFilePath)) {
            echo "Failed to upload photo.";
            exit;
        }
    } else {
        // If no photo is uploaded, keep the old photo
        $sql = "SELECT Photo FROM doctors WHERE DoctorID = '$doctorID'";
        $result = mysqli_query($con, $sql);
        $data = mysqli_fetch_assoc($result);
        $targetFilePath = $data['Photo'];
    }
 
    // Update the doctor's record in the database
    $sql = "UPDATE doctors 
            SET DoctorName = '$doctorName', ContactNo = '$contactNo', Email = '$email', Category = '$category', APC = '$apc', MMC = '$mmc', NRICNo = '$nricNo', Photo = '$targetFilePath' 
            WHERE DoctorID = '$doctorID'";
 
    if (mysqli_query($con, $sql)) {
        echo "Record updated successfully.";
        header("Location: doctor_view.php?DoctorID=$doctorID");
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}
?>