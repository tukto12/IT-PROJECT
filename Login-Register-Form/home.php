<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html lang="eng">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/490bf78653.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="css/style1.css">
        <title>Title</title>
    </head>
    <body>
        <header>
            <a href="#" class="it-project">IT-Project</a>
            <nav>
                <div>
                    <ul class="main-nav" id="navBar">
                        <li><a href="profileUpdate.php">Profile</a></li>
                        <li><a href="home.php">Home</a></li>
                        <li><a href="userSafes.php">Your Safes</a></li>
                        <li><a href="safe.php">Add Safe</a></li>
                        <li><a class="cta" href="logout.php"><button class="btn-login">Logout</button></a></li>
                    </ul>
                </div>
            </nav>
            <div>
            <div class="btn-menu">
            <p>Profile</p>
            <button class="profile-btn" id="iconBtn2"><i class="fa-solid fa-user profile-icon" id="iconBtn2"></i></button> 
            </div>
        </div>
        </header>

        <section class="main-section" id="main"> 
            <div class="main">
                <h2>Welcome <?php echo $_SESSION['user_name']; ?></h2>
            </div>         
        </section>

        <footer>
            <div>
                <div>
                    <ul class="footer-nav">
                        <li><a href="#main">Home</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>
            </div>
            <div>
                <p>Copyright &copy; 2022 by Oskar Wojdyło & Paweł Wójtowicz</p>
            </div>
        </footer>

        <script src="js/script1.js"></script>
    </body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>