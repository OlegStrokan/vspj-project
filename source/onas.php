<?php
include("db.php");
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link rel="shortcut icon" href="/images/favicon.ico" type="image/ico">
    <title>LOGOS POLYTECHNIKOS</title>
</head>
<body>
<div class="container">
<div class="img"><a href="http://logos-polytechnikos.great-site.net/index.php"><img src="images/logo.png" alt=""></a></div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
         <?php    if($_SESSION['role'] == 1) { ?>
         <a class="navbar-brand" href="./autor">AUTOR</a>
       <?php } ?>
        
       <?php    if($_SESSION['role'] == 2) { ?>
         <a class="navbar-brand" href="./redaktor">REDAKTOR</a>
       <?php } ?>
        
       <?php    if($_SESSION['role'] == 3) { ?>
         <a class="navbar-brand" href="./sefredaktor">SEFREDAKTOR</a>
       <?php } ?>
        
       <?php    if($_SESSION['role'] == 4) { ?>
         <a class="navbar-brand" href="./admin">ADMIN</a>
       <?php } ?>

       <?php    if($_SESSION['role'] == 5) { ?>
         <a class="navbar-brand" href="./oponent">OPONENT</a>
       <?php } ?>
    
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">        
        
      <li class="nav-item">
        <a class="nav-link" href="casopisy.php">Časopisý</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="prisp.php">Pro přispěvatele</a>
      </li>
        <li class="nav-item active">
        <a class="nav-link" href="onas.php">O nás</a>
      </li>
      <li class="nav-item">
            <a class="nav-link" href="helpdesk.php">Help Desk</a>
        </li>
    </ul>
         
          <form class="form-inline my-2 my-lg-0">
        <ul class="navbar-nav mr-auto">
            <?php if(!(isset($_SESSION['role']))) { } else { ?>
        <li class="nav-item">
        <a class="nav-link" href="logout.php">Odhlásit se</a>
      </li>
            <?php } ?>
        </ul>
    </form>      
  </div>
</nav>
  <div class="border-main">
    <h5>Šéfredaktor</h5>
    <p>doc. Ing. Zdeněk Horák, Ph.D. (Vysoká škola polytechnická Jihlava)</p>
    <h5>Redakční rada</h5>
    <p>prof. PhDr. RNDr. Martin Boltižiar, PhD. (Univerzita Konštantína Filozofa v&nbsp;Nitre)<br>prof. RNDr. Helena Brožová, CSc. (Česká zemědělská univerzita v&nbsp;Praze)<br>doc. PhDr. Lada Cetlová, PhD. (Vysoká škola polytechnická Jihlava)<br>prof. Mgr. Ing. Martin Dlouhý, Dr. MSc. (Vysoká škola ekonomická v&nbsp;Praze)<br>prof. Ing. Tomáš Dostál, DrSc. (Vysoká škola polytechnická Jihlava)<br>doc. Ing. Jiří Dušek, Ph.D. (Vysoká škola evropských a regionálních studií)<br>doc. RNDr. Petr Gurka, CSc. (Vysoká škola polytechnická Jihlava)<br>Ing. Veronika Hedija, Ph.D. (Vysoká škola polytechnická Jihlava)<br>doc. Ing. Zdeněk Horák, Ph.D. (Vysoká škola polytechnická Jihlava)<br>Ing. Ivica Linderová, PhD. (Vysoká škola polytechnická Jihlava)<br>prof. MUDr. Aleš Roztočil, CSc. (Vysoká škola polytechnická Jihlava)<br>doc. PhDr. David Urban, Ph.D. (Vysoká škola polytechnická Jihlava)<br>doc. Dr. Ing. Jan Voráček, CSc. (Vysoká škola polytechnická Jihlava)<br>RNDr. PaedDr. Ján Veselovský, PhD. (Univerzita Konštantína Filozofa v&nbsp;Nitre)<br>doc. Ing. Libor Žídek, Ph.D. (Masarykova univerzita Brno)</p>
</div>
</body>
</html>
