<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, maximum-scale=1" />
  <meta name="description" content="Page de signalisation d'erreur 404." />

  <title>"Carlindus Error 404"</title>

  <link rel="icon" type="image/png" href="../cid/img/favicon-CID.png" />
  <link href="../cid/css/main.css" rel="stylesheet" />
  <link href="../cid/css/responsive.css" rel="stylesheet" />

  <style>

  #page404{
    height: 100vh;
    background-color: var(--main-bg-color);
  }
  #space-invaders{
    background-color: inherit;
    margin: 0 auto;
    display: block;
  }

  h1{
    font-size: 2rem;
    margin-top: 3vmin;
  }
  h2{
    font-size: 1.5rem;
    margin: 2vmin 0 3vmin 0;
  }
  p{
    margin: 1vmin 0;
    font-size:1.2rem;
  }
  .center {
      text-align: center
  }
  .btnWin31{
    margin-top: 3vmin;
  }
  .label{
    font-weight: bold;
    color: rgb(220,200,50);
  }

  </style>
</head>

<body id="page404">
  <h1 class="center">Erreur 404</h1>
  <h2 class="center">La page demandé n'est pas trouvée.</h2>
  <br />
  <div class="space-invaders">
    <p class="center space-invaders">La page que vous recherchez n'est pas disponible dans la version 3.1</p>
    <p class="center space-invaders">A défaut, vous pouvez toujours vous consoler avec une petite partie de Space Invadors</p>
    <p class="center space-invaders">Utiliser <span class="label">la barre d'espace</span> pour tirer et <span class="label">←</span>&#160;<span class="label label-danger">→</span> pour se deplacer! &#160;&#160;&#160;
    </p>
    <button class="btn btnWin31" id="restart">Rejouer</button>
    <br />
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

  <script src="../cid/js/spaceInvader.js"></script>
</body>

</html>
