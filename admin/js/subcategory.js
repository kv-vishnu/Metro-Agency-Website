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
    const saveButton = $("#save_subcategory");
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

    if (!field) {
      errorElement.text(message);
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
  $(document).on("click", "#save_subcategory", function (e) {
    e.preventDefault();
    const $btn = $(this);
    // Get form values
    const banner_image = $("#banner_image")[0].files[0];
    const intro_image = $("#intro_image")[0].files[0];
    const logo = $("#logo")[0].files[0];

    // Validate required fields using the utility function
    let valid = true;
    valid &= validateField({
      fieldId: "#category",
      errorId: "#error_category",
      message: "Category is required.",
    });
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
      fieldId: "#metadescription",
      errorId: "#error_metadescription",
      message: "Meta description is required.",
    });
    valid &= validateField({
      fieldId: "#banner_title",
      errorId: "#error_banner_title",
      message: "Banner title is required.",
    });
    valid &= validateField({
      fieldId: "#banner_text",
      errorId: "#error_banner_text",
      message: "Banner text is required.",
    });
    valid &= validateField({
      fieldId: "#intro_title",
      errorId: "#error_intro_title",
      message: "Introduction title is required.",
    });
    valid &= validateField({
      fieldId: "#intro_text",
      errorId: "#error_intro_text",
      message: "Introduction text is required.",
    });
    valid &= validateField({
      fieldId: "#home_desc",
      errorId: "#error_home_desc",
      message: "Description is required.",
    });
    //valid &= validateField({ fieldId: "#benefits_content", errorId: "#error_benefits_content", message: "Benefits is required." });
    valid &= validateField({
      fieldId: "#banner_image",
      errorId: "#error_banner_image",
      message: "Banner image is required.",
      isFile: true,
      allowedExtensions: ["webp", "avif", "svg"],
    });
    valid &= validateField({
      fieldId: "#intro_image",
      errorId: "#error_intro_image",
      message: "Introduction image is required.",
      isFile: true,
      allowedExtensions: ["webp", "avif", "svg"],
    });
    valid &= validateField({
      fieldId: "#logo",
      errorId: "#error_logo",
      message: "Logo image is required.",
      isFile: true,
      allowedExtensions: ["webp", "avif", "svg"],
    });

    if (!valid) {
      $btn.prop("disabled", false).text("Save Subcategory");
      return;
    } else {
      $btn.prop("disabled", true).text("Saving...");
    }

    // Prepare FormData
    const formData = new FormData();
    formData.append(
      "select_category_template",
      $("#select_category_template").val()
    );
    formData.append("category", $("#category").val());
    formData.append("title", $("#title").val());
    formData.append("slug", $("#slug").val());
    formData.append("keywords", $("#keywords").val());
    formData.append("metadescription", $("#metadescription").val());
    formData.append("home_desc", $("#home_desc").val());
    formData.append("intro_image", intro_image); //Main image
    formData.append("banner_title", $("#banner_title").val());
    formData.append("banner_text", $("#banner_text").val());
    formData.append("banner_image", banner_image);
    formData.append("img_alt", $("#img_alt").val());
    formData.append("banner_img_alt", $("#banner_img_alt").val());
    formData.append("intro_title", $("#intro_title").val());
    formData.append("intro_text", $("#intro_text").val());
    formData.append("logo", logo);
    formData.append("logo_img_alt", $("#logo_img_alt").val());
    formData.append("certifications", $("#certifications").val());
    formData.append("content", $("#content").val());
    formData.append("benefits", $("#benefits_content").val());
    formData.append("job", $("#job_opportunities_content").val());
    formData.append("faq", $("#faq_content").val());

    const saveUrl = base_url + "admin/Subcategories/save";

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
          $("#subcategorySuccessMsg").text(response.message);
          setTimeout(() => {
            window.location.href =
              base_url + "admin/subcategories/edit/" + response.id;
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
  $("#update_subcategory").on("click", function (e) {
    e.preventDefault();

    const $btn = $(this);
    // Get form values
    const banner_image = $("#banner_image")[0].files[0];
    const intro_image = $("#intro_image")[0].files[0];
    const logo = $("#logo")[0].files[0];

    // Validate required fields using the utility function
    let valid = true;
    valid &= validateField({
      fieldId: "#category",
      errorId: "#error_category",
      message: "Category is required.",
    });
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
      fieldId: "#metadescription",
      errorId: "#error_metadescription",
      message: "Meta description is required.",
    });
    valid &= validateField({
      fieldId: "#banner_title",
      errorId: "#error_banner_title",
      message: "Banner title is required.",
    });
    valid &= validateField({
      fieldId: "#banner_text",
      errorId: "#error_banner_text",
      message: "Banner text is required.",
    });
    valid &= validateField({
      fieldId: "#intro_title",
      errorId: "#error_intro_title",
      message: "Introduction title is required.",
    });
    valid &= validateField({
      fieldId: "#intro_text",
      errorId: "#error_intro_text",
      message: "Introduction text is required.",
    });
    valid &= validateField({
      fieldId: "#home_desc",
      errorId: "#error_home_desc",
      message: "Description is required.",
    });
    //valid &= validateField({ fieldId: "#benefits_content", errorId: "#error_benefits_content", message: "Benefits is required." });
    if (banner_image) {
      valid &= validateField({
        fieldId: "#banner_image",
        errorId: "#error_banner_image",
        message: "Banner image is required.",
        isFile: true,
        allowedExtensions: ["webp", "avif", "svg"],
      });
    }
    if (intro_image) {
      valid &= validateField({
        fieldId: "#intro_image",
        errorId: "#error_intro_image",
        message: "Introduction image is required.",
        isFile: true,
        allowedExtensions: ["webp", "avif", "svg"],
      });
    }
    if (logo) {
      valid &= validateField({
        fieldId: "#logo",
        errorId: "#error_logo",
        message: "Logo image is required.",
        isFile: true,
        allowedExtensions: ["webp", "avif", "svg"],
      });
    }

    if (!valid) {
      $btn.prop("disabled", false).text("Update Subcategory");
      return;
    } else {
      $btn.prop("disabled", true).text("Updating...");
    }

    // Prepare FormData
    const formData = new FormData();
    formData.append("edit_id", $("#edit_id").val());
    formData.append(
      "select_category_template",
      $("#select_category_template").val()
    );
    formData.append("category", $("#category").val());
    formData.append("title", $("#title").val());
    formData.append("metatitle", $("#metatitle").val());
    formData.append("canonical", $("#canonical").val());
    formData.append("slug", $("#slug").val());
    formData.append("keywords", $("#keywords").val());
    formData.append("metadescription", $("#metadescription").val());
    formData.append("page_schema", $("#page_schema").val());
    formData.append("home_desc", $("#home_desc").val());
    formData.append("intro_image", intro_image); //Main image
    formData.append("banner_title", $("#banner_title").val());
    formData.append("banner_text", $("#banner_text").val());
    formData.append("banner_image", banner_image);
    formData.append("banner_img_alt", $("#banner_img_alt").val());
    formData.append("img_alt", $("#img_alt").val());
    formData.append("old_intro_image", $("#old_intro_image").val());
    formData.append("old_banner_image", $("#old_banner_image").val());
    formData.append("old_logo", $("#old_logo").val());
    formData.append("intro_title", $("#intro_title").val());
    formData.append("intro_text", $("#intro_text").val());
    formData.append("logo", logo);
    formData.append("logo_img_alt", $("#logo_img_alt").val());
    formData.append("certifications", $("#certifications").val());
    formData.append("content", $("#content").val());
    formData.append("benefits", $("#benefits_content").val());
    formData.append("job", $("#job_opportunities_content").val());
    formData.append("faq", $("#faq_content").val());
    formData.append("location_courses", $("#location_courses").val());
    //formData.append("status", $("#status").val());

    const saveUrl = base_url + "admin/Subcategories/update_subcategory";

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
          $("#subcategorySuccessMsg").text(response.message);
          setTimeout(() => {
            $("#subcategorySuccessMsg").text("");
            $btn.prop("disabled", false).text("Update Subcategory");
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
  $(".is-active-subcategory-checkbox").on("change", function () {
    var id = $(this).data("id");
    var is_active = $(this).is(":checked") ? 1 : 0;
    $.ajax({
      url: base_url + "admin/subcategories/update_subcategory_status",
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
            <div class="alert alert-success alert-dismissible fade show" role="alert">Sub Category status updated.</div>
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
  $("#select_category_template").on("change", function () {
    var templateId = $(this).val(); //alert(templateId);
    if (templateId) {
      $.ajax({
        url: base_url + "admin/Template/load_subcategory_template",
        type: "POST",
        data: { template_id: templateId },
        success: function (response) {
          $("#category_template_section").css("display", "block");
          $("#category_template_section").html(response);
          $(".summernote").summernote({
            height: 200,
          });
        },
      });
    } else {
      $("#category_template_section").html("");
    }
  });
});
