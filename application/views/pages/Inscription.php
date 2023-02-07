<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo site_url(); ?>assets/css/inscription.css">
    <title>Inscription</title>
</head>
<body>
    <div id="page">
        <div id="content1">
            <h1>Ceer un Compte</h1>
                <form action="<?php echo site_url(); ?>Inscription/inscription" method="post">
                    <input type="text" name="nom" placeholder="Nom"  required>
                    <input type="text" name="prenom" placeholder="Prenom(s)"  required>
                    <select name="genre">
                        <option value="">Genre</option>
                        <option value="1">Homme</option>
                        <option value="2">Femme</option>
                    </select>
                    <input type="number" name="contact" placeholder="Contact"  required>
                    <input type="email" name="mail" placeholder="Email" required>
                    <input type="password" name="psw1" placeholder="Mot de Passe" required>
                    <input type="password" name="psw2" placeholder="Retaper le mot de passe"  required>
                    <?php if(isset($_GET['msg'])){ ?>
                        <p><?php echo $_GET['msg'];?></p>   
                    <?php } ?>
                    <input type="submit" value="S'Inscrire" class="btnInscr">
                </form>
                <a href="<?php echo site_url(); ?>Login/singIn"><input type="submit" value="Sing In" class="btnInscr bt" ></a>
        </div>
    </div>
</body>
</html>