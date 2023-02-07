<?php 
    session_start();
    require('../connexion/connexion.php');
    // si on utilise lq base sql 
    // require('../connexionSQL/connexion.php');
    require('../Traitement/function.php');
    $tab = $_SESSION['user'];
    if($tab == null){
        header('location:../index.php');
    }
    $liste=getlisteTypeHabitation();
    $listes=getlisteQuartier();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="stylesheet" href="../assets/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="../assets/assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/assets/css/Navbar-Centered-Links-icons.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/apropos.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/payer.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion p-0" style="background:linear-gradient(#fe464d,50%,#fe416b);">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon"><i class="far fa-user-circle"></i></div>
                    <div class="sidebar-brand-text mx-3"><span><?php echo $tab['nom']; ?></span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link active" href="#"><i class="fas fa-tachometer-alt"></i><span>Categorie</span></a></li>
                    <?php if($tab['type']==1) { ?>
                        <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-user"></i><span>Admin</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="Accueil.php?page=AjoutHabitation"><i class="fas fa-table"></i><span>Ajout d'un Habitation</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-table"></i><span>Evolution Nbre d'Hab</span></a></li>
                    <?php } ?>
                    <li class="nav-item"><a class="nav-link" href="Accueil.php?page=ListesHabitation"><i class="far fas fa-home"></i><span>Home</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="../Traitement/deconnection.php"><i class="fas fa-sign-out-alt"></i><span>Deconnection</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid">
                        <button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <nav class="navbar navbar-light navbar-expand-md py-3" style="margin-right: 263px;margin-bottom: -7px;padding-right: 289px;padding-left: 212px;">
                            <div class="container">
                                <div class="collapse navbar-collapse" id="navcol-3">
                                    <ul class="navbar-nav mx-auto">
                                        <li class="nav-item"><a class="nav-link active" style="width: 152px;margin-left: 26px; color: black;"></a></li>
                                        <li class="nav-item"><a class="nav-link" style="width: 209px; color: rgb(131, 130, 128);">
                                            <select name="typeHabitat" required>
                                                <option value="">Type Habitation</option>
                                                <?php for($i=0; $i<count($liste);$i++) { ?>
                                                    <option value="<?php echo $liste[$i]['idType']; ?>"><?php echo $liste[$i]['nomType']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </a></li>
                                        <li class="nav-item"><a class="nav-link" style="width: 209px; color: rgb(131, 130, 128);">
                                                <select name="quartier" required>
                                                    <option value="">Quartier</option>
                                                    <?php for($j=0; $j< count($listes);$j++) { ?>
                                                        <option value="<?php echo $listes[$j]['idQuartier']; ?>"><?php echo $listes[$j]['nomQuartier']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </a></li>
                                            <li class="nav-item"><a class="nav-link" style="width: 152.5px; color: rgb(131, 130, 128);"><input type="text" value="description" name="desc"></a></li>
                                        <li class="nav-item"><a class="nav-link active" style="width: 152px;margin-left: 26x;"><i class="fas fa-search">Recherche</i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </nav>
                <div class="container-fluid" style=" overflow-y: scroll; ">
                    <div class="row">
                        <?php if(isset($_GET['page'])) require($_GET['page'].'.php'); ?>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container">
                    <div class="text-center my-auto copyright"><span>Copyright © ETU-2068-ETU-2015-ETU-2053 annee 2022</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="../assets/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/assets/js/chart.min.js"></script>
    <script src="../assets/assets/js/bs-init.js"></script>
    <script src="../assets/assets/js/theme.js"></script>
</body>

</html>


                        


