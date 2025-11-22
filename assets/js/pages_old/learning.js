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
    data: "web_btn_name",
    title: "Button Name",
    className: "text-start",
    is_default: true,
    dt: true,
    width: "240px",
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
        row["web_learning_id"]
      }" class="learning_status" >
              <span class="cus-slider round"></span>
            </label>
            <label>Active</label>
          </div>`;
    },
  },
  {
    data: "web_learning_id",
    width: "200px",
    className: "text-center my-btn position-relative",
    title: "Action",
    render: function (data, type, row) {
      return `      
      <button data-pid="${row["web_learning_id"]}" class="waves-effect waves-light btn btn-primary-light btn-sm edit-learning" type="button" ><i class="fi fi-sr-attribution-pencil"></i> Edit</button>
          <button data-pid="${row["web_learning_id"]}" class="waves-effect waves-light btn btn-danger-light btn-sm del-learning " type="button" ><i class="fi fi-sr-trash"></i> Delete</button>
      `;
    },
  },
  //<button data-pid="${row["web_learning_id"]}" class="waves-effect waves-light btn btn-success-light btn-sm view-learning" type="button" ><i class="fas fa-eye"></i> View</button>

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
  table: "#learning_table",
  column: table_column,
  url: "getLearning",
};

var k = common.dataTable(dt);

// Add and Edit
$(document).on("click", ".edit-learning", function () {
  var vbk = "show";
  $(".learning-form")[0].reset();
  $("#web_image").attr("src", "");
  var pid = $(this).data("pid");
  $(".modal-name").text(pid > 0 ? "Edit" : "Add");

  if (pid > 0) {
    var result = common.ajax_fech("getLearning", { web_learning_id: pid });

    if (result["code"] == 200 && result["data"].length != 0) {
      $(".learning-form input[name=web_learning_id]").val(
        result["data"][0]["web_learning_id"]
      );
      $(".learning-form input[name=web_title]").val(
        result["data"][0]["web_title"]
      );
      $(".learning-form input[name=web_btn_name]").val(
        result["data"][0]["web_btn_name"]
      );
     $(".learning-form input[name=display_order]").val(
        result["data"][0]["display_order"]
      );
      $(".learning-form input[name=web_url]").val(result["data"][0]["web_url"]);
      $(".learning-form textarea[name=web_content]").val(
        result["data"][0]["web_content"]
      );
      $("#web_image").attr("src", result["data"][0]["web_image"]);
    } else {
      vbk = "hide";
      Swal2("error", "Something Error", "Try Some again time");
    }
  }
  $("#learning-modal").modal(vbk);
});

// From Submit
$(".learning-form").on("submit", function (event) {
  event.preventDefault(); // Prevent default form submission
  // Submit the form via AJAX if validation passes
  const formData = new FormData(this);
  formData.append("for", "edit");
  common
    .ajax_save_file("saveLearning", formData)
    .then(function (response) {
      if (response.code == 200) {
        reloadDataTable(k);
        Swal2("success", "Success", "Successfully User Saved").then(() => {
          $("#learning-modal").modal("hide");
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
$(document).on("click", ".del-learning", function () {
  var pid = $(this).data("pid");
  var update_data = {
    web_learning_id: pid,
    is_deleted: 1,
    for: "delete",
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
          .ajax_save("saveLearning", update_data)
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
$(document).on("change", ".learning_status", function () {
  var pid = $(this).data("pid");
  var update_data = {
    web_learning_id: pid,
    for: "status",
    is_active: $(this).prop("checked") ? 1 : 0,
  };

  common
    .ajax_save("saveLearning", update_data)
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
