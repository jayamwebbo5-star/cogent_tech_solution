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

<? if (!empty($about_data['status']) && $about_data['status'] == 1) { ?>
<section class="get-involved-section py-5">
    <div class="container">
        <div class="description-content">
            <h2 class="section-title"><?= $about_data['web_content_1'] ?></h2>
            <p>
                <?= $about_data['web_content_2'] ?>
            </p>


        </div>
    </div>
</section>
<?php } ?>

<!-- Donation Section -->
 <?php if(!empty($donatemaster['status']) && $donatemaster['status'] == 1) { ?>
<section class="donation-section">
    <div class="container">
        <div class="donation-container">
            <h2 class="section-title">Donation Form</h2>


            <!-- MAIN DONATION FORM -->
            <form class="donation-form" id="donationForm" method="post" action="https://www.paypal.com/cgi-bin/webscr" onsubmit="return validateDonationForm();">

                <!-- PayPal Required Hidden Inputs -->
                <input type="hidden" name="cmd" value="_xclick">
                <input type="hidden" name="business" value="venkatesan.rohit@agriflowinitiative.org">
                <input type="hidden" name="item_name" value="Donation to AgriFlow Initiative">
                <input type="hidden" name="currency_code" value="USD">
                <input type="hidden" name="return" value="https://yourwebsite.com/thank-you.html">
                <input type="hidden" name="cancel_return" value="https://yourwebsite.com/cancel.html">
                <input type="hidden" name="no_note" value="1">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fullName" class="form-label">Full Name </label>
                            <input type="text" id="fullName" name="custom" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" id="phone" name="phone" class="form-control" placeholder="+1 (555) 123-4567" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email Address </label>
                    <input type="email" id="email" name="payer_email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Donation Amount (USD) </label>
                    <div class="custom-amount" id="customAmountContainer">
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" id="customAmount" name="amount" class="form-control m-0" placeholder="Enter amount" min="0.1" step="0.01" required>
                        </div>
                    </div>
                </div>

                <div class="form-group mt-4">
                    <label for="message" class="form-label">Message</label>
                    <textarea id="message" name="on1" class="form-control textarea" rows="5" placeholder="Share your message..."></textarea>
                    <input type="hidden" name="os1" id="paypalMessageValue">
                </div>

                <!-- reCAPTCHA v2 -->
                <div class="g-recaptcha mb-3" data-sitekey="6LeEN5QrAAAAABsIA2rdU59vRCShc2yaqRlidKDV" data-action="LOGIN"></div>

                <button type="submit" class="contact-btn">
                    <i class="fas fa-heart"></i>
                    Donate Now
                </button>
            </form>

        </div>
    </div>
</section>
<?php } ?>
<?php if(!empty($involvemaster['status']) && $involvemaster['status'] == 1) { ?>
<section class="ways-to-help py-5">
    <div class="container">
        <h2 class="section-title text-center mb-5">How You Can Get Involved</h2>
        <div class="row justify-content-center">


            <?php foreach ($involved_list as $key => $involved) { ?>

                <div class="col-md-6 col-lg-2 mb-4">
                    <a href="<?= base_url('contact') ?>" class="text-decoration-none">
                        <div class="way-card">
                            <div class="way-icon">
                                <i class="<?= $involved['web_icon'] ?>"></i>
                            </div>
                            <h5><?= $involved['web_title'] ?></h5>
                            <p><?= $involved['web_content'] ?></p>
                        </div>

                    </a>

                </div>


            <?php } ?>


        </div>
    </div>
</section>
<?php } ?>


<script>
    function validateDonationForm() {
        const fullName = document.getElementById("fullName").value.trim();
        const phone = document.getElementById("phone").value.trim();
        const email = document.getElementById("email").value.trim();
        const amount = document.getElementById("customAmount").value.trim();
        const message = document.getElementById("message").value.trim();

        // Check reCAPTCHA
        const recaptcha = grecaptcha.getResponse();
        if (recaptcha.length === 0) {
            alert("Please complete the reCAPTCHA.");
            return false;
        }

        // Validate fields
        if (!fullName || !phone || !email || !amount || parseFloat(amount) <= 0) {
            alert("Please fill out all required fields correctly.");
            return false;
        }

        // Assign message to hidden PayPal field
        document.getElementById("paypalMessageValue").value = message || "No message";

        return true;
    }
</script>


<?php include APPPATH . "/Views/frontent/common/footer.php"; ?> 