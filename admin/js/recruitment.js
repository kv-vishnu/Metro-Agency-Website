$(document).ready(function () {
  //alert(11);

  let base_url = $("#base_url").val();
//   alert(base_url);

  //Seo content update
  $(".summernote").summernote({
    height: 300,
    codeviewFilter: false,
    codeviewIframeFilter: true,

    toolbar: [
      ["style", ["style"]],
      ["font", ["bold", "underline", "clear"]],
      ["color", ["color"]],
      ["para", ["ul", "ol", "paragraph"]],
      ["table", ["table"]],
      ["insert", ["link", "picture", "video"]],
      ["view", ["fullscreen", "codeview", "help"]],
    ],
  });

  // Add category
  // Utility: Validate input fields
  function validateField({
    fieldId,
    errorId,
    message,
    isFile = false,
    allowedExtensions = [],
  }) {
    const field = isFile ? $(fieldId)[0].files[0] : $.trim($(fieldId).val());
    const errorElement = $(errorId);
    const saveButton = $(".recruitment-update");
    errorElement.text(""); // Clear previous error
    saveButton.removeClass("error-button");

    const scrollToElement = () => {
      $("html, body").animate(
        {
          scrollTop:
            $(".error:visible")
              .filter(function () {
                return $(this).html().trim() !== "";
              })
              .first()
              .offset().top - 100,
        },
        50
      );
    };

    if (!field) {
      errorElement.text(message);
      scrollToElement();
      saveButton.addClass("error-button");
      return false;
    }

    if (isFile && allowedExtensions.length > 0) {
      const extension = field.name.split(".").pop().toLowerCase();
      if (!allowedExtensions.includes(extension)) {
        errorElement.text(
          `Only ${allowedExtensions
            .join(", ")
            .toUpperCase()} formats are allowed.`
        );
        return false;
      }
    }

    return true;
  }


  //Update Category
  $(".recruitment-update").on("click", function (e) {
    // alert("11");
    e.preventDefault();
    const $btn = $(this);
    // Get form values
   
  
    // Prepare FormData
    const formData = new FormData();
    formData.append("recruitment_id", $("#recruitment_id").val());
    formData.append("remarks", $("#recruitment_remarks").val());
    formData.append("status", $("#recruitment_status").val());
    const saveUrl = base_url + "admin/Recruitment/update_recruitment";
    // Submit AJAX request
    $.ajax({
      url: saveUrl,
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      dataType: "json",
      success: function (response) {
        if (response.status) {
          $("#categorySuccessMsg").text(response.message);
          $btn.prop("disabled", false).text("Update ");
          setTimeout(() => {
            $("#categorySuccessMsg").text("");
            window.location.href =
              base_url + "admin/Recruitment/";
          }, 2000);
        } else {
          alert("error");
        }
      },
      error: function (xhr, status, error) {
        console.error("Error:", error);
        alert("Something went wrong.");
      },
    });
  });


$(document).on("change", "#recruitment_status_change", function () {
    const status = $(this).val();

    $.ajax({
        url: base_url + "admin/Recruitment/update_recruitment_status",
        type: "POST",
        data: { status: status },
        dataType: "json",
        success: function (response) {
            $("#recruitment_list_container").html(response.html);
            $("#recruitment_status_change").val(status);
            console.log(response);
        },
        error: function (xhr, status, error) {
            console.error("Error:", error);
        },
    });
});


//checkbox

//    $(".is-active-checkbox").on("change", function () {
//     var id = $(this).data("id");
//     var is_active = $(this).is(":checked") ? 1 : 0;
//     $.ajax({
//       url: base_url + "admin/Careers/update_career_status",
//       type: "POST",
//       contentType: "application/json",
//       data: JSON.stringify({
//         id: id,
//         is_active: is_active,
//       }),
//       success: function (response) {
//         $("#featuredMessage")
//           .html(
//             `
//             <div class="alert alert-success alert-dismissible fade show" role="alert">Category status updated.</div>
//           `
//           )
//           .show();

//         setTimeout(function () {
//           $("#featuredMessage").fadeOut().empty();
//         }, 2000);
//       },
//       error: function (xhr, status, error) {
//         console.error("Error:", error);
//         alert("Failed to update featured status.");
//       },
//     });
//   });




  
});
