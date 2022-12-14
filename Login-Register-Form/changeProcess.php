<?php
 session_start();
 include "db_conn.php";

 if(isset($_POST['change']))
 {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }

    $id=$_SESSION['id'];

    $uid = validate($_POST['user_id']);
    $sid = validate($_POST['safe_id']);

    $userPass = validate($_POST['password']);
    $safepass = validate($_POST['safePassword']);

    $sql = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if(password_verify($userPass, $row["password"]) && $uid == $id) { 

      if(strlen($safepass) != 6) {
         header("Location: userSafes.php?error=Password require 6 char&");
         exit();
      }
      else {
         $hashSafePass = password_hash($safepass, PASSWORD_DEFAULT);
         $change = "UPDATE safe SET safe_password='$hashSafePass' WHERE safe_id = '$sid'";
         $result2 =  mysqli_query($conn, $change);
         if ($result2) {
            header("Location: userSafes.php?success=Password has been set corect");
            exit();
         }
         else {
            header("Location: change.php?error=unknow error occured");
            exit();
         }
    }

   }
   else {
      header("Location: userSafes.php?error=wrong account password or safe id");
      exit();
    }
 }
 else {
   header("Location: change.php");
   exit();
}

?>