<?php
  // Mindy Benson
  // 5/2/2024
  // CIS166AE Final
  
session_start();

  // Include the LoginBox class definition.
  require_once 'loginBox.php';
  include_once 'dbh.inc.php';



  if (isset($_POST['update_account'])) 
  {
    $id = $_POST['user_id'];
    $first = mysqli_real_escape_string($conn, $_POST['first_name']?? NULL);
    $last = mysqli_real_escape_string($conn, $_POST['last_name']?? NULL);
    $user = mysqli_real_escape_string($conn, $_POST['username']?? NULL);
    $mail = mysqli_real_escape_string($conn, $_POST['email']?? NULL); 
    $cell = mysqli_real_escape_string($conn, $_POST['phone']?? NULL); 
    $pass = mysqli_real_escape_string($conn, $_POST['password']?? NULL);

    $query = "UPDATE user SET first_name='$first', last_name='$last',
    username='$user', email='$mail', phone='$cell', password='$pass 
    WHERE user_id=" . $id;
    $query_run = mysqli_query($conn, $query);

    if ($query_run) 
    {
     $_SESSION['status']= "Record was updated successfully.";
     header("Location: edit.php");
    }
    else 
    {
      $_SESSION['status']= "Not Updated";
      header("Location: edit.php"); }}

      ?>