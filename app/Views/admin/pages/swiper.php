<!DOCTYPE html>
<html lang="en">

<?php include APPPATH . "/Views/admin/common/header.php"; ?>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">

<div class="wrapper">

    <?php include APPPATH . "/Views/admin/common/top.php"; ?>
    <?php include APPPATH . "/Views/admin/common/side_nav.php"; ?>

    <div class="content-wrapper">
        <div class="container-full">

            <div class="content-header">
                <h3 class="page-title"
                 style="padding-bottom:10px;">Swiper Slides</h3>
            </div>

            <!-- VIDEO SECTION -->
            <div class="box">
                <div class="box-header d-flex justify-content-between align-items-center">
                    <h4 class="box-title">Video Link</h4>
                    <button class="btn btn-primary" id="editVideoBtn">Edit Video</button>
                </div>
                <div class="box-body" id="videoPreview">
                    <!-- Loaded via AJAX -->
                </div>
            </div>

            <!-- SLIDES SECTION -->
            <div class="box mt-4">
                <div class="box-header d-flex justify-content-between align-items-center">
                    <h4 class="box-title">Slides</h4>
                    <button class="btn btn-primary" id="addSlideBtn">Add Slide</button>
                </div>

             <div class="box">
    <div class="box-header">
        <h4 class="box-title">Slides Preview</h4>
    </div>
    <div class="box-body" id="slidePreview">
        <!-- Loaded via AJAX -->
    </div>
</div>

            </div>

        </div>
    </div>

    <?php include APPPATH . "/Views/admin/common/footer.php"; ?>

</div>

<!-- SLIDE MODAL -->
<div class="modal fade" id="slideModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <form id="slideForm">

                <div class="modal-header">
                    <h5><span class="modalMode">Add</span> Slide</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                

                <div class="modal-body">
                    <input type="hidden" id="slide_id" name="slide_id">

                    <label>Slide Title</label>
                    <input type="text" id="slide_title" name="slide_title" class="form-control" required>

                    <label class="mt-3">Slide Subtitle</label>
                    <input type="text" id="slide_subtitle" name="slide_subtitle" class="form-control">
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
                </div>

            </form>

        </div>
    </div>
</div>

<!-- VIDEO MODAL -->
<div class="modal fade" id="videoModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <form id="videoForm">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Video Link</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <label for="video_link_input" style="font-weight: 500;">Video URL</label>
                    <input type="url" id="video_link_input" name="video_link" class="form-control" required>

                    <!-- Toggle Switch Styled Like Your Image -->
                    <div style="display: flex; align-items: center; justify-content: center; gap: 20px; margin-top: 20px;">
                        <span style="color: #6c757d;">Inactive</span>

                        <label style="position: relative; display: inline-block; width: 50px; height: 26px;">
                            <input type="checkbox" id="is_active" name="is_active"
                                   style="opacity: 0; width: 0; height: 0;">
                            <span style="
                                position: absolute;
                                cursor: pointer;
                                top: 0; left: 0;
                                right: 0; bottom: 0;
                                background-color: #ccc;
                                transition: .4s;
                                border-radius: 34px;
                            "></span>
                            <span style="
                                position: absolute;
                                content: '';
                                height: 20px;
                                width: 20px;
                                left: 3px;
                                bottom: 3px;
                                background-color: white;
                                transition: .4s;
                                border-radius: 50%;
                            "></span>
                        </label>

                        <span style="color: #0d6efd; font-weight: 600;">Active</span>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Save</button>
                </div>

            </form>

        </div>
    </div>
</div>


<script>
$(document).ready(function () {

    loadSlides();
    loadVideo();

 $("#is_active").change(function () {
    const slider = $(this).nextAll("span").eq(1); // the round thumb
    const track = $(this).next("span"); // the background

    if ($(this).is(":checked")) {
        track.css("background-color", "#0d6efd");
        slider.css("left", "27px");
    } else {
        track.css("background-color", "#ccc");
        slider.css("left", "3px");
    }
});


  function loadSlides() {
    $("#slidePreview").load("<?= base_url('admin/slides/list') ?>");
}


    function loadVideo() {
        $("#videoPreview").load("<?= base_url('admin/slides/videoPreview') ?>");
    }

    $("#addSlideBtn").click(function () {
        $("#slideForm")[0].reset();
        $("#slide_id").val("");
        $(".modalMode").text("Add");
        $("#slideModal").modal("show");
    });

    $("#slideForm").submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: "<?= base_url('admin/slides/save') ?>",
            type: "POST",
            data: $("#slideForm").serialize(),
            dataType: "json",
            success: function (res) {
                if (res.status) {
                    $("#slideModal").modal("hide");
                    loadSlides();
                } else {
                    alert(res.message);
                }
            },
            error: function () {
                alert("Request failed!");
            }
        });
    });

    $(document).on("click", ".editSlide", function () {
        $("#slide_id").val($(this).data("id"));
        $("#slide_title").val($(this).data("title"));
        $("#slide_subtitle").val($(this).data("subtitle"));

        $(".modalMode").text("Edit");
        $("#slideModal").modal("show");
    });

    $(document).on("click", ".deleteSlide", function () {
        if (!confirm("Delete this slide?")) return;

        $.post("<?= base_url('admin/slides/delete') ?>",
            { slide_id: $(this).data("id") },
            function (res) {
                loadSlides();
            }, "json"
        );
    });

    $("#editVideoBtn").click(function () {
        $("#videoModal").modal("show");
    });

    

    $("#videoForm").submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: "<?= base_url('admin/slides/saveVideo') ?>",
            type: "POST",
            data: $("#videoForm").serialize(),
            dataType: "json",
            success: function (res) {
                if (res.status) {
                    $("#videoModal").modal("hide");
                    loadVideo();
                } else {
                    alert(res.message);
                }
            },
            error: function () {
                alert("Video update failed!");
            }
        });
    });

});


</script>

</body>
</html>
