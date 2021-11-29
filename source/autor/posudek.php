<?php 
require("session.php");

$query = "SELECT formular.aktualnost, formular.originalita, formular.odb_uroven, formular.jaz_uroven, formular.posudek, formular.zaver, posudek.id_oponent FROM formular INNER JOIN
 posudek ON posudek.posudek = formular.id_formular WHERE posudek.id_prispevek = '".$_GET['id']."' ";
$sql = mysqli_query($connection, $query);
$r = mysqli_fetch_assoc($sql);
$prazdny = "";
$query_oponent = "SELECT username FROM users WHERE userid = '".$r['id_oponent']."' ";
$sql2 = mysqli_query($connection, $query_oponent);
$r2 = mysqli_fetch_assoc($sql2);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["odeslat"])) {
        $namitky = $_POST["namitky"];

        if (empty($namitky)) {
            $prazdny = "Nelze odeslat prázdný text!";
        } else {
            $id = $_GET['id'];
            $sql3 = "UPDATE prispevky SET namitky = '$namitky' WHERE id = '$id'";
            mysqli_query($connection, $sql3);
        }
    }
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
  
    <script>
        function myFunction() {
        var x = document.getElementById("namitkyArea");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>

    <title>Posudek</title>
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
                    <li class="nav-item active">
                        <a class="nav-link" href="zalozeni.php">Založit přispěvek</a>
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
                        <li>
                    </ul>
                </form>

            </div>
        </nav>

        <div class="nahled">
            <h2>Posudek oponenta</h2>
       
            <label>Autor</label><br>
            <input class="form-group form-control" type="text" value=" <?php echo $r2['username'];?>" readonly="true" /><br>
            
            <label>Aktuálnost, zajímavost a přínosnost</label><br>
            <input class="form-group form-control" type="text" value=" <?php echo $r['aktualnost'];?>" readonly="true" /><br>

            <label>Originalita</label><br>
            <input class="form-group form-control" type="text" value=" <?php echo $r['originalita'];?>" readonly="true" /><br>

            <label>Odborná úroveň</label><br>
            <input class="form-group form-control" type="text" value=" <?php echo $r['odb_uroven'];?>" readonly="true" /><br>

            <label>Jazyková a stylistická úroveň</label><br>
            <input class="form-group form-control" type="text" value=" <?php echo $r['jaz_uroven'];?>" readonly="true" /><br>
            
            <label>Posudek</label>
            <br>
            <textarea class="form-group form-control" name="posudek" readonly="true"><?php echo $r['posudek'] ?></textarea>
            <br>
            <label>Celkový závěr</label>
            <br>
            <input class="form-group form-control" id="zaver" type="text" value=" <?php echo $r['zaver'];?>" readonly="true" />
            <br>
            <br>
            <button type="button" onclick="myFunction()" class="btn btn-danger">Vypsat namitky</button>
            <br>
            <br>
            <div id="namitkyArea" style="display: none">
                <?php echo $prazdny; ?>
                <form method="post">
                    <textarea name="namitky" rows="4" cols="50"></textarea><br><br>
                    <input type="submit" name="odeslat" class="btn btn-dark" value="Odeslat">
                </form>
            </div>
            <br>
        </div>
    </div>
</body>
</html>
