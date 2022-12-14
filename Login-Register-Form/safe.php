<!DOCTYPE html>
<html lang="eng">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/490bf78653.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="css/style4.css">
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
                        <li><a class="cta" href="logout.php"><button class="btn-login" >Logout</button></a></li>
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
                <h3>Set model & password</h3>
            </div>    
            <div class="main-text">
                <p>
                    Here you can set your safe lock model and set your password to your locker.
                </p>
            </div>     
            <div class="container">
                <form action="safeProcess.php" method="post">
                <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
           
                     <?php if (isset($_GET['success'])) { ?>
                          <p class="success"><?php echo $_GET['success']; ?></p>
                     <?php } ?> 
                    <div>
                    <div class="userpassword">
                        <p>Enter your login password to <br> set password to your safe</p>
                        <input type="password" name="password" class="password-user" placeholder="Account Password" id="password">
                    </div>
                        <div class="model">
                            <label>Please enter your safe locker model</label>
                        </div>
                        <div>
                            <select class="select-model" name="modelSelect">
                                <option value="model1">A1</option>
                                <option value="model2">B1</option>
                                <option value="model3">C1</option>
                            </select>
                            <!-- <input class="select-model" name="modelSelect" placeholder="enter id of your safe lock"> -->
                        </div>
                    </div>
                    <div class="keyboard-container">
                        <p class="password-text">Please enter your password that conatins lenght of 6 characters<br> (A-D : 0-9)</p>
                        <div class="passoword">
                            <input type="text" id="safePassword" name="safePassword" placeholder="Safe Password" class="passwordInput" maxlength="6" id="passwordC">
                            <!-- <textarea></textarea> -->
                        </div>
                        <div class="keyboard">
                            <div class="row">
                                <button type="button" class="keyboardBtn">1</button>
                                <button type="button"  class="keyboardBtn">2</button>
                                <button type="button"  class="keyboardBtn">3</button>
                                <button type="button"  class="keyboardBtn special">A</button>
                            </div>
                            <div class="row">
                                <button type="button"  class="keyboardBtn">4</button>
                                <button type="button"  class="keyboardBtn">5</button>
                                <button type="button"  class="keyboardBtn">6</button>
                                <button type="button"  class="keyboardBtn special">B</button>
                            </div>
                            <div class="row">
                                <button type="button"  class="keyboardBtn">7</button>
                                <button type="button"  class="keyboardBtn">8</button>
                                <button type="button"  class="keyboardBtn">9</button>
                                <button type="button"  class="keyboardBtn special">C</button>
                            </div>
                            <div class="row">
                                <button type="button"  class="keyboardBtn special">*</button>
                                <button type="button"  class="keyboardBtn">0</button>
                                <button type="button"  class="keyboardBtn special">#</button>
                                <button type="button"  class="keyboardBtn special">D</button>
                            </div>
                            <div class="row">
                                <button type="button" class="keyboardBackspace">&#8592; </button>
                            </div>
                        </div>
                    <div class="form-button">
                        <button class="btn" type="submit">Set</button>
                    </div>
                </form>

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

        <script src="js/script3.js"></script>
    </body>
</html>