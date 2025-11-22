var table_column = [
    {
        data: "serial_no",
        title: "S.No",
        is_default: true,
        dt: true,
        width: "30px",
    },
    {
        data: "web_title",
        title: "Title",
        is_default: true,
        dt: true,
        width: "200px",
    },
     {
        data: "menu_name",
        title: "Menu Name",
        is_default: true,
        dt: true,
        width: "200px",
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
                    row["web_tab_id"]
                    }" class="tab_status" >
              <span class="cus-slider round"></span>
            </label>
            <label>Active</label>
          </div>`;
        },
    },
    {
        data: "web_tab_id",
        width: "200px",
        className: "text-center my-btn position-relative",
        title: "Action",
        render: function (data, type, row) {
            return `      
      <button data-pid="${row["web_tab_id"]}" class="waves-effect waves-light btn btn-primary-light btn-sm edit-tab" type="button" ><i class="fi fi-sr-attribution-pencil"></i> Edit</button>
          <button data-pid="${row["web_tab_id"]}" class="waves-effect waves-light btn btn-danger-light btn-sm del-tab " type="button" ><i class="fi fi-sr-trash"></i> Delete</button>
      `;
        },
    },
];

var dt = {
    table: "#tab_table",
    column: table_column,
    url: "getTab",
};

var k = common.dataTable(dt);

let selectLabel = [
    {label: "web_menu_id", url: "getMenu"}
];

// Add and Edit
$(document).on("click", ".edit-tab", async function () {
    var vbk = "show";
    $(".tab-form")[0].reset();
    $("#web_image").attr("src", "");
    var pid = $(this).data("pid");
    $(".modal-name").text(pid > 0 ? "Edit" : "Add");
    $(".tab-form input[name=web_tab_id]").val(-1);
    const promises = selectLabel.map((item) =>
        select2Ajax(
                item.url,
                `#tab-modal select[name=${item.label}]`,
                {for : "select"},
                "#tab-modal",
                false
                )
    );

    await Promise.all(promises);


    if (pid > 0) {
        var result = common.ajax_fech("getTab", {web_tab_id: pid});

        if (result["code"] == 200 && result["data"].length != 0) {
            $(".tab-form input[name=web_tab_id]").val(
                    result["data"][0]["web_tab_id"]
                    );
            
             $(".tab-form input[name=web_title]").val(
                    result["data"][0]["web_title"]
                    );
            
             $(".tab-form input[name=btn_name]").val(
                    result["data"][0]["btn_name"]
                    );
            
             $(".tab-form input[name=web_icon]").val(
                    result["data"][0]["web_icon"]
                    );
            
              $(".tab-form select[name=web_menu_id]").val(
                    result["data"][0]["web_menu_id"]
                    ).trigger("change");
            
             $(".tab-form textarea[name=web_content]").val(
                    result["data"][0]["web_content"]
                    );
            
            $(".tab-form input[name=display_order]").val(
                    result["data"][0]["display_order"]
                    );
            $("#web_image").attr("src", result["data"][0]["web_image"]);
             $('#web_icon_logo').attr('class', result["data"][0]["web_icon"]);
        } else {
            vbk = "hide";
            Swal2("error", "Something Error", "Try Some again time");
        }
    }
    $("#tab-modal").modal(vbk);
});

// From Submit
$(".tab-form").on("submit", function (event) {
    event.preventDefault(); // Prevent default form submission
    // Submit the form via AJAX if validation passes
    const formData = new FormData(this);
    formData.append("for", "edit");
    common
            .ajax_save_file("saveTab", formData)
            .then(function (response) {
                if (response.code == 200) {
                    reloadDataTable(k);
                    Swal2("success", "Success", "Successfully User Saved").then(() => {
                        $("#tab-modal").modal("hide");
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
$(document).on("click", ".del-tab", function () {
    var pid = $(this).data("pid");
    var update_data = {
        web_tab_id: pid,
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
                            .ajax_save("saveTab", update_data)
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
$(document).on("change", ".tab_status", function () {
    var pid = $(this).data("pid");
    var update_data = {
        web_tab_id: pid,
        for : "status",
        is_active: $(this).prop("checked") ? 1 : 0,
    };

    common
            .ajax_save("saveTab", update_data)
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

// Image
$("input[name=web_icon]").on("change", function (event) {
     $('#web_icon_logo').attr('class', $(this).val());
});

 