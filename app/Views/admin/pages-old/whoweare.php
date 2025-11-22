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

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label">Sub Title</label>
                                                                <div class="input-group mb-3">                                                           
                                                                    <input type="text" name="web_content_1" value="<?= $data['web_content_1'] ?>" class="form-control"  >
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label">Title</label>
                                                                <div class="input-group mb-3">                                                           
                                                                    <input type="text" name="web_content_2" value="<?= $data['web_content_2'] ?>" class="form-control"  >
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Content</label>
                                                                <div class="input-group mb-3">                                                          
                                                                    <textarea type="text" class="form-control" rows="5"  name="web_content_3"><?= $data['web_content_3'] ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div> 

                                                    </div>

                                                </div>


                                            </div>
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="row">

                                                         

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label">Step 1 Title</label>
                                                                <div class="input-group mb-3">                                                           
                                                                    <input type="text" name="web_content_4" value="<?= $data['web_content_4'] ?>" class="form-control"  >
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label">Step 1 count</label>
                                                                <div class="input-group mb-3">                                                           
                                                                    <input type="text" name="web_content_5" value="<?= $data['web_content_5'] ?>" class="form-control"  >
                                                                </div>
                                                            </div>
                                                        </div>



                                                    </div>

                                                </div>

                                                <div class="col-md-12">
                                                    <div class="row">

                                                         

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label">Step 2 Title</label>
                                                                <div class="input-group mb-3">                                                           
                                                                    <input type="text" name="web_content_6" value="<?= $data['web_content_6'] ?>" class="form-control"  >
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label">Step 2 count</label>
                                                                <div class="input-group mb-3">                                                           
                                                                    <input type="text" name="web_content_7" value="<?= $data['web_content_7'] ?>" class="form-control"  >
                                                                </div>
                                                            </div>
                                                        </div>



                                                    </div>

                                                </div>
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Image </label>
                                                            <div class="product-img text-start">
                                                                <div class="input-group  ">
                                                                    <input type="file" name="web_image_1"
                                                                           class="form-control" accept=".jpg,.jpeg,.png">
                                                                </div>
                                                                <div id="photo-msg" class=" text-danger"></div>
                                                                <img id="web_image" src="<?=$data['image']??''?>" height="120" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>



                                        </div> 
                                        <!-- /.box-body -->
                                        <div class="box-footer text-end">
                                            <input type="hidden" name="web_content_id" value="9">
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
            <script>
                $('textarea[name=web_content_3]').richText();
                // Image
                $("input[name=web_image]").on("change", function (event) {
                    const file = event.target.files[0];
                    const allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
                    const errorMsg = $("#photo-msg");
                    if (file) {
                        if (!allowedExtensions.test(file.name)) {
                            errorMsg.text("Invalid file type! Only jpg, jpeg, and png are allowed.");
                            $("#web_image").attr("src", "");
                            return;
                        }
                        // Clear error message and show preview
                        errorMsg.text("");
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            $("#web_image").attr("src", e.target.result);
                        };
                        reader.readAsDataURL(file);
                    } else {
                        $("#web_image").attr("src", "");
                        errorMsg.text("");
                    }
                });
            </script>

    </body>

</html>