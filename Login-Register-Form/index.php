<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<script src="https://kit.fontawesome.com/490bf78653.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<div class="container">
     <form action="login.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
        
		<div class="form-input-group">
            <span class="icon"><i class="fas fa-user"></i></span>
            <input type="text" name="uname" class="form-input" autofocus placeholder="Username">
        </div>

		<div class="form-input-group">
            <span class="icon"><i class="fas fa-lock"></i></span>
            <input type="password" name="password" class="form-input" placeholder="Password" id="password">
        </div>


		<div class="form-button">
            <span class="icon"><i class="fas fa-lock"></i></span>
            <button class="btn" type="submit">Login</button>
        </div>
        <div class="g-recaptcha" data-sitekey="6LeFAjMjAAAAAFD1xyxrDxOvNqYf9N-p4ZRoTZL0" data-theme="dark">

        </div>
		<p class="form-text">
            <a href="signup.php" class="form-link" id="linkCreateAccount">Don't have an account? Create account</a>
        </p>
     </form>
</div>

</body>
</html>