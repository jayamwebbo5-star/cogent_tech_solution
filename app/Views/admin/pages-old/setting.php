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
                                <h3 class="page-title"> <?= isset($title) ? $title : "" ?></h3>

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


                                            <h4 class="box-title text-primary mb-0"><i class="ti-user me-15"></i> Content Email</h4>
                                            <hr class="my-15">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Email</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text"><i class="bi bi-at"></i></span>
                                                            <input type="text" name="user_email" value="<?= $data['user_email'] ?? '' ?>" class="form-control"  >
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Phone</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text"><i class="bi bi-phone"></i></span>
                                                            <input type="text" name="user_phone_1" value="<?= $data['user_phone_1'] ?? '' ?>" class="form-control"  >
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <br>

                                            <?php if (false) { ?>



                                                <h4 class="box-title text-primary mb-0"><i class="ti-user me-15"></i> Social Media</h4>
                                                <hr class="my-15">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Facebook</label>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text"><i class="bi bi-facebook"></i></span>
                                                                <input type="text" name="facebook_url"  value="<?= $data['facebook_url'] ?? '' ?>" class="form-control"  >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="form-group">
                                                                <label class="form-label">Twitter</label>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text"><i class="bi bi-twitter"></i></span>
                                                                    <input type="text" name="x_url"  value="<?= $data['x_url'] ?? '' ?>" class="form-control"  >
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Instagram</label>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text"><i class="bi bi-instagram"></i></span>
                                                                <input type="text"  name="instagram_url"  value="<?= $data['instagram_url'] ?? '' ?>" class="form-control"  >
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Linkedin </label>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text"><i class="bi bi-linkedin"></i></span>
                                                                <input type="text" class="form-control"  value="<?= $data['linkedin_url'] ?? '' ?>" name="linkedin_url" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Youtube</label>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text"><i class="bi bi-youtube"></i></span>
                                                                <input type="text" class="form-control" value="<?= $data['youtube_url'] ?? '' ?>"  name="youtube_url">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            <?php } ?>
                                            <h4 class="box-title text-primary mb-0"><i class="ti-user me-15"></i>Address</h4>
                                            <hr class="my-15">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Address Line 1</label>
                                                        <div class="input-group mb-3">

                                                            <input type="text" name="address_1"  value="<?= $data['address_1'] ?? '' ?>" class="form-control"  >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label class="form-label">Address Line 2</label>
                                                            <div class="input-group mb-3">

                                                                <input type="text" name="address_2"  value="<?= $data['address_2'] ?? '' ?>" class="form-control"  >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Address Line 3 </label>
                                                        <div class="input-group mb-3">

                                                            <input type="text" class="form-control"  value="<?= $data['address_3'] ?? '' ?>" name="address_3" >
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Pincode</label>
                                                        <div class="input-group mb-3">

                                                            <input type="text" class="form-control" value="<?= $data['pincode'] ?? '' ?>"  name="pincode">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-md-6">
                                                    <h4 class="box-title text-primary mb-0"><i class="ti-user me-15"></i>Footer Content</h4>
                                                    <hr class="my-15">
                                                    <div class="form-group">
                                                        <label class="form-label">Content</label>
                                                        <div class="input-group mb-3">                                                          
                                                            <textarea type="text" class="form-control" rows="5"  name="about_content"><?= $data['about_content'] ?? '' ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <h4 class="box-title text-primary mb-0"><i class="ti-user me-15"></i>Contact Us</h4>
                                                    <hr class="my-15">
                                                    <div class="form-group">
                                                        <label class="form-label">Map URL</label>
                                                        <div class="input-group mb-3">

                                                            <input type="text" class="form-control" value="<?= $data['map_url'] ?? '' ?>"  name="map_url">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer text-end">

                                            <button type="submit" class="btn btn-primary"  >
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