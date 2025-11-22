<?php include APPPATH . "/Views/frontent/common/header.php"; ?>

<style>
      /* Feature Cards */
    .feature-card {
        background: var(--white);
        padding: var(--spacing-2xl);
        border-radius: 12px;
        box-shadow: var(--shadow-md);
        text-align: center;
        transition: var(--transition-normal);
        border: 1px solid var(--border-gray);
    }

    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
    }

    .feature-icon {
        width: 80px;
        height: 80px;
        background: var(--light-green);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto var(--spacing-lg);
    }

    .feature-icon i {
        font-size: var(--font-2xl);
        color: var(--primary-green);
    }

    .feature-title {
        font-size: var(--font-xl);
        font-weight: 600;
        color: var(--primary-green);
        margin-bottom: var(--spacing-md);
    }

    .feature-description {
        color: var(--text-gray);
        font-size: var(--font-md);
    }

    .case-study-card {
        background: var(--white);
        border-radius: 12px;
        overflow: hidden;
        box-shadow: var(--shadow-md);
        transition: var(--transition-normal);
    }

    .case-study-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
    }

    .case-study-image {
        height: 200px;
        overflow: hidden;
    }

    .case-study-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: var(--transition-slow);
    }

    .case-study-card:hover .case-study-image img {
        transform: scale(1.05);
    }

    .case-study-content {
        padding: var(--spacing-lg);
    }

    .case-study-title {
        font-size: var(--font-lg);
        font-weight: 600;
        color: var(--primary-green);
        margin-bottom: var(--spacing-md);
    }

    .case-study-summary {
        color: var(--text-gray);
        margin-bottom: var(--spacing-lg);
    }

    /* Impact Section */
    .impact-card {
        padding: var(--spacing-xl);
    }

    .impact-icon {
        width: 80px;
        height: 80px;
        background: var(--primary-green);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto var(--spacing-lg);
    }

    .impact-icon i {
        font-size: var(--font-2xl);
        color: var(--white);
    }

    .impact-number {
        font-size: var(--font-3xl);
        font-weight: 700;
        color: var(--primary-green);
        margin-bottom: var(--spacing-sm);
    }

    .impact-label {
        font-size: var(--font-md);
        color: var(--text-gray);
        font-weight: 500;
    }

    /* Progress Timeline */
    .progress-timeline {
        margin-top: var(--spacing-2xl);
    }

    .timeline-bar {
        height: 8px;
        background: var(--border-gray);
        border-radius: 4px;
        position: relative;
        margin-bottom: var(--spacing-md);
    }

    .timeline-progress {
        height: 100%;
        background: linear-gradient(90deg, var(--primary-green), var(--accent-yellow));
        border-radius: 4px;
        transition: width 2s ease;
    }

    .timeline-labels {
        display: flex;
        justify-content: space-between;
    }

    .timeline-label {
        font-size: var(--font-sm);
        color: var(--text-gray);
        font-weight: 500;
    }
    
        @media (max-width: 768px) {
     

        .feature-card,
        .pilot-form-container {
            padding: var(--spacing-lg);
        }

      
    }

</style>
<!-- Hero Slider -->
 
<?php if(!empty($bannermaster['status']) && $bannermaster['status'] == 1) { ?>
<section class="hero-section">
    <div class="container-fluid">
        <div class="row align-items-center g-4 g-lg-5">
            <!-- Left Side - Image Marquee -->
            <div class="col-12">
                <div class="hero-marquee">
                    <div class="marquee-track">
                        <!-- First set of images -->
                        <?php foreach ($banner_data as $key => $banner) { ?>
                            <div class="marquee-item">
                                <img src="<?= $banner['image'] ?>" alt="Agriculture Image 1" class="marquee-image">
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<?php } ?>

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

                   

                    <div>
                        <a href="<?= base_url("about") ?>" class="btn-primary-green">Know More
                            <i class="fas fa-arrow-right"></i>
                        </a>
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

<?php if(!empty($content4['status']) && $content4['status'] == 1) { ?>
<section id="impact" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title"><?=$content4["web_content_1"]?></h2>
            </div>
        </div>
        <div class="row g-4 text-center">
            <div class="row">
                <?php 
                $stats = json_decode($content4['web_content_2'] ?? '[]', true);
                if (!empty($stats) && is_array($stats)):
                    foreach ($stats as $stat): ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="impact-card">
                                <div class="impact-icon">
                                    <i class="<?= htmlspecialchars($stat['icon'] ?? 'fas fa-star') ?>"></i>
                                </div>
                                <div class="impact-number" data-target="<?= htmlspecialchars($stat['count'] ?? 0) ?>">0</div>
                                <div class="impact-label">
                                    <?= htmlspecialchars($stat['title'] ?? '') ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; 
                endif; ?>
            </div>

        </div>

        <!-- Progress Timeline -->
        <div class="row mt-5 d-none">
            <div class="col-12">
                <div class="progress-timeline">
                    <div class="timeline-bar">
                        <div class="timeline-progress" style="width: 75%;"></div>
                    </div>
                    <div class="timeline-labels">
                        <span class="timeline-label">2022</span>
                        <span class="timeline-label">2023</span>
                        <span class="timeline-label">2024</span>
                        <span class="timeline-label">2025</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>
<?php if(!empty($content3['status']) && $content3['status'] == 1) { ?>
<section id="our-offer" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title"><?= $content3['web_content_1'] ?></h2>
            </div>
        </div>
        <div class="row g-4">
            <?php 
            $sections = json_decode($content3['web_content_2'] ?? '[]', true);
            // die;
            if (!empty($sections)):
                foreach ($sections as $section): ?>
           
                <div class="col-lg-4 col-md-6">
                            <div class="feature-card h-100">
                                <div class="feature-icon">
                                    <i class="<?= $section['icon'] ?>"></i>
                                </div>
                                <h3 class="feature-title"><?= $section['title'] ?></h3>
                                <p class="feature-description"><?= $section['content'] ?></p>
                            </div>
                        </div>
                  
            <?php endforeach; endif; ?>


        </div>
    </div>
</section>
<?php } ?>
<?php if(!empty($content6['status']) && $content6['status'] == 1) { ?>
<section id="case-studies" class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title"><?= $content6['web_content_1'] ?></h2>
            </div>
        </div>
        <div class="row g-4">
            
              <?php foreach ($looks_list as $key => $looks) {
                   ?>     
                    <div class="col-lg-4 col-md-6">
                <div class="case-study-card h-100">
                    <div class="case-study-image">
                        <img src="<?=$looks['web_image']?>" alt="Green Valley Farm" class="img-fluid">
                    </div>
                    <div class="case-study-content">
                        <h4 class="case-study-title"><?=$looks['web_title']?></h4>
                        <p class="case-study-summary"><?=$looks['web_content']?></p>
                        <a href="<?=base_url("casestudy/".$looks['web_url'])?>" class="btn btn-outline-primary">Read Case Study</a>
                    </div>
                </div>
            </div>
                    
                       <?php     }?>
            
             
        </div>
    </div>
</section>
<?php } ?>


<?php if(!empty($blog_data) && count($blog_data) > 0) { ?>
<?php if($blognavstatus['is_active']==1   && $blogdatamaster['status']==1 ) { ?>
<?php if(!empty($blogdatamaster['status']) && $blogdatamaster['status'] == 1) { ?>
<section class="content-section" data-aos="fade-up">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Recent Blogs</h2>
            <p class="section-subtitle">
                Stay updated with our latest insights on sustainable agriculture, innovation, and farming technology
            </p>
        </div>

        <div class="content-grid">
            <?php foreach ($blog_data as $blog): ?>
                <article class="content-card podcast-card">
                    <div class="card-image-container">
                        <img src="<?php echo htmlspecialchars($blog['web_image']); ?>" alt="<?php echo htmlspecialchars($blog['web_title']); ?>" class="card-image">
                    </div>
                    <div class="card-content">
                        <div class="card-meta">
                            <span class="card-category"><?php echo htmlspecialchars($blog['web_cate_name']); ?></span>
                            <div class="card-date">
                                <i class="fas fa-calendar-alt"></i>
                                <span><?php echo date('F j, Y', strtotime($blog['web_time'])); ?></span>
                            </div>
                        </div>
                        <h3 class="card-title">
                            <a href="blog.php?url=<?php echo htmlspecialchars($blog['web_url']); ?>"><?php echo htmlspecialchars($blog['web_title']); ?></a>
                        </h3>
                        <p class="card-excerpt">
                            <?php echo htmlspecialchars($blog['web_desc']); ?>
                        </p>
                        <div class="card-footer">
                           <a href="<?=base_url("blog/{$blog['web_url']}")?>" class="read-more">
                                            Read More <i class="fas fa-arrow-right"></i>
                                        </a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-5">
            <a href="<?= base_url('blog') ?>" class="btn-primary-green <?= ($routeName == 'blog_detail') ? 'active' : '' ?>">
        View All <i class="fas fa-arrow-right ms-1"></i>
    </a>
        </div>
    </div>
</section>
<?php } ?>
<?php } ?>
<?php } ?>



<?php if(!empty($podcast_data) && count($podcast_data) > 0) { ?>
<?php if(!empty($podcastvideomaster['status']) && $podcastvideomaster['status'] == 1) { ?>
<section class="video-podcast-section py-5" data-aos="fade-up">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Podcasts</h2>
            <p class="section-subtitle">
                Watch our latest conversations about sustainable agriculture and farming innovation
            </p>
        </div>

        <div class="row">
            <?php foreach ($podcast_data as $index => $podcast): ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="podcast-card">
                        <div class="video-container">
                            <!-- YouTube iframe -->
                            <iframe 
                                class="podcast-video-iframe" 
                                src="<?php echo htmlspecialchars($podcast['web_url']); ?>" 
                                title="<?php echo htmlspecialchars($podcast['web_title']); ?>" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                            </iframe>
                        </div>
                        <div class="podcast-content">
                            <h3 class="podcast-title"><?php echo htmlspecialchars($podcast['web_title']); ?></h3>
                            <div class="podcast-meta">
                                <div class="meta-item">
                                    <i class="fas fa-calendar"></i>
                                    <span><?php echo date('F j, Y', strtotime($podcast['web_time'])); ?></span>
                                </div>
                            </div>
                            <p class="podcast-description">
                                <?php echo htmlspecialchars($podcast['web_desc']); ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- View All Button -->
        <div class="text-center">
            <a href="<?= base_url('podcast') ?>" class="btn-primary-green <?= ($routeName == 'podcast') ? 'active' : '' ?>">
        View All <i class="fas fa-arrow-right ms-1"></i>
    </a>
        </div>
    </div>
</section>
<?php } ?>
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
<!-- Case Studies Section -->

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
   document.querySelector(".center-loader").classList.add("d-none");
    // Counter Animation for Impact Numbers
    function animateCounters() {
        const counters = document.querySelectorAll(".impact-number")

        counters.forEach((counter) => {
            const target = Number.parseFloat(counter.getAttribute("data-target"))
            const increment = target / 100
            let current = 0

            const updateCounter = () => {
                if (current < target) {
                    current += increment
                    if (target % 1 !== 0) {
                        counter.textContent = current.toFixed(1)
                    } else {
                        counter.textContent = Math.ceil(current)
                    }
                    setTimeout(updateCounter, 20)
                } else {
                    if (target % 1 !== 0) {
                        counter.textContent = target.toFixed(1)
                    } else {
                        counter.textContent = target
                    }
                }
            }

            updateCounter()
        })
    }

    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: "0px 0px -50px 0px",
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("visible")

                // Trigger counter animation when impact section is visible
                if (entry.target.id === "impact") {
                    animateCounters()
                }
            }
        })
    }, observerOptions)

    // Observe elements for animation
    document.addEventListener("DOMContentLoaded", () => {
        // Add fade-in class to sections
        const sections = document.querySelectorAll("section")
        sections.forEach((section) => {
            section.classList.add("fade-in")
            observer.observe(section)
        })

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
            anchor.addEventListener("click", function (e) {
                e.preventDefault()
                const target = document.querySelector(this.getAttribute("href"))
                if (target) {
                    target.scrollIntoView({
                        behavior: "smooth",
                        block: "start",
                    })
                }
            })
        })

        // Form submission handling
        const pilotForm = document.getElementById("pilotForm")
        const confirmationMessage = document.getElementById("confirmationMessage")

        pilotForm.addEventListener("submit", (e) => {
            e.preventDefault()

            // Hide form and show confirmation
            pilotForm.style.display = "none"
            confirmationMessage.style.display = "block"

            // Scroll to confirmation message
            confirmationMessage.scrollIntoView({
                behavior: "smooth",
                block: "center",
            })
        })

        // Add hover effects to cards
        const cards = document.querySelectorAll(".feature-card, .case-study-card")
        cards.forEach((card) => {
            card.addEventListener("mouseenter", function () {
                this.style.transform = "translateY(-5px)"
            })

            card.addEventListener("mouseleave", function () {
                this.style.transform = "translateY(0)"
            })
        })
    })

    // Logo carousel animation (optional)
    function initLogoCarousel() {
        const logoContainer = document.querySelector(".sponsor-logos")
        if (logoContainer) {
            // Add subtle floating animation to logos
            const logos = logoContainer.querySelectorAll(".logo-item")
            logos.forEach((logo, index) => {
                logo.style.animationDelay = `${index * 0.2}s`
            })
        }
    }

    // Initialize carousel on load
    document.addEventListener("DOMContentLoaded", initLogoCarousel)

</script>


<?php include APPPATH . "/Views/frontent/common/footer.php"; ?>