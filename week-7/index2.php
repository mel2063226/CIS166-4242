
<?php
// Mindy Benson
// 3/18/2024
// CIS166AE Module 8

// Include the LoginBox class definition.
require_once 'loginBox.php'; 

// Start the session.
session_start();

// Check if form is submitted.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data.
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Initialize LoginBox object.
    $loginBox = new LoginBox();

   /** Setting the submit button to "check me" using the LoginBox object 
     * and setting the value using your set function.*/
    $loginBox->$label = "Check Me";

    // Authenticate the provided username and password.
    if ($loginBox->authenticate($username, $password)) {
        // Redirect to success page if authentication is successful.
        $_SESSION["login_status"] = "success";
        $loginBox->successRedirect();
    } else {
        // Redirect to failed page if authentication fails.
        $_SESSION["login_status"] = "fail";
        $loginBox->failRedirect();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    
    <?php
    // Displays the login form using LoginBox object.
    $loginBox = new LoginBox();
    $loginForm = $loginBox->getLoginForm();
    echo $loginForm;
    ?>
</body>
</html>
