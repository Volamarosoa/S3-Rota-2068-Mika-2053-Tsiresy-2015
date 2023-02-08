
<?php
    // if(!isset($mail)){
    //     redirect(base_url('Login/index'));
    // }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="stylesheet" href="<?php echo site_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="<?php echo site_url('assets/fonts/fontawesome-all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/Navbar-Centered-Links-icons.css'); ?>">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon"><i class="far fa-user-circle"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Anice</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link active" href="index.html"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-user"></i><span>Admin</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-table"></i><span>Etat de versement</span></a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="#"><i class="far fa-user-circle"></i><span>Login</span></a></li> -->
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Login/deconnecter'); ?>"><i class="fas fa-sign-out-alt"></i><span>Deconnection</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <nav class="navbar navbar-light navbar-expand-md py-3" style="margin-right: 263px;margin-bottom: -7px;padding-right: 289px;padding-left: 212px;">
                            
                        </nav>
                    </div>
                </nav>
                <div class="container-fluid">
                    <p>Bonjour cher <?php if($count==1) { echo "Adim"; } else { echo "Client"; }  ?></p>
                    <p>Nom: <?php echo $nom; ?></p>
                    <p>Prenom: <?php echo $prenom; ?></p>
                    <p>Mail: <?php echo $mail; ?></p>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © ETU-2068 2022</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="<?php echo site_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo site_url('assets/js/chart.min.js'); ?>"></script>
    <script src="<?php echo site_url('assets/js/bs-init.js'); ?>"></script>
    <script src="<?php echo site_url('assets/js/theme.js'); ?>"></script>
</body>

</html>iv>
    </div>
</body>
</html>

                        


