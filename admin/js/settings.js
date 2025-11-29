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
    const saveButton = $("#save_get_in_touch");
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
  $(document).on("click", "#save_get_in_touch", function (e) {
    e.preventDefault();
    const $btn = $(this);
    // Validate required fields using the utility function
    let valid = true;
    
    valid &= validateField({
      fieldId: "#address",
      errorId: "#error_address",
      message: "address is required.",
    });

    valid &= validateField({
      fieldId: "#phone_no",
      errorId: "#error_phone_no",
      message: "phone no is required.",
    });
  

    valid &= validateField({
      fieldId: "#email",
      errorId: "#error_email",
      message: "email is required.",
    });


    valid &= validateField({
      fieldId: "#working_hours",
      errorId: "#error_working_hours",
      message: "working hours is required.",
    });
  
 
   

    if (!valid) {
      $btn.prop("disabled", false).text("Save");
      return;
    } else {
      $btn.prop("disabled", true).text("Saving...");
    }

    // Prepare FormData
    const formData = new FormData();
    formData.append("address", $("#address").val());
    formData.append("phone_no", $("#phone_no").val());
    formData.append("email", $("#email").val());
    formData.append("working_hours", $("#working_hours").val());
    const saveUrl = base_url + "admin/Settings/save";

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
              base_url + "admin/settings"
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
  $("#update_get_in_touch").on("click", function (e) {
    e.preventDefault();
    const $btn = $(this);
    // Get form values
    let valid = true;
    
       valid &= validateField({
      fieldId: "#edit_address",
      errorId: "#error_address",
      message: "address is required.",
    });

    valid &= validateField({
      fieldId: "#edit_phone_no",
      errorId: "#error_phone_no",
      message: "phone no is required.",
    });
  

    valid &= validateField({
      fieldId: "#edit_email",
      errorId: "#error_email",
      message: "email is required.",
    });


    valid &= validateField({
      fieldId: "#edit_working_hours",
      errorId: "#error_working_hours",
      message: "working hours is required.",
    });
    
    if (!valid) {
      $btn.prop("disabled", false).text("Update Slider");
      return;
    } else {
      $btn.prop("disabled", true).text("Updating...");
    }



    // Prepare FormData
    const formData = new FormData();
    formData.append("edit_id", $("#edit_id").val());
    formData.append("address", $("#edit_address").val());
    formData.append("phone_no", $("#edit_phone_no").val());
    formData.append("email", $("#edit_email").val());
    formData.append("working_hours", $("#edit_working_hours").val());
    const saveUrl = base_url + "admin/Settings/update_settings";
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
            window.location.href =
              base_url + "admin/settings"
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




  
});
