<?php
  $this->load->view("pages/template/header");
  
?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Article</h2>
          <ol>
            <li><a href="<?php echo site_url(); ?>Connexion/accueil">Home</a></li>
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
                <p>Tarif: <?php echo $article[$i]['article']['tarif']; ?>Ar</p>
                <div class="portfolio-links">
                  <a href="<?php echo site_url(); ?>assets/assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?php echo $article[$i]['article']['titre']; ?>"><i class="bx bx-plus"></i></a>
                  <a href="<?php echo site_url(); ?>Article/descriptionUnObjet?id=<?php echo $article[$i]['article']['id']; ?>" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
                <?php if(isset($article[$i]['pourcentage'])) { ?>
                <p>Pourcentage: <?php echo $article[$i]['pourcentage']; ?>%</p>
                <?php } ?>
              </div>
            </div>
          </div>
        <?php } ?>
        </div>

      </div>
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->

<?php
  $this->load->view("pages/template/footer");
?>