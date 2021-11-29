
<!DOCTYPE html>
<html>
<head>
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
                        <a class="nav-link" href="casopisy.php">Casopisy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="prisp.php">Pro prispevatele</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="onas.php">O n�s</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="helpdesk.php">Help Desk</a>
                    </li>
                </ul>

                <form class="form-inline my-2 my-lg-0">
                    <ul class="navbar-nav mr-auto">
                        <?php if(isset($_SESSION['role'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Odhl�sit se</a>
                        </li>
                        <?php } ?>
                    </ul>
                </form>
            </div>
        </nav>

        <div class="middle">
            <div class="row">
                <div class="form-cleaner"></div>
                <div class="col-xs-12 col-sm-9 col-md-8 col-lg-9 clanek" id="main" role="main">
                    <p><span id="odstavec"></span><strong>LOGOS POLYTECHNIKOS je vysoko�kolsk� odborn� recenzovan� casopis</strong>, kter� slou�� pro publikacn� aktivity akademick�ch pracovn�ku Vysok� �koly polytechnick� Jihlava i jin�ch vysok�ch �kol, univerzit a v�zkumn�ch organizac�. Je veden na seznamu recenzovan�ch odborn�ch a vedeck�ch casopisu <strong>ERIH PLUS</strong> - European Reference Index for the Humanities and the Social Sciences (https://dbh.nsd.uib.no/publiseringskanaler/erihplus/periodical/info?id=488187).</p>
                    <p><span id="odstavec"></span>Od roku 2010 do roku 2018 byl casopis vyd�v�n ctyrikr�t rocne v elektronick� a ti�ten� podobe. Od roku 2019 vych�z� trikr�t rocne v elektronick� verzi. Redakcn� rada casopisu sest�v� z intern�ch i extern�ch odborn�ku. Funkci ��fredaktora zast�v� prorektor pro tvurc� a projektovou cinnost Vysok� �koly polytechnick� Jihlava. Funkce odpovedn�ch redaktoru jednotliv�ch c�sel pr�slu�� vedouc�m kateder Vysok� �koly polytechnick� Jihlava. Ve�ker� vyd�van� pr�spevky proch�z� recenzn�m r�zen�m a jsou peclive redigov�ny.
                    </p>
                </div>
                <div class="col-xs-12 col-sm-3 col-md-4 col-lg-3 pull-right login-home">
 <form enctype="application/x-www-form-urlencoded" action="" method="post">
                            <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST")
                            {
                                $username = $_POST['username'];
                                $sql = "SELECT * FROM users WHERE username = '$username'";
                                $result = mysqli_query($connection, $sql);

                                if (mysqli_num_rows($result) === 1)
                                {
                                    $row = mysqli_fetch_array($result);
                                    $password = $row['password'];
                                    $input_password = htmlspecialchars($_POST['password']);

                                    if(password_verify($input_password, $password))
                                    {
                                        $_SESSION['login_user'] = $username;
                                        $_SESSION['userid'] = $row['userid'];
                                        $_SESSION['role'] = $row['role'];
                                        echo "<meta http-equiv='refresh' content='0'>";
                                    }
                                    else
                                    {
                                        $error = "Nespr�vn� prihla�ovac� jm�no nebo heslo.";
                                    }
                                }
                                else
                                {
                                    $error = "Nespr�vn� prihla�ovac� jm�no nebo heslo.";
                                }
                            } 
                            
                            if(isset($_SESSION['role'])){ ?>
                                Jste prihla�en jako: <strong> <?php echo $_SESSION['login_user']; ?></strong>
                            <?php } else { ?>
                                    <span style="font-size: 11px;"><b>Autor</b>: autor1 - autor1; autor2 - autor2</span><br>
                                    <span style="font-size: 11px;"><b>Redaktor</b>: redaktor1 - redaktor1</span><br>
                                    <span style="font-size: 11px;"><b>Oponent</b>: oponent1 - oponent1; oponent2 - oponent2</span><br>
                                    <span style="font-size: 11px;"><b>��fredaktor</b>: sefredaktor1 - sefredaktor1</span><br>
                                    <span style="font-size: 11px;"><b>Admin</b>: admin - admin</span><br>
                                    <input type="text" name="username" id="username" required placeholder="U�ivatelsk� jm�no"/><br>
                                    <input type="password" name="password" id="password" required placeholder="Heslo">
                                    <input type="submit" name="tlacitko" id="tlacitko" value="Prihl�en�" class="btn btn-danger">
                                    <span style="font-size:12px; color:red; margin-top:10px">
                                        <?php echo $error; ?>
                                    </span>
                                    <a href="./registrace/"><input name="tlacitko2" id="tlacitko2" value="Zalo�it �cet" class="btn btn-light"></a>
                            <?php } ?>
                    </form>
                                    </div>
            </div>
        </div>
    </div>
</body>
</html>
