<?php
  // Mindy Benson
  // 5/2/2024
  // CIS166AE Final
?>

<!DOCTYPE html>
<html>
<head>
    <title>My PHP Quiz</title>
</head>
<body>
<?php
    include 'header.php';   // Include the header
     include 'menu.php';   // Include the menu
     ?>
    <h2>My PHP Quiz</h2>

    <?php
    // Define the questions and answers
    $questions = array(
        "What does PHP stand for?",
        "Who is the creator of PHP?",
        "Which company developed PHP?",
        "What type of language is PHP?",
    );

    $choices = array(
        array("Personal Home Page", "Private Home Page", "Pretext Hypertext Processor", "Hypertext Preprocessor"),
        array("Linus Torvalds", "Guido van Rossum","Rasmus Lerdorf", "Larry Wall"),
        array("Google","Zend Technologies", "Microsoft", "Apple"),
        array("Server-side scripting language", "Client-side scripting language", "Markup language", "Programming language"),
    );

    $answers = array(
        "Hypertext Preprocessor",
        "Rasmus Lerdorf",
        "Zend Technologies",
        "Server-side scripting language",
    );

    // Display the quiz form
    if (!isset($_POST['submit'])) {
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <?php
        // Display questions with multiple choices
        for ($i = 0; $i < count($questions); $i++) {
            echo "<p>{$questions[$i]}</p>";
            echo "<input type='hidden' name='answers[]' value='{$answers[$i]}'>";
            // Display multiple choices
            for ($j = 0; $j < count($choices[$i]); $j++) {
                echo "<input type='radio' name='responses[$i]' value='{$choices[$i][$j]}' required> {$choices[$i][$j]}<br>";
            }
        }
        ?>
        <br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php
    } else {
        // Check answers and display result
        $responses = $_POST['responses'];
        $score = 0;

        for ($i = 0; $i < count($responses); $i++) {
            if ($responses[$i] == $answers[$i]) {
                $score++;
            }
        }

        echo "<p>You scored $score out of " . count($questions) . ".</p>";
    }
    ?>
</body>
</html>
<?php include 'footer.php';    // Include the footer
?> 
