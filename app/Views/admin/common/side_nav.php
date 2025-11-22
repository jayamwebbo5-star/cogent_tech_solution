<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">
        <div class="multinav">
            <div class="multinav-scroll" style="height: 99%; overflow-y: auto;">
                <ul class="sidebar-menu" data-widget="tree">

                    <!-- sidebar menu-->

                    <?php
                    $router = service('router');
                    $routeName = $router->getMatchedRouteOptions()['as'] ?? 'no name';
                    ?>

                    <li>
                        <a href="<?= base_url(ADMIN_NAME . '/menu-manage') ?>">                             
                            <i class="fas fa-home" style="font-size: 18px"></i>
                            <span>Menu</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url(ADMIN_NAME . '/social-manage') ?>">
                            <i class="fas fa-tools" style="font-size: 18px"></i>
                            <span>Setting</span>
                        </a>
                    </li>


                    <li class="header fs-10 m-0 text-uppercase">Home</li>

                    <li class="  <?= ($routeName == "swiper-manage") ? "active" : "" ?>">
                        <a href="<?= base_url(ADMIN_NAME . '/swiper-manage') ?>">

                        <i class="fas fa-chalkboard" style="font-size:18px;"></i>


                            <span>Swiper</span>
                        </a>
                    </li>

                     <li class="  <?= ($routeName == "homeservices-manage") ? "active" : "" ?>">
                        <a href="<?= base_url(ADMIN_NAME . '/homeservices-manage') ?>">

                          <i class="fas fa-concierge-bell" style="font-size: 18px;"></i>

                            <span>Services</span>
                        </a>
                    </li>

                     <li>
                        <a href="<?= base_url(ADMIN_NAME . '/banner-manage') ?>">

                            <i class="fas fa-image"  style="font-size: 18px"></i>
                            <span>Banner</span>
                        </a>
                    </li>

                    <li class="  <?= ($routeName == "homefounder-manage") ? "active" : "" ?>">
                        <a href="<?= base_url(ADMIN_NAME . '/homefounder-manage') ?>">

                            <i class="fas fa-microphone"  style="font-size: 18px"></i>
                            <span>Founder's Message</span>
                        </a>
                    </li>

                    <li class="  <?= ($routeName == "homeabout-manage") ? "active" : "" ?>">
                        <a href="<?= base_url(ADMIN_NAME . '/homeabout-manage') ?>">

                            <i class="fas fa-comment"  style="font-size: 18px"></i>
                            <span>About Content</span>
                        </a>
                    </li>

                    <li class="  <?= ($routeName == "hometakeaction-manage") ? "active" : "" ?>">
                        <a href="<?= base_url(ADMIN_NAME . '/hometakeaction-manage') ?>">

                            <i class="fas fa-bullhorn"  style="font-size: 18px"></i>
                            <span>Take Action</span>
                        </a>
                    </li>

                    <li class="header fs-10 m-0 text-uppercase">About</li>

                    <li class="  <?= ($routeName == "aboutourmission-manage") ? "active" : "" ?>">
                        <a href="<?= base_url(ADMIN_NAME . '/aboutourmission-manage') ?>">

                            <i class="fas fa-handshake"  style="font-size: 18px"></i>
                            <span>Our Mission</span>
                        </a>
                    </li>

                    <li class="  <?= ($routeName == "aboutabout-manage") ? "active" : "" ?>">
                        <a href="<?= base_url(ADMIN_NAME . '/aboutabout-manage') ?>">

                            <i class="fas fa-comment"  style="font-size: 18px"></i>
                            <span>About Content</span>
                        </a>
                    </li>

                    <li class="  <?= ($routeName == "abouttakeaction-manage") ? "active" : "" ?>">
                        <a href="<?= base_url(ADMIN_NAME . '/abouttakeaction-manage') ?>">

                            <i class="fas fa-bullhorn"  style="font-size: 18px"></i>
                            <span>Take Action</span>
                        </a>
                    </li>

                    <li class="  <?= ($routeName == "aboutfounder-manage") ? "active" : "" ?>">
                        <a href="<?= base_url(ADMIN_NAME . '/aboutfounder-manage') ?>">

                            <i class="fas fa-microphone"  style="font-size: 18px"></i>
                            <span>Founder's Message</span>
                        </a>
                    </li>
                    <li class="header fs-10 m-0 text-uppercase">Our Team</li>

                    <li class="  <?= ($routeName == "teamfounder-manage") ? "active" : "" ?>">
                        <a href="<?= base_url(ADMIN_NAME . '/teamfounder-manage') ?>">

                            <i class="fas fa-microphone"  style="font-size: 18px"></i>
                            <span>Our Founders</span>
                        </a>
                    </li>

                    <li class="  <?= ($routeName == "teamclient-manage") ? "active" : "" ?>">
                        <a href="<?= base_url(ADMIN_NAME . '/teamclient-manage') ?>">
                            <i class="fas fa-people-arrows"  style="font-size: 18px"></i>
                            <span>Partners</span>
                        </a>
                    </li>

                    <li class="  <?= ($routeName == "brand-manage") ? "active" : "" ?>">
                        <a href="<?= base_url(ADMIN_NAME . '/brand-manage') ?>">                             
                            <i class="fas fa-flag" style="font-size: 18px"></i>
                            <span>Clients</span>
                        </a>
                    </li>


                    <li class="header fs-10 m-0 text-uppercase">Resources</li>

                    <li class="  <?= ($routeName == "resources-manage") ? "active" : "" ?>">
                        <a href="<?= base_url(ADMIN_NAME . '/resources-manage') ?>">                             
                            <i class="fas fa-address-card" style="font-size: 18px"></i>
                            <span>Content</span>
                        </a>
                    </li>

                    <li class="  <?= ($routeName == "gallery-manage") ? "active" : "" ?>">
                        <a href="<?= base_url(ADMIN_NAME . '/gallery-manage') ?>">

                            <i class="fas fa-image"  style="font-size: 18px"></i>
                            <span>Gallery</span>
                        </a>
                    </li>

                    <li class="  <?= ($routeName == "video-manage") ? "active" : "" ?>">
                        <a href="<?= base_url(ADMIN_NAME . '/video-manage') ?>">

                            <i class="fas fa-video"  style="font-size: 18px"></i>
                            <span>Video</span>
                        </a>
                    </li>

                    <li class="header fs-10 m-0 text-uppercase">Podcast</li>

                    <li class="  <?= ($routeName == "podcast-manage") ? "active" : "" ?>">
                        <a href="<?= base_url(ADMIN_NAME . '/podcast-manage') ?>">                             
                            <i class="fas fa-address-card" style="font-size: 18px"></i>
                            <span>Content</span>
                        </a>
                    </li>

                    <li class="  <?= ($routeName == "podcastlist-manage") ? "active" : "" ?>">
                        <a href="<?= base_url(ADMIN_NAME . '/podcastlist-manage') ?>">                             
                            <i class="fas fa-address-card" style="font-size: 18px"></i>
                            <span>Podcast List</span>
                        </a>
                    </li>

                    <li class="header fs-10 m-0 text-uppercase">Blog</li>

                    <li class="  <?= ($routeName == "blog-manage") ? "active" : "" ?>">
                        <a href="<?= base_url(ADMIN_NAME . '/blog-manage') ?>">                             
                            <i class="fas fa-address-card" style="font-size: 18px"></i>
                            <span>Blog List</span>
                        </a>
                    </li>

                    <li class="header fs-10 m-0 text-uppercase">Get Involved</li>

                    <li class="  <?= ($routeName == "involved-manage") ? "active" : "" ?>">
                        <a href="<?= base_url(ADMIN_NAME . '/involved-manage') ?>">                             
                            <i class="fas fa-address-card" style="font-size: 18px"></i>
                            <span>Content</span>
                        </a>
                    </li>

                    <li class="  <?= ($routeName == "involvedlist-manage") ? "active" : "" ?>">
                        <a href="<?= base_url(ADMIN_NAME . '/involvedlist-manage') ?>">
                            <i class="fas fa-sitemap" style="font-size: 18px"></i>

                            <span>Involved List</span>
                        </a>
                         <li class="<?=($routeName == "donation-form-manage") ? "active" : ""?>">
                        <a href="<?=base_url(ADMIN_NAME . '/donation-form-manage')?>">
                            <i class="fas fa-donate" style="font-size: 18px"></i>
                            <span>Donation Form</span>
                    </li>

                    <li class="header fs-10 m-0 text-uppercase">Work with Us</li>


                    <li class="<?= ($routeName == "work-content-manage") ? "active" : "" ?>">
                        <a href="<?= base_url(ADMIN_NAME . '/work-content-manage') ?>">
                            <i class="fas fa-newspaper" style="font-size: 18px"></i>
                            <span>Content</span>
                        </a>
                    </li>

                    <li class="<?= ($routeName == "whatwedo-manage") ? "active" : "" ?>">
                        <a href="<?= base_url(ADMIN_NAME . '/whatwedo-manage') ?>">
                            <i class="fas fa-lightbulb" style="font-size: 18px"></i>
                            <span>What We Do</span>
                        </a>
                    </li>
                    <li class="<?= ($routeName == "looks-manage") ? "active" : "" ?>">
                        <a href="<?= base_url(ADMIN_NAME . '/looks-manage') ?>">
                            <i class="fas fa-photo-video" style="font-size: 18px"></i>
                            <span>Looks Like in Action</span>
                        </a>
                    </li>
                    <li class="<?= ($routeName == "measured-manage") ? "active" : "" ?>">
                        <a href="<?= base_url(ADMIN_NAME . '/measured-manage') ?>">
                            <i class="fas fa-balance-scale" style="font-size: 18px"></i>
                            <span>Our Measured Impact</span>
                        </a>
                    </li>
                      <li class="<?= ($routeName == "pilot-partner-manage") ? "active" : "" ?>">
                        <a href="<?= base_url(ADMIN_NAME . '/pilot-partner-manage') ?>">
                            <i class="fas fa-handshake" style="font-size: 18px"></i>
                            <span>Become a Pilot Partner</span>
                        </a>
                    </li>

                    <li class="<?= ($routeName == "sponsor-manage") ? "active" : "" ?>">
                        <a href="<?= base_url(ADMIN_NAME . '/sponsor-manage') ?>">
                            <i class="fas fa-handshake" style="font-size: 18px"></i>
                            <span>Sponsor</span>
                        </a>
                    </li>

                

                 

                  



                </ul>


            </div>
        </div>
    </section>
</aside>