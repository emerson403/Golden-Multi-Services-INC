<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data from POST
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);
    
    // Validate the form data (you can add more validation as needed)
    if (empty($name) || empty($email) || empty($message)) {
        echo "Please fill out all required fields.";
        exit;
    }

    // Prepare email details
    $to = "emersonlemus505@gmail.com";  // Replace with your actual email address
    $subject = "New Free Estimate Request from $name";
    $body = "
    You have received a new request for a free estimate. Here are the details:
    
    Name: $name
    Email: $email
    Phone: $phone
    Message: $message
    ";

    // Headers to make the email more readable
    $headers = "From: no-reply@goldenmulti.com" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "Content-Type: text/plain; charset=UTF-8";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you for your submission. We will get back to you shortly!";
    } else {
        echo "There was an error sending your request. Please try again.";
    }
} else {
    // If not a POST request, redirect to the form page
    header("Location: index.html");
    exit;
}
?>
