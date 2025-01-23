<?php
$con = mysqli_connect("localhost", "root", "", "hackathon");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?> 