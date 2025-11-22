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
                                <button data-pid="-1" class="btn btn-primary edit-servicetype"> <i class="fi fi-br-plus"></i>
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
                                            <table id="servicetype_table" class="text-fade table table-bordered display">

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="servicetype-modal" class="modal modal-right fade" tabindex="-1" role="dialog"
                                 aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                                <div class="modal-dialog modal-sm model_vs">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title"><span class="modal-name">Add</span>
                                                <?= isset($title) ? $title : "" ?></h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <form data-validate class="overflow-auto servicetype-form">
                                            <div class="modal-body">
                                                <div>
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <div class="form-group">
                                                                <label class="form-label">
                                                                    Title
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
                                                                <label class="form-label">
                                                                    Icon<span class="text-danger">*</span>
                                                                </label>
                                                                <div class="input-group">
                                                                    <input type="text" name="web_icon" placeholder=""
                                                                           class="form-control" required=""
                                                                           data-validation-required-message="This field is required"
                                                                           aria-invalid="false">
                                                                </div>
                                                                <i class='' id='web_icon_logo' style=" font-size: 20px; padding: 10px; "  alt=""></i>
                                                                <div class="help-block"></div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                   

                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <div class="form-group">
                                                                <label class="form-label">
                                                                    Display Order
                                                                </label>
                                                                <div class="input-group">
                                                                    <input type="text" name="display_order" placeholder=""
                                                                           class="form-control" required=""
                                                                           data-validation-required-message="This field is required"
                                                                           aria-invalid="false">
                                                                </div>
                                                                <div class="help-block"></div>
                                                                <div class="count-info text-start fs-6">Last Order  <span id="order_count"></span></div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer modal-footer-uniform w-100">
                                                    <input type="hidden" name="web_service_type_id" value="-1">
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
            <script src="<?= CSS_PATH ?>/js/pages/servicetype.js"></script>
    </body>

</html>