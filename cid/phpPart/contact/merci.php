<!DOCTYPE html>

<?php
$directory="..";
$titrePage="Merci de votre envoi";
$description="description de la page";
include($directory.'/phpPart/inc/inc_head.php');
?>
    <style type="text/css">
    body {
      position: relative;
    }

    #thanksMessage {
      z-index: 10000;
      position: absolute;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      overflow: hidden;
    }

    #thanksMessage .directory {
      display: block;
      top: 30%;
      transform: translate(-50%,-50%);
    }

    .thanks {
      text-align: center;
      width: 100%;
    }

    .thanks h3,
    .thanks p {
      padding: 5px 15px;
      margin: 10px 10px;
    }

    .thanks h3 {
      font-size: 1.2rem;
    }

    .thanks p {
      font-size: 1rem;
      line-height: 1.2rem;
    }

    .logowin311 img {
    animation: none;
    opacity: 0.2;
  }
  @media screen and (max-width: 1000px) {

      #thanksMessage .directory {
          display: block;
          top: 30%;
          left: 0;
          transform: translate(0,-30%);
    }
  }

  </style>
</head>

<body>
  <div id="thanksMessage">
    <article class="directory">
      <div class="top-bar">
        <p>Réception de votre message</p>
      </div>
      <div class="thanks">
        <h3>Votre message à bien été envoyé</h3>
        <p>Je vous remercie de votre attention.<br />Je reprendrais contact avec vous dans les plus brefs délais</p>
        <button class="btnWin31" onclick="$(thanksMessage).hide()">OK</button>
      </div>
  </article>
</div>
<?php include($directory.'/phpPart/inc/inc_content.php') ?>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo $directory ?>/js/myscript.js"></script>
<script src="<?php echo $directory ?>/js/validform.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>


</body>

</html>
