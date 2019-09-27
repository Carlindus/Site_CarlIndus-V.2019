<?php

/**
* @copyright Copyright (c) 2014, Google Inc.
* @link      http://www.google.com/recaptcha
*/
require_once "recaptchalib.php";

$reCaptcha = new ReCaptcha($RECAPTCHA_SECRET);
// The response from reCAPTCHA
$resp = null;
// The error code from reCAPTCHA, if any
$error = null;

// Was there a reCAPTCHA response?
if ($_POST["g-recaptcha-response"]) {
    $resp = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}

/**** CONTACT FORM ****/

/* validate the form */

$contactForm = ($response != null && $response->success) ?
  'Hi'  . $_POST["name"] . ' (' . $_POST["email"] . '), thanks for submitting the form!'
    :
  '<div class="repertory">
    <form  class=""
           action="'.$RELATIVE_PATH.'/phpPart/traitement.php"
           method="post"
           data-validForm="true" />

      <label  for="name">Veuillez indiquer votre nom * : 
        <input  id="name" 
                name="name" 
                value="" 
                type="text" 
                data-required="true" 
                placeholder="Nom" />
      </label>

      <label  for="firstname">Veuillez indiquer votre prénom :
        <input  id="firstname"
                name="firstname"
                value=""
                type="text"
                placeholder="Prénom" />
      </label>

      <label for="email">Veuillez indiquer votre e-mail * :
          <input  id="email"
                  name="email"
                  value=""
                  type="email"
                  data-required="true"
                  data-email="true"
                  placeholder="E-mail" />
      </label>
      
      <label for="message">Veuillez écrire votre message * : 
        <textarea   id="message"
                    name="message"
                    rows="4"
                    cols="40"
                    data-required="true"
                    placeholder="Message...">
                    </textarea>
      </label>
      
      <label>
        <span>Les champs suivis d\'une étoile (*) sont obligatoires</span>
      </label>

      <div  class="g-recaptcha" 
            data-sitekey="'.$RECAPTCHA_KEY.'" 
            data-callback="enableSubmitBtn" 
            data-expired-callback="disableSubmitBtn">
      </div>

      <button class="btnWin31" name="sendForm" id="sendForm" type="submit">Envoyer</button>
      <button name="reset" type="reset">Réinitialiser</button>
    </form>
  </div>';

$contactFormImg = 'contact-cid.png';

$contactFormWindow = new Window('contactForm', 'CarlIndus Design - Messagerie', $contactFormImg, $contactForm);
echo $contactFormWindow->createWindow();

/**** THANK FOR THE MESSAGE ****/

$thanksMessage = 
  '<div class="thanks">
    <h3>Votre message à bien été envoyé</h3>
    <p>Je vous remercie de votre attention.<br />Je reprendrais contact avec vous dans les plus brefs délais</p>
  </div>';

$thanksWindow = new Window('confirmSendForm', 'Réception de votre message',$contactFormImg, $thanksMessage );
echo $thanksWindow->createWindow();

?>
