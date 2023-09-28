<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'lib/PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
// require 'path/to/PHPMailer/src/PHPMailer.php';
require 'lib/PHPMailer-master/PHPMailer-master/src/SMTP.php';
require 'lib/PHPMailer-master/PHPMailer-master/src//Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "eman.lajam7@gmail.com";
    $name = $_POST["txtName"];
    $email = $_POST["txtEmail"];
    $subject = $_POST["subject"];
    $message = $_POST["txtMsg"];

    $mail = new PHPMailer(true);
    
    try {
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'eman.lajam7@gmail.com'; // Replace with your Gmail address
        $mail->Password = 'mqsiwvhnxpynmxxq'; // Replace with your Gmail password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom($email, $name);
        $mail->addAddress($to);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
        echo "OK";
    } catch (Exception $e) {
        echo "Error: {$mail->ErrorInfo}";
    }
} else {
    // Not a POST request, redirect or handle accordingly
}
?>
