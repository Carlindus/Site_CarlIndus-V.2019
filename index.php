<!DOCTYPE html>

<?php
require_once(__DIR__.'/cid/config/config_site.php');
include($PHP_PATH.'/inc/inc_head.php');

?>

</head>

<body>
<?php include($PHP_PATH.'/inc/inc_content.php') ?>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo $ASSETS_PATH ?>/js/myscript.js" async defer></script>
<script type="text/javascript" src="<?php echo $ASSETS_PATH ?>/js/validform.js" async defer></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>


</body>

</html>
