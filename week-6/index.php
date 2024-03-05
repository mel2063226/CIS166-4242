<?php
// Mindy Benson
// 3/4/2024
// CIS166AE Module 7

// Form elements
$firstName = $lastName = $email = $phone = $day = $month = $year = $comment = '';
$error = '';

// A CUSTOM function to validate the phone number using regular expressions.
function validatePhoneNumber($phone) {
    return preg_match('/^\d{3}[-.]\d{3}[-.]\d{4}$/', $phone);
}

// Function to validate date
function validateDate($day, $month, $year) {
    return checkdate($month, $day, $year);
}

// Function to format date
function formatDate($day, $month, $year) {
    return date('d.m.Y', mktime(0, 0, 0, $month, $day, $year));
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $comment = $_POST['comment'];

    // Validate email: If not a valid email address, display error message on top of page above form and have them resubmit form.
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error .= "Invalid email address.<br>";
    }

    // Validate phone number: If not valid, display error message on top of page above form and have them resubmit form.
    if (!validatePhoneNumber($phone)) {
        $error .= "Invalid phone number format. Please use XXX-XXX-XXXX or XXX.XXX.XXXX.<br>";
    }

    // Validate it is an actual date (not in future, and value is actual real date [not 33/44/1900]).
    if (!validateDate($day, $month, $year)) {
        $error .= "Invalid birthdate.<br>";
    }

    // Use a string function to replace the words Estrella Mountain with EMCC if found in comment field
    $comment = str_replace("Estrella Mountain", "EMCC", $comment);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
</head>
<body>
    <?php if ($error) : ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
    
    <?php if (empty($error) && $_SERVER["REQUEST_METHOD"] == "POST") : ?>
        <p>Full Name: <?php echo $firstName . " " . $lastName; ?></p>
        <p>Email: <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
        <p>Phone: <?php echo $phone; ?></p>
        <p>Birthdate: <?php echo formatDate($day, $month, $year); ?></p>
     <!--Display comment (in its own <p> tag)-->
        <p>Comment: <?php echo $comment; ?></p>
        <a href="index.php">Back to Form</a>
    <?php else : ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="firstName">First Name:</label>
            <input type="text" name="firstName" required><br><br>
            <label for="lastName">Last Name:</label>
            <input type="text" name="lastName" required><br><br>
            <label for="email">Email:</label>
            <input type="text" name="email" required><br><br>
            <label for="phone">Phone:</label>
            <input type="text" name="phone" required><br><br>
            <label for="day">Birthdate:</label>
            <input type="text" name="day" required placeholder="Day">
            <input type="text" name="month" required placeholder="Month">
            <input type="text" name="year" required placeholder="Year"><br><br>
            <label for="comment">Comment:</label><br>
            <textarea name="comment"></textarea><br><br>
            <input type="submit" value="Submit">
            <!--A link to reload page-->
            <input type="reset" value="Reset Form">
        </form>
    <?php endif; ?>
</body>
</html>
