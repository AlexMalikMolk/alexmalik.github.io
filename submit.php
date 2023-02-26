<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form fields and sanitize the input
  $name = htmlspecialchars($_POST["name"]);
  $email = htmlspecialchars($_POST["email"]);
  $message = htmlspecialchars($_POST["message"]);

  // Set the email subject and body
  $subject = "New message from " . $name;
  $body = "Name: " . $name . "\n";
  $body .= "Email: " . $email . "\n\n";
  $body .= "Message:\n" . $message;

  // Set the recipient email address
  $to = "alex.malik@outlook.com";

  // Set the email headers
  $headers = "From: " . $email . "\r\n";
  $headers .= "Reply-To: " . $email . "\r\n";
  $headers .= "X-Mailer: PHP/" . phpversion();

  // Send the email
  mail($to, $subject, $body, $headers);

  // Redirect the user back to the form page
  header("Location: form.html");
  exit();
}
?>
