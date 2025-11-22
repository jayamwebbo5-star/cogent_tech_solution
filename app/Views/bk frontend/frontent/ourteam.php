<?php include APPPATH . "/Views/frontent/common/header.php"; ?>
<div class="breadcrumb-hero" style="background-image: url('<?= $menu['menu_image'] ?>');">
    <div class="breadcrumb-overlay"></div>
    <div class="container">
        <h1 class="page-title"><?= $menu['web_title'] ?></h1>
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?= base_url("") ?>">
                        <i class="fas fa-home"></i>
                        <span><?= $menu['web_title'] ?></span>
                    </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">Our Team</li>
            </ol>
        </nav>
    </div>
</div>
<?php if(!empty($founder_data['status']) && $founder_data['status'] == 1) { ?>
<section class="py-5" id="team">
    <div class="container">
        <h2 class="section-title"><?= $founder_data['web_content_3'] ?></h2>

        <div class="row g-4 justify-content-center">
            <!-- Team Member 1 -->
            <div class="col-lg-6 col-md-6">
                <div class="team-card">
                    <img src="<?= FRONT_CSS_PATH ?>/images/new/founder image.jpg" alt="Anita Sharma" class="team-photo">
                    <h3 class="team-name"><?= $founder_data['web_content_1'] ?></h3>
                    <p class="team-position"><?= $founder_data['web_content_2'] ?></p>
                    <div class="team-bio"><?= $founder_data['web_content_4'] ?></div>
                </div>
            </div>


        </div>
    </div>
</section>
<?php } ?>
<?php if(!empty($client_data['status']) && $client_data['status'] == 1) { ?>
<section id="partners" class="py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="section-title mb-2"><?= $client_data['web_content_1'] ?></h2>
                <div class="mt-4 section-subtitle"><?= $client_data['web_content_2'] ?></div>
            </div>
        </div>

        <!-- Partner Logos Row -->
        <div class="row justify-content-center align-items-center mb-5">
            <?php foreach ($client_list as $key => $_client) { ?>
                <div class="col-lg-3 col-md-4 col-6 mb-4">
                    <div class="partner-logo">
                        <img src="<?=$_client["web_image"]?>" alt="Organic Alliance">
                    </div>
                    <h5 class="text-center mt-3"><?=$_client["web_title"]?></h5>
                </div>
            <?php } ?>

        </div>
    </div>
</section>
<?php } ?>

<?php include APPPATH . "/Views/frontent/common/footer.php"; ?>
