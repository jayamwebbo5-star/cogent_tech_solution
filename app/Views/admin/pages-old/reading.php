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
                        <div class="d-flex flex-wrap align-items-center justify-content-between">

                            <!-- Title -->
                            <div class="col-3 order-1 order-md-1">
                                <h3 class="page-title"><?= isset($title) ? $title : "" ?></h3>
                            </div>

                            <!-- Centered Form -->
                            <div class=" col-6 mx-auto order-3 order-md-2 my-2 my-md-0">
                                <form class="row gx-2 heading-form">
                                    <div class="col-12 col-md-6 mb-2 mb-md-0">
                                        <input class="form-control" name="web_title" value="<?= $heading['web_title'] ?>" placeholder="Enter title">
                                        <input class="form-control" name="web_headline_id" value="<?= $heading['web_headline_id'] ?>" type='hidden' >
                                    </div>
                                    <div class="col-3">
                                        <button type="submit" class="btn btn-primary w-100">Save Title</button>
                                    </div>
                                </form>
                            </div>

                            <!-- Add Button -->
                            <div class="col-3 order-2 order-md-3 text-end">                               
                                <button data-pid="-1" class="btn btn-primary edit-reading"> <i class="fi fi-br-plus"></i>
                                    Add <?= isset($title) ? $title : "" ?></button>
                            </div>

                        </div>
                    </div>

                    <!-- Main content -->
                    <section class="content">
                        <div class="row">

                            <div class="col-12">
                                <div class="box">
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table id="reading_table" class="text-fade table table-bordered display">

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="reading-modal" class="modal modal-right fade" tabindex="-1" role="dialog"
                                 aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                                <div class="modal-dialog modal-sm model_vs">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title"><span class="modal-name">Add</span>
                                                <?= isset($title) ? $title : "" ?></h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <form data-validate class="overflow-auto reading-form">
                                            <div class="modal-body">
                                                <div>
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <div class="form-group">
                                                                <label class="form-label">
                                                                    Title<span class="text-danger">*</span>
                                                                </label>
                                                                <div class="input-group">
                                                                    <input type="text" name="web_title" placeholder=""
                                                                           class="form-control" required=""
                                                                           data-validation-required-message="This field is required"
                                                                           aria-invalid="false">
                                                                </div>
                                                                <div class="help-block"></div>
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label class="form-label">Category <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="input-group mb-3">
                                                                    <select class="form-control" name="m_blog_category_id"
                                                                            aria-invalid="false" required>
                                                                    </select>
                                                                    <div class="invalid-feedback">Select Category</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label class="form-label"> Writer Name <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="input-group mb-3">
                                                                    <select class="form-control" name="book_writer_id"
                                                                            aria-invalid="false" required>
                                                                    </select>
                                                                    <div class="invalid-feedback">Select Writer</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-10">
                                                            <div class="form-group">
                                                                <label class="form-label">Content</label>
                                                                <div class="input-group mb-3">
                                                                    <textarea class="form-control text-counter"
                                                                              name="web_content" maxlength="200"
                                                                              rows="3"></textarea>
                                                                </div>
                                                                <div class="count-info"></div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <div class="form-group">
                                                                <label class="form-label">Link </label>
                                                                <div class="input-group mb-3">

                                                                    <input type="text" name="web_url" class="form-control"
                                                                           data-validation-required-message="This field is required"
                                                                           aria-invalid="false">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <div class="form-group">
                                                                <label class="form-label">Photo </label>
                                                                <div class="product-img text-start">
                                                                    <div class="input-group  ">
                                                                        <input type="file" name="web_image"
                                                                               class="form-control" accept=".jpg,.jpeg,.png">
                                                                    </div>
                                                                    <div id="photo-msg" class=" text-danger"></div>
                                                                    <img id="web_image" src="" height="120" alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer modal-footer-uniform w-100">
                                                <input type="hidden" name="web_reading_id" value="-1">
                                                <button type="button" class="btn btn-primary-light"
                                                        data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>


                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

                            <!-- Reset Password -->
                            <div id="user-reset-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-top">
                                    <div class="modal-content">
                                        <form data-validate class="overflow-auto user-reset-form">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="topModalLabel">Reset Password</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-hidden="true"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="form-label">Password <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                                        <input type="text" name="pass_word" class="form-control"
                                                               aria-invalid="false" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="user_login_id">
                                                <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Change Password</button>
                                            </div>
                                        </form>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>

                            <!-- View -->
                            <div id="user-profile-modal" class="modal user-profile-modal fade" tabindex="-1" role="dialog"
                                 aria-hidden="true">
                                <div class="modal-dialog ">
                                    <div class="modal-content min-vh-60">
                                        <div class="card-block">
                                            <div class="d-flex justify-content-between p-3 align-items-center">
                                                <div></div>
                                                <h3 class="m-b-20 p-b-5 b-b-default f-w-600 text-primary">User Details</h3>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-hidden="true"></button>
                                            </div>
                                            <div class="row px-3 text-center">
                                                <div class="col-4">
                                                    <div class="profile-img">
                                                        <h2 class="vp_user_logo_text"></h2>
                                                        <img class="vp_photo_file d-none" src="">
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label>First Name</label>
                                                            <p class="vp_user_name"></p>
                                                        </div>
                                                        <div class="col-6">
                                                            <label>Last Name</label>
                                                            <p class="vp_user_last_name"></p>
                                                        </div>
                                                        <div class="col-6">
                                                            <label>User Type</label>
                                                            <p class="vp_user_type"></p>
                                                        </div>
                                                        <div class="col-6">
                                                            <label>User ID</label>
                                                            <p class="vp_user_loginid"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row" style="padding: 20px 40px;">
                                                <div class="col-6">
                                                    <label>Email</label>
                                                    <p class="vp_user_email"></p>
                                                </div>
                                                <div class="col-6">
                                                    <label>Phone No</label>
                                                    <p class="vp_phone_number"></p>
                                                </div>
                                                <div class="col-6">
                                                    <label>Created By</label>
                                                    <p class="vp_created_by_name"></p>
                                                </div>
                                                <div class="col-6">
                                                    <label>Created On</label>
                                                    <p class="vp_created_on_text"></p>
                                                </div>
                                                <div class="col-6">
                                                    <label>Updated By</label>
                                                    <p class="vp_updated_by_name"></p>
                                                </div>
                                                <div class="col-6">
                                                    <label>Updated On</label>
                                                    <p class="vp_updated_on_text"></p>
                                                </div>
                                            </div>
                                        </div>



                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>

                        </div>
                        <!-- /.row -->
                    </section>
                    <!-- /.content -->

                    <div class="dt-content">
                        <div class="dt-header">
                            <p class="dt-show-btn">select additional data to be displayed</p>
                        </div>
                        <div class="dt-body  ">
                            <div class="d-flex flex-wrap dt-table-column">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- /.content-wrapper -->
            <?php include APPPATH . "/Views/admin/common/footer.php"; ?>
            <script src="<?= CSS_PATH ?>/js/pages/reading.js"></script>
    </body>

</html>