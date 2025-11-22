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
                                    <form class="form form-content">
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h4 class="box-title text-primary mb-0"><i class="ti-user me-15"></i> Section 1 [What We Do] </h4>
                                                            <hr class="my-15">  
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Sub Title</label>
                                                                <div class="input-group mb-3">                                                           
                                                                    <input type="text" name="web_content_1" value="<?=$data['web_content_1']?>" class="form-control"  >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Title</label>
                                                                <div class="input-group mb-3">                                                           
                                                                    <input type="text" name="web_content_2" value="<?=$data['web_content_2']?>" class="form-control"  >
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h4 class="box-title text-primary mb-0"><i class="ti-user me-15"></i> Section 2 [Work Process] </h4>
                                                            <hr class="my-15">  
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Sub Title</label>
                                                                <div class="input-group mb-3">                                                           
                                                                    <input type="text" name="web_content_3" value="<?=$data['web_content_3']?>" class="form-control"  >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Title</label>
                                                                <div class="input-group mb-3">                                                           
                                                                    <input type="text" name="web_content_4" value="<?=$data['web_content_4']?>" class="form-control"  >
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Content</label>
                                                                <div class="input-group mb-3">                                                          
                                                                    <textarea type="text" class="form-control" rows="5"  name="web_content_5"><?=$data['web_content_5']?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h4 class="box-title text-primary mb-0"><i class="ti-user me-15"></i> Section 3 [Team Members] </h4>
                                                            <hr class="my-15">  
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Sub Title</label>
                                                                <div class="input-group mb-3">                                                           
                                                                    <input type="text" name="web_content_6" value="<?=$data['web_content_6']?>" class="form-control"  >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Title</label>
                                                                <div class="input-group mb-3">                                                           
                                                                    <input type="text" name="web_content_7" value="<?=$data['web_content_7']?>" class="form-control"  >
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h4 class="box-title text-primary mb-0"><i class="ti-user me-15"></i> Section 4 [Who We Serve] </h4>
                                                            <hr class="my-15">  
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Sub Title</label>
                                                                <div class="input-group mb-3">                                                           
                                                                    <input type="text" name="web_content_8" value="<?=$data['web_content_8']?>" class="form-control"  >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Title</label>
                                                                <div class="input-group mb-3">                                                           
                                                                    <input type="text" name="web_content_9" value="<?=$data['web_content_9']?>" class="form-control"  >
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Content</label>
                                                                <div class="input-group mb-3">                                                          
                                                                    <textarea type="text" class="form-control" rows="5"  name="web_content_10"><?=$data['web_content_10']?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
 
                                        </div>
 
                                        <!-- /.box-body -->
                                        <div class="box-footer text-end">
                                            <input type="hidden" name="web_content_id" value="5">
                                            <button type="submit" class="btn btn-primary" fdprocessedid="7025s8j">
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
    </body>

</html>