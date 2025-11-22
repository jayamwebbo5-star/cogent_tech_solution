<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partner with Agriflow - Smarter Irrigation, Real Impact</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700&family=Nunito+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
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
          
    </style>
</head>
<body>
    <!-- Hero Section -->
    <section id="hero" class="hero-section">
        <div class="hero-overlay">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-10">
                        <h1 class="hero-title">Partner with Agriflow: Smarter Irrigation, Real Impact</h1>
                        <h2 class="hero-subtitle">We work directly with farmers to assess, improve, and document irrigation systems for efficiency, resilience, and sustainability.</h2>
                        <a href="#pilot-form" class="btn btn-primary btn-lg hero-cta">Join as a Pilot Farm</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Offer Section -->
     
    <section id="our-offer" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title">What We Do</h2>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card h-100">
                        <div class="feature-icon">
                            <i class="fas fa-clipboard-check"></i>
                        </div>
                        <h3 class="feature-title">Farm Audits</h3>
                        <p class="feature-description">Comprehensive assessment of your current irrigation system to identify inefficiencies and opportunities for improvement. Our experts analyze water usage patterns and system performance.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card h-100">
                        <div class="feature-icon">
                            <i class="fas fa-seedling"></i>
                        </div>
                        <h3 class="feature-title">Mini-Trials</h3>
                        <p class="feature-description">Small-scale pilot programs to test innovative irrigation solutions on your farm. We implement and monitor new technologies to measure their real-world impact.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card h-100">
                        <div class="feature-icon">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <h3 class="feature-title">Storytelling</h3>
                        <p class="feature-description">Document and share your sustainability journey through compelling case studies. Help other farmers learn from your experience and innovations.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Case Studies Section -->
    <section id="case-studies" class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title">What This Looks Like in Action</h2>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="case-study-card h-100">
                        <div class="case-study-image">
                            <img src="/placeholder.svg?height=200&width=350" alt="Green Valley Farm" class="img-fluid">
                        </div>
                        <div class="case-study-content">
                            <h4 class="case-study-title">Green Valley Farm - Drip System Optimization</h4>
                            <p class="case-study-summary">Reduced water usage by 35% while increasing crop yield through precision drip irrigation upgrades and smart scheduling systems.</p>
                            <a href="#" class="btn btn-outline-primary">Read Case Study</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="case-study-card h-100">
                        <div class="case-study-image">
                            <img src="/placeholder.svg?height=200&width=350" alt="Sunrise Acres" class="img-fluid">
                        </div>
                        <div class="case-study-content">
                            <h4 class="case-study-title">Sunrise Acres - Smart Sprinkler Integration</h4>
                            <p class="case-study-summary">Implemented IoT-enabled sprinkler systems that respond to weather data, saving 40% on water costs and improving crop health.</p>
                            <a href="#" class="btn btn-outline-primary">Read Case Study</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="case-study-card h-100">
                        <div class="case-study-image">
                            <img src="/placeholder.svg?height=200&width=350" alt="Heritage Orchards" class="img-fluid">
                        </div>
                        <div class="case-study-content">
                            <h4 class="case-study-title">Heritage Orchards - Sustainable Water Management</h4>
                            <p class="case-study-summary">Transformed traditional irrigation into a sustainable system using rainwater harvesting and soil moisture sensors for optimal efficiency.</p>
                            <a href="#" class="btn btn-outline-primary">Read Case Study</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Impact Section -->
    <section id="impact" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title">Our Measured Impact</h2>
                </div>
            </div>
            <div class="row g-4 text-center">
                <div class="col-lg-3 col-md-6">
                    <div class="impact-card">
                        <div class="impact-icon">
                            <i class="fas fa-tractor"></i>
                        </div>
                        <div class="impact-number" data-target="127">0</div>
                        <div class="impact-label">Farms Audited</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="impact-card">
                        <div class="impact-icon">
                            <i class="fas fa-tools"></i>
                        </div>
                        <div class="impact-number" data-target="89">0</div>
                        <div class="impact-label">Leaks Fixed</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="impact-card">
                        <div class="impact-icon">
                            <i class="fas fa-water"></i>
                        </div>
                        <div class="impact-number" data-target="2.4">0</div>
                        <div class="impact-label">Million Gallons Saved</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="impact-card">
                        <div class="impact-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="impact-number" data-target="34">0</div>
                        <div class="impact-label">% Average Efficiency Gain</div>
                    </div>
                </div>
            </div>
            
            <!-- Progress Timeline -->
            <div class="row mt-5">
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

    <!-- Pilot Intake Form -->
    <section id="pilot-form" class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center mb-5">
                        <h2 class="section-title">Become a Pilot Partner</h2>
                        <p class="lead">Join our network of innovative farmers leading the way in sustainable irrigation practices. Fill out the form below to get started.</p>
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

    <!-- Sponsor With Us Section -->
    <section id="sponsors" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title">Sponsor With Us</h2>
                    <p class="lead">Partner with Agriflow to support sustainable agriculture innovation. Join leading organizations in making a real impact on farming communities and environmental sustainability.</p>
                </div>
            </div>
            
            <!-- Logo Carousel -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="sponsor-logos">
                        <div class="logo-item">
                            <img src="/placeholder.svg?height=80&width=160" alt="Partner Logo" class="sponsor-logo">
                        </div>
                        <div class="logo-item">
                            <img src="/placeholder.svg?height=80&width=160" alt="Partner Logo" class="sponsor-logo">
                        </div>
                        <div class="logo-item">
                            <img src="/placeholder.svg?height=80&width=160" alt="Partner Logo" class="sponsor-logo">
                        </div>
                        <div class="logo-item">
                            <img src="/placeholder.svg?height=80&width=160" alt="Partner Logo" class="sponsor-logo">
                        </div>
                        <div class="logo-item">
                            <img src="/placeholder.svg?height=80&width=160" alt="Partner Logo" class="sponsor-logo">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12 text-center">
                    <a href="#" class="btn btn-outline-primary btn-lg">Download Sponsorship One-Pager</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer py-4">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <p>&copy; 2024 Agriflow. All rights reserved. | Building sustainable irrigation solutions for the future.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
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
</body>
</html>
