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
    public function authenticate($conn, $username, $password) {
        try {
            // Retrieve the hashed password from the database based on the username
            $query = "SELECT password FROM user WHERE username = '$username'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                // Username exists, verify the password
                $row = mysqli_fetch_assoc($result);
                $hashed_password = $row['password'];
                if (password_verify($password, $hashed_password)) {
                    // Password is correct, set valid_user session variable
                    $_SESSION['valid_user'] = true;
                    // Redirect to success page
                    $this->successRedirect();
                } else {
                    throw new Exception("Username or password is incorrect.");
                }
            } else {
                throw new Exception("Username or password is incorrect.");
            }
        } catch(Exception $e) {
            echo "Authentication Error: " . $e->getMessage();
            // Redirect to fail page
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
                // Hash the password before storing it
                $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
                $sql = "INSERT INTO user (first_name, last_name, username, email, phone, password) 
                        VALUES ('$first', '$last', '$user', '$mail', '$cell', '$hashed_password')";
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
    

//Update logoic moved to loginBox
public function loadRecord($id) {
    // Implement logic to load record from database based on ID
    // Example implementation using mysqli
    // Assuming $conn is your database connection object
    $query = "SELECT * FROM user WHERE user_id = $id";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    } else {
        return false;
    }
}

 // Function to display edit form with loaded values
 public function getEditForm($record) {
    // Generate and return HTML form with loaded record values
    return "
        <form action='edit.php' method='post'>
        <input type='hidden' name='user_id' value='{$record['user_id']}'>
        <label for='first_name'>First Name:</label>
        <input type='text' id='first_name' name='first_name' value='{$record['first_name']}'><br><br>
        <label for='last_name'>Last Name:</label>
        <input type='text' id='last_name' name='last_name' value='{$record['last_name']}'><br><br>
        <label for='username'>First Name:</label>
        <input type='text' id='username' name='Username' value='{$record['username']}'><br><br>
        <label for='email'>Email:</label>
        <input type='text' id='email' name='email' value='{$record['email']}'><br><br>
        <label for='phone'>Phone}:</label>
        <input type='text' id='phone' name='phone' value='{$record['phone']}'><br><br>
        <label for='password'>Password Name:</label>
        <input type='text' id='password' name='password' value='{$record['password']}'><br><br>
        <input type='submit' name='submit' value='Update'>
    </form>";
}

 // Function to update record
 public function updateRecord($data) {
    // Implement logic to update record in the database
    $id = $_POST['user_id'];
    $first = mysqli_real_escape_string($conn, $_POST['first_name']?? NULL);
    $last = mysqli_real_escape_string($conn, $_POST['last_name']?? NULL);
    $user = mysqli_real_escape_string($conn, $_POST['username']?? NULL);
    $mail = mysqli_real_escape_string($conn, $_POST['email']?? NULL); 
    $cell = mysqli_real_escape_string($conn, $_POST['phone']?? NULL); 
    $pass = mysqli_real_escape_string($conn, $_POST['password']?? NULL);
    
    $query = "UPDATE user SET first_name='$first', last_name='$last',
    username='$user', email='$mail', phone='$cell', password='$pass 
    WHERE user_id=" . $id;
    $query_run = mysqli_query($conn, $query);

    if ($query_run) 
    {
     $_SESSION['status']= "Record was updated successfully.";
     header("Location: edit.php");
    }
    else 
    {
      $_SESSION['status']= "Not Updated";
      header("Location: edit.php"); }}

}
?>

