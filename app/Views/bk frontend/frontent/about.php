<?php include APPPATH . "/Views/frontent/common/header.php"; ?>


<div class="breadcrumb-hero" style="background-image: url('<?=$menu['menu_image']?>');">
    <div class="breadcrumb-overlay"></div>
    <div class="container">
        <h1 class="page-title"><?=$menu['web_title']?></h1>
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?=base_url("")?>">
                        <i class="fas fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="breadcrumb-item" aria-current="page"><?=$menu['web_title']?></li>
            </ol>
        </nav>
</div>
</div>




<?php if(!empty($mission_data['status']) && $mission_data['status'] == 1) { ?>
    <section class="mission-section py-5" data-aos="fade-up">
    <div class="mission-container">

        <h1 class="mission-title"><?=$mission_data['web_content_1']?></h1>

        <p class="mission-statement">
            <?=$mission_data['web_content_2']?>
        </p>
    </div>
</section>
<?php } ?>
<?php if(!empty($about_data['status']) && $about_data['status'] == 1) { ?>
<section class="about-section py-5" data-aos="fade-up">
    <div class="container">
        <div class="row align-items-center">

            <!-- Right Side - Content -->
            <div class="col-lg-6 col-md-6">
                <div class="about-content">

                    <h2 class="section-title"><?=$about_data['web_content_1']?></h2>

                    <div class="about-text">
                     <?=$about_data['web_content_2']?>
                    </div>

                    

                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <img src="<?=$about_data['web_image']?>" alt="AgriFlow Initiative - Sustainable Agriculture"
                    class="about-image">
            </div>
        </div>
    </div>
</section>
<?php } ?>
<?php if(!empty($founder_data['status']) && $founder_data['status'] == 1) { ?>
<section class="founders-section py-5" data-aos="fade-up">
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-12">
                <h2 class="section-title mb-5"><?=$founder_data['web_content_3']?></h2>
            </div>

            <div class="col-12">
                <div class="founder-card">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-5">
                            <div class="founder-info">
                               <img src="<?=$founder_data['web_image']?>"
                                     alt="<?=$founder_data['web_content_1']?>, <?=$founder_data['web_content_2']?>" class="founder-image">
                                <h3 class="founder-name"><?=$founder_data['web_content_1']?></h3>
                                <p class="founder-title"><?=$founder_data['web_content_2']?></p>
                            </div>
                        </div>

                        <div class="col-lg-7 col-md-7">
                            <div class="message-content">

                                <div class="founder-message">
                                    <?=$founder_data['web_content_4']?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>
<?php if(!empty($action_data['status']) && $action_data['status'] == 1) { ?>
<div class="cta-primary" data-aos="fade-up">
    <h3 class="cta-primary-title"><?=$action_data['web_content_1']?></h3>
    <p class="cta-primary-text">
        <?=$action_data['web_content_2']?>
    </p>
    <div class="cta-buttons mt-5">
        <a href="<?= base_url("contact") ?>" class="btn-primary-green">Contact Us
            <i class="fas fa-arrow-right ms-1"></i>
        </a>
    </div>
</div>
<?php } ?>

<?php include APPPATH . "/Views/frontent/common/footer.php"; ?>