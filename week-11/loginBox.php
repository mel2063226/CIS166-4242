<?php
include_once 'dbh.inc.php';
?>

<?php
// Mindy Benson
// 4/15/2024
// CIS166AE Module 12

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
            <form action='signup.php' method='post'>
                <label for='name'>First Name:</label>
                <input type='text' id='first_name' name='first_name'><br><br>
                <label for='name'>Last Name:</label>
                <input type='text' id='last_name' name='last_name'><br><br>
                <label for='name'>Username:</label>
                <input type='text' id='username' name='username'><br><br>
                <label for='email'>eMail:</label>
                <input type='email' id='email' name='email'><br><br>
                <label for='phone'>Phone Number:</label>
                <input type='text' id='phone' name='phone'><br><br>
                <label for='password'>Password:</label>
                <input type='password' id='password' name='password'><br><br>
                <input type='submit' value='Create Account'>
            </form>";
    }

    // Add createAccount() function to loginBox class.
    public function createAccount($conn, $first, $last, $user, $mail, $cell, $pass) {
        // Validate form data and insert into users table
        try {
          // Check if username already exists
    $query = "SELECT * FROM user WHERE username = '$user'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        // Username already exists, display error message
        echo "Error: Username already exists. Please choose a different username.";
        return false; // Return false to indicate failure
    } else {
        // Username does not exist, proceed with insertion
        $sql = "INSERT INTO user (first_name, last_name, username, email, phone, password) 
                VALUES ('$first', '$last', '$user', '$mail', '$cell', '$pass')";
        if (mysqli_query($conn, $sql)) {
            // Record inserted successfully
            echo "Record inserted successfully.";
            return true; // Return true to indicate success
        } else {
            // Error inserting record
            echo "Error: " . mysqli_error($conn);
            return false; // Return false to indicate failure
        }
    }

        } catch (Exception $e) {
            echo "Error creating account: " . $e->getMessage();
        }
    }

}
?>

