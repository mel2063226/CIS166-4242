<?php
  // Mindy Benson
  // 5/2/2024
  // CIS166AE Final


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "webmastermel2063226@maricopa.edu"; // My school email address
    $subject = $_POST["subject"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
    // Different options for customers to pick
    switch ($subject) {
        case "General Inquiry":
            // Handle general inquiries
            break;
        case "Report a Bug":
            // Handle bug reports
            break;
        case "Request for Assistance":
            // Handle assistance requests
            break;
        default:
            // Handle other subjects
            break;
    }
    
    // Send email
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();
    mail($to, $subject, $message, $headers);
    
    // Redirect back to the contact form with a success message
    header("Location: contact.php?status=success");
    exit;
} else {
    // If the form is not submitted, redirect back to the contact form
    header("Location: conact.php");
    exit;
}
?>

