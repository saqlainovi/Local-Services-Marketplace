<?php
session_start();
include('dbcon.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if(isset($_POST['register_btn'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = $_POST['password'];
    
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $verify_token = md5(rand());

    // Check if email exists
    $check_email_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if(mysqli_num_rows($check_email_query_run) > 0) {
        $_SESSION['status'] = "Email ID already exists";
        header("Location: register.php");
        exit();
    } else {
        // Insert user with hashed password
        $query = "INSERT INTO users (name, phone, email, password, verify_token, verify_status) 
                 VALUES ('$name', '$phone', '$email', '$hashed_password', '$verify_token', '0')";
        $query_run = mysqli_query($con, $query);

        if($query_run) {
            send_verification_email($name, $email, $verify_token);
            $_SESSION["status"] = "Registration successful. Please verify your email.";
            header("Location: register.php");
            exit();
        } else {
            $_SESSION["status"] = "Registration failed";
            header("Location: register.php");
            exit();
        }
    }
}

function send_verification_email($name, $email, $verify_token) {
    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ih134857@gmail.com'; // Your email
        $mail->Password = 'wgqx macg ytgh udlr'; // Your app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('ih134857@gmail.com', 'Local Service');
        $mail->addAddress($email, $name);
        $mail->addReplyTo('mdsiyamsaqlainovi@gmail.com', 'Information');

        $mail->isHTML(true);
        $mail->Subject = "Email verification for Local Service";
        
        $verify_link = "http://localhost/login%20with%20email%20verification/local/verify-email.php?token=" . $verify_token;
        
        $email_template = "
            <h2>You have Registered with Local Service</h2>
            <h5>Verify your email address to login with the below given link</h5>
            <br/><br/>
            <a href='{$verify_link}'>Click Here to Verify</a>
        ";
        
        $mail->Body = $email_template;
        $mail->send();
        
        error_log("Verification link sent: " . $verify_link);
        
        return true;
    } catch (Exception $e) {
        error_log("Email sending failed: " . $e->getMessage());
        return false;
    }
}

if(isset($_POST['update_profile'])) {
    $email = $_SESSION['auth_user']['email'];
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    
    $update_query = "UPDATE users SET name = '$name', phone = '$phone'";
    
    // Handle password update if provided
    if(!empty($_POST['new_password'])) {
        if($_POST['new_password'] === $_POST['confirm_password']) {
            $password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
            $update_query .= ", password = '$password'";
        } else {
            $_SESSION['message'] = "Passwords do not match!";
            $_SESSION['message_type'] = "danger";
            header('Location: edit_profile.php');
            exit();
        }
    }
    
    $update_query .= " WHERE email = '$email'";
    
    if(mysqli_query($con, $update_query)) {
        $_SESSION['auth_user']['name'] = $name;
        $_SESSION['message'] = "Profile updated successfully";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Failed to update profile";
        $_SESSION['message_type'] = "danger";
    }
    
    header('Location: edit_profile.php');
    exit();
}
?>