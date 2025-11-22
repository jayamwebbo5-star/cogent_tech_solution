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
                                                            <div class="form-group">
                                                                <label class="form-label">Sub Title</label>
                                                                <div class="input-group mb-3">                                                           
                                                                    <input type="text" name="web_content_1" value="<?= $data['web_content_1'] ?>" class="form-control"  >
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
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




                                        </div>




                                        <!-- /.box-body -->
                                        <div class="box-footer text-end">
                                            <input type="hidden" name="web_content_id" value="7">
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
            <script>
                $("input[name=web_image_1]").on("change", function (event) {
                const file = event.target.files[0];
                        const allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
                        const errorMsg = $("#web_image_1_msg");
                        if (file) {
                if (!allowedExtensions.test(file.name)) {
                errorMsg.text("Invalid file type! Only jpg, jpeg, and png are allowed.");
                        $("#web_image_1").attr("src", "");
                        return;
                }
                // Clear error message and show preview
                errorMsg.text("");
                        const reader = new FileReader();
                        reader.onload = function (e) {
                        $("#web_image_1").attr("src", e.target.result);
                        };
                        reader.readAsDataURL(file);
                } else {
                $("#web_image_1").attr("src", "");
                        errorMsg.text("");
                }

                $("input[name=web_image_2]").on("change", function (event) {
                const file = event.target.files[0];
                        const allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
                        const errorMsg = $("#web_image_2_msg");
                        if (file) {
                if (!allowedExtensions.test(file.name)) {
                errorMsg.text("Invalid file type! Only jpg, jpeg, and png are allowed.");
                        $("#web_image_2").attr("src", "");
                        return;
                }
                // Clear error message and show preview
                errorMsg.text("");
                        const reader = new FileReader();
                        reader.onload = function (e) {
                        $("#web_image_2").attr("src", e.target.result);
                        };
                        reader.readAsDataURL(file);
                } else {
                $("#web_image_2").attr("src", "");
                        errorMsg.text("");
                }

                $("input[name=web_image_3]").on("change", function (event) {
                const file = event.target.files[0];
                        const allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
                        const errorMsg = $("#web_image_3_msg");
                        if (file) {
                if (!allowedExtensions.test(file.name)) {
                errorMsg.text("Invalid file type! Only jpg, jpeg, and png are allowed.");
                        $("#web_image_3").attr("src", "");
                        return;
                }
                // Clear error message and show preview
                errorMsg.text("");
                        const reader = new FileReader();
                        reader.onload = function (e) {
                        $("#web_image_3").attr("src", e.target.result);
                        };
                        reader.readAsDataURL(file);
                } else {
                $("#web_image_3").attr("src", "");
                        errorMsg.text("");
                }
                });
            </script>
    </body>

</html>