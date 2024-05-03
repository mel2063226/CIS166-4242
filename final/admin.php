<?php
  // Mindy Benson
  // 5/2/2024
  // CIS166AE Final
  
     // Start the session. 
     session_start();
  
  // Include the LoginBox class definition.
   require_once 'loginBox.php';
   include_once 'dbh.inc.php';
   require_once 'delete.php';
      

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Admin</title>

</head>
<body>

<?php 
include 'header.php';   // Include the header
include 'menu.php';   // Include the menu

// Fetch data from users table
$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0) {
    echo "<table>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>First Name</th>";
    echo "<th>Last Name</th>";
    echo "<th>Username</th>";
    echo "<th>eMail</th>";
    echo "<th>Phone Number</th>";
    echo"'<th>Edit</a></th>";
    echo "<th>Delete</th>";
    echo "</tr>";
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["user_id"].
        "</td><td>".$row["first_name"].
        "</td><td>".$row["last_name"].
        "</td><td>".$row["username"].
        "</td><td>".$row["email"].
        "</td><td>".$row["phone"].
        "</td><td>".'<a href="edit.php">EDIT</a>'.
        "</td><td>".'<a href="delete.php">DELETE</a>'.
        "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>

</body>
</html>
<?php include 'footer.php';    // Include the footer
?> 