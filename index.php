<!DOCTYPE html>

<?php

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
// error_reporting(-1);
require_once(__DIR__ . '/cid/config/config_site.php');
include($PHP_PATH . '/inc/inc_head.php');

?>

</head>

<body>
  <?php include($PHP_PATH . '/inc/inc_content.php') ?>

  <?php include($PHP_PATH . '/inc/inc_formContact.php') ?>

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript" src="<?php echo $ASSETS_PATH ?>/js/desktop.js" async defer></script>
  <script type="text/javascript" src="<?php echo $ASSETS_PATH ?>/js/taskbar.js" async defer></script>
  <script type="text/javascript" src="<?php echo $ASSETS_PATH ?>/js/validform.js" async defer></script>

  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script type="text/javascript">
    var onloadCallback = function() {
      alert("grecaptcha is ready!");
    };
  </script>



</body>

</html>