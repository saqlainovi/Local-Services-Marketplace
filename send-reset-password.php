<?php
session_start();
include('dbcon.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if(isset($_POST['send_password_reset']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $reset_token = md5(rand());

    $check_email = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $check_email_run = mysqli_query($con, $check_email);

    if(mysqli_num_rows($check_email_run) > 0)
    {
        $row = mysqli_fetch_array($check_email_run);
        $get_name = $row['name'];
        $get_email = $row['email'];

        $update_token = "UPDATE users SET verify_token='$reset_token', reset_token='$reset_token' WHERE email='$get_email' LIMIT 1";
        $update_token_run = mysqli_query($con, $update_token);

        if($update_token_run)
        {
            $mail = new PHPMailer(true);
            try {
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'ih134857@gmail.com';
                $mail->Password = 'wgqx macg ytgh udlr';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom('ih134857@gmail.com', 'Local Service');
                $mail->addAddress($get_email);

                $mail->isHTML(true);
                $mail->Subject = 'Reset Password Notification';

                $email_template = "
                    <h2>Hello $get_name</h2>
                    <h5>You are receiving this email because we received a password reset request for your account.</h5>
                    <br/><br/>
                    <a href='http://localhost/login%20with%20email%20verification/local/password_change.php?token=$reset_token&email=$get_email'>
                        Click Here to Reset Password
                    </a>
                ";

                $mail->Body = $email_template;
                $mail->send();

                $_SESSION['status'] = "We emailed you a password reset link";
                header("Location: password_reset.php");
                exit(0);
            }
            catch (Exception $e) {
                $_SESSION['status'] = "Something went wrong! Please try again.";
                header("Location: password_reset.php");
                exit(0);
            }
        }
        else
        {
            $_SESSION['status'] = "Something went wrong! #1";
            header("Location: password_reset.php");
            exit(0);
        }
    }
    else
    {
        $_SESSION['status'] = "No Email Found";
        header("Location: password_reset.php");
        exit(0);
    }
}

// If someone tries to access this file directly
if(!isset($_POST['send_password_reset']))
{
    $_SESSION['status'] = "Not Allowed";
    header("Location: password_reset.php");
    exit(0);
}
?> 