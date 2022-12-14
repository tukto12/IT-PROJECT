<?php
 session_start();
 include "db_conn.php";

 if(isset($_POST['update']))
 {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }


    $id=$_SESSION['id'];
    $uname=validate($_POST['uname']);
    $pass=validate($_POST['password']);
    $re_pass = validate($_POST['re_password']);


    $select= "SELECT * from users where id='$id'";
    $sql = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($sql);
    $res= $row['id'];

    // $sql = "SELECT * FROM users WHERE user_name='$uname' ";
    // $result = mysqli_query($conn, $sql);

	 if (empty($pass)) {
        if($res === $id)
        {
            $hashPass = password_hash($pass, PASSWORD_DEFAULT);
       
           $update = "UPDATE users SET user_name='$uname' WHERE id='$id'";
           $sql2=mysqli_query($conn,$update);
           if($sql2)
           { 
               /*Successful*/
               header('location:home.php?success=Your account has been updated successfully');
           }
           else
           {
               /*sorry your profile is not update*/
               header('location:profileUpdate.php');
           }
        }
        else
        {
            /*sorry your id is not match*/
            header('location:profileUpdate.php');
        }
     }
     else if (empty($uname))
     {
        if($pass === $re_pass){
            if($res === $id)
            {
                $hashPass = password_hash($pass, PASSWORD_DEFAULT);
        
            $update = "UPDATE users SET password='$hashPass' WHERE id='$id'";
            $sql2=mysqli_query($conn,$update);
            if($sql2)
            { 
                /*Successful*/
                header('location:home.php?success=Your account has been updated successfully');
            }
            else
            {
                /*sorry your profile is not update*/
                header('location:profileUpdate.php');
            }
            }
            else
            {
                /*sorry your id is not match*/
                header('location:profileUpdate.php');
            }
        }
        else {
            header('location:profileUpdate.php?error=password doesnt match');
        }
     }
     else {
        if($res === $id)
        {
            $hashPass = password_hash($pass, PASSWORD_DEFAULT);
       
           $update = "UPDATE users SET user_name='$uname', password='$hashPass' WHERE id='$id'";
           $sql2=mysqli_query($conn,$update);
           if($sql2)
           { 
               /*Successful*/
               header('location:home.php?success=Your account has been updated successfully');
           }
           else
           {
               /*sorry your profile is not update*/
               header('location:profileUpdate.php');
           }
        }
        else
        {
            /*sorry your id is not match*/
            header('location:profileUpdate.php');
        }
     }

 }

?>