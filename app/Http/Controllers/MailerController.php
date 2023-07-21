<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



class MailerController extends Controller
{
    public function sendEmail()
    {
        $mail = new PHPMailer(true); // 'true' enables exceptions for better error handling

        try {
            // Server settings
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com'; // Gmail SMTP host
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'donator01.balbuena@gmail.com'; // Your Gmail email address
            $mail->Password = 'balbuenafamily1!'; // Your Gmail password
            $mail->SMTPSecure = 'ssl'; // Enable TLS encryption
            $mail->Port = 465; // TCP port to connect to

            // Sender and recipient
            $mail->setFrom('donator01.balbuena@gmail.com', 'Sandy');
            $mail->addAddress('mcpoginel@gmail.com', 'MC');

            // Email content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Basic Email using PHPMailer';
            $mail->Body = 'This is a basic email sent using PHPMailer.';

            // Send the email
            $mail->send();

            echo "Email sent successfully!";
        } catch (Exception $e) {
            echo "Email could not be sent. Error: " . $mail->ErrorInfo;
        }
    }
}
