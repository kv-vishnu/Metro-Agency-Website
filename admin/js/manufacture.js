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
    const saveButton = $("#save_manufacture");
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
  $(document).on("click", "#save_manufacture", function (e) {
    e.preventDefault();
    const $btn = $(this);
    // Get form values
    const manufacture_image = $("#manufacture_image")[0].files[0];

    // Validate required fields using the utility function
    let valid = true;
    valid &= validateField({
      fieldId: "#title",
      errorId: "#error_title",
      message: "Title is required.",
    });
    valid &= validateField({
      fieldId: "#slug",
      errorId: "#error_slug",
      message: "Slug is required.",
    });
    valid &= validateField({
      fieldId: "#keywords",
      errorId: "#error_keywords",
      message: "Keywords are required.",
    });
    valid &= validateField({
      fieldId: "#meta_description",
      errorId: "#error_description",
      message: "Description is required.",
    });

    valid &= validateField({
      fieldId: "#meta_description",
      errorId: "#error_description",
      message: "Description is required.",
    });


    valid &= validateField({
      fieldId: "#manufacture_title",
      errorId: "#error_manufacture_title",
      message: "manufacture title is required.",
    });
    valid &= validateField({
      fieldId: "#manufacture_category_id",
      errorId: "#error_manufacture_category_id",
      message: "manufacture category is required.",
    });

        valid &= validateField({
      fieldId: "#manufacture_email",
      errorId: "#error_manufacture_email",
      message: "manufacture email is required.",
    });

        valid &= validateField({
      fieldId: "#manufacture_phone",
      errorId: "#error_manufacture_phone",
      message: "manufacture phone is required.",
    });
        valid &= validateField({
      fieldId: "#manufacture_address",
      errorId: "#error_manufacture_address",
      message: "manufacture address is required.",
    });
  
    // valid &= validateField({
    //   fieldId: "#category_link",
    //   errorId: "#error_category_link",
    //   message: "category link is required.",
    // });
 
    //valid &= validateField({ fieldId: "#benefits_content", errorId: "#error_benefits_content", message: "Benefits is required." });
    valid &= validateField({
      fieldId: "#manufacture_image",
      errorId: "#error_manufacture_image",
      message: "manufacture image is required.",
      isFile: true,
      allowedExtensions: ["webp", "avif", "svg", "jpg", "jpeg", "png"],
    });


    if (!valid) {
      $btn.prop("disabled", false).text("Save Manufacture");
      return;
    } else {
      $btn.prop("disabled", true).text("Saving...");
    }

    // Prepare FormData
    const formData = new FormData();
  
    formData.append("title", $("#title").val());
    formData.append("slug", $("#slug").val());
    formData.append("keywords", $("#keywords").val());
    formData.append("meta_description", $("#meta_description").val());
    formData.append("page_schema", $("#page_schema").val());
    formData.append("manufacture_title", $("#manufacture_title").val());
$('input[name="manufacture_category_id[]"]:checked').each(function () {
    formData.append("manufacture_category_id[]", $(this).val());
});


    // formData.append("manufacture_category_id", $("#manufacture_category_id[]").val());
    formData.append("manufacture_email", $("#manufacture_email").val());
    formData.append("manufacture_phone", $("#manufacture_phone").val());
    formData.append("manufacture_address", $("#manufacture_address").val());
    formData.append("manufacture_image", manufacture_image);
    // formData.append("category_link", $("#category_link").val());

    const saveUrl = base_url + "admin/Manufacture/save";

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
              base_url + "admin/Manufacture/";
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
  $("#update_manufacture").on("click", function (e) {
    e.preventDefault();
    const $btn = $(this);
    // Get form values
    const manufacture_image = $("#manufacture_edit_image")[0].files[0];

    // Validate required fields using the utility function
    let valid = true;
    valid &= validateField({
      fieldId: "#metatitle",
      errorId: "#error_edit_title",
      message: "Title is required.",
    });
    valid &= validateField({
      fieldId: "#slug",
      errorId: "#error_edit_slug",
      message: "Slug is required.",
    });
    valid &= validateField({
      fieldId: "#meta_keywords",
      errorId: "#error_edit_keywords",
      message: "Keywords are required.",
    });
    valid &= validateField({
      fieldId: "#meta_description",
      errorId: "#error_edit_description",
      message: "Description is required.",
    });


    valid &= validateField({
      fieldId: "#manufacture_edit_title",
      errorId: "#error_manufacture_edit_title",
      message: "manufacture title is required.",
    });
    valid &= validateField({
      fieldId: "#manufacture_edit_email",
      errorId: "#error_manufacture_edit_email",
      message: "manufacture email is required.",
    });

        valid &= validateField({
      fieldId: "#manufacture_edit_category_id",
      errorId: "#error_manufacture_edit_category_id",
      message: "manufacture category is required.",
    });

    valid &= validateField({
      fieldId: "#manufacture_edit_phone",
      errorId: "#error_manufacture_edit_phone",
      message: "manufacture phone is required.",
    });

    valid &= validateField({
      fieldId: "#manufacture_edit_address",
      errorId: "#error_manufacture_edit_address",
      message: "manufacture address is required.",
    });

    
    //valid &= validateField({ fieldId: "#benefits_content", errorId: "#error_benefits_content", message: "Benefits is required." });
    if (manufacture_image) {
      valid &= validateField({
        fieldId: "#manufacture_edit_image",
        errorId: "#error_manufacture_edit_image",
        message: "manufacture image is required.",
        isFile: true,
       allowedExtensions: ["webp", "avif", "svg", "jpg", "jpeg", "png"]
      });
    }


    if (!valid) {
      $btn.prop("disabled", false).text("Update Manufacture");
      return;
    } else {
      $btn.prop("disabled", true).text("Updating...");
    }

    // Prepare FormData
    const formData = new FormData();
    formData.append("edit_id", $("#edit_id").val());
    formData.append("title", $("#metatitle").val());
    formData.append("slug", $("#slug").val());
    formData.append("keywords", $("#meta_keywords").val());
    formData.append("meta_description", $("#meta_description").val());
    formData.append("page_schema", $("#page_schema").val());
    formData.append("manufacture_title", $("#manufacture_edit_title").val());
$('input[name="manufacture_edit_category_id[]"]:checked').each(function () {
    formData.append("manufacture_edit_category_id[]", $(this).val());
});


    // formData.append("manufacture_category_id", $("#manufacture_category_id[]").val());
    formData.append("manufacture_email", $("#manufacture_edit_email").val());
    formData.append("manufacture_phone", $("#manufacture_edit_phone").val());
    formData.append("manufacture_address", $("#manufacture_edit_address").val());
    formData.append("manufacture_edit_image", manufacture_image);
    formData.append("old_manufacture_image", $("#old_manufacture_image").val());
    const saveUrl = base_url + "admin/Manufacture/update_manufacture";

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
          $btn.prop("disabled", false).text("Update category");
          setTimeout(() => {
            $("#categorySuccessMsg").text("");
            window.location.href =
              base_url + "admin/Manufacture/";
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
  $(".is-active-manufacture-checkbox").on("change", function () {
    var id = $(this).data("id");
    var is_active = $(this).is(":checked") ? 1 : 0;
    $.ajax({
      url: base_url + "admin/Manufacture/update_manufacture_status",
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
