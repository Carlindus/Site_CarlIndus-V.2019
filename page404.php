<?php
include(__DIR__ . '/cid/config/config_site.php');
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, maximum-scale=1" />
  <meta name="description" content="Page de signalisation d'erreur 404." />

  <title>"Carlindus Error 404"</title>

  <link rel="icon" type="image/png" href="<?php echo $ASSETS_PATH ?>/img/favicon-CID.png" />
  <link href="<?php echo $ASSETS_PATH ?>/css/main.css" rel="stylesheet" />

  <style>
    @media screen and (max-width: 1000px) {

      /* page 404 with spaceInvader*/
      .space-invaders {
        display: none;
      }

      .no-space-invaders {
        display: flex;
        justify-content: center;
      }
    }

    :root {
      --bgColorBtn: #C8C8C8;
      --borderBtnTop: 2px solid #e6e6e6;
      --borderBtnLeft: var(--borderBtnTop);
      --borderBtnBottom: 2px solid #848484;
      --borderBtnRight: var(--borderBtnBottom);

      --bgColorBtnHover: #ededed;
      --borderBtnTopHover: var(--borderBtnBottom);
      --borderBtnLeftHover: var(--borderBtnBottom);
      --borderBtnBottomHover: var(--borderBtnTop);
      --borderBtnRightHover: var(--borderBtnTop);
    }

    #page404 {
      height: 100vh;
      background-color: var(--main-bg-color);
    }

    #space-invaders {
      background-color: inherit;
      margin: 0 auto;
      display: block;
    }

    h1 {
      font-size: 2rem;
      margin-top: 3vmin;
    }

    h2 {
      font-size: 1.5rem;
      margin: 2vmin 0 3vmin 0;
    }

    p {
      margin: 1vmin 0;
      font-size: 1.2rem;
    }

    .center {
      text-align: center
    }

    .btnWin31 {
      background-color: var(--bgColorBtn);
      border-top: var(--borderBtnTop);
      border-right: var(--borderBtnRight);
      border-bottom: var(--borderBtnBottom);
      border-left: var(--borderBtnLeft);
      margin-top: 3vmin 0;
    }

    .btnWin31:hover {
      border-top: var(--borderBtnTopHover);
      border-right: var(--borderBtnRightHover);
      border-bottom: var(--borderBtnBottomHover);
      border-left: var(--borderBtnLeftHover);
    }

    .label {
      font-weight: bold;
      color: rgb(220, 200, 50);
    }
  </style>
</head>

<body id="page404">
  <h1 class="center">Erreur 404</h1>
  <h2 class="center">La page demandée n'a pas été trouvée.</h2>
  <a class="btn btnWin31 center" href="https://carlindusdesign.fr" title="retour vers Carlindusdesign.fr">
    Retourner vers le site</a>
  <div class="space-invaders">
    <p class="center space-invaders">La page que vous recherchez n'est pas disponible dans la version 3.1</p>
    <p class="center space-invaders">A défaut, vous pouvez toujours vous consoler avec une petite partie de Space Invadors</p>
    <p class="center space-invaders">Utiliser <span class="label">la barre d'espace</span> pour tirer et <span class="label">←</span>&#160;<span class="label label-danger">→</span> pour se deplacer! &#160;&#160;&#160;
    </p>
    <button class="btn btnWin31" id="restart">Rejouer</button>
    <canvas id="space-invaders" />
  </div>

  <div class='no-space-invaders'>
    <pre>
       4444444     00000000          4444444
      4::::::4    0::::::::0        4::::::4
     4:::::::4   0::::::::::0      4:::::::4
    4::::44::4  0:::::00:::::0    4::::44::4
   4::::4 4::4  0::::0  0::::0   4::::4 4::4
  4::::4  4::4  0:::0    0:::0  4::::4  4::4
 4::::4   4::4  0:::0    0:::0 4::::4   4::4
4::::444444::4440:::0 00 0:::04::::444444::444
4::::::::::::::40:::0 00 0:::04::::::::::::::4
4444444444:::4440:::0    0:::04444444444:::444
          4::4  0:::0    0:::0          4::4
          4::4  0::::0  0::::0          4::4
          4::4  0:::::00:::::0          4::4
        44::::44 0::::::::::0         44::::44
        4::::::4  0::::::::0          4::::::4
        44444444   00000000           44444444

    </pre>
  </div>

  <script src="<?php echo $ASSETS_PATH ?>/js/spaceInvader.js"></script>
</body>

</html>