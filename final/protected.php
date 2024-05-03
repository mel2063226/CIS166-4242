<?php
  // Mindy Benson
  // 5/2/2024
  // CIS166AE Final
  

session_start();

// Check if the user is logged in
if (!isset($_SESSION['valid_user']) || $_SESSION['valid_user'] !== true) {
    // Redirect to error page if not logged in
    header("Location: error.php");
    exit; // Stop further execution
}

// Protected content goes here
echo "Welcome to the protected page!";
?>
