<?php
session_start();
if (!isset($_SESSION["authenticated"])) {

    $_SESSION['status'] = 'plese loogin the ddashbord';
    header('Location: login.php');
    exit(0);
}




?>