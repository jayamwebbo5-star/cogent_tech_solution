

<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <div class="row justify-content-evenly">
                <!-- Company Info -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="footer-logo">
                        <img src="<?=FRONT_CSS_PATH?>/images/footer.png" alt="AgriFlow Logo"
                            class="footer-logo-image">
                    </div>
                    <p class="footer-description">
                        <?=$setting['about_content']?>
                    </p>
                     
                </div>

                <!-- Quick Links -->
                <div class="col-lg-2 col-md-6 mb-4">
                    <div class="footer-section">
                        <h5>Quick Links</h5>
                        <ul class="footer-links">
                            <li><a href="<?=base_url('')?>">Home</a></li>
                            <li><a href="<?=base_url('about')?>">About Us</a></li>
                            <li><a href="<?=base_url('ourteam')?>">Our Team</a></li>
                            <li><a href="<?=base_url('resources')?>">Resources</a></li>
                            <li><a href="<?=base_url('get-involved')?>">Get Involved</a></li>
                            <li><a href="<?=base_url('work-with-us')?>">Work with Us</a></li>
                            <li><a href="<?=base_url('contact')?>">Contact</a></li>
                        </ul>
                    </div>
                </div>
 
                <!-- Contact Info -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="footer-section">
                        <h5>Contact Information</h5>
                        <ul class="contact-info">
                            <li>
                                <i class="fas fa-map-marker-alt"></i>
                                <span><?=$setting['address_1']?>, <?=$setting['address_2']?>, <br>
                                <?=$setting['address_3']?> <?=$setting['pincode']?></span>
                            </li>
                            <?php if(!empty($setting['user_phone_1'])){ ?>
                            <li>
                                <i class="fas fa-phone"></i>
                                <span><?=$setting['user_phone_1']?></span>
                            </li>
                            <?php } if(!empty($setting['user_email'])){ ?>
                            <li>
                                <i class="fas fa-envelope"></i>
                                <span><?=$setting['user_email']?></span>
                            </li>
                            <?php } ?>
                        </ul>
                       
                           
                                <h5> <i class="fas fa-share-alt mt-2"></i> Social Media</h5>
                                <div class="d-flex flex-row gap-3 " style="font-color:yellow;">
                                    <?php if (!empty($setting['facebook_url'])) { ?>
                                        <a style="color: rgb(244 196 48);     font-size: 18px;" href="<?= $setting['facebook_url'] ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    <?php } ?>
                                    <?php if (!empty($setting['instagram_url'])) { ?>
                                        <a style="color: rgb(244 196 48);     font-size: 18px;" href="<?= $setting['instagram_url'] ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                                    <?php } ?>
                                    <?php if (!empty($setting['linkedin_url'])) { ?>
                                        <a  style="color: rgb(244 196 48);     font-size: 18px;" href="<?= $setting['linkedin_url'] ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    <?php } ?>
                                </div>
                    </div>
                      
                </div>
             
                     
                  
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="footer-bottom-content">
                <div class="copyright d-flex justify-content-center">
                    <p class="text-white ">&copy; 2025 Agriflow Initiative. All rights reserved</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> 

<script src="<?=FRONT_CSS_PATH ?>/js/main.js"></script>

<script>
AOS.init({
duration: 1200,
once: false, // Animation repeats every time you scroll to the element
});
</script>
</body>

</html>