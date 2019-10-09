function onLoad() {

  var form = document.querySelector('form[data-validForm]');

  if (form != null) {

    form.addEventListener('submit', validForm);

    form.addEventListener('reset', resetErrorMessage);

    // désactivation du bouton submit

    disableSubmitBtn();

  }

}

document.addEventListener("DOMContentLoaded", onLoad);



/*

 * Activation de l'envoi du formulaire après validation du recaptcha

 */

// activation du bouton submit après le callback

function enableSubmitBtn() {

  document.getElementById("sendForm").disabled = false;

}

// désactivation du bouton submit après expired-callback

function disableSubmitBtn() {

  document.getElementById("sendForm").disabled = true;

}

// Scope window pour fonction enable/disable du bouton submit

window.enableSubmitBtn = enableSubmitBtn;

window.disableSubmitBtn = disableSubmitBtn;





/*

 * Validation des champs de formulaire

 */

function checkRequiredFields() {

  var isValid = true;

  var requiredFields = document.querySelectorAll('[data-required]');



  requiredFields.forEach(function (requiredField) {

    if (requiredField.value == null || requiredField.value == '') {

      requiredField.insertAdjacentHTML('afterend', '<span class="invalidField">ce champ est obligatoire</span>');

      isValid = false;

    }

  });



  return isValid;

}



function isEmail(email) {

  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

  return email.match(mailformat);

}



function checkEmailFields() {

  var isValid = true;

  var emailFields = document.querySelectorAll('[data-email]');

  emailFields.forEach(function (emailField) {

    if (!isEmail(emailField.value)) {

      emailField.insertAdjacentHTML('afterend', '<span class="invalidField">ce champ doit être un email</span>');

      isValid = false;

    }

  });



  return isValid;

}



function validForm(event) {

  resetErrorMessage();



  if (!checkRequiredFields() || !checkEmailFields()) {

    event.preventDefault();

  } else {

    hideSendForm();

    //showConfirmSendForm();

  }

}



function resetErrorMessage() {

  var errorMessages = document.querySelectorAll('span.invalidField');

  errorMessages.forEach(function (errorMessage) {

    errorMessage.remove();

  })

}



function showConfirmSendForm() {

  var confirmMessage = document.getElementById('confirmSendForm');

  confirmMessage.style.display = "block";

}



function hideSendForm() {

  var contactForm = document.getElementById("contactForm");

  contactForm.style.display = "none";

}

