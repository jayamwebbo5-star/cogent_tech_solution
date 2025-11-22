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
                                <button data-pid="-1" class="btn btn-primary edit-careerlist"> <i class="fi fi-br-plus"></i>
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
                                            <table id="careerlist_table" class="text-fade table table-bordered display">

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="careerlist-modal" class="modal modal-right fade" tabindex="-1" role="dialog"
                                 aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                                <div class="modal-dialog modal-sm model_vs">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title"><span class="modal-name">Add</span>
                                                <?= isset($title) ? $title : "" ?></h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <form data-validate class="overflow-auto careerlist-form">
                                            <div class="modal-body">
                                                <div>
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <div class="form-group">
                                                                <label class="form-label">
                                                                    Job Title
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
                                                        
                                                         <div class="col-md-10">
                                                            <div class="form-group">
                                                                <label class="form-label">
                                                                    Job Code
                                                                </label>
                                                                <div class="input-group">
                                                                    <input type="text" name="job_code" placeholder=""
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
                                                                <label class="form-label">Content</label>
                                                                <div class="input-group mb-3">
                                                                    <textarea class="form-control text-counter"
                                                                              name="job_description" maxlength="5000"
                                                                              rows="3" required=""></textarea>
                                                                </div>
                                                                <div class="count-info"></div>
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="col-md-10">
                                                            <div class="form-group">
                                                                <label class="form-label">
                                                                    No. of Positions
                                                                </label>
                                                                <div class="input-group">
                                                                    <input type="text" name="job_count" placeholder=""
                                                                           class="form-control" required=""
                                                                           data-validation-required-message="This field is required"
                                                                           aria-invalid="false">
                                                                </div>
                                                                <div class="help-block"></div>
                                                            </div>

                                                        </div>
                                                        
                                                        <div class="col-md-10">
                                                            <div class="form-group">
                                                                <label class="form-label">
                                                                    Experience
                                                                </label>
                                                                <div class="input-group">
                                                                    <input type="text" name="job_experience" placeholder=""
                                                                           class="form-control" required=""
                                                                           data-validation-required-message="This field is required"
                                                                           aria-invalid="false">
                                                                </div>
                                                                <div class="help-block"></div>
                                                            </div>

                                                        </div>
                                                        
                                                        <div class="col-md-10">
                                                            <div class="form-group">
                                                                <label class="form-label">
                                                                    Location
                                                                </label>
                                                                <div class="input-group">
                                                                    <input type="text" name="job_location" placeholder=""
                                                                           class="form-control" required=""
                                                                           data-validation-required-message="This field is required"
                                                                           aria-invalid="false">
                                                                </div>
                                                                <div class="help-block"></div>
                                                            </div>

                                                        </div>
                                                        
                                                         <div class="col-md-10">
                                                            <div class="form-group">
                                                                <label class="form-label">
                                                                    Work Mode
                                                                </label>
                                                                <div class="input-group">
                                                                    <input type="text" name="job_work_mode" placeholder=""
                                                                           class="form-control" required=""
                                                                           data-validation-required-message="This field is required"
                                                                           aria-invalid="false">
                                                                </div>
                                                                <div class="help-block"></div>
                                                            </div>
              
                                                        </div>
                                                        
                                                         <div class="col-md-10">
                                                            <div class="form-group">
                                                                <label class="form-label">
                                                                    Duration
                                                                </label>
                                                                <div class="input-group">
                                                                    <input type="text" name="job_duration" placeholder=""
                                                                           class="form-control" required=""
                                                                           data-validation-required-message="This field is required"
                                                                           aria-invalid="false">
                                                                </div>
                                                                <div class="help-block"></div>
                                                            </div>
                                         
                                                        </div>
                                                        
                                                        <div class="col-md-10">
                                                            <div class="form-group">
                                                                <label class="form-label">
                                                                    Shift Timings
                                                                </label>
                                                                <div class="input-group">
                                                                    <input type="text" name="job_time" placeholder=""
                                                                           class="form-control" required=""
                                                                           data-validation-required-message="This field is required"
                                                                           aria-invalid="false">
                                                                </div>
                                                                <div class="help-block"></div>
                                                            </div>

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
                                                <input type="hidden" name="web_career_id" value="-1">
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
            <script src="<?= CSS_PATH ?>/js/pages/careerlist.js"></script>
    </body>

</html>