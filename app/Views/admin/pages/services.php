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
                <h3 class="page-title" style="padding-bottom:10px;">Services</h3>
            </div>

            <div class="box">
                <div class="box-header d-flex justify-content-between align-items-center">
                    <h4 class="box-title">Manage Services</h4>
                    <button class="btn btn-primary" id="addServiceBtn">Add Service</button>
                </div>

                <div class="box-body" id="serviceList">
                    <!-- Loaded via AJAX -->
                </div>
            </div>

        </div>
    </div>

    <?php include APPPATH . "/Views/admin/common/footer.php"; ?>
</div>

<!-- SERVICE MODAL -->
<div class="modal fade" id="serviceModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <form id="serviceForm">
                <div class="modal-header">
                    <h5><span class="modalMode">Add</span> Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="service_id" name="service_id">

                    <label>Title</label>
                    <input type="text" id="title" name="title" class="form-control" required>

                    <label class="mt-3">Content</label>
                    <textarea id="content" name="content" class="form-control" rows="4" placeholder="Service description"></textarea>

                    <!-- Active/Inactive inline toggle -->
                    <div style="display:flex; align-items:center; gap:16px; margin-top:16px;">
                        <span style="color:#6c757d;">Inactive</span>
                        <label style="position:relative; display:inline-block; width:50px; height:26px;">
                            <input type="checkbox" id="is_active" name="is_active" style="opacity:0; width:0; height:0;">
                            <span id="toggleTrack" style="position:absolute; cursor:pointer; top:0; left:0; right:0; bottom:0; background-color:#ccc; transition:.3s; border-radius:34px;"></span>
                            <span id="toggleThumb" style="position:absolute; height:20px; width:20px; left:3px; bottom:3px; background-color:white; transition:.3s; border-radius:50%;"></span>
                        </label>
                        <span style="color:#0d6efd; font-weight:600;">Active</span>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="saveServiceBtn">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
$(document).ready(function () {

    // Initial load
    loadServices();

    // Load services list
    function loadServices() {
        $("#serviceList").load("<?= base_url('admin/services/list') ?>");
    }

    // Open add modal
    $("#addServiceBtn").click(function () {
        $("#serviceForm")[0].reset();
        $("#service_id").val("");
        $(".modalMode").text("Add");
        // reset toggle visuals
        $("#toggleTrack").css("background-color", "#ccc");
        $("#toggleThumb").css("left", "3px");
        $("#serviceModal").modal("show");
    });

    // Inline toggle visuals in modal
    $("#is_active").change(function () {
        const isChecked = $(this).is(":checked");
        $("#toggleTrack").css("background-color", isChecked ? "#0d6efd" : "#ccc");
        $("#toggleThumb").css("left", isChecked ? "27px" : "3px");
    });

    // Save (create/update)
    $("#serviceForm").submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: "<?= base_url('admin/services/save') ?>",
            type: "POST",
            data: $("#serviceForm").serialize() + "&<?= csrf_token() ?>=<?= csrf_hash() ?>",
            dataType: "json",
            success: function (res) {
                if (res.status) {
                    $("#serviceModal").modal("hide");
                    loadServices();
                } else {
                    alert(res.message);
                }
            },
            error: function (xhr) {
                alert("Error: " + xhr.status + " " + xhr.statusText + "\n" + xhr.responseText);
            }
        });
    });

    // Edit service
    $(document).on("click", ".editService", function () {
        $("#service_id").val($(this).data("id"));
        $("#title").val($(this).data("title"));
        $("#content").val($(this).data("content"));

        // Set toggle state visually and checkbox
        const isActive = $(this).data("active") == 1;
        $("#is_active").prop("checked", isActive).trigger("change");

        $(".modalMode").text("Edit");
        $("#serviceModal").modal("show");
    });

    // Delete service
    $(document).on("click", ".deleteService", function () {
        if (!confirm("Delete this service?")) return;

        $.ajax({
            url: "<?= base_url('admin/services/delete') ?>",
            type: "POST",
            data: { service_id: $(this).data("id"), <?= csrf_token() ?>: "<?= csrf_hash() ?>" },
            dataType: "json",
            success: function (res) {
                if (res.status) {
                    loadServices();
                } else {
                    alert(res.message);
                }
            },
            error: function (xhr) {
                alert("Error: " + xhr.status + " " + xhr.statusText + "\n" + xhr.responseText);
            }
        });
    });

    // Toggle active from list
    $(document).on("change", ".toggleActive", function () {
        const id = $(this).data("id");
        const isActive = $(this).is(":checked") ? 1 : 0;
        const track = $(this).next("span");
        const thumb = $(this).nextAll("span").eq(1);

        // immediate visual feedback
        track.css("background-color", isActive ? "#0d6efd" : "#ccc");
        thumb.css("left", isActive ? "27px" : "3px");

        $.ajax({
            url: "<?= base_url('admin/services/toggle') ?>",
            type: "POST",
            data: { service_id: id, is_active: isActive, <?= csrf_token() ?>: "<?= csrf_hash() ?>" },
            dataType: "json",
            success: function (res) {
                if (!res.status) {
                    alert(res.message);
                }
            },
            error: function (xhr) {
                alert("Error: " + xhr.status + " " + xhr.statusText + "\n" + xhr.responseText);
            }
        });
    });

});
</script>

</body>
</html>
