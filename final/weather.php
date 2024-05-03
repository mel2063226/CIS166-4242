<?php
  // Mindy Benson
  // 5/2/2024
  // CIS166AE Final
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather</title>
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
     <h1>What's the Weather?</h1>

    <?php
    // URL of the RSS feed
    $rss_url = 'https://rss.accuweather.com/rss/liveweather_rss.asp?metric=1&locCode=85204';

    // Fetch RSS feed and parse XML
    $rss = simplexml_load_file($rss_url);

    // Check if RSS is successfully loaded
    if ($rss) {
        // Extract current weather information
        $current_weather_title = $rss->channel->item[0]->title;
        $current_weather_description = $rss->channel->item[0]->description;
        // Extract temperature from description using regex
        preg_match('/(\d+) °C/', $current_weather_description, $matches);
        $current_temperature = isset($matches[1]) ? $matches[1] : '';

        echo "<p>$current_weather_title</p>";
        echo "<p>$current_weather_description</p>";
        echo "<p>Temperature: $current_temperature °C</p>";
    } else {
        echo "<p>Failed to fetch weather data.</p>";
    }
    ?>
    
    </main>
</body>
</html>
<?php include 'footer.php';    // Include the footer
?> 