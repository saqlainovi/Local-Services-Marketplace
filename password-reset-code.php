<?php
session_start();
include('dbcon.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if(isset($_POST['password_reset_link']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $token = md5(rand());

    $check_email = "SELECT email FROM users WHERE email='$email' LIMIT 1";
    $check_email_run = mysqli_query($con, $check_email);

    if(mysqli_num_rows($check_email_run) > 0)
    {
        $update_token = "UPDATE users SET reset_token='$token' WHERE email='$email' LIMIT 1";
        $update_token_run = mysqli_query($con, $update_token);

        if($update_token_run)
        {
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'ih134857@gmail.com';
                $mail->Password = 'wgqx macg ytgh udlr';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom('ih134857@gmail.com', 'Local Service');
                $mail->addAddress($email);

                $mail->isHTML(true);
                $mail->Subject = "Reset Password - Local Service";

                $reset_link = "http://localhost/login%20with%20email%20verification/local%20for%20nextday%20confim%20v6/local/password_change.php?token=" . $token . "&email=" . $email;

                $mail->Body = "
                    <h2>Hello</h2>
                    <p>You are receiving this email because we received a password reset request for your account.</p>
                    <br>
                    <a href='{$reset_link}'>Click Here to Reset Password</a>
                    <br><br>
                    <p>If you did not request a password reset, no further action is required.</p>
                ";

                error_log("Reset Link Generated: " . $reset_link);

                $mail->send();
                $_SESSION['status'] = "Password Reset link has been sent to your email";
                header("Location: password-reset.php");
                exit(0);
            }
            catch (Exception $e) {
                $_SESSION['status'] = "Something went wrong. Please try again";
                header("Location: password-reset.php");
                exit(0);
            }
        }
        else
        {
            $_SESSION['status'] = "Something went wrong. Please try again";
            header("Location: password-reset.php");
            exit(0);
        }
    }
    else
    {
        $_SESSION['status'] = "No Email Found";
        header("Location: password-reset.php");
        exit(0);
    }
}
?> 