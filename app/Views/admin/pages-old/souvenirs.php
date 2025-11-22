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
                                <button data-pid="-1" class="btn btn-primary edit-souvenirs"> <i class="fi fi-br-plus"></i>
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
                                            <table id="souvenirs_table" class="text-fade table table-bordered display">

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="souvenirs-modal" class="modal modal-right fade" tabindex="-1" role="dialog"
                                 aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                                <div class="modal-dialog modal-sm model_vs">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title"><span class="modal-name">Add</span>
                                                <?= isset($title) ? $title : "" ?></h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <form data-validate class="overflow-auto souvenirs-form">
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

                                                        <div class="col-md-10">
                                                            <div class="form-group">
                                                                <label class="form-label">URL </label>
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
                                                                <label class="form-label">Content</label>
                                                                <div class="input-group mb-3">
                                                                    <textarea class="form-control text-counter"
                                                                              name="web_content" maxlength="5000"
                                                                              rows="3"></textarea>
                                                                </div>
                                                                <div class="count-info"></div>
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

                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <div class="form-group">
                                                                <label class="form-label">
                                                                    Display Order<span class="text-danger">*</span>
                                                                </label>
                                                                <div class="input-group">
                                                                    <input type="text" name="display_order" placeholder=""
                                                                           class="form-control" required=""
                                                                           data-validation-required-message="This field is required"
                                                                           aria-invalid="false">
                                                                </div>
                                                                <div class="help-block"></div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer modal-footer-uniform w-100">
                                                <input type="hidden" name="web_souvenirs_id" value="-1">
                                                <button type="button" class="btn btn-primary-light"
                                                        data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>


                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->



                        </div>
                        <!-- /.row -->
                    </section>
                    <!-- /.content -->



                </div>
            </div>

            <!-- /.content-wrapper -->
            <?php include APPPATH . "/Views/admin/common/footer.php"; ?>
            <script src="<?= CSS_PATH ?>/js/pages/souvenirs.js"></script>
    </body>

</html>