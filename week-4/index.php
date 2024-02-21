<!DOCTYPE html>
<!--Mindy Benson-->
<!--2/20/2024-->
<!--CIS166AE Module 5-->

<html>
<head>
<style>
    .copper {
        color: #b87333;
    }
    .kelly {
        color: #4CBB17;
    }
</style>
</head>
<body>

<?php
// Indexed array of 10 colors
$indexedColors = ["Scarlet", "Copper", "Sunflower", "Kelly", "Sky", "Indigo", "Violet", "Pink", "Cyan", "Magenta"];

// Displaying items 1, 4, 6, 9 without using a loop
echo "1st color: " . $indexedColors[0] . "<br>";
echo "4th color: " . $indexedColors[3] . "<br>";
echo "6th color: " . $indexedColors[5] . "<br>";
echo "9th color: " . $indexedColors[8] . "<br>";

// Associative array of 5 colors and their hex codes
$associativeColors = [
    "Scarlet" => "#ff2400",
    "Kelly" => "#4CBB17",
    "Sky" => "#87CEEB",
    "Sunflower" => "#FAE033",
    "Copper" => "#b87333"
];

// Sorting the associative array by key
ksort($associativeColors);

// Displaying color 2 and 4 with CSS formatting
echo "<br>";
echo "<span class='copper'>Color 2: " . $indexedColors[1] . ", hex code: " . array_values($associativeColors)[1] . "</span><br>";
echo "<span class='kelly'>Color 4: " . $indexedColors[3] . ", hex code: " . array_values($associativeColors)[3] . "</span><br>";

// Looping over the indexed array and displaying colors, one per line
echo "<br>";
echo "<b>Displaying My Indexed Array of all 10 Colors</b><br>";
foreach ($indexedColors as $color) {
    echo $color . "<br>";
}

// Looping over the sorted associative array and displaying color and hex value, one per line
echo "<br><b>Associative Array of 5 Colors Sorted by Key (Ascending Order):</b><br>";
foreach ($associativeColors as $color => $hex) {
    echo $color . ": " . $hex . "<br>";
}

// Sorting the associative array by value in descending order
arsort($associativeColors);

// Looping over the sorted associative array and displaying color and hex value, one per line
echo "<br><b>Associative Array of 5 Colors Sorted by Value (Descending Order):</b><br>";
foreach ($associativeColors as $color => $hex) {
    echo $color . ": " . $hex . "<br>";
}
?>

</body>
</html>
