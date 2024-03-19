<?php
// Mindy Benson
// 3/18/2024
// CIS166AE Module 8

// Function to return a form with 'username' and 'password' fields and a submit button.
class LoginBox {
    // Predefined username for authentication.
    private $username = 'admin';
    
    // Predefined password for authentication. */
    private $password = 'admin123';
    
    // Label for the submit button. */
    protected $submitLabel = 'Submit';

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
        return ($username === $this->username && $password === $this->password);
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
