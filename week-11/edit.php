<?php
  // Mindy Benson
  // 4/15/2024
  // CIS166AE Module 12
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
  <h1>Edit</h1>

<?php
    if(isset($_SESSION['status']))
    {
        echo "<h3>" .$_SESSION['status']."<h3>";
        unset($_SESSION['status']);
    }
    ?>
  
  <form action='update.php' method='post'>
  <input type="hidden" id="id" name="user_id" value=".$_GET['ID'].'">
  <label for='name'>First Name:</label>
  <input type='text' id='first_name' name='first_name'><br><br>
  <label for='name'>Last Name:</label>
  <input type='text' id='last_name' name='last_name'><br><br>
  <label for='name'>Username:</label>
  <input type='text' id='username' name='username'><br><br>
  <label for='email'>eMail:</label>
  <input type='email' id='email' name='email'><br><br>
  <label for='phone'>Phone Number:</label>
  <input type='text' id='phone' name='phone'><br><br>
  <label for='password'>Password:</label>
  <input type='password' id='password' name='password'><br><br>
  <input type='submit' value='update_account'>
</form>;
  

</body>
</html>