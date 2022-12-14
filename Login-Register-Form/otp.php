<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<script src="https://kit.fontawesome.com/490bf78653.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container">
     <form action="otpProcess.php" method="post">
     	<h2>Code Verification</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

		<div class="form-input-group">
            <input type="number" name="otp" id="otp" class="form-input" placeholder="Enter verification code" required>
        </div>

		<div class="form-button">
            <button class="btn" type="submit">Verify</button>
        </div>
     </form>
</div>

</body>
</html>