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
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">

                                                         

                                                        <div class="col-md-10">
                                                            <div class="form-group">
                                                                <label class="form-label">Title</label>
                                                                <div class="input-group mb-3">                                                           
                                                                    <input type="text" name="web_content_1" value="<?= $data['web_content_1'] ?>" class="form-control"  >
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-10">
                                                            <div class="form-group">
                                                                <label class="form-label">Content</label>
                                                                <div class="input-group mb-3">                                                          
                                                                    <textarea type="text" class="form-control" rows="5"  name="web_content_2"><?= $data['web_content_2'] ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div> 

                                                    </div>

                                                </div>


                                            </div>
                                            



                                        </div> 
                                        <!-- /.box-body -->
                                        <div class="box-footer text-end">
                                            <input type="hidden" name="web_content_id" value="<?= $data['web_content_id'] ?>">
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
            <script src="<?= CSS_PATH ?>/plugins/wysiwyag/jquery.richtext.js"></script>
            <?php if(($data['richText']??0) == 1){?>
            <script>
                $('textarea[name=web_content_2]').richText();
                 
            </script>
            <?php } ?>
    </body>

</html>