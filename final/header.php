<?php
  // Mindy Benson
  // 5/2/2024
  // CIS166AE Final
  
  // Include the database class definition.
   include_once 'dbh.inc.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="pic/logo.png" alt="Logo">
        </div>
        <div class="title">
            <h1>Mindy Benson</h1>
        </div>

        <div class="login">
            <?php

             // Check connection
             if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            // Check if user is logged in
            $loggedIn = false; // Assuming user is not logged in to start

            // Quiry looking for customer info. 
            $sql = "SELECT * FROM user WHERE username = 1";
            $result = $conn->query($sql);




            // Check if the user is logged in and display the appropriate button
            if ($loggedIn) {
                echo '<a href="logout.php">Logout</a>';
            } else {
                echo '<a href="login.php">Login</a>';
            }
            ?>
        </div>
    </header>
