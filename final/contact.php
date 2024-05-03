<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
</head>
<body>
<?php
    include 'header.php';   // Include the header
     include 'menu.php';   // Include the menu
     ?>
    <h2>Contact Us</h2>
    <form action="send_email.php" method="post">
        <label for="subject">Subject:</label>
        <select name="subject" id="subject">
            <option value="General Inquiry">General Inquiry</option>
            <option value="Report a Bug">Report a Bug</option>
            <option value="Request for Assistance">Request for Assistance</option>
        </select><br><br>
        <label for="email">Your Email:</label>
        <input type="email" name="email" id="email" required><br><br>
        <label for="message">Message:</label><br>
        <textarea name="message" id="message" rows="5" cols="30" required></textarea><br><br>
        <input type="submit" value="Send Email">
    </form>
</body>
</html>
<?php include 'footer.php';    // Include the footer
?> 