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
<?php
if (
    !empty($blogdatamaster['status']) && $blogdatamaster['status'] == 1 )
 {
?>
<section class="blog-section py-5">
    <div class="container">
        <div class="row">


            <!-- Blog Posts -->
            <div class="col-lg-12">
            
                <div class="row">
                    <!-- Post 1 -->
                    <?php foreach ($blog_list as $key => $blog) { ?>
                        <div class="col-lg-4 col-md-6">
                            <article class="blog-card">
                                <img src="<?=$blog["blog_image"]?>" alt="Soil Health Best Practices">
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <span class="blog-category"><?=$blog["web_cate_name"]?></span>

                                    </div>
                                    <div class="blog-meta d-flex justify-content-between">
                                        <span><i class="fas fa-calendar"></i> <?=$blog["web_post_date"]?></span>
                                        <span><i class="fas fa-user"></i> <?=$blog["web_arthur_name"]?></span>
                                    </div>

                                    <h2 class="blog-title">
                                        <a href="<?=base_url("blog/{$blog['web_url']}")?>"><?=$blog["web_title"]?></a>
                                    </h2>
                                    <p class="blog-excerpt"><?=$blog["web_desc"]?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="<?=base_url("blog/{$blog['web_url']}")?>" class="read-more">
                                            Read More <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    <?php } ?>
                    

                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>



<?php include APPPATH . "/Views/frontent/common/footer.php"; ?> 