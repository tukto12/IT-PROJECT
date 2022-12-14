<!DOCTYPE html>
<html lang="eng">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/490bf78653.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="css/style3.css">
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
                <h3>Profile Update</h3>
            </div>         
            <div class="container">
                <form action="ProfileUpdateProcess.php" method="post">
                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
           
                     <?php if (isset($_GET['success'])) { ?>
                          <p class="success"><?php echo $_GET['success']; ?></p>
                     <?php } ?> 
           
                       <p>Change Username</p>
                       <div class="form-input-group">
                               <!-- <span class="icon"><i class="fas fa-user"></i></span> -->
                               <!-- <input type="text" name="username" placeholder="Change Username" class="form-input"> -->
                               <?php if (isset($_GET['uname'])) { ?>
                                   <input type="text" name="uname" placeholder="Username" value="<?php echo $_GET['uname']; ?>" class="form-input"><br>
                               <?php }else{ ?>
                               <input type="text" name="uname" placeholder="Username"><br>
                               <?php }?> 
                       </div>
           
           
                       <p>Change password</p>
                       <div class="form-input-group">
                               <!-- <span class="icon"><i class="fas fa-lock"></i></span> -->
                               <input type="password" name="password"  placeholder="Password" class="form-input"><br>
                               <!-- <a href="#" id="show-passwd"><i class="fa-solid fa-eye show-password-1"></i></a> -->
                       </div>
           
                        <p>Confirm Password</p>
                        <div class="form-input-group">
                               <!-- <span class="icon"><i class="fas fa-lock"></i></span> -->
                               <input type="password" name="re_password"  placeholder="Confirm Password"><br>
                               <!-- <a href="#" id="show-passwd"><i class="fa-solid fa-eye show-password-2"></i></a> -->
                       </div> 
           
                       <div class="form-button">
                               <!-- <span class="icon"><i class="fas fa-lock"></i></span> -->
                               <button class="btn" type="submit" name='update'>Update</button>
                           </div>

           
                </form>
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

        <script src="js/script3.js"></script>
    </body>
</html>