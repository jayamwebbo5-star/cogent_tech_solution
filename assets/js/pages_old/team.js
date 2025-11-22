var table_column = [
    {
        data: "serial_no",
        title: "S.No",
        is_default: true,
        dt: true,
        width: "30px",
    },
    {
        data: "user_name",
        className: "text-start",
        title: "Name",
        is_default: true,
        dt: true,
        width: "200px",
    },

    {
        data: "user_role",
        className: "text-start",
        title: "Role",
        is_default: true,
        dt: true,
        width: "100px",
    },

    {
        data: "web_image",
        width: "150px",
        className: "text-center",
        title: "Profile",
        is_default: false,
        dt: true,
        render: function (data, type, row) {
            return `
          <img width='50' src='${row['web_image']}'>`;
        },
    },

    {
        data: "display_order",
        title: "Display Order",
        is_default: true,
        dt: true,
        width: "70px",
    },

    {
        data: "is_active",
        width: "50px",
        className: "text-center",
        title: "Status",
        is_default: false,
        dt: true,
        render: function (data, type, row) {
            return `
          <div class="cus-toggle">
            <label>Inactive</label>
            <label class="cus-switch">
              <input type="checkbox" ${data == 1 ? "checked" : ""} data-pid="${
                    row["web_team_id"]
                    }" class="team_status" >
              <span class="cus-slider round"></span>
            </label>
            <label>Active</label>
          </div>`;
        },
    },
    {
        data: "web_team_id",
        width: "200px",
        className: "text-center my-btn position-relative",
        title: "Action",
        render: function (data, type, row) {
            return `      
      <button data-pid="${row["web_team_id"]}" class="waves-effect waves-light btn btn-primary-light btn-sm edit-team" type="button" ><i class="fi fi-sr-attribution-pencil"></i> Edit</button>
          <button data-pid="${row["web_team_id"]}" class="waves-effect waves-light btn btn-danger-light btn-sm del-team " type="button" ><i class="fi fi-sr-trash"></i> Delete</button>
      `;
        },
    },
];

var dt = {
    table: "#team_table",
    column: table_column,
    url: "getTeam",
};

var k = common.dataTable(dt);


// Add and Edit
$(document).on("click", ".edit-team", function () {
    var vbk = "show";
    $(".team-form")[0].reset();
    $("#web_image").attr("src", "");
    var pid = $(this).data("pid");
    $(".modal-name").text(pid > 0 ? "Edit" : "Add");
    $(".team-form input[name=web_team_id]").val(pid);
    var result = common.ajax_fech("getTeam", {web_team_id: pid});
    let last_count = (pid > 0) ? Number(result["last_count"]) : (Number(result["last_count"]) + 1);
    $("#order_count").text(last_count);
    $(".team-form input[name=display_order]").data('last_count', last_count).val(last_count);

    if (pid > 0) {
        if (result["code"] == 200 && result["data"].length != 0) {
            $(".team-form input[name=web_team_id]").val(
                    result["data"][0]["web_team_id"]
                    );
            $(".team-form input[name=user_name]").val(
                    result["data"][0]["user_name"]
                    );

            $(".team-form input[name=user_role]").val(
                    result["data"][0]["user_role"]
                    );

            $(".team-form input[name=x_url]").val(
                    result["data"][0]["x_url"]
                    );

            $(".team-form input[name=linkedin_url]").val(
                    result["data"][0]["linkedin_url"]
                    );

            $(".team-form input[name=facebook_url]").val(
                    result["data"][0]["facebook_url"]
                    );

            $(".team-form input[name=display_order]").val(
                    result["data"][0]["display_order"]
                    );
            $("#web_image").attr("src", result["data"][0]["web_image"]);
        } else {
            vbk = "hide";
            Swal2("error", "Something Error", "Try Some again time");
        }
    }
    $("#team-modal").modal(vbk);
});

// From Submit
$(".team-form").on("submit", function (event) {
    event.preventDefault(); // Prevent default form submission
    // Submit the form via AJAX if validation passes
    const formData = new FormData(this);
    formData.append("for", "edit");
    common
            .ajax_save_file("saveTeam", formData)
            .then(function (response) {
                if (response.code == 200) {
                    reloadDataTable(k);
                    Swal2("success", "Success", "Successfully User Saved").then(() => {
                        $("#team-modal").modal("hide");
                    });
                } else {
                    Swal2("error", "Something Error", response.message);
                }
            })
            .catch(function (error) {
                reloadDataTable(k);
                Swal2("error", "Something Error", "Try Some again time");
            });
});

// Delete
$(document).on("click", ".del-team", function () {
    var pid = $(this).data("pid");
    var update_data = {
        web_team_id: pid,
        is_deleted: 1,
        for : "delete",
    };

    swal
            .fire({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#fec801",
                confirmButtonText: "Yes, delete it!",
            })
            .then((result) => {
                if (result.isConfirmed) {
                    common
                            .ajax_save("saveTeam", update_data)
                            .then(function (response) {
                                if (response.code == 200) {
                                    reloadDataTable(k, true);
                                    Swal2("success", "Deleted!", "Successfully deleted");
                                } else {
                                    Swal2("error", "Something Error", response.message);
                                }
                            })
                            .catch(function (error) {
                                reloadDataTable(k);
                                console.error("Error:", error);
                                Swal2("error", "Something Error", "Try Some again time");
                            });
                }
            });
});

//status update
$(document).on("change", ".team_status", function () {
    var pid = $(this).data("pid");
    var update_data = {
        web_team_id: pid,
        for : "status",
        is_active: $(this).prop("checked") ? 1 : 0,
    };

    common
            .ajax_save("saveTeam", update_data)
            .then(function (response) {
                reloadDataTable(k);
                if (response.code == 200) {
                    Swal2("success", "Success", "Successfully Status Updated");
                } else {
                    Swal2("error", "Failed", "Please Try Again");
                }
            })
            .catch(function (error) {
                reloadDataTable(k);
                Swal2("error", "Something Error", "Please Try Again");
            });
});

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

$('.team-form input[name=display_order]').on('input', function () {
    let val = $(this).val().replace(/\D/g, ''); // remove non-digits
    let last_count = $(this).data('last_count');
    // Convert to number
    val = parseInt(val, 10);

    // Validate range
    if (val > last_count)
        val = last_count;
    if (val < 1 || isNaN(val))
        val = '';

    $(this).val(val);
});