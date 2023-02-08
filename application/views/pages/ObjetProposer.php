<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Accueil</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo site_url(); ?>assets/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?php echo site_url(); ?>assets/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo site_url(); ?>assets/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo site_url(); ?>assets/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo site_url(); ?>assets/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php echo site_url(); ?>assets/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?php echo site_url(); ?>assets/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo site_url('assets/fonts/fontawesome-all.min.css'); ?>">


  <!-- Template Main CSS File -->
  <link href="<?php echo site_url(); ?>assets/assets/css/style.css" rel="stylesheet">
</head>

<body>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Article</h2>
          <ol>
            <li><a href="">Home</a></li>
            <li>Article</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
                <li data-filter="*" class="filter-active">All</li>
            <?php for($i=0; $i<count($categorie); $i++) { ?>
                <li data-filter=".<?php echo $categorie[$i]['nomcategorie']; ?>"><?php echo $categorie[$i]['nomcategorie']; ?></li>
            <?php } ?>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">
        <?php for($i=0; $i<count($article); $i++) { ?>
          <div class="col-lg-4 col-md-6 portfolio-item <?php echo $article[$i]['nomcategorie']; ?>">
            <div class="portfolio-wrap">
              <img src="<?php echo site_url(); ?>assets/assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><?php echo $article[$i]['article']['titre']; ?></h4>
                <p>Tarif: <?php echo $article[$i]['article']['tarif']; ?></p>
                <div class="portfolio-links">
                  <a href="<?php echo site_url(); ?>assets/assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?php echo $article[$i]['article']['titre']; ?>"><i class="bx bx-plus"></i></a>
                  <a href="<?php echo site_url(); ?>Article/descriptionUnObjet?id=<?php echo $article[$i]['article']['id']; ?>" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
            <a href="<?php echo site_url(); ?>Propositions/faireEchange/<?php echo $article[$i]['article']['id']; ?>/<?php echo $idObjet; ?>"><button class="btn btn-primary" type="submit" type="submit" style="background-color: red; margin: 12px 12px;">Echange</button></a>
          </div>
        <?php } ?>
        </div>

      </div>
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->


<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo site_url(); ?>assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo site_url(); ?>assets/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo site_url(); ?>assets/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo site_url(); ?>assets/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?php echo site_url(); ?>assets/assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="<?php echo site_url(); ?>assets/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo site_url(); ?>assets/assets/js/main.js"></script>

</body>

</html>