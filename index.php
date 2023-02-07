<?php
    //  require('inc/bdd.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="page/login.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/Bootstrap/Bootstrap/bootstrap-3.3.6-dist/css/bootstrap.min.css">
    <title>Login Page</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xl-4 mb-4">
                <div id="page">
                    <div id="content1">
                        <h1 class="Poppins">Sign in</h1>
                        <p class="Poppins">Or use your account</p>
                        <form action="Traitement/traitementLogin.php" method="post">
                            <input type="email" name="mail" placeholder="Email" required><br>
                            <input type="password" name="pass" placeholder="Password" required>
                            <?php if(isset($_GET['msg'])){ ?>
                                    <p><?php echo $_GET['msg'];?></p>   
                                <?php } ?>
                            <h4><a href="page/updatePass.php"> Forgot Passwors ? </a></h4>
                            <input type="submit" value="Sign In" class="btnInscr">
                        </form>
                    </div>
                    <!-- ---------------------------Page-Right---------------------------------- -->
                    <div id="content2">
                        <h1 class="Poppins">Hello,Friend!</h1>
                        <p class="Poppins">Enter your personal details and start journey with us</p>
                        <form action="page/inscription.php">
                            <input type="submit" value="SIGN UP" class="signup" class="Poppins">
                        </form>
                    </div>
                </div>
            <!-- </div> -->
        </div>
    </div>
    <script src="assets/Bootstrap/Bootstrap/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
</body>
</html>