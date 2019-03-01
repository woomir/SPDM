<?php

$connect = mysqli_connect("localhost", "root", "$52Telecast", "woomir");
if (!$connect){
    die("Database Connection Failed" . mysqli_error($connect));
}
if(isset($_POST)){
	$inputEmail = mysqli_real_escape_string($connect, $_POST['inputEmail']);
	$sql = "SELECT * FROM users WHERE email ='".$inputEmail."'";
	$res = mysqli_query($connect, $sql);
	$count = mysqli_num_rows($res);
	if($count == 1){
		echo "Send email to user with password";
	}else{
		echo "User name does not exist in database";
	}
}

$r = mysqli_fetch_assoc($res);

function sanitize_my_email($field) {
    $field = filter_var($field, FILTER_SANITIZE_EMAIL);
    if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }}

$password = $r['password'];
$to = $r['email'];
$from = "woomir";
$subject = "Your Recovered Password";
$body = "Please use this password to login : " . $password;
$headers = 'From: woomir@gmail.com';

/*if(mail($to, $subject, $body)){
	echo "Your Password has been sent to your email id";
}else{
	echo "Failed to Recover your password, try again";
}*/

$secure_check = sanitize_my_email($to);
if ($secure_check == false) {
    echo "Invalid input";
} else { //send email
    mail($to, $subject, $body);
    echo "This email is sent using PHP Mail";
}

?>
