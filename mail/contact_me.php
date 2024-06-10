<?php
// Define email configuration variables
$recipient_email = 'ndovu7730@gmail.com'; // Your email address where form submissions are sent

// Check for empty fields
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo "No arguments Provided!";
    return false;
}

// Sanitize input data
$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$email_address = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

// Create the email and send the message
$email_subject = "Website Contact Form: $name";
$email_body = "You have received a new message from your website contact form.\n\nHere are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";

$headers = "From: $email_address\n"; // Email will appear to come from the user's email address
$headers .= "Reply-To: $email_address"; // Replies will go to the user's email address

if(mail($recipient_email, $email_subject, $email_body, $headers)) {
    echo "Message sent successfully!";
    return true;
} else {
    echo "Message sending failed!";
    return false;
}
?>
