<?php 
require("session.php");

$query = "SELECT formular.aktualnost, formular.originalita, formular.odb_uroven, formular.jaz_uroven, formular.posudek, formular.zaver, posudek.id_oponent FROM formular INNER JOIN posudek ON posudek.posudek = formular.id_formular WHERE posudek.id_prispevek = '".$_GET['id']."' ";
$sql = mysqli_query($connection, $query);
$r = mysqli_fetch_assoc($sql);

$query_oponent = "SELECT username FROM users WHERE userid = '".$r['id_oponent']."' ";
$sql2 = mysqli_query($connection, $query_oponent);
$r2 = mysqli_fetch_assoc($sql2);

 if($_SERVER['REQUEST_METHOD'] == "POST" )
 {
   $zpristupnit = "UPDATE prispevky SET pristup = 1 WHERE id = '".$_GET['id']."'";
   //$update_stav = "UPDATE prispevky SET stav = 10 WHERE id =  '".$_GET['id']."' ";      
   $zpristupnit_query = mysqli_query($connection, $zpristupnit); 
   //$update_stav_query = mysqli_query($connection, $update_stav);
   header("Location: http://logos-polytechnikos.great-site.net/redaktor/");
   die();
 }

?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <title>Oponent</title>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/ico">

    <script>
        $(document).ready(function(){
        $('.search').on('keyup',function(){
            var searchTerm = $(this).val().toLowerCase();
            $('#userTbl tbody tr').each(function(){
                var lineStr = $(this).text().toLowerCase();
                if(lineStr.indexOf(searchTerm) === -1){
                    $(this).hide();
                }else{
                    $(this).show();
                }
            });
        });
    });
  </script>
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
                                <a class="dropdown-item disabled" href="#"><strong>U????vatel:??</strong>
                                    <?php echo $_SESSION['login_user']; ?></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">Odhl??sit se</a>
                            </div>
                        </li>
                    </ul>
                </form>

            </div>
        </nav>


        <div class="nahled">
            <h2>Posudek oponenta</h2>
       
            <form method="post">
                <label>Autor</label><br>
                <input class="form-group form-control" type="text" value=" <?php echo $r2['username'];?>" readonly="true" /><br>
                
                <label>Aktu??lnost, zaj??mavost a p????nosnost</label><br>
                <input class="form-group form-control" type="text" value=" <?php echo $r['aktualnost'];?>" readonly="true" /><br>

                <label>Originalita</label><br>
                <input class="form-group form-control" type="text" value=" <?php echo $r['originalita'];?>" readonly="true" /><br>

                <label>Odborn?? ??rove??</label><br>
                <input class="form-group form-control" type="text" value=" <?php echo $r['odb_uroven'];?>" readonly="true" /><br>

                <label>Jazykov?? a stylistick?? ??rove??</label><br>
                <input class="form-group form-control" type="text" value=" <?php echo $r['jaz_uroven'];?>" readonly="true" /><br>
                
                <label>Posudek</label>
                <br>
                <textarea class="form-group form-control" name="posudek" readonly="true"><?php echo $r['posudek'] ?></textarea>
                <br>
                <label>Celkov?? z??v??r</label>
                <br>
                <input class="form-group form-control" id="zaver" type="text" value=" <?php echo $r['zaver'];?>" readonly="true" />
                <br>
                <br>
                <button type="submit" class="btn btn-danger">Zp????stupnit autorovi</button>
            </form>
        </div>
    </div>
</body>
</html>
