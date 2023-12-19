<?php

session_start();

if (isset($_SESSION['username'])) {
    header("location:index.php");
    exit;
} 

require "dbConnect.php";

const SEVEN_DAYS = (7 * 24 * 60 * 60);

$user = filter_input(INPUT_POST, "user");
$password = filter_input(INPUT_POST, "password");
$remember = filter_input(INPUT_POST, "remember");
$ip = ip2int(filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP));

if (!filter_var($user, FILTER_VALIDATE_EMAIL)) {
    $sql = "SELECT id, username, usertype, email, ip_address, password FROM user WHERE username = ?";
} else {
    $sql = "SELECT id, username, usertype, email, ip_address, password FROM user WHERE email = ?";
}

$result = login_query($sql, $user);

/* Upon successful login, start a new session and verify IP address */
if (gettype($result) == "object") {

    $row = $result->fetch_assoc();

    if ($row && password_verify($password, $row['password'])) {

        if ($row['ip_address'] != $ip) {
            
        } // Security breach?
        session_start();

        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['usertype'] = $row['usertype'];

    } 
    
    else {
        header("location:login.php?msg=Login Failed " . $hpassword);
        exit;
    }
} 

else {
    header("location:login.php?msg=". $result);
    exit;
}

db_close();
header("location:index.php?msg=Login Success");
exit;
?>

