<?php 
require("session.php");

$query_max = "SELECT MAX(id_formular) as id FROM formular";

if(isset($_POST['submit'])){
    
    $query = "INSERT INTO formular(aktualnost, originalita, odb_uroven, jaz_uroven, posudek, zaver) VALUES('".$_POST['aktualnost']."','".$_POST['originalita']."',              '".$_POST['odb_uroven']."','".$_POST['jaz_uroven']."','".$_POST['posudek']."','".$_POST['zaver']."')";
    $ins = mysqli_query($connection, $query);
    
    $res_max = mysqli_query($connection, $query_max);
    $r = mysqli_fetch_assoc($res_max);
    
    $posudek = "UPDATE posudek SET posudek = '".$r['id']."' WHERE id_prispevek = '".$_GET['id']."' " ;   
    $posudek_update = mysqli_query($connection, $posudek);
    
    if ($_POST['zaver'] === "Schválení") {
        $prispevek_update = "UPDATE prispevky SET stav = 6 WHERE id = '".$_GET['id']."' ";
        $prispevek_update_sql = mysqli_query($connection, $prispevek_update);
    } else if ($_POST['zaver'] === "Schválení s formálními změnami" || $_POST['zaver'] === "Schválení se zásadními změnami") {
        $prispevek_update = "UPDATE prispevky SET stav = 5 WHERE id = '".$_GET['id']."' ";
        $prispevek_update_sql = mysqli_query($connection, $prispevek_update);
    }
    
    header("Location: http://logos-polytechnikos.great-site.net/oponent/");
    die();
    
}
?>

<!DOCTYPE html>
<html lang="cz">
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


    <title>Oponent</title>
</head>

<body>

    <div class="container">

        <div class="img"><a href="http://logos-polytechnikos.great-site.net/index.php"><img src="../images/logo.png" alt=""></a></div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">OPONENT</a>
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


        <div class="table-test table-view">
            <h4>Formulař</h4>
            <form enctype="multipart/form-data" action="" method="post">
                
                <label>Aktuálnost, zajímavost a přínosnost</label><br>
                <select name="aktualnost" required>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
                <br>
                <label>Originalita</label><br>
                <select name="originalita" required>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
                <br>
                <label>Odborná úroveň</label><br>
                <select name="odb_uroven" required>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
                <br>
                <label>Jazyková a stylistická úroveň</label><br>
                <select name="jaz_uroven" required>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
                <br>
                <label>Posudek</label>
                <br>
                <textarea name="posudek" placeholder="Váš posudek" required></textarea>
                <br>
                <label>Celkový závěr</label>
                <br>
                <select name="zaver"  required>
                    <option>Schválení</option>
                    <option>Schválení s formálními změnami</option>
                    <option>Schválení se zásadními změnami</option>
                    <option>Splnění kontroluje redaktor</option>
                </select>
                <br>
                <br>
                <button type="submit" name="submit" class="btn btn-success">Odeslat</button>
            </form>
        </div>
    </div>
</body>
</html>
