<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $subject = trim($_POST["subject"]);
    $message = trim($_POST["message"]);

    // Validate form fields
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo json_encode(["status" => "error", "message" => "All fields are required."]);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["status" => "error", "message" => "Invalid email format."]);
        exit;
    }

    // Email recipient
    $to = "iandavelemera@gmail.com";  // Change this to a real email
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $fullMessage = "Name: $name\nEmail: $email\n\nMessage:\n$message";

    // Try sending the email
    if (@mail($to, $subject, $fullMessage, $headers)) {
        echo json_encode(["status" => "success", "message" => "Your message has been sent successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Email sending failed. Check your mail server."]);
    }
    exit;
}
?>
