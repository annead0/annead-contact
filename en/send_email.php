<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $to = "annead-osp@proton.me";
  $subject = "Annead Contact Form";

  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];

  $headers = "From: $email\r\n";
  $headers .= "Reply-To: $email\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

  // Send the email
  $mail_sent = mail($to, $subject, $message, $headers);

  if ($mail_sent) {
    echo "Email sent successfully.";
  } else {
    echo "Failed to send email.";
  }
}
?>
