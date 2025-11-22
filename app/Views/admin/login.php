<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <?php if (LOGO != "") { ?>
            <link rel="icon" href="<?= LOGO ?>">
        <?php } ?>
        <title><?= COMPANY ?> <?= isset($title) ? " - " . $title : "" ?> </title>
        <!-- Vendors Style-->
        <link rel="stylesheet" href="<?= CSS_PATH ?>/src/css/vendors_css.css">
        <!-- Style-->
        <link rel="stylesheet" href="<?= CSS_PATH ?>/src/css/style.css">
        <link rel="stylesheet" href="<?= CSS_PATH ?>/css/custom.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />


    </head>

    <body class="hold-transition theme-primary bg-img" style="background-image: url(<?= CSS_PATH ?>/images/login-bg.jpg);height: 100% !important;">

        <div class="container h-p100">
            <div class="row align-items-center justify-content-md-center h-p100">

                <div class="col-12 forgot-panel d-none">
                    <div class="row justify-content-center g-0">
                        <div class="col-lg-5 col-md-5 col-12">
                            <div class="bg-white rounded10 shadow-lg">
                                <div class="content-top-agile p-20 pb-0">
                                    <h2 class="text-primary fw-800">Forgot Password ?</h2>
                                    <p class="mb-0 text-fade">Enter your email to reset your password.</p>
                                </div>
                                <div class="p-40">
                                    <form data-current-state="1" data-validate class="forgot-form">
                                        <div class="form-group user_email  ">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text bg-transparent"><i class="fa fa-user text-fade"></i></span>
                                                <input type="email" name="user_email" class="form-control ps-15 bg-transparent" placeholder="Enter Email " required="" data-validation-required-message="This field is required" aria-invalid="false">
                                            </div>
                                        </div>

                                        <div class="form-group user_otp">
                                            <div class="input-group  mb-3">
                                                <input type="text" name="user_otp" minlength="6" maxlength="6" class="form-control ps-15 text-center" placeholder="OTP" data-validation-required-message="This field is required" aria-invalid="false">
                                            </div>
                                            <div class="text-end">
                                                <a class="text-success resetotp-btn">resent OTP ?</a>
                                            </div>

                                        </div>

                                        <div class="form-group user_password ">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text bg-transparent">
                                                    <i class="fa fa-key text-fade"></i>
                                                </span>
                                                <input type="password" name="pass_word" class="form-control ps-15 bg-transparent" placeholder="Password" data-validation-required-message="This field is required" aria-invalid="false">
                                                <span class="input-group-text bg-transparent toggle-password">
                                                    <i class="fas fa-eye text-fade" id="password_show"></i>
                                                </span>
                                            </div>
                                            <div class="help-block"></div>
                                        </div>

                                        <div class="row">

                                            <div class="col-12  d-flex justify-content-between">
                                                <button type="button" class="btn btn-danger go_to_login  mt-10">Back to Login</button>
                                                <button type="submit" class="btn btn-primary reset-pass-btn mt-10">Reset Password</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 login-panel">
                    <div class="row justify-content-center g-0">
                        <div class="col-lg-5 col-md-5 col-12">
                            <div class="bg-white rounded10 shadow-lg">
                                <div class="content-top-agile p-20 pb-0">
                                    <h2 class="text-primary fw-800"><?= COMPANY ?></h2>
                                    <p class="mb-0 text-fade">Sign in to continue</p>
                                </div>
                                <div class="p-40">
                                    <form data-validate action="" class="login-form">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text bg-transparent"><i class="fa fa-user text-fade"></i></span>
                                                <input type="text" name="user_email" class="form-control ps-15 bg-transparent" placeholder="User Id" required="" data-validation-required-message="This field is required" aria-invalid="false">
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text bg-transparent">
                                                    <i class="fa fa-key text-fade"></i>
                                                </span>
                                                <input type="password" name="user_password" class="form-control ps-15 bg-transparent" placeholder="Password" required="" data-validation-required-message="This field is required" aria-invalid="false">
                                                <span class="input-group-text bg-transparent toggle-password">
                                                    <i class="fas fa-eye text-fade" id="password_show"></i>
                                                </span>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                            </div>
                                            <!-- /.col  
                                            <div class="col-6">
                                                <div class="fog-pwd text-end">
                                                    <a href="javascript:void(0)" class="text-primary fw-500 hover-primary go_to_forgot"> Forgot pwd?</a><br>
                                                </div>
                                            </div>
                                           /.col -->
                                            <div class="col-12 text-center">
                                                <button type="submit" class="btn btn-primary w-p100 mt-10">SIGN IN</button>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Vendor JS -->
        <script src="<?= CSS_PATH ?>/src/js/vendors.min.js?t=<?= APP_VERSION ?>"></script> 
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="<?= CSS_PATH ?>/js/common.js?t=<?= APP_VERSION ?>"></script>
        <script src="<?= CSS_PATH ?>/js/login.js?t=<?= APP_VERSION ?>"></script>
        <script src="<?= CSS_PATH ?>/js/validation.js?t=<?= APP_VERSION ?>"></script>
        

    </body>

</html>