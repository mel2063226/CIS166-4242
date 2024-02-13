<!DOCTYPE html>
<!--Mindy Benson-->
<!--2/21/2024-->
<!--CIS166AE Assignment 4-->

<html>
  <head>
    <title>Assignemnt 4</title>
  </head>
  <body>
  <?php

  	// Defining variables
		$firstName = $lastName = $email = $txtComment = $age = "";
		$firstName_err = $lastName_err = $email_err = $txtComment_err = $age_err = "";

    // Validating that the form is filled out. And giving resoinces if not. 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
         if (empty($_POST["firstName"])) {
           $firstName_err = "Hey! I need you to enter your first name please.";
         } else {
           $firstName = test_input($_POST["firstName"]);
         }

         if (empty($_POST["lastName"])) {
          $lastName_err = "I need your last name too.";
         } else {
          $lastName = test_input($_POST["lastName"]);
         }

        if (empty($_POST["age"])) {
          $age_err = "Age is just a number.... but I still need it!";
        } else {
          $age = test_input($_POST["age"]);
        }


        if (empty($_POST["email"])) {
         $email = "I need to know the best email to reach you at.";
        } else {
         $email = test_input($_POST["email"]);
        }

         // Check if there are no errors
    if (empty($firstName_err) && empty($lastName_err)) {
      // Customize message based on name (I had a little fun with the comments.)
      switch ($firstName) {
          case "Spencer":
              $message = "Hello Spencer! Your wife made this form!";
              break;
          case "Riley":
              $message = "Hi Riley! Your Mama has been working hard on this form.";
              break;
          default:
              $message = "Hello $firstName! Your form has been submitted.";
      }}}

    

      // Removing the unnecessary characters if any
	  	function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
      }
        ?>
  
  <!--the actual form-->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <div>
        <label>First Name:</label>
        <input type="text" name="firstName" value="<?php echo $firstName; ?>"/>
        <span><?php echo $firstName_err; ?></span>
      </div>

      <div>
        <label>Last Name:</label>
        <input type="text" name="lastName" value="<?php echo $lastName; ?>"/>
        <span><?php echo $lastName_err; ?></span>
      </div>  
      
      <div>
        <label>Age:</label>
        <input type="text" name="age" value="<?php echo $age; ?>"/>
        <span><?php echo $age_err; ?></span>
      </div>
      
      <div>
        <label>Email Address:</label>
        <input type="email" name="email" value="<?php echo $email; ?>"/>
        <span><?php echo $email_err; ?></span>
      </div>
      
      <div>
        <label>Comment:</label>
        <input type="text" name="txtComment" value="<?php echo $txtComment; ?>"/>
      </div>

      <div>
        <input type="submit" name= "Submit the form" value="Submit the form" />
      </div>
    </form>

    <?php
// Display name message
if (!empty($message)) {
  echo "<p>$message</p>";
}

//years till one retires. Not fully sure why this is not presenting like the custom name one did. 
function years_to_retirement($age) {
  $retirement = 65;
  if ($age < $retirement) {
      return $retirement - $age;
  } else {
      return 0; // Already reached or passed retirement age
    }
  echo "Years till retirement: $years_to_retirement";
  }   
     ?>

</body>
</html>