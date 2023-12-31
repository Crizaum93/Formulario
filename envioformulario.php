<?php
use PHPMailer\PHPMailer-master\src\PHPMailer;
use PHPMailer\PHPMailer-master\src\SMTP;
use PHPMailer\PHPMailer-master\src\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $assunto = $_POST["phone"];
    $message = $_POST["message"];

    // Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;    // Enable verbose debug output
        $mail->isSMTP();                          // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';   // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                 // Enable SMTP authentication
        $mail->Username   = 'santanalucasdev@gmail.com';   // SMTP username
        $mail->Password   = 'Henrique23@';             // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable implicit TLS encryption
        $mail->Port       = 587;                  // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('from@example.com', 'Mailer');
        $mail->addAddress('santanalucasdev@gmail.com'); // Add a recipient
        $mail->addAddress('santanalucasdev@gmail.com');           // Name is optional
        $mail->addReplyTo('info@example.com', 'Information');
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');

        //Attachments
        $mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
        $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name

        //Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>