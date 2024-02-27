<!DOCTYPE html>
<!--Mindy Benson-->
<!--2/26/2024-->
<!--CIS166AE Module 6-->

<?php

// Define an associative array with color-contrasting key-value pairs
$colors = array(
    "#DAF7A6" => "#000000", // Light Green background, black text
    "#000000" => "#ffffff", // Black background, white text
    "#000000" => "#ff0000", // Black background, red text
    "#027e02" => "#ffffff", // Green background, white text
    "#33FFBD" => "#000000", // Turquoise background, black text
    "#ffff00" => "#0000ff"  // Yellow background, blue text
);

// Choose a random key-value pair
$random_pair = array_rand($colors);

// Set the background color
$background_color = $random_pair;

// Set the foreground color (text color)
$foreground_color = $colors[$random_pair];

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color Changing Page</title>
    <style>
        body {
            background-color: <?php echo $background_color; ?>;
            color: <?php echo $foreground_color; ?>;
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }
    </style>
</head>
<body>
    <h1>Here is a Random Color Changing Page!</h1>
    <p>You if you hit refresh the colors will randomly change!</p>
</body>
</html>
