<?php
  // Mindy Benson
  // 4/24/2024
  // CIS166AE Module 13
     // Start the session. 
     session_start();
  
  // Include the LoginBox class definition.
   require_once 'loginBox.php';
   include_once 'dbh.inc.php';
  
      

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
  <h1>Sign Up</h1>
  
  <?php
    // Initialize LoginBox object
    $loginBox = new LoginBox();

    try {
        // Check if form is submitted.
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $first = mysqli_real_escape_string($conn, $_POST['first_name']);
            $last = mysqli_real_escape_string($conn, $_POST['last_name']);
            $user = mysqli_real_escape_string($conn, $_POST['username']);
            $mail = mysqli_real_escape_string($conn, $_POST['email']); 
            $cell = mysqli_real_escape_string($conn, $_POST['phone']); 
            $pass = mysqli_real_escape_string($conn, $_POST['password']);
     
        if ($loginBox->createAccount($conn, $first, $last, $user, $mail, $cell, $pass)) {
            // Redirect to success page if authentication is successful.
            echo "Account Created!";
        } else {
            // Redirect to failed page if authentication fails.
            $loginBox->failRedirect();
        }      
      }



// Displays the login form using LoginBox object.
$accountForm = $loginBox->getAccountForm();
echo $accountForm;
echo '<br/><br/><a href="index.php">Return to Login Page</a>';
    }
    catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }

?>


</body>
</html>