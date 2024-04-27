<?php
  // Mindy Benson
  // 4/24/2024
  // CIS166AE Module 13
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
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

<?php
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