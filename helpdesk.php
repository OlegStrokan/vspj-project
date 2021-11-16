<?php 
require("session.php");

$sql = "SELECT * FROM helpdesk";
$query = mysqli_query($connection, $sql);

if (isset($_POST['vytvorit'])) {
    $nazev = $_POST['nazev'];
    $popis = $_POST['popis'];
    $autor = $_SESSION['login_user'];
    $sql_create = "INSERT INTO helpdesk (zprava, popis, autor) VALUES ('$nazev', '$popis', '$autor')";
    $query_create = mysqli_query($connection, $sql_create);
    header("Refresh:0");
}
?>

<!DOCTYPE html>
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
  <title>Přehled příspěvku</title>
  <link rel="shortcut icon" href="../images/favicon.ico" type="image/ico">

    <script>
        $(document).ready(function(){
            $('.search').on('keyup',function(){
                var searchTerm = $(this).val().toLowerCase();
                $('#usertable tbody tr').each(function(){
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
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
        <li class="nav-item active">
            <a class="nav-link" href="helpdesk.php">Help Desk</a>
        </li>
    </ul>

    <form class="form-inline my-2 my-lg-0">
        <input class="search form-control mr-sm-2" style="margin-left: -10px;" type="text" placeholder="Hledat...">
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

<?php if (!empty($_SESSION['login_user'])) { ?>
<button style="margin-top: 30px;" type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
  Vytvořit téma
</button>

<?php } else { ?>
<div style="margin-top: 30px;">
    <p>Chcete-li vytvořit téma, musíte mít účet.<p>
    <p>Nemáte účet? Můžete jej vytvořit <a href="http://logos-polytechnikos.great-site.net/registrace/">zde</a>.</p>
</div>
<?php } ?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nové téma</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Název:</label>
            <input type="text" class="form-control" name="nazev" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Popis:</label>
            <textarea class="form-control" name="popis" required></textarea>
          </div>
          <button type="submit" name="vytvorit" class="btn btn-danger">Vytvořit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zavřít</button>
      </div>
    </div>
  </div>
</div>

<div class="helpdesk">
    <?php if (mysqli_num_rows($query) > 0) { ?>
    <table id="usertable">
        <thead>
            <tr>
                <th>
                    Název
                </th>
                <th>
                    Autor
                </th>
                <th>
                    Datum
                </th>
                
                <?php if($_SESSION['role'] === '4') { ?>
                    <th>
                        Akce
                    </th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
        <?php while($result = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td>
                    <a href="tema.php?id=<?php echo $result['id_zpravy'] ?>"><?php echo $result['zprava']; ?></a>
                </td>
                <td>
                    <?php echo $result['autor']; ?>
                </td>
                <td>
                    <?php echo $result['datum']; ?>
                </td>

                <?php if($_SESSION['role'] === '4') { ?>
                    <td>
                        <a href="smazatTema.php?id=<?php echo $result['id_zpravy'] ?>"><i name="smazat" title="Smazat" class="fas fa-times"></i></a>
                    </td>
                <?php } ?>
            </tr>
            <?php } } else { ?>
            <p>Je tu prázdno - nejsou k dispozici žádná téma!</p>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
    