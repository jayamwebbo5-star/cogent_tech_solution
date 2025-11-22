<!DOCTYPE html>
<html lang="en">
    <?php include APPPATH . "/Views/admin/common/header.php"; ?>
    <link href="<?= CSS_PATH ?>/plugins/wysiwyag/richtext.min.css" rel="stylesheet" type="text/css"/>
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
                                    <form class="form form-content">
                                        <div class="box-body">


                                            <h4 class="box-title text-primary mb-0"><i class="ti-user me-15"></i>Terms & Conditions</h4>
                                            <hr class="my-15">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">                                                       
                                                        <div class="input-group mb-3">
                                                            <textarea type="text" name="web_content_1" value=" " class="form-control"  ><?= $data["web_content_1"] ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <br>
                                            <h4 class="box-title text-primary mb-0"><i class="ti-user me-15"></i>Privacy Policy</h4>
                                            <hr class="my-15">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">                                                       
                                                        <div class="input-group mb-3">
                                                            <textarea type="text" name="web_content_2" value=" " class="form-control"  ><?= $data["web_content_2"] ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <br>


                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer text-end">
                                            <input name="web_content_id" value="<?= $data["web_content_id"] ?>" type="hidden">
                                            <button type="submit" class="btn btn-primary" >
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
            <script src="<?= CSS_PATH ?>/js/pages/content.js"></script>
            <script src="<?= CSS_PATH ?>/plugins/wysiwyag/jquery.richtext.js"></script>
            <script>$(function (e) {
                    $('textarea[name=web_content_1]').richText();
                    $('textarea[name=web_content_2]').richText();

                });</script>
    </body>


</html>