<!DOCTYPE html>
<html lang="en">
    <?php include APPPATH . "/Views/admin/common/header.php"; ?>

    <body class="hold-transition light-skin sidebar-mini theme-primary fixed">

        <div class="wrapper">
            <div id="loader"></div>

            <?php include APPPATH . "/Views/admin/common/top.php"; ?>
            <?php include APPPATH . "/Views/admin/common/side_nav.php"; ?>
            <!-- Left side column. contains the logo and sidebar -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="me-auto">
                                <h3 class="page-title">Setting</h3>
                            </div>
                            <div>
                            </div>
                        </div>
                    </div>

                    <!-- Main content -->
                    <section class="content"> 
                        <div class="row">			  

                            <div class="col-lg-12 col-12">
                                <div class="box"> 
                                   <form class="form form-setting">

    <div class="box-body">

        <!-- 1️⃣ CONTACT NUMBER -->
        <h4 class="box-title text-primary mb-0"><i class="ti-mobile me-15"></i> Contact Number</h4>
        <hr class="my-15">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Phone Number 1</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                        <input type="text" name="contact_1" 
                               value="<?= $data['contact_1'] ?? '' ?>" 
                               class="form-control">
                    </div>
                </div>
            </div>

       

        <!-- 2️⃣ EMAIL IDs -->
        <h4 class="box-title text-primary mb-0"><i class="ti-email me-15"></i> Email IDs</h4>
        <hr class="my-15">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Email 1</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-at"></i></span>
                        <input type="email" name="email_1" 
                               value="<?= $data['email_1'] ?? '' ?>" 
                               class="form-control">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Email 2</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-at"></i></span>
                        <input type="email" name="email_2" 
                               value="<?= $data['email_2'] ?? '' ?>" 
                               class="form-control">
                    </div>
                </div>
            </div>
        </div>


        <!-- 3️⃣ ADDRESS SECTION -->
        <h4 class="box-title text-primary mb-0"><i class="ti-location-pin me-15"></i> Address</h4>
        <hr class="my-15">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Address Line 1</label>
                    <input type="text" name="address_1"
                           value="<?= $data['address_1'] ?? '' ?>" 
                           class="form-control mb-3">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Address Line 2</label>
                    <input type="text" name="address_2"
                           value="<?= $data['address_2'] ?? '' ?>" 
                           class="form-control mb-3">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Address Line 3</label>
                    <input type="text" name="address_3"
                           value="<?= $data['address_3'] ?? '' ?>" 
                           class="form-control mb-3">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label">Pincode</label>
                    <input type="text" name="pincode"
                           value="<?= $data['pincode'] ?? '' ?>" 
                           class="form-control mb-3">
                </div>
            </div>
        </div>


        <!-- 4️⃣ SOCIAL MEDIA (LAST) -->
        <h4 class="box-title text-primary mb-0"><i class="ti-world me-15"></i> Social Media</h4>
        <hr class="my-15">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Facebook</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-facebook"></i></span>
                        <input type="text" name="facebook_url"
                               value="<?= $data['facebook_url'] ?? '' ?>"
                               class="form-control">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">LinkedIn</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-linkedin"></i></span>
                        <input type="text" name="linkedin_url"
                               value="<?= $data['linkedin_url'] ?? '' ?>"
                               class="form-control">
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="box-footer text-end">
        <button type="submit" class="btn btn-primary">
            <i class="ti-save-alt"></i> Save
        </button>
    </div>

</form>

                                </div>
                                <!-- /.box -->			
                            </div>
                        </div>
                        <!-- /.row -->
                    </section>
                    <!-- /.content -->
                </div>
            </div>
            <!-- /.content-wrapper -->
            <?php include APPPATH . "/Views/admin/common/footer.php"; ?>
            <script src="<?= CSS_PATH ?>/js/pages/setting.js"></script>
        </body>
</html>