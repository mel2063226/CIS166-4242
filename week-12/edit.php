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
    <title>Edit</title>
</head>
<body>
  <h1>Edit</h1>

<?php
   include 'loginBox.php';
   
   // Check if user is logged in
   // Example authentication using LoginBox class
   $loginBox = new LoginBox();
   $loginBox->authenticate($_SESSION['username']?? NULL, $_SESSION['password']?? NULL);
   
   // Check if user exists and load record
   if(isset($_GET['id'])) {
       $id = $_GET['id'];
       
       // Load record
       $record = $loginBox->loadRecord($id);
       
       if($record) {
           // Display form with loaded values
           echo $loginBox->getEditForm($record);
       } else {
           echo "User with ID $id does not exist.";
       }
   } else {
       echo "No ID provided in the query string.";
   }
   
   // Process submit
   if(isset($_POST['submit'])) {
       // Validate and update record
       $updateResult = $loginBox->updateRecord($_POST);
       
       if($updateResult) {
           echo "Record updated successfully.";
       } else {
           echo "Failed to update record.";
       }
   }
   ?>
   
  

</body>
</html>