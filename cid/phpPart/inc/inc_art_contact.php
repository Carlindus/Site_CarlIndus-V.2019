<?php

/**

  * @copyright Copyright (c) 2014, Google Inc.

 * @link      http://www.google.com/recaptcha

 */





require_once "recaptchalib.php";

$siteKey = "6LdeDKcUAAAAAPR_wsJA4i_lmzMpJnkjgEKzbN44";

$secret = "6LdeDKcUAAAAAPkPqW54gIJHj2aMcJ_3d8iSr6wi";

$lang = "es";

// The response from reCAPTCHA

$resp = null;

// The error code from reCAPTCHA, if any

$error = null;

$reCaptcha = new ReCaptcha($secret);

// Was there a reCAPTCHA response?

if ($_POST["g-recaptcha-response"]) {

    $resp = $reCaptcha->verifyResponse(

        $_SERVER["REMOTE_ADDR"],

        $_POST["g-recaptcha-response"]

    );

}



?>

<!-- ##### REPERTOIRE CONTACT  ##### -->

<article id="contactCID" class="directory directory-closed">

  <div class="top-bar">

    <div class="cross">

      <span class="cross-1"></span>

      <span class="cross-2"></span>

    </div>

    <p>Carlindus Design - Contacts</p>

  </div>

  <div class="repertory">

    <div class="icons">

      <a id="contactForm-ico" href="#">

          <img src="<?php echo $directory ?>/img/ico-txt.svg" alt="icone extension txt">

        <h2>Send me a message</h2>

      </a>

    </div>

  </div>

</article>

<!-- Formulaire de contact -->

<article id="contactForm" class="directory directory-closed">

  <div class="top-bar">

    <div class="cross">

      <span class="cross-1"></span>

      <span class="cross-2"></span>

    </div>

    <p>Carlindus Design - Message</p>

  </div>

  <div class="repertory">

    <?php

    /* Validation d'envoi du formulaire */

      if ($response != null && $response->success) {

        echo "Hi " . $_POST["name"] . " (" . $_POST["email"] . "), thanks for submitting the form!";

      } else {

    ?>

    <!-- Traitement du formulaire  -->

    <form class="" action="<?php echo $directory ?>/phpPart/traitement.php" method="post" data-validForm="true">

      <label for="name">Veuillez indiquer votre nom : <input id="name" name="name" value="" type="text" data-required='true' placeholder="Nom*">

      </label>

      <label for="firstname">Veuillez indiquer votre prénom : <input id="firstname" name="firstname" value="" type="text" placeholder="Prénom">

      </label>

      <label for="email">Veuillez indiquer votre e-mail : <input id="email" name="email" value="" type="email" data-required='true' data-email="true" placeholder="E-mail*">

      </label>

      <label for="message"> Veuillez écrire votre message : <textarea id="message" name="message" rows="4" cols="80" data-required='true' placeholder="Votre message*"></textarea>

      </label>



      <div class="g-recaptcha" data-sitekey="<?php echo $siteKey;?>" data-callback="enableSubmitBtn" data-expired-callback="disableSubmitBtn"></div>

      <!-- <button id="sendForm" name="send-form" type="submit" >Envoyer</button> -->

      <button id="sendForm" class="btnWin31" name="sendForm" type="submit">Envoyer</button>

      <button name="reset" type="reset">Réinitialiser</button>

    </form>

    <?php } ?>

  </div>

</article>



  <article id="confirmSendForm" class="directory">

    <div class="top-bar">

      <div class="cross" onclick="$(#confirmSendForm).hide()">

        <span class="cross-1"></span>

        <span class="cross-2"></span>

      </div>

      <p>Réception de votre message</p>

    </div>

    <div class="thanks">

      <h3>Votre message à bien été envoyé</h3>

      <p>Je vous remercie de votre attention.<br />Je reprendrais contact avec vous dans les plus brefs délais</p>

    </div>

  </article>

