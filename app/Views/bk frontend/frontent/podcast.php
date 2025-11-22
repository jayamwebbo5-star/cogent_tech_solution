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
                        <span>Home</span>
                    </a>
                </li>
                <li class="breadcrumb-item" aria-current="page"><?= $menu['web_title'] ?></li>
            </ol>
        </nav>
    </div>
</div>
<? if (!empty($podcast_data['status']) && $podcast_data['status'] == 1) { ?>
<section class="inner-hero-section">
    <div class="container">
        <h2 class="section-title"><?=$podcast_data['web_content_1']?></h2>
        <p class="section-subtitle"><?=$podcast_data['web_content_2']?></p>
    </div>
</section>
<?}?>

<?php if(!empty($podcastvideomaster['status']) && $podcastvideomaster['status'] == 1) { ?>
<section class="py-5">
    <div class="container">
        <div class="row">
            
            <?php foreach ($podcast_list as $key => $podcast) { ?>
            <!-- Podcast Card 1 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="podcast-card" >
                    <div class="video-container">
                        <!-- Thumbnail placeholder (shown by default) -->
                        <div class="video-placeholder" id="placeholder-1" >
                           <iframe class="resource-page-card-img-top" src="<?= $podcast['web_url'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                      
                        </div>

                        <!-- HTML5 Video Player (hidden by default) -->
                        

                        
                    </div>
                    <div class="podcast-content">
                      
                       
                              <h3 class="podcast-title" style="margin-top:45px;"><?=$podcast['web_title']?></h3>
                               <div class="podcast-meta">
                            <div class="meta-item">
                                <i class="fas fa-calendar"></i>
                                <span><?=$podcast['web_post_date']?></span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-clock"></i>
                                <span><?=$podcast['web_post_time']?></span>
                            </div>

                        </div>
                        <p class="podcast-description"><?=$podcast['web_desc']?>
                              </p>
                       
                    </div>
                </div>
            </div>

            <?php } ?>    

<!--            <div class="col-12 text-center mt-4">
                <a href="" class="contact-btn">More Podcast </a>
            </div>-->
        </div>
    </div>
</section>
<?php } ?>

<?php include APPPATH . "/Views/frontent/common/footer.php"; ?> 