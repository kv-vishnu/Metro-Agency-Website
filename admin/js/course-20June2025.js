$(document).ready(function () {
  //alert(11);

  let base_url = $("#base_url").val();

  //autopopulate dropdowns

  var $categorySelect = $("#category");
  var $courseLevelSelect = $("#subcategory");
  var $courseSelect = $("#course");
  var $courseLevelWrapper = $("#course-level-wrapper");
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

  //Seo content update
  $(".summernote").summernote({
    height: 150,
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
  $("#save_course").on("click", function (e) {
    e.preventDefault();
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
    valid &= validateField({
      fieldId: "#banner_image",
      errorId: "#error_banner_image",
      message: "Banner image is required.",
      isFile: true,
      allowedExtensions: ["webp", "avif", "svg"],
    });
    valid &= validateField({
      fieldId: "#course_image",
      errorId: "#error_course_image",
      message: "Course image is required.",
      isFile: true,
      allowedExtensions: ["webp", "avif", "svg"],
    });
    valid &= validateField({
      fieldId: "#course_logo",
      errorId: "#error_course_logo",
      message: "Course logo is required.",
      isFile: true,
      allowedExtensions: ["webp", "avif", "svg"],
    });
    valid &= validateField({
      fieldId: "#introduction_logo",
      errorId: "#error_introduction_logo",
      message: "Introduction logo is required.",
      isFile: true,
      allowedExtensions: ["webp", "avif", "svg"],
    });

    if (!valid) return;

    // Prepare FormData
    const formData = new FormData();
    formData.append("category", $("#category").val());
    formData.append("subcategory", $("#subcategory").val());
    formData.append("title", $("#title").val());
    formData.append("slug", $("#slug").val());
    formData.append("keywords", $("#keywords").val());
    formData.append("metadescription", $("#metadescription").val());
    formData.append("description", $("#description").val());
    formData.append("course_image", course_image); //Main image
    formData.append("course_logo", course_logo);
    formData.append("banner_title", $("#banner_title").val());
    formData.append("banner_text", $("#banner_text").val());
    formData.append("banner_image", banner_image);
    formData.append("intro_title", $("#intro_title").val());
    formData.append("intro_text", $("#intro_text").val());
    formData.append("introduction_logo", introduction_logo);
    formData.append("course_overview", $("#course_overview").val());
    formData.append("prerequisites", $("#prerequisites").val());
    formData.append("required_exams", $("#required_exams").val());
    formData.append("benefits", $("#benefits_content").val());
    formData.append("job", $("#job_opportunities_content").val());
    formData.append("faq", $("#faq_content").val());

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

    if (!valid) return;

    // Prepare FormData
    const formData = new FormData();
    formData.append("edit_id", $("#edit_id").val());
    formData.append("category", $("#category").val());
    formData.append("subcategory", $("#subcategory").val());
    formData.append("title", $("#title").val());
    formData.append("slug", $("#slug").val());
    formData.append("keywords", $("#keywords").val());
    formData.append("metadescription", $("#metadescription").val());
    formData.append("description", $("#description").val());
    formData.append("course_image", course_image); //Main image
    formData.append("course_logo", course_logo);
    formData.append("banner_title", $("#banner_title").val());
    formData.append("banner_text", $("#banner_text").val());
    formData.append("banner_image", banner_image);
    formData.append("intro_title", $("#intro_title").val());
    formData.append("intro_text", $("#intro_text").val());
    formData.append("introduction_logo", introduction_logo);
    formData.append("course_overview", $("#course_overview").val());
    formData.append("prerequisites", $("#prerequisites").val());
    formData.append("required_exams", $("#required_exams").val());
    formData.append("benefits", $("#benefits_content").val());
    formData.append("job", $("#job_opportunities_content").val());
    formData.append("faq", $("#faq_content").val());
    formData.append("old_course_image", $("#old_course_image").val());
    formData.append("old_course_logo", $("#old_course_logo").val());
    formData.append("old_banner_image", $("#old_banner_image").val());
    formData.append("old_introduction_logo", $("#old_introduction_logo").val());

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

  // Searchable dropdown
  const courseSearch = document.getElementById("courseSearch");
  const courseList = document.getElementById("courseList");
  const selectedCourseId = document.getElementById("selectedCourseId");
  const courseDetails = document.getElementById("courseDetails");

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
});
