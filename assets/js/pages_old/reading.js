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
        className: "text-start",
        title: "Title",
        is_default: true,
        dt: true,
        width: "240px",
    },
    {
        data: "category_name",
        title: "Category",
        className: "text-start",
        is_default: true,
        dt: true,
        width: "150px",
    },

    {
        data: "writer_name",
        title: "Writer Name",
        className: "text-start",
        is_default: true,
        dt: true,
        width: "140px",
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
                    row["web_reading_id"]
                    }" class="reading_status" >
              <span class="cus-slider round"></span>
            </label>
            <label>Active</label>
          </div>`;
        },
    },
    {
        data: "web_reading_id",
        width: "200px",
        className: "text-center my-btn position-relative",
        title: "Action",
        render: function (data, type, row) {
            return `      
      <button data-pid="${row["web_reading_id"]}" class="waves-effect waves-light btn btn-primary-light btn-sm edit-reading" type="button" ><i class="fi fi-sr-attribution-pencil"></i> Edit</button>
          <button data-pid="${row["web_reading_id"]}" class="waves-effect waves-light btn btn-danger-light btn-sm del-reading " type="button" ><i class="fi fi-sr-trash"></i> Delete</button>
      `;
        },
    },
            //<button data-pid="${row["web_reading_id"]}" class="waves-effect waves-light btn btn-success-light btn-sm view-reading" type="button" ><i class="fas fa-eye"></i> View</button>

            //   {
            //     data: "updated_by_name",
            //     className: "text-start zi-9999",
            //     title: "Updated By",
            //     width: "200px",
            //     visible: false,
            //     is_default: false,
            //     dt: true,
            //   },
            //   {
            //     data: "updated_on_text",
            //     className: "text-start zi-9999",
            //     title: "Updated On",
            //     width: "200px",
            //     visible: false,
            //     is_default: false,
            //     dt: true,
            //   },
            //   {
            //     data: "created_by_name",
            //     className: "text-start zi-9999",
            //     title: "Created By",
            //     width: "200px",
            //     visible: false,
            //     is_default: false,
            //     dt: true,
            //   },
            //   {
            //     data: "created_on_text",
            //     className: "text-start zi-9999",
            //     title: "Created On",
            //     width: "200px",
            //     visible: false,
            //     is_default: false,
            //     dt: true,
            //   },
];

var dt = {
    table: "#reading_table",
    column: table_column,
    url: "getReading",
};

var k = common.dataTable(dt);


let selectLabel = [
    {label: "m_blog_category_id", url: "getCategory"},
    {label: "book_writer_id", url: "getWriter"},
];

// Add and Edit
$(document).on("click", ".edit-reading", async function () {
    var vbk = "show";
    $(".reading-form")[0].reset();
    $("#web_image").attr("src", "");
    var pid = $(this).data("pid");
    $(".modal-name").text(pid > 0 ? "Edit" : "Add");
    $(".reading-form input[name=web_reading_id]").val(-1);
    const promises = selectLabel.map((item) =>
        select2Ajax(
                item.url,
                `#reading-modal select[name=${item.label}]`,
                {for : "select"},
                "#reading-modal",
                false
                )
    );

    await Promise.all(promises);

    if (pid > 0) {
        var result = common.ajax_fech("getReading", {web_reading_id: pid});

        if (result["code"] == 200 && result["data"].length != 0) {
            $(".reading-form input[name=web_reading_id]").val(
                    result["data"][0]["web_reading_id"]
                    );
            $(".reading-form input[name=web_title]").val(
                    result["data"][0]["web_title"]
                    );

            $(".reading-form select[name=m_blog_category_id]").val(
                    result["data"][0]["m_blog_category_id"]
                    ).trigger("change");

            $(".reading-form select[name=book_writer_id]").val(
                    result["data"][0]["book_writer_id"]
                    ).trigger("change");

            $(".reading-form input[name=display_order]").val(
                    result["data"][0]["display_order"]
                    );

            $(".reading-form input[name=web_url]").val(result["data"][0]["web_url"]);

            $(".reading-form textarea[name=web_content]").val(
                    result["data"][0]["web_content"]
                    );
            $("#web_image").attr("src", result["data"][0]["web_image"]);
        } else {
            vbk = "hide";
            Swal2("error", "Something Error", "Try Some again time");
        }
    }
    $("#reading-modal").modal(vbk);
});

// From Submit
$(".reading-form").on("submit", function (event) {
    event.preventDefault(); // Prevent default form submission
    // Submit the form via AJAX if validation passes
    const formData = new FormData(this);
    formData.append("for", "edit");
    common
            .ajax_save_file("saveReading", formData)
            .then(function (response) {
                if (response.code == 200) {
                    reloadDataTable(k);
                    Swal2("success", "Success", "Successfully User Saved").then(() => {
                        $("#reading-modal").modal("hide");
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
$(document).on("click", ".del-reading", function () {
    var pid = $(this).data("pid");
    var update_data = {
        web_reading_id: pid,
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
                            .ajax_save("saveReading", update_data)
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
$(document).on("change", ".reading_status", function () {
    var pid = $(this).data("pid");
    var update_data = {
        web_reading_id: pid,
        for : "status",
        is_active: $(this).prop("checked") ? 1 : 0,
    };

    common
            .ajax_save("saveReading", update_data)
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

// Generate checkboxes dynamically based on columns configuration
const toggleContainer = $(".dt-table-column");
table_column.forEach((col, index) => {
    const isChecked = col.visible !== false; // Show checkbox as checked if column is visible
    const checkbox = col.dt
            ? `
        <div class="waves-effect waves-light bg-primary-light p-1 select-btn " ${
            col.is_default ? "style='background:#adb5bd !important'" : ""
            } >
             <input  data-column="${index}" class="form-check dt-show-btn" type="checkbox" ${
            isChecked ? "checked" : ""
            } ${col.is_default ? "disabled" : ""}  id="dt-label-${index}" > 
             <label for="dt-label-${index}"class="text-primary">${
            col.title
            }</label>
         </div>
         `
            : "";
    toggleContainer.append(checkbox);
    console.log(col);
});

$(document).on("change", ".dt-show-btn", function () {
    const columnIndex = $(this).data("column");
    const column = k.column(columnIndex);
    column.visible($(this).prop("checked"));
});

// Filter End

$(document).on("click", ".load-hide-content", function (e) {
    $(".table-edit-menu")
            .not($(this).siblings(".table-edit-menu"))
            .addClass("d-none-visible ")
            .removeClass("d-flex-visible");
    $(this)
            .siblings(".table-edit-menu")
            .removeClass("d-none-visible ")
            .addClass("d-flex-visible");
});

$(document).click(function (e) {
    if (
            !$(e.target).closest(".load-hide-content").length &&
            !$(e.target).closest(".table-edit-menu").length
            ) {
        $(".table-edit-menu")
                .addClass("d-none-visible ")
                .removeClass("d-flex-visible"); // Hide all menus
    }
});

$("input[name=phone_number]").inputmask("9999999999");
$("input[name=user_email]").inputmask({
    alias: "email",
    clearIncomplete: true, // Prevents submission of incomplete input
});
