<?php
 
 session_start();
 include "db_conn.php";
 if(isset($_POST['update']))
 {
    $id=$_SESSION['id'];
    $uname=$_POST['uname'];
    $pass=$_POST['password'];
    $re_pass = $_POST['re_password'];
    $select= "select * from users where id='$id'";
    $sql = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($sql);
    $res= $row['id'];

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
    else if($pass !== $re_pass){
        header("Location: signup.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}
    else if($res === $id)
    {
   
       $update = "update users set uname='$uname',password='$pass',where id='$id'";
       $sql2=mysqli_query($conn,$update);
       if($sql2)
       { 
           /*Successful*/
           header('location:Home.php');
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

?>