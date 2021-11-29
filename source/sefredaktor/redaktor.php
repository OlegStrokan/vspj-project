<?php
require("session.php");
$sefredaktor_query = "SELECT userid, username FROM users WHERE role = 2";
$sefredaktor_result = mysqli_query($connection, $sefredaktor_query);

$sql = "SELECT id, nazev, popis, autor, stav, namitky FROM prispevky INNER JOIN stav ON prispevky.stav = stav.id_stav";
$cekajici = "SELECT id, nazev, popis, autor FROM prispevky INNER JOIN stav ON prispevky.stav = stav.id_stav WHERE prispevky.stav = 1 OR prispevky.stav = 8";
$result = mysqli_query($connection, $sql);
$cekajici_result = mysqli_query($connection, $cekajici);
?>

<!DOCTYPE html>
<html lang="cs">$result
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">


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

    <link rel="shortcut icon" href="../images/favicon.ico" type="image/ico">
    <title>Agenda Redaktora</title>
</head>
<body>
    <div class="container">

        <div class="img"><a href="http://logos-polytechnikos.great-site.net/index.php"><img src="../images/logo.png" alt=""></a></div>


        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">SEFREDAKTOR</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="autor.php">Autor</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="redaktor.php">Redaktor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="oponent.php">Oponent</a>
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
                                <a class="dropdown-item disabled" href="#"><strong>Užívatel: </strong>
                                    <?php echo $_SESSION['login_user']; ?></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">Odhlásit se</a>
                            </div>
                        </li>
                    </ul>
                </form>
            </div>
        </nav>
    
    <?php if (mysqli_num_rows($sefredaktor_result) > 0) { ?>
        <div class="select-border" style="margin-top: 30px;">
            Vyberte redaktora ze seznamů:
            <form method="post" action="" enctype="multipart/form-data">
                <select name="select_autor">
                    <?php while($r = mysqli_fetch_assoc($sefredaktor_result)){?>
                    <option value="<?php echo $r['userid'];?> ">
                        <?php echo $r['username']; ?>
                    </option>
                    <?php } ?>
                </select>
                <button id="pridelit" class="btn btn-danger">Vybrat</a>
            </form>
        </div>
    <?php } ?>

    <?php if(isset($_POST['select_autor'])) { ?>
        <h3 class="text-center">Příspěvky</h3>
        <div class="table-test">
            <table class="table" id="userTbl">
                <thead>
                    <tr>
                        <th>Název</th>
                        <th>Aktualní stav</th>
                        <th>Autor</th>
                        <th>Akce</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
  	                    while($r = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <td>
                            <?php echo $r['nazev'] ?>
                        </td>
                        <td>
                            <?php echo $r['popis'] ?>
                        </td>
                        <td>
                            <?php echo $r['autor'] ?>
                        </td>
                        <td>
                            <a title="Nahled" href="view.php?id=<?php echo $r['id']?>">
                                <i class="fas fa-eye"></i>
                            </a>

                            <?php if ($r['stav'] == 1) { ?>
                                <a title="Přidělit oponentá" href="oponent.php?id=<?php echo $r['id']?>">
                                    <i class="fas fa-user-alt"></i>
                                </a>
                            <?php } if ($r['stav'] == 5 || $r['stav'] == 6) {?>
                                <a title="Nahled posudku" href="posudek.php?id=<?php echo $r['id']?>">
                                    <i class="fas fa-flag"></i>
                                </a>
                            <?php } ?>
                            <?php if (!empty($r['namitky'])) {?>
                                <a title="Nahled namitek" href="namitky.php?id=<?php echo $r['id']?>">
                                    <i class="fas fa-comment-alt"></i>
                                </a>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php } ?>
    </div>
</body>
</html>
