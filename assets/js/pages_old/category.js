var table_column = [
  {
    data: "serial_no",
    title: "S.No",
    is_default: true,
    dt: true,
    width: "30px",
  },
  {
    data: "category_name",
    className: "text-start",
    title: "Category Name",
    is_default: true,
    dt: true,
    width: "500px",
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
        row["m_blog_category_id"]
      }" class="category_status" >
              <span class="cus-slider round"></span>
            </label>
            <label>Active</label>
          </div>`;
    },
  },
  {
    data: "m_blog_category_id",
    width: "200px",
    className: "text-center my-btn position-relative",
    title: "Action",
    render: function (data, type, row) {
      return `      
      <button data-pid="${row["m_blog_category_id"]}" class="waves-effect waves-light btn btn-primary-light btn-sm edit-category" type="button" ><i class="fi fi-sr-attribution-pencil"></i> Edit</button>
      <button data-pid="${row["m_blog_category_id"]}" class="waves-effect waves-light btn btn-danger-light btn-sm del-category " type="button" ><i class="fi fi-sr-trash"></i> Delete</button>
      `;
    },
  },
  //<button data-pid="${row["m_blog_category_id"]}" class="waves-effect waves-light btn btn-success-light btn-sm view-category" type="button" ><i class="fas fa-eye"></i> View</button>

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
  table: "#category_table",
  column: table_column,
  url: "getCategory",
};

var k = common.dataTable(dt);
 
// Add and Edit
$(document).on("click", ".edit-category", function () {
  var vbk = "show";
  $(".category-form")[0].reset();   
  var pid = $(this).data("pid");
  $(".modal-name").text(pid > 0 ? "Edit" : "Add");
 $(".category-form input[name=m_blog_category_id]").val(-1);
  if (pid > 0) {
    var result = common.ajax_fech("getCategory", { m_blog_category_id: pid });

    if (result["code"] == 200 && result["data"].length != 0) {
      $(".category-form input[name=m_blog_category_id]").val(
        result["data"][0]["m_blog_category_id"]
      );
      $(".category-form input[name=category_name]").val(
        result["data"][0]["category_name"]
      ); 
     
    } else {
      vbk = "hide";
      Swal2("error", "Something Error", "Try Some again time");
    }
  }
  $("#category-modal").modal(vbk);
});

// From Submit
$(".category-form").on("submit", function (event) {
  event.preventDefault(); // Prevent default form submission
  // Submit the form via AJAX if validation passes
  const formData = new FormData(this);
  formData.append("for", "edit");
  common
    .ajax_save_file("saveCategory", formData)
    .then(function (response) {
      if (response.code == 200) {
        reloadDataTable(k);
        Swal2("success", "Success", "Successfully User Saved").then(() => {
          $("#category-modal").modal("hide");
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
$(document).on("click", ".del-category", function () {
  var pid = $(this).data("pid");
  var update_data = {
    m_blog_category_id: pid,
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
          .ajax_save("saveCategory", update_data)
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
$(document).on("change", ".category_status", function () {
  var pid = $(this).data("pid");
  var update_data = {
    m_blog_category_id: pid,
    for: "status",
    is_active: $(this).prop("checked") ? 1 : 0,
  };

  common
    .ajax_save("saveCategory", update_data)
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
