const base_url = document.getElementById("base_url").value;
// alert(base_url);
// website contact us
 function validateField({
    fieldId,
    errorId,
    message,
    isFile = false,
    allowedExtensions = [],
  }) {
    const field = isFile ? $(fieldId)[0].files[0] : $.trim($(fieldId).val());
    const errorElement = $(errorId);
    const saveButton = $(".send-career");
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
  $(document).on("click", ".send-career", function (e) {
    e.preventDefault();
    const $btn = $(this);
    // Get form values
    let valid = true;
      let career_designation = $("#hidden_career_name").val();
      let career_file = $("#career_file")[0].files[0];

     valid &= validateField({
        fieldId: "#career_name",
        errorId: "#error_career_name",
        message: "Name is required.",
    });
    valid &= validateField({
        fieldId: "#career_email",
        errorId: "#error_career_email",
        message: "Email is required.",
    });
    valid &= validateField({
        fieldId: "#career_phone",
        errorId: "#error_career_phone",
        message: "Phone is required.",
    });
    valid &= validateField({
        fieldId: "#career_address",
        errorId: "#error_career_address",
        message: "address is required.",
    });
    valid &= validateField({
        fieldId: "#career_file",
        errorId: "#error_career_file",
        message: "File is required.",
         isFile: true,
       allowedExtensions: ["pdf"]
    });

    /** email validation */
    const emailVal = $("#career_email").val().trim();
    const emailError = $("#error_career_email");

    if (emailVal && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailVal)) {
        emailError.text("Enter a valid email address.");
        valid = false;
    }

    /** phone validation */
    const phoneVal = $("#career_phone").val().trim();
    const phoneError = $("#error_career_phone");

    if (phoneVal && !/^[0-9]{10}$/.test(phoneVal)) {
        phoneError.text("Enter a valid 10-digit phone number.");
        valid = false;
    }

    if (!valid) return false;
    
    // valid &= validateField({
    //   fieldId: "#name",
    //   errorId: "#error_name",
    //   message: "Name is required.",
    // });
    // valid &= validateField({
    //   fieldId: "#email",
    //   errorId: "#error_email",
    //   message: "Email is required.",
    // });

    //   valid &= validateField({
    //   fieldId: "#phone_no",
    //   errorId: "#error_phone_no",
    //   message: "Phone is required.",
    // });

    //  valid &= validateField({
    //   fieldId: "#subject",
    //   errorId: "#error_subject",
    //   message: "Subject is required.",
    // });


    //   valid &= validateField({
    //   fieldId: "#message",
    //   errorId: "#error_message",
    //   message: "Message is required.",
    // });
  
  
 



    // if (!valid) {
    //   $btn.prop("disabled", false).text("Save contact us");
    //   return;
    // } else {
    //   $btn.prop("disabled", true).text("Saving...");
    // }

    // Prepare FormData
    const formData = new FormData();
    formData.append("name", $("#career_name").val());
    formData.append("email", $("#career_email").val());
    formData.append("phone", $("#career_phone").val());
    formData.append("address", $("#career_address").val());
    formData.append("designation", career_designation);
    formData.append("career_file", career_file);
    const saveUrl = base_url + "Home/savecareer";

    // Submit AJAX request
    $.ajax({
      url: saveUrl,
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      dataType: "json",
      success: function (response) {
 if (response.message) {
  $('#exampleModal').modal('hide');
    $("#messageModal .modal-body").html("Thank you for your response! We will get back to you soon.");
    // Open Bootstrap modal
    var myModal = new bootstrap.Modal(document.getElementById("messageModal"));
    myModal.show();
    // Reset form after 2 seconds
    setTimeout(() => {
        $("#careerform")[0].reset();
        myModal.hide();
        window.location.reload();
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
// document.getElementById("contactForm").addEventListener("submit", function(e) {
//   e.preventDefault();

//   const form = e.target;
//   const name = form.full_name.value.trim();
//   const email = form.email.value.trim();
//   const ecode = form.e_code.value.trim();
//   const mobile = form.mobile.value.trim();
//   const message = form.message.value.trim();

//   let isValid = true;
//   const validations = form.querySelectorAll(".form__validation");
//   validations.forEach(v => v.innerText = ""); // Clear previous messages

//   // Full Name
//   if (name === "") {
//     validations[0].innerText = "Full name is required.";
//     validations[0].style.display = "block"; 
//     isValid = false;
//   }

//   // Email
//   const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
//   if (email === "" || !emailPattern.test(email)) {
//     validations[1].innerText = "Enter a valid email.";
//     validations[1].style.display = "block"; 
//     isValid = false;
//   }

//   // Mobile
//   const mobilePattern = /^[0-9]{7,15}$/;
//   if (mobile === "" || !mobilePattern.test(mobile)) {
//     validations[2].innerText = "Enter a valid mobile number.";
//     validations[2].style.display = "block";
//     isValid = false;
//   }

//   if (!isValid) return;

//   // Prepare form data
//     const formData = {
//       name: name,
//       email: email,
//       e_code: ecode,
//       mobile: mobile,
//       course: 0,
//       enq_type: 'General Enquiry',
//       message: message
//     };
//     console.log(formData);
    

//   fetch(base_url+"home/save_enquiry", {
//       method: "POST",
//       headers: {
//         "Content-Type": "application/json",
//         "X-Requested-With": "XMLHttpRequest"
//       },
//       body: JSON.stringify(formData)
//     })
//     .then(res => res.text())
//     .then(response => {
//         alert("Form submitted successfully.");
//         form.reset();
//     })
//     .catch(err => {
//         alert("Submission failed.");
//         console.error(err);
//     });
// });

