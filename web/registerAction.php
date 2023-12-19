<?php

session_start();

if (isset($_SESSION['username'])) {
    header("location:index.php");
    exit;
} 

const SEVEN_DAYS = (7 * 24 * 60 * 60);

$username = filter_input(INPUT_POST, "username");
$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, "password");
$security_q = filter_input(INPUT_POST, "sq-option");
$security_a = filter_input(INPUT_POST, "sq-answer");
$promo = filter_input(INPUT_POST, "promo"); 
$remember = filter_input(INPUT_POST, "remember"); // remember me? for cookie -- implement later
$hpassword = password_hash($password, PASSWORD_DEFAULT);
$timestamp;

if (preg_match('/^[a-zA-Z0-9]+$/', $username) == 0) {
    header("location:register.php?msg=Invalid Username");
    exit;
}

if ($email === false) {
    header("location:register.php?msg=Invalid Email");
    exit;
}

if (strlen($password) > 20 || strlen($password) < 5) {
	header("location:register.php?msg=Invalid Password");
    exit;
}

require 'dbConnect.php';

if (user_exists($username, false)) {
    header("location:register.php?msg=Username Taken");
    exit;
}

if (user_exists($email, true)) {
    header("location:register.php?msg=Email Taken");
    exit;
}

$ip = ip2int(filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP));

$sql = "INSERT INTO user (username, email, password, security_q, security_a, ip_address, promo)" .
        "VALUES ('$username', '$email', '$hpassword', '$security_q', '$security_a', '$ip', '$promo')";

if ($conn->query($sql) == true) {

    session_start();

    $_SESSION["username"] = $username;
    $_SESSION["userid"] = mysqli_insert_id($conn);
    $_SESSION["usertype"] = 1;
    header("location:index.php?msg=Registration Success");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header("location:register.php?msg=Registration Fail");
    exit;
}

if ($remember) {
    setcookie("username", $uname, time() + SEVEN_DAYS);
    setcookie("userid", $loggedIn, time() + SEVEN_DAYS);
}

db_close();
exit;
?>