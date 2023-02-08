<?php
    $this->load->library('session');
    $donne = array();
    $donne = $this->session->flashdata("donnees");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Description</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo site_url(); ?>/assets/assets/img/favicon.png" rel="icon">
  <link href="<?php echo site_url(); ?>/assets/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo site_url(); ?>/assets/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?php echo site_url(); ?>/assets/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo site_url(); ?>/assets/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo site_url(); ?>/assets/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo site_url(); ?>/assets/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php echo site_url(); ?>/assets/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?php echo site_url(); ?>/assets/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo site_url(); ?>/assets/assets/css/style.css" rel="stylesheet">
</head>

<body>

  <main id="main">

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                  <img src="<?php echo site_url(); ?>/assets/assets/img/portfolio/portfolio-details-1.jpg" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="<?php echo site_url(); ?>/assets/assets/img/portfolio/portfolio-details-2.jpg" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="<?php echo site_url(); ?>/assets/assets/img/portfolio/portfolio-details-3.jpg" alt="">
                </div>

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>Article</h3>
              <ul>
                <li><strong>Category</strong>: <?php echo $article['article']['nomcategorie']; ?></li>
                <li><strong>Titre</strong>: <?php echo $article['article']['titre']; ?></li>
                <li><strong>Tarif</strong>: <?php echo $article['article']['tarif']; ?>Ar</li>
                <li><strong>Proprietaire</strong>: <?php echo $article['utilisateur']['nom']; ?> <?php echo $article['utilisateur']['prenom']; ?></li>
                <li><strong>Mail</strong>: <?php echo $article['utilisateur']['mail']; ?></li>
                <li><strong>Contact</strong>: <?php echo $article['utilisateur']['contact']; ?></li>
              </ul>
            </div>
            <div class="portfolio-description">
              <h2>Description</h2>
              <p><?php echo $article['article']['descriptions']; ?></p>
            </div>
          </div>
          <?php if($article['utilisateur']['id'] != $donne['id']) { ?>
          <div class="bouton" >
                <a href="<?php echo site_url(); ?>Propositions/listesDeVosObjets/<?php echo $article['article']['id']; ?>"><button class="btn btn-primary" type="submit" style="background-color: #B3B3B3; bs-btn-border-color: #B3B3B3;bs-btn-hover-border-color: #B3B3B3; margin: 12px 12px;">
                    Interesser
                </button></a>
          </div>
          <?php } ?>
     

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo site_url(); ?>/assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo site_url(); ?>/assets/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo site_url(); ?>/assets/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo site_url(); ?>/assets/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?php echo site_url(); ?>/assets/assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="<?php echo site_url(); ?>/assets/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo site_url(); ?>/assets/assets/js/main.js"></script>

</body>

</html>