<?php
// Step 1: Start the session
session_start();

// Step 2: Clear all session variables
$_SESSION = array();

// Step 3: Destroy the session
session_destroy();

// Step 4: Redirect the user to the desired page
header("Location: Donor login page.php"); 

exit(); // Make sure to call exit() to prevent further script execution
?>