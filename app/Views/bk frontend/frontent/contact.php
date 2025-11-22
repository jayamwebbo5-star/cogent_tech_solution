<?php include APPPATH . "/Views/frontent/common/header.php"; ?>
<div class="breadcrumb-hero" style="background-image: url('<?=$menu['menu_image']?>');">
    <div class="breadcrumb-overlay"></div>
    <div class="container">
        <h1 class="page-title"><?=$menu['web_title']?></h1>
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?= base_url("") ?>">
                        <i class="fas fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="breadcrumb-item" aria-current="page"><?=$menu['web_title']?></li>
            </ol>
        </nav>
    </div>
</div>

<section class="contact-section py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Contact Information Column -->
            <div class="col-lg-5">
               <div class="contactpage-info">
                    <h2>Contact Information</h2>

                    <div class="info-item d-flex">
                        <i class="fas fa-map-marker-alt mt-1"></i>
                        <div>
                            <h3>Address</h3>
                            <p><?= $setting['address_1'] ?>, <br><?= $setting['address_2'] ?>,
                                <?= $setting['address_3'] ?> <?= $setting['pincode'] ?></p>
                        </div>
                    </div>
                    <?php if (!empty($setting['user_email'])) { ?>
                        <div class="info-item d-flex">
                            <i class="fas fa-envelope mt-1"></i>
                            <div>
                                <h3>Email</h3>
                                <p><?= $setting['user_email'] ?></p>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if (!empty($setting['user_phone_1'])) { ?>
                        <div class="info-item d-flex">
                            <i class="fas fa-phone mt-1"></i>
                            <div>
                                <h3>Phone</h3>
                                <p><?= $setting['user_phone_1'] ?></p>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if (!empty($setting['facebook_url']) || !empty($setting['instagram_url']) || !empty($setting['linkedin_url'])) { ?>
                        <div class="info-item d-flex">
                            <i class="fas fa-share-alt mt-1"></i>
                            <div>
                                <h3>Social Media</h3>
                                <div class="d-flex flex-row gap-3">
                                    <?php if (!empty($setting['facebook_url'])) { ?>
                                        <a href="<?= $setting['facebook_url'] ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    <?php } ?>
                                    <?php if (!empty($setting['instagram_url'])) { ?>
                                        <a href="<?= $setting['instagram_url'] ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                                    <?php } ?>
                                    <?php if (!empty($setting['linkedin_url'])) { ?>
                                        <a href="<?= $setting['linkedin_url'] ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <!-- Contact Form Column -->
            <div class="col-lg-7">
                <div class="contact-form">
                    <h2>Send Us a Message</h2>
                    <form action="<?= base_url('contact') ?>" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" name="firstname" id="firstName" required>
                            </div>
                            <div class="col-md-6">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="lastname" id="lastName" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" name="phone" id="phone">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">Your Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>

                        <div class="g-recaptcha mb-3" data-sitekey="6LeEN5QrAAAAABsIA2rdU59vRCShc2yaqRlidKDV" data-action="LOGIN"></div>

                        <button type="submit" name="submit" value="submit" class="contact-btn">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="map-section">
    <div class="container-fluid px-0">
        <div class="map-section">
            <!-- Google Maps Embed -->
            <iframe src="<?=$setting['map_url']?>"
                    width="100%"
                    height="100%" 
                    style="border:0;"
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $recaptcha_response = $_POST['g-recaptcha-response'];

    $secret_key = '6LeEN5QrAAAAABSQrZ_6_0jEyQKcBhIh9toMKitT'; //Get secrect key from recaptcha enterprise

    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$recaptcha_response");
    $response_data = json_decode($response);

    if ($response_data->success) {

        // Get form data
        $firstname = htmlspecialchars(trim($_POST['firstname']));
        $lastname = htmlspecialchars(trim($_POST['lastname']));
        $phone = htmlspecialchars(trim($_POST['phone']));
        $user_email = htmlspecialchars(trim($_POST['email']));
        $message = htmlspecialchars(trim($_POST['message']));

        // Optional: Combine name
        $name = $firstname . ' ' . $lastname;

        // Email details
        $email = 'agriflowinitiative.org/';
        $to = "venkatesan.rohit@agriflowinitiative.org";

        $subject = "New Enquiry - " . $name;

        $body = '<!DOCTYPE html>
            <html lang="en">
            <head>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <title>Enquiry details</title>
            </head>
            <body>
              <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
                    style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: "Open Sans", sans-serif;">
                    <tr>
                        <td>
            
                            <table style="background-color: #f2f3f8; max-width:670px; margin:0 auto;" width="100%" border="0"
                                align="center" cellpadding="0" cellspacing="0">
            
                                <!-- Logo -->
            
                                <tr>
                                    <td style="height:20px;">&nbsp;</td>
                                </tr>
                                <!-- Email Content -->
                                <tr>
                                    <td>
                                        <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                            style="max-width:670px; background:#fff; border-radius:3px;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);padding:0 40px;">
                                            <tr>
                                                <td style="height:40px;">&nbsp;</td>
                                            </tr>
                                            <!-- Title -->
                                            <tr>
                                                <td style="padding:0 15px; text-align:center;">
                                                    <h1 style="color:#1e1e2d; font-weight:400; margin:0;font-size:32px;font-family:"Rubik",sans-serif;">Enquiry Details</h1>
                                                    <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece;
                                                    width:100px;"></span>
                                                </td>
                                            </tr>
                                            <!-- Details Table -->
                                            <tr>
                                                <td>
                                                    <table cellpadding="0" cellspacing="0"
                                                        style="width: 100%; border: 1px solid #ededed">
                                                        <tbody>
                                                            <tr>
                                                                <td
                                                                    style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
                                                                    Name:</td>
                                                                <td
                                                                    style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                                                                    ' . $name . '</td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td
                                                                    style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
                                                                    Phone Number:</td>
                                                                <td
                                                                    style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                                                                    +91 ' . $phone . '</td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td
                                                                    style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
                                                                    Email:</td>
                                                                <td
                                                                    style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                                                                    ' . $user_email . '</td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td
                                                                    style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
                                                                    Message:</td>
                                                                <td
                                                                    style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                                                                    &nbsp;' . $message . '</td>
                                                            </tr>
            
                                                         
                                                            
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="height:40px;">&nbsp;</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:20px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;">
                                            <p style="font-size:14px; color:#455056bd; line-height:18px; margin:0 0 0;">&copy; <strong>Agriflow Initiative</strong></p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
              </table>
            </body>
            </html>';

        // Set content-type header for sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // Additional headers
        $headers .= 'From: <' . $email . '>' . "\r\n";  // Sender's email
        // Send email
        if (mail($to, $subject, $body, $headers)) {
            ?>
            <script>
                Swal.fire({

                    icon: "success",
                    title: "Your Enquiry received successfully",
                    // showConfirmButton: false,
                    // timer: 1500
                });
            </script>
            <?php
        } else {
            ?>
            <script>
                Swal.fire({
                    icon: "error",
                    title: "Failed Please try again",
                    // showConfirmButton: false,
                    // timer: 1500
                });
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            Swal.fire({
                icon: "warning",
                title: "Captcha is not verified, please verify captcha ",
                // showConfirmButton: false,
                // timer: 1500
            });
        </script>
        <?php
    }
}
?>

<?php include APPPATH . "/Views/frontent/common/footer.php"; ?>