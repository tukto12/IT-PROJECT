<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['email']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	$re_pass = validate($_POST['re_password']);
	$email = validate($_POST['email']);

	$user_data = 'uname='. $uname. '&email='. $email;


	if (empty($uname)) {
		header("Location: signup.php?error=Username is required&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: signup.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: signup.php?error=Re Password is required&$user_data");
	    exit();
	}

	else if(empty($email)){
        header("Location: signup.php?error=Email is required&$user_data");
	    exit();
	}

	else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: signup.php?error=Invalid email format&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: signup.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{

		// hashing the password
		$hashPass = password_hash($pass, PASSWORD_DEFAULT);

	    $sql = "SELECT * FROM users WHERE user_name='$uname' ";
		$result = mysqli_query($conn, $sql);
		$sql2 = "SELECT * FROM users WHERE email='$email'";
		$result2 = mysqli_query($conn, $sql2);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The username is taken try another&$user_data");
	        exit();
		}
		else if (mysqli_num_rows($result2) > 0){
			header("Location: signup.php?error=The email is taken try another&$user_data");
		}
		else {
           $sql3 = "INSERT INTO users(user_name, password, email) VALUES('$uname', '$hashPass', '$email')";
           $result3 = mysqli_query($conn, $sql3);
           if ($result3) {
           	 header("Location: signup.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: signup.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
}