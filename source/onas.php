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
        <a class="nav-link" href="casopisy.php">??asopis??</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="prisp.php">Pro p??isp??vatele</a>
      </li>
        <li class="nav-item active">
        <a class="nav-link" href="onas.php">O n??s</a>
      </li>
      <li class="nav-item">
            <a class="nav-link" href="helpdesk.php">Help Desk</a>
        </li>
    </ul>
         
          <form class="form-inline my-2 my-lg-0">
        <ul class="navbar-nav mr-auto">
            <?php if(!(isset($_SESSION['role']))) { } else { ?>
        <li class="nav-item">
        <a class="nav-link" href="logout.php">Odhl??sit se</a>
      </li>
            <?php } ?>
        </ul>
    </form>      
  </div>
</nav>
  <div class="border-main">
    <h5>????fredaktor</h5>
    <p>doc. Ing. Zden??k Hor??k, Ph.D. (Vysok?? ??kola polytechnick?? Jihlava)</p>
    <h5>Redak??n?? rada</h5>
    <p>prof. PhDr. RNDr. Martin Bolti??iar, PhD. (Univerzita Kon??tant??na Filozofa v&nbsp;Nitre)<br>prof. RNDr. Helena Bro??ov??, CSc. (??esk?? zem??d??lsk?? univerzita v&nbsp;Praze)<br>doc. PhDr. Lada Cetlov??, PhD. (Vysok?? ??kola polytechnick?? Jihlava)<br>prof. Mgr. Ing. Martin Dlouh??, Dr. MSc. (Vysok?? ??kola ekonomick?? v&nbsp;Praze)<br>prof. Ing. Tom???? Dost??l, DrSc. (Vysok?? ??kola polytechnick?? Jihlava)<br>doc. Ing. Ji???? Du??ek, Ph.D. (Vysok?? ??kola evropsk??ch a region??ln??ch studi??)<br>doc. RNDr. Petr Gurka, CSc. (Vysok?? ??kola polytechnick?? Jihlava)<br>Ing. Veronika Hedija, Ph.D. (Vysok?? ??kola polytechnick?? Jihlava)<br>doc. Ing. Zden??k Hor??k, Ph.D. (Vysok?? ??kola polytechnick?? Jihlava)<br>Ing. Ivica Linderov??, PhD. (Vysok?? ??kola polytechnick?? Jihlava)<br>prof. MUDr. Ale?? Rozto??il, CSc. (Vysok?? ??kola polytechnick?? Jihlava)<br>doc. PhDr. David Urban, Ph.D. (Vysok?? ??kola polytechnick?? Jihlava)<br>doc. Dr. Ing. Jan Vor????ek, CSc. (Vysok?? ??kola polytechnick?? Jihlava)<br>RNDr. PaedDr. J??n Veselovsk??, PhD. (Univerzita Kon??tant??na Filozofa v&nbsp;Nitre)<br>doc. Ing. Libor ????dek, Ph.D. (Masarykova univerzita Brno)</p>
</div>
</body>
</html>
