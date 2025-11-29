$(document).ready(function () {

  $('#courses').select2({ placeholder: "Select Courses" });

  let base_url = $("#base_url").val();

  //autopopulate dropdowns

  var $categorySelect = $("#category");
  var $courseLevelSelect = $("#subcategory");
  var $subsubcategory = $("#subsubcategory");
  var $courseSelect = $("#course");
  var $courseLevelWrapper = $("#course-level-wrapper");
  var $courseLevel2Wrapper = $("#course-level2-wrapper");
  var $coursesWrapper = $("#courses-wrapper");

  $categorySelect.on("change", function () {
    var certId = $(this).val();

    if (certId) {
      $.ajax({
        url: base_url + "admin/Course/get_levels_or_courses",
        method: "POST",
        data: { certification_id: certId },
        dataType: "json",
        success: function (res) {
          reloadCoursesByLocation();
          $courseLevelSelect.html(
            '<option value="">Select Course Level</option>'
          );
          $courseSelect.html('<option value="">Select Course</option>');
          $courseLevelWrapper.hide();
          $coursesWrapper.hide();

          if (res.levels && res.levels.length < 0) {
            $courseLevelWrapper.hide();
          }

          if (res.levels && res.levels.length > 0) {
            $.each(res.levels, function (index, level) {
              $courseLevelSelect.append(
                $("<option>", {
                  value: level.id,
                  text: level.name,
                })
              );
            });
            $courseLevelWrapper.show();

          } else if (res.courses && res.courses.length > 0) {
            $.each(res.courses, function (index, course) {
              $courseSelect.append(
                $("<option>", {
                  value: course.id,
                  text: course.name,
                })
              );
            });
            $coursesWrapper.show();
          }
        },
      });
    } else {
      $courseLevelSelect.empty();
      $courseSelect.empty();
      $courseLevelWrapper.hide();
      $coursesWrapper.hide();
    }
  });

  // Sbcategory select change
  $courseLevelSelect.on("change", function () {
    //alert(11);
    let subcategoryId = $(this).val();//alert(subcategoryId);

    if (subcategoryId) {
      $.ajax({
        url: base_url + "admin/Course/get_subsubcategories",
        method: "POST",
        data: { subcategory_id: subcategoryId },
        dataType: "json",
        success: function (res) {
          $subsubcategory.html('<option value="">Select Sub Subcategory</option>');

          if (res.subsubcategories && res.subsubcategories.length > 0) {
            $.each(res.subsubcategories, function (index, item) {
              $courseLevel2Wrapper.show();
              $subsubcategory.append(
                $("<option>", {
                  value: item.id,
                  text: item.name,
                })
              );
            });
          }else{
            $courseLevel2Wrapper.hide();
          }
        }
      });
    } else {
      $subsubcategory.html('<option value="">Select Sub Subcategory</option>');
    }
  });

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
    const saveButton = $("#save_course");
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
  $(document).on("click", "#save_course", function (e) {
    e.preventDefault();
    //alert($("#location").val());alert($("#subject").val());alert($("#subsubcategory").val());
    const $btn = $(this);

    // Get form values
    const banner_image = $("#banner_image")[0].files[0];
    const course_image = $("#course_image")[0].files[0];
    const course_logo = $("#course_logo")[0].files[0];
    const introduction_logo = $("#introduction_logo")[0].files[0];

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
      fieldId: "#description",
      errorId: "#error_description",
      message: "Description is required.",
    });
    //valid &= validateField({ fieldId: "#benefits_content", errorId: "#error_benefits_content", message: "Benefits is required." });
    // valid &= validateField({
    //   fieldId: "#banner_image",
    //   errorId: "#error_banner_image",
    //   message: "Banner image is required.",
    //   isFile: true,
    //   allowedExtensions: ["webp", "avif", "svg"],
    // });
    // valid &= validateField({
    //   fieldId: "#course_image",
    //   errorId: "#error_course_image",
    //   message: "Course image is required.",
    //   isFile: true,
    //   allowedExtensions: ["webp", "avif", "svg"],
    // });
    // valid &= validateField({
    //   fieldId: "#course_logo",
    //   errorId: "#error_course_logo",
    //   message: "Course logo is required.",
    //   isFile: true,
    //   allowedExtensions: ["webp", "avif", "svg"],
    // });
    // valid &= validateField({
    //   fieldId: "#introduction_logo",
    //   errorId: "#error_introduction_logo",
    //   message: "Introduction logo is required.",
    //   isFile: true,
    //   allowedExtensions: ["webp", "avif", "svg"],
    // });

    if (!valid) {
      $btn.prop("disabled", false).text("Save Course");
       return;
    }else{
      $btn.prop("disabled", true).text("Saving...");
    }

    // Prepare FormData
    const formData = new FormData();
    formData.append("category", $("#category").val());
    formData.append("subcategory", $("#subcategory").val());
    formData.append("subsubcategory", $("#subsubcategory").val());
    formData.append("location", $("#locationID").val() ?? 0 );


    var selectedValue = $('#parent_course').val();
    if(selectedValue)
    {
      formData.append("parent_course_id", selectedValue.split(' ')[0] ?? 0);
      formData.append("parent_course_type", selectedValue.match(/\(([^)]+)\)/)[1] ?? 0);
    }
    else
    {
      formData.append("parent_course_id",  0);
      formData.append("parent_course_type",  0);
    }
    formData.append("subject", $("#subject").val());
    formData.append("exam_type", $("#exam_type").val());
    formData.append("metatitle", $("#metatitle").val());
    formData.append("title", $("#title").val());
    formData.append("subtitle", $("#subtitle").val());
    formData.append("slug", $("#slug").val());
    formData.append("keywords", $("#keywords").val());
    formData.append("metadescription", $("#metadescription").val());
    formData.append("description", $("#description").val());
    formData.append("course_image", course_image); //Main image
    formData.append("course_img_alt", $("#course_img_alt").val());
    formData.append("course_logo", course_logo);
    formData.append("course_logo_alt", $("#course_logo_alt").val());
    formData.append("banner_title", $("#banner_title").val());
    formData.append("banner_text", $("#banner_text").val());
    formData.append("banner_image", banner_image);
    formData.append("banner_img_alt", $("#banner_img_alt").val());
    formData.append("intro_title", $("#intro_title").val());
    formData.append("intro_text", $("#intro_text").val());
    formData.append("introduction_logo", introduction_logo);
    formData.append("logo_img_alt", $("#logo_img_alt").val());
    formData.append("course_overview", $("#course_overview").val() ? $("#course_overview").val() : "");
    formData.append("course_content", $("#course_content").val() ? $("#course_content").val() : "");
    formData.append("benefits", $("#benefits_content").val() ? $("#benefits_content").val() : "");
    formData.append("job", $("#job_opportunities_content").val() ? $("#job_opportunities_content").val() : "");
    formData.append("faq", $("#faq_content").val() ? $("#faq_content").val() : "");
    formData.append("location_courses", $("#location_courses").val() ? $("#location_courses").val() : "");
    formData.append("trending_courses", $("#trending_courses").val() ? $("#trending_courses").val() : "");


    //related course ids
    const selectedCourses = $('#courses').val(); // This is an array
    if (selectedCourses && selectedCourses.length > 0) {
      selectedCourses.forEach(function (course_id) {
        formData.append("course_ids[]", course_id); // Note the brackets
      });
    }

    // get what you will learn and syllabus summery data
    $(".syllabus-item").each(function (index) {
        const syllabusTitle = $(this).find('input[name="title[]"]').val();
        const syllabusContent = $(this).find('textarea[name="content[]"]').summernote('code');

        formData.append(`syllabus[${index}][title]`, syllabusTitle);
        formData.append(`syllabus[${index}][content]`, syllabusContent);
    });

    $(".whatlearn-item").each(function (index) {
        const whatlearnTitle = $(this).find('input[name="title[]"]').val();
        formData.append(`whatlearn[${index}][title]`, whatlearnTitle);
    });

    const saveUrl = base_url + "admin/Courses/save";

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
          $("#courseSuccessMsg").text(response.message);
          setTimeout(() => {
            window.location.href =
              base_url + "admin/courses/edit/" + response.id;
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
  $("#update_course").on("click", function (e) {
    e.preventDefault();
    const $btn = $(this);
    // Get form values
    const banner_image = $("#banner_image")[0].files[0];
    const course_image = $("#course_image")[0].files[0];
    const course_logo = $("#course_logo")[0].files[0];
    const introduction_logo = $("#introduction_logo")[0].files[0];

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
      fieldId: "#description",
      errorId: "#error_description",
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
    if (course_image) {
      valid &= validateField({
        fieldId: "#course_image",
        errorId: "#error_course_image",
        message: "Course image is required.",
        isFile: true,
        allowedExtensions: ["webp", "avif", "svg"],
      });
    }
    if (course_logo) {
      valid &= validateField({
        fieldId: "#course_logo",
        errorId: "#error_course_logo",
        message: "Course logo is required.",
        isFile: true,
        allowedExtensions: ["webp", "avif", "svg"],
      });
    }
    if (introduction_logo) {
      valid &= validateField({
        fieldId: "#introduction_logo",
        errorId: "#error_introduction_logo",
        message: "Introduction logo is required.",
        isFile: true,
        allowedExtensions: ["webp", "avif", "svg"],
      });
    }

    if (!valid) {
      $btn.prop("disabled", false).text("Update Course");
       return;
    }else{
      $btn.prop("disabled", true).text("Updating...");
    }

    // Prepare FormData
    const formData = new FormData();
    formData.append("edit_id", $("#edit_id").val());
    formData.append("category", $("#category").val());
    formData.append("subcategory", $("#subcategory").val());
    formData.append("subsubcategory", $("#subsubcategory").val() ?? '');
    formData.append("select_category_template", $("#select_category_template").val());
    formData.append("location", $("#location").val() ?? 0);
    var selectedValue = $('#parent_course').val();
    if(selectedValue)
    {
      formData.append("parent_course_id", selectedValue.split(' ')[0] ?? 0);
      formData.append("parent_course_type", selectedValue.match(/\(([^)]+)\)/)[1] ?? 0);
    }
    else
    {
      formData.append("parent_course_id",  0);
      formData.append("parent_course_type",  0);
    }
    formData.append("subject", $("#subject").val());
    formData.append("exam_type", $("#exam_type").val());
    formData.append("title", $("#title").val());
    formData.append("metatitle", $("#metatitle").val() ?? '');
    formData.append("subtitle", $("#subtitle").val() ?? '');
    formData.append("canonical", $("#canonical").val() ?? '');
    formData.append("slug", $("#slug").val());
    formData.append("keywords", $("#keywords").val());
    formData.append("metadescription", $("#metadescription").val());
    formData.append("description", $("#description").val());
    formData.append("course_image", course_image); //Main image
    formData.append("course_img_alt", $("#course_img_alt").val());
    formData.append("course_logo", course_logo);
    formData.append("course_logo_alt", $("#course_logo_alt").val());
    formData.append("banner_title", $("#banner_title").val());
    formData.append("banner_text", $("#banner_text").val());
    formData.append("banner_image", banner_image);
    formData.append("banner_img_alt", $("#banner_img_alt").val());
    formData.append("intro_title", $("#intro_title").val());
    formData.append("intro_text", $("#intro_text").val());
    formData.append("introduction_logo", introduction_logo);
    formData.append("logo_img_alt", $("#logo_img_alt").val());
    formData.append("course_overview", $("#course_overview").val());
    formData.append("course_content", $("#course_content").val());
    formData.append("benefits", $("#benefits_content").val());
    formData.append("job", $("#job_opportunities_content").val());
    formData.append("faq", $("#faq_content").val());
    formData.append("old_course_image", $("#old_course_image").val());
    formData.append("old_course_logo", $("#old_course_logo").val());
    formData.append("old_banner_image", $("#old_banner_image").val());
    formData.append("old_introduction_logo", $("#old_introduction_logo").val());
    formData.append("location_courses", $("#location_courses").val() ?? '');
    formData.append("trending_courses", $("#trending_courses").val());

    const saveUrl = base_url + "admin/Courses/update_course";

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
          $("#courseSuccessMsg").text(response.message);
          setTimeout(() => {
            $("#courseSuccessMsg").text("");
            $btn.prop("disabled", false).text("Update Course");
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

  $("#course_syllabus").on("click", function (e) {
    e.preventDefault();

    const title = $.trim($("#syllabus_title").val());
    const content = $.trim($("#syllabus_content").val());
    const course_id = $.trim($("#edit_id").val());

    let valid = true;

    if (!title) {
      $("#error_syllabus_title").text("Title is required.");
      valid = false;
    }
    if (!valid) return;

    // Prepare form data
    const formData = new FormData();
    formData.append("title", title);
    formData.append("content", content);
    formData.append("course_id", course_id);

    const saveUrl = base_url + "admin/Courses/save_syllabus";

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
          $("#syllabusSuccessMsg").text(response.message);
          setTimeout(() => {
            $("#addSyllabusModal").modal("hide");
            window.location.reload();
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

  $(".update_syllabus").on("click", function () {
    var id = $(this).data("id");
    var title = $(this).data("title");
    var content = $(this).data("content");

    // Populate modal fields
    $("#id_syllabus").val(id);
    $("#edit_syllabus_title").val(title);
    $("#edit_syllabus_content").summernote("code", content);
  });

  //Update form submission after edit
  $("#update_syllabus_btn").on("click", function (e) {
    e.preventDefault();

    // Get input values
    const edit_id = $.trim($("#id_syllabus").val());
    const title = $.trim($("#edit_syllabus_title").val());
    const content = $.trim($("#edit_syllabus_content").val());

    let valid = true;
    if (!valid) return;

    // Prepare form data
    const formData = new FormData();
    formData.append("edit_id", edit_id);
    formData.append("title", title);
    formData.append("content", content);

    const saveExpertUrl = base_url + "admin/Courses/update_syllabus";

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
          $("#syllabusUpdateMsg").text(response.message);
          setTimeout(() => {
            $("#editSyllabusModal").modal("hide");
            window.location.reload();
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

  //Save what you will learn
  $("#course_learn").on("click", function (e) {
    e.preventDefault();

    const title = $.trim($("#learn_title").val());
    const course_id = $.trim($("#edit_id").val());

    let valid = true;

    if (!title) {
      $("#error_learn_title").text("Title is required.");
      valid = false;
    }
    if (!valid) return;

    // Prepare form data
    const formData = new FormData();
    formData.append("title", title);
    formData.append("course_id", course_id);

    const saveUrl = base_url + "admin/Courses/save_what_you_will_learn";

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
          $("#LearnSuccessMsg").text(response.message);
          setTimeout(() => {
            $("#addLearnModal").modal("hide");
            window.location.reload(); // fixed here
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

  $(".update_learn").on("click", function () {
    var id = $(this).data("id");
    var title = $(this).data("title");

    // Populate modal fields
    $("#id_learn").val(id);
    $("#edit_learn_title").val(title);
  });

  //Update form submission after edit
  $("#update_learn_btn").on("click", function (e) {
    e.preventDefault();

    // Get input values
    const edit_id = $.trim($("#id_learn").val());
    const title = $.trim($("#edit_learn_title").val());

    let valid = true;
    if (!valid) return;

    // Prepare form data
    const formData = new FormData();
    formData.append("edit_id", edit_id);
    formData.append("title", title);

    const saveExpertUrl = base_url + "admin/Courses/update_what_you_will_learn";

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
          $("#learnUpdateMsg").text(response.message);
          setTimeout(() => {
            $("#editLearnModal").modal("hide");
            window.location.reload();
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

  // delete learn
   $(".delete-learn").on("click", function () {
    var name = $(this).data("title");
    var id = $(this).data("id");
    $("#delete_learn_id").val(id);
    $("#deleteLearnModal .modal-body strong").text(name);
  });
  $(".delete-learn-btn").on("click", function (e) {
    var learnId = $("#delete_learn_id").val();
    const deletelearnUrl =
      base_url + "admin/courses/delete_what_you_will_learn";
    $.ajax({
      url: deletelearnUrl, // adjust to your actual route
      type: "POST",
      data: { id: learnId },
      dataType: "json",
      success: function (response) {
        if (response.status) {
          $("#learnDeleteMsg").text(response.message).show();
          setTimeout(() => {
            $("#deleteLearnModal").modal("hide");
            window.location.reload();
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

  // delete learn
   $(".delete-syllabus").on("click", function () {
    var name = $(this).data("title");
    var id = $(this).data("id");
    $("#delete_syllabys_id").val(id);
    $("#deleteSyllabusModal .modal-body strong").text(name);
  });
  $(".delete-syllabus-btn").on("click", function (e) {
    var syllabusId = $("#delete_syllabys_id").val();
    const deletesyllabusUrl =
      base_url + "admin/courses/delete_syllabus_summary";
    $.ajax({
      url: deletesyllabusUrl, // adjust to your actual route
      type: "POST",
      data: { id: syllabusId },
      dataType: "json",
      success: function (response) {
        if (response.status) {
          $("#syllabusDeleteMsg").text(response.message).show();
          setTimeout(() => {
            $("#deleteSyllabusModal").modal("hide");
            window.location.reload();
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



  //#region Update Featured Course
  $(".is-featured-checkbox").on("change", function () {
    var courseId = $(this).data("id");
    var isFeatured = $(this).is(":checked") ? 1 : 0;
    $.ajax({
      url: base_url + "admin/courses/update_featured_course",
      type: "POST",
      contentType: "application/json",
      data: JSON.stringify({
        course_id: courseId,
        is_featured: isFeatured,
      }),
      success: function (response) {
        $("#featuredMessage")
          .html(
            `
            <div class="alert alert-success alert-dismissible fade show" role="alert">Featured course updated.</div>
          `
          )
          .show();

        setTimeout(function () {
          $("#featuredMessage").fadeOut().empty();
        }, 2000);
      },
      error: function (xhr, status, error) {
        console.error("Error:", error);
        // Optional: revert checkbox state
        // $(this).prop('checked', !$(this).is(':checked'));
        alert("Failed to update featured status.");
      },
    });
  });

  //#region Status Change
  $(".is-active-course-checkbox").on("change", function () {
    var id = $(this).data("id");
    var is_active = $(this).is(":checked") ? 1 : 0;
    $.ajax({
      url: base_url + "admin/courses/update_course_status",
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
            <div class="alert alert-success alert-dismissible fade show" role="alert">Course status updated.</div>
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

  //#region Location based courses reload on change location
  const location = document.getElementById('location');
  const courseSelect = document.getElementById('courseSelect');

  if (location) {
    location.addEventListener('change', () => {
      reloadCourses(location.value); // pass selected id
    });
  }


  function reloadCourses(locationId) {
        // simple loading state
        courseList.innerHTML     = '<li>Loading…</li>';
        courseList.style.display = 'block';

        fetch(base_url + 'admin/courses/fetch_location_based_related_courses', {
          method : 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({ filter_id: locationId })
        })
        .then(function (response) {
          if (!response.ok) {
            throw new Error("Network response was not ok");
          }
          return response.json(); // parse JSON
        })
        .then(function (data) {
          if (Array.isArray(data.courses) && data.courses.length > 0) {
            const itemsHtml = data.courses.map(function (c) {
              return '<li data-id="' + c.id + '">' + c.name + '</li>';
            }).join('');
            courseList.innerHTML = itemsHtml;
          } else {
            courseList.innerHTML = '<li style="pointer-events:none;">No courses found</li>';
          }
        })
        .catch(function (error) {
          console.error('Fetch error:', error);
          courseList.innerHTML = '<li style="pointer-events:none;">Error loading courses</li>';
        });
}

  function relatedCourseSearch() {
    // Searchable dropdown
    const courseSearch = document.getElementById("courseSearch");
    const courseList = document.getElementById("courseList");
    const selectedCourseId = document.getElementById("selectedCourseId");
    const courseDetails = document.getElementById("courseDetails");

    function courseTriggers() {
      // Show dropdown on input focus or click
      courseSearch.addEventListener("focus", () => {
        courseList.style.display = "block";
        courseSearch.removeAttribute("readonly");
      });

      courseSearch.addEventListener("click", () => {
        courseList.style.display = "block";
        courseSearch.removeAttribute("readonly");
      });

      // Filter results
      courseSearch.addEventListener("input", function () {
        const filter = this.value.toLowerCase();
        const items = courseList.querySelectorAll("li");

        let hasResults = false;
        items.forEach((item) => {
          if (item.textContent.toLowerCase().includes(filter)) {
            item.style.display = "";
            hasResults = true;
          } else {
            item.style.display = "none";
          }
        });

        courseList.style.display = hasResults ? "block" : "none";
      });
      //#region Related Course Select course from dropdown

      courseList.addEventListener("click", function (e) {
        if (e.target.tagName === "LI") {
          const courseName = e.target.textContent;
          const courseId = e.target.dataset.id;
          const edit_courseId = document.getElementById("edit_id").value;
          const courseMessage = document.getElementById("courseMessage");

          courseSearch.value = courseName;
          selectedCourseId.value = courseId;
          courseList.style.display = "none";
          courseSearch.setAttribute("readonly", true);

          fetch(base_url + "admin/courses/fetch_related_courses", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify({
              selected_course_id: courseId,
              edit_courseId: edit_courseId,
            }),
          })
            .then((response) => response.json())
            .then((data) => {
              courseSearch.value = "";

              if (data.status === "error") {
                courseMessage.innerHTML = `<div class="alert alert-success alert-dismissible fade show" role="alert">
          ${data.message}</div>`;
                courseMessage.style.display = "block";
                setTimeout(() => {
                  courseMessage.style.display = "none";
                  courseMessage.innerHTML = "";
                }, 2000);
              }

              if (Array.isArray(data.course) && data.course.length > 0) {
                courseMessage.innerHTML = `<div class="alert alert-success alert-dismissible fade show" role="alert">
          ${data.message}</div>`;
                courseMessage.style.display = "block";
                setTimeout(() => {
                  courseMessage.style.display = "none";
                  courseMessage.innerHTML = "";
                }, 2000);

                let tableHtml = `
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Course Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
          `;

                data.course.forEach((item, index) => {
                  tableHtml += `
              <tr>
                <td>${index + 1}</td>
                <td>${item.name}</td>
                <td><i class="fas fa-trash text-danger delete-course" data-id="${
                  item.id
                }" style="cursor:pointer;"></i></td>
              </tr>
            `;
                });

                tableHtml += `
              </tbody>
            </table>
          `;

                courseDetails.innerHTML = tableHtml;
              } else {
                courseDetails.innerHTML = "<p>No related courses found.</p>";
              }

              courseDetails.style.display = "block";
            });
        }
      });

      // Hide dropdown on outside click
      document.addEventListener("click", function (e) {
        if (!document.querySelector(".dropdown-container").contains(e.target)) {
          courseList.style.display = "none";
          courseSearch.setAttribute("readonly", true);
        }
      });
      // Delete related course
      // Attach event listener after rows are rendered

      document.addEventListener("click", function (e) {
        if (e.target && e.target.classList.contains("delete-course")) {
          const courseId = e.target.getAttribute("data-id");
          const row = e.target.closest("tr");

          if (confirm("Are you sure you want to delete this course?")) {
            fetch(base_url + "admin/courses/delete_related_course", {
              method: "POST",
              headers: {
                "Content-Type": "application/json",
              },
              body: JSON.stringify({ id: courseId }),
            })
              .then((response) => response.json())
              .then((result) => {
                if (result.success) {
                  row.remove(); // Remove row from DOM
                } else {
                  alert("Failed to delete the course.");
                }
              })
              .catch((error) => {
                console.error("Error:", error);
                alert("Something went wrong.");
              });
          }
        }
      });
    }

    if (courseSearch && courseList && selectedCourseId && courseDetails) {
      courseTriggers();
    }
  }

  relatedCourseSearch();

  //#region Add what you will learn and course syllabus
  $(document).on("click", "#addMoreSyllabus", function (e) {
  let newItem = `
    <div class="syllabus-item mb-2 position-relative">
      <button type="button" class="btn-close position-absolute top-0 end-0 delete-item" aria-label="Close"></button>
      <input type="text" name="title[]" placeholder="Syllabus Title" class="form-control mb-2" required>
      <textarea name="content[]" class="summernote form-control mb-3" required></textarea>
    </div>
  `;

  $('#syllabusWrapper').append(newItem);

  // Initialize Summernote for new textarea
  $('#syllabusWrapper .summernote').last().summernote({
    height: 150
  });
});

// Add More What You Will Learn
    $(document).on("click", "#addMoreWhatlearn", function (e) {
  let newItem = `
    <div class="whatlearn-item mb-2 position-relative">
      <button type="button" class="btn-close position-absolute top-0 end-0 delete-item" aria-label="Close"></button>
      <input type="text" name="title[]" placeholder="What you will learn" class="form-control mb-2" required>
    </div>
  `;

  $('#WhatlearnWrapper').append(newItem);
});

// Delete item
$(document).on('click', '.delete-item', function () {
  $(this).closest('.syllabus-item, .whatlearn-item').remove();
});


//#region course template change
  $('#select_category_template').on('change', function () {
        var templateId = $(this).val();
        if (templateId) {
            $.ajax({
                url: base_url + 'admin/Template/load_Course_template',
                type: 'POST',
                data: {template_id: templateId},
                success: function (response) {
                    $('#category_template_section').css('display', 'block');
                    $('#category_template_section').html(response);
                      $('.summernote').summernote({
                        height: 200
                      });
                }
            });
        } else {
            $('#category_template_section').html('');
        }
    });

    //#region load related courses when add course based on category and location
    function reloadCoursesByLocation() {
   // alert('hello');
    const categoryId = $('#category').val();
    const locationId = $('#location').val() ?? null;
    //alert(categoryId);alert(locationId);

    if (categoryId) {
      $.ajax({
        url: base_url + 'admin/Courses/get_courses_by_category_location',
        type: 'POST',
        data: { category_id: categoryId, location_id: locationId },
        dataType: 'json',
        success: function (data) {
          //alert(111);
            $('#courseList').empty();
            if (data.length > 0) {
              data.forEach(function (course) {
                $('#courseList').append(`<li data-id="${course.id}">${course.course_name}</li>`);
              });
            } else {
              $('#courseList').append('<li disabled>No courses found</li>');
            }
          }
      });
    }
  }

  $('#category,#subcategory, #location').on('change', function () {
    reloadCoursesByLocation();
  });

  $('#locationID,#location,#category').on('change', function () {
      const locationVal = $(this).val();
      if (locationVal) {
          loadCertificationCourses();
      } else {
          $('#course-list-wrapper').hide(); // Optional: hide if no selection
      }
  });




  function loadCertificationCourses() {
    //alert('hello');
    $('#course-list-wrapper').show();
    const category = $('#category').val();
    const subcategory = $('#subcategory').val();
    const subsubcategory = $('#subsubcategory').val();
    const selectedCourseId = $('#hidden_parent_course_id').val();//in edit page this hidden field have value select that parent course
    const selectedCourseType= $('#hidden_parent_course_type').val();
    //alert(selectedCourseId);alert(parentCourseType);
    if (category) {
      $.ajax({
        url: base_url + 'admin/Courses/get_certification_courses',
        type: 'POST',
        data: { category: category, subcategory: subcategory, subsubcategory: subsubcategory },
        dataType: 'json',
        success: function (data) {
          console.log(data);
          $('#parent_course').empty();
          $('#parent_course').append('<option value="">Default Course Format</option>');
          if (data.length > 0) {
            data.forEach(function (course) {
              //alert(course.id + ' (' +parentCourseType+')');
              const selected =
        selectedCourseId == course.id && selectedCourseType == course.type ? 'selected' : '';
              $('#parent_course').append(
                `<option value="${course.id} (${course.type})" ${selected}>${course.name}(${course.type})</option>`
              );
            });
          } else {
            $('#parent_course').append('<option disabled>No course Formats</option>');
          }
        },
      });
    }
  }

  loadCertificationCourses();
  reloadCoursesByLocation();

});
