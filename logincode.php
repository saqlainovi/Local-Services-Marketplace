<?php
session_start();
include("dbcon.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST["login_now_btn"])) 
{
    if(!empty(trim($_POST['email'])) && !empty(trim($_POST['password'])))
    {
        $email = mysqli_real_escape_string($con, $_POST["email"]);
        $password = $_POST["password"];
        
        $login_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $login_query_run = mysqli_query($con, $login_query);

        if (!$login_query_run) {
            die("Query failed: " . mysqli_error($con));
        }

        if(mysqli_num_rows($login_query_run) > 0)
        {
            $row = mysqli_fetch_array($login_query_run);
            
            if(password_verify($password, $row["password"]))
            {
                if($row["verify_status"] == "1")
                {
                    $_SESSION['authenticated'] = TRUE;
                    $_SESSION['auth_user'] = [
                        'username' => $row['name'],
                        'phone' => $row['phone'],
                        'email' => $row['email'],
                    ];
                    
                    $_SESSION['status'] = "You are logged in successfully";
                    header("Location: dashboard.php");
                    exit(0);
                }
                else
                {
                    $_SESSION['status'] = "Please verify your email address to login";
                    header("Location: login.php");
                    exit(0);
                }
            }
            else
            {
                $_SESSION['status'] = "Invalid email or password";
                header("Location: login.php");
                exit(0);
            }
        }
        else
        {
            $_SESSION['status'] = "Invalid email or password";
            header("Location: login.php");
            exit(0);
        }
    }
    else
    {
        $_SESSION['status'] = "All fields are mandatory";
        header("Location: login.php");
        exit(0);
    }
}
?>