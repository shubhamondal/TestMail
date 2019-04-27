<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'D:\xampp\composer\vendor\autoload.php'; 



$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email_from = $_POST['email'];
$mobile = $_POST['telephone'];
$content = $_POST['comments'];

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "mondal.shubha@gmail.com"; //User Name to use for SMTP authentication
$mail->Password = "shubhamondal"; //Password to use for SMTP authentication

$mail->setFrom($email_from, $first_name. ' '.$last_name);
$mail->addReplyTo($email_from, $first_name. ' '.$last_name);
$mail->addAddress('mondal.shubha@gmail.com', 'Subha Mondal');
$mail->Subject = 'GMail SMTP TEST';
$mail->Body = <<<EOT
HI,
I am {$first_name} {$last_name}.
Message: {$content}
E-mail: {$email_from}
Telephone:{$mobile}

Thanks & Regards,
{$first_name} {$last_name}
EOT;

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}

?>