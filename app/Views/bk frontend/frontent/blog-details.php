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
        <nav aria-label="blog-breadcrumb" class="d-flex justify-content-between">
            <a href="<?=base_url('blog')?>" class="back-to-blog">
                <i class="fas fa-arrow-left"></i> Back to Blog
            </a>
            <ol class="blog-breadcrumb">
                <li class="blog-breadcrumb-item"><a href="<?=base_url('blog')?>">Blog</a></li>
                <li class="blog-breadcrumb-item"><a href="#"><?=$blog_data['web_cate_name']?></a></li>
                <li class="blog-breadcrumb-item active" aria-current="page"><?=$blog_data['web_title']?></li>
            </ol>
        </nav>
    </div>
</nav>

<section class="blog-details py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <article>
                    <header class="article-header">
                        <span class="article-category"><?=$blog_data['web_cate_name']?></span>
                        <h1 class="article-title"><?=$blog_data['web_title']?></h1>
                        <div class="article-meta">
                            <div class="meta-item">
                                <i class="fas fa-user"></i>
                                <span><?=$blog_data['web_arthur_name']?></span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-calendar"></i>
                                <span><?=$blog_data['web_post_date']?></span>
                            </div>
                        </div>
                    </header>

                    <img src="<?=$blog_data['blog_image']?>" alt="<?=$blog_data['web_title']?>" class="featured-image">

                  <div class="article-content">
    <?=$blog_data['web_content']?>
</div>

                    <div class="author-bio">
                        <img src="<?=$blog_data['bclient_image']?>" alt="Rohit Venkatesan" class="author-avatar">
                        <div class="author-info">
                            <h5><?=$blog_data['web_client_name']?></h5>
                            <p><?=$blog_data['web_client_desc']?></p>
                        </div>
                    </div>
                </article>
            </div>

            <div class="col-lg-4">
                <aside class="sidebar">
                    <h4>Related Articles</h4>
                    <div class="related-posts">
                        <?php foreach ($blog_list as $key => $blog) {?>
                            <div class="related-post">
                                <h6><a href="<?=base_url("blog/{$blog['web_url']}")?>"><?=$blog["web_title"]?></a></h6>
                                <small><?=$blog["web_post_date"]?></small>
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
    justify-content: center;
}
.article-content img {
    border: 2px solid #ddd;
    border-radius: 5px;
    display: block;
}
</style>

// <script>
// document.addEventListener("DOMContentLoaded", function() {
//     const images = document.querySelectorAll('.article-content img');
//     if (!images.length) return;

//     // Group images by their visual row using offsetTop
//     const rows = {};
//     images.forEach(img => {
//         img.removeAttribute('width');
//         img.removeAttribute('height');

//         const rowTop = img.offsetTop;
//         if (!rows[rowTop]) rows[rowTop] = [];
//         rows[rowTop].push(img);
//     });

//     // Apply width/height depending on number in row
//     Object.values(rows).forEach(rowImages => {
//         if (rowImages.length === 1) {
//             rowImages[0].style.width = '850px';
//             rowImages[0].style.height = '400px';
//         } else {
//             rowImages.forEach(img => {
//                 img.style.width = '500px';
//                 img.style.height = '400px';
//             });
//         }
//     });
// });
// </script>

<?php include APPPATH . "/Views/frontent/common/footer.php"; ?>