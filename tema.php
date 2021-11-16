<?php
require("session.php");

$sql = "SELECT * FROM helpdesk WHERE id_zpravy = ".$_GET['id'];
$query = mysqli_query($connection, $sql);
$result = mysqli_fetch_assoc($query);

$sql_koment = "SELECT * FROM komentar WHERE id_zpravy = ".$_GET['id'];
$query_koment = mysqli_query($connection, $sql_koment);

if (isset($_POST['pridat'])) {
    $id = $_GET['id'];
    $koment = $_POST['pridat_koment'];
    $autor = $_SESSION['login_user'];
    $sql_pridat = "INSERT INTO komentar (id_zpravy, komentar, autor) VALUES ('$id', '$koment', '$autor')";
    mysqli_query($connection, $sql_pridat);
    header("Refresh:0");
}
?>

<!DOCTYPE html>
<html>
<head lang="cs">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/ico">
    <title>LOGOS POLYTECHNIKOS</title>
</head>
<body>
    <div class="container">
        <div><a href="http://logos-polytechnikos.great-site.net/index.php"><img src="images/logo.png" alt="LOGOS POLYTECHNIKOS"></a></div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <?php    if($_SESSION['role'] === '1') { ?>
            <a class="navbar-brand" href="./autor">AUTOR</a>
            <?php } ?>

            <?php    if($_SESSION['role'] === '2') { ?>
            <a class="navbar-brand" href="./redaktor">REDAKTOR</a>
            <?php } ?>

            <?php    if($_SESSION['role'] === '3') { ?>
            <a class="navbar-brand" href="./sefredaktor">SEFREDAKTOR</a>
            <?php } ?>

            <?php    if($_SESSION['role'] === '4') { ?>
            <a class="navbar-brand" href="./admin">ADMIN</a>
            <?php } ?>

            <?php    if($_SESSION['role'] === '5') { ?>
            <a class="navbar-brand" href="./oponent">OPONENT</a>
            <?php } ?>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="casopisy.php">Časopisy</a>
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
                        <?php if(isset($_SESSION['role'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Odhlásit se</a>
                        </li>
                        <?php } ?>
                    </ul>
                </form>
            </div>
        </nav>

        <?php if (empty($_SESSION['login_user'])) { ?>
            <div style="margin-top: 30px;">
                <p>Chcete-li přidat komentář, musíte mít účet.<p>
                <p>Nemáte účet? Můžete jej vytvořit <a href="http://logos-polytechnikos.great-site.net/registrace/">zde</a>.</p>
            </div>
        <?php } ?>
        
        <div class="tema">
            <span><b><u><?php echo $result['autor'] ?></b></u> vytvořil/a téma <i><?php echo $result['datum'] ?></i></span>
            <h2><?php echo $result['zprava'] ?></h2>
            <p><?php echo $result['popis'] ?></p>
        </div>

        <?php if (mysqli_num_rows($query_koment) > 0) {
                while ($result_koment = mysqli_fetch_assoc($query_koment)) { ?>
                    <div class="koment">
                        <span><b><u><?php echo $result_koment['autor'] ?></b></u> přidal/a komentář <i><?php echo $result_koment['datum'] ?></i>
                            <?php if (($_SESSION['role'] === '4') || ($result_koment['autor'] === $_SESSION['login_user'])) { ?>
                            <a id="x" href="smazatKomentar.php?id_tema=<?php echo $result_koment['id_zpravy'] ?>&id=<?php echo $result_koment['id_komentar'] ?>"><i name="smazat" title="Smazat" class="fas fa-times"></i></a>
                        <?php } ?>
                        </span>
                        <p><?php echo $result_koment['komentar'] ?></p>

                        
                    </div>
        <?php } } ?>

        <?php if (!empty($_SESSION['login_user'])) { ?>
            <div id="koment_div">
                <form method="post">
                    <textarea id="pridat_k" class="form-group form-control" name="pridat_koment" placeholder="Přidat komentář..."></textarea>
                    <button type="submit" class="btn btn-danger" name="pridat">Přidat</button>
                </form>
            </div>
        <?php } ?>
    </div>
</body>
</html>
