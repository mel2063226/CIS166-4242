<?php
// Mindy Benson
// 3/25/2024
// CIS166AE Module 9

echo '<link rel="stylesheet" type="text/css" href="style.css"></head>';

// Function to return a form with 'username' and 'password' fields and a submit button.
class LoginBox {
    // Predefined username for authentication.
    private $username = 'admin';
    
    // Predefined password for authentication. */
    private $password = 'admin123';
    
    // Label for the submit button. */
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
            if ($username !== $this->username) {
                throw new Exception("Username doesn't match.");
            }
            
            if ($password !== $this->password) {
                throw new Exception("Password doesn't match.");
            }
            
            return true;
        } catch (Exception $e) {
            echo "Authentication Error: " . $e->getMessage();
            return false;
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
}
?>
