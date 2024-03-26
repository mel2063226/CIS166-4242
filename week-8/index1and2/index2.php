<?php
// Mindy Benson
// 3/25/2024
// CIS166AE Module 9

// Include the LoginBox class definition.
require_once 'loginBox.php'; 

// Start the session.
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    
    <?php
    // Initialize LoginBox object.
    $loginBox = new LoginBox();

   /** Setting the submit button to "check me" using the LoginBox object 
     * and setting the value using your set function.*/
    $loginBox->$label = "Check Me";

     // Check if form is submitted.
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Retrieve the form data.
      $username = $_POST["username"] ?? NULL;
      $password = $_POST["password"] ?? NULL;
       
      if ($loginBox->authenticate($username, $password)) {
        // Redirect to success page if authentication is successful.
        $loginBox->successRedirect();
    } else {
        // Redirect to failed page if authentication fails.
        $loginBox->failRedirect();
    }      
  }
       // Displays the login form using LoginBox object.
      $loginForm = $loginBox->getLoginForm();
      echo $loginForm;
    
  ?>
  
  </body>
  </html>



