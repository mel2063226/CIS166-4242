<?php
  // Mindy Benson
  // 4/15/2024
  // CIS166AE Module 11
  
   // Include the LoginBox class definition.
   require_once 'loginBox.php';
   include_once 'dbh.inc.php';
  
   $first = $_POST['first_name'];
   $last = $_POST['last_name'];
   $user = $_POST['username'];
   $mail = $_POST['email'];
   $cell = $_POST['phone'];
   $pass = $_POST['password'];

   $sql = "INSERT INTO user (first_name, last_name, username, email, phone, password) 
                    VALUES ('$first', '$last', '$user', '$mail', '$cell', '$pass');";
   
   mysqli_query($conn, $sql);
      
   // Start the session. 
   session_start();
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
    
    // Displays the login form using LoginBox object.
$accountForm = $loginBox->getAccountForm();
echo $accountForm;
echo '<br/><br/><a href="index.php">Return to Login Page</a>';

?>


</body>
</html>