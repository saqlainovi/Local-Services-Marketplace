<?php
session_start();
include("dbcon.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
function resent_email_verify($name, $email, $verify_token)
{
    $mail = new PHPMailer(true);

    try {
        // SMTP Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'ih134857@gmail.com'; // Replace with your email
        $mail->Password   = 'wgqx macg ytgh udlr'; // Replace with your app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom("ih134857@gmail.com", 'Local Service');
        $mail->addAddress($email, $name);
        $mail->addReplyTo('mdsiyamsaqlainovi@gmail.com', 'Information');

        // Content
        $mail->isHTML(true);
        $mail->Subject = "Resend Email verification for Local Service Verification";
        $email_template = "
            <h2>You have Registered with Local Service Verification</h2>
            <h5>Verify your email address to log in using the link below:</h5>
            <br><br>
            <a href='http://localhost/login%20with%20email%20verification/local/verify-email.php?token=$verify_token'>Click here to verify your email</a>
        ";
        $mail->Body = $email_template;

        $mail->send();
        echo "Verification email sent.";
    } catch (Exception $e) {
        echo "Verification email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

if(isset($_POST["resent_email_verify_btn"]))
{

    if(!empty(trim($_POST["email"])))
        {
            $email = mysqli_real_escape_string($con,$_POST["email"]) ;
            $checkemail_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
            $checkemail_query_run = mysqli_query($con,$checkemail_query);


            if(mysqli_num_rows($checkemail_query_run) > 0)
            {
                $row = mysqli_fetch_array($checkemail_query_run);
                
                if($row['verify_status'] == "0")
                {
                    
                    $name = $row['name'];
                    $email = $row['email'];
                    $verify_token = $row['verify_token'];
                    
                    resent_email_verify($name, $email,$verify_token);



                    $_SESSION['status']='verification email link has been send to ur mail';
                    header("Location: login.php");
                    exit(0);
                }
                else
                {
                    $_SESSION['status']='email alrady verified please logiin';
                    header("Location: resend-email-verification.php");
                    exit(0);
                }



            }
                else
                {  
                    $_SESSION['status']='Email is not registard , plese register now';
                    header("Location: register.php");
                    exit(0);
                } 
              




            }
        else
            {   
                $_SESSION['status']='plese inter the email fild';
                header("Location: resend-email-verification.php");
                exit(0);

                }



}
else
{

}

?>