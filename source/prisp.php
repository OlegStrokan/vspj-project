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
      <li class="nav-item active">
        <a class="nav-link" href="prisp.php">Pro p??isp??vatele</a>
      </li>
        <li class="nav-item">
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
    <h5>Informace</h5>
   <p><strong>Tematick?? a obsahov?? zam????en?? ??asopisu</strong> reflektuje pot??eby oborov??ch kateder Vysok?? ??koly polytechnick?? Jihlava. Na z??klad?? souhlasu odpov??dn??ho redaktora mohou katedry poskytnout publika??n?? prostor i&nbsp;odborn??k??m bez zam??stnaneck?? vazby k Vysok?? ??kole polytechnick?? Jihlava.</p>
   <p><strong>V ??asopise je mo??n?? publikovat</strong> odborn?? ??l??nky, stat??, p??ehledov?? studie, recenze a dal???? typy odborn??ch p????sp??vk?? v&nbsp;??esk??m, slovensk??m a anglick??m jazyce. Do recenzn??ho ????zen?? jsou p??ij??m??ny p????sp??vky tematicky odpov??daj??c?? zam????en?? ??asopisu a form??ln?? upraven?? dle redak??n?? ??ablony (viz n????e).<br></p>

<h5>Pro autory (p??isp??vatele)</h5>
<ul>
     <li><a href="http://www.vspj.cz/soubory/download/id/7344">Pokyny pro p??isp??vatele<br /></a></li>
     <li><a href="https://www.vspj.cz/soubory/download/id/4186">??ablona<br /></a></li>
     <li><a href="http://www.vspj.cz/soubory/download/id/7345">Recenzn?? ????zen??</a></li>
</ul>
    
<h5>Jazyky, ve kter??ch lze publikovat</h5>
<p>angli??tina, ??e??tina a sloven??tina.</p>
<h5>Term??ny uz??v??rek pro sb??r p????sp??vk??:</h5>
<ul>
<li>1/2020 - o??et??ovatelstv??, porodn?? asistence a dal???? zdravotnick?? obory (31. 12. 2019)</li>
<li>2/2020 - o??et??ovatelstv??, porodn?? asistence a dal???? zdravotnick?? obory, sociologie, sport, psychologie, soci??ln?? pr??ce (30. 4. 2020)</li>
<li>3/2020 - ekonomika, management, marketing, statistika, opera??n?? v??zkum, finan??n?? matematika, poji????ovnistv??, cestovn?? ruch, region??ln?? rozvoj, ve??ejn?? spr??va (31. 8. 2020)</li>
</ul>
<p>Pokud rozsah doru??en??ch p????sp??vk?? p??ekro???? kapacitu p????slu??n??ho vyd??n??, bude p??ij??m??n?? p????sp??vk?? ukon??eno p??ed uveden??m term??nem.</p>
<p>Adresa pro odes??l??n?? p????sp??vk??:&nbsp;<em>logos@vspj.cz <br></em>Kontaktn?? osoba: Bc. Zuzana Mafkov??: <a href="mailto:zuzana.mafkova@vspj.cz">zuzana.mafkova@vspj.cz</a></p>
<p>Adresa nakladatele: Vysok?? ??kola polytechnick?? Jihlava, redakce LOGOS POLYTECHNIKOS, Tolst??ho 1556/16, 586 01 Jihlava<br><br><strong>ISSN 2464-7551 (Online)</strong><br><br><em>Registrace MK ??R E 19390 ??? pro ????sla z let 2010 a?? 2018 (vyd??v??n?? ti??t??n?? verze ??asopisu bylo ukon??eno). </em><br><em>ISSN 1804-3682 (Print)&nbsp;??? pro ????sla z let 2010 a?? 2018 (vyd??v??n?? ti??t??n?? verze ??asopisu bylo ukon??eno).</em></p>
</div>
</body>
</html>
