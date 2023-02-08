<?php
  $this->load->view("pages/template/header");
  
?>
<main id="main">

    <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
        <h2>Profile</h2>
        <ol>
            <li><a href="<?php echo site_url(); ?>Connexion/accueil">Home</a></li>
            <li>Profile</li>
        </ol>
        </div>

    </div>
    </section>
    <section id="team" class="team ">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
              <div class="member d-flex align-items-start">
                <div class="pic"><img src="<?php echo site_url(); ?>assets/assets/img/team/<?php if($idgenre == 1){ ?>team-1.jpg<?php } else { ?>team-2.jpg<?php } ?>" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4><?php echo $nom; ?> <?php echo $prenom; ?></h4>
                  <span>+<?php echo $contact; ?></span>
                  <p><?php echo $mail; ?></p>
                  <div class="social">
                    <a href=""><i class="ri-twitter-fill"></i></a>
                    <a href=""><i class="ri-facebook-fill"></i></a>
                    <a href=""><i class="ri-instagram-fill"></i></a>
                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </section>
</main>

<?php
  $this->load->view("pages/template/footer");
?>