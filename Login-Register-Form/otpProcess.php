<?php 
session_start(); 
include "db_conn.php";


if(isset($_POST['otp'])){
    $userProvidedOtp = $_POST['otp'];
    $id = $_SESSION['id'];
    $email = $_SESSION['email'];
    $sql = ("SELECT * FROM users WHERE id = '$id'");
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if($userProvidedOtp == $row['OTP']){
		header("Location: home.php");
		exit();
    }
    else {
		header("Location: otp.php?error=Incorect otp");
		exit();
	}

}