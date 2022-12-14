<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['modelSelect']) && isset($_POST['safePassword'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }

     $id = $_SESSION['id'];
     $model = validate($_POST['modelSelect']);
     $userPass = validate($_POST['password']);
     $safepass = validate($_POST['safePassword']);


    //  $sql = "SELECT * FROM safe s AND users u WHERE u.id = s.user_id";
    //  $result = mysqli_query($conn, $sql);

    $sql = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if(password_verify($userPass, $row["password"])) { 

    if(strlen($safepass) != 6){
        header("Location: safe.php?error=Password require 6 char&");
	    exit();
    }
    else {
    
    $hashSafePass = password_hash($safepass, PASSWORD_DEFAULT);
    $sql2 = "Insert INTO safe(safe_model, safe_password, user_id) VALUES('$model', '$hashSafePass', '$id')";
    $result2 = mysqli_query($conn, $sql2);
    if ($result2) {
        header("Location: safe.php?success=Your model and password has been set corect");
        exit();
    }
    else {
        header("Location: safe.php?error=unknow error occured");
        exit();
    }
}
}
else {
    header("Location: safe.php?error=wrong account password");
    exit();
}
}
else {
    header("Location: safe.php");
    exit();
}