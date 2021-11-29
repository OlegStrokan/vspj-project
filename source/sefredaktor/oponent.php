
<?php
require("session.php");

$oponent_query = "SELECT userid, username FROM users WHERE role = 5";
$oponent_result = mysqli_query($connection, $oponent_query);

if(isset($_POST['select_autor']))
{
    $sql_id = "SELECT * FROM users WHERE username = '".$_SESSION['login_user']."')";
    $result_id = mysqli_query($connection, $sql_id);

    $sql = "SELECT id, nazev, cislo, stav.popis, posudek.datum FROM posudek INNER JOIN prispevky ON posudek.id_prispevek = prispevky.id INNER JOIN stav ON prispevky.stav = stav.id_stav WHERE stav = 3 AND id_oponent = (SELECT userid FROM users WHERE username = '".$_POST['select_autor']."' )";
    $result = mysqli_query($connection, $sql);

    $sql_pridelene = "SELECT id, nazev, cislo, stav.popis, posudek.datum FROM posudek INNER JOIN prispevky ON posudek.id_prispevek = prispevky.id  INNER JOIN stav ON prispevky.stav = stav.id_stav WHERE (stav = 5 OR stav = 6) AND id_oponent = (SELECT userid FROM users WHERE username = '".$_POST['select_autor']."' )";
    $result_pridelene = mysqli_query($connection, $sql_pridelene);

    $sql_odm = "SELECT id, nazev, cislo, stav.popis, posudek.datum FROM posudek INNER JOIN prispevky ON posudek.id_prispevek = prispevky.id  INNER JOIN stav ON prispevky.stav = stav.id_stav WHERE stav = 4 AND id_oponent = (SELECT userid FROM users WHERE username = '".$_POST['select_autor']."' )";
    $result_odm = mysqli_query($connection, $sql_odm);

    if(isset($_POST['sch_button'])) {
    $sql_schvalit = "UPDATE prispevky SET stav = 6 WHERE id = '". $_POST['id_hidden'] ."'";
    $exec_schvalit = mysqli_query($connection, $sql_schvalit);
    echo("<meta http-equiv='refresh' content='1'>");
    } else
    {
        if(isset($_POST['odm_button'])) 
        {
            $r_id = mysqli_fetch_assoc($result_id);
            $sql_update = "UPDATE prispevky SET stav = 4 WHERE id = '". $_POST['id_hidden'] ."'";
            $exec_update = mysqli_query($connection, $sql_update);
            //$sql_odmitnout = "DELETE FROM posudek WHERE id_prispevek = '". $_POST['id_hidden'] ."'";
            $sql_odmitnout = "INSERT INTO posudek (id_prispevek, id_oponent, posudek, pristup) VALUES ('".$_POST['id_hidden']."', '".$r_id."',
            0, 1)";
            mysqli_query($connection, $sql_odmitnout);
            echo("<meta http-equiv='refresh' content='1'>");
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
    <title>Agenda oponenta</title>
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
                    <li class="nav-item">
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
                                <a class="dropdown-item" href="logout.php">Odhlašit</a>
                            </div>
                        </li>
                    </ul>
                </form>

            </div>
        </nav>
    
    
    <br/>
  <div class="select-border">
        Vyberte oponenta ze seznamů:
        <form method="post" action="" enctype="multipart/form-data">
            <select name="select_autor">
                <?php while($r = mysqli_fetch_assoc($oponent_result)){?>
                <option value="<?php echo $r['username'];?>">
                    <?php echo $r['username']; ?>
                </option>
                <?php } ?>
            </select>
            <button id="pridelit" class="btn btn-danger">Vybrat</a>
        </form>
    </div>
         
         <?php if(isset($_POST['select_autor'])){ ?>
         
        <h3 style="margin-top: 30px;" class="text-center">Přispevky čekajicí na schvalení</h3>

        <div class="table-test">
            <table class="table " id="userTbl">
                <thead>
                    <tr>
                        <th>Název</th>
                        <th>Tematicke čislo</th>
                        <th>Konec terminu</th>
                        <th>Stav</th>
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
                            <?php echo $r['cislo'] ?>
                        </td>
                        <td>
                            <?php echo $r['datum'] ?>
                        </td>
                        <td>
                            <?php echo $r['popis'] ?>
                        </td>
                        <td>
                            <form method="post" action="">
                                <button type="submit" name="sch_button" class="btn btn-success">Schvalit</button>
                                <input type="hidden" name="id_hidden" value="<?php echo $r['id']; ?>">
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Odmitnout</button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Potvrzení</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Opravdu chcete odmitnout přispěvek <strong><?php echo $r[nazev]; ?></strong> ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Zavřit</button>
                                                <button type="submit" name="odm_button" class="btn btn-danger">Odmitnout</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <h3 style="margin-top: 30px;" class="text-center">Přidělené přispěvky</h3>
        <div class="table-test">
            <table class="table " id="userTbl">
                <thead>
                    <tr>
                        <th>Název</th>
                        <th>Tematicke čislo</th>
                        <th>Konec terminu</th>
                        <th>Stav</th>
                        <th>Akce</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        while($q = mysqli_fetch_assoc($result_pridelene)){
                    ?>
                    <tr>
                        <td>
                            <?php echo $q['nazev'] ?>
                        </td>
                        <td>
                            <?php echo $q['cislo'] ?>
                        </td>
                        <td>
                            <?php echo $q['datum'] ?>
                        </td>
                        <td>
                            <?php echo $q['popis'] ?>
                        </td>
                        <td>
                            <a href="view.php?id=<?php echo $q['id'] ?>" title="Nahled" >
                                <i class="fas fa-eye"></i>
                            </a>
                            
                           <a href="posudek.php?id=<?php echo $q['id']?>" title="Vydat Posudek">
                               <i class="fas fa-user-edit"></i>
                            </a>
                            
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <h3 style="margin-top: 30px;" class="text-center">Odmitnuté přispěvky</h3>
        <div class="table-test">
            <table class="table " id="userTbl">
                <thead>
                    <tr>
                        <th>Název</th>
                        <th>Tematicke čislo</th>
                        <th>Konec terminu</th>
                        <th>Stav</th>
                        <th>Akce</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        while($q2 = mysqli_fetch_assoc($result_odm)){
                    ?>
                    <tr>
                        <td>
                            <?php echo $q2['nazev'] ?>
                        </td>
                        <td>
                            <?php echo $q2['cislo'] ?>
                        </td>
                        <td>
                            <?php echo $q2['datum'] ?>
                        </td>
                        <td>
                            <?php echo $q2['popis'] ?>
                        </td>
                        <td>
                            <a href="view.php?id=<?php echo $q2['id'] ?>" title="Nahled" >
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php } ?>
    </div>
    </body>
</html>
