<?php
// Start the session
session_start();

// Destror all session data
session_unset(); // Removes all session veriables
session_destroy(); // Destroy the session

// Redirect to login page
header("Location: login.php");
exit();
?>