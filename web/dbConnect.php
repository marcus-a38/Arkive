<?php

// MySQL API
$dbname     = ?
$servername = ?
$dbusername = ?
$dbpassword = ?
$conn;

function db_connect() {
  	global $servername, $dbusername, $dbpassword, $dbname, $conn;

  	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
  	if ($conn->connect_error) return false;

    return true;
}

function db_close() {
	global $conn;
	$conn->close;
}

function execute_query($sql) {
	global $conn;
    $res = $conn->query($sql);

    if (gettype($res) == "object" || $res === true) {
		return $res;
	} else { // invalid
		echo "Your SQL: " . $res;
		return null;
	}
}

function login_query($sql, $user) {
	global $conn;

	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s", $user);
	$stmt->execute();
	$res = $stmt->get_result();

	return gettype($res) == "object" ? $res : null;
}

function user_exists($input, $is_email) {
/*
	$input: string --> a username or email address
	$is_email: bool --> email or username?

	Search the database for any existing record
	for a given username or email
*/
	global $conn;

	$param = $is_email ? "email" : "username";
	$sql = "SELECT id FROM user WHERE $param = '$input'";
	$res = execute_query($sql);
	return $res->num_rows == 0 ? false : true;
}

function ip2int($ip) {
/*
	Credits to https://t.ly/5caiu

	$ip: string --> any valid IPv4 or IPv6 address

	Create a packed version of IP, iteratively unpack the digits
	and append to a string buffer. Finally, return the intval (long)
*/
	if (!$ip) {
		return "null"; // insert a null value in the DB when ip is invalid
	} 

    $packed = @inet_pton($ip);
    if ($packed === false) return null;
    
    $buffer = "";
    foreach (unpack('C*', $packed) as $digit) {
        $buffer .= str_pad(decbin($digit), 8, '0', STR_PAD_LEFT);
    }

    return intval(ltrim($buffer, '0'), 2);
}


$db_ok = db_connect();

if (!$db_ok) {
	die("Connection failed: " . mysqli_connect_error());
}

?>