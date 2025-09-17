<?php
session_start();
require 'db.php';  // Your DB connection

// --- CSRF Protection ---
if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    $_SESSION['form_error'] = "Security check failed. Please try again.";
    header("Location: contact.php");
    exit;
}

// --- Sanitize & Validate ---
$name    = trim($_POST['name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

if (strlen($name) < 2) {
    $_SESSION['form_error'] = "Name must be at least 2 characters.";
    header("Location: contact.php");
    exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['form_error'] = "Invalid email address.";
    header("Location: contact.php");
    exit;
}
if (strlen($message) < 10) {
    $_SESSION['form_error'] = "Message must be at least 10 characters.";
    header("Location: contact.php");
    exit;
}

// --- Save to DB ---
$stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)"); 
$stmt->bind_param('sss', $name, $email, $message);
if ($stmt->execute()) {
    // --- Optional Email Notification ---
    $to = "admin@example.com";
    $subject = "New Contact Form Submission";
    $headers = "From: noreply@nsblpa.com\r\nContent-Type: text/plain; charset=UTF-8";
    mail($to, $subject, "Name: $name\nEmail: $email\n\nMessage:\n$message", $headers);

    // --- Success ---
    $_SESSION['form_success'] = true;
} else {
    $_SESSION['form_success'] = false;
}
$stmt->close();

header("Location: contact.php");
exit;
