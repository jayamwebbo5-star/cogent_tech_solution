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

                            <div class="col-lg-10 col-12">
                                <div class="box"> 
                                    <form class="form form-setting" >
                                        <div class="box-body">
                                            <br>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Logo Image </label>
                                                        <div class="product-img text-start">
                                                            <div class="input-group  ">
                                                                <input type="file" name="web_logo"
                                                                       class="form-control" accept=".jpg,.jpeg,.png">
                                                            </div>
                                                            <div id="logo-photo-msg" class=" text-danger"></div>
                                                            <img id="web_logo" src="<?= $data['web_logo'] ?>" height="120" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                          
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Header Image </label>
                                                        <div class="product-img text-start">
                                                            <div class="input-group  ">
                                                                <input type="file" name="web_banner"
                                                                       class="form-control" accept=".jpg,.jpeg,.png">
                                                            </div>
                                                            <div id="banner-photo-msg" class=" text-danger"></div>
                                                            <img id="web_banner" src="<?= $data['web_banner'] ?>" height="120" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">About Title</label>
                                                        <div class="input-group mb-3">                                                            
                                                            <input type="text" name="about_title" value="<?= $data['about_title'] ?>" class="form-control"  >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">About Content</label>
                                                        <div class="input-group mb-3">                                                             
                                                            <textarea type="text" name="about_content" rows="5" class="form-control"  ><?= $data['about_content'] ?> </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer text-end">

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
            <script src="<?= CSS_PATH ?>/js/pages/setting.js"></script>
    </body>

</html>