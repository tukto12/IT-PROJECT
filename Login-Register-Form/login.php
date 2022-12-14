<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if(empty($_POST['g-recaptcha-response'])){
		header("Location: index.php?error=Captcha is required");
	    exit();
	}
	else {
		$secret = "??";

		$response=file_get_contents('???'.$secret.'$response='.$_POST['g-recaptcha-response']);

		$data = json_decode(($response));

		if($data->success){
			echo "Data sent";
		}
		else {
			echo "Please try again";
		}
	}


	if (empty($uname)) {
		header("Location: index.php?error=Username is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}
	else{

		$sql = "SELECT * FROM users WHERE user_name='$uname'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && password_verify($pass, $row["password"])) {
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['email'] = $row['email'];
            	$_SESSION['id'] = $row['id'];
				
				$otp = rand(1111, 9999);
				$email = $row['email'];
				$sql2 = "UPDATE users SET OTP = '$otp' WHERE email = '$email' ";
				$result2 = mysqli_query($conn, $sql2);
				sendEmail($email, $otp);
            	header("Location: otp.php");
		        exit();
            }else{
				header("Location: index.php?error=Incorect Username or password");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect Username or password");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}

// if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['otp'])){
//     $userProvidedOtp = $conn->real_escape_string($_POST['otp']);
//     $email = $_SESSION['email'];
//     $result = ("select OTP from users where email = '$email'");
//     if($userProvidedOtp == $result){
// 		header("Location: home.php");
// 		exit();
//     }
//     else {
// 		header("Location: otp.php?error=Incorect otp");
// 		exit();
// 	}

// }


function sendEmail($email, $otp){
   
	$mail = new PHPMailer(true);
	
	try{
	$mail->isSMTP();
	$mail->Host = '???????';
	$mail->Username ='??????';
	$mail->Password = '?????';
	$mail->SMTPAuth=true;
	$mail->Port = 1111111111111111;
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
	$mail->setFrom('no-reply@gmail.com', 'OTP');
	$mail->addAddress($email);
	$mail->isHTML(true);
	$mail->Subject='Your OTP Code';
	$mail->Body = "Here is your OTP code: <br> $otp";
	$mail->send();
	}catch(Exception $e)
		{echo $e;}
	}