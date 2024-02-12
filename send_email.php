<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\Gp\PHPMailer-master\PHPMailer-master\src\Exception.php';
require 'C:\xampp\htdocs\Gp\PHPMailer-master\PHPMailer-master\src\PHPMailer.php';
require 'C:\xampp\htdocs\Gp\PHPMailer-master\PHPMailer-master\src\SMTP.php';

if (isset($_POST["send"])) {
    try {
        $mail = new PHPMailer(true);

        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'prezypiet@gmail.com'; // Change this to your Gmail address
        $mail->Password   = 'auic scoj unnw lput'; // Change this to your Gmail password
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;

        // Recipients
        $mail->setFrom($_POST["email"], $_POST["name"]);
        $mail->addAddress('prezypiet@gmail.com');
        $mail->addReplyTo($_POST["email"], $_POST["name"]);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $_POST["subject"];

        // Build email body
        $emailBody = "<p><strong>Name:</strong> {$_POST["name"]}</p>";
        $emailBody .= "<p><strong>Email:</strong> {$_POST["email"]}</p>";
        $emailBody .= "<p><strong>Phone:</strong> {$_POST["phone"]}</p>";
        $emailBody .= "<p><strong>Service:</strong> {$_POST["fq_services"]}</p>";

        if ($_POST["fq_services"] == "service1") { // Air-Conditioner Installation
            $emailBody .= "<p><strong>Room Size:</strong> {$_POST["room_size"]}</p>";
            $emailBody .= "<p><strong>Air Conditioner Size:</strong> {$_POST["air_conditioner_size"]}</p>";
        } elseif ($_POST["fq_services"] == "service2") { // Refrigerators
            $emailBody .= "<p><strong>Refrigerator Type:</strong> {$_POST["refrigerator_type"]}</p>";
            $emailBody .= "<p><strong>Refrigerator Color:</strong> {$_POST["refrigerator_color"]}</p>";
        } elseif ($_POST["fq_services"] == "service3") { // Electric Motors
            $emailBody .= "<p><strong>Electric Motor Type:</strong> {$_POST["electric_motor_type"]}</p>";
        }

        $emailBody .= "<p><strong>Subject:</strong> {$_POST["subject"]}</p>";
        $emailBody .= "<p><strong>Message:</strong> {$_POST["message"]}</p>";

        $mail->Body = $emailBody;

        // Send email
        $mail->send();

        echo "
            <script>
                alert('Message was sent successfully!');
                window.location.href = 'index.html';
            </script>
        ";
    } catch (Exception $e) {
        echo "
            <script>
                alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');
                window.location.href = 'Thank-you.html'; // Redirect to an error page
            </script>
        ";
    }
}
?>
