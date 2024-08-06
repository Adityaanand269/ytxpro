<?php
$to = 'adityaanand269@gmail.com';
$subject = 'Test Email';
$message = 'This is a test email to check the PHP mail function.';
$headers = 'From: noreply@yourdomain.com';

if (mail($to, $subject, $message, $headers)) {
    echo 'Email sent successfully!';
} else {
    echo 'Email sending failed.';
}
?>
