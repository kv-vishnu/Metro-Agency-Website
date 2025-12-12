$(document).ready(function () {
  //alert(11);

  let base_url = $("#base_url").val();

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
    const saveButton = $("#save_management");
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

  //Add category
  $(document).on("click", "#save_management", function (e) {
    e.preventDefault();
    const $btn = $(this);
    // Get form values
    const management_image = $("#management_image")[0].files[0];

    // Validate required fields using the utility function
    let valid = true;
    valid &= validateField({
      fieldId: "#management_name",
      errorId: "#error_management_name",
      message: "Name is required.",
    });
    
    valid &= validateField({
      fieldId: "#management_description",
      errorId: "#error_management_description",
      message: "Description is required.",
    });
  
    valid &= validateField({
      fieldId: "#short_bio",
      errorId: "#error_short_bio",
      message: "bio is required.",
    });
 
    //valid &= validateField({ fieldId: "#benefits_content", errorId: "#error_benefits_content", message: "Benefits is required." });
    valid &= validateField({
      fieldId: "#management_image",
      errorId: "#error_management_image",
      message: "Management image is required.",
      isFile: true,
      allowedExtensions: ["webp", "avif", "svg", "jpg", "jpeg", "png"],
    });


    if (!valid) {
      $btn.prop("disabled", false).text("Save Management");
      return;
    } else {
      $btn.prop("disabled", true).text("Saving...");
    }

    // Prepare FormData
    const formData = new FormData();
  
    formData.append("management_name", $("#management_name").val());
    formData.append("management_description", $("#management_description").val());
    formData.append("short_bio", $("#short_bio").val());
    formData.append("management_image", management_image);
    const saveUrl = base_url + "admin/Management/save";

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
          setTimeout(() => {
            window.location.href =
              base_url + "admin/Management/";
            //location.reload();
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

  //Update Category
  $("#update_management").on("click", function (e) {
    e.preventDefault();
    const $btn = $(this);
    // Get form values
    const management_image = $("#edit_management_image")[0].files[0];

    // Validate required fields using the utility function
    let valid = true;
     valid &= validateField({
      fieldId: "#edit_management_name",
      errorId: "#error_edit_management_name",
      message: "Name is required.",
    });
    
    valid &= validateField({
      fieldId: "#edit_management_description",
      errorId: "#error_edit_management_description",
      message: "Designation is required.",
    });
  
    valid &= validateField({
      fieldId: "#edit_short_bio",
      errorId: "#error_edit_short_bio",
      message: "bio is required.",
    });
 
    //valid &= validateField({ fieldId: "#benefits_content", errorId: "#error_benefits_content", message: "Benefits is required." });
    if (management_image) {
    valid &= validateField({
      fieldId: "#edit_management_image",
      errorId: "#error_edit_management_image",
      message: "Management image is required.",
      isFile: true,
      allowedExtensions: ["webp", "avif", "svg", "jpg", "jpeg", "png"],
    });
}



    if (!valid) {
      $btn.prop("disabled", false).text("Update management");
      return;
    } else {
      $btn.prop("disabled", true).text("Updating...");
    }

    // Prepare FormData
    const formData = new FormData();
    formData.append("edit_id", $("#edit_id").val());
      formData.append("management_name", $("#edit_management_name").val());
    formData.append("management_description", $("#edit_management_description").val());
    formData.append("short_bio", $("#edit_short_bio").val());
    formData.append("edit_management_image", management_image);
    formData.append("old_management_image", $("#old_management_image").val());
    // formData.append("status", $("#status").val());

    const saveUrl = base_url + "admin/Management/update_management";

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
          $btn.prop("disabled", false).text("Update management");
          setTimeout(() => {
            $("#categorySuccessMsg").text("");
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

  //#region Status Change
  $(".is-active-management-checkbox").on("change", function () {
    var id = $(this).data("id");
    var is_active = $(this).is(":checked") ? 1 : 0;
    $.ajax({
      url: base_url + "admin/Management/update_management_status",
      type: "POST",
      contentType: "application/json",
      data: JSON.stringify({
        id: id,
        is_active: is_active,
      }),
      success: function (response) {
        $("#featuredMessage")
          .html(
            `
            <div class="alert alert-success alert-dismissible fade show" role="alert"> status updated.</div>
          `
          )
          .show();

        setTimeout(function () {
          $("#featuredMessage").fadeOut().empty();
        }, 2000);
      },
      error: function (xhr, status, error) {
        console.error("Error:", error);
        alert("Failed to update featured status.");
      },
    });
  });

  //#region category template change
  
});
