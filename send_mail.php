<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Get form values safely
//     $name     = htmlspecialchars($_POST['name']);
//     $email    = htmlspecialchars($_POST['email']);
//     $phone    = htmlspecialchars($_POST['phone']);
//     $project  = htmlspecialchars($_POST['project']);
//     $subject  = htmlspecialchars($_POST['subject']);
//     $message  = htmlspecialchars($_POST['message']);

//     // Email details
//     $to = "vikasdhiman1008@gmail.com";
//     $email_subject = "New Message from Portfolio: $subject";

//     $email_body = "
// You have received a new message from your website contact form:

// Name: $name
// Email: $email
// Phone: $phone
// Project: $project
// Subject: $subject

// Message:
// $message
// ";

//     $headers = "From: $email\r\n";
//     $headers .= "Reply-To: $email\r\n";

//     // Send the email
//     if (mail($to, $email_subject, $email_body, $headers)) {
//         echo "<script>alert('Message sent successfully!'); window.history.back();</script>";
//     } else {
//         echo "<script>alert('Message failed to send. Try again.'); window.history.back();</script>";
//     }
// } else {
//     echo "Access Denied";
// }
?>


<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = htmlspecialchars($_POST['name']);
    $email    = htmlspecialchars($_POST['email']);
    $phone    = htmlspecialchars($_POST['phone']);
    $project  = htmlspecialchars($_POST['project']);
    $subject  = htmlspecialchars($_POST['subject']);
    $message  = htmlspecialchars($_POST['message']);

    $body = "
You have received a new message from your website:

Name: $name
Email: $email
Phone: $phone
Project: $project
Message:
$message
";

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.hostinger.com'; // Use your host's SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'vikasdhi@vikasdhiman.shop'; // your full email
        $mail->Password   = 'vikas@123'; // your email password
        $mail->SMTPSecure = 'tls'; // or 'ssl' if required
        $mail->Port       = 587; // or 465 if using SSL

        // Recipients
        $mail->setFrom('vikasdhi@vikasdhiman.shop', 'Portfolio Website');
        $mail->addAddress('vikasdhiman1008@gmail.com'); // where message is received
        $mail->addReplyTo($email, $name);

        // Content
        $mail->isHTML(false);
        $mail->Subject = "New Contact Form Message: $subject";
        $mail->Body    = $body;

        $mail->send();
        echo "<script>alert('Message sent successfully!'); window.history.back();</script>";
    } catch (Exception $e) {
        echo "<script>alert('Mailer Error: {$mail->ErrorInfo}'); window.history.back();</script>";
    }
}
?>
