<?php 
require("session.php");

$sql = "SELECT id, nazev, cislo, prispevky.autori, prispevky.stav, pristup, stav.popis FROM prispevky INNER JOIN stav ON prispevky.stav = stav.id_stav WHERE autor = '".$_SESSION['login_user']."'";
$result = mysqli_query($connection, $sql);

$sql2 = "SELECT "
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
    <title>Autor</title>
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
            <a class="navbar-brand" href="index.php">AUTOR</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="zalozeni.php">Zalo??it p??isp??vek</a>
                    </li>
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

        <div class="table-test">
            <table class="table" id="userTbl">
                <thead>
                    <tr>
                        <th class="text-center">N??zev</th>
                        <th class="text-center">Aktualn?? stav</th>
                        <th class="text-center">Auto??i</th>
                        <th class="text-center">Akce</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($r = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td class="text-center">
                        <?php echo $r['nazev'] ?>
                    </td>
                    <td class="text-center">
                        <?php echo $r['popis'] ?>
                    </td>
                    <td class="text-center">
                        <?php echo $r['autori'] ?>
                    </td >
                    <td class="text-center">
                        <a title="Prohl??dnout p????sp??vek" href="view.php?id=<?php echo $r['id']?>">
                            <i class="fas fa-eye"></i>
                        </a>
                    
                    <?php if ($r['pristup']) { ?>
                        <a title="Prohl??dnout posudek" href="posudek.php?id=<?php echo $r['id']?>">
                            <i class="fas fa-flag"></i>
                        </a>
                    <?php } ?>
                    </td>
                </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
