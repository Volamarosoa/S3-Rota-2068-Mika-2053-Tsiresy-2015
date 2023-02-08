<?php
  $this->load->view("pages/template/header");
?>


  <main id="main">

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container proposition">
        <h3>Votre listes de propositions: </h3>
        <?php for($i=0; $i<count($proposition); $i++) { ?>
        <div class="row gy-4">

          <div class="col-lg-3">
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

          <div class="col-lg-3">
            <div class="portfolio-info">
              <h3><?php echo $proposition[$i]['objet1']['article']['titre']; ?></h3>
              <ul>
                <li><strong>Category</strong>: <?php echo $proposition[$i]['objet1']['article']['nomcategorie']; ?></li>
                <li><strong>Proprietaire</strong>: <?php echo $proposition[$i]['objet1']['utilisateur']['nom']; ?> <?php echo $proposition[$i]['objet1']['utilisateur']['prenom']; ?></li>
                <li><strong>Mail</strong>: <?php echo $proposition[$i]['objet1']['utilisateur']['mail']; ?></li>
                <li><strong>Contact</strong>: <?php echo $proposition[$i]['objet1']['utilisateur']['contact']; ?></li>
                <li><strong>Description</strong>: <?php echo $proposition[$i]['objet1']['article']['descriptions']; ?></li>
              </ul>
            </div>
          </div>

          <div class="col-lg-3">
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

          <div class="col-lg-3">
            <div class="portfolio-info">
              <h3><?php echo $proposition[$i]['objet2']['article']['titre']; ?></h3>
              <ul>
                <li><strong>Category</strong>: <?php echo $proposition[$i]['objet2']['article']['nomcategorie']; ?></li>
                <li><strong>Description</strong>: <?php echo $proposition[$i]['objet2']['article']['descriptions']; ?></li>
              </ul>
            </div>
            
          </div>
          <div class="bouton" style="display: flex; margin: 12px 990px;">
                <a href="<?php echo site_url(); ?>Propositions/refuserEchange/<?php echo $proposition[$i]['proposition']['id']; ?>"><button class="btn btn-primary" type="submit" style="background-color: #B3B3B3; bs-btn-border-color: #B3B3B3;bs-btn-hover-color: red; margin-right: 30px; ">
                    Refuser
                </button></a>
                <a href="<?php echo site_url(); ?>Propositions/accepterEchange/<?php echo $proposition[$i]['proposition']['id']; ?>"><button class="btn btn-primary" type="submit" style="background-color: red; bs-btn-border-color: red;bs-btn-hover-border-color: red;">
                    Accepter
                </button></a>
          </div>
         
        </div>
        <?php } ?>
      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

<?php
  $this->load->view("pages/template/footer");
 ?>