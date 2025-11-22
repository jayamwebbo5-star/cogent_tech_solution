<header class="main-header">
 <div class="d-flex align-items-center justify-content-center logo-box" 
     style="height:60px; padding-top:38px; margin:0;">
     
    <a href="<?= base_url() ?>" class="logo">
        <h2 style="font-weight:bold; font-size:1.5rem; color:#333; margin:0; padding:0;">
            Admin Panel
        </h2>
    </a>
</div>




    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <div class="app-menu">
            <ul class="header-megamenu nav">
                <li class="btn-group nav-item">
                    <a href="#" class="waves-effect waves-light c-menu-btn nav-link push-btn btn-primary-light" role="button">
                        <i data-feather="menu"></i>
                    </a>
                </li>

            </ul>
        </div>

        <div class="navbar-custom-menu r-side">
            <ul class="nav navbar-nav">

                <li class="dropdown notifications-menu btn-group">
                    <label class="switch">
                        <a class="waves-effect waves-light btn-primary-light svg-bt-icon">
                            <input type="checkbox" data-mainsidebarskin="toggle" id="toggle_left_sidebar_skin">
                            <span class="switch-on"><i data-feather="moon"></i></span>
                            <span class="switch-off"><i data-feather="sun"></i></span>
                        </a>
                    </label>
                </li>

                <li class="btn-group nav-item d-xl-inline-flex d-none">
                    <a href="#" id="toggleFullscreen" class="waves-effect waves-light nav-link btn-primary-light svg-bt-icon" title="Full Screen">
                        <i data-feather="maximize"></i>
                    </a>
                </li>


                <!-- User Account-->
                <li class="dropdown user user-menu">
                    <a href="#" class="waves-effect waves-light dropdown-toggle w-auto l-h-12 bg-transparent p-0 no-shadow" title="User" data-bs-toggle="modal" data-bs-target="#quick_user_toggle">
                        <img src="<?= CSS_PATH . "/images/avatar/man.png" ?>" class="avatar rounded-circle bg-success-light h-40 w-40" alt="" />
                    </a>
                </li>

            </ul>
        </div>
    </nav>
</header>