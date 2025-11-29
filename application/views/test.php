<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>EMIGO Contact Form</title>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  <style>
    /* Add basic styling if needed */
    .form__validation {
      color: red;
      font-size: 0.9em;
    }
    .form-response {
      display: none;
      text-align: center;
      margin-top: 20px;
    }
  </style>
</head>
<body>

<form class="form__body sidebar_form" id="contactForm">
  <div class="form__field-container">
    <input type="text" class="form__input-text" id="name" placeholder="Full Name">
    <div class="form__validation" id="nameError"></div>
  </div>

  <div class="form__field-container">
     <input type="text" class="form__input-text" id="phone" placeholder="Phone Number">
    <div class="form__validation" id="phoneError"></div>
  </div>

  <div class="form__field-container">
    <input type="email" class="form__input-text" id="email" placeholder="E-mail">
    <div class="form__validation" id="emailError"></div>
  </div>

  <div class="form__field-container">
    <input type="text" class="form__input-text" id="course" value="Web Development" placeholder="Preferred Course">
    <div class="form__validation"></div>
  </div>

  <div class="form__field-container">
    <div class="g-recaptcha" data-sitekey="6LdEbq0rAAAAAOpxihBAaLX_7PRnhLK7TbpLWoI-"></div>
  </div>

  <div class="submit-and-whatsapp">
    <button type="submit" class="submit-and-whatsapp__submit form__submit-btn btn1">Submit</button>

    <a href="https://api.whatsapp.com/send?phone=+918606061612&text=WhatsApp For Training Details"
       class="submit-and-whatsapp__whatsapp">
      <img src="https://yourdomain.com/images/whatsapp-icon-sticky.svg" alt="whatsapp-icon-sticky"
           width="16" height="16" class="whatsapp-call-buttons__icon">
      WhatsApp
    </a>
  </div>
</form>

<div class="form-response" id="formResponse">
  <img src="https://yourdomain.com/images/logo.svg" alt="form-response-logo" width="140" height="45"
       class="form-response__logo">
  <p class="form-response__message">Thank You for Choosing EMIGO</p>
</div>




</body>
</html>
