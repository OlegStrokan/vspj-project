<?php
include("db.php");
session_start();
?>

<!DOCTYPE html>
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link rel="stylesheet" href="style/style.css">
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
        
      <li class="nav-item active">
        <a class="nav-link" href="casopisy.php">Časopisý</a>
      </li>
      <li class="nav-item">
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
<h5>Aktuální ročník/číslo časopisu</h5>
<p><a href="http://www.vspj.cz/soubory/download/id/7778">2020/Ročník 11/Číslo 1</a><br>
<a href="http://www.vspj.cz/soubory/download/id/7874">2020/Ročník 11/Číslo 2</a></p>
<h5>Archiv</h5>
<p><a href="http://www.vspj.cz/soubory/download/id/7354">2019/Ročník 10/Číslo1<br></a>
<a href="http://www.vspj.cz/soubory/download/id/7454">2019/Ročník 10/Číslo 2<br></a>
<a href="http://www.vspj.cz/soubory/download/id/7648" title="Logos Polytechnikos 3/2019">2019/Ročník 10/Číslo 3</a></p>
<p><a href="http://www.vspj.cz/soubory/download/id/6942">2018/Ročník 9/Číslo 1<br>
</a><a href="http://www.vspj.cz/soubory/download/id/6914">2018/Ročník 9/Číslo 2 </a><br><a href="http://www.vspj.cz/soubory/download/id/7192">2018/Ročník 9/Číslo 3</a><br><a href="http://www.vspj.cz/soubory/download/id/7408">2018/Ročník 9/Číslo 4</a></p>
<p><a href="http://www.vspj.cz/soubory/download/id/5966">2017/Ročník 8/Číslo 1<br></a><a href="http://www.vspj.cz/soubory/download/id/6130">2017/Ročník 8/Číslo 2</a><br><a href="http://www.vspj.cz/soubory/download/id/6282">2017/Ročník 8/Číslo 3<br></a><a href="http://www.vspj.cz/soubory/download/id/6564">2017/Ročník 8/Číslo 4</a></p>
<p><a href="http://www.vspj.cz/soubory/download/id/5087">2016/Ročník 7/Číslo 1 <br></a><a href="http://www.vspj.cz/soubory/download/id/5303">2016/Ročník 7/Číslo 2 <br></a><a href="http://www.vspj.cz/soubory/download/id/6027">2016/Ročník 7/Číslo 3<br></a><a href="http://www.vspj.cz/soubory/download/id/5711">2016/Ročník 7/Číslo 4</a></p>
<p><a href="http://www.vspj.cz/soubory/download/id/5083">2015/Ročník 6/Číslo 1</a><a href="http://www.vspj.cz/soubory/download/id/2962"><br> </a><a href="http://www.vspj.cz/soubory/download/id/5084">2015/Ročník 6/Číslo 2</a><a href="http://www.vspj.cz/soubory/download/id/5085"><br>2015/Ročník 6/Číslo 3<br></a><a href="http://www.vspj.cz/soubory/download/id/5086">2015/Ročník 6/Číslo 4</a></p>
<p><a href="http://www.vspj.cz/soubory/download/id/5079">2014/Ročník 5/Číslo 1</a><a href="http://www.vspj.cz/soubory/download/id/2962"><br> </a><a href="http://www.vspj.cz/soubory/download/id/5080">2014/Ročník 5/Číslo 2</a><a href="http://www.vspj.cz/soubory/download/id/2962"><br> </a><a href="http://www.vspj.cz/soubory/download/id/5081">2014/Ročník 5/Číslo 3<br></a><a href="http://www.vspj.cz/soubory/download/id/5082">2014/Ročník 5/Číslo 4</a></p>
<p><a href="http://www.vspj.cz/soubory/download/id/5075">2013/Ročník 4/Číslo 1</a><br> <a href="http://www.vspj.cz/soubory/download/id/5076">2013/Ročník 4/Číslo 2</a><br> <a href="http://www.vspj.cz/soubory/download/id/5077">2013/Ročník 4/Číslo 3</a><br> <a href="http://www.vspj.cz/soubory/download/id/5078">2013/Ročník 4/Číslo 4</a></p>
<p><a href="http://www.vspj.cz/soubory/download/id/5071">2012/Ročník 3/Číslo 1</a><br> <a href="http://www.vspj.cz/soubory/download/id/5072">2012/Ročník 3/Číslo 2</a><br> <a href="http://www.vspj.cz/soubory/download/id/5121">2012/Ročník 3/Číslo 3</a><br><a href="http://www.vspj.cz/soubory/download/id/5074">2012/Ročník 3/Číslo 4</a></p>
<p><a href="https://www.vspj.cz/soubory/download/id/5067">2011/Ročník 2/Číslo 1</a><br> <a href="https://www.vspj.cz/soubory/download/id/5068">2011/Ročník 2/Číslo 2</a><br><a href="https://www.vspj.cz/soubory/download/id/5069">2011/Ročník 2/Číslo 3</a><br> <a href="https://www.vspj.cz/soubory/download/id/5070">2011/Ročník 2/Číslo 4</a></p>
<p><a href="https://www.vspj.cz/soubory/download/id/5063">2010/Ročník 1/Číslo 1</a><br> <a href="https://www.vspj.cz/soubory/download/id/5064">2010/Ročník 1/Číslo 2</a><br> <a href="https://www.vspj.cz/soubory/download/id/5065">2010/Ročník 1/Číslo 3</a><br> <a href="https://www.vspj.cz/soubory/download/id/5066">2010/Ročník 1/Číslo 4</a></p>
<p>
    Autor : <a href="https://www.vspj.cz/skola/kontakty/detail/zamestnanec/41696">doc. Dr. Ing. Jan Voráček, CSc.</a>
</p>
</div>
</body>
</html>
