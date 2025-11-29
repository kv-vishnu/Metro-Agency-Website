import "../js/components/move-to-top.js";

//ASSOCIATE OR BRAND
//SLIDER
//#region EXPERTS
//TESTIMONIALS
//HOME PAGE INTRODUCTION
//HOME PAGE CERTIFICATION AND TRAININGS SECTION
//GALLERY
//BATCHES
//VIDEO
//#region SUBJECT COURSE
//Seo content update
//SAVE META TAG DETAILS
// Add Row
$(document).ready(function () {
  //alert(11);

  let base_url = $("#base_url").val();

  //Seo content update
  $("#editor").summernote({
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
    callbacks: {
      onChange: function (contents, $editable) {
        const id = $("#editor").data("id");
        $.ajax({
          url: base_url + "admin/Course/                             ",
          type: "POST",
          data: { id, content: contents },
          success: function (response) {
            $("#SeoSuccessMsg").text("content updated");
            setTimeout(() => {
              $("#SeoSuccessMsg").text("");
            }, 2000);
          },
          error: function (xhr, status, error) {
            console.error("Update failed:", error);
          },
        });
      },
    },
  });







  //##################################################################################################

  //#region EXPERTS

  $("#add-expert").on("click", function (e) {
    e.preventDefault();
    // Clear previous errors
    $("#error_name_expert").text("");
    $("#error_role_expert").text("");
    $("#error_remark_expert").text("");
    $("#error_image_expert").text("");

    // Get input values
    const name = $.trim($("#expert-name").val());
    const role = $.trim($("#expert-role").val());
    const alt = $.trim($("#alt-expert-name").val());
    const remark = $.trim($("#expert-remark").val());
    const image = $("#expertImage")[0].files[0];

    let valid = true;

    // Validation
    if (!name) {
      $("#error_name_expert").text("Name is required.");
      valid = false;
    }

    if (!role) {
      $("#error_role_expert").text("Role is required.");
      valid = false;
    }

    if (!remark) {
      $("#error_remark_expert").text("Remark is required.");
      valid = false;
    }

    if (!image) {
      $("#error_image_expert").text("Image is required.");
      valid = false;
    } else {
      const allowedExtensions = ["webp", "avif", "svg"];
      const fileExtension = image.name.split(".").pop().toLowerCase();
      if (!allowedExtensions.includes(fileExtension)) {
        $("#error_image_expert").text(
          "Only WEBP, AVIF, or SVG formats are allowed."
        );
        valid = false;
      }
    }

    if (!valid) return;

    // Prepare form data
    const formData = new FormData();
    formData.append("name", name);
    formData.append("role", role);
    formData.append("alt", alt);
    formData.append("remark", remark);
    formData.append("image", image);

    const saveUrl = base_url + "admin/Experts/save";

    // Send AJAX request
    $.ajax({
      url: saveUrl,
      type: "POST",
      data: formData,
      processData: false, // Prevent jQuery from processing the data
      contentType: false, // Prevent jQuery from setting content type
      dataType: "json",
      success: function (response) {
        if (response.status) {
          $("#expertSuccessMsg").text(response.message);
          setTimeout(() => {
            $("#addExpertsModal").modal("hide");
            location.reload();
          }, 2000); // delay reload
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

  //Edit Experts popup
  $(".update_expert").on("click", function () {
    var id = $(this).data("id");
    var name = $(this).data("name");
    var role = $(this).data("role");
    var alt = $(this).data("alt");
    var remark = $(this).data("remark");
    var image = $(this).data("image");

    // Populate modal fields
    $("#id_expert").val(id);
    $("#name_expert").val(name);
    $("#role_expert").val(role);
    $("#edit-alt-expert-name").val(alt);
    $("#remark_expert").val(remark);
    $("#old_image_expert").val(image);
    $("#edit-image-preview-expert").attr(
      "src",
      base_url + "uploads/experts/" + image
    );
  });

  //Update form submission after edit
  $("#update_expert_btn").on("click", function (e) {
    e.preventDefault();
    // Clear previous errors
    $("#error_name_update_expert").text("");
    $("#error_role_update_expert").text("");
    $("#error_remark_update_expert").text("");
    $("#error_image_update_expert").text("");

    // Get input values
    const edit_id = $.trim($("#id_expert").val());
    const name = $.trim($("#name_expert").val());
    const role = $.trim($("#role_expert").val());
    const alt = $.trim($("#edit-alt-expert-name").val());
    const remark = $.trim($("#remark_expert").val());
    const old_image_expert = $.trim($("#old_image_expert").val());
    const image = $("#expertImage_update")[0].files[0];

    let valid = true;

    // Validation
    if (!name) {
      $("#error_name_update_expert").text("Name is required.");
      valid = false;
    }
    // Validation
    if (!role) {
      $("#error_role_update_expert").text("Role is required.");
      valid = false;
    }
    if (!remark) {
      $("#error_remark_update_expert").text("Remark is required.");
      valid = false;
    }

    if (image) {
      const allowedExtensions = ["webp", "avif", "svg"];
      const fileExtension = image.name.split(".").pop().toLowerCase();
      if (!allowedExtensions.includes(fileExtension)) {
        $("#error_image_update_expert").text(
          "Only WEBP, AVIF, or SVG formats are allowed."
        );
        valid = false;
      }
    }

    if (!valid) return;

    // Prepare form data
    const formData = new FormData();
    formData.append("edit_id", edit_id);
    formData.append("name", name);
    formData.append("role", role);
    formData.append("alt", alt);
    formData.append("remark", remark);
    formData.append("old_image_expert", old_image_expert);
    formData.append("expertImage_update", image);

    const saveExpertUrl = base_url + "admin/Experts/update";

    // Send AJAX request
    $.ajax({
      url: saveExpertUrl,
      type: "POST",
      data: formData,
      processData: false, // Prevent jQuery from processing the data
      contentType: false, // Prevent jQuery from setting content type
      dataType: "json",
      success: function (response) {
        if (response.status) {
          $("#expertUpdateMsg").text(response.message);
          setTimeout(() => {
            $("#editExpertModal").modal("hide");
            location.reload();
          }, 2000); // delay reload
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

  //Delete expert
  $(".delete-expert").on("click", function () {
    var name = $(this).data("name");
    var id = $(this).data("id");
    $("#delete_expert_id").val(id);
    $("#deleteExpertModal .modal-body strong").text(name);
  });
  $(".delete-expert-btn").on("click", function (e) {
    var expertId = $("#delete_expert_id").val();
    const deleteexpertUrl = base_url + "admin/experts/delete";
    $.ajax({
      url: deleteexpertUrl, // adjust to your actual route
      type: "POST",
      data: { id: expertId },
      dataType: "json",
      success: function (response) {
        if (response.status) {
          $("#expertDeleteMsg").text(response.message).show();
          setTimeout(() => {
            $("#deleteExpertModal").modal("hide");
            location.reload();
          }, 2000); // delay reload
        } else {
          $("#expertDeleteMsg")
            .text(response.message || "Failed to delete.")
            .show();
        }
      },
      error: function (xhr) {
        alert("Error deleting slider");
      },
    });
  });

  //##################################################################################################

  //TESTIMONIALS
  $("#add-testimonial").on("click", function (e) {
    e.preventDefault();
    // Clear previous errors
    $("#error_name_testimonial").text("");
    $("#error_position_testimonial").text("");
    $("#error_company_testimonial").text("");
    $("#error_remark_testimonial").text("");
    $("#error_image_testimonial").text("");

    // Get input values
    const name = $.trim($("#testimonial-name").val());
    const position = $.trim($("#testimonial-position").val());
    const company = $.trim($("#testimonial-company").val());
    const remark = $.trim($("#testimonial-remark").val());
    const alt = $.trim($("#testimonial-alt").val());
    const image = $("#testimonialImage")[0].files[0];

    let valid = true;

    // Validation
    if (!name) {
      $("#error_name_testimonial").text("Name is required.");
      valid = false;
    }

    if (!position) {
      $("#error_position_testimonial").text("Position is required.");
      valid = false;
    }

    if (!company) {
      $("#error_company_testimonial").text("Company is required.");
      valid = false;
    }

    if (!remark) {
      $("#error_remark_testimonial").text("Remark is required.");
      valid = false;
    }

    if (!image) {
      $("#error_image_testimonial").text("Image is required.");
      valid = false;
    } else {
      const allowedExtensions = ["webp", "avif", "svg"];
      const fileExtension = image.name.split(".").pop().toLowerCase();
      if (!allowedExtensions.includes(fileExtension)) {
        $("#error_image_testimonial").text(
          "Only WEBP, AVIF, or SVG formats are allowed."
        );
        valid = false;
      }
    }

    if (!valid) return;

    // Prepare form data
    const formData = new FormData();
    formData.append("name", name);
    formData.append("position", position);
    formData.append("company", company);
    formData.append("description", remark);
    formData.append("alt", alt);
    formData.append("image", image);

    const saveUrl = base_url + "admin/testimonial/save";

    // Send AJAX request
    $.ajax({
      url: saveUrl,
      type: "POST",
      data: formData,
      processData: false, // Prevent jQuery from processing the data
      contentType: false, // Prevent jQuery from setting content type
      dataType: "json",
      success: function (response) {
        if (response.status) {
          $("#testimonialSuccessMsg").text(response.message);
          setTimeout(() => {
            $("#addTestimonialsModal").modal("hide");
            location.reload();
          }, 2000); // delay reload
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

  //Edit Experts popup
  $(".update_testimonial").on("click", function () {
    var id = $(this).data("id");
    var name = $(this).data("name");
    var role = $(this).data("position");
    var company = $(this).data("company");
    var remark = $(this).data("description");
    var alt = $(this).data("alt");
    var image = $(this).data("image");

    // Populate modal fields
    $("#id_testimonial").val(id);
    $("#name_testimonial").val(name);
    $("#role_testimonial").val(role);
    $("#company_testimonial").val(company);
    $("#remark_testimonial").val(remark);
    $("#edit-testimonial-alt").val(alt);
    $("#old_image_testimonial").val(image);
    $("#edit-image-preview-testimonial").attr(
      "src",
      base_url + "uploads/testimonials/" + image
    );
  });

  //Update form submission after edit
  $("#update_testimonial_btn").on("click", function (e) {
    e.preventDefault();
    // Clear previous errors
    $("#error_name_update_testimonial").text("");
    $("#error_role_update_testimonial").text("");
    $("#error_remark_update_testimonial").text("");
    $("#error_company_update_testimonial").text("");

    // Get input values
    const edit_id = $.trim($("#id_testimonial").val());
    const name = $.trim($("#name_testimonial").val());
    const role = $.trim($("#role_testimonial").val());
    const company = $.trim($("#company_testimonial").val());
    const remark = $.trim($("#remark_testimonial").val());
    const alt = $.trim($("#edit-testimonial-alt").val());
    const old_image_testimonial = $.trim($("#old_image_testimonial").val());
    const image = $("#testimonialImage_update")[0].files[0];

    let valid = true;

    // Validation
    if (!name) {
      $("#error_name_update_testimonial").text("Name is required.");
      valid = false;
    }
    // Validation
    if (!role) {
      $("#error_role_update_testimonial").text("Role is required.");
      valid = false;
    }
    if (!remark) {
      $("#error_remark_update_testimonial").text("Remark is required.");
      valid = false;
    }

    if (!company) {
      $("#error_company_update_testimonial").text("Company is required.");
      valid = false;
    }
    if (image) {
      const allowedExtensions = ["webp", "avif", "svg"];
      const fileExtension = image.name.split(".").pop().toLowerCase();
      if (!allowedExtensions.includes(fileExtension)) {
        $("#error_image_update_testimonial").text(
          "Only WEBP, AVIF, or SVG formats are allowed."
        );
        valid = false;
      }
    }

    if (!valid) return;

    // Prepare form data
    const formData = new FormData();
    formData.append("edit_id", edit_id);
    formData.append("name", name);
    formData.append("position", role);
    formData.append("company", company);
    formData.append("description", remark);
    formData.append("alt", alt);
    formData.append("old_image_testimonial", old_image_testimonial);
    formData.append("testimonialImage_update", image);

    const savetestimonialUrl = base_url + "admin/testimonial/update";

    // Send AJAX request
    $.ajax({
      url: savetestimonialUrl,
      type: "POST",
      data: formData,
      processData: false, // Prevent jQuery from processing the data
      contentType: false, // Prevent jQuery from setting content type
      dataType: "json",
      success: function (response) {
        if (response.status) {
          $("#testimonialUpdateMsg").text(response.message);
          setTimeout(() => {
            $("#editTestimonialModal").modal("hide");
            location.reload();
          }, 2000); // delay reload
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

  //Delete testimonial
  $(".delete-testimonial").on("click", function () {
    var name = $(this).data("name");
    var id = $(this).data("id");
    $("#delete_testimonial_id").val(id);
    $("#deleteTestimonialModal .modal-body strong").text(name);
  });
  $(".delete-testimonial-btn").on("click", function (e) {
    var testimonialId = $("#delete_testimonial_id").val();
    const deletetestimonialUrl = base_url + "admin/testimonial/delete";
    $.ajax({
      url: deletetestimonialUrl, // adjust to your actual route
      type: "POST",
      data: { id: testimonialId },
      dataType: "json",
      success: function (response) {
        if (response.status) {
          $("#testimonialDeleteMsg").text(response.message).show();
          setTimeout(() => {
            $("#deleteTestimonialModal").modal("hide");
            location.reload();
          }, 2000); // delay reload
        } else {
          $("#expertDeleteMsg")
            .text(response.message || "Failed to delete.")
            .show();
        }
      },
      error: function (xhr) {
        alert("Error deleting slider");
      },
    });
  });
  //##################################################################################################

  //HOME PAGE INTRODUCTION
  $(".update_introduction").on("click", function () {
    var id = $(this).data("id");
    var name = $(this).data("name");
    var title = $(this).data("title");
    var link = $(this).data("link");
    var description = $(this).data("description");

    // Populate modal fields
    $("#id_introduction").val(id);
    $("#name_introduction").val(title);
    $("#description_introduction").val(description);
    $("#link_introduction").val(link);
    $("#old_image_introduction").val(image);
    $("#edit-image-preview-introduction").attr(
      "src",
      base_url + "uploads/widgets/" + image
    );
  });
  //Update form submission after edit
  $("#update_introduction_btn").on("click", function (e) {
    e.preventDefault();
    // Clear previous errors
    $("#error_name_update_introduction").text("");
    $("#error_description_update_introduction").text("");
    $("#error_image_update_introduction").text("");

    // Get input values
    const edit_id = $.trim($("#id_introduction").val());
    const name = $.trim($("#name_introduction").val());
    const description = $.trim($("#description_introduction").val());
    const link = $.trim($("#link_introduction").val());

    let valid = true;

    // Validation
    if (!name) {
      $("#error_name_update_introduction").text("Name is required.");
      valid = false;
    }
    if (!description) {
      $("#error_description_update_introduction").text("Remark is required.");
      valid = false;
    }

    // if (!image) {
    //     $('#error_image_update').text('Image is required.');
    //     valid = false;
    // }

    if (!valid) return;

    // Prepare form data
    const formData = new FormData();
    formData.append("edit_id", edit_id);
    formData.append("title", name);
    formData.append("description", description);
    formData.append("link", link);

    const saveintroductionUrl = base_url + "admin/widget/update_introduction";

    // Send AJAX request
    $.ajax({
      url: saveintroductionUrl,
      type: "POST",
      data: formData,
      processData: false, // Prevent jQuery from processing the data
      contentType: false, // Prevent jQuery from setting content type
      dataType: "json",
      success: function (response) {
        if (response.status) {
          $("#introductionUpdateMsg").text(response.message);
          setTimeout(() => {
            $("#editIntroductionModal").modal("hide");
            location.reload();
          }, 2000); // delay reload
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

  //HOME PAGE CERTIFICATION AND TRAININGS SECTION
  $(".update_certification").on("click", function () {
    var id = $(this).data("id");
    var name = $(this).data("name");
    var title = $(this).data("title");
    var description = $(this).data("description");
    var link = $(this).data("link");
    var image = $(this).data("image");
    var alt = $(this).data("alt");

    // Populate modal fields
    $("#id_certification").val(id);
    $("#name_certification").val(title);
    $("#description_certification").val(description);
    $("#link_certification").val(link);
    $("#alt_certification").val(alt);
    $("#old_image_certification").val(image);
    $("#edit-image-preview-certification").attr(
      "src",
      base_url + "uploads/widgets/" + image
    );
  });

  //Update form submission after edit
  $("#update_certification_btn").on("click", function (e) {
    e.preventDefault();
    // Clear previous errors
    $("#error_name_update_certification").text("");
    $("#error_description_update_certification").text("");
    $("#error_image_update_certification").text("");

    // Get input values
    const edit_id = $.trim($("#id_certification").val());
    const name = $.trim($("#name_certification").val());
    const description = $.trim($("#description_certification").val());
    const link = $.trim($("#link_certification").val());
    const alt = $.trim($("#alt_certification").val());
    const old_image_certification = $.trim($("#old_image_certification").val());
    const image = $("#certificationImage_update")[0].files[0];

    let valid = true;

    // Validation
    if (!name) {
      $("#error_name_update_certification").text("Name is required.");
      valid = false;
    }
    if (!description) {
      $("#error_description_update_certification").text("Remark is required.");
      valid = false;
    }

    if (image) {
      const allowedExtensions = ["webp", "avif", "svg"];
      const fileExtension = image.name.split(".").pop().toLowerCase();
      if (!allowedExtensions.includes(fileExtension)) {
        $("#error_image_update_certification").text(
          "Only WEBP, AVIF, or SVG formats are allowed."
        );
        valid = false;
      }
    }

    if (!valid) return;

    // Prepare form data
    const formData = new FormData();
    formData.append("edit_id", edit_id);
    formData.append("title", name);
    formData.append("description", description);
    formData.append("link", link);
    formData.append("alt", alt);
    formData.append("old_image_certification", old_image_certification);
    formData.append("certificationImage_update", image);

    const savecertificationUrl = base_url + "admin/widget/update_certification";

    // Send AJAX request
    $.ajax({
      url: savecertificationUrl,
      type: "POST",
      data: formData,
      processData: false, // Prevent jQuery from processing the data
      contentType: false, // Prevent jQuery from setting content type
      dataType: "json",
      success: function (response) {
        if (response.status) {
          $("#certificationUpdateMsg").text(response.message);
          setTimeout(() => {
            $("#editcertificationModal").modal("hide");
            location.reload();
          }, 2000); // delay reload
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

  //HOME PAGE CERTIFICATION AND TRAININGS SECTION
  $(".update_corporate").on("click", function () {
    var id = $(this).data("id");
    var name = $(this).data("name");
    var title = $(this).data("title");
    var description = $(this).data("description");
    var link = $(this).data("link");
    var alt = $(this).data("alt");
    var image = $(this).data("image");

    // Populate modal fields
    $("#id_corporate").val(id);
    $("#name_corporate").val(title);
    $("#description_corporate").val(description);
    $("#old_image_corporate").val(image);
    $("#link_corporate").val(link);
    $("#alt_corporate").val(alt);
    $("#edit-image-preview-corporate").attr(
      "src",
      base_url + "uploads/widgets/" + image
    );
  });
  //Update form submission after edit
  $("#update_corporate_btn").on("click", function (e) {
    e.preventDefault();
    // Clear previous errors
    $("#error_name_update_corporate").text("");
    $("#error_description_update_corporate").text("");
    $("#error_image_update_corporate").text("");

    // Get input values
    const edit_id = $.trim($("#id_corporate").val());
    const name = $.trim($("#name_corporate").val());
    const description = $.trim($("#description_corporate").val());
    const link = $.trim($("#link_corporate").val());
    const alt = $.trim($("#alt_corporate").val());
    const old_image_corporate = $.trim($("#old_image_corporate").val());
    const image = $("#corporateImage_update")[0].files[0];

    let valid = true;

    // Validation
    if (!name) {
      $("#error_name_update_corporate").text("Name is required.");
      valid = false;
    }
    if (!description) {
      $("#error_description_update_corporate").text("Remark is required.");
      valid = false;
    }

    // if (!image) {
    //     $('#error_image_update').text('Image is required.');
    //     valid = false;
    // }

    if (!valid) return;

    // Prepare form data
    const formData = new FormData();
    formData.append("edit_id", edit_id);
    formData.append("title", name);
    formData.append("description", description);
    formData.append("link", link);
    formData.append("alt", alt);
    formData.append("old_image_corporate", old_image_corporate);
    formData.append("corporateImage_update", image);

    const savecorporateUrl = base_url + "admin/widget/update_corporate";

    // Send AJAX request
    $.ajax({
      url: savecorporateUrl,
      type: "POST",
      data: formData,
      processData: false, // Prevent jQuery from processing the data
      contentType: false, // Prevent jQuery from setting content type
      dataType: "json",
      success: function (response) {
        if (response.status) {
          $("#corporateUpdateMsg").text(response.message);
          setTimeout(() => {
            $("#editcorporateModal").modal("hide");
            location.reload();
          }, 2000); // delay reload
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

  //##################################################################################################

  //GALLERY
  $("#add-gallery").on("click", function (e) {
    e.preventDefault();
    // Clear previous errors
    $("#error_image_gallery").text("");

    const image = $("#galleryImage")[0].files[0];
    const alt = $("#gallery-alt").val();

    let valid = true;

    if (!image) {
      $("#error_image_gallery").text("Image is required.");
      valid = false;
    } else {
      const allowedExtensions = ["webp", "avif", "svg"];
      const fileExtension = image.name.split(".").pop().toLowerCase();
      if (!allowedExtensions.includes(fileExtension)) {
        $("#error_image_gallery").text(
          "Only WEBP, AVIF, or SVG formats are allowed."
        );
        valid = false;
      }
    }
    if (!valid) return;

    // Prepare form data
    const formData = new FormData();
    formData.append("galleryImage", image);
    formData.append("alt", alt);

    const saveUrl = base_url + "admin/gallery/save";

    // Send AJAX request
    $.ajax({
      url: saveUrl,
      type: "POST",
      data: formData,
      processData: false, // Prevent jQuery from processing the data
      contentType: false, // Prevent jQuery from setting content type
      dataType: "json",
      success: function (response) {
        if (response.status) {
          $("#gallerySuccessMsg").text(response.message);
          setTimeout(() => {
            $("#addGallerysModal").modal("hide");
            location.reload();
          }, 2000); // delay reload
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

  $(".update_gallery").on("click", function () {
    var id = $(this).data("id");
    var image = $(this).data("image");
    var alt = $(this).data("alt");

    // Populate modal fields
    $("#id_gallery").val(id);
    $("#edit-gallery-alt").val(alt);
    $("#old_image_gallery").val(image);
    $("#edit-image-preview-gallery").attr(
      "src",
      base_url + "uploads/gallery/" + image
    );
  });

  //Update form submission after edit
  $("#update_gallery_btn").on("click", function (e) {
    e.preventDefault();
    // Clear previous errors

    // Get input values
    const edit_id = $.trim($("#id_gallery").val());
    const alt = $.trim($("#edit-gallery-alt").val());
    const old_image_gallery = $.trim($("#old_image_gallery").val());
    const image = $("#galleryImage_update")[0].files[0];

    let valid = true;

    if (image) {
      const allowedExtensions = ["webp", "avif", "svg"];
      const fileExtension = image.name.split(".").pop().toLowerCase();
      if (!allowedExtensions.includes(fileExtension)) {
        $("#error_image_update_gallery").text(
          "Only WEBP, AVIF, or SVG formats are allowed."
        );
        valid = false;
      }
    }

    if (!valid) return;

    // Prepare form data
    const formData = new FormData();
    formData.append("edit_id", edit_id);
    formData.append("alt", alt);
    formData.append("old_image_gallery", old_image_gallery);
    formData.append("galleryImage_update", image);

    const savegalleryUrl = base_url + "admin/gallery/update";

    // Send AJAX request
    $.ajax({
      url: savegalleryUrl,
      type: "POST",
      data: formData,
      processData: false, // Prevent jQuery from processing the data
      contentType: false, // Prevent jQuery from setting content type
      dataType: "json",
      success: function (response) {
        if (response.status) {
          $("#galleryUpdateMsg").text(response.message);
          setTimeout(() => {
            $("#editGalleryModal").modal("hide");
            location.reload();
          }, 2000); // delay reload
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

  //Delete gallery
  $(".delete-gallery").on("click", function () {
    var name = $(this).data("name");
    var id = $(this).data("id");
    $("#delete_gallery_id").val(id);
    $("#deleteGalleryModal .modal-body strong").text(name);
  });
  $(".delete-gallery-btn").on("click", function (e) {
    var galleryId = $("#delete_gallery_id").val();
    const deletegalleryUrl = base_url + "admin/gallery/delete";
    $.ajax({
      url: deletegalleryUrl, // adjust to your actual route
      type: "POST",
      data: { id: galleryId },
      dataType: "json",
      success: function (response) {
        if (response.status) {
          $("#galleryDeleteMsg").text(response.message).show();
          setTimeout(() => {
            $("#deleteGalleryModal").modal("hide");
            location.reload();
          }, 2000); // delay reload
        } else {
          $("#expertDeleteMsg")
            .text(response.message || "Failed to delete.")
            .show();
        }
      },
      error: function (xhr) {
        alert("Error deleting slider");
      },
    });
  });

  //BATCHES
  $("#add-batch").on("click", function (e) {
    e.preventDefault();
    // Clear previous errors
    $("#error_batch_title").text("");
    $("#error_date_batch").text("");

    const title = $.trim($("#batchTitle").val());
    const date = $.trim($("#batchDate").val());

    let valid = true;

    if (!title) {
      $("#error_batch_title").text("Batch Name is required.");
      valid = false;
    }
    if (!date) {
      $("#error_date_batch").text("Date is required.");
      valid = false;
    }

    if (!valid) return;

    // Prepare form data
    const formData = new FormData();
    formData.append("title", title);
    formData.append("date", date);

    const saveUrl = base_url + "admin/course/save_batch";

    // Send AJAX request
    $.ajax({
      url: saveUrl,
      type: "POST",
      data: formData,
      processData: false, // Prevent jQuery from processing the data
      contentType: false, // Prevent jQuery from setting content type
      dataType: "json",
      success: function (response) {
        if (response.status) {
          $("#batchSuccessMsg").text(response.message);
          setTimeout(() => {
            $("#addBatchModal").modal("hide");
            location.reload();
          }, 2000); // delay reload
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

  $(".update_batch").on("click", function () {
    var id = $(this).data("id");
    var name = $(this).data("name");
    var date = $(this).data("date");

    // Populate modal fields
    $("#id_batch").val(id);
    $("#name_batch").val(name);
    $("#edit_batchDate").val(date);
  });

  //Update form submission after edit
  $("#update_batch_btn").on("click", function (e) {
    e.preventDefault();
    // Clear previous errors
    $("#error_name_update_batch").text("");
    $("#error_date_update_batch").text("");

    // Get input values
    const edit_id = $.trim($("#id_batch").val());
    const name = $.trim($("#name_batch").val());
    const date = $.trim($("#edit_batchDate").val());

    let valid = true;

    // Validation
    if (!name) {
      $("#error_name_update_batch").text("Name is required.");
      valid = false;
    }
    // Validation
    if (!date) {
      $("#error_date_update_batch").text("Date is required.");
      valid = false;
    }

    if (!valid) return;

    // Prepare form data
    const formData = new FormData();
    formData.append("edit_id", edit_id);
    formData.append("name", name);
    formData.append("date", date);

    const saveExpertUrl = base_url + "admin/Course/update_batch";

    // Send AJAX request
    $.ajax({
      url: saveExpertUrl,
      type: "POST",
      data: formData,
      processData: false, // Prevent jQuery from processing the data
      contentType: false, // Prevent jQuery from setting content type
      dataType: "json",
      success: function (response) {
        if (response.status) {
          $("#batchUpdateMsg").text(response.message);
          setTimeout(() => {
            $("#editBatchModal").modal("hide");
            location.reload();
          }, 2000); // delay reload
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

  //Delete batch
  $(".delete-batch").on("click", function () {
    var name = $(this).data("name");
    var id = $(this).data("id");
    $("#delete_batch_id").val(id);
    $("#deleteBatchModal .modal-body strong").text(name);
  });
  $(".delete-batch-btn").on("click", function (e) {
    var batchId = $("#delete_batch_id").val();
    const deletebatchUrl = base_url + "admin/course/delete_batch";
    $.ajax({
      url: deletebatchUrl, // adjust to your actual route
      type: "POST",
      data: { id: batchId },
      dataType: "json",
      success: function (response) {
        if (response.status) {
          $("#batchDeleteMsg").text(response.message).show();
          setTimeout(() => {
            $("#deleteBatchModal").modal("hide");
            location.reload();
          }, 2000); // delay reload
        } else {
          $("#batchDeleteMsg")
            .text(response.message || "Failed to delete.")
            .show();
        }
      },
      error: function (xhr) {
        alert("Error deleting slider");
      },
    });
  });

  //VIDEO
  //Update form submission after edit
  $(".update-video").on("click", function (e) {
    e.preventDefault();
    // Clear previous errors
    $("#error_video_image").text("");
    $("#error_video").text("");

    // Get input values
    const edit_id = 1;
    const image = $("#posterFile")[0].files[0];
    const video = $("#videoFile")[0].files[0];

    let valid = true;

    if (!image) {
      $("#error_video_image").text("Image is required.");
      valid = false;
    }
    if (!video) {
      $("#error_video").text("Video is required.");
      valid = false;
    }

    if (!valid) return;

    alert(video.size);

    // Prepare form data
    const formData = new FormData();
    formData.append("edit_id", edit_id);
    formData.append("poster", image);
    formData.append("video", video);

    const saveVideoUrl = base_url + "admin/Video/update";

    // Send AJAX request
    $.ajax({
      url: saveVideoUrl,
      type: "POST",
      data: formData,
      processData: false, // Prevent jQuery from processing the data
      contentType: false, // Prevent jQuery from setting content type
      dataType: "json",
      success: function (response) {
        if (response.status) {
          $("#videoSuccessMsg").text(response.message);
          setTimeout(() => {
            $("#uploadVideoModal").modal("hide");
            location.reload();
          }, 2000); // delay reload
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

  //##################################################################################################

  //#region SUBJECT COURSE
  $("#add-subjectcourse").on("click", function (e) {
    e.preventDefault();
    // Clear previous errors
    $("#error_name_subjectcourse").text("");
    $("#error_description_subjectcourse").text("");
    $("#error_image_subjectcourse").text("");

    // Get input values
    const name = $.trim($("#subjectcourse-name").val());
    const alt = $.trim($("#subjectcourse-alt").val());
    const description = $.trim($("#subjectcourse-description").val());
    const image = $("#subjectcourseImage")[0].files[0];


    let valid = true;

    // Validation
    if (!name) {
      $("#error_name_subjectcourse").text("Name is required.");
      valid = false;
    }

    if (!description) {
      $("#error_description_subjectcourse").text("Description is required.");
      valid = false;
    }

    if (!image) {
      $("#error_image_subjectcourse").text("Image is required.");
      valid = false;
    } else {
      const allowedExtensions = ["webp", "avif", "svg"];
      const fileExtension = image.name.split(".").pop().toLowerCase();
      if (!allowedExtensions.includes(fileExtension)) {
        $("#error_image_subjectcourse").text(
          "Only WEBP, AVIF, or SVG formats are allowed."
        );
        valid = false;
      }
    }

    if (!valid) return;

    // Prepare form data
    const formData = new FormData();
    formData.append("name", name);
    formData.append("alt", alt);
    formData.append("description", description);
    formData.append("image", image);

    const saveUrl = base_url + "admin/Course/save_sourse_subject";

    // Send AJAX request
    $.ajax({
      url: saveUrl,
      type: "POST",
      data: formData,
      processData: false, // Prevent jQuery from processing the data
      contentType: false, // Prevent jQuery from setting content type
      dataType: "json",
      success: function (response) {
        if (response.status) {
          $("#subjectcourseSuccessMsg").text(response.message);
          setTimeout(() => {
            $("#addsubjectcourseModal").modal("hide");
            location.reload();
          }, 2000); // delay reload
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

  //Edit Experts popup
  $(".update_subjectcourse").on("click", function () {
    var id = $(this).data("id");
    var name = $(this).data("name");
    var slug = $(this).data("slug");
    var schema = $(this).data("schema");
    var meta_title = $(this).data("meta_title");
    var rel_canonical = $(this).data("rel_canonical");
    var meta_keywords = $(this).data("meta_keywords");
    var meta_description = $(this).data("meta_description");
    var alt = $(this).data("alt");
    var course_overview = $(this).data("course_overview");
    var course_faq = $(this).data("course_faq");
    var image = $(this).data("image");


    // Populate modal fields
    $("#id_coursesubject").val(id);
    $("#name_coursesubject").val(name);
    $("#metatitle_coursesubject").val(meta_title);
    $("#metakeywords_coursesubject").val(meta_keywords);
    $("#metaslug_coursesubject").val(slug);
    $("#schema_coursesubject").val(schema);
    $("#metadescription_coursesubject").val(meta_description);
    $("#relcanonical_coursesubject").val(rel_canonical);
    $("#edit_subjectcourse-alt").val(alt);
    $("#edit_subjectcourse_overview").summernote("code", course_overview);
    $("#edit_subjectcourse_faq").summernote("code", course_faq);
    $("#old_image_coursesubject").val(image);
    $("#edit-image-preview-coursesubject").attr(
      "src",
      base_url + "uploads/subject_courses/" + image
    );
  });

  //Update form submission after edit
  $("#update_subjectcourse_btn").on("click", function (e) {
    e.preventDefault();
    // Clear previous errors
    $("#error_name_update_coursesubject").text("");
    $("#error_description_update_coursesubject").text("");
    $("#error_image_update_coursesubject").text("");

    // Get input values
    const edit_id = $.trim($("#id_coursesubject").val());
    const name = $.trim($("#name_coursesubject").val());
    const metatitle = $.trim($("#metatitle_coursesubject").val());
    const metakeywords = $.trim($("#metakeywords_coursesubject").val());
    const meta_description = $.trim($("#metadescription_coursesubject").val());
    const rel_canonical = $.trim($("#relcanonical_coursesubject").val());
    const slug = $.trim($("#metaslug_coursesubject").val());
    const schema = $.trim($("#schema_coursesubject").val());
    const course_overview = $("#edit_subjectcourse_overview").summernote("code");
    const course_faq = $("#edit_subjectcourse_faq").summernote("code");
    const alt = $.trim($("#edit_subjectcourse-alt").val());
    const old_image_coursesubject = $.trim($("#old_image_coursesubject").val());
    const image = $("#coursesubjectImage_update")[0].files[0] ?? null;


    let valid = true;

    // Validation
    if (!name) {
      $("#error_name_update_coursesubject").text("Name is required.");
      valid = false;
    }
    // if (!description) {
    //   $("#error_description_update_coursesubject").text(
    //     "Description is required."
    //   );
    //   valid = false;
    // }
    if (image) {
      const allowedExtensions = ["webp", "avif", "svg"];
      const fileExtension = image.name.split(".").pop().toLowerCase();
      if (!allowedExtensions.includes(fileExtension)) {
        $("#error_image_update_coursesubject").text(
          "Only WEBP, AVIF, or SVG formats are allowed."
        );
        valid = false;
      }
    }

    if (!valid) return;

    // Prepare form data
    const formData = new FormData();
    formData.append("edit_id", edit_id);
    formData.append("name", name);
    formData.append("metatitle", metatitle);
    formData.append("metakeywords", metakeywords);
    formData.append("meta_description", meta_description);
    formData.append("rel_canonical", rel_canonical);
    formData.append("slug", slug);
    formData.append("schema", schema);
    formData.append("course_overview", course_overview);
    formData.append("course_faq", course_faq);
    formData.append("alt", alt);
    formData.append("old_image_coursesubject", old_image_coursesubject);
    formData.append("coursesubjectImage_update", image);


    const savetestimonialUrl = base_url + "admin/Course/update_course_subject";

    // Send AJAX request
    $.ajax({
      url: savetestimonialUrl,
      type: "POST",
      data: formData,
      processData: false, // Prevent jQuery from processing the data
      contentType: false, // Prevent jQuery from setting content type
      dataType: "json",
      success: function (response) {
        if (response.status) {
          $("#coursesubjectUpdateMsg").text(response.message);
          setTimeout(() => {
            $("#editSubjectcourseModal").modal("hide");
          }, 2000); // delay reload
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

  //Delete testimonial
  $(".delete-subjectcourse").on("click", function () {
    var name = $(this).data("name");
    var id = $(this).data("id");
    $("#delete_coursesubject_id").val(id);
    $("#deleteSubjectcourseModal .modal-body strong").text(name);
  });
  $(".delete-coursesubject-btn").on("click", function (e) {
    var testimonialId = $("#delete_coursesubject_id").val();
    const deletetestimonialUrl =
      base_url + "admin/course/delete_course_subject";
    $.ajax({
      url: deletetestimonialUrl, // adjust to your actual route
      type: "POST",
      data: { id: testimonialId },
      dataType: "json",
      success: function (response) {
        if (response.status) {
          $("#testimonialDeleteMsg").text(response.message).show();
          setTimeout(() => {
            $("#deleteSubjectcourseModal").modal("hide");
            location.reload();
          }, 2000); // delay reload
        } else {
          $("#expertDeleteMsg")
            .text(response.message || "Failed to delete.")
            .show();
        }
      },
      error: function (xhr) {
        alert("Error deleting slider");
      },
    });
  });
  //##################################################################################################

  //SAVE META TAG DETAILS
  $(document).on("click", "#saveMeta", function () {
    var pageId = $(this).data("page-id");
    var title = $("#title").val();
    var metatitle = $("#metatitle").val();
    var canonical = $("#canonical").val();
    var slug = $("#metaSlug").val();
    var keywords = $("#metaKeywords").val();
    var description = $("#metaDescription").val();
    var page_schema = $("#page_schema").val();
    // alert(title);alert(keywords);alert(description);

    $.ajax({
      url: base_url + "admin/PageBuilder/save_meta_info", // Adjust path if needed
      type: "POST",
      data: {
        page_id: pageId,
        metatitle: metatitle,
        title: title,
        canonical: canonical,
        slug: slug,
        metakeywords: keywords,
        metadescription: description,
        page_schema: page_schema,
      },
      success: function (response) {
        $("#metaSuccessMsg").text("Meta information saved successfully!");
        setTimeout(() => {
          location.reload();
        }, 2000); // delay reload
      },
      error: function (xhr) {
        alert("Error saving data.");
      },
    });
  });

  // Add Row
  $(document).on("click", ".addContainer", function () {
    alert("row");
    const pageId = $(this).data("page");
    const sectionId = $(this).data("section"); // Assume data-section is set
    alert(sectionId);
    $.post(
      base_url + "admin/PageBuilder/addContainer",
      {
        page_id: pageId,
        section_id: sectionId, // pass second parameter
      },
      function (response) {
        load_dynamic_contents(pageId);
      }
    );
  });

  // Add Row Container
  $(document).on("click", ".addRowContainer", function () {
    alert("row");
    const pageId = $(this).data("page");
    const sectionId = $(this).data("section"); // Assume data-section is set
    const containerId = $(this).data("container");
    alert(sectionId);
    $.post(
      base_url + "admin/PageBuilder/addRowContainer",
      {
        page_id: pageId,
        section_id: sectionId, // pass second parameter
        container_id: containerId,
      },
      function (response) {
        load_dynamic_contents(pageId);
      }
    );
  });

  // Add Column
  $(document).on("click", ".addColumn", function () {
    let container_id = $(this).data("container");
    let page_id = $(this).data("page");
    let row_id = $(this).data("row");
    $.post(
      base_url + "admin/PageBuilder/addColumn",
      {
        container_id: container_id,
        page_id: page_id,
        row_id: row_id,
      },
      function (response) {
        load_dynamic_contents(page_id);
      }
    );
  });

  // Remove Element
  $(document).on("click", ".remove-element", function () {
    let element_id = $(this).data("id");
    $(`#element_${element_id}`).remove();
  });

  //Add section class
  $(document).on("click", ".addSectionClass", function () {
    let section_class = $(this).data("class");
    let section_id = $(this).data("section");
    $("#selected_section_id_class").val(section_id);
    $("#selected_class").val(section_class);
    $("#customCssClass").val(section_class);
    $("#changeClassModal").modal("show");
  });

  $("#updateClass").on("click", function () {
    const section_id = $("#selected_section_id_class").val(); // section id
    const newClass = $("#customCssClass").val(); // New class name entered

    $.ajax({
      url: base_url + "admin/PageBuilder/updateSectionClass",
      type: "POST",
      data: {
        section_id: section_id,
        class: newClass,
      },
      dataType: "json",
      success: function (response) {
        if (response.status == "success") {
          $("#changeClassModal").modal("hide");
          location.reload();
        }
      },
      error: function () {
        alert("An error occurred while updating column width.");
      },
    });
  });
  //Add section class

  //Add container Class
  $(document).on("click", ".addContainerClass", function () {
    let container_class = $(this).data("class");
    let container_id = $(this).data("container");
    $("#selected_container_id_class").val(container_id);
    $("#selected_container_class").val(container_class);
    $("#customCssContainerClass").val(container_class);
    $("#changeClassContainerModal").modal("show");
  });

  $("#updateContainerClass").on("click", function () {
    const container_id = $("#selected_container_id_class").val(); // section id
    const newClass = $("#customCssContainerClass").val(); // New class name entered

    $.ajax({
      url: base_url + "admin/PageBuilder/updateContainerClass",
      type: "POST",
      data: {
        container_id: container_id,
        class: newClass,
      },
      dataType: "json",
      success: function (response) {
        if (response.status == "success") {
          $("#changeClassModal").modal("hide");
          location.reload();
        }
      },
      error: function () {
        alert("An error occurred while updating column width.");
      },
    });
  });

  //Add coloumn class
  $(document).on("click", ".ColoumnClass", function () {
    let coloumn_class = $(this).data("class");
    let column_id = $(this).data("column-id");
    $("#selected_coloumn_id_class").val(column_id);
    $("#selected_coloumn_class").val(coloumn_class);
    $("#customColoumnCssClass").val(coloumn_class);
    $("#changeColoumnClassModal").modal("show");
  });

  $("#updateColoumnClass").on("click", function () {
    const coloumn_id = $("#selected_coloumn_id_class").val(); // section id
    const newClass = $("#customColoumnCssClass").val(); // New class name entered

    $.ajax({
      url: base_url + "admin/PageBuilder/updateColoumnClass",
      type: "POST",
      data: {
        coloumn_id: coloumn_id,
        class: newClass,
      },
      dataType: "json",
      success: function (response) {
        if (response.status == "success") {
          $("#changeColoumnClassModal").modal("hide");
          location.reload();
        }
      },
      error: function () {
        alert("An error occurred while updating column width.");
      },
    });
  });
  //Add coloumn class

  // Open modal to select element type
  $(document).on("click", ".addElement", function () {
    //alert('element');
    let column_id = $(this).data("column");
    let section_id = $(this).data("section");
    let row_id = $(this).data("container");
    $("#selected_colomn_id").val(column_id);
    $("#selected_section_id").val(section_id);
    $("#selected_row_id").val(row_id);
    $("#elementType").val("select"); // Reset dropdown
    $("#elementContent input, #elementContent textarea").addClass("d-none"); // Hide inputs
    $("#addElementModal").modal("show");
  });

  // Show input field based on selection
  $("#elementType").change(function () {
    $("#elementContent input, #elementContent textarea").addClass("d-none");
    let selectedType = $(this).val();
    if (selectedType === "text") {
      $("#textInput").removeClass("d-none");
    } else if (selectedType === "textarea") {
      $("#textareaInput").removeClass("d-none");
    } else if (selectedType === "image") {
      $("#imageInput").removeClass("d-none");
    } else if (selectedType === "link") {
      $("#buttonText, #buttonLink").removeClass("d-none");
    } else if (selectedType === "loop") {
      $("#loopCount").removeClass("d-none"); // Show loop count field
    } else if (selectedType === "loop_with_image") {
      $("#loop_with_image_Count").removeClass("d-none"); // Show loop with image count field
    } else if (selectedType === "slider") {
      $("#sliderSelect").removeClass("d-none"); // Show slider select
    } else if (selectedType === "widgets") {
      $("#widgetsSelect").removeClass("d-none"); // Show slider select
    } else if (selectedType === "courses") {
      saveData("courses");
    } else if (selectedType === "associates") {
      saveData("associates");
    } else if (selectedType === "tutor") {
      saveData("tutor");
    }
  });

  function saveData(type) {
    alert(type);
  }

  // Generate dynamic inputs on entering loop count
  $("#loopCount").on("blur", function () {
    const count = parseInt($(this).val()) || 0;
    $("#loopContent").remove();

    if (count > 0) {
      const container = $('<div id="loopContent" class="mt-3"></div>');
      for (let i = 0; i < count; i++) {
        const inputGroup = $(`
                    <div class="mb-3">
                        <input type="text" class="form-control mb-2 loop-item" placeholder="Loop Text ${
                          i + 1
                        }">
                        <textarea class="form-control loop-item" rows="3" placeholder="Loop Textarea ${
                          i + 1
                        }"></textarea>
                    </div>
                `);
        container.append(inputGroup);
      }
      $("#elementContent").append(container);
    }
  });

  // Generate dynamic inputs on entering loop count
  $("#loop_with_image_Count").on("blur", function () {
    const count = parseInt($(this).val()) || 0;
    $("#loopContentWithImage").remove();

    if (count > 0) {
      const container = $('<div id="loopContentWithImage" class="mt-3"></div>');
      for (let i = 0; i < count; i++) {
        const inputGroup = $(`
                <div class="mb-4 border p-3 rounded">
                    <label><strong>Item ${i + 1}</strong></label>
                    <input type="text" name="loop_image_text[]" class="form-control mb-2" placeholder="Loop Text ${
                      i + 1
                    }">
                    <textarea name="loop_image_textarea[]" class="form-control mb-2" rows="3" placeholder="Loop Textarea ${
                      i + 1
                    }"></textarea>
                    <input type="file" name="loop_image_file[]" class="form-control mb-2">
                </div>
            `);
        container.append(inputGroup);
      }
      $("#elementContent").append(container);
    }
  });

  // Save Element to Database
  $(document).on("click", "#saveElement", function () {
    let page_id = $(this).data("page");
    let rowId = $("#selected_row_id").val();
    let section_id = $("#selected_section_id").val();
    let column_id = $("#selected_colomn_id").val();
    let type = $("#elementType").val();
    let formData = new FormData();
    formData.append("section_id", section_id);
    formData.append("page_id", page_id);
    formData.append("row_id", rowId);
    formData.append("column_id", column_id);
    formData.append("type", type);

    if (type === "text") {
      formData.append("content", $("#textInput").val());
    } else if (type === "textarea") {
      formData.append("content", $("#textareaInput").val());
    } else if (type === "image") {
      let imageFile = $("#imageInput")[0].files[0];
      if (imageFile) {
        formData.append("image", imageFile);
      }
    } else if (type === "link") {
      formData.append("button_text", $("#buttonText").val());
      formData.append("button_link", $("#buttonLink").val());
    } else if (type === "loop") {
      const loopItems = [];

      $("#loopContent .mb-3").each(function () {
        const text = $(this).find("input.loop-item").val();
        const textarea = $(this).find("textarea.loop-item").val();

        loopItems.push({
          text: text,
          textarea: textarea,
        });
      });

      // console.log(loopItems);
      formData.append("loop_content", JSON.stringify(loopItems));
    } else if (type === "loop_with_image") {
      $("#loopContentWithImage .mb-4").each(function (index) {
        const text = $(this).find('input[name="loop_image_text[]"]').val();
        const textarea = $(this)
          .find('textarea[name="loop_image_textarea[]"]')
          .val();
        const imageInput = $(this).find('input[name="loop_image_file[]"]')[0];

        // Append each text and textarea to FormData
        formData.append("loop_image_text[]", text);
        formData.append("loop_image_textarea[]", textarea);

        // Append the image file (or empty if none selected)
        if (imageInput && imageInput.files.length > 0) {
          formData.append("loop_image_file[]", imageInput.files[0]);
        } else {
          // Still append something to maintain array structure
          formData.append("loop_image_file[]", new File([], ""));
        }
      });
    } else if (type === "slider") {
      let selectedSlider = $("#sliderSelect").val();
      formData.append("content", selectedSlider);
    } else if (type === "widgets") {
      let selectedWidget = $("#widgetsSelect").val();
      formData.append("content", selectedWidget);
    }

    $.ajax({
      url: base_url + "admin/PageBuilder/addElement",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      dataType: "json",
      success: function (response) {
        load_dynamic_contents(page_id);

        // let elementHTML = '';
        // if (response.type === 'text' || response.type === 'textarea') {
        //     elementHTML = `<div class="element border p-2 mt-2">
        //     <p>${response.content}</p>
        // </div>`;
        // } else if (response.type === 'image') {
        //     elementHTML = `<div class="element border p-2 mt-2">
        //     <img src="${base_url}${response.content}" width="100">
        // </div>`;
        // } else if (response.type === 'link') {
        //     elementHTML = `<div class="element border p-2 mt-2">
        //     <a href="${response.button_link}" class="btn btn-primary">${response.button_text}</a>
        // </div>`;
        // } else if (response.type === 'loop') {
        //     response.loop_items.forEach(function (item) {
        //         elementHTML += `<div class="element border p-2 mt-2">
        //             <p><strong>${item.text}</strong></p>
        //             <p>${item.textarea}</p>
        //         </div>`;
        //     });
        // } else if (response.type === 'loop_with_image') {
        //     response.loop_items.forEach(function (item) {
        //         elementHTML += `<div class="element border p-2 mt-2">
        //             ${item.image ? `<img src="${base_url}${item.image}" class="img-fluid mb-2" alt="Loop Image">` : ''}
        //             <p><strong>${item.text}</strong></p>
        //             <p>${item.textarea}</p>
        //         </div>`;
        //     });
        // } else if (response.type === 'home_page_slider') {
        //     elementHTML = `<div class="element border p-2 mt-2">
        //         <p><strong>Slider:</strong> ${response.content}</p>
        //     </div>`;
        // } else if (response.type === 'associates') {
        //     elementHTML = `<div class="element border p-2 mt-2">
        //         <p><strong>Slider:</strong> ${response.content}</p>
        //     </div>`;
        // } else if (response.type === 'featured_courses') {
        //     elementHTML = `<div class="element border p-2 mt-2">
        //         <p><strong>Slider:</strong> ${response.content}</p>
        //     </div>`;
        // } else if (response.type === 'tutor') {
        //     elementHTML = `<div class="element border p-2 mt-2">
        //         <p><strong>Slider:</strong> ${response.content}</p>
        //     </div>`;
        // } else if (response.type === 'upcoming_batches') {
        //     elementHTML = `<div class="element border p-2 mt-2">
        //         <p><strong>Slider:</strong> ${response.content}</p>
        //     </div>`;
        // } else if (response.type === 'header') {
        //     elementHTML = `<div class="element border p-2 mt-2">
        //         <p><strong>Slider:</strong> ${response.content}</p>
        //     </div>`;
        // } else if (response.type === 'footer') {
        //     elementHTML = `<div class="element border p-2 mt-2">
        //         <p><strong>Slider:</strong> ${response.content}</p>
        //     </div>`;
        // }
        // $(`#column_${column_id} .elements`).append(elementHTML);
        $("#addElementModal").modal("hide");
      },
    });
  });

  // Remove Element
  $(document).on("click", ".remove-element", function () {
    let element_id = $(this).data("id");
    $.post(
      base_url + "admin/PageBuilder/deleteElement",
      {
        element_id: element_id,
      },
      function () {
        $(`#element_${element_id}`).remove();
      }
    );
  });

  // Remove Section
  $(document).on("click", ".deleteSection", function () {
    let section_id = $(this).data("section");
    $.post(
      base_url + "admin/PageBuilder/deleteSection",
      {
        section_id: section_id,
      },
      function () {
        $(`#section_${section_id}`).remove();
      }
    );
  });

  // Remove Coloumn
  $(document).on("click", ".deleteColoumn", function () {
    let column_id = $(this).data("column-id");
    $.post(
      base_url + "admin/PageBuilder/deleteColoumn",
      {
        column_id: column_id,
      },
      function () {
        $(`#coloumn_${column_id}`).remove();
      }
    );
  });

  // Update element
  $(document).on("blur", ".editable", function () {
    let element_id = $(this).data("id");
    let field_type = $(this).data("type");
    let new_value = $(this).val();
    //alert(field_type);

    $.ajax({
      url: base_url + "admin/PageBuilder/updateElement",
      type: "POST",
      data: {
        element_id: element_id,
        field_type: field_type,
        content: new_value,
      },
      dataType: "json",
      success: function (response) {
        if (response.status == "success") {
          alert("Data updated successfully");
        } else {
          alert("Error updating data!");
        }
      },
    });
  });

  // Remove element
  $(document).on("click", ".remove-element", function () {
    let elementId = $(this).data("id");
    let elementDiv = $(this).closest(".element");

    if (confirm("Are you sure you want to delete this element?")) {
      $.ajax({
        url: base_url + "admin/PageBuilder/deleteElement", // Adjust the controller URL
        type: "POST",
        data: {
          id: elementId,
        },
        dataType: "json",
        success: function (response) {
          if (response.success) {
            elementDiv.fadeOut(300, function () {
              $(this).remove();
            });
          } else {
            alert("Failed to delete element.");
          }
        },
        error: function () {
          alert("An error occurred. Please try again.");
        },
      });
    }
  });

  // Change width coloumn
  $(document).on("click", ".change-width", function () {
    const columnId = $(this).data("column-id");
    $("#targetColumnId").val(columnId);
    $("#changeWidthModal").modal("show");
  });

  $("#saveColumnWidth").on("click", function () {
    const columnId = $("#targetColumnId").val();
    const newWidth = $("#columnWidthSelect").val();
    const columnDiv = $("#column_" + columnId);

    // Remove old col-md-* class
    columnDiv.removeClass(function (index, className) {
      return (className.match(/(^|\s)col-md-\d+/g) || []).join(" ");
    });

    // Add new width class
    columnDiv.addClass("col-md-" + newWidth);

    // Optionally update in DB
    $.ajax({
      url: base_url + "admin/PageBuilder/updateColumnWidth",
      type: "POST",
      data: {
        column_id: columnId,
        width: newWidth,
      },
      dataType: "json",
      success: function (response) {
        if (response.status == "success") {
          $("#changeWidthModal").modal("hide");
          location.reload();
        } else {
          alert("Failed to update column width.");
        }
      },
      error: function () {
        alert("An error occurred while updating column width.");
      },
    });
  });


  //#region Page module update on blur
$(".update-field").on("blur", function () {

        var value = $(this).val();
        var id = $(this).data("id");
        var field = $(this).data("field");
        var url = base_url + "admin/PageBuilder/update_module_field";


        $.ajax({
            url: base_url + "admin/PageBuilder/update_module_field",
            type: "POST",
            data: {
                id: id,
                field: field,
                value: value
            },
            dataType: "json",
            success: function (response) {
                        $("#featuredMessage").html(`<div class="alert alert-success alert-dismissible fade show" role="alert">Module updated.</div>`).show();
                        setTimeout(function () {
                          $("#featuredMessage").fadeOut().empty();
                        }, 2000);
            },
            error: function () {
                alert("Update failed.");
            }
        });
    });



    //#region Update page database values
    $(document).on("blur", ".update-table-field", function ()
    {
      var field = $(this).data("field");
      var table = $(this).data("table");
      var id = $(this).data("id");
      var value = $(this).val();

      $.ajax({
          url: base_url + "admin/PageBuilder/update_field", // Your controller method
          method: "POST",
          data: {
              field: field,
              table: table,
              id: id,
              value: value
          },
          success: function (response) {
              $("#featuredMessage").html(`<div class="alert alert-success alert-dismissible fade show" role="alert">Content  updated.</div>`).show();
              setTimeout(function () {
                  $("#featuredMessage").fadeOut().empty();
              }, 2000);
          },
          error: function () {
              alert("Error updating field.");
          }
      });
  });

  //#region Update image edit page form
    $(document).on("change", ".update-table-image", function ()
    {
      var input = this;
      var field = $(this).data("field");
      var table = $(this).data("table");
      var oldimg = $(this).data("oldimg");
      var upload_path = $(this).data("uploadpath");
      var id = $(this).data("id");

      var formData = new FormData();
      formData.append("image", input.files[0]);
      formData.append("field", field);
      formData.append("table", table);
      formData.append("oldimg", oldimg);
      formData.append("upload_path", upload_path);
      formData.append("id", id);

      $.ajax({
          url: base_url + "admin/PageBuilder/update_image",
          method: "POST",
          data: formData,
          contentType: false,
          processData: false,
          success: function (response) {
              $("#featuredMessage").html(`<div class="alert alert-success alert-dismissible fade show" role="alert">Image  updated.</div>`).show();
              setTimeout(function () {
                  $("#featuredMessage").fadeOut().empty();
              }, 2000);
          }
      });
  });

});



  $(".is-active-page-checkbox").on("change", function () {
    var id = $(this).data("id");
    var is_active = $(this).is(":checked") ? 1 : 0;
    $.ajax({
      url: base_url + "admin/PageBuilder/update_status",
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

/* Summer Note Customization: Start */
$("#summernote").summernote({
  height: 300,
});
/* Summer Note Customization: End */


//#region Auto generated slug
function generateSlugFromText(text) {
    return text
        .toLowerCase()
        .trim()
        .replace(/[\s\W-]+/g, '-')  // Replace spaces/special chars with dash
        .replace(/^-+|-+$/g, '');   // Trim leading/trailing dashes
}

function autoGenerateSlug() {
    let category = $('#category').val() || '';
    let subcategory = $('#subcategory').val() || '';
    let title = $('#title').val() || '';

    // Ignore purely numeric values
    let parts = [category, subcategory, title].filter(part => {
        return part && !/^\d+$/.test(part);
    });

    let combinedText = parts.join(' ');

    $('#slug').val(generateSlugFromText(combinedText));
}

$('#title').on('blur', function () {
    autoGenerateSlug();
});







