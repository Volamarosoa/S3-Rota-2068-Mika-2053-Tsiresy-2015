<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="page/login.css">
    <link rel="stylesheet" href="<?php echo site_url(); ?>assets/css/login.css">
    <link rel="stylesheet" href="<?php echo site_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <title>Premiere Accueil</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xl-4 mb-4">
                <div id="page">
                    <div id="content1">
                        <h1>Coucou!</h1>
                        <br>
                        <h2 style="text-align: center;">Bienvenu chez TAKALO</h2>
                        <a href="<?php echo site_url(); ?>Login/singIn"><input type="submit" value="Sign In" class="btnInscr"></a>
                        <a href="<?php echo site_url(); ?>Inscription"><input type="submit" value="Sign Up" class="btnInscr"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo site_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>