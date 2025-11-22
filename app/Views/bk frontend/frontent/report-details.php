<?php include APPPATH . "/Views/frontent/common/header.php"; ?>
<style>
    .article-content h1, .article-content h2, .article-content h3, .article-content h4, .article-content h5 {
        color: var(--primary-green) !important; 
    }
    .article-content img {
        width: 500px;
        height: 400px;
        border: 2px solid #ddd;
        border-radius: 5px;
        margin: 10px 0;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
</style>

<nav class="blog-breadcrumb-nav">
    <div class="container">
<!--        <nav aria-label="blog-breadcrumb" class="d-flex justify-content-between">
            <a href="<?=base_url('blog')?>" class="back-to-blog">
                <i class="fas fa-arrow-left"></i> Back to Blog
            </a>
            <ol class="blog-breadcrumb">
                <li class="blog-breadcrumb-item"><a href="<?=base_url('blog')?>">Blog</a></li>
                <li class="blog-breadcrumb-item"><a href="#"><?=$study_data['web_cate_name']??''?></a></li>
                <li class="blog-breadcrumb-item active" aria-current="page"><?=$study_data['web_title']??''?></li>
            </ol>
        </nav>-->
    </div>
</nav>

<section class="blog-details py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <article>
                    <header class="article-header">
                         
                        <h1 class="article-title"><?=$study_data['web_title']??''?></h1>
                        
                    </header>

                    <img src="<?=$study_data['web_image']??''?>" alt="<?=$study_data['web_title']??''?>" class="featured-image">

                  <div class="article-content">
    <?=$study_data['web_content_page']??''?>
</div>

                     
                </article>
            </div>

            <div class="col-lg-4">
                <aside class="sidebar">
                    <h4>Related Case Study</h4>
                    <div class="related-posts">
                        <?php 
                        foreach ($study_list as $key => $study) {?>
                            <div class="related-post">
                                <h6><a href="<?=base_url("casestudy/{$study['web_url']}")?>"><?=$study["web_title"]?></a></h6>
                               
                            </div>
                        <?php }?>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>

<style>
.article-content {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    /*justify-content: center;*/
}
.article-content img {
    border: 2px solid #ddd;
    border-radius: 5px;
    display: block;
}
</style>
 

<?php include APPPATH . "/Views/frontent/common/footer.php"; ?>