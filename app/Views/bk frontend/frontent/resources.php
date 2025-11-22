<?php include APPPATH . "/Views/frontent/common/header.php"; ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
<style>


    .gallery-wrapper {
        display: flex;
        gap: 20px;
        justify-content: center;
        align-items: flex-start;
        flex-wrap: wrap;
    }

    .gallery-column {
        flex: 1;
        min-width: 300px;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .gallery-column a img {
        width: 100%;
        height: auto;
        display: block;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        transition: transform 0.2s ease;
    }

    .gallery-column a img:hover {
        transform: scale(1.02);
    }

    @media (max-width: 768px) {
        .gallery-wrapper {
            flex-direction: column;
        }

        .gallery-column {
            width: 100%;
        }
    }
</style>
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
<?php if(!empty($about_data['status']) && $about_data['status']==1){ ?>
<section class="resources-section py-5">
    <div class="container">
        <h2 class="section-title"><?= $about_data['web_content_1'] ?></h2>
        <div class="resource-content">
            <?= $about_data['web_content_2'] ?>
        </div>


    </div>
</section>
<?php } ?>
<?php if(!empty($gallerymaster['status']) && $gallerymaster['status'] == 1) { ?>
<section class="resource-images py-5">
    <div class="container">
        <div class="row g-4 justify-content-evenly">
            <!-- Image 1 -->
            <?php
            $column1 = [];
            $column2 = [];
            foreach ($gallery_list as $index => $url) {
                if ($index % 2 === 0) {
                    $column1[] = $url['web_image'];
                } else {
                    $column2[] = $url['web_image'];
                }
            }
            ?>

            <div class="gallery-wrapper">
                <!-- Column 1 -->
                <div class="gallery-column">
                    <?php foreach ($column1 as $index => $gal) { ?>
                        <a href="<?= $gal ?>" class="glightbox" data-gallery="gallery">
                            <img src="<?= $gal ?>" alt="Image <?= $index ?>">
                        </a>
                    <?php } ?>
                </div>

                <!-- Column 2 -->
                <div class="gallery-column">
                    <?php foreach ($column2 as $index => $gal) { ?>
                        <a href="<?= $gal ?>" class="glightbox" data-gallery="gallery">
                            <img src="<?= $gal ?>" alt="Image <?= $index ?>">
                        </a>
                    <?php } ?>

                </div>
            </div>


        </div>
    </div>
</section>
<?php } ?>

<?php if(!empty($videomaster['status']) && $videomaster['status'] == 1) { ?>
<section class="resource-video py-5">
    <div class="resource-video container">
        <h2 class="resource-video section-title text-center mb-5">Inspirational TED Talks</h2>
        <div class="resource-video row">

            <?php foreach ($video_list as $key => $video) { ?>

                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="resource-page-card h-100 ">
                        <a href="javascript:void(0)" target="_blank" rel="noopener noreferrer">
                            <iframe class="resource-page-card-img-top" src="<?= $video['web_url'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </a>
                        <div class="resource-page-card-body">
                            <div>
                                <h3 class="h5 title"><?= $video['web_title'] ?></h3>
                                <p class="speaker text-muted">by <?= $video['web_name'] ?></p>
                            </div> 
                        </div>
                    </div>
                </div>


            <?php } ?>


        </div>
    </div>
</section>
<?php } ?>

<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
<script>
    const lightbox = GLightbox({selector: '.glightbox'});
</script>
<?php include APPPATH . "/Views/frontent/common/footer.php"; ?> 