<?php

<<<<<<< HEAD

=======
>>>>>>> 17489859d6af3de327b7c9b7569be617774e759b
/**** CONTACT FORM ****/

/* validate the form */

$contactForm =
  '<div class="repertory">
    <form  class=""
           action="' . $PHP_PATH . '/contact/traitement.php"
           method="post"
           data-validForm="true" />

      <label  for="name">Veuillez indiquer votre nom : 
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

      <label for="email">Veuillez indiquer votre e-mail :
          <input  id="email"
                  name="email"
                  value=""
                  type="email"
                  data-required="true"
                  data-email="true"
                  placeholder="E-mail" />
      </label>
      
      <label for="message">Veuillez écrire votre message : 
        <textarea   id="message"
                    name="message"
                    rows="4"
                    cols="40"
                    data-required="true"
                    placeholder="Message...">
                    </textarea>
      </label>
      
      <label>
        <span>* Tous les champs sont obligatoires</span>
      </label>

<<<<<<< HEAD
=======
      <div  class="g-recaptcha" 
            data-sitekey="' . $RECAPTCHA_KEY . '" 
            data-callback="enableSubmitBtn" 
            data-expired-callback="disableSubmitBtn">
      </div>

>>>>>>> 17489859d6af3de327b7c9b7569be617774e759b
      <button class="btnWin31" name="sendForm" id="sendForm" type="submit">Envoyer</button>
      <button name="reset" type="reset">Réinitialiser</button>
    </form>
  </div>';

$contactFormImg = 'icon_contactCid.png';

$contactFormWindow = new Window('contactForm', 'CarlIndus Design - Messagerie', $contactFormImg, $contactForm);
echo $contactFormWindow->createWindow();

/**** THANK FOR THE MESSAGE ****/

$thanksMessage =
  '<div class="thanks">
    <h3>Votre message à bien été envoyé</h3>
    <p>Je vous remercie de votre attention.<br />Je reprendrais contact avec vous dans les plus brefs délais</p>
  </div>';

$thanksWindow = new Window('confirmSendForm', 'Réception de votre message', $contactFormImg, $thanksMessage);
echo $thanksWindow->createWindow();
