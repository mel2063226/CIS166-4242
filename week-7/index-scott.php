<?php
  // Mindy Benson
  // 3/18/2024
  // CIS166AE Module 8
  
  // Include the LoginBox class definition.
  require_once 'loginBox.php';
  
  // Start the session. (not needed yet, but will soon.  it belongs here)
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
    // Initialize LoginBox object
    $loginBox = new LoginBox();

    // Check if form is submitted.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Retrieve the form data.
      $username = $_POST["username"] ?? NULL;
      $password = $_POST["password"] ?? NULL;
       
      // Authenticate function will redirect user to correct page.
      $loginBox->authenticate($username, $password);
    }
    else {
      // Displays the login form using LoginBox object.
      $loginForm = $loginBox->getLoginForm();
      echo $loginForm;
    }
  ?>

</body>
</html>
