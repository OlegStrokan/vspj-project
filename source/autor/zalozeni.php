<?php
require('session.php');
$name = $_FILES['file']['name'];
$tmp_name = $_FILES['file']['tmp_name'];
$extension = substr($name, strpos($name, '.') + 1);

$kapacita_q = "SELECT kapacita FROM kapacita WHERE cislo = '2/2020'";
$kapacita_q1 = "SELECT kapacita FROM kapacita WHERE cislo = '3/2020'";

$result_k = mysqli_query($connection, $kapacita_q);
$result_k1 = mysqli_query($connection, $kapacita_q1);

$vysl_k = mysqli_fetch_array($result_k, MYSQLI_NUM);
$vysl_k1 = mysqli_fetch_array($result_k1, MYSQLI_NUM);


$uprav = "UPDATE stav SET popis = 'Přiját oponentem. Čěka na posudek' WHERE id_stav = 7";
$rs =  mysqli_query($connection, $uprav);

/*ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);*/

if(isset($_POST['nazev'])){
if(isset($name) && !empty($name)){
    if($extension == "pdf" || $extension == "docx" || $extension == "doc"){
        $location = "/home/vol7_1/epizy.com/epiz_27143130/htdocs/prispevky/";
        $rand = rand(1,100);                
        $full_name = $rand. "_" .$name;    
        $location .= $full_name;    
        if(move_uploaded_file($tmp_name, $location)){
               $query = "INSERT INTO `prispevky` (nazev, cislo, location, stav, autor, autori, keywords, pr_popis) VALUES ('".$_POST["nazev"]."','".$_POST["Rok"]."', '$full_name', '1', '".$_SESSION['login_user']."',
                '".$_POST['autori']."', '".$_POST['klicova']."', '".$_POST['popis']."'
               )";            
              $result = mysqli_query($connection, $query);

              $query_rok = "UPDATE kapacita SET kapacita = kapacita - 1 WHERE cislo = '".$_POST["Rok"]."'";
              $result2 = mysqli_query($connection, $query_rok);
               
            $smsg = "Uspesne pridano";    
        }else{
            $fmsg = "Doslo k chybe";
        }
    }else{
        $fmsg = "Prispevek ma byt v formatu doc(x)/pdf";
    }
}else{
    $fmsg = "Prosim vyberte soubor";
}
}

?>
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
    <title>Založení přispěvku</title>
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
                        <a class="nav-link" href="#">Založit přispěvek</a>
                    </li>
                </ul>

                <form class="form-inline my-2 my-lg-0">
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


        <div class="table-test table-zalozeni">
            <h2>Založení přispěvku</h2>
            <form class="form-signin" method="POST" action="" enctype="multipart/form-data">
                <div class="inp">
                    <label>Název příspěvku</label>
                    <input type="text" class="form-group" name="nazev" required>
                    <label>Autori</label>
                    <input type="text" class="form-group" name="autori" required>
                    <label>Kličova slova</label>
                    <input type="text" class="form-group" name="klicova">
                    <label>Popís</label>
                    <textarea class="form-group" style="margin-top: -2.5%;" name="popis" rows="2" required></textarea>
                    <label>Tematicke čislo časopisu</label>
                    <select class="form-group" name="Rok">
                        <?php if($vysl_k[0] != 0) {?>
                        <option value="2/2020">2/2020</option>
                        <?php } ?>
                        <?php if($vysl_k1[0] != 0) {?>
                        <option value="3/2020 ">3/2020</option>
                        <?php } ?>
                    </select>
                    <label>Aktualní kapacita</label>
                    <span><strong>2/2020: </strong>
                    <?php echo $vysl_k[0]; ?> volnych mist, </span>
                    <span><strong>3/2020: </strong>
                    <?php echo $vysl_k1[0]; ?> volnych mist</span>
                    <br><br>
                    <label>Soubor</label>
                    <input type="file" name="file" id="exampleInputFile"><br><br><br>
                    <button class="btn btn-odeslat btn-danger" type="submit">Přidat</button>
                    <br>
                </div>
            </form>
        </div>

        <?php if(isset($smsg)){ ?>
        <div class="alert alert-success" style="width: 100%; text-align: center;">
            <?php echo $smsg; }?>
        </div>
        <?php if(isset($fmsg)){ ?>
        <div class="alert alert-danger" style="width: 100%; text-align: center">
            <?php echo $fmsg; }?>
        </div>
    </div>
</body>
</html>
