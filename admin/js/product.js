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
    const saveButton = $("#save_product");
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
  $(document).on("click", "#save_product", function (e) {
    e.preventDefault();
    const $btn = $(this);
    // Get form values
    const product_image = $("#product_image")[0].files[0];
    const product_brodhure= $("#product_brodhure")[0].files[0];
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
      fieldId: "#product_category",
      errorId: "#error_product_category",
      message: "product category is required.",
    });

    valid &= validateField({
      fieldId: "#product_name",
      errorId: "#error_product_name",
      message: "product name is required.",
    });

    valid &= validateField({
      fieldId: "#product_description",
      errorId: "#error_product_description",
      message: "product description is required.",
    });
  
    valid &= validateField({
      fieldId: "#product_link",
      errorId: "#error_product_link",
      message: "product link is required.",
    });
 
    //valid &= validateField({ fieldId: "#benefits_content", errorId: "#error_benefits_content", message: "Benefits is required." });
    valid &= validateField({
      fieldId: "#product_image",
      errorId: "#error_product_image",
      message: "product image is required.",
      isFile: true,
      allowedExtensions: ["webp", "avif", "svg", "jpg", "jpeg", "png"],
    });

  

        valid &= validateField({
      fieldId: "#product_brodhure",
      errorId: "#error_product_brodhure",
      message: "product brodhure is required.",
      isFile: true,
    allowedExtensions: ["pdf", "csv", "xls", "xlsx"],
    });



    if (!valid) {
      $btn.prop("disabled", false).text("Save Category");
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
    formData.append("product_category", $("#product_category").val());
    formData.append("product_name", $("#product_name").val());
    formData.append("product_description", $("#product_description").val());
    formData.append("product_image", product_image);
    formData.append("product_brodhure",product_brodhure);
    formData.append("product_link", $("#product_link").val());



    const saveUrl = base_url + "admin/Product/save";

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
              base_url + "admin/Product/";
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
  $("#update_product").on("click", function (e) {
    e.preventDefault();
    const $btn = $(this);
    // Get form values
    const product_image = $("#edit_product_image")[0].files[0];
    const product_brodhure  = $("#edit_product_brodhure")[0].files[0];
    let valid = true;
    // Validate required fields using the utility function
    valid &= validateField({
      fieldId: "#edit_title",
      errorId: "#error_edit_title",
      message: "Title is required.",
    });
    valid &= validateField({
      fieldId: "#edit_slug",
      errorId: "#error_edit_slug",
      message: "Slug is required.",
    });
    valid &= validateField({
      fieldId: "#edit_meta_keywords",
      errorId: "#error_edit_meta_keywords",
      message: "Keywords are required.",
    });

       valid &= validateField({
      fieldId: "#edit_meta_description",
      errorId: "#error_edit_meta_description",
      message: "description are required.",
    });




    valid &= validateField({
      fieldId: "#edit_product_category",
      errorId: "#error_edit_product_category",
      message: "product category is required.",
    });

    valid &= validateField({
      fieldId: "#edit_product_name",
      errorId: "#error_edit_product_name",
      message: "product name is required.",
    });

    valid &= validateField({
      fieldId: "#edit_product_description",
      errorId: "#error_edit_product_description",
      message: "product description is required.",
    });
  
    valid &= validateField({
      fieldId: "#edit_product_link",
      errorId: "#error_edit_product_link",
      message: "product link is required.",
    });
 
    //valid &= validateField({ fieldId: "#benefits_content", errorId: "#error_benefits_content", message: "Benefits is required." });
      if (product_image) {
    valid &= validateField({
      fieldId: "#edit_product_image",
      errorId: "#error_edit_product_image",
      message: "product image is required.",
      isFile: true,
      allowedExtensions: ["webp", "avif", "svg", "jpg", "jpeg", "png"],
    });
  }


    if (product_brodhure) {
        valid &= validateField({
      fieldId: "#edit_product_brodhure",
      errorId: "#error_edit_product_brodhure",
      message: "product brochure is required.",
      isFile: true,
    allowedExtensions: ["pdf", "csv", "xls", "xlsx"],
    });
  }




    if (!valid) {
      $btn.prop("disabled", false).text("Update Category");
      return;
    } else {
      $btn.prop("disabled", true).text("Updating...");
    }

    // Prepare FormData
    const formData = new FormData();
    formData.append("edit_id", $("#edit_id").val());
    formData.append("title", $("#edit_title").val());
    formData.append("slug", $("#edit_slug").val());
    formData.append("keywords", $("#edit_meta_keywords").val());
    formData.append("meta_description", $("#edit_meta_description").val());
    formData.append("page_schema", $("#edit_page_schema").val());
    formData.append("product_category", $("#edit_product_category").val());
    formData.append("product_name", $("#edit_product_name").val());
    formData.append("product_description", $("#edit_product_description").val());
    formData.append("edit_product_image", product_image);
    formData.append("edit_product_brodhure",product_brodhure);
    formData.append("product_link", $("#edit_product_link").val());
    formData.append("old_product_image", $("#old_product_image").val());
    formData.append("old_product_brodhure", $("#old_product_brodhure").val());

    // formData.append("status", $("#status").val());

    const saveUrl = base_url + "admin/Product/update_product";

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
              base_url + "admin/Product/";
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
  $(".is-active-checkbox").on("change", function () {
    var id = $(this).data("id");
    var is_active = $(this).is(":checked") ? 1 : 0;
    $.ajax({
      url: base_url + "admin/categories/update_category_status",
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
            <div class="alert alert-success alert-dismissible fade show" role="alert">Category status updated.</div>
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
