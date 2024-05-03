<?php
  // Mindy Benson
  // 5/2/2024
  // CIS166AE Final

// Database connection parameters
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "slideshow"; 

// Create connection
$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);
 
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query database to get photo information
$sql = "SELECT title, caption, filename FROM information";
$result = $conn->query($sql);

$photos = array();

// Store photo information in an array
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $photos[] = $row;
    }
} else {
    echo "No photos found in the database.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>Random Slideshow</title>
</head>
<body>
    <?php 
    include 'header.php';   // Include the header
    include 'menu.php';   // Include the menu
    ?>
    
    <div class="slideshow">
       <h2> Zipper Tape Anyone? </h2>
       <?php
        // Shuffle the photos array
        shuffle($photos);

        // Display each photo in the slideshow
        foreach ($photos as $photo) {
            echo '<div class="slide">';
            echo '<img src="slide_photos/' . $photo['filename'] . '">';
            echo '<div class="caption"><strong>' . $photo['title'] . '</strong>: ' . $photo['caption'] . '</div>';
            echo '</div>';
        }
        ?>
    </div>

    <script>
        // JavaScript for slideshow functionality
        var slides = document.querySelectorAll('.slide');
        var currentSlide = 0;

        function nextSlide() {
            slides[currentSlide].style.display = 'none';
            currentSlide = (currentSlide + 1) % slides.length;
            slides[currentSlide].style.display = 'block';
        }

        // Display the first slide
        slides[currentSlide].style.display = 'block';

        // Automatically advance to the next slide every 3 seconds
        setInterval(nextSlide, 3000);
    </script>
</body>
</html>