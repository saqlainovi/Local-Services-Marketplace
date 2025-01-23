// At the top of your file where email is being sent
$project_path = "http://localhost/login%20with%20email%20verification/local%20for%20nextday%20confim%20v6/local";

// Then use it in your email link
$verify_link = $project_path . "/verify-email.php?token=" . $verify_token;

// Your email sending code
$mail->Body = "
    <h2>Hello</h2>
    <h3>Please click the link below to verify your email address:</h3>
    <br/><br/>
    <a href='$verify_link'>Click here to verify</a>
";