<?php 
require("session.php");
$sql = "SELECT userid, username, jmeno, prijmeni, email, nazev FROM users INNER JOIN role ON users.role = role.id_role";
$result = mysqli_query($connection, $sql);

// if (isset("smazat")) {
//     $sql_delete = "DELETE FROM users WHERE userid = ".$r['userid'];
//     $result_delete = mysqli_query($connection, $sql_delete);
//     header("Refresh:0");
// }
?>

<!DOCTYPE html>
<html lang="cs">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
 <title>Administrator</title>
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
    
<!-- <div class="header">
    <a href="index.php"><h1 align="center">Admin Panel</h1></a>
</div> -->


<!-- <div class="btns">
    <a class="btn btn-dark" href="index.php">Přispěvký</a>
     <a class="btn btn-dark" href="users.php">Uživatele</a>
    <a id="logout" class="btn btn-dark" href="logout.php">Odhlašit</a>
    <label id="user_l">Jste přihlašen jako: <strong><?php echo $_SESSION['login_user']?></strong></label>
</div> -->
<div class="container">
    <div><a href="http://logos-polytechnikos.great-site.net/index.php"><img src="../images/logo.png" alt="LOGOS POLYTECHNIKOS"></a></div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="./index.php">ADMIN</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="create_user.php">Vytvořit uživatele</a>
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
        </div>
    </nav>
    
    <div class="table-test">
        <table class="table" id = "userTbl">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Jméno</th>
                    <th>Příjmení</th>
                    <th>Uživatelské jméno</th>
                    <th>E-mail</th>
                    <th>Role</th>
                    <th>Akce</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    while($r = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <th scope="row"><?php echo $r['userid'] ?></th>
                    <td><?php echo $r['jmeno'] ?></td>
                    <td><?php echo $r['prijmeni'] ?></td>
                    <td><?php echo $r['username'] ?></td>
                    <td><?php echo $r['email'] ?></td>
                    <td><?php echo $r['nazev']?></td>
                    <td><a href="edit.php?id=<?php echo $r['userid'] ?>"><i title="Upravit uživatele" class="fas fa-pencil-alt"></i></a>
                    <a href="delete.php?id=<?php echo $r['userid'] ?>"><i name="smazat" title="Smazat uživatele" class="fas fa-user-minus"></i></a></td>
                </tr>
                <?php
                    }
                ?>
	        </tbody>
        </table>
    </div>
</div>
</body>
