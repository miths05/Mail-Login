<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Load PHPMailer
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Retrieve form data
$from_email = "mithilesh.22210486@viit.ac.in";
$to_email = $_POST["to_email"];
$name = $_POST["name"];
$message = $_POST["message"];
$subject = $_POST["subject"];
// Compose email message
$email_message = "<p><strong>Name:</strong> $name</p>";
$email_message .= "<p><strong>Email:</strong> $from_email</p>";
$email_message .= "<p><strong>Message:</strong> $message</p>";
// Create a PHPMailer instance
$mail = new PHPMailer(true);
try {
// Set SMTP settings
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'mithilesh.22210486@viit.ac.in'; // Your Gmail username
$mail->Password = 'pxbd ddch jsty xgqa'; 
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
// Set sender and recipient
$mail->setFrom($from_email);
$mail->addAddress($to_email);
// Set email content
$mail->isHTML(true);
$mail->Subject = $subject;
$mail->Body = $email_message;
// Send email
$mail->send();
echo "Thank you for contacting us! Your message has been sent.";
     header("refresh:3;url=Unreadallmails.php");
    } catch (Exception $e) {
        echo "Oops! Something went wrong: {$mail->ErrorInfo}";
    }
} else {
// Redirect users if they try to access the script directly
header("Location: login.php");
exit();

}
?>