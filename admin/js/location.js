$(document).ready(function () {
  //alert(11);

  let base_url = $("#base_url").val();


function validateField({ fieldId, errorId, message, isFile = false, allowedExtensions = [] }) {
  const field = isFile ? $(fieldId)[0].files[0] : $.trim($(fieldId).val());
  const errorElement = $(errorId);
  const saveButton = $('#save_location');
  errorElement.text(""); // Clear previous error
  saveButton.removeClass("error-button");

  const scrollToElement = () => {
        $('html, body').animate({
        scrollTop: $(".error:visible").filter(function () {
            return $(this).html().trim() !== "";
        }).first().offset().top - 100
    }, 50);
  };

  if (!field) {
    errorElement.text(message);
    scrollToElement();
    saveButton.addClass("error-button");
    return false;
  }

  return true;
}

//Add category
$("#save_location").on("click", function (e) {
  e.preventDefault();
  const $btn = $(this);

  // Validate required fields using the utility function
  let valid = true;
  valid &= validateField({ fieldId: "#location_name", errorId: "#error_location_name", message: "Location name is required." });

  if (!valid) {
      $btn.prop("disabled", false).text("Save Location");
       return;
    }else{
      $btn.prop("disabled", true).text("Saving...");
    }

  // Prepare FormData
  const formData = new FormData();
  formData.append("location_name", $("#location_name").val());
  formData.append("address", $("#address").val());

  const saveUrl = base_url + "admin/Location/save";

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
        $("#locationSuccessMsg").text(response.message);
        setTimeout(() => {
          window.location.href = base_url + "admin/Location/edit/" + response.id;
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
$("#update_location").on("click", function (e) {
  e.preventDefault();
  const $btn = $(this);
  // Validate required fields using the utility function
  let valid = true;
  valid &= validateField({ fieldId: "#location_name", errorId: "#error_location_name", message: "Location name is required." });

  if (!valid) {
      $btn.prop("disabled", false).text("Update Location");
       return;
    }else{
      $btn.prop("disabled", true).text("Saving...");
    }

  // Prepare FormData
  const formData = new FormData();
  formData.append("edit_id", $("#edit_id").val());
  formData.append("location_name", $("#location_name").val());
  formData.append("address", $("#address").val());
 

  const saveUrl = base_url + "admin/Location/update_location";

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
        $("#locationSuccessMsg").text(response.message);
        setTimeout(() => {
          $("#locationSuccessMsg").text('');
          $btn.prop("disabled", false).text("Update Location");
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