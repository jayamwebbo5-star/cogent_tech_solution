<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $meta['meta_title'] ?? '' ?></title>
        <meta name="title" content="<?= $meta['meta_title'] ?? '' ?>">
        <meta name="description" content="<?= $meta['meta_desc'] ?? '' ?>">
        <meta name="keywords" content="<?= $meta['meta_key'] ?? '' ?>">

        <!-- Open Graph (OG) Meta Tags for Social Sharing -->
        <meta property="og:title" content="<?= $meta['meta_title'] ?? '' ?>" />
        <meta property="og:description" content="<?= $meta['meta_desc'] ?? '' ?>" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="https://www.agriflowinitiative.org/" />
        <meta property="og:image" content="https://www.agriflowinitiative.org/assets/images/agriflow-og-image.jpg" />
        <meta property="og:site_name" content="AgriFlow Initiative" />
        <meta property="og:locale" content="en_US" />

        <!-- Twitter Card Meta Tags -->
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:title" content="AgriFlow Initiative | Sustainable Agriculture & Innovation" />
        <meta name="twitter:description" content="AgriFlow Initiative is a nonprofit transforming farming through sustainable technology and local community empowerment." />
        <meta name="twitter:image" content="https://www.agriflowinitiative.org/assets/images/agriflow-og-image.jpg" />
        <meta name="twitter:site" content="@AgriFlow" />
        <meta name="twitter:creator" content="@AgriFlow" />

        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <script src="https://www.google.com/recaptcha/enterprise.js" async defer></script>

        <!-- SweetAlert2 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

        <!-- SweetAlert2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script
        
        <script src="https://www.paypal.com/sdk/js?client-id=venkatesan.rohit@agriflowinitiative.org&currency=USD"></script>


        <!-- Bootstrap CSS -->
        <link rel="shortcut icon" href="<?= FRONT_CSS_PATH ?>/images/agriflow-logo.png" type="image/x-icon">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Swiper CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

        <link rel="stylesheet" href="<?= FRONT_CSS_PATH ?>/css/style.css">
    </head>

    <body>
        <?php
        $router = service('router');
        $routeName = $router->getMatchedRouteOptions()['as'] ?? 'no name';

        $db = \Config\Database::connect();
        $menu_data = $db->table('web_menu ws')
                        ->select('ws.is_active,ws.web_title')
                        ->where([
                            'ws.is_deleted' => 0,              
                        ])
                        ->orderBy('ws.web_menu_id', 'ASC')
                        ->get()->getResultArray();
 
        
        ?>
        <!-- From Uiverse.io by abrahamcalsin -->
        <div class="center-loader">
            <div class="dot-spinner">
                <div class="dot-spinner__dot"></div>
                <div class="dot-spinner__dot"></div>
                <div class="dot-spinner__dot"></div>
                <div class="dot-spinner__dot"></div>
                <div class="dot-spinner__dot"></div>
                <div class="dot-spinner__dot"></div>
                <div class="dot-spinner__dot"></div>
                <div class="dot-spinner__dot"></div>
            </div>
        </div>



        <!-- Main Header -->
        <header class="main-header">
            <div class="container">
                <div class="logo-section">
                    <div class="logo">
                        <a href="">
                            <img src="<?= FRONT_CSS_PATH ?>/images/agriflow-logo.png" alt="">
                        </a>
                    </div>
                </div>

                <!-- Bootstrap Navbar -->
                <nav class="navbar navbar-expand-lg main-nav">
                    <button class="navbar-toggler d-lg-none" type="button" onclick="toggleNav()">
                        <span class="navbar-toggler-icon"></span>
                        <span class="close-icon" style="display: none;">×</span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav nav-menu">
                            <?php if($menu_data[8]['is_active']??false){?>
                            <li class="nav-item">
                                <a href="<?= base_url("") ?>" class="nav-link <?= ($routeName == "home") ? 'active' : '' ?>">Home</a>
                            </li>
                            <?php } if($menu_data[0]['is_active']??false){?>
                            <li class="nav-item">
                                <a href="<?= base_url("about") ?>" class="nav-link <?= ($routeName == "about") ? 'active' : '' ?>">About</a>
                            </li>
                            <?php } if($menu_data[1]['is_active']??false){?>
                            <li class="nav-item">
                                <a href="<?= base_url("ourteam") ?>" class="nav-link <?= ($routeName == "ourteam") ? 'active' : '' ?>">Our Team</a>
                            </li>
                            <?php } if($menu_data[5]['is_active']??false){?>
                            <li class="nav-item">
                                <a href="<?= base_url("podcast") ?>" class="nav-link <?= ($routeName == "podcast") ? 'active' : '' ?>">Podcast</a>
                            </li>
                            <?php } if($menu_data[6]['is_active']??false){?>
                            <li class="nav-item">
                                <a href="<?= base_url("blog") ?>" class="nav-link <?= ($routeName == "blog" || $routeName == "blog_detail") ? 'active' : '' ?>">Blog</a>
                            </li>
                            <?php } if($menu_data[2]['is_active']??false){?>
                            <li class="nav-item">
                                <a href="<?= base_url("resources") ?>" class="nav-link <?= ($routeName == "resources") ? 'active' : '' ?>">Resources</a>
                            </li>
                            <?php } if($menu_data[3]['is_active']??false){?>
                            <li class="nav-item">
                                <a href="<?= base_url("get-involved") ?>" class="nav-link <?= ($routeName == "get-involved") ? 'active' : '' ?>">Get Involved</a>
                            </li>
                            <?php } if($menu_data[7]['is_active']??false){?>
                            <li  class="nav-item">
                                <a href="<?= base_url('work-with-us') ?>" class="nav-link <?= ($routeName == "work-with-us") ? 'active' : '' ?>">Work with Us</a>
                            </li>
                            <?php } if($menu_data[4]['is_active']??false){?>
                            <li class="nav-item">
                                <a href="<?= base_url("contact") ?>" class="nav-link d-block d-lg-none <?= ($routeName == "contact") ? 'active' : '' ?>">Contact</a>
                            </li>
                            <?php }?>
                        </ul>

                    </div>
                </nav>

                <div class="header-actions d-none d-lg-block">
                    <a href="<?= base_url("contact") ?>" class="contact-btn">
                        Contact Us <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </header>