<?php
//   require('../inc/bdd.php');
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/inscription.css">
    <title>Inscription</title>
</head>
<body>
    <div id="page">
        <div id="content2"> 
            <h1>welcome Back!</h1>
            <p>To keep connected with us please login with your personal info</p>
            <form action="../index.php">
                <input type="submit" value="SIGN IN" class="signup">
            </form>
        </div>
        <div id="content1">
        <h1>Create account</h1>
            <p>Fenoy azafady ny mombamoba anao:</p>
                <form action="../traitement/traitementInscription.php" method="post">
                    <input type="text" name="nom" placeholder="Name"  required>
                    <input type="text" name="prenom" placeholder="Prenom(s)"  required>
                    <input type="number" name="contact" placeholder="Contact"  required>
                    <!-- <input type="Date" name="date" required> -->
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="password" name="confirmpass" placeholder="Retaper le mot de passe"  required>
                    <?php if(isset($_GET['msg'])){ ?>
                        <p><?php echo $_GET['msg'];?></p>   
                    <?php } ?>
                    <input type="submit" value="Valider" class="btnInscr">
                </form>
        </div>
    </div>
</body>
</html>