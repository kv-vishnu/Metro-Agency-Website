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
    const saveButton = $("#save_slider");
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
  $(document).on("click", "#save_slider", function (e) {
    e.preventDefault();
    const $btn = $(this);
    // Get form values
    const banner_image = $("#slider_image")[0].files[0];

    // Validate required fields using the utility function
    let valid = true;
    
    valid &= validateField({
      fieldId: "#slider_title",
      errorId: "#error_slider_title",
      message: "Slider title is required.",
    });
    valid &= validateField({
      fieldId: "#slider_text",
      errorId: "#error_slider_text",
      message: "slider text is required.",
    });
  
 
    //valid &= validateField({ fieldId: "#benefits_content", errorId: "#error_benefits_content", message: "Benefits is required." });
    valid &= validateField({
      fieldId: "#slider_image",
      errorId: "#error_slider_image",
      message: "Slider image is required.",
      isFile: true,
      allowedExtensions: ["webp", "avif", "svg", "jpg", "jpeg", "png"],
    });


    if (!valid) {
      $btn.prop("disabled", false).text("Save Slider");
      return;
    } else {
      $btn.prop("disabled", true).text("Saving...");
    }

    // Prepare FormData
    const formData = new FormData();
    formData.append("slider_title", $("#slider_title").val());
    formData.append("slider_text", $("#slider_text").val());
    formData.append("slider_image", banner_image);
    const saveUrl = base_url + "admin/Slider/save";

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
              base_url + "admin/slider"
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
  $("#update_slider").on("click", function (e) {
    e.preventDefault();
    const $btn = $(this);
    // Get form values
    const slider_image = $("#slider_image")[0].files[0];

    // Validate required fields using the utility function
    let valid = true;
    
    valid &= validateField({
      fieldId: "#slider_title",
      errorId: "#error_slider_title",
      message: "Slider title is required.",
    });
    valid &= validateField({
      fieldId: "#slider_text",
      errorId: "#error_slider_text",
      message: "slider text is required.",
    });
  
     if (slider_image) {
      valid &= validateField({
     fieldId: "#slider_image",
      errorId: "#error_slider_image",
      message: "Slider image is required.",
        isFile: true,
       allowedExtensions: ["webp", "avif", "svg", "jpg", "jpeg", "png"]
      });
    }
 
    
    if (!valid) {
      $btn.prop("disabled", false).text("Update Slider");
      return;
    } else {
      $btn.prop("disabled", true).text("Updating...");
    }



    // Prepare FormData
    const formData = new FormData();
    formData.append("edit_id", $("#edit_id").val());
    formData.append("slider_title", $("#slider_title").val());
    formData.append("slider_text", $("#slider_text").val());
    formData.append("slider_image", slider_image);
    formData.append("old_slider_image", $("#old_slider_image").val());
    const saveUrl = base_url + "admin/Slider/update_slider";
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
          $btn.prop("disabled", false).text("Update slider");
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
  $(".is-active-checkbox").on("change", function () {
    var id = $(this).data("id");
    var is_active = $(this).is(":checked") ? 1 : 0;
    $.ajax({
      url: base_url + "admin/slider/update_slider_status",
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


  
});
