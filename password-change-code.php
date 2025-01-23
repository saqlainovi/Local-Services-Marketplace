<?php
session_start();
include('dbcon.php');

if(isset($_POST['password_update']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $token = mysqli_real_escape_string($con, $_POST['password_token']);

    if(!empty($token))
    {
        if(!empty($email) && !empty($new_password) && !empty($confirm_password))
        {
            // Check reset_token instead of verify_token
            $check_token = "SELECT * FROM users WHERE (verify_token='$token' OR reset_token='$token') AND email='$email' LIMIT 1";
            $check_token_run = mysqli_query($con, $check_token);

            if(mysqli_num_rows($check_token_run) > 0)
            {
                if($new_password == $confirm_password)
                {
                    $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                    
                    // Update password and clear reset_token
                    $update_query = "UPDATE users SET password='$new_hashed_password', reset_token=NULL WHERE reset_token='$token' AND email='$email' LIMIT 1";
                    $update_query_run = mysqli_query($con, $update_query);

                    if($update_query_run)
                    {
                        $_SESSION['status'] = "Password Updated Successfully! Please Login";
                        header("Location: login.php");
                        exit(0);
                    }
                    else
                    {
                        $_SESSION['status'] = "Did not update password. Something went wrong!";
                        header("Location: password_change.php?token=$token&email=$email");
                        exit(0);
                    }
                }
                else
                {
                    $_SESSION['status'] = "Password and Confirm Password does not match";
                    header("Location: password_change.php?token=$token&email=$email");
                    exit(0);
                }
            }
            else
            {
                $_SESSION['status'] = "Invalid Token";
                header("Location: password_change.php?token=$token&email=$email");
                exit(0);
            }
        }
        else
        {
            $_SESSION['status'] = "All fields are mandatory";
            header("Location: password_change.php?token=$token&email=$email");
            exit(0);
        }
    }
    else
    {
        $_SESSION['status'] = "No Token Available";
        header("Location: password_change.php");
        exit(0);
    }
}
?>