<?php
// Enable error reporting (useful for debugging)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data and sanitize input
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $comments = htmlspecialchars(trim($_POST['comments']));

    // Validate email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit();
    }

    // Set the recipient email address
    $to = "adityaanand269@gmail.com";

    // Set the email subject
    $subject = "New Contact Form Submission from $name";

    // Build the email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Phone: $phone\n\n";
    $email_content .= "Message:\n$comments\n";

    // Set the email headers
    $email_headers = "From: noreply@ytxsolutions.com\r\n";
    $email_headers .= "Reply-To: $email\r\n";
    $email_headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send the email
    if (mail($to, $subject, $email_content, $email_headers)) {
        // Redirect to a thank you page or show a success message
        header("Location: it.html");
        exit();
    } else {
        // Display an error message if email could not be sent
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
} else {
    // If the form is not submitted correctly
    echo "There was an issue with your submission. Please try again.";
}
?>
