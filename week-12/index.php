<?php
// Mindy Benson
// 4/15/2024
// CIS166AE Module 12
  
  // Include the LoginBox class definition.
  require_once 'loginBox.php';
  include_once 'dbh.inc.php';

  
 // Start the session.
session_start();

// Check if the user is logged in and set background color accordingly
$pageBackgroundColor = isset($_SESSION['username']) ? 'background-color: #f2f2f2;' : '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            <?php echo $pageBackgroundColor; ?>
        }
    </style>
</head>
<body>
  <h1>Login</h1>

  <?php
    // Initialize LoginBox object
    $loginBox = new LoginBox();

    try {
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
    echo '<br/><b>OR</b><br/><a href="signup.php">Sign Up!</a>';
  } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
  }
    
  ?>

</body>
</html>