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
      <li class="nav-item active">
        <a class="nav-link" href="prisp.php">Pro přispěvatele</a>
      </li>
        <li class="nav-item">
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
    <h5>Informace</h5>
   <p><strong>Tematické a obsahové zaměření časopisu</strong> reflektuje potřeby oborových kateder Vysoké školy polytechnické Jihlava. Na základě souhlasu odpovědného redaktora mohou katedry poskytnout publikační prostor i&nbsp;odborníkům bez zaměstnanecké vazby k Vysoké škole polytechnické Jihlava.</p>
   <p><strong>V časopise je možné publikovat</strong> odborné články, statě, přehledové studie, recenze a další typy odborných příspěvků v&nbsp;českém, slovenském a anglickém jazyce. Do recenzního řízení jsou přijímány příspěvky tematicky odpovídající zaměření časopisu a formálně upravené dle redakční šablony (viz níže).<br></p>

<h5>Pro autory (přispěvatele)</h5>
<ul>
     <li><a href="http://www.vspj.cz/soubory/download/id/7344">Pokyny pro přispěvatele<br /></a></li>
     <li><a href="https://www.vspj.cz/soubory/download/id/4186">Šablona<br /></a></li>
     <li><a href="http://www.vspj.cz/soubory/download/id/7345">Recenzní řízení</a></li>
</ul>
    
<h5>Jazyky, ve kterých lze publikovat</h5>
<p>angličtina, čeština a slovenština.</p>
<h5>Termíny uzávěrek pro sběr příspěvků:</h5>
<ul>
<li>1/2020 - ošetřovatelství, porodní asistence a další zdravotnické obory (31. 12. 2019)</li>
<li>2/2020 - ošetřovatelství, porodní asistence a další zdravotnické obory, sociologie, sport, psychologie, sociální práce (30. 4. 2020)</li>
<li>3/2020 - ekonomika, management, marketing, statistika, operační výzkum, finanční matematika, pojišťovniství, cestovní ruch, regionální rozvoj, veřejná správa (31. 8. 2020)</li>
</ul>
<p>Pokud rozsah doručených příspěvků překročí kapacitu příslušného vydání, bude přijímání příspěvků ukončeno před uvedeným termínem.</p>
<p>Adresa pro odesílání příspěvků:&nbsp;<em>logos@vspj.cz <br></em>Kontaktní osoba: Bc. Zuzana Mafková: <a href="mailto:zuzana.mafkova@vspj.cz">zuzana.mafkova@vspj.cz</a></p>
<p>Adresa nakladatele: Vysoká škola polytechnická Jihlava, redakce LOGOS POLYTECHNIKOS, Tolstého 1556/16, 586 01 Jihlava<br><br><strong>ISSN 2464-7551 (Online)</strong><br><br><em>Registrace MK ČR E 19390 – pro čísla z let 2010 až 2018 (vydávání tištěné verze časopisu bylo ukončeno). </em><br><em>ISSN 1804-3682 (Print)&nbsp;– pro čísla z let 2010 až 2018 (vydávání tištěné verze časopisu bylo ukončeno).</em></p>
</div>
</body>
</html>
