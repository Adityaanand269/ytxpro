<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $comments = htmlspecialchars($_POST['comments']);

    // Set the recipient email address
    $to = "adityaanand269@gmail.com"; // Replace with your email address

    // Set the email subject
    $subject = "New Contact Form Submission";

    // Build the email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Phone: $phone\n\n";
    $email_content .= "Message:\n$comments\n";

    // Build the email headers
    $email_headers = "From: $name <$email>";

    // Send the email
    if (mail($to, $subject, $email_content, $email_headers)) {
        // Redirect to a thank you page (optional)
        header("Location: it.html");
        exit();
    } else {
        // Display an error message
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
}
?>
