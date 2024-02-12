<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/* Exception class. */
require 'C:\xampp\htdocs\Gp\PHPMailer-master\PHPMailer-master\src\Exception.php';

/* The main PHPMailer class. */
require 'C:\xampp\htdocs\Gp\PHPMailer-master\PHPMailer-master\src\PHPMailer.php';

/* SMTP class, needed if you want to use SMTP. */
require 'C:\xampp\htdocs\Gp\PHPMailer-master\PHPMailer-master\src\SMTP.php';

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // Your SMTP server hostname
    $mail->SMTPAuth   = true;
    $mail->Username   = 'prezypiet@gmail.com'; // Your email address
    $mail->Password   = 'auic scoj unnw lput'; // Your email password
    $mail->SMTPSecure = 'tls'; // Use 'tls' or 'ssl' for STARTTLS or SSL encryption, respectively
    $mail->Port       = 587; // SMTP port number (587 for TLS, 465 for SSL)
    

    // Recipient and message
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject= $_POST["subject"];
    $message = $_POST["message"];

    if (empty($name) || empty($email) || empty($message)) {
        echo "Please fill in all required fields.";
        exit;
    }

    $mail->setFrom($email);
    $mail->addAddress('prezypiet@gmail.com', 'Present Khoza');
    $mail->Subject = $subject;
    $mail->Body    = $message;

    // Send email
   $mail->send();
   echo 'Thank you for your message. We will get back to you soon.';
} catch (Exception $e) {
    echo "Message could not be sent.";
}


// Check if the form was submitted

?>