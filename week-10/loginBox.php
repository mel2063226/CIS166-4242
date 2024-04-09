<?php
// Mindy Benson
// 4/8/2024
// CIS166AE Module 11

echo '<link rel="stylesheet" type="text/css" href="style.css"></head>';

// Function to return a form with 'username' and 'password' fields and a submit button.
class LoginBox {
    // Predefined username for authentication.
    private $username = 'admin';
    
    // Predefined password for authentication.
    private $password = 'admin123';
    
    // Label for the submit button.
    protected $submitLabel = 'Submit';

    public function __construct($username = 'admin', $password = 'admin123') {
        $this->username = $username;
        $this->password = $password;
    }
    
    // Form with username, password fields, and submit button.
    public function getLoginForm() {
        return "
            <form action='index.php' method='post'>
                <label for='username'>Username:</label>
                <input type='text' id='username' name='username'><br><br>
                <label for='password'>Password:</label>
                <input type='password' id='password' name='password'><br><br>
                <input type='submit' value='{$this->submitLabel}'>
            </form>";
    }

    // Function to change the label of the submit button (protected variable).
    protected function setSubmitLabel($label) {
        $this->submitLabel = $label;
    }

    // Function to authenticate the username/password (one function, 2 parameters).
    public function authenticate($username, $password) {
        try {
            if ($username == $this->username) {
                if ($password !== $this->password) {
                    $this->successRedirect();
                } else {
                    throw new Exception("Password doesn't match.");
                    echo "Authentication Error: " . $e->getMessage();
   
                    $this->failRedirect();
                }
            } else {
                throw new Exception("Username doesn't match.");
                echo "Authentication Error: " . $e->getMessage();
   
                $this->failRedirect();
            }
        } catch(Exception $e) {
            echo "Authentication Error: " . $e->getMessage();
            $this->failRedirect();
        }
    }
    
    // Function to reset the password.
    public function resetPassword($newPassword) {
        try {
            if (strlen($newPassword) < 8) {
                throw new Exception("Password should be at least 8 characters long.");
            }

            $this->password = $newPassword;
            return true;
        } catch (Exception $e) {
            echo "Error resetting password: " . $e->getMessage();
            return false;
        }
    }

    // Redirects to the success page.
    public function successRedirect() {
        header("Location: success.html");
        exit();
    }

    // Redirects to the failed page.
    public function failRedirect() {
        header("Location: failed.html");
        exit();
    }

    // Add getAccountForm() function to loginBox class.
    public function getAccountForm() {
       //Return form with name, password, and other fields in users table.
        return "
            <form action='signUp.php' method='post'>
                <label for='name'>Name:</label>
                <input type='text' id='name' name='name'><br><br>
                <label for='password'>Password:</label>
                <input type='password' id='password' name='password'><br><br>
                <label for='email'>eMail:</label>
                <input type='text' id='email' name='email'><br><br>
                <label for='phone'>Phone Number:</label>
                <input type='text' id='phone' name='phone'><br><br>
                <input type='submit' value='Create Account'>
            </form>";
    }

    // Add createAccount() function to loginBox class.
    public function createAccount($formData) {
        // Validate form data and insert into users table
        // Assuming $formData is an associative array with keys matching the column names in the users table
        try {
            // Example validation: ensuring name and password are not empty
            if (empty($formData['name']) || empty($formData['password'])) {
                throw new Exception("Name and Password cannot be empty.");
            }

            // I am hoping I have this information correct from MyPHPAdmin database.
            $servername = "127.0.0.1";
            $username = "root@localhost";
            $password = "password";
            $dbname = "php_mysql";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                throw new Exception("Connection failed: " . $conn->connect_error);
            }

            // Prepare and bind the SQL statement
            $stmt = $conn->prepare("INSERT INTO users (name, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $formData['name'], $formData['password']);

            // Execute the statement
            if ($stmt->execute()) {
                echo "Account created successfully.";
            } else {
                throw new Exception("Error creating account: " . $conn->error);
            }

            $stmt->close();
            $conn->close();
        } catch (Exception $e) {
            echo "Error creating account: " . $e->getMessage();
        }
    }
}

// Instantiate the LoginBox class
$loginBox = new LoginBox();
?>

