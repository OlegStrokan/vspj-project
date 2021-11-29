<!DOCTYPE html>
<?php
require("session.php");
$loc = "http://logos-polytechnikos.great-site.net/prispevky/";
$sql = "SELECT * FROM prispevky WHERE id = '".$_GET["id"]."'";
$result = mysqli_query($connection, $sql);
$r = mysqli_fetch_assoc($result);
$loc = 'http://logos-polytechnikos.great-site.net/prispevky/'; 
?>

<html lang="cs">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link rel="stylesheet" href="style/style.css">
  <link rel="shortcut icon" href="../images/favicon.ico" type="image/ico">
  <title>Redaktor</title>
</head>
<body>

    
<div class="container">
  <div class="img"><a href="http://logos-polytechnikos.great-site.net/index.php"><img src="../images/logo.png" alt=""></a></div>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">REDAKTOR</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    </ul>
      
    <form class="form-inline my-2 my-lg-0">
        <input class="search form-control mr-sm-2" type="text" placeholder="Hledat...">
        <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Profil
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item disabled" href="#"><strong>Užívatel: </strong> <?php echo $_SESSION['login_user']; ?></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">Odhlásit se</a>
        </div>
      </li>
        </ul>
    </form>
    </div>
</nav>
      
<div class="nahled">
    <h2>Informace o příspěvku</h2>

    <label>ID</label>
    <br>
    <input class="form-group form-control" type="text" value=" <?php echo $r['id'];?>" readonly="true" />
    <br>
    <label>Nazev</label>
    <br>
    <input class="form-group form-control" type="text" value=" <?php echo $r['nazev']; ?>" readonly="true" />
    <br>
    <label>Autoří</label>
    <br>
    <input class="form-group form-control" type="text" value="<?php echo $r['autori'];?>" readonly="true" />
    <br>
    <label>Číslo</label>
    <br>
    <input class="form-group form-control" type="text" value=" <?php echo $r['cislo'];?>" readonly="true" />
    <br>
    <label>Keywords</label>
    <br>
    <input class="form-group form-control" type="text" value=" <?php echo $r['keywords'];?>" readonly="true" />
    <br>
    <label>Popis</label>
    <br>
    <textarea class="form-group form-control" type="text" class="form-group form-control" readonly="true"><?php echo $r['pr_popis'];?></textarea>
    <label>Soubor</label>
    <br>
    <a class="btn btn-secondary" href="<?php echo $loc.$r['location'] ?>">Stáhnout</a> <br>
</div>
</body>
</html>
