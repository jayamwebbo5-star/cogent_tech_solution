<?php include APPPATH . "/Views/frontent/common/header.php"; ?>
<!-- Custom CSS -->
<style>
    :root {
        /* Colors */
        --primary-green: #135e29;
        --secondary-green: #4a7c59;
        --accent-yellow: #f4c430;
        --white: #fff;
        --light-gray: #f8f9fa;
        --dark-gray: #333333;
        --text-gray: #666666;
        --border-gray: #e0e0e0;
        --light-green: #e0ffeae8;
        --emerald-light: #ecfdf5;

        /* Typography */
        --font-primary: "Work Sans", sans-serif;
        --font-secondary: "Nunito Sans", sans-serif;

        /* Font Sizes */
        --font-xs: 12px;
        --font-sm: 14px;
        --font-md: 16px;
        --font-lg: 18px;
        --font-xl: 24px;
        --font-2xl: 32px;
        --font-3xl: 48px;
        --font-4xl: 64px;

        /* Spacing */
        --spacing-xs: 4px;
        --spacing-sm: 8px;
        --spacing-md: 16px;
        --spacing-lg: 24px;
        --spacing-xl: 32px;
        --spacing-2xl: 48px;
        --spacing-3xl: 64px;

        /* Layout */
        --container-max-width: 1400px;
        --header-height: 80px;
        --top-header-height: 50px;

        /* Transitions */
        --transition-fast: 0.2s ease;
        --transition-normal: 0.3s ease;
        --transition-slow: 0.5s ease;

        /* Shadows */
        --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.1);
        --shadow-md: 0 4px 8px rgba(0, 0, 0, 0.15);
        --shadow-lg: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    /* Global Styles */
    body {
        font-family: var(--font-primary);
        color: var(--dark-gray);
        line-height: 1.6;
    }

    .container {
        max-width: var(--container-max-width);
    }

    /* Custom Bootstrap Overrides */
    .btn-primary {
        background-color: var(--primary-green);
        border-color: var(--primary-green);
        font-weight: 600;
        padding: 12px 30px;
        border-radius: 8px;
        transition: var(--transition-normal);
    }

    .btn-primary:hover {
        background-color: var(--secondary-green);
        border-color: var(--secondary-green);
        transform: translateY(-2px);
    }

    .btn-outline-primary {
        color: var(--primary-green);
        border-color: var(--primary-green);
        font-weight: 600;
        padding: 10px 25px;
        border-radius: 8px;
        transition: var(--transition-normal);
    }

    .btn-outline-primary:hover {
        background-color: var(--primary-green);
        border-color: var(--primary-green);
        transform: translateY(-2px);
    }

    /* Hero Section */
    .hero-section {
        background: linear-gradient(rgba(19, 94, 41, 0.8), rgba(74, 124, 89, 0.8)),
            url("/placeholder.svg?height=600&width=1200") center / cover;
        min-height: 100vh;
        display: flex;
        align-items: center;
        color: var(--white);
        position: relative;
    }

    .hero-overlay {
        width: 100%;
    }

    .hero-title {
        font-size: var(--font-3xl);
        font-weight: 700;
        margin-bottom: var(--spacing-lg);
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .hero-subtitle {
        font-size: var(--font-xl);
        font-weight: 400;
        margin-bottom: var(--spacing-2xl);
        opacity: 0.95;
    }

    .hero-cta {
        font-size: var(--font-lg);
        padding: 15px 40px;
        background-color: var(--accent-yellow);
        border-color: var(--accent-yellow);
        color: var(--dark-gray);
        font-weight: 700;
    }

    .hero-cta:hover {
        background-color: #e6b429;
        border-color: #e6b429;
        color: var(--dark-gray);
    }

    /* Section Titles */
    .section-title {
        font-size: var(--font-2xl);
        font-weight: 700;
        color: var(--primary-green);
        margin-bottom: var(--spacing-xl);
    }

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

    /* Case Study Cards */
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

    /* Pilot Form */
    .pilot-form-container {
        background: var(--white);
        padding: var(--spacing-2xl);
        border-radius: 12px;
        box-shadow: var(--shadow-md);
    }

    .form-label {
        font-weight: 600;
        color: var(--dark-gray);
        margin-bottom: var(--spacing-sm);
    }

    .form-control,
    .form-select {
        border: 2px solid var(--border-gray);
        border-radius: 8px;
        padding: 12px 16px;
        font-size: var(--font-md);
        transition: var(--transition-fast);
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--primary-green);
        box-shadow: 0 0 0 0.2rem rgba(19, 94, 41, 0.25);
    }

    .form-check-input:checked {
        background-color: var(--primary-green);
        border-color: var(--primary-green);
    }

    .confirmation-message {
        margin-top: var(--spacing-xl);
    }

    /* Sponsor Section */
    .sponsor-logos {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        gap: var(--spacing-2xl);
    }

    .logo-item {
        opacity: 0.7;
        transition: var(--transition-normal);
    }

    .logo-item:hover {
        opacity: 1;
        transform: scale(1.05);
    }

    .sponsor-logo {
        max-height: 80px;
        width: auto;
        filter: grayscale(100%);
        transition: var(--transition-normal);
    }

    .sponsor-logo:hover {
        filter: grayscale(0%);
    }

    /* Footer */
    .footer {
        background: var(--primary-green);
        color: var(--white);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .hero-title {
            font-size: var(--font-2xl);
        }

        .hero-subtitle {
            font-size: var(--font-lg);
        }

        .section-title {
            font-size: var(--font-xl);
        }

        .feature-card,
        .pilot-form-container {
            padding: var(--spacing-lg);
        }

        .sponsor-logos {
            gap: var(--spacing-lg);
        }
    }

    /* Smooth Scrolling */
    html {
        scroll-behavior: smooth;
    }

    /* Animation Classes */
    .fade-in {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }

    .fade-in.visible {
        opacity: 1;
        transform: translateY(0);
    }
    .form-check-input {
  padding: 0;
   
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
<?php if(!empty($content1['status']) && $content1['status'] == 1) { ?>
<section class="inner-hero-section">
    <div class="container">
        <h2 class="section-title"><?= $content1['web_content_1'] ?></h2>
        <p class="section-subtitle"><?= $content1['web_content_2'] ?></p>
        <div class="d-flex justify-content-center my-2">
           <a href="#pilot-form" class="btn btn-primary btn-lg hero-cta text-center">Join as a Pilot Farm</a>
           
        </div>
                    
    </div>
</section>
<?php } ?>
<!-- Our Offer Section -->
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


<!-- Case Studies Section -->
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

<!-- Impact Section -->
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

<!-- Pilot Intake Form -->
<?php if(!empty($content2['status']) && $content2['status'] == 1) { ?>
<section id="pilot-form" class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-5">
                    <h2 class="section-title"><?=$content2["web_content_1"]?></h2>
                    <p class="lead"><?=$content2["web_content_2"]?></p>
                </div>

                <div class="pilot-form-container">
                    <form id="pilotForm" class="pilot-form">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="farmName" class="form-label">Farm/Organization Name *</label>
                                <input type="text" class="form-control" id="farmName" required>
                            </div>
                            <div class="col-md-6">
                                <label for="contactName" class="form-label">Contact Person Name *</label>
                                <input type="text" class="form-control" id="contactName" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email *</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="tel" class="form-control" id="phone">
                            </div>
                            <div class="col-md-6">
                                <label for="city" class="form-label">City *</label>
                                <input type="text" class="form-control" id="city" required>
                            </div>
                            <div class="col-md-6">
                                <label for="county" class="form-label">County *</label>
                                <input type="text" class="form-control" id="county" required>
                            </div>
                            <div class="col-12">
                                <label for="crops" class="form-label">Crops Grown</label>
                                <textarea class="form-control" id="crops" rows="2" placeholder="Please describe the main crops you grow"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="irrigationSystem" class="form-label">Current Irrigation System *</label>
                                <select class="form-select" id="irrigationSystem" required>
                                    <option value="">Select system type</option>
                                    <option value="drip">Drip Irrigation</option>
                                    <option value="sprinkler">Sprinkler System</option>
                                    <option value="mixed">Mixed Systems</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Areas of Interest *</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="audit" id="interestAudit">
                                    <label class="form-check-label" for="interestAudit">Farm Audit</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="mini-trial" id="interestTrial">
                                    <label class="form-check-label" for="interestTrial">Mini-Trial</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="both" id="interestBoth">
                                    <label class="form-check-label" for="interestBoth">Both</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="consent" required>
                                    <label class="form-check-label" for="consent">
                                        I allow Agriflow to collect non-sensitive irrigation data and use photos/data for case studies (with prior approval). *
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Submit Application</button>
                            </div>
                        </div>
                    </form>

                    <div id="confirmationMessage" class="confirmation-message" style="display: none;">
                        <div class="alert alert-success">
                            <h4>Thank you for your interest!</h4>
                            <p>We've received your application and will be in touch within 2-3 business days to discuss next steps.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<!-- Sponsor With Us Section -->
 <?php if(!empty($content5['status']) && $content5['status'] == 1) { ?>
<section id="sponsors" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title"><?=$content5["web_content_1"]?></h2>
                <p class="lead"><?=$content5["web_content_2"]?></p>
            </div>
        </div>

        <!-- Logo Carousel -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="sponsor-logos">
                    <?php foreach ($sponser_list as $key => $sponser) {
                   ?>     
                    
                    <div class="logo-item">
                        <img src="<?=$sponser['web_image']?>" alt="Partner Logo" class="sponsor-logo">
                    </div>
                       <?php     }?>
                   
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 text-center">
             <a href="<?= base_url('files/content/' . $content5['web_file_1']) ?>"
                   class="btn btn-outline-primary btn-lg"
                   download="<?= $content5['web_file_1'] ?>">
                   Download Sponsorship One-Pager
                </a>            </div>
        </div>
    </div>
</section>
<?php } ?>
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
