<?php
  // Mindy Benson
  // 5/2/2024
  // CIS166AE Final

 
    // Database connection
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "menu"; 

    $conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);
      ?>

<nav>
    <ul>
        <?php
  // Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to recursively fetch menu items
function fetchMenuItems($link_name, $conn) {
    $sql = "SELECT * FROM menu WHERE link_name = $link_name";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li><a href='" . $row["url"] . "'>" . $row["name"] . "</a>";
            fetchMenuItems($row["id"], $conn); // Recursive call for submenus
            echo "</li>";
        }
        echo "</ul>";
    }
}

// Display the menu
echo "<nav>";
fetchMenuItems(1, $conn); // Start with a known link_name item
echo "</nav>";
?>
        <!-- Static links -->
        <li><a href="slideshow.php">Slideshow</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="weather.php">Weather</a></li>
        <li><a href="mine.php">Mine</a></li>
    </ul>
</nav>