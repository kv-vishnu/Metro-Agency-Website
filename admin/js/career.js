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
    const saveButton = $("#save_job");
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
  $(document).on("click", "#save_job", function (e) {
    e.preventDefault();
    const $btn = $(this);
    // Validate required fields using the utility function
    let valid = true;
    
    valid &= validateField({
      fieldId: "#job",
      errorId: "#error_job",
      message: "job name  is required.",
    });

    valid &= validateField({
      fieldId: "#description",
      errorId: "#error_description",
      message: "description is required.",
    });

        valid &= validateField({
      fieldId: "#experience",
      errorId: "#error_experience",
      message: "experience is required.",
    });

        valid &= validateField({
      fieldId: "#location",
      errorId: "#error_location",
      message: "location is required.",
    });
  

    if (!valid) {
      $btn.prop("disabled", false).text("Save");
      return;
    } else {
      $btn.prop("disabled", true).text("Saving...");
    }

    // Prepare FormData
    const formData = new FormData();
    formData.append("job", $("#job").val());
    formData.append("description", $("#description").val());
    formData.append("experience", $("#experience").val());
    formData.append("location", $("#location").val());
    const saveUrl = base_url + "admin/Careers/save";

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
              base_url + "admin/Careers/";
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
  $("#update_job").on("click", function (e) {
    e.preventDefault();
    const $btn = $(this);
    // Get form values
    let valid = true;
    
       valid &= validateField({
      fieldId: "#edit_job",
      errorId: "#error_edit_job",
      message: "job  is required.",
    });

    valid &= validateField({
      fieldId: "#edit_description",
      errorId: "#error_edit_description",
      message: "description  is required.",
    });


        valid &= validateField({
      fieldId: "#edit_experience",
      errorId: "#error_edit_experience",
      message: "experience  is required.",
    });


            valid &= validateField({
      fieldId: "#edit_location",
      errorId: "#error_edit_location",
      message: "location  is required.",
    });
  
  
    // Prepare FormData
    const formData = new FormData();
    formData.append("edit_id", $("#edit_id").val());
    formData.append("job", $("#edit_job").val());
    formData.append("description", $("#edit_description").val());
    formData.append("experience", $("#edit_experience").val());
    formData.append("location", $("#edit_location").val());
    const saveUrl = base_url + "admin/Careers/update_career";
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
              base_url + "admin/Careers/";
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

//checkbox

   $(".is-active-career-checkbox").on("change", function () {
    var id = $(this).data("id");
    var is_active = $(this).is(":checked") ? 1 : 0;
    $.ajax({
      url: base_url + "admin/Careers/update_career_status",
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
