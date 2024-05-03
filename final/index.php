<?php
  // Mindy Benson
  // 5/2/2024
  // CIS166AE Final
  
  // Include the LoginBox class definition.
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
    <title>Home Page</title>
    <style>
        body {
            <?php echo $pageBackgroundColor; ?>
        }
    </style>
</head>
<body>
<?php
    include 'header.php';   // Include the header
    include 'menu.php';   // Include the menu
    ?>
<main>
     <h1>WELCOME</h1>

  <?php
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
     }

    // Check if user is logged in
    $loggedIn = false; // Assuming user is not logged in to start

    // Quiry looking for customer info. 
    $sql = "SELECT * FROM user WHERE username = 1";

     // Check if the user is logged in and display the appropriate button
    if ($loggedIn) {
      // Output data of each row
      while($row = $result->fetch_assoc()) {
      // Include a customized message with the user's first name
      $first_name = $row['first_name'];
      echo "Welcome back, $first_name!";
      } 
     }
     ?>
    
    </main>
</body>
</html>
<?php include 'footer.php'; ?>
