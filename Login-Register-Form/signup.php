<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
     <script src="https://kit.fontawesome.com/490bf78653.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container">
     <form action="signup-check.php" method="post">
     	<h2>SIGN UP</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <div class="form-input-group">
                    <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                    <?php if (isset($_GET['name'])) { ?>
                    <input type="email" name="email" placeholder="Email" value="<?php echo $_GET['email']; ?>" class="form-input"><br>
            <?php }else{ ?>
                <input type="email" name="email" placeholder="Email"><br>
            <?php }?>
            </div>

            <div class="form-input-group">
                    <span class="icon"><i class="fas fa-user"></i></span>
                    <?php if (isset($_GET['uname'])) { ?>
                        <input type="text" name="username" placeholder="Username" value="<?php echo $_GET['uname']; ?>" class="form-input"><br>
                    <?php }else{ ?>
                    <input type="text" name="uname" placeholder="Username"><br>
                    <?php }?>
            </div>



            <div class="form-input-group">
                    <span class="icon"><i class="fas fa-lock"></i></span>
                    <input type="password" name="password"  placeholder="Password" class="form-input"><br>
                    <!-- <a href="#" id="show-passwd"><i class="fa-solid fa-eye show-password-1"></i></a> -->
            </div>

            <div class="form-input-group">
                    <span class="icon"><i class="fas fa-lock"></i></span>
                    <input type="password" name="re_password"  placeholder="Confirm Password"><br>
                    <!-- <a href="#" id="show-passwd"><i class="fa-solid fa-eye show-password-2"></i></a> -->
            </div> 

            <div class="form-button">
                    <span class="icon"><i class="fas fa-lock"></i></span>
                    <button class="btn" type="submit">Create</button>
                </div>
                <p class="form-text">
                    <a href="index.php" class="form-link" id="linkLogin">Already have an account?</a>
                </p>

     </form>
     </div>

     <script src="js/script.js"></script>
</body>
</html>